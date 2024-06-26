<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class DashboradController extends Controller
{
    public function index()
    {
        $tweets = Tweet::orderBy('created_at', 'DESC');

        if(request()->has('search'))
        {
            $tweets = $tweets->where('content', 'like', '%' . request()->get('search', '') . '%'); // where content like %test%
        }

        return view('welcome', [
            'tweets' => $tweets->paginate(5),
        ]);
    }
}
