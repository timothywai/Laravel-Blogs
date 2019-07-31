<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	protected $table = 'blogs';
	protected $fillable = [ 'title', 'content', 'user_id' ];
    //
	public function comments()
	{
		return $this->hasMany('App\Comment', 'blog_id');
	}

	public function addComment($new_comment)
	{
		$this->comments()->create(['comment' => $new_comment]);
	}
}
