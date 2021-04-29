<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberImage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    public function show($username)
    {
        $member = Member::firstWhere('username', $username);
        if ($member == null) {
            return redirect(route('404'));
        }

        return view('pages.profile', ['member' => $member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        if (!Auth::check()) redirect('login');

        $member = Member::firstWhere('username', $username);
        if ($member == null) {
            return redirect(route('404'));
        }

        $this->authorize('update', $member);

        return view('pages.edit_profile', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */

    public function createImage(Request $request, $filename)
    {
        $file = $request->file($filename);
        $fileContent = file_get_contents($file->path());
        return MemberImage::create([
            'file' => base64_encode($fileContent)
        ]);
    }


    public function update(Request $request, $username)
    {
        if (!Auth::check()) redirect('login');

        $member = Member::firstWhere('username', $username);
        if ($member == null) {
            return redirect(route('404'));
        }

        $this->authorize('update', $member);

        $id_profile = $member->id_profile_image;
        $id_banner = $member->id_banner_image;

        if ($request->hasFile("profile_photo")) {
            $id_profile = $this->createImage($request, "profile_photo")->id;
        }

        if ($request->hasFile("banner_photo")) {
            $id_banner = $this->createImage($request, "banner_photo")->id;
        }

        DB::table('member')->where('username', $member->username)
        ->update(["full_name" => $request->input("full_name"),
        'bio' => $request->input("bio"),
        'id_profile_image' => $id_profile,
        'id_banner_image' => $id_banner
        ]);

        return redirect(route('profile', $member->username));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings($username) {
        if (!Auth::check()) redirect('login');

        $member = Member::firstWhere('username', $username);
        if ($member == null) {
            return redirect(route('404'));
        }

        $this->authorize('update', $member);

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
            'password' => ['required', 'string', 'min:8']
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
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            'new_password_confirmation' => ['required', 'string', 'min:8', 'same:new_password']
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
    public function destroy(Request $request, $username)
    {
        if (!Auth::check()) return response()->json('Forbidden Access', 403);

        $member = Member::firstWhere('username', $username);
        if ($member == null) {
            return view('pages.404');
        }

        if ($request->has('password')) {
            if (!Hash::check($request->input('password'), $member->password)) {
                return response()->json('Incorrect Password', 400);
            }

            Auth::logout();
        }

        $member->delete();
    }
}
