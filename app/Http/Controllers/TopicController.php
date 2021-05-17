<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\NewsPost;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            INNER JOIN post_topic ON news_post.id = id_post AND ? = id_topic
            WHERE date_time >= (now() - interval '14 days')
            ORDER BY news_post.aura DESC
            OFFSET ? ROWS
            FETCH NEXT 15 ROWS ONLY"), [$id_topic, $num_rows]);

        foreach($aux as $auxIds ){
            array_push($feed,NewsPost::find($auxIds->id));
        }
        return $feed;
    }

    public function search(Request $request) {
        if ($request->has('query')) {
            $query = $request->input('query');
            $topics = Topic::whereRaw('search @@ plainto_tsquery(\'english\', ?)',  [$query])
                ->orderByRaw('ts_rank(search, plainto_tsquery(\'english\', ?)) DESC', [$query])
                ->get();

            $html = [];
            foreach($topics as $topic){
                array_push($html, view('partials.topiccard', ['topic' => $topic])->render());
            }
            return response()->json($html);
        }
    }

    public function follow($id_topic, Request $request){
        Log::debug($id_topic);
        Log::debug($request);
    
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        $topic = Topic::find($id_topic);

        $follow = $topic->isFollowed(Auth::user()->id);
        
        if ($follow === null) {
            DB::table('topic_follow')->insert([
                'id_topic' => $id_topic,
                'id_member' => Auth::user()->id,
            ]);
        }
        else {
            DB::table('topic_follow')
            ->where('id_topic', '=', $id_topic)
            ->where('id_member', '=', Auth::user()->id)
            ->delete();
        }

        
        $htmlFollowedTopics = [];
        if ($request->input('userProfile') !== '-1'){
            $pageMember = Member::find($request->input('userProfile'));
            foreach ($pageMember->topics as $topic) {
                array_push($htmlFollowedTopics, view('partials.topic_card', ['topic'=>$topic])->render());
            }
            return response()->json(array('followers' => $topic->followers->count(), 'htmlFollowedTopics' => $htmlFollowedTopics, 'followedTopics' => $pageMember->topics->count()));
        }
        
    
        return response()->json(array('followers' => $topic->followers->count(), 'htmlFollowedTopics' => $htmlFollowedTopics, ));
    

    }


    public function report($id_topic, Request $request){

    }



}
