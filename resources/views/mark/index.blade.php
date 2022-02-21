@extends('layouts')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <span class="fs-5">Student mark</span>
        <a href="{{route('create')}}" class="btn btn-success btn-sm">Set Mark</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Student Roll</th>
                    <th>Course Name</th>
                    <th>Mark</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @forelse ($data['mark'] as $mark)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$mark->student->name}}</td>
                    <td>{{$mark->student->roll}}</td>
                    <td>{{$mark->course->name}}</td>
                    <td>{{$mark->marks}}</td>
                    <td>
                        <div class="d-flex justify-content-around">

                            <a href="{{route('edit',['marks'=>$mark->id])}}"
                                class="btn btn-info btn-sm text-light">Edit</a>
                            <form action="{{route('delete',['marks'=>$mark->id])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty

                @endforelse

                </tr>
            </tbody>
        </table>

    </div>
</div>

@endsection
