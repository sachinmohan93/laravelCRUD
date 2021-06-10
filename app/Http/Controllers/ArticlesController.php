<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\articles;
use App\Models\posts;

use File;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=articles::latest()->get();
        $articles3=articles::all()->take(3);
        $posts=posts::latest()->get();
        
        return view('Articles/index',["articles"=>$articles,"posts"=>$posts,"articles3"=>$articles3]);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Articles/addnew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'title'=>["required","min:2"],
            'body'=>'required',
            'image' => ["required","max:2048"],
        ]);
        $article=new articles();
        $article->title=request("title");
        $article->body=request("body");

        $image = $request->file('image');
        $destinationPath = 'Article Images/';
        $articleImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $articleImage);
        $article['image'] = "$articleImage";

        $article->save();
        return redirect('/#services')->with('success','Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article= articles::find($id);
        return view('Articles.details',['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $article= articles::find($id);
        return view('Articles.edit',['article'=>$article]);
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
        request()->validate([
            'title'=>["required","min:2"],
            'body'=>'required',
            'image' => ["required","max:2048"],
        ]);

        
        $article=articles::find($id);

        if($request->hasFile('image'))
        {
            $articleIm = public_path("Article Images/{{$article->image}}"); 
        
            if(File::exists($articleIm)) 
            { 
                 unlink($articleIm);
            }
        }
        $image = $request->file('image');
        $destinationPath = 'Article Images/';
        $articleImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $articleImage);
        $article['image'] = "$articleImage";

         $article->title=request("title");
         $article->body=request("body");

        
        

        $article->save();
        return redirect('/#services')->with('success','Article Updated successfully.');
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=articles::find($id);
        $article->delete();
        return redirect('/#services')->with('success','Article Deleted successfully.');

    }
}
