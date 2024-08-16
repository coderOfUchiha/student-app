<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

@if($message = Session::get('success'))
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 11;">
    <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ $message }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

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
