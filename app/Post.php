<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
