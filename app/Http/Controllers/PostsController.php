<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\post\postupdateRequest;
use App\post;
use App\Tags;
use Illuminate\Http\Request;
use App\Http\Requests\post\postRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCatMid')->only(['create','store']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categorys',category::all())->with('tags',Tags::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(postRequest $request)
    {
     //  $image=    $request->image->storeas('posts',$request->image->getClientOriginalName());
     // $image=    $request->image->store('posts',$request->image->getClientOriginalName());
     //$image=asset('posts/'.$request->image->getClientOriginalName());
//       dd( $request->image);
       // $image = $request->file('image')->getClientOriginalName();


      $image =  $request->image->store('posts');


       $posts= post::create([
            'title'=>$request->title,
            'dis'=>$request->dis,
            'contents'=>$request->contents,
            'publish_at'=>$request->publish_at,
            'image'=> $image,
             'category_id'=>$request->category
        ]);
        if ($request->tags){
            $posts->tag()->attach($request->tags);
        }
        session()->flash('success','well don');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('posts.create')->with( 'posts',$post )->with('categorys',category::all())->with('tags',Tags::all());



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(postupdateRequest $request ,post $post)
    {
        $data=$request->only(['title','dis','contents','publish_at']);

        if ($request->hasFile('image'))
        {
            $image=$request->image->store();
           $post->deleteimage();
            $data['image']=$image;

        }
        if ($request->tags){
            $post->tag()->sync($request->tags);
        }


       $post->update($data);
        session()->flash('success','edit don');
        return redirect(route('posts.index'));
    }


    public function destroy($id)
    {
        $post=post::withTrashed()->where('id', $id)->firstOrFail();

      $post->delete();

        if ($post->trashed())
        {
            $post->deleteimage();
            $post->delete();
        }
        else{
            $post->delete();
        }

        session()->flash('success','well don');
        return redirect(route('posts.index'));

    }

    //just four trash file

    public function trash()
    {
        $trash= post::onlyTrashed()->get();
        return view('posts.index')->with('posts',$trash);
    }

    public function restore($id)
    {
        $post=post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();
        session()->flash('success','restore don');
        return redirect(route('posts.index'));
    }

}
