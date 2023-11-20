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

    //direct edit page
    public function edit($id)
    {
        // dd($id);
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    //direct update page
    public function update(Request $request)
    {
        // dd($id, $request->all());
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);

        Category::where('id', $request->categoryId)->update($data);
        return redirect()->route('category#list')->with(['updateSuccess' => 'Category Updated Successfully...']);
    }

    //category validation check
    private function categoryValidationCheck($request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required|min:4|unique:categories,name,' . $request->categoryId
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
