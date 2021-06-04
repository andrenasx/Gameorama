<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\NewsPost;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param \App\Models\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('pages.topic', ['topic' => $topic]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        if (!Auth::check()) return response()->json('Forbidden access', 403);
        $topic->delete();
    }

    public function content(Request $request, Topic $topic, $content)
    {
        if (!$request->has('page')) {
            return response()->json('No page provided', 400);
        }
        $page = $request->input('page');

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

        if (count($data) > 0) {
            $html = [];
            foreach ($data as $element) {
                array_push($html, view('partials.postcard', ['post' => $element])->render());
            }

            return response()->json($html);
        }

        return response()->json([view('partials.nocontent')->render()]);
    }

    private function trending($id_topic, $page)
    {
        $feed = [];
        $num_rows = ($page - 1) * 15;

        $aux = Topic::topic_trending_posts($id_topic, $num_rows);

        foreach ($aux as $auxIds) {
            array_push($feed, NewsPost::find($auxIds->id));
        }
        return $feed;
    }

    public function search(Request $request)
    {
        if ($request->has('query') && $request->has('page')) {
            $topics = Topic::search_topics($request->input('query'), $request->input('page'));

            if (count($topics) > 0) {
                $html = [];
                foreach ($topics as $topic) {
                    array_push($html, view('partials.topiccard', ['topic' => $topic])->render());
                }
                return response()->json($html);
            }
        }

        return response()->json([view('partials.nocontent')->render()]);
    }

    public function follow(Request $request, Topic $topic)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        $follow = $topic->isFollowed(Auth::user()->id);

        if ($follow === null) {
            Auth::user()->follow_topic($topic->id);
        }

        if ($request->input('userProfile') !== 'null') {
            $member = Member::find($request->input('userProfile'));
            return response()->json(array('followers' => $topic->followers->count(), 'followedTopics' => $member->topics->count()));
        } else {
            return response()->json(array('followers' => $topic->followers->count(), 'followedTopics' => null));
        }

    }

    public function unfollow(Request $request, Topic $topic)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        $follow = $topic->isFollowed(Auth::user()->id);

        if ($follow !== null) {
            Auth::user()->unfollow_topic($topic->id);
        }

        if ($request->input('userProfile') !== 'null') {
            $member = Member::find($request->input('userProfile'));
            return response()->json(array('followers' => $topic->followers->count(), 'followedTopics' => $member->topics->count()));
        } else {
            return response()->json(array('followers' => $topic->followers->count(), 'followedTopics' => null));
        }
    }


    public function report(Request $request, Topic $topic)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
        Auth::user()->report_topic($topic->id, $request->input('report'));
    }

    public function dismiss(Topic $topic)
    {
        if (!Auth::check() || !Auth::user()->admin) return response()->json(array('auth' => 'Forbidden Access'), 403);
        $topic->dismiss_report();
    }
}
