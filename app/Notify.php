<?php

use App\Models\Notification;
use Illuminate\Support\Facades\Cache;

function newNotification($name, $message, $type, $user_id, $team_id)
{
    Notification::create([[
        'name' => $name,
        'message' => $message,
        'type' => $type,
        'user_id' => $user_id,
        'team_id' => $team_id,
    ]]);
    return true;
}

function is_admin()
{
    if (auth()->check()){
    if (auth()->user()->CurrentTeam->id == 1 || auth()->user()->CurrentTeam->id == 2) {
        return true;
    } else {
        return false;
    }}else{
        return false;
}
}

function  is_online($id)
{
                


    if (Cache::get('user:' . $id . ':online')) {
        return true;
    } else {
        return false;
    }
}
