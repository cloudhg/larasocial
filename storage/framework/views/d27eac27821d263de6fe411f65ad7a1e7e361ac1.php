<?php $__env->startSection('title', '排行榜'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">排行榜</div>
                <div class="card-body p-1">
                    <table class="table table-hover m-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>名次</th>
                                <th>學號</th>
                                <th>姓名</th>
                                <th>國文</th>
                                <th>英文</th>
                                <th>數學</th>
                                <th>總分</th>
                                <th>動作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>s1234567890</td>
                                <td>小明</td>
                                <td>60</td>
                                <td>60</td>
                                <td>60</td>
                                <td>180</td>
                                <td>
                                    <a href="<?php echo e(route('students', ['student_no' => 's1234567890'])); ?>" class="btn btn-info btn-sm">
                                        查看學生資料
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>