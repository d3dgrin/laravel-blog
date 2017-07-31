<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Post extends Model
{
	protected $fillable = [
        'title', 'slug', 'image', 'text', 'user_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
