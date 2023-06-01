<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('admin.product.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'price' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|file|max:2048',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('product');
        }

        Product::create($validatedData);
        return redirect('admin/product')->with('toast_success', 'Product Added Successfully!');
    }

    public function update(Request $request, $id)
    {
        $item = Product::findOrFail($id);
        $data = $request->except(['_token']);

        if($request->file('image')) {
            if($request->oldFoto){
                Storage::delete($request->oldFoto);
            }
            $data['image'] = $request->file('image')->store('product');
        }

        $item->update($data);
        return redirect('admin/product')->with('toast_success', 'Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        if($item->image){
            Storage::delete($item->image);
        }
        $item->delete();
        return redirect('admin/product')->with('toast_success', 'Product Deleted Successfully!');
    }
}
