
@extends('layouts.app')
    @section('main')
    <div class="container mt-5 justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Student Information Form</h4>
                </div>
                <div class="card-body">
                   <form method="POST" action="{{ route('student.add') }}" enctype="multipart/form-data">
                       @csrf
                       <div class="mb-3">
                           <label for="name" class="form-label">Name</label>
                           <input type="text" class="form-control" id="name"
                            name="name" placeholder="Enter your name"
                            value="{{old('name')}}">
                           @if($errors-> has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                           @endif
                       </div>
                       <div class="mb-3">
                           <label for="studentId" class="form-label">Student ID</label>
                           <input type="text" class="form-control" id="studentId"
                            name="student_id" placeholder="Enter your student ID"
                            value="{{old('student_id')}}">
                           @if($errors-> has('student_id'))
                            <span class="text-danger">{{$errors->first('student_id')}}</span>
                            @endif
                       </div>
                       <div class="mb-3">
                           <label for="department" class="form-label">Department</label>
                           <input type="text" class="form-control" id="department"
                            name="department" placeholder="Enter your department"
                            value="{{old('department')}}">
                           @if($errors-> has('department'))
                           <span class="text-danger">{{$errors->first('department')}}</span>
                           @endif
                       </div>
                       <div class="mb-3">
                           <label for="imageUpload" class="form-label">Upload Image</label>
                           <input class="form-control" type="file"
                            id="imageUpload" name="image"
                            value="{{old('image')}}">
                            @if($errors-> has('image'))
                            <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                       </div>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
                </div>
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
</body>
</html>
