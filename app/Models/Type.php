<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	protected $guarded = ['id'];
	public $timestamps = false;

	function __toString() {
		return $this->name;
	}
}
