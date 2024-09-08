@extends("dashboard")

@section("title")
    Job Post Details
@endsection

@push("css")
<style>
    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
        border: none;
        margin-bottom: 40px;
    }

    .card-header {
        background-color: #0056b3;
        color: black;
        padding: 20px;
        font-weight: bold;
        font-size: 1.5rem;
        border-radius: 15px 15px 0 0;
    }

    .card-body {
        padding: 30px;
        font-size: 1.1rem;
        color: #495057;
    }

    .card-footer {
        background-color: #f1f1f1;
        text-align: right;
        padding: 15px;
        font-size: 0.9rem;
        border-radius: 0 0 15px 15px;
        color: #6c757d;
    }

    /* Comments Section */
    .comments-section {
        margin-top: 50px;
    }

    .comments-section h5 {
        font-size: 1.75rem;
        font-weight: bold;
        margin-bottom: 30px;
        color: #343a40;
    }

    .comments-section .card {
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        border: none;
        margin-bottom: 20px;
    }

    .comments-section .card-body {
        padding: 20px;
        font-size: 1rem;
    }

    .form-control {
        border-radius: 30px;
        box-shadow: none;
    }

    .input-group .btn-primary {
        border-radius: 30px;
        padding: 10px;
        font-weight: bold;
        transition: background-color 0.3s ease;
        background-color:#5867dd !important;
    }

    .input-group .btn-primary i {
        font-size: 1.2rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endpush

@section("content")
<div class="container p-5" style=" width: 70%;">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
            <a href="/jobPosts" class="text-black"><i class="fa fa-arrow-left fa-lg"></i></a>
            <stronge class="ms-3 fw-bold fs-2"> {{$jobPost->title}} </stronge>
            </div>


            <p style="font-weight:lighter"> Posted on {{$jobPost->created_at}} </p>

        </div>
        <div class="card-body">
            <div class="job-details my-3">
                <i class="fa fa-align-left"></i>
                <strong class="ms-3">Description:</strong> {{$jobPost->description}}
            </div>
            <div class="job-details my-3">
                <i class="fa fa-dollar-sign"></i>
                <strong class="ms-3">Salary:</strong> {{$jobPost->salary}}
            </div>
            <div class="job-details my-3">
                <i class="fa fa-map-marker-alt"></i>
                <strong class="ms-3">Location:</strong> {{$jobPost->location}}
            </div>
            <div class="job-details my-3">
                <i class="fa fa-briefcase"></i>
                <strong class="ms-3">Work Type:</strong> {{$jobPost->work_type}}
            </div>
            <div class="job-details my-3">
                <i class="fa fa-calendar"></i>
                <strong class="ms-3">Application Deadline:</strong> {{$jobPost->dead_line}}
            </div>
        </div>
        <div class="">
        </div>
        @auth
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="job_post_id" value="{{$jobPost->id}}">
            <input type="hidden" name="work_type" value="{{ $jobPost->work_type }}">
            <div class="input-group mb-3 just mx-auto" style="width: 98%;">
                <input type="text" class="form-control" id="comment" name="body" placeholder="apply a offer..." style="flex: 1;">
                <button type="submit" class="btn btn-primary input-group-text" style="width:5%;" >
                    <i class="fa fa-solid fa-comment"></i>
                </button>
            </div>
        </form>
        @endauth
    </div>
    <div class="comments-section">
            <h5>Job Offers</h5>
            @foreach($comments as $comment)
                @php
                $candidate = \App\Models\Candidate::findOrFail($comment->candidate_id);
                $user= \App\Models\User::where('id','=',$candidate->user_id)->first();
                 @endphp
                <div class="card">
                    <div class='card-header d-flex justify-content-between align-items-center'>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('images/users/' . $user->image) }}" style="width: 60px; height: 60px;" class="rounded-circle styl me-2" alt="User">
                        <p class="card-text"><strong>{{ $user->name }}</strong></p>
                    </div>

                        <p class="text-muted " style="font-weight:lighter">Posted on {{ $comment->created_at->format('F j, Y, g:i a') }}</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $comment->body }}</p>
                    </div>
                </div>
            @endforeach
        </div>
</div>
@endsection
