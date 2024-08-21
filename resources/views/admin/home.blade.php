<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <a href="#" class="navbar-brand" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                <img src="path/to/logo.png" alt="Logo" class="img-fluid" style="max-height: 40px;">
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <h3>Admin Dashboard</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
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
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->description }}</td>
                            <td>{{ $blog->category }}</td>
                            <td>
                                @if ($blog->photo)
                                    <img src="{{ asset('storage/' . $blog->photo) }}" alt="Blog Photo" style="max-height: 100px;">
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
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $blog->id }}" data-status="{{ $blog->status }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-success" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editModals"
                                data-id="{{ $blog->id }}" 
                                data-title="{{ $blog->title }}" 
                                data-description="{{ $blog->description }}" 
                                data-category="{{ $blog->category }}">
                                Update
                            </button>
                                <a href="" class="bg-danger p-2 rounded-md"> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Blog Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST" action="{{ route('blog.updateStatus') }}">
                        @csrf
               
                        <input type="hidden" name="id" id="blog-id">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div>
                                <input type="radio" id="approved" name="status" value="approved">
                                <label for="approved" class="form-check-label">Approved</label>
                            </div>
                            <div>
                                <input type="radio" id="notapproved" name="status" value="notapproved">
                                <label for="notapproved" class="form-check-label">Not Approved</label>
                            </div>
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

    <div class="modal fade" id="editModals" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Blog Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('blog.updateadmin') }}" enctype="multipart/form-data">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-1jvvsuWZT9BLHJkTz1LEzkw2g1EFO/x8iEAIApF4V4YAE7V4y8I43kZZ1Qz6Xdc8" crossorigin="anonymous"></script>
    <script>
        // JavaScript to handle modal data population
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Button that triggered the modal
            var id = button.getAttribute('data-id');
            var status = button.getAttribute('data-status');
            
            var modalTitle = editModal.querySelector('.modal-title');
            var blogIdInput = editModal.querySelector('#blog-id');
            var approvedRadio = editModal.querySelector('#approved');
            var notApprovedRadio = editModal.querySelector('#not-approved');

            blogIdInput.value = id;
            if (status === 'approved') {
                approvedRadio.checked = true;
            } else {
                notApprovedRadio.checked = true;
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var editModal = document.getElementById('editModals');
    
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
</x-app-layout>
