<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeFirstSection;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeFirstSectionController extends Controller
{
    public function index()
    {
        $sections = HomeFirstSection::all();
        return view('admin.home_first_section.list', compact('sections'));
    }

    public function create()
    {
        return view('admin.home_first_section.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'button_name' => 'nullable|string',
            'link' => 'nullable|string',

        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        // Create a new HomeFirstSection instance
        $section = new HomeFirstSection();
        $section->title = $request->title;
        $section->description = $request->description;
        $section->button_name = $request->button_name;
        $section->link = $request->link;

        // Find the temporary image for the main image
        $image = TempImage::find($request->image_id);
        if ($image) {
            $extArray = explode('.', $image->name);
            $ext = last($extArray);
            $newImageName = $section->id . '.' . $ext;
            $sourcePath = public_path('temp/' . $image->name);
            $destinationPath = public_path('uploads/first_section/' . $newImageName);
            File::copy($sourcePath, $destinationPath);
            $section->image = $newImageName;
        }

        // Find the temporary image for the logo
        $logo = TempImage::find($request->logo_id);
        if ($logo) {
            $extArray = explode('.', $logo->name);
            $ext = last($extArray);
            $newLogoName = $section->id . '.' . $ext;
            $sourcePathLogo = public_path('temp/' . $logo->name);
            $destinationPathLogo = public_path('uploads/first_section/' . $newLogoName);
            File::copy($sourcePathLogo, $destinationPathLogo);
            $section->logo = $newLogoName;
        }

        // Save the section
        $section->save();

        return response()->json([
            'status' => true,
            'message' => 'Section added successfully'
        ]);


    }
}
