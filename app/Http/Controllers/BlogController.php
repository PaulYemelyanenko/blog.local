<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;



class BlogController extends Controller
{
	public function index(Request $request)
	{
		$articles = Article::orderBy('id', 'asc')->paginate(1);
		/*$articles = Article::orderBy('id', 'asc')->get();
			echo '<pre>';
			var_dump($articles->toArray());
			echo '</pre>';
		*/	

		/*
		$user = User::find(1);
		$user->articles()->create([
			'title'=> 'Это третья статья',
			'content'=> 'Это контент 3',
			'image'=> 'image3.png',
			'is_published'=>true
		]);
		*/
		//$users = DB::table('users')->where('votes', '=', 100)->get();
		/*
		$users = User::all();
		$articles = Article::all();

		foreach($users as $user)
		{
			echo '<pre>';
			var_dump($user->name);
			echo '</pre>';
		}
		echo '<pre>';
		var_dump($users, $articles);
		echo '</pre>';
		foreach($articles as $article)
		{
			echo '<pre>';
			var_dump($article->title);
			echo '</pre>';
			$user = $article->user()->first();
			echo '<pre>';
			var_dump($user->name);
			echo '</pre>';
		}
		*/

		/*
		$user = new User;
		$user->email = 'user1@example.com';
		$user->name = 'Вася Пупкин';
		$user->save();
		*/
		/*
		$article = new Article;
		$article->user_id = 1;
		$article->title = 'Это моя первая запись';
		$article->content = 'Это первый контент';
		$article->image = 'image.png';
		$article->is_published = false;
		$article->save();
		*/

		return view('blog.index', ['articles' => $articles]);
	}

	public function view(Request $request, $id)
	{
		$article = Article::where('id', '=', $id)->get();
		return view('blog.view', [
			'id' => $id,
			'article' => $article
		]);
	}
    //
}
