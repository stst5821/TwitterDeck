<?php

namespace App\Http\Controllers;
use App\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // 通常
        $articles = Article::all()->sortByDesc('created_at');

        // Eagerロード
        // $articles = Article::with('user')->get()->sortByDesc('created_at');

        return view('articles.index', compact('articles'));
    }
}
