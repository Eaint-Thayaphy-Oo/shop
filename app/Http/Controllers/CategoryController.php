<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct list page
    public function list()
    {
        $categories = Category::when(request('key'), function ($query) {
            $query->where('name', 'like', '%' . request('key') . '%');
        })
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        // dd(request('key'));
        $categories->appends(request('key'));
        return view('admin.category.list', compact('categories'));
    }

    //direct create page
    public function createPage()
    {
        return view('admin.category.create');
    }

    //direct create
    public function create(Request $request)
    {
        // dd($request->all());
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);

        Category::create($data);
        return redirect()->route('category#list')->with(['createSuccess' => 'Category Created Successfully...']);
    }

    //direct delete
    public function delete($id)
    {
        // dd($id);
        Category::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Category Deleted Successfully...']);
    }

    //category validation check
    private function categoryValidationCheck($request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required|unique:categories,name'
        ])->validate();
    }

    //request category data
    private function requestCategoryData($request)
    {
        return [
            'name' => $request->categoryName,
        ];
    }
}
