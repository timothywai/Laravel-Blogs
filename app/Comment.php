<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table = 'comments';
	protected $fillable = [ 'comment', 'blog_id' ];
    //
	public function blog()
	{
		return $this->belongsTo('App\Blog');
	}
}
