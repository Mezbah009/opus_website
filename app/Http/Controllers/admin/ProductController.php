<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sections = Product::latest();
        if(!empty($request->get('keyword'))){
            $sections = $sections->where('title','like','%'.$request->get('keyword').'%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.products.list',compact('sections'));
    }

    public function create()
    {
        return view('admin.products.create');
    }


    public function store(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'title' => 'required|string',
        'description' => 'nullable|string',
        'button_name' => 'nullable|string',
        'link' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for logo
    ]);

    if ($validator->passes()) {
        $section = new Product();
        $section->title = $request->title;
        $section->description = $request->description;
        $section->button_name = $request->button_name;
        $section->link = $request->link;

        // Save logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/first_section'), $logoName);
            $section->logo = $logoName;
        }

        $section->save();

        // Redirect to index page
        return redirect()->route('products.index')->with('success', 'Section added successfully');
    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }
}


public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'title' => 'required|string',
        'description' => 'nullable|string',
        'button_name' => 'nullable|string',
        'link' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for logo
    ]);

    if ($validator->passes()) {
        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->button_name = $request->button_name;
        $product->link = $request->link;

        // Update logo if provided
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/first_section'), $logoName);
            $product->logo = $logoName;
        }

        $product->save();

        // Redirect to index page
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }
}

public function destroy($id)
{
    $section = Product::findOrFail($id);
    $section->delete();

    // Flash success message
    session()->flash('success', 'Product deleted successfully');

    // Return JSON response
    return response()->json([
        'status' => true,
        'message' => 'Product deleted successfully'
    ]);
}

}
