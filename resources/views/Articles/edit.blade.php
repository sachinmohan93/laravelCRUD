@extends("layouts.theme2")

@section("form")
<form action="/article/{{$article->id}}" method="post" enctype="multipart/form-data" class="form-main">
            @csrf
            @method("PUT")
                <div class="row">            
                  <div class="form-group col-xs-6 ">
                    <label for="name2">Article Title</label>
                    <input class="form-control" id="title" name="title"  type="text" value="{{$article->title}}">
                    @error('title')
                    <p style="color:red">{{$errors->first('title')}}</p>
                    @enderror
                 </div>
                 </div>

                
                 <div class="row">            
                  <div class="col-xs-6 text-center">
                    <label for="body">Article Body</label>
                    <input class="form-control" id="body" name="body"  type="text" value="{{$article->body}}">
                    @error('body')
                    <p style="color:red">{{$errors->first('body')}}</p>
                    @enderror
                 </div>
                 </div>
                 <div class="row">            
                  <div class="col-xs-6 text-center">
                    <img src="/Article Images/{{ $article->image }}" width="100px">
                    <input type="file" id="image" name="image" class="form-control" value="{{$article->image}}">
                    @error('image')
                    <p style="color:red">{{$errors->first('image')}}</p>
                    @enderror
                  </div>
                </div>
                <br>
                
                <div class="row">            
                  <div class="col-xs-12 text-center">
                    <button type="submit" class="btn btn-custom" id="send">Submit</button>
                  </div>
                </div>

            </form>

@endsection