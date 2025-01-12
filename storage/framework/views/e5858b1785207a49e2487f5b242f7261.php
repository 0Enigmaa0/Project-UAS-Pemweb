

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h1 class="text-center mb-4">Pertanyaan yang Sedang Tren</h1>

    <div class="row g-4">
        <?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><?php echo e($question->title); ?></h5>
                        <p class="text-muted">Kategori: <?php echo e($question->category); ?> • <?php echo e($question->created_at->diffForHumans()); ?></p>
                        <p class="card-text"><?php echo e(Str::limit($question->content, 100)); ?></p>
                        <a href="<?php echo e(route('questions.detail', $question->id)); ?>" class="stretched-link">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-center">Tidak ada pertanyaan yang sedang tren.</p>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\komunitas-belajar\resources\views/questions/trending.blade.php ENDPATH**/ ?>