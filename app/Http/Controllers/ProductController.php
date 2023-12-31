<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //direct product list page
    public function list()
    {
        $product = Product::select('products.*', 'categories.name as category_name')
            ->when(request('key'), function ($query) {
                $query->where('name', 'like', '%' . request('key') . '%');
            })
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->orderBy('products.created_at', 'desc')
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
        $this->productValidationCheck($request, "create");
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
        $product = Product::select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->where('id', $id)->first();
        return view('admin.product.edit', compact('product'));
    }

    //direct delete product
    public function delete($id)
    {
        // dd($id);
        Product::where('id', $id)->delete();
        return redirect()->route('product#list')->with(['deleteSuccess' => 'Product Deleted Successfully...']);
    }

    //direct update page
    public function update($id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::get();
        return view('admin.product.update', compact('product', 'category'));
    }

    //update page
    public function updatePage(Request $request)
    {
        $this->productValidationCheck($request, "update");
        $data = $this->getProductData($request);

        if ($request->hasFile('productImage')) {
            $oldImageName = Product::where('id', $request->productId)->first();
            $oldImageName = $oldImageName->image;
            // dd($oldImageName);

            if ($oldImageName != null) {
                Storage::delete('public/' . $oldImageName);
            }

            $fileName = uniqid() . $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;
        }

        Product::where('id', $request->productId)->update($data);
        return redirect()->route('product#list')->with(['updateSuccess' => 'Product Updated Successfully...']);
    }

    //product validation check
    private function productValidationCheck($request, $action)
    {
        $validationRules = [
            'productName' => 'required|min:5|unique:products,name,' . $request->productId,
            'productCategory' => 'required',
            'productDescription' => 'required|min:10',
            'productImage' => 'required|mimes:jpg,jpeg,png,webp,avif|file',
            'productPrice' => 'required',
            'productWaitingTime' => 'required'
        ];

        $validationRules['productImage'] = $action == "create" ? "required|mimes:jpg,jpeg,png,webp,avif|file" : "mimes:jpg,jpeg,png,webp,avif|file";

        Validator::make($request->all(), $validationRules)->validate();
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
