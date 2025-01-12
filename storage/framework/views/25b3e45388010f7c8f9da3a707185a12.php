<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Styles -->
        <style>
            .hero {
                background: linear-gradient(to right, #4e54c8, #8f94fb);
                color: white;
                padding: 60px 0;
            }
            .feature-card {
                transition: transform 0.3s, box-shadow 0.3s;
            }
            .feature-card:hover {
                transform: scale(1.05);
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            }
            footer {
                background-color: #212529;
                color: #adb5bd;
            }
            body {
                background-color: #f8f9fa;
            }
        </style>

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Navigation -->
            <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo e($header); ?>

                    </div>
                </header>
            <?php endif; ?>

            <!-- Page Content -->
            <main>
                <?php echo $__env->yieldContent('content'); ?> <!-- Tempat untuk konten dari child views -->
            </main>
        </div>

        <!-- Footer -->
        <footer class="py-4 text-center">
            <div class="container">
                <p>© <?php echo e(date('Y')); ?> Komunitas Belajar. All rights reserved.</p>
            </div>
        </footer>
    </body>
</html>
<?php /**PATH C:\laragon\www\komunitas-belajar\resources\views/layouts/app.blade.php ENDPATH**/ ?>