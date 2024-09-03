<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobPostRequest;
use App\Http\Requests\UpdateJobPostRequest;
use App\Models\JobPost;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('JobPosts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobPosts = JobPost::all();
        $categories = Category::all();

        return view('JobPosts.create', compact('jobPosts','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobPostRequest $request)
    {
        $request_data=$request->all();
        $request_data['employee_id']=Auth::user()->id;
        $request_data['category_id']=Auth::user()->id;

        $jobPost =JobPost::create($request_data);

        return redirect()->route('jobPosts.index', compact('jobPost'));
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobPost)
    {
        return view('JobPosts.show', [
            'jopPost' => $jobPost
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $jobPost)
    {
        return view('JobPosts.edit', [
            'jobPost' => $jobPost
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobPostRequest $request, JobPost $jobPost)
    {
        return redirect()->route('JobPosts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $jobPost)
    {
        return redirect()->route('JobPosts.index');
    }
}
