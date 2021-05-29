<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PusherController extends Controller{

    public function pusherAuth(Request $request){
        $key = config('broadcasting.connections.pusher.key');
        $secret =  config('broadcasting.connections.pusher.secret');;
        $channel_name = $request->channel_name;
        $socket_id = $request->socket_id;
        $string_to_sign = $socket_id.':'.$channel_name;
        $signature = hash_hmac('sha256', $string_to_sign, $secret);
        return response()->json(['auth' => $key.':'.$signature]);
    }
}
