@extends("layouts.theme2")
@section("form")

<style>

.formdiv {
  

  width: 800px;
  box-shadow: 8px 8px 5px #444;
  padding: 10px 12px;
  background-image: linear-gradient(180deg, #fff, #ddd 40%, #ccc);
  color: black;
  border: 1px solid #333;
  margin-left: 100px;
  

}

</style>

<h1> Add New articles</h1>
<form action="/articles" method="post" enctype="multipart/form-data" class="form-main">
    @csrf

        <div class="formdiv">
            <div class="row">            
                <div class="form-group col-xs-6 ">
                    <label for="name2">Article Title</label>
                    <input class="form-control" value="{{old('title')}}" id="title" name="title"  type="text" placeholder="Title">
                    @error('title')
                    <p style="color:red">{{$errors->first('title')}}</p>
                    @enderror
                </div>
            </div>

                
                <div class="row">            
                  <div class="col-xs-6 text-center">
                    <label for="body">Article Body</label>
                    <input class="form-control" id="body" name="body"  type="text" placeholder="body" value="{{old('body')}}">
                    @error('body')
                    <p style="color:red">{{$errors->first('body')}}</p>
                    @enderror
                  </div>
                </div>

                <div class="row"> 
                  <div class="col-xs-6 text-center">
                    <strong>Image:</strong>
                    <input type="file" id="image" name="image" class="form-control" placeholder="image" value="{{old('body')}}">
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
        </div>

</form>

@endsection