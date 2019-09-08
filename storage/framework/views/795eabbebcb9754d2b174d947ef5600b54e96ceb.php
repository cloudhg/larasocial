<?php $__env->startSection('title', 'To Do List : Edit'); ?>

<?php $__env->startSection('content'); ?>

    <div class="panel panel-default">
        <!-- Display Validation Errors -->
        
 
        <!-- New Task Form -->
		<?php if(auth()->guard()->check()): ?>
        <form action="<?php echo e(route('todolist.update', ['id' => $post->id] )); ?>" method="POST" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

 
            <!-- Task Name and Text -->
            <div class="form-group">
                <label for="title" class="col-sm-3 control-label">Todo Task Title</label> 
                <div class="col-sm-4">
                    <input type="text" name="title" id="title" class="form-control <?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" value="<?php echo e($post->title ?? ''); ?>">
					    <?php if($errors->has('title')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('title')); ?></strong>
                            </span>
                        <?php endif; ?>
                </div>
				<label for="content" class="col-sm-3 control-label">Todo Task Content</label> 
                <div class="col-sm-8">
					<textarea name="content" id="content" rows="3" class="form-control form-control-sm <?php echo e($errors->has('content') ? ' is-invalid' : ''); ?>" style="resize: vertical;"><?php echo e($post->content ?? ''); ?></textarea>
					    <?php if($errors->has('content')): ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($errors->first('content')); ?></strong>
                            </span>
                        <?php endif; ?>
                </div>
				<div class="col-sm-8 col-md-8">
                    <button type="submit" class="btn btn-sm btn-success ml-2 float-right">
                        <i class="fa fa-plus"></i> Modify Task
                    </button>
					
                </div></br>
            </div>
        </form>
		<?php else: ?> </br></br><h1>Please login to access Todo list! </h1></br></br></br>
		<?php endif; ?>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>