<?php

namespace App\Http\Controllers;
use Abraham\TwitterOAuth\TwitterOAuth;

use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index() {
        $api_key = 'mTYQ6vKh89XISoi1W8wKp0uZB';
        $api_key_secret = 'ODzqqHwZBgz8eB72AMBUBQpem3aJVEMyWnP5hadIpN6NH9KYi9';
        $access_token = '1172893121140576256-20tQIixFHQvSARnmHxetUIbdDGytfm';
        $access_token_secret = '4aVDjQcsSYm6O6yJ4aRuGxFqNEvjJ00jRqLOBsj8OIYTc';

        $connection = new TwitterOAuth($api_key, $api_key_secret, $access_token, $access_token_secret);
        $tweets_params = ['screen_name' => '{{@esty0083}}' ,'count' => '200'];
        $tweets = $connection->get('statuses/user_timeline', $tweets_params);

        dump("test");
        dd($tweets);

        return view('tweets.index', compact('tweets'));
    }
}
