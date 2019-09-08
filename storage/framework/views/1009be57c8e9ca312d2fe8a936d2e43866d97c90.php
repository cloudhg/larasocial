<!DOCTYPE html>
<html>
<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php $__env->startSection('head'); ?>
        <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
</head>
<body>
    <?php echo $__env->make('partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <main class="py-4">
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
</body>
</html>