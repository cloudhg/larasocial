<?php $__env->startSection('title', 'To Do List'); ?>

<?php $__env->startSection('content'); ?>

    <div class="panel panel-default">
        <!-- Display Validation Errors -->
        
 
        <!-- New Task Form -->
		<?php if(auth()->guard()->check()): ?>
        <form action="<?php echo e(route('todolist.store')); ?>" method="POST" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

 
            <!-- Task Name and Text -->
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Todo Task Title</label> 
                <div class="col-sm-4">
                    <input type="text" name="title" id="title" class="form-control <?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>">
					    <?php if($errors->has('title')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('title')); ?></strong>
                            </span>
                        <?php endif; ?>
                </div>
				<label for="content" class="col-sm-3 control-label">Todo Task Content</label> 
                <div class="col-sm-8">
					<textarea name="content" id="content" rows="3" class="form-control form-control-sm <?php echo e($errors->has('content') ? ' is-invalid' : ''); ?>" style="resize: vertical;"></textarea>
					    <?php if($errors->has('content')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('content')); ?></strong>
                            </span>
                        <?php endif; ?>
                </div>  
				<div class="col-sm-8 col-md-8">
                    <button type="submit" class="btn btn-sm btn-success ml-2 float-right">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
					
                </div></br>
            </div>
        </form>
		<?php else: ?> </br></br><h1>Please login to access Todo list! </h1></br></br></br>
		<?php endif; ?>

	</div>
	<!-- Display Current Tasks -->
    <?php if(count($posts) > 0): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks : </br></br>
            </div>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>							
		    <div class="card mb-3 col-md-12">
                <div class="card-body col-md-12">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title"><?php echo e($post->title); ?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <!--Created at : <?php echo e($post->created_at->toDateString()); ?>--}} -->
								Created at : <?php echo e($post->created_at); ?>  By <?php echo e($post->user->name); ?>

                            </div>
                        </div>
                        <hr class="my-0 mx-0">
                        <div class="row">
                            <div class="col-md-12" style="height: 100px; overflow: hidden;">
                                <p class="card-text" style="white-space: pre-line;">
                                    <?php echo e($post->content); ?>

                                </p> 
                            </div>
                        </div>
                        <div class="row mt-2">
						  <?php if(auth()->guard()->check()): ?>
						    <?php if(Auth::id() == $post->user_id): ?>
                              <div class="col-md-12">
                                <form action="<?php echo e(route('todolist.destroy', ['id' => $post->id])); ?>" method="POST">
                                  <?php echo csrf_field(); ?>
                                  <input type="hidden" name="_method" value="DELETE">
								  <div class="col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-sm btn-danger float-right">
                                      <i class="fas fa-trash"></i>
                                      <span class="pl-1">  Delete Task</span>
                                    </button>
								    <a href="<?php echo e(route('todolist.edit', ['id' => $post->id])); ?>" class="btn btn-sm btn-primary float-right">
                                      <i class="fas fa-pencil-alt"></i>
                                      <span class="pl-1">Edit Task</span>
                                    </a>
								  </div>
                                </form>
                              </div>
							<?php endif; ?>
						  <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
        </div>
    <?php endif; ?>
    <div class="row pt-2">
        <div class="col-md-8">
            <?php if(isset($keyword)): ?>
                <?php echo e($posts->appends(['keyword' => $keyword])->render()); ?>

            <?php else: ?>
                <?php echo e($posts->render()); ?>

            <?php endif; ?>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>