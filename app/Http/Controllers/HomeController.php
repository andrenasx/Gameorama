<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\NewsPost;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application home .
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hall_of_fame = Member::orderBy('aura', 'desc')->take(5)->get();

        $num_followers_topics = DB::table('topic_follow')
            ->select('id_topic', DB::raw('COUNT(*) AS num_followers'))
            ->groupBy('id_topic');

        $popular_topics = DB::table('topic')->joinSub($num_followers_topics, 'num_followers_topics', function($join) {
                $join->on('topic.id', '=', 'num_followers_topics.id_topic');
            })->orderBy('num_followers', 'desc')->limit(5)->get();

        return view('pages.home', ['hall_of_fame' => $hall_of_fame, 'popular_topics' => $popular_topics]);
    }

    public function content($content, $page)
    {
        $data = null;
        switch ($content) {
            case "feed":
                if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
                $data = $this->feed($page);
                break;
            case "trending":
                $data = $this->trending($page);
                break;
            case "latest":
                $data = NewsPost::orderBy('date_time', 'desc')->forPage($page)->get();
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

    private function feed($page)
    {
        $feed = [];
        $num_rows = $page * 15;
       
        /*$aux=DB::table("news_post")
        ->join("member","news_post.id_owner","=","member.id")
        ->whereIn("news_post.id",DB::select(
            "news_post.id",
            DB::table("news_post")
                ->join("post_topic","news_post.id","=","post_topic.id_post")
                ->join("topic","post_topic.id_topic","=","topic.id")
                ->join("member_follow","member_follow.id_follower","=",Auth::user()->id)
                ->whereIn("topic.name",
                    DB::select(
                        "name",
                        DB::table("topic")
                            ->join("topic_follow","topic.id","=","topic_follow.id_topic")
                            ->where("topic_follow.id_member","=",Auth::user()->id)
                            ->get(["name"])
                    ))
                ->orWhere("member_follow.id_followed","=","news_post.id_owner")
                ->get(["id"])
            )->distinct())
        ->orderBy("date_time","desc")
        ->forPage($page)
        ->get(["id"]);*/
        
        $aux= DB::select(DB::raw("SELECT news_post.id as id
        FROM news_post
        INNER JOIN member ON id_owner = member.id
        WHERE news_post.id IN
        (
            SELECT DISTINCT news_post.id FROM news_post 
            INNER JOIN post_topic ON news_post.id = post_topic.id_post
            INNER JOIN topic ON post_topic.id_topic = topic.id
            INNER JOIN member_follow ON member_follow.id_follower = ".Auth::user()->id."
            WHERE topic.name IN
            (
                SELECT name FROM topic
                INNER JOIN topic_follow ON topic.id = topic_follow.id_topic
                WHERE topic_follow.id_member = ".Auth::user()->id."
            )
            OR 
            member_follow.id_followed = id_owner
        ) ORDER BY date_time DESC
        OFFSET ".intval($num_rows)."
        FETCH NEXT 15 ROWS ONLY"));
        foreach($aux as $auxIds ){
            array_push($feed,NewsPost::find($auxIds->id));
        }
        return $feed;

    }
    private function trending($page)
    {
        $feed = [];
        $num_rows = ($page-1) * 15;

        /*$aux =DB::table('news_post')
            ->join("member","news_post.id_owner","=","member.id")
            ->whereRaw("date_time >= (now() - interval '1 days')")
            ->orderBy("news_post.aura","desc")
            ->forPage($page)->get();*/
        
        $aux= DB::select(DB::raw("SELECT news_post.id as id
            FROM news_post
            INNER JOIN member ON id_owner = member.id
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
