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
        $popular_topics = DB::select(DB::raw('SELECT id, name, num_followers
                        FROM topic
                        NATURAL JOIN
                        (SELECT id_topic AS id, COUNT(*) AS num_followers FROM topic_follow GROUP BY id_topic) AS num_followers_topics
                        ORDER BY num_followers DESC
                        LIMIT 5;'));

        return view('pages.home', ['hall_of_fame' => $hall_of_fame, 'popular_topics' => $popular_topics]);
    }

    public function content($content, $page)
    {
        $data = null;
        switch ($content) {
            case "feed":
                if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

                $data = NewsPost::orderBy('date_time', 'desc')->forPage($page)->get();
                break;
            case "trending":
                $data = NewsPost::orderBy('date_time', 'desc')->forPage($page)->get();
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
}
