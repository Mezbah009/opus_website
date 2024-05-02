<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFirstSection;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)

    {
        $sections = Product::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.products.list', compact('sections'));
    }

    public function show($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);
        $first_sec = ProductFirstSection::where('product_id', $product->id)->first();

        // Return the view with the product details
        return view('admin.products.show', compact('product', 'first_sec'));
    }

    public function create()
    {
        return view('admin.products.create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'button_name' => 'nullable|string',
            'slug' => 'nullable|string',
            'fin_cat' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for logo
        ]);

        if ($validator->passes()) {
            $section = new Product();
            $section->title = $request->title;
            $section->description = $request->description;
            $section->button_name = $request->button_name;
            $section->fin_cat = $request->fin_cat;
            $section->link = $request->slug;

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
            'fin_cat' => 'nullable|string',
            'slug' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for logo
        ]);

        if ($validator->passes()) {
            $product = Product::findOrFail($id);
            $product->title = $request->title;
            $product->description = $request->description;
            $product->button_name = $request->button_name;
            $product->fin_cat = $request->fin_cat;
            $product->link = $request->slug;

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


    // First Section

    public function indexFirstSection(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $sections = ProductFirstSection::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.product_first_section.list', compact('sections'));
    }

    public function createFirstSection($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_first_section.create', compact('product'));
    }

    public function storeFirstSection($id, Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'product_id' => 'nullable|exists:products,id',
            'title' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brochure' => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($validator->passes()) {

            $product = Product::findOrFail($id);
            // dd($product);

            $section = new ProductFirstSection();
            $section->title = $request->title;
            $section->product_id = $product->id;


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'image' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/first_section'), $imageName);
                $section->image = $imageName;
            }

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = 'logo' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/first_section'), $logoName);
                $section->logo = $logoName;
            }

            if ($request->hasFile('brochure')) {
                $brochure = $request->file('brochure');
                $brochureName = 'brochure' . time() . '.' . $brochure->getClientOriginalExtension();
                $brochure->move(public_path('uploads/first_section'), $brochureName);
                $section->brochure = $brochureName;
            }

            $section->save();

            // dd("Section saved");

            return redirect()->route('products.show', $product->id)->with('success', 'Product First Section added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function editFirstSection($id)

    {
        $section = ProductFirstSection::findOrFail($id);
        return view('admin.product_first_section.edit', compact('section'));
    }

    public function updateFirstSection(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brochure' => 'nullable|mimes:pdf|max:10240',
        ]);

        if ($validator->passes()) {
            // Find the ProductFirstSection record to update
            $product = Product::findOrFail($request->product_id);

            $section = ProductFirstSection::findOrFail($id);
            $section->title = $request->title;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'image' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/first_section'), $imageName);
                $section->image = $imageName;
            }

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = 'logo' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/first_section'), $logoName);
                $section->logo = $logoName;
            }

            if ($request->hasFile('brochure')) {
                $brochure = $request->file('brochure');
                $brochureName = 'brochure' . time() . '.' . $brochure->getClientOriginalExtension();
                $brochure->move(public_path('uploads/first_section'), $brochureName);
                $section->brochure = $brochureName;
            }

            $section->save();

            // Redirect to index page
            return redirect()->route('products.show', $product->id)->with('success', 'Product First Section updated successfully');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }


    public function destroyFirstSection($id)
    {
        $section = ProductFirstSection::findOrFail($id);
        $section->delete();

        // Flash success message
        session()->flash('success', 'Product First Section deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Product First Section deleted successfully'
        ]);
    }
}
