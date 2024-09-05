



@extends("dashboard")

@section("title")
    Test
@endsection
@section("css")
<style>
  .card {
    border: none;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 1rem 1.5rem;
}

.card-footer {
    background-color: #f8f9fa;
    border-top: none;
    padding: 0.75rem 1.5rem;
}

.card-footer .form-control {
    border-radius: 20px;
    border: 1px solid #ced4da;
}

.card-footer .btn {
    border-radius: 20px;
}

.card-footer img {
    width: 40px;
    height: 40px;
}

.card-body img {
    width: 40px;
    height: 40px;
}

.card h6 {
    font-weight: bold;
}

.card p {
    font-size: 0.95rem;
    color: #333;
}

.card small {
    color: #888;
}

.card .btn-link {
    color: #666;
    text-decoration: none;
    font-weight: bold;
}

.card .btn-link:hover {
    text-decoration: underline;
}

.card .btn-link i {
    margin-right: 5px;
}

.card .text-muted {
    color: #666 !important;
}
.styl{
  width: 60px;
    height: 60px;
}
</style>

@endsection
@section("content")
@foreach ($JobPosts as $jobPost)
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card my-3" style="margin-top: 50px !important;">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <img src="{{ asset('images/users/logo/'.$employees->find($jobPost->employee_id)->logo) }}" style="width: 60px; height: 60px;" class="rounded-circle styl me-2" alt="User">
                            <div>
                                <h3 class="m-0">{{ $employees->find($jobPost->employee_id)->company_name }}</h3>
                                <small class="text-muted fs-6">{{ $jobPost->created_at->format('F j, Y, g:i a') }}</small>
                            </div>
                        </div>
                        <a href="{{ route('jobPosts.show', $jobPost->id) }}">
                            <h5 class="fs-4 text-black">{{ $jobPost->title }}</h5>
                        </a>
                        <p>{{ $jobPost->description }}</p>
                        <div class="card-footer d-flex">
                            <a href="{{ route('jobPosts.show', $jobPost->id) }}" class="btn rounded  ms-auto" style="background-color:#5867dd; color:white;border-radius:30px !important">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section("script")

@endsection
