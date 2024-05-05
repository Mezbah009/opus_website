<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFifthSection;
use App\Models\ProductFirstSection;
use App\Models\ProductFourthSection;
use App\Models\ProductSecondSection;
use App\Models\ProductSeventhSection;
use App\Models\ProductSixthSection;
use App\Models\ProductThirdSection;
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
        $second_sec = ProductSecondSection::where('product_id', $product->id)->first();
        $third_secs = ProductThirdSection::where('product_id', $product->id)->get();
        $fourth_sec = ProductFourthSection::where('product_id', $product->id)->first();
        $fifth_secs = ProductFifthSection::where('product_id', $product->id)->get();
        $sixth_sec = ProductSixthSection::where('product_id', $product->id)->first();
        $seventh_secs = ProductSeventhSection::where('product_id', $product->id)->get();

        // Return the view with the product details
        return view('admin.products.show', compact('product', 'first_sec','second_sec','third_secs','fourth_sec','fifth_secs','sixth_sec','seventh_secs'));
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
            $section = ProductFirstSection::findOrFail($id);

            // Update the title
            $section->title = $request->title;

            // Handle image update
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'image' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/first_section'), $imageName);
                $section->image = $imageName;
            }

            // Handle logo update
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = 'logo' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/first_section'), $logoName);
                $section->logo = $logoName;
            }

            // Handle brochure update
            if ($request->hasFile('brochure')) {
                $brochure = $request->file('brochure');
                $brochureName = 'brochure' . time() . '.' . $brochure->getClientOriginalExtension();
                $brochure->move(public_path('uploads/first_section'), $brochureName);
                $section->brochure = $brochureName;
            }

            // Save the updated section
            $section->save();

            // Redirect to index page
            return redirect()->route('products.show', $section->product_id)->with('success', 'Product First Section updated successfully');
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




    // Second Section

    public function indexSecondSection(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $sections = ProductSecondSection::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.product_second_section.list', compact('sections'));
    }

    public function createSecondSection($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_second_section.create', compact('product'));
    }

    public function storeSecondSection($id, Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'product_id' => 'nullable|exists:products,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->passes()) {

            $product = Product::findOrFail($id);
            // dd($product);

            $section = new ProductSecondSection();
            $section->description = $request->description;
            $section->product_id = $product->id;


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'image' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/first_section'), $imageName);
                $section->image = $imageName;
            }

            $section->save();

            // dd("Section saved");

            return redirect()->route('products.show', $product->id)->with('success', 'Product Second Section added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function editSecondSection($id)

    {
        $section = ProductSecondSection::findOrFail($id);
        return view('admin.product_second_section.edit', compact('section'));
    }

    public function updateSecondSection(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->passes()) {
        // Find the ProductSecondSection record to update
        $section = ProductSecondSection::findOrFail($id);

        // Update the description
        $section->description = $request->description;

        // Handle image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/first_section'), $imageName);
            $section->image = $imageName;
        }

        // Save the updated section
        $section->save();

        // Redirect to index page
        return redirect()->route('products.show', $section->product_id)->with('success', 'Product Second Section updated successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
}

    public function destroySecondSection($id)
    {
        $section = ProductSecondSection::findOrFail($id);
        $section->delete();

        // Flash success message
        session()->flash('success', 'Product Second Section deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Product Second Section deleted successfully'
        ]);
    }



 // Third Section

    public function indexThirdSection(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $sections = ProductThirdSection::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.product_third_section.list', compact('sections'));
    }

    public function createThirdSection($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_third_section.create', compact('product'));
    }

    public function storeThirdSection($id, Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $validator = Validator::make($request->all(), [

            'product_id' => 'nullable|exists:products,id',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->passes()) {

            $product = Product::findOrFail($id);
            // dd($product);

            $section = new ProductThirdSection();
            $section->title = $request->title;
            $section->description = $request->description;
            $section->product_id = $product->id;


            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = 'icon' . time() . '.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('uploads/first_section'), $iconName);
                $section->icon = $iconName;
            }

            $section->save();

            // dd("Section saved");

            return redirect()->route('products.show', $product->id)->with('success', 'Product Third Section added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function editThirdSection($id)

    {
        $section = ProductThirdSection::findOrFail($id);
        return view('admin.product_third_section.edit', compact('section'));
    }

    public function updateThirdSection(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->passes()) {
            // Find the ProductThirdSection record to update
            $section = ProductThirdSection::findOrFail($id);

            // Update the title and description
            $section->title = $request->title;
            $section->description = $request->description;

            // Handle icon update
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = 'icon' . time() . '.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('uploads/first_section'), $iconName);
                $section->icon = $iconName;
            }

            // Save the updated section
            $section->save();

            // Redirect to index page
            return redirect()->route('products.show', $section->product_id)->with('success', 'Product Third Section updated successfully');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }


    public function destroyThirdSection($id)
    {
        $section = ProductThirdSection::findOrFail($id);
        $section->delete();

        // Flash success message
        session()->flash('success', 'Product Second Section deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Product Second Section deleted successfully'
        ]);
    }



    // Fourth Section

    public function indexFourthSection(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $sections = ProductFourthSection::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.product_fourth_section.list', compact('sections'));
    }

    public function createFourthSection($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_fourth_section.create', compact('product'));
    }

    public function storeFourthSection($id, Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'product_id' => 'nullable|exists:products,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->passes()) {

            $product = Product::findOrFail($id);
            // dd($product);

            $section = new ProductFourthSection();
            $section->description = $request->description;
            $section->product_id = $product->id;


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'image' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/first_section'), $imageName);
                $section->image = $imageName;
            }

            $section->save();

            // dd("Section saved");

            return redirect()->route('products.show', $product->id)->with('success', 'Product Fourth Section added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function editFourthSection($id)

    {
        $section = ProductFourthSection::findOrFail($id);
        return view('admin.product_fourth_section.edit', compact('section'));
    }

    public function updateFourthSection(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->passes()) {
        // Find the ProductSecondSection record to update
        $section = ProductFourthSection::findOrFail($id);

        // Update the description
        $section->description = $request->description;

        // Handle image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/first_section'), $imageName);
            $section->image = $imageName;
        }

        // Save the updated section
        $section->save();

        // Redirect to index page
        return redirect()->route('products.show', $section->product_id)->with('success', 'Product Fourth Section updated successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
}

    public function destroyFourthSection($id)
    {
        $section = ProductFourthSection::findOrFail($id);
        $section->delete();

        // Flash success message
        session()->flash('success', 'Product Fourth Section deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Product Fourth Section deleted successfully'
        ]);
    }


    // Fifth Section

    public function indexFifthSection(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $sections = ProductFifthSection::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.product_fifth_section.list', compact('sections'));
    }

    public function createFifthSection($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_fifth_section.create', compact('product'));
    }

    public function storeFifthSection($id, Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $validator = Validator::make($request->all(), [

            'product_id' => 'nullable|exists:products,id',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->passes()) {

            $product = Product::findOrFail($id);
            // dd($product);

            $section = new ProductFifthSection();
            $section->title = $request->title;
            $section->description = $request->description;
            $section->product_id = $product->id;


            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = 'icon' . time() . '.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('uploads/first_section'), $iconName);
                $section->icon = $iconName;
            }

            $section->save();

            // dd("Section saved");

            return redirect()->route('products.show', $product->id)->with('success', 'Product Fifth Section added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function editFifthSection($id)

    {
        $section = ProductFifthSection::findOrFail($id);
        return view('admin.product_fifth_section.edit', compact('section'));
    }

    public function updateFifthSection(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->passes()) {
            // Find the ProductThirdSection record to update
            $section = ProductFifthSection::findOrFail($id);

            // Update the title and description
            $section->title = $request->title;
            $section->description = $request->description;

            // Handle icon update
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = 'icon' . time() . '.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('uploads/first_section'), $iconName);
                $section->icon = $iconName;
            }

            // Save the updated section
            $section->save();

            // Redirect to index page
            return redirect()->route('products.show', $section->product_id)->with('success', 'Product Fifth Section updated successfully');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }


    public function destroyFifthSection($id)
    {
        $section = ProductFifthSection::findOrFail($id);
        $section->delete();

        // Flash success message
        session()->flash('success', 'Product Fifth Section deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Product Fifth Section deleted successfully'
        ]);
    }


     // Sixth Section

    public function indexSixthSection(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $sections = ProductSixthSection::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.product_sixth_section.list', compact('sections'));
    }

    public function createSixthSection($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_sixth_section.create', compact('product'));
    }

    public function storeSixthSection($id, Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $validator = Validator::make($request->all(), [

            'product_id' => 'nullable|exists:products,id',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        if ($validator->passes()) {

            $product = Product::findOrFail($id);
            // dd($product);

            $section = new ProductSixthSection();
            $section->title = $request->title;
            $section->description = $request->description;
            $section->product_id = $product->id;

            $section->save();

            // dd("Section saved");

            return redirect()->route('products.show', $product->id)->with('success', 'Product Sixth Section added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function editSixthSection($id)

    {
        $section = ProductSixthSection::findOrFail($id);
        return view('admin.product_sixth_section.edit', compact('section'));
    }

    public function updateSixthSection(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->passes()) {
            // Find the ProductThirdSection record to update
            $section = ProductSixthSection::findOrFail($id);

            // Update the title and description
            $section->title = $request->title;
            $section->description = $request->description;

            // Handle icon update
            if ($request->hasFile('icon')) {
                $icon = $request->file('icon');
                $iconName = 'icon' . time() . '.' . $icon->getClientOriginalExtension();
                $icon->move(public_path('uploads/first_section'), $iconName);
                $section->icon = $iconName;
            }

            // Save the updated section
            $section->save();

            // Redirect to index page
            return redirect()->route('products.show', $section->product_id)->with('success', 'Product Sixth Section updated successfully');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }


    public function destroySixthSection($id)
    {
        $section = ProductSixthSection::findOrFail($id);
        $section->delete();

        // Flash success message
        session()->flash('success', 'Product Sixth Section deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Product Sixth Section deleted successfully'
        ]);
    }



    // Seventh Section

    public function indexSeventhSection(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $sections = ProductSeventhSection::latest();
        if (!empty($request->get('keyword'))) {
            $sections = $sections->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.product_seventh_section.list', compact('sections'));
    }

    public function createSeventhSection($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product_seventh_section.create', compact('product'));
    }

    public function storeSeventhSection($id, Request $request)
    {
        // dd($request->all());
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'product_id' => 'nullable|exists:products,id',
            'link' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->passes()) {

            $product = Product::findOrFail($id);
            // dd($product);

            $section = new ProductSeventhSection();
            $section->link = $request->link;
            $section->product_id = $product->id;


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'image' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/first_section'), $imageName);
                $section->image = $imageName;
            }

            $section->save();

            // dd("Section saved");

            return redirect()->route('products.show', $product->id)->with('success', 'Product Seventh Section added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function editSeventhSection($id)

    {
        $section = ProductSeventhSection::findOrFail($id);
        return view('admin.product_seventh_section.edit', compact('section'));
    }

    public function updateSeventhSection(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'link' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->passes()) {
        // Find the ProductSecondSection record to update
        $section = ProductSeventhSection::findOrFail($id);

        // Update the description
        $section->link = $request->link;

        // Handle image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/first_section'), $imageName);
            $section->image = $imageName;
        }

        // Save the updated section
        $section->save();

        // Redirect to index page
        return redirect()->route('products.show', $section->product_id)->with('success', 'Product Seventh Section updated successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
}

    public function destroySeventhSection($id)
    {
        $section = ProductSeventhSection::findOrFail($id);
        $section->delete();

        // Flash success message
        session()->flash('success', 'Product Seventh Section deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Product Seventh Section deleted successfully'
        ]);
    }


}
