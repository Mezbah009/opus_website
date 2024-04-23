<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $sections = Client::latest();
        if(!empty($request->get('keyword'))){
            $sections = $sections->where('title','like','%'.$request->get('keyword').'%');
        }
        $sections = $sections->latest()->paginate(10);
        return view('admin.clients.list',compact('sections'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'category' => 'nullable|string',
            'link' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for logo
        ]);

        if ($validator->passes()) {
            $clients = new Client();
            $clients->category = $request->category;
            $clients->link = $request->link;


            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);

                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);
                $newImageName = uniqid() . '.' . $ext; // Generate a unique filename
                $sPath = public_path() . '/temp/' . $tempImage->name;
                $dPath = public_path() . '/uploads/first_section/' . $newImageName;

                File::copy($sPath, $dPath);

                $clients->logo = $newImageName;
            }

            $clients->save();

            // Redirect to index page
            return redirect()->route('clients.index')->with('success', 'Client added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }


    public function edit($id)
{
    $clients = Client::findOrFail($id);
    return view('admin.clients.edit', compact('clients'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'category' => 'nullable|string',
        'link' => 'nullable|string',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules for logo
    ]);

    if ($validator->passes()) {
        $clients = Client::findOrFail($id);
        $clients->category = $request->category;
        $clients->link = $request->link;

        if (!empty($request->image_id)) {
            $tempImage = TempImage::find($request->image_id);

            $extArray = explode('.', $tempImage->name);
            $ext = last($extArray);
            $newImageName = $clients->id . '.' . $ext;
            $sPath = public_path() . '/temp/' . $tempImage->name;
            $dPath = public_path() . '/uploads/first_section/' . $newImageName;

            File::copy($sPath, $dPath);

            $clients->logo = $newImageName;
            $clients->save();
        }

        $clients->save();

        // Redirect to index page
        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    } else {
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }
}


public function destroy($id)
{
    $clients = Client::findOrFail($id);
    $clients->delete();

    // Flash success message
    session()->flash('success', 'Client deleted successfully');

    // Return JSON response
    return response()->json([
        'status' => true,
        'message' => 'Client deleted successfully'
    ]);
}
}
