<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subreddit extends Model
{
    public static function findByName($name)
    {
    	return DB::table('subreddits')->where('name', '=', $name)->first();
    }

    public static function findById($id)
    {
    	return DB::table('subreddits')->select('name')->where('id', '=', $id)->first();
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'sub_id');
    } 
}
