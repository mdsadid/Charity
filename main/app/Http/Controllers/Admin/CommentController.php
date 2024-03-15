<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Constants\ManageStatus;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    function index() {
        $pageTitle = 'Campaign Comments';
        $comments  = Comment::with(['user', 'campaign'])->searchable(['name', 'campaign:name'])->latest()->paginate(getPaginate());

        return view('admin.page.comments', compact('pageTitle', 'comments'));
    }

    function updateStatus($id, $type) {
        $comment         = Comment::findOrFail($id);
        $comment->status = ($type == 'approve') ? ManageStatus::CAMPAIGN_COMMENT_APPROVED : ManageStatus::CAMPAIGN_COMMENT_REJECTED;
        $comment->save();

        $template = ($type == 'approve') ? 'COMMENT_APPROVE' : 'COMMENT_REJECT';

        if ($comment->user) {
            $user = [
                'username' => $comment->user->username,
                'email'    => $comment->user->email,
                'fullname' => $comment->user->fullname,
            ];
        } else {
            $user = [
                'username' => $comment->email,
                'email'    => $comment->email,
                'fullname' => $comment->name,
            ];
        }

        notify($user, $template, [
            'campaign_name' => $comment->campaign->name,
        ], ['email']);

        $toastMsg = ($type == 'approve') ? 'Comment approval success' : 'Comment rejection success';

        $toast[] = ['success', $toastMsg];

        return back()->withToasts($toast);
    }

    function destroy($id) {
        Comment::where('id', $id)->delete();

        $toast[] = ['success', 'Comment deleted successfully'];

        return back()->withToasts($toast);
    }
}
