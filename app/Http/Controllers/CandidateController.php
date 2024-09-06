<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use App\Models\Technology;
use App\Models\CandidateTechnology;

use App\Models\User;


use Illuminate\Support\Facades\Auth;
class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view('candidate.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('candidate.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCandidateRequest $request)
    {
        
        if ($request->hasFile("cv")){
            $cv = $request->file("cv");
            $cvName = $cv->store("Cv","user_image");
        }
        $data = $request->all();
        $data['cv'] = $cvName;


        Candidate::create($data);
        // dd($data);
        $user = User::findorfail(Auth::id());
        $user['role']="candidate";
        $user->save();
        return redirect()->route('candidateDashboard');
        // return redirect()->route('candidate.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate ,Technology $technology )
    {
        $technology = Technology::all();
        return view('candidate.show' ,compact('candidate' ,'technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        return view('candidate.edit' , compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        if ($request->hasFile("cv")){
            $cv = $request->file("cv");
            $cvName = $cv->store("Cv","user_image");
        }
        $data = $request->all();
        $data['cv'] = $cvName;
        $candidate->update($data);
        return redirect()->route('candidate.show', $candidate);
        // return redirect()->route('candidateDashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
