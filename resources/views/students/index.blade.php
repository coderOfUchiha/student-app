<html>
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
                    <td><img src="students/{{$student->image}}" alt="John Doe's Image" class="rounded-circle" width="30" height="30"></td>
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
