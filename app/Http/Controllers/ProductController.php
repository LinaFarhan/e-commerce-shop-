<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $products = Product::all(); // جلب كل المنتجات
    return view('shop.products', compact('products'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('shop.create-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        //  رفع الصورة إذا وجدت
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // حفظ المنتج
        Product::create([
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price'       => $validated['price'],
            'on_sale'     => false,
            'image'       => $imagePath, // نحتاج نضيف عمود image بالـ migration
        ]);

        //  إعادة التوجيه مع رسالة نجاح
        return redirect()->route('shop.products')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
   public function show($id)
{
    $product = Product::find($id); // البحث عن المنتج حسب الـ id
    return view('shop.product-details', compact('product'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
