<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table='items';
    protected $fillable = ['category_id', 'item_name', 'item_size', 'item_discount', 'item_resource', 'item_trademark', 'item_prices', 'item_image', 'item_amounts', 'item_sell', 'item_detail'];
    public $timestamps = true;
}
