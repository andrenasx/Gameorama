<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotificationsModal(Request $request)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
        $member = Member::find(Auth::user()->id);
        $htmlNotifications = [];
        if ($member !== null) {
            foreach ($member->notifications as $notification) {
                if ($notification->type === "App\Notifications\FollowNotification") {
                    if ($notification->read_at !== null)
                        array_push($htmlNotifications, view('partials.follow_notification_card', ['notification' => $notification])->render());
                    else
                        array_push($htmlNotifications, view('partials.follow_notification_unread_card', ['notification' => $notification])->render());
                } else if ($notification->type === "App\Notifications\CommentNotification") {
                    if ($notification->read_at !== null)
                        array_push($htmlNotifications, view('partials.comment_notification_card', ['notification' => $notification])->render());
                    else
                        array_push($htmlNotifications, view('partials.comment_notification_unread_card', ['notification' => $notification])->render());
                } else if ($notification->type === "App\Notifications\ReplyNotification") {
                    if ($notification->read_at !== null)
                        array_push($htmlNotifications, view('partials.reply_notification_card', ['notification' => $notification])->render());
                    else
                        array_push($htmlNotifications, view('partials.reply_notification_unread_card', ['notification' => $notification])->render());

                }

            }
            return response()->json($htmlNotifications);
        }
    }

    public function readUnreadNotifications(Request $request)
    {
        if (!Auth::check()) return response()->json(array('auth' => 'Forbidden Access'), 403);
        $member = Member::find(Auth::user()->id);
        if ($member !== null) {
            foreach ($member->notifications as $notification) {
                if ($notification->read_at === null) {
                    $notification->markAsRead();
                }
            }
            return response()->json(0);
        }
    }

    public function delete($id_notification, Request $request)
    {
        $notification = Notification::find($id_notification);
        $notification->delete();
        return response()->json($id_notification);
    }
}
