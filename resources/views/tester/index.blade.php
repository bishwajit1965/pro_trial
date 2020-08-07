@extends('master')
@section('title', ' | Index Page')

@section('content')
  <h2>This is an index page</h2>
  <div class="row">
    <div class="col-md-12 col-md-offset-">
      <table class="table table-hover table-responsive table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>F_name</th>
            <th>L_name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Action</th>
          </Ytr>
        </thead>
        <tbody>
          @foreach ($posts as $key => $post)
          <tr>
            <td> {{ $post->id}} </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <a href="{{action('TesterController@index')}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title=" View ! "> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>

              <a href="#" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title=" Edit ! "> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>

              <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title=" Delete ! "> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>
@endsection()
