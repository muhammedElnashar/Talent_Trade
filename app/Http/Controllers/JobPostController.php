<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobPostRequest;
use App\Http\Requests\UpdateJobPostRequest;
use App\Models\JobPost;
use App\Models\Category;
use App\Models\Technology;
use App\Models\TechnologyJob;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\User;
use App\Models\Employee;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $JobPosts = JobPost::paginate(4);
        $employees = Employee::all();
        return view('JobPosts.index', compact('JobPosts','employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobPosts = JobPost::all();
        $categories = Category::all();
        $technologies = Technology::all();

        return view('JobPosts.create', compact('jobPosts','categories','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobPostRequest $request)
    {


        $request_data=$request->all();
        $request_data['employee_id']=Auth::user()->id;
        $jobPost =JobPost::create($request_data);
        $tech=$request_data['technology'];
        foreach ($tech as $technology) {
            TechnologyJob::create
            ([
                    'technology_id' => $technology,
                    'job_post_id' => $jobPost->id
            ]);
        }
        return  redirect()->route('jobPosts.index', compact('jobPost'));
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobPost)
    {
        $comments =  Comment::where('job_post_id', $jobPost->id)->get();
        $users = User::all();

        // dd($jobPost);
        return view('JobPosts.show', compact('jobPost', 'comments', 'users'));
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $jobPost)
    {
        $categories = Category::all();
        $technologies = Technology::all();

        return view('JobPosts.update', compact('jobPost', 'categories','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobPostRequest $request, JobPost $jobPost)
    {
        $request_data=$request->all();
        $request_data['employee_id']=Auth::user()->id;
        $jobPost->update($request_data);
        $tech=TechnologyJob::where('job_post_id', $jobPost->id)->get();
        foreach ($tech as $technology) {

            TechnologyJob::update
            ([
                'technology_id' => $technology,
                'job_post_id' => $jobPost->id
            ]);
        }
        return redirect()->route('jobPosts.index', compact('jobPost'))->with('success', 'Job post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $jobPost)
    {
        $jobPost->delete();
        return redirect()->route('JobPosts.index');
    }
}
