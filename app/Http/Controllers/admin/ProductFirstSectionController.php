<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFirstSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductFirstSectionController extends Controller
{
//     public function index(Request $request)
//     {
//         $product = Product::findOrFail($request->product_id);
//         $sections = ProductFirstSection::latest();
//         if(!empty($request->get('keyword'))){
//             $sections = $sections->where('title','like','%'.$request->get('keyword').'%');
//         }
//         $sections = $sections->latest()->paginate(10);
//         return view('admin.product_first_section.list',compact('sections'));
//     }

//     public function create($id)
//     {
//         $product = Product::findOrFail($id);
//         return view('admin.product_first_section.create', compact('product'));
//     }

//     public function store($id,Request $request)
//     {
//         // dd($request->all());
//         // Validate the request data
//         $validator = Validator::make($request->all(), [
//             'product_id' => 'nullable|exists:products,id',
//             'title' => 'nullable|string',
//             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//             'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//             'brochure' => 'nullable|mimes:pdf|max:10240',
//         ]);

//         if ($validator->passes()) {

//             $product = Product::findOrFail($id);
//             // dd($product);

//             $section = new ProductFirstSection();
//             $section->title = $request->title;
//             $section->product_id = $product->id;


//             if ($request->hasFile('image')) {
//                 $image = $request->file('image');
//                 $imageName = 'image' . time() . '.' . $image->getClientOriginalExtension();
//                 $image->move(public_path('uploads/first_section'), $imageName);
//                 $section->image = $imageName;
//             }

//             if ($request->hasFile('logo')) {
//                 $logo = $request->file('logo');
//                 $logoName = 'logo' . time() . '.' . $logo->getClientOriginalExtension();
//                 $logo->move(public_path('uploads/first_section'), $logoName);
//                 $section->logo = $logoName;
//             }

//             if ($request->hasFile('brochure')) {
//                 $brochure = $request->file('brochure');
//                 $brochureName = 'brochure' . time() . '.' . $brochure->getClientOriginalExtension();
//                 $brochure->move(public_path('uploads/first_section'), $brochureName);
//                 $section->brochure = $brochureName;
//             }

//             $section->save();

//             // dd("Section saved");

//             return redirect()->route('products.show', $product->id)->with('success', 'Product First Section added successfully');

//         } else {
//             return response()->json([
//                 'status' => false,
//                 'errors' => $validator->errors()
//             ]);
//         }
//     }

//     public function edit($id)
//     {
//         $section = ProductFirstSection::findOrFail($id);
//         return view('admin.product_first_section.edit')->with('section', $section);
//     }

//     {
//         $section = ProductFirstSection::findOrFail($id);
//         return view('admin.product_first_section.edit', compact('section'));
//     }

//     public function update(Request $request, $id)
// {
//     $validator = Validator::make($request->all(), [
//         'title' => 'nullable|string',
//         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         'brochure' => 'nullable|mimes:pdf|max:10240',
//     ]);

//     if ($validator->passes()) {
//         // Find the ProductFirstSection record to update
//         $section = ProductFirstSection::findOrFail($id);
//         $section->title = $request->title;

//         if ($request->hasFile('image')) {
//             $image = $request->file('image');
//             $imageName = 'image' . time() . '.' . $image->getClientOriginalExtension();
//             $image->move(public_path('uploads/first_section'), $imageName);
//             $section->image = $imageName;
//         }

//         if ($request->hasFile('logo')) {
//             $logo = $request->file('logo');
//             $logoName = 'logo' . time() . '.' . $logo->getClientOriginalExtension();
//             $logo->move(public_path('uploads/first_section'), $logoName);
//             $section->logo = $logoName;
//         }

//         if ($request->hasFile('brochure')) {
//             $brochure = $request->file('brochure');
//             $brochureName = 'brochure' . time() . '.' . $brochure->getClientOriginalExtension();
//             $brochure->move(public_path('uploads/first_section'), $brochureName);
//             $section->brochure = $brochureName;
//         }

//         $section->save();

//         // Redirect to index page
//         return redirect()->route('product_first_section.index')->with('success', 'Product First Section updated successfully');
//     } else {
//         return back()->withErrors($validator)->withInput();
//     }
// }


// public function destroy($id)
// {
//     $section = ProductFirstSection::findOrFail($id);
//     $section->delete();

//     // Flash success message
//     session()->flash('success', 'Product First Section deleted successfully');

//     // Return JSON response
//     return response()->json([
//         'status' => true,
//         'message' => 'Product First Section deleted successfully'
//     ]);
// }




}

