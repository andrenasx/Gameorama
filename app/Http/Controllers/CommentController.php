<?php

namespace App\Http\Controllers;

use App\Notifications\CommentNotification;
use App\Notifications\ReplyNotification;
use Illuminate\Http\Request;
use App\Models\NewsPost;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($body, $id_post)
    {
        return Comment::create([
            'body' => $body,
            'date_time' => now(),
            'aura' => 0,
            'id_owner' => Auth::user()->id,
            'id_post' => $id_post
        ]);
    }

    public function comment(Request $request, NewsPost $newspost)
    {
        if (!Auth::check()) return response()->json('Forbidden access', 403);

        $comment = $this->create($request->input('comment'), $newspost->id);
        $comment->save();
        $comment = $comment->fresh(); //refresh model
        $html = view('partials.comment', ['comment' => $comment, 'offset' => 0])->render();
        $newspost->owner->notify(new CommentNotification($comment));
        return response()->json($html);
    }


    public function reply(Request $request, NewsPost $newspost, Comment $comment)
    {
        $reply = $comment->reply_transaction($request->input('comment'), $comment->id, $newspost->id);
        $reply->save();

        $newspost = $newspost->refresh();

        $html = [];
        foreach ($newspost->parentComments() as $parent) {
            array_push($html, view('partials.comment', ['comment' => $parent, 'offset' => 0])->render());
        }

        return response()->json(array('parent_comment_id' => $comment->id, 'html' => $html));
    }

    public function vote(Request $request, Comment $comment)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        $vote = Auth::user()->hasVotedComment($comment->id);
        if ($vote === null) {
            $comment->add_vote($request->input('vote'));

        } else if (($vote->upvote == 1 && $request->input('vote') === 'true') || ($vote->upvote == 0 && $request->input('vote') === 'false')) {
            $comment->delete_vote();
        } 
        else {

            $comment->delete_vote();
            $comment->add_vote($request->input('vote'));
        }

        $comment->refresh();
        return response()->json(array('votes' => $comment->aura));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('owner', $comment);
        $comment->body = $request->input('body');
        $comment->save();
        $post = $comment->post;

        $html = [];

        foreach ($post->parentComments() as $parent) {
            array_push($html, view('partials.comment', ['comment' => $parent, 'offset' => 0])->render());
        }

        return response()->json(array('html' => $html, 'body' => $comment->body));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $post = $comment->post;
        $comment->delete();
        $html = [];

        foreach ($post->parentComments() as $parent) {
            array_push($html, view('partials.comment', ['comment' => $parent, 'offset' => 0])->render());
        }

        return response()->json(array('html' => $html));
    }

    public function report(Request $request, Comment $comment)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
        
        return CommentReport::create([
            'id_reporter' => Auth::user()->id,
            'id_comment' => $comment->id,
            'body' => $request->input('report')
        ]);
    }

    public function dismiss(Comment $comment)
    {
        $comment->dismiss_report();
    }
}
