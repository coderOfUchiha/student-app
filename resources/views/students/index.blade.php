@extends('layouts.app')
    @section('main')
    <div class= "container mt-4">
        <div class ="d-flex justify-content-end">
        <a class="btn btn-dark mt-2" href="student/create">Add Student</a>
        </div>
        <div class ="container mt-4">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Department</th>
                    <th>Image</th>
                    <th>Actions</th> <!-- New column for action buttons -->
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->student_id}}</td>
                    <td>{{$student->department}}</td>
                    <td>
                        <img src="{{ asset('students/' . $student->image) }}" alt="{{ $student->name }}'s Image" class="rounded-circle" width="30" height="30">
                    </td>
                    <td>
                        <a href="student/{{$student->id}}/edit" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="student/{{$student->id}}/delete" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        @if($message = Session::get('success'))
                var successToast = new bootstrap.Toast(document.getElementById('successToast'),{
                    delay:3000,
                });
            successToast.show();
        @endif
        });
    </script>

