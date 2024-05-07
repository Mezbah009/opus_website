<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use App\Models\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManagementController extends Controller
{
    public function index(Request $request)
    {
        $sections = Leader::latest();
        if(!empty($request->get('keyword'))){
            $sections = $sections->where('title','like','%'.$request->get('keyword').'%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.managements.list',compact('sections'));
    }

    public function create()
    {
        return view('admin.managements.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'designation' => 'nullable|string',
            'description' => 'nullable|string',
            'link' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'facebook' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->passes()) {
        $managements = new Leader();
        $managements->name = $request->name;
        $managements->designation = $request->designation;
        $managements->description = $request->description;
        $managements->link = $request->link;
        $managements->linkedin = $request->linkedin;
        $managements->facebook = $request->facebook;
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/first_section'), $imageName);
            $managements->image = $imageName;
        }
        // Save the management to the database
        // dd($managements);
        $managements->save();


        // Redirect to index page
        return redirect()->route('managements.index')->with('success', 'Management updated successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
    }

    public function edit($id)
{
    // Find the Leader by id
    $section = Leader::findOrFail($id);

    // Return the view with the Leader data
    return view('admin.managements.edit', compact('section'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'name' => 'nullable|string',
        'designation' => 'nullable|string',
        'description' => 'nullable|string',
        'link' => 'nullable|string',
        'linkedin' => 'nullable|string',
        'facebook' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->passes()) {
    // Find the Leader by id
    $management = Leader::findOrFail($id);
    $management->name = $request->name;
    $management->designation = $request->designation;
    $management->description = $request->description;
    $management->link = $request->link;
    $management->linkedin = $request->linkedin;
    $management->facebook = $request->facebook;

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/first_section'), $imageName);
        $management->image = $imageName;
    }

    // Save the management to the database
    $management->save();

    return redirect()->route('managements.index')->with('success', 'Management updated successfully');
    } else {
        return back()->withErrors($validator)->withInput();
    }
}

public function destroy($id)
{
    $section = Leader::findOrFail($id);
    $section->delete();

    // Flash success message
    session()->flash('success', 'Management deleted successfully');

    // Return JSON response
    return response()->json([
        'status' => true,
        'message' => 'Management deleted successfully'
    ]);
}


}
