@extends("dashboard")

@section("title")
    ss
@endsection
@section("css")

@endsection
@section("content")
<div class="container">
    <div class=" card mt-5 w-75  " style="border-radius: 20px; margin-left: 180px">
        <div class="card-header fw-bold h5" style="background-color: #4d91d1; border-radius: 20px 20px 0 0;">Sign As
            Candidate </div>
        <div class="card-body">
            <div class="row">
                <form action="{{route("candidate.store")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-1 fw-bold fs-5" for="title">Title</label>
                        <input type="text" class="form-control" value="{{old('title')}}" name="title" placeholder="Title"></input>
                    </div>
                    @error('title')
                        <div class=" alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label class="mb-1 fw-bold fs-5" for="about">About Me</label>
                        <textarea type="text" class="form-control"  name="about" placeholder="About Me">{{old('about')}}</textarea>
                    </div>
                    @error('about')
                        <div class=" alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label class="mb-1 fw-bold fs-5" for="location">Location</label>
                        <input type="text" class="form-control" value="{{old('location')}}" name="location" placeholder="Location"></input>
                    </div>
                    @error('location')
                        <div class=" alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label class="mb-1 fw-bold fs-5" for="education">Education</label>
                        <input type="text" class="form-control" value="{{old('education')}}" name="education" placeholder="Education"></input>
                    </div>
                    @error('education')
                        <div class=" alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label class=" mb-1 fw-bold fs-5" for="phone">Phone</label>
                        <input type="text" class="form-control" value="{{old('phone')}}" name="phone" placeholder="Phone"></input>
                    </div>
                    @error('phone')
                        <div class=" alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <div class=" mb-3">
                    <label class="mb-1 fw-bold  fs-5" for="inputGroupFile02">Upload CV</label>
                    <input type="file" src="{{old('cv')}}" class="form-control" name="cv">
                    </div>
                    @error('cv')
                        <div class=" alert alert-danger ">{{ $message }}</div>
                    @enderror
                    <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">

                    <button type="submit" class="btn btn-primary px-5 mt-2 fs-5">Submit</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
@section("script")

@endsection
