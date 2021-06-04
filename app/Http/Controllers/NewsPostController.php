<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use App\Models\Member;
use App\Models\PostReport;
use App\Models\Topic;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsPostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) return redirect('login');

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
            'title' => ['required', 'string'],
            'body' => ['nullable', 'string'],
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
        if (!Auth::check()) return redirect('login');

        $validator = $this->post_validator($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Initiate new post store transaction
        DB::beginTransaction();

        // Create a NewsPost
        try {
            $newspost = new NewsPost;

            $newspost->id_owner = Auth::user()->id;
            $newspost->title = $request->input('title');
            if ($request->has('body')) {
                $newspost->body = $request->input('body');
            }

            $newspost->save();
        } catch (ValidationException $e) {
            DB::rollBack();
            return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        // Get post id after inserting
        $id_post = $newspost->id;

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

        return redirect(route('post', ['newspost' => $id_post]));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\NewsPost $newsPost
     * @return \Illuminate\Http\Response
     */
    public function show(NewsPost $newspost)
    {
        return view('pages.post', ['post' => $newspost]);
    }


    public function vote(Request $request, NewsPost $newspost)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        $vote = Auth::user()->hasVotedPost($newspost->id);
        if ($vote === null) {
            Auth::user()->add_post_vote($request->input('vote'), $newspost->id);
        } else if (($vote->upvote == 1 && $request->input('vote') === 'true') || ($vote->upvote == 0 && $request->input('vote') === 'false')) {
            Auth::user()->remove_post_vote($newspost->id);
        } else {
            Auth::user()->update_post_vote($newspost->id, $request->input('vote'));

        }

        $newspost->refresh();
        return response()->json(array('votes' => $newspost->aura));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\NewsPost $newsPost
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsPost $newspost)
    {
        if (!Auth::check()) return redirect('login');
        $this->authorize('owner', $newspost);

        $topics = Topic::orderBy('name', 'asc')->get();
        return view('pages.edit_post', ['post' => $newspost, 'topics' => $topics]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NewsPost $newsPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsPost $newspost)
    {
        if (!Auth::check()) return response()->json('Forbidden access', 403);
        $this->authorize('owner', $newspost);

        $validator = $this->post_validator($request->all());
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Initiate post update transaction
        DB::beginTransaction();

        // Update info
        try {
            $newspost->title = $request->input('title');
            if ($request->has('body')) {
                $newspost->body = $request->input('body');
            }

            $newspost->save();
        } catch (ValidationException $e) {
            DB::rollBack();
            return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        // Insert all new Post Topics
        foreach ($request->input('topics') as $name) {
            if (!$newspost->topics->containsStrict('name', $name)) {
                try {
                    DB::table('topic')->insertOrIgnore([['name' => $name]]);

                    $id_topic = Topic::firstWhere('name', $name)->id;
                    DB::table('post_topic')->insert(['id_post' => $newspost->id, 'id_topic' => $id_topic]);
                } catch (ValidationException $e) {
                    DB::rollBack();
                    return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
            }
        }

        // Delete removed topics
        foreach ($newspost->topics as $topic) {
            if (!in_array($topic->name, $request->input('topics'))) {
                try {
                    DB::table('post_topic')->where(['id_post' => $newspost->id, 'id_topic' => $topic->id])->delete();
                } catch (ValidationException $e) {
                    DB::rollBack();
                    return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
            }
        }


        if ($request->hasFile('images')) {
            // Delete old images
            foreach ($newspost->images as $image) {
                try {
                    Storage::delete('public/posts/' . $newspost->id . '/' . $image->file);
                    DB::table('post_image')->where(['id_post' => $newspost->id, 'file' => $image->file])->delete();
                } catch (ValidationException $e) {
                    DB::rollBack();
                    return back()->withErrors(['dberror' => $e->getMessage()])->withInput();
                } catch (\Exception $e) {
                    DB::rollBack();
                    throw $e;
                }
            }


            // Insert new Post Images
            $images = $request->file('images');

            $path = 'public/posts/' . $newspost->id;
            Storage::makeDirectory($path);

            foreach ($images as $image) {
                try {
                    DB::table('post_image')->insert(['id_post' => $newspost->id, 'file' => $image->hashName()]);
                    $image->store('public/posts/' . $newspost->id);
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

        return redirect(route('post', ['newspost' => $newspost->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\NewsPost $newsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsPost $newspost)
    {
        if (!Auth::check()) return response()->json('Forbidden access', 403);
        $this->authorize('delete', $newspost);

        Storage::deleteDirectory('public/posts/' . $newspost->id);

        $newspost->delete();
    }


    public function search(Request $request)
    {
        if ($request->has('query') && $request->has('page')) {
            $posts = NewsPost::search_posts($request->input('query'), $request->input('page'));

            if (count($posts) > 0) {
                $html = [];
                foreach ($posts as $post) {
                    array_push($html, view('partials.postcard', ['post' => $post])->render());
                }
                return response()->json($html);
            }
        }

        return response()->json([view('partials.nocontent')->render()]);
    }


    public function bookmark(NewsPost $newspost)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        $bookmark = $newspost->isBookmarked(Auth::user()->id);

        if ($bookmark === null) {
            Auth::user()->bookmark_post($newspost->id);
        }
    }

    public function removeBookmark(NewsPost $newspost)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        $bookmark = $newspost->isBookmarked(Auth::user()->id);

        if ($bookmark !== null) {
            Auth::user()->remove_post_bookmark($newspost->id);
        }
    }


    public function report(Request $request, NewsPost $newspost)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        Auth::user()->add_post_report($newspost->id, $request->input('report'));
    }

    public function dismiss(NewsPost $newspost)
    {
        if (!Auth::check() || !Auth::user()->admin) return response()->json(array('auth' => 'Forbidden Access'), 403);

        $newspost->dismiss_post_report();
    }
}
