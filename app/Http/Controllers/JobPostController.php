<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobPostRequest;
use App\Http\Requests\UpdateJobPostRequest;
use App\Models\JobPost;
use App\Models\Comment;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('JobPosts.index', [
            'JobPosts' => JobPost::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('JobPosts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobPostRequest $request)
    {

        return redirect()->route('JobPosts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobPost)
    {
        $comments =  Comment::where('job_post_id', $jobPost->id)->get();
        // dd($jobPost);
        return view('JobPosts.show', compact('jobPost', 'comments'));
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
