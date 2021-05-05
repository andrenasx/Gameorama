<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\NewsPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TopicController extends Controller
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
        //
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
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $topic = Topic::firstWhere('name', $name);
        if ($topic == null) {
            return redirect(route('404'));
        }

        return view('pages.topic', ['topic' => $topic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }

    public function content($name, $content, $page)
    {
        $topic = Topic::firstWhere('name', $name);
        if ($topic == null) {
            return response()->json('Topic not found', 404);
        }

        $data = null;
        switch ($content) {
            case "trending":
                $data = $this->trending($topic->id, $page);
                break;
            case "latest":
                $data = $topic->posts()->orderBy('date_time', 'desc')->forPage($page)->get();
                break;
            default:
                return response()->json('Invalid content filter', 400);
        }

        $html = [];
        foreach ($data as $element) {
            array_push($html, view('partials.postcard', ['post' => $element])->render());
        }

        return response()->json($html);
    }

    private function trending($id_topic, $page)
    {
        $feed = [];
        $num_rows = ($page-1) * 15;

        $aux= DB::select(DB::raw("SELECT news_post.id as id
            FROM news_post
            INNER JOIN post_topic ON news_post.id = id_post AND ".$id_topic." = id_topic
            WHERE date_time >= (now() - interval '14 days')
            ORDER BY news_post.aura DESC
            OFFSET ".$num_rows." ROWS
            FETCH NEXT 15 ROWS ONLY"));

        foreach($aux as $auxIds ){
            array_push($feed,NewsPost::find($auxIds->id));
        }
        return $feed;
    }
}
