<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="d-flex justify-content-between align-items-center">
            <a href="#" class="navbar-brand" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                <img src="path/to/logo.png" alt="Logo" class="img-fluid" style="max-height: 40px;">
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
                <?php echo e(__('Dashboard')); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>

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
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($index + 1); ?></th>
                            <td><?php echo e($blog->title); ?></td>
                            <td><?php echo e($blog->description); ?></td>
                            <td><?php echo e($blog->category); ?></td>
                            <td>
                                <?php if($blog->photo): ?>
                                    <img src="<?php echo e(asset('storage/' . $blog->photo)); ?>" alt="Blog Photo" style="max-height: 100px;">
                                <?php else: ?>
                                    No Photo
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge <?php echo e($blog->status === 'approved' ? 'bg-success' : 'bg-danger'); ?>">
                                    <?php echo e(ucfirst($blog->status)); ?>

                                </span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo e($blog->id); ?>" data-status="<?php echo e($blog->status); ?>">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-success" 
                                data-bs-toggle="modal" 
                                data-bs-target="#editModals"
                                data-id="<?php echo e($blog->id); ?>" 
                                data-title="<?php echo e($blog->title); ?>" 
                                data-description="<?php echo e($blog->description); ?>" 
                                data-category="<?php echo e($blog->category); ?>">
                                Update
                            </button>
                                <a href="" class="bg-danger p-2 rounded-md"> Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <form id="editForm" method="POST" action="<?php echo e(route('blog.updateStatus')); ?>">
                        <?php echo csrf_field(); ?>
               
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
                    <form method="POST" action="<?php echo e(route('blog.updateadmin')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /Users/nira/Desktop/laravel/BlogApp/resources/views/admin/home.blade.php ENDPATH**/ ?>