@extends("dashboard")

@section("title")
    Test
@endsection
@section("css")

@endsection
@section("content")
    @auth()
    <section class="container" style="margin-top: 5rem">
        <div class="row mt-2">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">

                            <img src='{{asset("images/users/".Auth::user()->image)}}' alt="avatar"
                                 class="rounded-circle shadow-4 mb-3" style="width: 200px; height:200px ">
                        <h5 class="my-3 font-weight-bold"><i class="fa fa-solid fa-signature me-2"></i>{{Auth::user()->name}}</h5>
                            <p class="text-muted mb-0">{{Auth::user()->role}}</p>

                            <p class="text-muted mb-4"><i class="fa fa-map-marker me-2"></i>{{ $employee->location }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <strong class="mb-0">Full Name :</strong>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{Auth::user()->name}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <strong class="mb-0">Email :</strong>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <strong class="mb-0">Address :</strong>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $employee->location }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <strong class="mb-0">Company Name :</strong>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $employee->company_name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <strong class="mb-0 ">Company Logo </strong>
                            </div>
                            <div class="col-sm-9">
                                <img src="{{ asset('images/users/' . $employee->logo) }}" alt="Logo" width="70" class="mt-3 rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($jobs as $job)
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card my-2" style="margin-top: 50px !important;">
                        <div class="card-body">
                            <div class="d-flex mb-1">
                                <img src="{{ asset('images/users/'.$employee->logo) }}" style="width: 60px; height: 60px;" class="rounded-circle styl me-2" alt="User">
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
                                    <div class="d-flex justify-content-end  col-4">
                                        <button type="button" class="btn btn-primary px-4 mx-2">Edit</button>
                                        <button type="button" class="btn btn-danger px-4 mx-2">Delete</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    @endauth

@endsection
@section("script")

@endsection
