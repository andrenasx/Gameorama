<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
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
    public function create()
    {
        return view('pages.create_post');
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
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function show($id_post)
    {
        $post = NewsPost::find($id_post);

        if ($post != NULL){
            return view('pages.post', ['post' => $post]);
        }
    }


    public function add_vote($vote, $id_post) {
        DB::table('post_aura')->insert([
            'id_post' => $id_post,
            'id_voter' => Auth::user()->id,
            'upvote' => $vote
        ]);
    }


    public function vote($id_post, Request $request)
    {
        $vote = Auth::user()->hasVotedPost($id_post);
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        if ($vote === null) {
            $this->add_vote($request->input('vote'), $id_post);
        }


        else if (($vote->upvote == 1 && $request->input('vote') === 'true') || ($vote->upvote == 0 && $request->input('vote') === 'false')){
            DB::table('post_aura')
            ->where('id_voter', '=', Auth::user()->id)
            ->where('id_post', '=', $id_post)
            ->delete();
        }

        else {
            DB::table('post_aura')
            ->where('id_voter', '=', Auth::user()->id)
            ->where('id_post', '=', $id_post)
            ->update(['upvote' => $request->input('vote')]);
        }

        $post = NewsPost::find($id_post);

        return response()->json(array('votes' => $post->aura));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsPost $newsPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsPost $newsPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsPost $newsPost)
    {
        //
    }

    public function search(Request $request) {
        if ($request->has('query')) {
            $query = $request->input('query');
            $posts = NewsPost::whereRaw('search @@ plainto_tsquery(\'english\', ?)',  [$query])
                ->orderByRaw('ts_rank(search, plainto_tsquery(\'english\', ?)) DESC', [$query])
                ->orderBy('date_time', 'desc')
                ->get();

            $html = [];
            foreach($posts as $post){
                array_push($html, view('partials.postcard', ['post' => $post])->render());
            }
            return response()->json($html);
        }
    }
}
