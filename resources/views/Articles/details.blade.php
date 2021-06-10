@extends("layouts.theme2")
<style>
  .myDiv {
  
  background-color: white;
  width: 700px;
  box-shadow: 8px 8px 5px #444;
  padding: 10px 12px;
  background-image: linear-gradient(180deg, #fff, #ddd 40%, #ccc);
  color: black;
  border: 1px solid #333;
  margin-left: 60px;

}
h1{
    text-align: left;
}
</style>

@section("form")
<div class="mydiv">
<h1>{{$article->title}}</h1><br>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
             
                <img src="/Article Images/{{ $article->image }}" width="200px" height="300px">
            </div>
        </div>
<h2>{{$article->body}}<h2>

</div>
@endsection