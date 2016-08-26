<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
	protected $table = 'posts';

	public static $rules = [
		'sub_id' => 'required',
		'title' => 'required|max:100',
		'content' => 'required',
		'url' => 'url'
		];

		public function getTitleAttribute($value)
		{
			return $value;
		}

		public function setTitleAttribute($value)
		{

		}

		// public function getCreatedAtAttribute($value)
		// {
		// 	return Carbon::now($value)->diffForHumans();
		// }

		public function author()
		{
			// SELECT * FROM users WHERE id = $post->created_by
			return $this->belongsTo(User::class, 'created_by');
		}

		public function subreddit()
		{
			return $this->belongsTo(Subreddit::class, 'sub_id');
		}

		public function votes()
		{
			return $this->hasMany(Vote::class, 'post_id');
		}

    public function upvotes() 
    {
    	return $this->votes()->where('vote', 1)->count();
    }

    public function downvotes() 
    {
    	return $this->votes()->where('vote', 0)->count();
    }

    public function totalVotes() 
    {
    	return $this->upvotes() - $this->downvotes();
    }

    public function userVote($user)
    {
        return $this->votes()->where('user_id', '=', $user->id)->first();
    }


    public function hasBeenUpvoted()
    {
    	return Auth::check() && !is_null($this->userVote(Auth::user())) && $this->userVote(Auth::user())->vote;
    }

    public function hasBeenDownvoted()
    {
    	return Auth::check() && !is_null($this->userVote(Auth::user())) && !$this->userVote(Auth::user())->vote;
    }

}
