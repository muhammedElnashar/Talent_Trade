<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\User;
use App\Notifications\Status;
use Illuminate\Support\Facades\Notification;

class ApplicationController extends Controller

{
public function __construct()
{
    $this->middleware('auth');
    $this->middleware('is_employee');
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $user = User::all();
        $application->job_status = "approved";
        $application->save();
        Notification::send($user,new Status($application->job_status));
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $user = User::all();
        $application->job_status = "rejected";
        $application->save();
        Notification::send($user,new Status($application->job_status));
        return redirect()->back();

    }
}
