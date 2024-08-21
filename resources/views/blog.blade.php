<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <div class="d-flex justify-content-between align-items-center">
                <a href="#" class="navbar-brand" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar"
                    aria-controls="offcanvasSidebar">
                    <img src="path/to/logo.png" alt="Logo" class="img-fluid" style="max-height: 40px;">
                </a>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
                    {{ __('Dashboard') }}
                </h2>
            </div>
        </x-slot>
        <div class="mainsection">
            <div class="mb-4 d-flex justify-content-end p-5">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Blog
                </button>
            </div>
            <!-- Bootstrap Modal for Adding Blog -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Blog</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('blogdata.save') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="recipient-name" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="recipient-name"
                                        placeholder="Enter Blog Title">
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" name="category">
                                        <option value="">Select a category</option>
                                        <option value="art">Art</option>
                                        <option value="education">Education</option>
                                        <option value="health">Health</option>
                                        <option value="technology">Technology</option>
                                        <option value="travel">Travel</option>
                                        <option value="science">Science</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="form-label">Description</label>
                                    <textarea class="form-control" id="message-text" rows="4" name="description" placeholder="Enter Blog Content"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Blog</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="data p-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">SN</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Status</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $index => $blog)
                            <tr>
                                <th scope="row">{{ $blog->id }}</th>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->description }}</td>
                                <td>{{ $blog->category }}</td>
                                <td>
                                    @if ($blog->photo)
                                        <img src="{{ asset('storage/' . $blog->photo) }}" alt="Blog Photo"
                                            style="max-height: 100px;">
                                    @else
                                        No Photo
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $blog->status === 'approved' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($blog->status) }}
                                    </span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal"
                                        data-id="{{ $blog->id }}" 
                                        data-title="{{ $blog->title }}" 
                                        data-description="{{ $blog->description }}" 
                                        data-category="{{ $blog->category }}">
                                        Edit
                                    </button>
                                    <a href="{{ route('blog.delete', $blog->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Bootstrap Modal for Editing Blog -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Blog Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('blog.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="edit-blog-id">
                            <div class="mb-3">
                                <label for="edit-title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="edit-title"
                                    placeholder="Enter Blog Title">
                            </div>
                            <div class="mb-3">
                                <label for="edit-category" class="form-label">Category</label>
                                <select class="form-select" id="edit-category" name="category">
                                    <option value="art">Art</option>
                                    <option value="education">Education</option>
                                    <option value="health">Health</option>
                                    <option value="technology">Technology</option>
                                    <option value="travel">Travel</option>
                                    <option value="science">Science</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="edit-description" class="form-label">Description</label>
                                <textarea class="form-control" id="edit-description" rows="4" name="description" placeholder="Enter Blog Description"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editModal = document.getElementById('editModal');

        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var id = button.getAttribute('data-id');
            var title = button.getAttribute('data-title');
            var description = button.getAttribute('data-description');
            var category = button.getAttribute('data-category');
            
            var blogIdInput = editModal.querySelector('#edit-blog-id');
            var titleInput = editModal.querySelector('#edit-title');
            var descriptionTextarea = editModal.querySelector('#edit-description');
            var categorySelect = editModal.querySelector('#edit-category');

            blogIdInput.value = id;
            titleInput.value = title;
            descriptionTextarea.value = description;

            // Set the selected category
            categorySelect.value = category;
        });
    });
</script>

</html>
