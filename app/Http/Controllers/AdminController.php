<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\NewsPost;
use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function get_reported_posts() {
    
        $num_reports_post = DB::table('post_report')
        ->select('id_post', DB::raw('COUNT(*) AS num_reports'))
        ->groupBy('id_post');

        $reported_posts = DB::table('news_post')->joinSub($num_reports_post, 'num_reports_post', function($join) {
                $join->on('news_post.id', '=', 'num_reports_post.id_post');
            })->orderBy('num_reports', 'desc')->get();

        $posts = [];

        foreach ($reported_posts as $rep_post) {
            $post = NewsPost::find($rep_post->id);
            array_push($posts, $post);
        }
        return $posts;
    }

    public function get_reported_comments() 
    {
        $num_reports_comment = DB::table('comment_report')
        ->select('id_comment', DB::raw('COUNT(*) AS num_reports'))
        ->groupBy('id_comment');

        $reported_comments = DB::table('comment')->joinSub($num_reports_comment, 'num_reports_comment', function($join) {
                $join->on('comment.id', '=', 'num_reports_comment.id_comment');
            })->orderBy('num_reports', 'desc')->get();

        $comments = [];

        foreach ($reported_comments as $rep_comment) {
            $comment =  Comment::find($rep_comment->id);
            array_push($comments, $comment);
        }
        return $comments;
    }


    public function get_reported_topics() {
        $num_reports_topic = DB::table('topic_report')
        ->select('id_topic', DB::raw('COUNT(*) AS num_reports'))
        ->groupBy('id_topic');

        $reported_topics = DB::table('topic')->joinSub($num_reports_topic, 'num_reports_topic', function($join) {
                $join->on('topic.id', '=', 'num_reports_topic.id_topic');
            })->orderBy('num_reports', 'desc')->get();

        $topics = [];

        foreach ($reported_topics as $rep_topic) {
            $topic =  Topic::find($rep_topic->id);
            array_push($topics, $topic);
        }
        return $topics;
    }

    public function get_reported_members() {
        $num_reports_member = DB::table('member_report')
        ->select('id_reported', DB::raw('COUNT(*) AS num_reports'))
        ->groupBy('id_reported');

        $reported_comments = DB::table('member')->joinSub($num_reports_member, 'num_reports_member', function($join) {
                $join->on('member.id', '=', 'num_reports_member.id_reported');
            })->orderBy('num_reports', 'desc')->get();

        $members = [];

        foreach ($reported_comments as $rep_comment) {
            $member =  Member::find($rep_comment->id);
            array_push($members, $member);
        }
        return $members;
    }


    public function show()
    {

        return view('pages.admin', ["posts" => $this->get_reported_posts(), "comments" => $this->get_reported_comments(), 'topics' => $this->get_reported_topics(), 'members' => $this->get_reported_members()]);
    }


}
