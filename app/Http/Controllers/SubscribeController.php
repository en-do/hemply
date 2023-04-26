<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function join(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'min:6', 'max:255']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $ip = $request->header('x-real-ip') ?? $request->server('REMOTE_ADDR');
        $user_agent = $request->header('user-agent');

        $subsribe = new Subscribe;
        $subsribe->email = $request->email;
        $subsribe->ip = $ip;
        $subsribe->user_agent = $user_agent;
        $subsribe->source = $request->url();

        if($subsribe->save()) {
            return response()->json(['success' => 'Ви успішно підписані на оновлення'], 200);
        }

        return response()->json(['error' => 'Сталась помилка, повторіть пізніше'], 500);
    }
}
