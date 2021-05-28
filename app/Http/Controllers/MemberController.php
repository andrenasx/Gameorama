<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Notifications\FollowNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
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
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('pages.profile', ['member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        if (!Auth::check()) return redirect('login');
        $this->authorize('owner', $member);

        return view('pages.edit_profile', ['member' => $member]);
    }


    private function create_avatar_image($file, $member)
    {
        $path = 'public/members/'.$member->id;
        if (!File::exists($path)) {
            Storage::makeDirectory($path);
        }

        if ($member->avatar_image !== "default_avatar.png" ) {
            Storage::delete('public/members/'.$member->avatar_image);
        }

        $file->store($path);
        return $file->hashName();
    }

    private function create_banner_image($file, $member) {
        $path = 'public/members/'.$member->id;
        if (!File::exists($path)) {
            Storage::makeDirectory($path);
        }

        if ($member->banner_image !== "default_banner.jpg" ) {
            Storage::delete('public/members/'.$member->banner_image);
        }

        $file->store($path);
        return $file->hashName();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        if (!Auth::check()) return redirect('login');
        $this->authorize('owner', $member);

        $member->full_name = $request->input("full_name");
        $member->bio = $request->input("bio");

        if ($request->hasFile("profile_photo")) {
            $member->avatar_image = $member->id.'/'.$this->create_avatar_image($request->file("profile_photo"), $member);
        }

        if ($request->hasFile("banner_photo")) {
            $member->banner_image = $member->id.'/'.$this->create_banner_image($request->file("banner_photo"), $member);
        }

        $member->save();

        return redirect(route('profile', ['member' => $member->username]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings(Member $member) {
        if (!Auth::check()) return redirect('login');
        $this->authorize('owner', $member);

        return view('pages.settings', ['member' => $member]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function change_email_validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'unique:member'],
            'email_confirmation' => ['required', 'string', 'email', 'same:email'],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&-])[A-Za-z\d@#$!%*?&-]{8,}$/']
        ]);
    }

    public function change_email(Request $request) {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        $validator = $this->change_email_validator($request->all());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $member = Auth::user();
        if (!Hash::check($request->input('password'), $member->password)) {
            return response()->json(array('password' => 'Incorrect Password'), 400);
        }

        $member->email = $request->input("email");
        $member->save();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function change_password_validator(array $data)
    {
        return Validator::make($data, [
            'old_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&-])[A-Za-z\d@#$!%*?&-]{8,}$/', 'confirmed'],
            'new_password_confirmation' => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#@$!%*?&-])[A-Za-z\d@#$!%*?&-]{8,}$/', 'same:new_password']
        ]);
    }

    public function change_password(Request $request) {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);

        $validator = $this->change_password_validator($request->all());
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $member = Auth::user();

        if (!Hash::check($request->input('old_password'), $member->password)) {
            return response()->json(array('old_password' => 'Incorrect Password'), 400);
        }

        $member->password = Hash::make($request->input("new_password"));
        $member->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Member $member)
    {
        if (!Auth::check()) return response()->json('Forbidden Access', 403);
        $this->authorize('delete', $member);

        if ($request->has('password')) {
            if (!Hash::check($request->input('password'), $member->password)) {
                return response()->json('Incorrect Password', 400);
            }

            Auth::logout();
        }

        Storage::deleteDirectory('public/members/'.$member->id);

        $member->delete();
    }

    public function content(Member $member, $content, $page)
    {
        $data = null;
        $type = "";
        switch ($content) {
            case "posts":
                $data = $member->posts()->orderBy('date_time', 'desc')->forPage($page)->get();
                $type = 'post';
                break;
            case "comments":
                $data = $member->comments()->orderBy('date_time', 'desc')->forPage($page)->get();
                $type = 'comment';
                break;
            case "bookmarked":
                $this->authorize('owner', $member);
                $data = $member->bookmarks()->orderBy('date_time', 'desc')->forPage($page)->get();
                $type = 'post';
                break;
            default:
                return response()->json('Invalid content filter', 400);
        }

        $html = [];
        foreach ($data as $element) {
            array_push($html, view('partials.'.$type.'card', [$type => $element])->render());
        }

        return response()->json($html);
    }


    public function search(Request $request) {
        if ($request->has('query')) {
            $query = $request->input('query');
            $members = Member::whereRaw('search @@ plainto_tsquery(\'english\', ?)',  [$query])
                ->orderByRaw('ts_rank(search, plainto_tsquery(\'english\', ?)) DESC', [$query])
                ->orderBy('aura', 'desc')
                ->get();

            $html = [];
            foreach($members as $member){
                array_push($html, view('partials.membercard', ['member' => $member])->render());
            }
            return response()->json($html);
        }
    }

    public function follow(Request $request, Member $member)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
        $followingMember = Member::find(Auth::user()->id);
        $followedMember = Member::find($member->id);

        $follow = $followedMember->isFollowed(Auth::user()->id);

        if ($follow === null) {
            Auth::user()->follow_member($member->id);
            $followedMember->notify(new FollowNotification($followingMember->username));
        }

        if ($request->input('userProfile') !== null){
            $id_page = $request->input('userProfile');
            $pageMember = Member::find($id_page);
            return response()->json(array('followers' => $pageMember->followers->count(), 'following' => $pageMember->following->count()));
        }
    }


    public function unfollow(Request $request, Member $member)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
        $followingMember = Member::find(Auth::user()->id);
        $followedMember = Member::find($member->id);

        $follow = $followedMember->isFollowed(Auth::user()->id);

        if ($follow !== null) {
            Auth::user()->unfollow_member($member->id);
        }

        if ($request->input('userProfile') !== null){
            $id_page = $request->input('userProfile');
            $pageMember = Member::find($id_page);
            return response()->json(array('followers' => $pageMember->followers->count(), 'following' => $pageMember->following->count()));
        }
    }

    public function getFollowingModal(Request $request, Member $member)
    {
        $htmlFollowing = [];
        foreach ($member->following as $follow) {
            array_push($htmlFollowing, view('partials.profile_card', ['member' => $follow])->render());
        }
        return response()->json($htmlFollowing);
    }

    public function getFollowersModal(Request $request, Member $member)
    {
        $htmlFollowers = [];
        foreach ($member->followers as $follower) {
            array_push($htmlFollowers, view('partials.profile_card', ['member' => $follower])->render());
        }
        return response()->json($htmlFollowers);
    }

    public function getFollowedTopicsModal(Request $request, Member $member)
    {
        $htmlFollowedTopics = [];
        foreach ($member->topics as $topic) {
            array_push($htmlFollowedTopics, view('partials.topic_card', ['topic' => $topic])->render());
        }
        return response()->json($htmlFollowedTopics);
    }


    public function report(Request $request, Member $member){
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
        DB::table('member_report')->insert([
            'id_reporter' => Auth::user()->id,
            'id_reported' => $member->id,
            'body' => $request->input('report')
        ]);
    }

    public function dismiss(Member $member)
    {
        DB::table('member_report')->where('id_reported', '=', $member->id)
        ->delete();
    }
}
