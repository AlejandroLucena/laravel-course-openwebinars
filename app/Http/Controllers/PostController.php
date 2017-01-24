<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

use Validator;

class PostController extends Controller
{
	/**
	 * @var InjectionController
	 */
	protected $injectionController;

	public function __construct()
	{
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$posts = Post::all();
		return view('blog.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('dashboard.blog.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required|unique:posts|max:255',
			'body' => 'required',
		]);

		if ($validator->fails()) {
			return redirect('post/create')
				->withErrors($validator)
				->withInput();
		}

		// Store post
		$post = Post::create($request->except('csrf'));
		return redirect(url('/'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		/** @var Post $post */
		$post = Post::findOrFail($id);
		return view('blog.singlepost', compact('post'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Post::destroy($id);
		return 1;
	}
}
