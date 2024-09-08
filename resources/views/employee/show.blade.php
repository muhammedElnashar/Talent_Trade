@extends("dashboard")

@section("title")
    Test
@endsection
@section("css")

@endsection
@section("content")
    @php
    $user = \App\Models\User::findOrFail($employee->user_id);
 @endphp
    <section class="container" style="margin-top: 5rem">
        <div class="row mt-2">
            <div class="col-4">
                <div class="card mb-2 w-100">
                    <div class="card-body text-center">

                            <img src='{{asset("images/users/".$user->image)}}' alt="avatar"
                                 class="rounded-circle shadow-4 mb-1" style="width: 200px; height:200px ">
                        <h5 class="my-3 font-weight-bold"><i class="fa fa-solid fa-signature me-2"></i>{{$user->name}}</h5>
                            <p class="text-muted fs-5 mb-0"> <i class="fa fa-solid fa-signature me-2"></i>{{$user->role}}</p>

                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="text-center">
                            <img src='{{asset("images/users/".$employee->logo)}}' alt="avatar"
                                 class="rounded-circle shadow-4 mb-3" style="width: 150px; height:150px ">
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <strong class="mb-0">Email : </strong>
                            </div>

                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{$user->email}}</p>



                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <strong class="mb-0">Address :</strong>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-0">{{ $employee->location }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <strong class="mb-0">Location:</strong>
                            </div>
                            <div class="col-sm-8">
                                <p class="text-muted mb-1">{{ $employee->location }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-5">
                                <strong class="mb-0">Company Name:</strong>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $employee->company_name }}</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-8 ">
                @foreach($jobs as $job)
                    <div class="row w-100">
                        <div class="col-12">
                            <div class="card my-2" >
                                <div class="card-body">
                                    <div class="d-flex mb-1">
                                        <img src="{{ asset('images/users/'.$user->image) }}" style="width: 60px; height: 60px;" class="rounded-circle styl me-2" alt="User">
                                        <div>
                                            <h3 class="m-0">{{ $employee->company_name }}</h3>
                                            <small class="text-muted fs-6">{{ $job->created_at->format('F j, Y, g:i a') }}</small>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <header>
                                            <h3>{{$job->title}}</h3>
                                        </header>
                                        <div class="job-details my-2">
                                            <i class="fa fa-align-left"></i>
                                            <strong class="ms-3">Description:</strong> {{$job->description}}
                                        </div>
                                        <div class="job-details my-2">
                                            <i class="fa fa-dollar-sign"></i>
                                            <strong class="ms-3">Salary:</strong> {{$job->salary}}
                                        </div>
                                        <div class="job-details my-2">
                                            <i class="fa fa-map-marker-alt"></i>
                                            <strong class="ms-3">Location:</strong> {{$job->location}}
                                        </div>
                                        <div class="job-details my-2">
                                            <i class="fa fa-briefcase"></i>
                                            <strong class="ms-3">Work Type:</strong> {{$job->work_type}}
                                        </div>
                                        <div class="row">
                                            <div class="job-details my-2 col-8">
                                                <i class="fa fa-calendar"></i>
                                                <strong class="ms-3">Application Deadline:</strong> {{$job->dead_line}}
                                            </div>
                                            <div class="d-flex mb-1">
                                                @foreach($job->technology as $jobTechnology)
                                                    <span class="fs-6 px-5 fw-bold mx-2 my-2 rounded-5 p-1 text-white" style="background-color: #0a5a97">{{$jobTechnology->technology_name}}</span>
                                                @endforeach
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-end  ">
                                                <button type="button" class="btn btn-primary px-5 fw-bold mx-2">Edit</button>
                                                <button type="button" class="btn btn-danger px-5 fw-bold mx-2">Delete</button>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    {{ $jobs->links() }}
            </div>
        </div>
    </section>


@endsection
@section("script")

@endsection
