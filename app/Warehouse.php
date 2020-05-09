<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
	protected $table='items';
    protected $fillable = ['username', 'id_item', 'qty_item'];
    public $timestamps = true;
}
