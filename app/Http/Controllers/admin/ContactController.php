<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $sections = Contact::latest();
        if(!empty($request->get('keyword'))){
            $sections = $sections->where('title','like','%'.$request->get('keyword').'%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.contact.list',compact('sections'));
    }

    public function create()
    {
        return view('admin.contact.create');
    }

    public function store(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'flag' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'country_name' => 'nullable|string',
        'company_name' => 'nullable|string',
        'office_name' => 'nullable|string',
        'address' => 'nullable|string',
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Create a new Contact instance
    $contact = new Contact();

    // Set properties from the request
    $contact->country_name = $request->country_name;
    $contact->company_name = $request->company_name;
    $contact->office_name = $request->office_name;
    $contact->address = $request->address;

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = 'image_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/first_section'), $imageName);
        $contact->image = $imageName;
    }

    // Update flag if provided
    if ($request->hasFile('flag')) {
        $flag = $request->file('flag');
        $flagName = 'flag_' . time() . '.' . $flag->getClientOriginalExtension();
        $flag->move(public_path('uploads/first_section'), $flagName);
        $contact->flag = $flagName;
    }

    // Save the contact to the database
    $contact->save();

    // Redirect to the index page with success message
    return redirect()->route('contact.index')->with('success', 'Contact added successfully');
}
}
