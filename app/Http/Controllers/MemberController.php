<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

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

        if ($member != NULL) {
            return view('pages.profile', ['member' => $member]);
        }

        return view('pages.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($username) {
        $member = Member::firstWhere('username', $username);
        if ($member != NULL) {
            return view('pages.edit_profile', ['member' => $member]);
        }

        return view('pages.404');
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
        
        $member = Member::firstWhere('username', $username);
        
        $id_banner = $member->id_banner_image;
        $id_profile = $member->id_profile_image;
        
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
        
        return redirect("/member/". $member->username);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings($username) {
        $member = Member::firstWhere('username', $username);
        if ($member != NULL) {
            return view('pages.settings', ['member' => $member]);
        }

        return view('pages.404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
