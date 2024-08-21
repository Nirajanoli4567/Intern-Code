<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

        .carousel-container {
            height: 80vh; 
            width: 100vw;
        
            position: relative;
        }
        .carousel-inner {
            height: 100%;

        }
        .carousel-item {
            height: 100%;
        }
        .carousel-item img {
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">

      <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
    </header>
    <div class="container carousel-container">
      <div class="row h-100">
        <div id="carouselExampleCaptions" class="carousel slide h-100">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner h-100">
            <div class="carousel-item active">
              <img src="https://cdn.pixabay.com/photo/2023/12/05/17/37/blue-tit-8432158_1280.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://cdn.pixabay.com/photo/2023/12/05/17/37/blue-tit-8432158_1280.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://cdn.pixabay.com/photo/2023/12/05/17/37/blue-tit-8432158_1280.jpg" class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
    <div class="container mt-5 d-flex justify-content-between">
      <?php if (isset($component)) { $__componentOriginal47282988198bcac3b15a651a9f97b5ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47282988198bcac3b15a651a9f97b5ac = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blogs-container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blogs-container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47282988198bcac3b15a651a9f97b5ac)): ?>
<?php $attributes = $__attributesOriginal47282988198bcac3b15a651a9f97b5ac; ?>
<?php unset($__attributesOriginal47282988198bcac3b15a651a9f97b5ac); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47282988198bcac3b15a651a9f97b5ac)): ?>
<?php $component = $__componentOriginal47282988198bcac3b15a651a9f97b5ac; ?>
<?php unset($__componentOriginal47282988198bcac3b15a651a9f97b5ac); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal47282988198bcac3b15a651a9f97b5ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47282988198bcac3b15a651a9f97b5ac = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blogs-container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blogs-container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47282988198bcac3b15a651a9f97b5ac)): ?>
<?php $attributes = $__attributesOriginal47282988198bcac3b15a651a9f97b5ac; ?>
<?php unset($__attributesOriginal47282988198bcac3b15a651a9f97b5ac); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47282988198bcac3b15a651a9f97b5ac)): ?>
<?php $component = $__componentOriginal47282988198bcac3b15a651a9f97b5ac; ?>
<?php unset($__componentOriginal47282988198bcac3b15a651a9f97b5ac); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal47282988198bcac3b15a651a9f97b5ac = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal47282988198bcac3b15a651a9f97b5ac = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.blogs-container','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('blogs-container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal47282988198bcac3b15a651a9f97b5ac)): ?>
<?php $attributes = $__attributesOriginal47282988198bcac3b15a651a9f97b5ac; ?>
<?php unset($__attributesOriginal47282988198bcac3b15a651a9f97b5ac); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal47282988198bcac3b15a651a9f97b5ac)): ?>
<?php $component = $__componentOriginal47282988198bcac3b15a651a9f97b5ac; ?>
<?php unset($__componentOriginal47282988198bcac3b15a651a9f97b5ac); ?>
<?php endif; ?>

    </div>
    <footer>
      <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH /Users/nira/Desktop/laravel/BlogApp/resources/views/welcome.blade.php ENDPATH**/ ?>