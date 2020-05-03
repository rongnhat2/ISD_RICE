<?php

namespace App;

class Customer
{
	public $customer = null;

	public function __construct($customer){
		if($customer){
			$this->customer = $customer;
		}
	}
}
