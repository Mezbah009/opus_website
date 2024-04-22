<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
    
            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
        
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);
                $newImageName = uniqid() . '.' . $ext; // Generate a unique filename
                $sPath = public_path() . '/temp/' . $tempImage->name;
                $dPath = public_path() . '/uploads/first_section/' . $newImageName;
        
                File::copy($sPath, $dPath);
        
                $section->logo = $newImageName;
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

        if (!empty($request->image_id)) {
            $tempImage = TempImage::find($request->image_id);
    
            $extArray = explode('.', $tempImage->name);
            $ext = last($extArray);
            $newImageName = $product->id . '.' . $ext;
            $sPath = public_path() . '/temp/' . $tempImage->name;
            $dPath = public_path() . '/uploads/first_section/' . $newImageName;
    
            File::copy($sPath, $dPath);
    
            $product->logo = $newImageName;
            $product->save();
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
