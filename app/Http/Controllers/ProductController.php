<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //direct product list page
    public function list()
    {
        $product = Product::when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        $product->appends(request()->all());
        return view('admin.product.list', compact('product'));
    }

    //direct product create page
    public function createPage()
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.product.create', compact('categories'));
    }

    //direct create
    public function create(Request $request)
    {
        // dd($request->toArray());
        $this->productValidationCheck($request);
        $data = $this->getProductData($request);

        if ($request->hasFile('productImage')) {
            $fileName = uniqid() . $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        Product::create($data);
        return redirect()->route('product#list')->with(['createSuccess' => 'Product Created Successfully...']);
    }

    //direct edit page
    public function edit($id)
    {
        // dd($id);
        $product = Product::where('id', $id)->first();
        return view('admin.product.edit', compact('product'));
    }

    //direct delete product
    public function delete($id)
    {
        // dd($id);
        Product::where('id', $id)->delete();
        return redirect()->route('product#list')->with(['deleteSuccess' => 'Product Deleted Successfully...']);
    }

    //product validation check
    private function productValidationCheck($request)
    {
        Validator::make($request->all(), [
            'productName' => 'required|min:5|unique:products,name',
            'productCategory' => 'required',
            'productDescription' => 'required|min:10',
            'productImage' => 'required|mimes:jpg,jpeg,png,webp|file',
            'productPrice' => 'required',
            'productWaitingTime' => 'required'
        ])->validate();
    }

    //get product data
    private function getProductData($request)
    {
        return [
            'category_id' => $request->productCategory,
            'name' => $request->productName,
            'description' => $request->productDescription,
            'image' => $request->productImage,
            'price' => $request->productPrice,
            'waiting_time' => $request->productWaitingTime,
        ];
    }
}
