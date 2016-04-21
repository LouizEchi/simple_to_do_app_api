<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TweetRequest;
use App\Models\Tweet;
use DB;

class TweetController extends Controller
{

    public function store(TweetRequest $request)
    {
        return DB::transaction(function () use ($request)
        {
           Tweet::create([
                'tweet' => $request->get('tweet')
            ]);

           return $this->respondWithSuccess();
        });
    }

    public function show($tweet_text)
    {
        $tweet = Tweet::select('tweet')->tweet($tweet_text)->get();
        return $this->respondWithSuccess($tweet);
    }

    public function index()
    {
        $tweet = Tweet::select('tweet')->get();
        return $this->respondWithSuccess($tweet);
    }
}
