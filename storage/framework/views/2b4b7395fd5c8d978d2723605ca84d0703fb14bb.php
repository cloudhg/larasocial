<!DOCTYPE html>
<html>

<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php $__env->startSection('head'); ?>
        <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <?php echo $__env->yieldSection(); ?>
</head>


<body>   
	
    <?php $__env->startSection('nav'); ?>
	    <?php echo $__env->make('partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <?php echo $__env->yieldSection(); ?>

    <main class="py-4">
        <div class="container">
			
            <?php $__env->startSection('content'); ?>
			  hallo
			<?php echo $__env->yieldSection(); ?>			
			
        </div>
    </main>
</body>

<footer>


  

	

</footer>
</html>