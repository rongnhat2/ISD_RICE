<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trademark extends Model
{
	protected $table='trademarks';
    protected $fillable = ['trademark_name'];
    public $timestamps = true;
}
