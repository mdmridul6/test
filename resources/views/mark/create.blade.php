@extends('layouts')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <a href="{{route('home')}}" class="btn btn-success btn-sm">Back</a>

    </div>
    <div class="card-body">
        <form action="{{route('create')}}" method="POST">
            @csrf
            <div class="row mb-4">
                <div class="col-md-4">
                    <label for="student">Student</label>
                    <select name="student" id="" class="custom-select form-control">
                        <option value="null" selected disabled>Select Studens</option>
                        @foreach ($data['student'] as $student)
                        <option value="{{$student->id}}">{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="course"></label>
                    <select name="course" id="" class="custom-select form-control">
                        <option value="null" selected disabled>Select Course</option>
                        @foreach ($data['course'] as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="mark">Mark</label>
                    <input type="number" name="mark" id="" class="form-control">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success w-25">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
