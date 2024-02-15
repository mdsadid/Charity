<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    function index() {
        $pageTitle = 'Campaign Comments';
        $comments  = Comment::with(['user', 'campaign'])->latest()->paginate(getPaginate());

        return view('admin.page.comments', compact('pageTitle', 'comments'));
    }
}
