<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $enPosts=Post::whereNotNull('title_in_english')->latest()->paginate(10);
        $mmPosts=Post::whereNotNull('title_in_english')->latest()->paginate(10);

        return view('post.index', compact('enPosts','mmPosts'));
    }

    
}
