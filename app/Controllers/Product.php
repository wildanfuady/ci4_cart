<?php namespace App\Controllers;

use App\Models\Product_model;
use Wildanfuady\WFcart\WFcart;

class Product extends BaseController
{

	public function __construct() {
	
		$this->product = new Product_model;
		$this->cart = new WFcart();
	
	}

	public function index()
	{
		
		$data['total'] = $this->cart->totals();
		// menampilkan semua data product yang ada di dalam database
		$data['items'] = $this->product->findAll();
		// menampilkan halaman view product dan membawa variabel data
		return view('product/index', $data);
	}

}
