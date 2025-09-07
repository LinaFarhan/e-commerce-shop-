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
 public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('shop.edit-product', compact('product'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'on_sale' => 'nullable|boolean',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // تحديث الحقول
    $product->name = $validated['name'];
    $product->description = $validated['description'];
    $product->price = $validated['price'];
    $product->on_sale = $request->has('on_sale');

    // تحديث الصورة إذا رفعت
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }

    $product->save();

    return redirect()->route('shop.products')
                     ->with('success', 'Product updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
