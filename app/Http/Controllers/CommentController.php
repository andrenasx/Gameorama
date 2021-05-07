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

    public function reply($id_post, $id_comment, Request $request) {
        $parentComment = Comment::find($id_comment);
        $post = NewsPost::find($id_post);
        if ($post == null || $parentComment === null) {
            return response()->json('Not found', 404);
        }

        $comment = $this->create($request->input('comment'), $post->id);

        DB::table('reply')->insert([
            'id_comment' => $comment->id,
            'id_parent' => $parentComment->id
        ]);

        $comment->save();
        $parentComment = $parentComment->fresh(); 

        $html = view('partials.comment', ['comment' => $parentComment, 'offset' => 0])->render();
        return response()->json(array('parent_comment_id' => $parentComment->id ,'html' => $html));
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
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
