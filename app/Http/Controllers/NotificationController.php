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

class NotificationController extends Controller
{
    public function getNotificationsModal(Request $request)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
        $member = Member::find(Auth::user()->id);
        $htmlNotifications = [];
        if ($member !== null){
            foreach ($member->notifications as $notification) {
                if ($notification->type === "App\Notifications\FollowNotification"){
                    array_push($htmlNotifications, view('partials.follow_notification_card', ['notification'=>$notification])->render());
                }
                else if ($notification->type === "App\Notifications\CommentNotification"){
                    array_push($htmlNotifications, view('partials.comment_notification_card', ['notification'=>$notification])->render());
                }
                else if ($notification->type === "App\Notifications\ReplyNotification"){
                    array_push($htmlNotifications, view('partials.reply_notification_card', ['notification'=>$notification])->render());
                }
                
            }

            //dd($htmlNotifications);

            return response()->json(array('html' => $htmlNotifications));
        }
        
    }
}
