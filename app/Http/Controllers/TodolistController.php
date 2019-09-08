<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
//use Illuminate\Http\Response;
//use Illuminate\Routing\Controller;
use Redirect;
use Auth;
use View;

use App\todolist as PostEloquent;

class TodolistController extends Controller
{
	//
    public function __construct(){
        $this->middleware('auth', [
            'except' => [
                'index', 'show'
            ]
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
		$posts = PostEloquent::orderBy('created_at', 'ASC') -> paginate(5);
		$posts_total = PostEloquent::get()->count();
		return view('todolist', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('todolist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
		$post = new PostEloquent ($request->all());
		$post->user_id = AUth::user()->id;
		$post->save();
		
		//return Redirect::to('/todolist');
		return redirect('/todolist');
		
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
		//$post = PostEloquent::findOrFail($id);
		//return view('todolist', compact('post'));
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
		$post = PostEloquent::findOrFail($id);
        return View::make('todolist_edit', compact('post'));
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
		$post = PostEloquent::findOrFail($id);
	    $post->fill($request->all());
	    $post->save();
		return redirect('/todolist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$post = PostEloquent::findOrFail($id);
		$post->delete();
		//return redirect('/todolist');
		return Redirect::route('todolist');
    }
	
	public function search(Request $request){
        //if(!$request->has('keyword')){
        //    return Redirect::back();
        //}
        $keyword = $request->keyword;
        $posts = PostEloquent::where('title', 'LIKE', "%$keyword%")->orderBy('created_at', 'ASC')->paginate(5);
        return View::make('todolist', compact('posts', 'keyword')); 
    }
}
