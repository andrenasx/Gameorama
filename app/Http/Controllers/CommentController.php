<?php

namespace App\Http\Controllers;

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

    public function comment($id_post, Request $request) 
    {
        $post = NewsPost::find($id_post);
        if ($post == null) {
            return response()->json('Post not found', 404);
        }
        
        $comment = $this->create($request->input('comment'), $post->id);
        $comment->save();
        $comment = $comment->fresh(); //refresh model
        $html = view('partials.comment', ['comment' => $comment, 'offset' => 0])->render();
        return response()->json($html);

    }

    public function reply_transaction(Request $request, $idParent, $id_post) {
        DB::beginTransaction();
        $comment = null;
        try {
            $comment = $this->create($request->input('comment'), $id_post);
        
        } catch (ValidationException $e) {
            return back()->withError($e->getErrors());
        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
        
        try {
            DB::table('reply')->insert([
                'id_comment' => $comment->id,
                'id_parent' => $idParent
            ]);
        
        } catch (ValidationException $e) {
            return back()->withError($e->getErrors()); 
        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }

        DB::commit();

        return $comment;
    }


    public function reply($id_post, $id_comment, Request $request) {
        $parentComment = Comment::find($id_comment);
        $post = NewsPost::find($id_post);
        if ($post == null || $parentComment === null) {
            return response()->json('Not found', 404);
        }

        $comment = $this->reply_transaction($request, $parentComment->id, $post->id);

        $comment->save();
        $post = $post->fresh();
        $html = [];

        foreach ($post->parentComments() as $parent) {
            array_push($html, view('partials.comment', ['comment' => $parent, 'offset' => 0])->render());
        }

        return response()->json(array('parent_comment_id' => $parentComment->id ,'html' => $html));
    }

    public function add_vote($vote, $id_comment) {
        DB::table('comment_aura')->insert([
            'id_comment' => $id_comment,
            'id_voter' => Auth::user()->id,
            'upvote' => $vote
        ]);
    }

    public function vote($id_comment, Request $request) {
        $vote = Auth::user()->hasVotedComment($id_comment);
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        if ($vote === null) {
            $this->add_vote($request->input('vote'), $id_comment);
        }

        
        else if (($vote->upvote == 1 && $request->input('vote') === 'true') || ($vote->upvote == 0 && $request->input('vote') === 'false')){
            DB::table('comment_aura')
            ->where('id_voter', '=', Auth::user()->id)
            ->where('id_comment', '=', $id_comment)
            ->delete();
        }

        else {
            DB::table('comment_aura')
            ->where('id_voter', '=', Auth::user()->id)
            ->where('id_comment', '=', $id_comment)
            ->delete();
            
            $this->add_vote($request->input('vote'), $id_comment);
        }

        $comment = Comment::find($id_comment);

        return response()->json(array('votes' => $comment->aura));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_comment, Request $request)
    {
        //
        $comment = Comment::find($id_comment);

        $this->authorize('update', $comment);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_comment)
    {
        $comment = Comment::find($id_comment);
        if ($comment === null) {
            return response()->json('Not found', 404);
        }

        $post = $comment->post;

        $comment->delete();
        $html = [];

        foreach ($post->parentComments() as $parent) {
            array_push($html, view('partials.comment', ['comment' => $parent, 'offset' => 0])->render());
        }

        return response()->json(array('html' => $html));
    }

    public function report($id_comment, Request $request){
        
    }


}
