<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Services\BlogService;



class BlogController extends Controller
{
	public function index(Request $request)
	{

		$paginate = BlogService::paginateArticles();

		return $paginate;

		
	}

	public function view(Request $request, $id)
	{
		$article = BlogService::getArticle($id);

		return $article;

	}
    //
}
