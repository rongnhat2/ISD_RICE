<?php

namespace App;

class Cart
{
	public $items = null;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
		}
	}

	public function add($item){
        $name = $item->cart_name;
        $id = $item->cart_id;
        // dd($item->cart_id);
        $giohang = ['qty'=>0, 'name' => $name];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }
        $giohang['qty']++;
        $this->items[$id] = $giohang;
    }

    //xóa 1
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -= $this->items[$id]['item']['price'];
		if($this->items[$id]['qty']<=0){
			unset($this->items[$id]);
		}
	}
	//xóa nhiều
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
