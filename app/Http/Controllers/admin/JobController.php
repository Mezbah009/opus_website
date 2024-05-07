<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::latest();
        if (!empty($request->get('keyword'))) {
            $jobs = $jobs->where('title', 'like', '%' . $request->get('keyword') . '%');
        }
        $jobs = $jobs->latest()->paginate(10);
        return view('admin.jobs.list', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'designation' => 'required|string',
            'slug' => 'required|string|unique:jobs,slug',
            'job_type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'nullable',
        ]);

        if ($validator->passes()) {
            $jobPost = new Job();

            $jobPost->designation = $request->designation;
            $jobPost->slug = $request->slug;
            $jobPost->job_type = $request->job_type;
            $jobPost->start_date = $request->start_date;
            $jobPost->end_date = $request->end_date;
            $jobPost->description = $request->description;

            // dd($blogPost);
            $jobPost->save();

            return redirect()->route('jobs.index')->with('success', 'Job added successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function edit($id)
    {
        $jobs = Job::findOrFail($id);
        return view('admin.jobs.edit', compact('jobs'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'designation' => 'required|string',
            'slug' => 'required|string|unique:jobs,slug,' . $id,
            'job_type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'nullable',
        ]);

        if ($validator->passes()) {
            // Find the blog post by its ID
            $jobPost = Job::findOrFail($id);

            // Update the blog post attributes
            $jobPost->designation = $request->designation;
            $jobPost->slug = $request->slug;
            $jobPost->job_type = $request->job_type;
            $jobPost->start_date = $request->start_date;
            $jobPost->end_date = $request->end_date;
            $jobPost->description = $request->description;

            // Save the updated blog post
            $jobPost->save();

            return redirect()->route('jobs.index')->with('success', 'Job post updated successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function destroy($id)
    {
        $section = Job::findOrFail($id);
        $section->delete();

        // Flash success message
        session()->flash('success', 'Job deleted successfully');

        // Return JSON response
        return response()->json([
            'status' => true,
            'message' => 'Job deleted successfully'
        ]);
    }
}
