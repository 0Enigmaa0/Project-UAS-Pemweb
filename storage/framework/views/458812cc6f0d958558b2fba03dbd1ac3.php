

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h1 class="mb-4">Detail Pertanyaan</h1>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><?php echo e($question->title); ?></h2>
            <p class="text-muted">Kategori: <?php echo e($question->category); ?> • Diposting oleh <?php echo e($question->user->name); ?> pada <?php echo e($question->created_at->format('d M Y')); ?></p>
            <p class="mt-3"><?php echo e($question->content); ?></p>
        </div>
    </div>

    <div class="mt-4">
        <h4>Jawaban</h4>
        <?php $__empty_1 = true; $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card my-3">
                <div class="card-body">
                    <p><?php echo e($answer->content); ?></p>
                    <p class="text-muted">Dijawab oleh <?php echo e($answer->user->name); ?> pada <?php echo e($answer->created_at->format('d M Y')); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>Belum ada jawaban untuk pertanyaan ini.</p>
        <?php endif; ?>
    </div>

    <div class="mt-4">
        <h4>Tambahkan Jawaban</h4>
        <form action="<?php echo e(route('answers.store', $question->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="content" class="form-label">Jawaban Anda</label>
                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Tulis jawaban Anda..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\komunitas-belajar\resources\views/questions/detail.blade.php ENDPATH**/ ?>