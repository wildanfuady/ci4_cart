<?php namespace App\Controllers;

use App\Models\Product_model;
// memanggil library / package WFcart
use Wildanfuady\WFcart\WFcart;

class Cart extends BaseController
{

	public function __construct() {

		// memanggil product model
		$this->product = new Product_model;
		// membuat variabel untuk menampung class WFcart
		$this->cart = new WFcart();
		// memanggil form helper
		helper('form');

	}

	public function index()
	{
		// membuat variabel untuk menampung total keranjang belanja
		$data['items'] = $this->cart->totals();
		// menampilkan total belanja dari semua pembelian
		$data['total'] = $this->cart->count_totals();
		// menampilkan halaman view cart
		return view('cart/index', $data);
	}

	public function beli($id = null)
	{
		// cari product berdasarkan id
		$product = $this->product->getProduct($id);
		// cek data product
		if($product != null){ // jika product tidak kosong

			// buat variabel array untuk menampung data product
			$item = [
				'id'		=> $product['id'],
				'name'		=> $product['name'],
				'price'		=> $product['price'],
				'photo'		=> $product['photo'],
				'quantity'	=> 1
			];
			// tambahkan product ke dalam cart
			$this->cart->add_cart($id, $item);
			// tampilkan nama product yang ditambahkan
			$product = $item['name'];
			// success flashdata
			session()->setFlashdata('success', "Berhasil memasukan {$product} ke karanjang belanja");
		} else {
			// error flashdata
			session()->setFlashdata('error', "Tidak dapat menemukan data product");
		}
		return redirect()->to('/product');
	}

	// function untuk update cart berdasarkan id dan quantity
	public function update()
	{
		// update cart
		$this->cart->update();
		return redirect()->to('/cart');
	}

	// function untuk menghapus cart berdasarkan id
	public function remove($id = null)
	{
		
		// cari product berdasarkan id
		$product = $this->product->getProduct($id);
		// cek data product
		if($product != null){ // jika product tidak kosong
			// hapus keranjang belanja berdasarkan id
			$this->cart->remove($id);
			// success flashdata
			session()->setFlashdata('success', "Berhasil menghapus product dari keranjang belanja");
		} else { // product tidak ditemukan
			// error flashdata
			session()->setFlashdata('error', "Tidak dapat menemukan data product");
		}
		return redirect()->to('/cart');
	}

}