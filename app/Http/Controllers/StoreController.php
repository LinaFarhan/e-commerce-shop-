<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    // Dummy catalog used across methods
    private array $products = [
        ['id'=>1,'name'=>'Classic Sneakers','price'=>49.99,'on_sale'=>true,'description'=>'Light and comfy.'],
        ['id'=>2,'name'=>'Leather Boots','price'=>89.50,'on_sale'=>false,'description'=>'Durable everyday boots.'],
        ['id'=>3,'name'=>'Running Shoes','price'=>69.00,'on_sale'=>true,'description'=>'Breathable performance.'],
    ];

    public function index()
    {
        return view('shop.index');
    }

    public function products()
    {
        $products = $this->products; // dummy array
        return view('shop.products', compact('products'));
    }

    public function productDetails($id)
    {
        // Additional task: pick a single product (first match)
        $product = collect($this->products)->firstWhere('id', (int) $id) ?? $this->products[0];
        return view('shop.product-details', compact('product'));
    }

    public function cart()
    {
        return view('shop.cart');
    }

    public function about()
    {
        $title = 'E-Commerce store';
        $description = 'We are a small team passionate about quality products.';
        $rawHtml = '<div class="alert alert-info"><strong>Note:</strong> This is raw HTML rendered with {!! !!}.</div>';
        return view('shop.about-us', compact('title', 'description', 'rawHtml'));
    }

    public function contact()
    {
        return view('shop.contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|email',
            'message'=>'required|string|max:1000',
        ]);

        // Normally: store/send mail
        return back()->with('status', 'Message received! We will contact you soon.');
    }
}
