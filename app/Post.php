<?php namespace App;

use Baum\Extensions\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

	use SoftDeletes;

	protected $fillable = [
		'title',
		'text',
	];

} 