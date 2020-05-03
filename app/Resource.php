<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
	protected $table='resources';
    protected $fillable = ['resource_name'];
    public $timestamps = true;
}
