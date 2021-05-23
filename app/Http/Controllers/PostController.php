<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use App\Models\Member;
use App\Models\Topic;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        $topics = Topic::orderBy('name', 'asc')->get();
        return view('pages.create_post', ['topics' => $topics]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function post_validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:100'],
            'body' => ['nullable', 'string', 'max:255'],
            'topics' => ['required', 'array', 'between:1,10'],
            'topics.*' => ['string'],
            'images' => ['array', 'max:10'],
            'images.*' => ['image']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = $this->post_validator($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Initiate new post store transaction
        DB::beginTransaction();

        // Create a NewsPost
        try {
            $post = new NewsPost;

            $post->id_owner = Auth::user()->id;
            $post->title = $request->input('title');
            if ($request->has('body')) {
                $post->body = $request->input('body');
            }

            $post->save();
        } catch (ValidationException $e) {
            DB::rollBack();
            return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        // Get post id after inserting
        $id_post = $post->id;

        // Insert all Post Topics
        foreach ($request->input('topics') as $name) {
            try {
                DB::table('topic')->insertOrIgnore([['name' => $name]]);

                $id_topic = Topic::firstWhere('name', $name)->id;
                DB::table('post_topic')->insert(['id_post' => $id_post, 'id_topic' => $id_topic]);
            } catch (ValidationException $e) {
                DB::rollBack();
                return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        }

        // Insert Post Images
        if ($request->hasFile('images')) {
            $images = $request->file('images');

            $path = 'public/posts/' . $id_post;
            Storage::makeDirectory($path);

            foreach ($images as $image) {
                try {
                    DB::table('post_image')->insert(['id_post' => $id_post, 'file' => $image->hashName()]);
                    $image->store('public/posts/' . $id_post);
                } catch (ValidationException $e) {
                    DB::rollBack();
                    Storage::deleteDirectory($path);
                    return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
                } catch (\Exception $e) {
                    DB::rollBack();
                    Storage::deleteDirectory($path);
                    throw $e;
                }
            }
        }

        DB::commit();

        return redirect(route('post', ['id_post' => $id_post]));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\NewsPost $newsPost
     * @return \Illuminate\Http\Response
     */
    public function show($id_post)
    {
        $post = NewsPost::find($id_post);

        if ($post == NULL) {
            return redirect(route('404'));
        }

        return view('pages.post', ['post' => $post]);
    }


    public function add_vote($vote, $id_post)
    {
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
        } else if (($vote->upvote == 1 && $request->input('vote') === 'true') || ($vote->upvote == 0 && $request->input('vote') === 'false')) {
            DB::table('post_aura')
                ->where('id_voter', '=', Auth::user()->id)
                ->where('id_post', '=', $id_post)
                ->delete();
        } else {
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
     * @param \App\Models\NewsPost $newsPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id_post)
    {
        $post = NewsPost::find($id_post);

        if ($post == NULL) {
            return redirect(route('404'));
        }

        $topics = Topic::orderBy('name', 'asc')->get();
        return view('pages.edit_post', ['post' => $post, 'topics' => $topics]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NewsPost $newsPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_post)
    {
        $post = NewsPost::find($id_post);

        if ($post == NULL) {
            return redirect(route('404'));
        }

        $validator = $this->post_validator($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Initiate post update transaction
        DB::beginTransaction();

        // Update info
        try {
            $post->title = $request->input('title');
            if ($request->has('body')) {
                $post->body = $request->input('body');
            }

            $post->save();
        } catch (ValidationException $e) {
            DB::rollBack();
            return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        // Insert all new Post Topics
        foreach ($request->input('topics') as $name) {
            if (!$post->topics->containsStrict('name', $name)) {
                try {
                    DB::table('topic')->insertOrIgnore([['name' => $name]]);

                    $id_topic = Topic::firstWhere('name', $name)->id;
                    DB::table('post_topic')->insert(['id_post' => $post->id, 'id_topic' => $id_topic]);
                } catch (ValidationException $e) {
                    DB::rollBack();
                    return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
            }
        }

        foreach ($post->topics as $topic) {
            if(!in_array($topic->name, $request->input('topics'))) {
                try {
                    DB::table('post_topic')->where(['id_post' => $post->id, 'id_topic' => $topic->id])->delete();

                    // TODO Delete topic if no posts?
                    /*if ($topic->posts->count() === 0) {
                        $topic->delete();
                    }*/
                } catch (ValidationException $e) {
                    DB::rollBack();
                    return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
            }
        }

        // Insert Post Images
        /*if ($request->hasFile('images')) {
            $images = $request->file('images');

            $path = 'public/posts/' . $id_post;
            Storage::makeDirectory($path);

            foreach ($images as $image) {
                try {
                    DB::table('post_image')->insert(['id_post' => $id_post, 'file' => $image->hashName()]);
                    $image->store('public/posts/' . $id_post);
                } catch (ValidationException $e) {
                    DB::rollBack();
                    Storage::deleteDirectory($path);
                    return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
                } catch (\Exception $e) {
                    DB::rollBack();
                    Storage::deleteDirectory($path);
                    throw $e;
                }
            }
        }*/

        DB::commit();

        return redirect(route('post', ['id_post' => $id_post]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\NewsPost $newsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_post)
    {
        if (!Auth::check()) return response()->json('Forbidden Access', 403);

        $post = NewsPost::find($id_post);
        if ($post == NULL) {
            return response()->json('Not found', 404);
        }

        Storage::makeDirectory('public/posts/' . $id_post);

        $post->delete();
    }

    public function search(Request $request)
    {
        if ($request->has('query')) {
            $query = $request->input('query');
            $posts = NewsPost::whereRaw('search @@ plainto_tsquery(\'english\', ?)', [$query])
                ->orderByRaw('ts_rank(search, plainto_tsquery(\'english\', ?)) DESC', [$query])
                ->orderBy('date_time', 'desc')
                ->get();

            $html = [];
            foreach ($posts as $post) {
                array_push($html, view('partials.postcard', ['post' => $post])->render());
            }
            return response()->json($html);
        }
    }

    public function bookmark($id_post, Request $request)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
        $member = Member::find(Auth::user()->id);
        $post = NewsPost::find($id_post);


        $bookmark = $post->isBookmarked($member->id);

        if ($bookmark === null) {
            DB::table('post_bookmark')->insert([
                'id_bookmarker' => Auth::user()->id,
                'id_post' => $id_post,
            ]);
        }
    }

    public function removeBookmark($id_post, Request $request)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
        $member = Member::find(Auth::user()->id);
        $post = NewsPost::find($id_post);


        $bookmark = $post->isBookmarked($member->id);

        if ($bookmark !== null) {
            DB::table('post_bookmark')
                ->where('id_bookmarker', '=', Auth::user()->id)
                ->where('id_post', '=', $id_post)
                ->delete();
        }
    }


    public function report($id_post, Request $request)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
        DB::table('post_report')->insert([
            'id_reporter' => Auth::user()->id,
            'id_post' => $id_post,
            'body' => $request->input('report')
        ]);
    }

    public function dismiss($id_post)
    {
        DB::table('post_report')->where('id_post', '=', $id_post)
        ->delete();
    }
}
