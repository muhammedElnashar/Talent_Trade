@extends("dashboard")

@section("title")
    Employee
@endsection
@section("css")

@endsection
@section("content")
        <div class="card mt-5" style="border-radius: 20px">
            <div class="card-header fw-bold h5 text-white " style="background-color: #34495e;border-radius: 20px 20px 0 0 " >
                Candidate List
            </div>
            <div class="card-body">
                <table class="table mt-4">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>About</th>
                        <th>Title</th>
                        <th>EDUCATION</th>
                        <th>Location</th>
                        <th>Phone</th>
                        <th >action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($candidates as $candidate)
                        <tr>
                            <td>{{ $candidate->id }}</td>
                            <td>{{ $candidate->about }}</td>
                            <td>{{ $candidate->title }}</td>
                            <td>{{ $candidate->education }}</td>
                            <td>{{ $candidate->location }}</td>
                            <td>{{ $candidate->phone }}</td>
                            <td colspan="3">
                                <a href="{{route('candidate.show',$candidate->id)}}" class='btn btn-primary btn-sm'>View</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

@endsection
@section("script")

@endsection
