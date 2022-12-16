<?php

namespace App\Http\Controllers\User\Comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function __invoke()
    {
        $comments = auth()->user()->comments;

        return view('user.comments.index', compact('comments'));
    }
}
