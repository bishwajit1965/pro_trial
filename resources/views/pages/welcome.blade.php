<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
  <!-- Stylesheet for slide toggle panel -->
  <style>

   #flip {
      padding:px;
      text-align: center;
      background-color: #7BAAD6;
      border: solid px #7BAAD6;
    }
    #panel {
      padding: px;
      display: none;
      margin-bottom: 2px;

    }
    #flip_button{
      padding:px;
      text-align: center;
      background-color: #A8A8A8;
      border: solid px #7BAAD6;
    }
    #panel_flip{
      padding: px;
      display: none;
      margin-bottom: 2px;

    }
    .slide_panel{
      background-color: #;
    }
    .label>a{color:#FFF;}

  </style>

  <!-- Menu -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $( function() {
    $( "#menu" ).menu();
  } );
  </script>
  <style>
    .ui-menu {
      width:100px;
     }
  </style>
</head>
<body id="app-layout">
  @include('partials.navbar')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading"><h1>Welcome to my Dream Land of Laravel </h1></div>
          <!-- Slide toggle panel data begins -->
            <div class="slide_panel" >
              <div id="flip_button" >
                <button class="btn btn-default btn-xs  dropdown-toggle" data-toggle="tooltip" data-placement="top" title="Toggle Panel!" type="button" id="dropdownMenu1" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true" >  <span class="caret"></span>
                </button>
              </div>
            </div>
            <div id="panel_flip"> <!-- Sliding panel begins -->
              <div class="col-md-12 col-md-offset-">
                <h1>This is the sliding panel that I am working on</h1>
              </div>
            </div>
          <div class="panel-body">
            @include('partials.message')
            
            <div class="row">
              <div class="col-md-9"  style="border-right:1px solid#ABABAB;">   
                <div class="row marquee_text">
                  <marquee behavior="scroll" direction="" scrollamount="3" onMouseOver="this.stop();" onMouseOut="this.start();">
                    @foreach($posts as $post)
                      <tr>
                        <td>
                          <a href="{{url('blog/' . $post->slug)}}"> {{ $post->title }} </a>   ||
                        </td>
                      </tr>
                    @endforeach
                  </marquee>
                </div>
                
                <!--Code for the page content will go within -->
                <div class="row">
                  <div class="col-md-12 slider">
                    @include('partials.slider') <!-- Slider included -->
                  </div>
                </div>
                <div class="row">  <!-- Slide toggle data table to search data -->
                    <div class="marquee_text " >
                      <div id="flip" >
                        <button class="btn btn-primary btn-xs  dropdown-toggle" data-toggle="tooltip" data-placement="top" title="Toggle Data Search Table!" type="button" id="dropdownMenu1" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="true" > <span class="caret"></span>
                        </button>
                      </div>
                    </div>
                    <div id="panel">
                    <!-- Search table begins -->
                      <table class="table table-responsive table-hover table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Body</th>
                            <th>Publ.. on</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                </div>
                  @foreach($posts as $post) <!-- Individual post looped -->
                      <a href="{{url('blog/' . $post->slug)}}"><h2>{{ substr(Strip_tags($post->title), 0 , 45) }} {{ strlen(Strip_tags($post->title)) > 45 ? "..." : "" }}</h2></a>
                      <p><strong>Written by:  {{ $post->writer }} || </strong>
                          <strong> Posted on:</strong> {{ date('M j, Y', strtotime( $post->created_at)) }} <strong> || Updated at:</strong>{{ date('M j, Y', strtotime( $post->updated_at)) }} 
                      </p>
                      <a href="{{url('blog/' . $post->slug)}}"> <img src="{{asset('images/' . $post->image)}}" alt="" style="width:250px; height:130px; float:left; margin-right:10px; background-color:#FFF; border:2px solid#ABABAB; padding:3px;"> </a>
                      <p>
                        {!! substr(strip_tags($post->body), 0 , 550) !!}{!! strlen(strip_tags($post->body)) > 550 ? "..." : "" !!}
                      </p>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="tags">
                            <span style="margin-right:8px;" class="label label-primary glyphicon glyphicon-tags"> Post Tags: </span>
                              @foreach($post->tag as $tag)
                                <span class="label label-default"> <a href=" {{route('pages.tagPostShow', $tag->id)}} ">{{  $tag->name  }}</span> </a> &nbsp;
                              @endforeach
                              <a href="{{ action('BlogController@getSingle', [$post->slug]) }}"><strong> <span class="glyphicon glyphicon-comment"> </span> {{ $post->comments->count() }} Comments </strong> </a> 

                              <a href="{{url('blog/' . $post->slug)}}" class="btn btn-primary btn-xs pull-right shadow">Read More</a> 
                          </div>
                        </div>
                      </div><hr> 
                  @endforeach
                <div class="text-center">
                  {{ $posts->links() }} <!-- Pagination  -->
                </div>
                <!--Code for the page content will go above -->
              </div>
            <!--******************************Right sidebar begins*************************************-->
              <div class="col-md-3"><!-- Code fopr the right sidebar will go below -->
                  {{-- <div class="row">
                    <div class="col-md-12">
                      @foreach($posts as $post)
                        <a href="{{url('blog/' . $post->slug)}}"><img src="{{asset('images/' . $post->image)}}" alt="" style="width:206px; height:100px; float:left; margin-right:10px; background-color:#FFF; border:2px solid#ABABAB; padding:3px;"><br></a> &nbsp; 
                      @endforeach
                    </div> 
                  </div> --}}
                  <div class="col-md-12 marquee_notice  shadow">
                    <h2 id="post_title">Latest Notice</h2>
                    <marquee behavior="scroll" direction="up" scrollamount="3" onMouseOver="this.stop();" onMouseOut="this.start();">
                      @foreach($notices as $notice)
                        <p class="marquee_title shadow"> <a href=" {{action('NoticeController@show', $notice->id)}} "> ** {{ substr(Strip_tags($notice->title), 0 , 20) }} {{ strlen(Strip_tags($notice->title)) > 20 ? "..." : "" }} </a></p>   
                      @endforeach
                    </marquee>
                    <div class="text-center">
                      {{ $notices->links() }}<!-- Pagination  -->
                    </div>
                  </div>
                  <div class="row"></div> &nbsp;
                    
                  <div class="row">
                    <div class="col-md-12  ">
                      <div class="text_box shadow">
                        <h2 id="post_title">Latest posts</h2>
                        @foreach($posts as $post)
                          <a href="{{url('blog/' . $post->slug)}}"><p id="text_box">{{ substr(Strip_tags($post->title), 0 ,25) }} {{ strlen(Strip_tags($post->title)) > 25 ? "..." : "" }}</p>
                        @endforeach
                      </div>
                    </div>
                  </div> &nbsp;
                     
                <!-- Code fopr the right sidebar will go above -->
              </div>
            </div>
          </div>
        @include('partials.footer')
      </div>
    </div>
  </div>
</div>
@include('partials.javascript')

<!-- Javascript for searching posts -->
    <script type="text/javascript">
      $('#search').on('keyup', function(){
         // alert('test');
        $value = $(this).val();
        $.ajax({
          type: 'get',
          url : '{{ URL::to('search') }}',
          data: {'search':$value},
          success: function(data){
              $('tbody').html(data);
            }
        });
      });
      </script>
    <!-- Script for tool tip -->
      <script>
        $(document).ready(function(){
        $('[data-toggle = "tooltip"]').tooltip();
        });
      </script>

    <!--Jquery code to slide-toggle panel for search post table  -->
      <script>
        $(document).ready(function(){
          $("#flip").click(function(){
          $("#panel").slideToggle("slow");
          });
        });
      </script>

    <!--Jquery code to slide-toggle panel for at the top  -->
    <script>
      $(document).ready(function(){
        $("#flip_button").click(function(){
        $("#panel_flip").slideToggle("slow");
        });
      });
    </script>

</body>