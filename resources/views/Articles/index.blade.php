@extends("layouts.theme")

@section("slide")

 @foreach($articles3 as $article)
          <div>
            <h1 class="intro-title">{{$article->title}}</h1>
            <p class="intro-text">{{$article->body}}</p>
            <a class="btn btn-custom" href="/article/details/{{$article->id}}">Get started</a>
          </div><!--slide item like paragraph-->
@endforeach
         
@endsection

@section("articles")

<section id="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="title text-center">Best Articles</h4>
            <!-- <div class="titleHR"><span></span></div> -->
          </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
       @endif
        <div>
          <h3> <a href="/addnew">Add New Articles</a><h3>
        </div>
        
        <div class="row">
       
         @foreach($articles as $article)
         
         <div class="col-sm-6">
           <!-- Service-item -->
            <div class="text-center services-item">
              <div class="col-wrapper">
                <div class="icon-border"> 
                  <i class="icon-design-graphic-tablet-streamline-tablet color-l-orange"></i> 
                </div>
                <div class="form-group">
                <img src="/Article Images/{{ $article->image }}" width="100px">
               </div>
                <h5><a href="/article/details/{{$article->id}}">{{$article->title}}</a></h5>
                
                <p>{{$article->body}}</p>
              </div>
              <a href='/article/edit/{{$article->id}}'><button>Edit</button></a>
              <a href='/article/delete/{{$article->id}}'><button onclick="return confirm('Are you sure');">Delete</button></a>
            </div>
            </div>

        @endforeach
     
        </div> <!--/.row -->

      </div> <!--/.container -->
    </section>

    @endsection