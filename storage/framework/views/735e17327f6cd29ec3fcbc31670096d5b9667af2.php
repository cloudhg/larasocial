<?php $__env->startSection('title', '詳細資料'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">詳細資料</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 text-right p-0">學號：</div>
                        <div class="col-md-5 p-0"><?php echo e($student_no); ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right p-0">姓名：</div>
                        <div class="col-md-5 p-0">小明</div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right p-0">電話：</div>
                        <div class="col-md-5 p-0">0912345678</div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 text-right p-0">信箱：</div>
                        <div class="col-md-5 p-0">min@mail.com</div>
                    </div>
                    <?php if( is_null($subject) || $subject == 'chinese' ): ?>
                        <div class="row">
                            <div class="col-md-5 text-right p-0">國文：</div>
                            <div class="col-md-5 p-0">60</div>
                        </div>
                    <?php endif; ?>
                    <?php if( is_null($subject) || $subject == 'english' ): ?>
                        <div class="row">
                            <div class="col-md-5 text-right p-0">英文：</div>
                            <div class="col-md-5 p-0">60</div>
                        </div>
                    <?php endif; ?>
                    <?php if( is_null($subject) || $subject == 'math' ): ?>
                        <div class="row">
                            <div class="col-md-5 text-right p-0">數學：</div>
                            <div class="col-md-5 p-0">60</div>
                        </div>
                     <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>