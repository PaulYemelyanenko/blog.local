<?php

namespace App\Services;

use Illuminate\Support\Facades\App;
use App\User;
use App\Article;

class BlogService
{
	public static function getArticles()
	{
    	$articles = Article::all();

        $articles->map(function ($item, $key) {
            $item->image = '/path/to/image/' . $item->image;
            return $item;
        });

        return $articles->toArray();
    }

    public static function getArticle($id)
    {
    	$article = Article::where('id', $id)->get();

    	return view('blog.view', ['id' => $id, 'article' => $article]);
    }

    public static function paginateArticles()
    {
    	$articles = Article::orderBy('id', 'asc')->paginate(1);

    	return view('blog.index', ['articles' => $articles]);
    }

    public static function addArticle($title, $content, $image, $is_published)
    {
    	$user = User::find(1);
    	$user->article()->create([
    		'title' => $title,
    		'content' => $content,
    		'image' => $image,
    		'is_published' => $is_published
    	]);
    	if(!$user)
    		throw new Exception('Wrong user');
    }

    public static function addUser($name, $email)
    {
    	$user = new User;
    	$user->name = $name;
    	$user->email = $email;
    	$user->save();
    }
}