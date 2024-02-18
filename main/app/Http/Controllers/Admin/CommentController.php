<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Constants\ManageStatus;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    function index() {
        $pageTitle = 'Campaign Comments';
        $comments  = Comment::with(['user', 'campaign'])->latest()->paginate(getPaginate());

        return view('admin.page.comments', compact('pageTitle', 'comments'));
    }

    function updateStatus($id, $type) {
        $comment         = Comment::findOrFail($id);
        $comment->status = ($type == 'approve') ? ManageStatus::CAMPAIGN_COMMENT_APPROVED : ManageStatus::CAMPAIGN_COMMENT_REJECTED;
        $comment->save();

        $template = ($type == 'approve') ? 'COMMENT_APPROVE' : 'COMMENT_REJECT';

        notify($campaign->user, $template, [
            'campaign_name' => $campaign->name,
        ]);

        $toastMsg = ($type == 'approve') ? 'Campaign approval success' : 'Campaign rejection success';

        $toast[] = ['success', $toastMsg];

        return back()->withToasts($toast);
    }
}
