<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Vote;
use Log;
use Auth;

class VotesController extends Controller
{
	public function vote(Request $request)
	{    
		if (Auth::check()) {

			if ($request->ajax()) {
				$post = $request->input('post');
				$vote = $request->input('vote');
				$user = Auth::user()->id;

				// Grab the vote if it already exists.
				$entry = Vote::where('user_id', $user)->where('post_id', $post)->first();
				if ($entry) {
					$entry->vote = $vote;
					$entry->save();
					$post = Post::find($post);
					return [$post->totalVotes(), $post->id];
				} else {
					$entry = new Vote;
					$entry->user_id = $user;
					$entry->post_id = $post;
					$entry->vote = $vote;
					$entry->save();
					$post = Post::find($post);
					return [$post->totalVotes(), $post->id];
				}
			} else {
				Log::info("Not an AJAX request");
				abort(404);
			}
		} else {
			Log::info("User is not logged in");
			abort(404);
		}
	}
}