<?php

namespace App\Http\Controllers;

use App\Events\NotificationSent;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function send(Request $request)
    {
        event(new NotificationSent('My first real-time notification'));

        return response()->json(['sent' => true]);
    }
}
