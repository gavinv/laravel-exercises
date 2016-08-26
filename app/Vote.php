<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
	public function post()
	{
		return $this->belongsTo(Post::class, 'post_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public static function findByUser($userId)
	{
		// return Vote::join('posts', 'posts.id', '=', 'votes.post_id')->where('posts.created_by', $userId)->count();
	}
}
