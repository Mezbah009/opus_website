<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
use App\Models\TempImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::latest();
        if (!empty($request->get('keyword'))) {
            $blogs = $blogs->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $blogs = $blogs->latest()->paginate(10);
        return view('admin.blog.list', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'image_id' => 'required',
            'category' => 'nullable|string',
            'title' => 'required|string',
            'date' => 'required|date',
            'excerpt' => 'required|string',
            'slug' => 'required|string|unique:blogs,slug',
        ]);

        if ($validator->passes()) {
            $blogPost = new Blog();

            $blogPost->category = $request->category;
            $blogPost->title = $request->title;
            $blogPost->date = $request->date;
            $blogPost->excerpt = $request->excerpt;
            $blogPost->description = $request->description;
            $blogPost->slug = $request->slug;

            // Handle image upload and save
            if (!empty($request->image_id)) {
                $tempImage = TempImage::find($request->image_id);
                $extArray = explode('.', $tempImage->name);
                $ext = last($extArray);
                $newImageName = uniqid() . '.' . $ext; // Generate a unique filename
                $sPath = public_path() . '/temp/' . $tempImage->name;
                $dPath = public_path() . '/uploads/blogs/' . $newImageName;

                File::copy($sPath, $dPath);

                $blogPost->image = $newImageName;
            }

            // dd($blogPost);
            $blogPost->save();

            return redirect()->route('blog.index')->with('success', 'Section added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
