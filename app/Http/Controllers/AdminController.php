<?php

namespace App\Http\Controllers;

use App\Models\CommentReport;
use App\Models\MemberReport;
use App\Models\PostReport;
use App\Models\TopicReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function show()
    {
        if (!Auth::check() || !Auth::user()->admin) abort(403);
        return view('pages.admin');
    }

    public function content(Request $request, $content)
    {
        $html = [];
        switch ($content) {
            case 'posts':
                $posts = PostReport::get_reported_posts();
                foreach ($posts as $post) {
                    array_push($html, view('partials.reported_post', ['post' => $post])->render());
                }
                break;

            case "comments":
                $comments = CommentReport::get_reported_comments();
                foreach ($comments as $comment) {
                    array_push($html, view('partials.reported_comment', ['comment' => $comment])->render());
                }
                break;

            case 'topics':
                $topics = TopicReport::get_reported_topics();
                foreach ($topics as $topic) {
                    array_push($html, view('partials.reported_topic', ['topic' => $topic])->render());
                }
                break;

            case 'members':
                $members = MemberReport::get_reported_members();
                foreach ($members as $member) {
                    array_push($html, view('partials.reported_member', ['member' => $member])->render());
                }
                break;
            default:
                return response()->json('Invalid content filter', 400);
        }

        return response()->json($html);

        if (count($hmtl) > 0) {
            return response()->json($html);
        }

        return response()->json([view('partials.nocontent')->render()]);
    }
}
