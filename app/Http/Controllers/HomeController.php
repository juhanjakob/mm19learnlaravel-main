<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view('index');

    }

    public function articles()
    {

        $articles = Article::latest()->paginate(16);

        return view('articles', compact('articles'));
    }

    public function  article(Article $article){
        return view("article", compact("article"));
    }

    public function tag(Tag $tag){
        $articles = $tag->articles()->latest()->paginate();
        return view('articles', compact('articles'));
    }

    public function author(User $author){
        return view('author', compact('author'));
    }

}
