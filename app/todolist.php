<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as UserEloquent;
//use App\Comment as CommentEloquent;

class todolist extends Model
{
    //
	protected $fillable = [
		'title', 'content'
	];

	public function user(){
		return $this->belongsTo(UserEloquent::class);
	}

}
