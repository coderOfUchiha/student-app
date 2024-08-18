@extends('layouts.app')
@section('main')


<div class="container mt-5 justify-content-center">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Student Information Form</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('student.update',$student->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name"
                           name="name" placeholder="Enter your name"
                           value="{{old('name',$student->name)}}">
                    @if($errors-> has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="studentId" class="form-label">Student ID</label>
                    <input type="text" class="form-control" id="studentId"
                           name="student_id" placeholder="Enter your student ID"
                           value="{{old('student_id',$student->student_id)}}">
                    @if($errors-> has('student_id'))
                    <span class="text-danger">{{$errors->first('student_id')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" class="form-control" id="department"
                           name="department" placeholder="Enter your department"
                           value="{{old('department',$student->department)}}">
                    @if($errors-> has('department'))
                    <span class="text-danger">{{$errors->first('department')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="imageUpload" class="form-label">Upload Image</label>
                    <input class="form-control" type="file" id="imageUpload" name="image" onchange="previewImage(event)">
                    @if($errors-> has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                    @endif
                </div>
                @if($student->image)
                <div class="mb-3">
                    <img id="imagePreview" src="{{ asset('students/' . $student->image) }}" alt="Student Image" class="img-thumbnail" style="max-width: 150px;">
                    @if($errors-> has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                    @endif
                </div>
                @else
                <div class="mb-3">
                    <img id="imagePreview" src="#" alt="Image Preview" class="img-thumbnail" style="max-width: 150px; display:none;">
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
    @if($message = Session::get('success'))
            var successToast = new bootstrap.Toast(document.getElementById('successToast'), {
                delay: 3000,
            });
        successToast.show();
    @endif
    });

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
</body>
</html>
