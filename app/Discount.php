<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
	protected $table='discount';
    protected $fillable = ['image_url', 'image_name'];
    public $timestamps = true;
}
