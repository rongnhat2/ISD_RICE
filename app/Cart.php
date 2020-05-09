<?php

namespace App;

class Cart
{
	public $items = null;
	public $itemPrice = 0;
	public $totalQty = 0;

	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->itemPrice = $oldCart->itemPrice;
			$this->totalQty = $oldCart->totalQty;
		}
	}


	public function add($item){
        // $name = 'name';
        $id = $item->cart_id;
        $amount = $item->cart_amount;
        $itemPrice = $item->item_prices;
        
        // dd($amount);
        $giohang = ['qty'=>0, 'id' => $id];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }
        $giohang['qty'] += $amount;
        $this->totalQty += $amount;
        $this->itemPrice = $itemPrice;
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
	public function removeItem($id, $amount){
		// dd($this->items[$id]);
		$this->totalQty -= $amount;
		// dd($this->totalQty);
		// $this->totalQty -= $this->items[$id]['qty'];
		// $this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}
}
