<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="hero text-center">
            <div class="container">
                <h1 class="display-4 fw-bold">Selamat Datang di Dashboard!</h1>
                <p class="lead mb-4">Kelola aktivitas belajar Anda dan jelajahi pertanyaan komunitas.</p>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <!-- Dashboard Content -->
    <div class="container py-5">
        <div class="row">
            <!-- Statistik Pengguna -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm feature-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Total Pertanyaan Anda</h5>
                        <p class="display-5 fw-bold">
                            <?php echo e(Auth::check() && Auth::user()->questions ? Auth::user()->questions->count() : 0); ?>

                        </p>
                        <a href="<?php echo e(route('questions.ask')); ?>" class="btn btn-primary btn-sm">Ajukan Pertanyaan Baru</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm feature-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Total Jawaban Anda</h5>
                        <p class="display-5 fw-bold">
                            <?php echo e(Auth::check() && Auth::user()->answers ? Auth::user()->answers->count() : 0); ?>

                        </p>
                        <a href="<?php echo e(route('questions.trending')); ?>" class="btn btn-primary btn-sm">Lihat Pertanyaan Tren</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm feature-card">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">Profil Anda</h5>
                        <p class="fw-bold"><?php echo e(Auth::user()->name); ?></p>
                        <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary btn-sm">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pertanyaan Tren -->
        <div class="py-5">
            <h2 class="text-center fw-bold mb-4">Pertanyaan Terbaru dari Komunitas</h2>
            <?php if($questions->isNotEmpty()): ?>
                <div class="row g-4">
                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="card feature-card">
                                <div class="card-body">
                                    <h5 class="card-title text-primary"><?php echo e($question->title); ?></h5>
                                    <p class="card-text text-muted">
                                        <?php echo e($question->category); ?> • <?php echo e($question->created_at->diffForHumans()); ?>

                                    </p>
                                    <a href="<?php echo e(route('questions.detail', ['id' => $question->id])); ?>" class="stretched-link">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-center text-muted">Belum ada pertanyaan dari komunitas.</p>
            <?php endif; ?>
        </div>
    </div>
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
<?php /**PATH C:\laragon\www\komunitas-belajar\resources\views/dashboard.blade.php ENDPATH**/ ?>