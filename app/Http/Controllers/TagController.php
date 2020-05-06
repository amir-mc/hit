<?php

namespace App\Http\Controllers;
use App\Tags;
use Illuminate\Http\Request;
use App\Http\Requests\tag\creattagreq;
use App\Http\Requests\tag\uptagreq;
use phpDocumentor\Reflection\DocBlock\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tags.index')->with('tag',Tags::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.creat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(creattagreq $request)
    {
//      $this->validate($request,[
//          'name'=>'required|unique:tag'
//      ]);

        // $tag= new tag();
        Tags::create([
            'name'=> $request->name

        ]);

        session()->flash('success','don');

        return redirect('/tags');

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
    public function edit(tag $tag)
    {


        return view('tags.creat')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(uptagreq $request, tag $tag)
    {
//        $tag->update([
//            'name'=>$request->name
//        ]);
//this comment can use it ??????????
        $tag->name=$request->name;
        $tag->save();
        session()->flash('success','UPdate success');
        return redirect('/tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tags $tag)
    {


        if($tag->post->count()>0)
        {
            session()->flash('error','tag cant be delete because it has post');
            return redirect()->back();
        }
        $tag->delete();
        session()->flash('success','delete suc');
        return redirect('/tags');

    }
}
