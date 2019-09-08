flag_start
<!DOCTYPE html>
<html>
flag_t
<head>
    <title><?php echo $__env->yieldContent('title'); ?> testaa</title>
    <?php $__env->startSection('head'); ?>
        <?php echo $__env->make('partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <?php echo $__env->yieldSection(); ?>
</head>
flag_g

<body>   
	
    <?php $__env->startSection('nav'); ?>
	    <?php echo $__env->make('partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <?php echo $__env->yieldSection(); ?>

    <main class="py-4">
        <div class="container">
		    testxx
			
            <?php $__env->startSection('content'); ?>
			  hallo
			<?php echo $__env->yieldSection(); ?>			
			
			testyy
        </div>
    </main>
</body>

<footer>


  <?php $__env->startSection('fbtest'); ?>
<div class="footer">
  <div class="row justify-content-center">
    <div class="col-md-12 col-xs-12 col-sm-6 col-lg-6">
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src=
        "https://connect.facebook.net/sdk.js#xfbml=1&version=v4.0"></script>
      <div class="fb-comments" data-href=
        "http://127.0.0.1/ch07/HelloLaravel/public/board" 
	     data-width="" data-numposts="5"></div>
	</div>
  </div>
</div>
	<?php $__env->stopSection(); ?>


	

</footer>
</html>