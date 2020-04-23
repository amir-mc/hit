<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use App\Http\Requests\post\postRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('po',post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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


        post::create([
            'title'=>$request->title,
            'dis'=>$request->dis,
            'contents'=>$request->contents,
            'image'=> $image

        ]);
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
    public function edit($id)
    {
        //
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
        //
    }


    public function destroy(post $post)
    {

        $post->delete();
        session()->flash('success','well don');
        return redirect(route('posts.index'));

    }

    //just four trash file

    public function trash()
    {
        $trash= post::withTrashed()->get();
        return view('posts.index')->with('po',$trash);
    }
}
