<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Student;
use Image;
use Storage;
use Session;
use Purifier;
use DB;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $students = Student::orderBy('f_name', 'desc')->latest();

        // $f_name = $request->input('phone');
        $f_name = $request->input('f_name');

        // if(!empty($phone))
        // {
        //   $students->where('f_name', 'LIKE', '%'. $phone . '%');
        // }

        if (!empty($f_name)) {
            $students->where('f_name', 'LIKE', '%'. $f_name . '%');
        }

        $students = $students->paginate(10);
        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'roll' => 'required|unique:students,roll',
          'f_name' => 'required|min:3|max:25',
          'l_name' => 'required|min:3|max:25',
          'class' => 'required',
          'address' => 'required',
          'phone' => 'sometimes|min:11|unique:students,phone',
          'featured_image' => 'sometimes|image'
        ]);

        $student = new Student();
        $student->roll = $request->input('roll');
        $student->f_name = $request->input('f_name');
        $student->l_name = $request->input('l_name');
        $student->class = $request->input('class');
        $student->address = $request->input('address');
        $student->phone = $request->input('phone');
        if ($request->hasfile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('s_images/'. $filename);
            Image::make($image)->resize(80, 80)->save($location);
            $student->image = $filename;
        }

        $student->save();
        Session::flash('success', 'Student data has successfully beeen saved !');
        return redirect()->route('students.index', $student->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $student = Student::find($id);
        $this->validate($request, [
            'roll' => 'required ',
            'f_name' => 'required|min:3|max:25',
            'l_name' => 'required|min:3|max:25',
            'class' => 'required',
            'address' => 'required',
            'phone' => 'sometimes|min:11|max:11',
            'featured_image' => 'sometimes|image'
            ]);

        $student->roll   = $request->input('roll');
        $student->f_name = $request->input('f_name');
        $student->l_name = $request->input('l_name');
        $student->class  = $request->input('class');
        $student->address= $request->input('address');
        $student->phone  = $request->input('phone');

        if ($request->hasfile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('s_images/'. $filename);
            Image::make($image)->resize(80, 80)->save($location);
            $oldFilename = $student->image;
            //updates the featured image
            $student->image = $filename;
            //Deletes the old image
            Storage::delete($oldFilename);
        }

        $student->save();
        Session::flash('success', 'Student data has successfully beeen updated !');
        return redirect()->route('students.show', $student->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        Storage::delete($student->image);
        $student->delete();
        Session::flash('success', 'Student data has been deleted successfully!');
        return redirect()->route('students.index');
    }

    /**
     * Will display the view page - 'delete.blade.php'
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $student = Student::find($id);
        return view('students.delete')->with('student', $student);
    }
}
