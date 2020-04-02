<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <div class="col-md-12">
                <div class="user-data p-3" style="border: 1px solid #e0e0e0;">
                    <!-- DATA TABLE -->
                    <div class="pull-right">
                        <a href="/accounts/requisitioner/create" class="btn btn-primary btn-sm btn-120"><i class="fa fa-plus"></i> Requisitioner</a>
                    </div>

                    <h3 class="title-5">User Accounts</h3>

                    <div class="table-responsive">
                        <table class="table table-striped mt-10">
                            <thead>
                                <tr>
                                    <th width="490">Name</th>
                                    <th width="505">Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td width="480"><a href="<?php echo e(url('/accounts/' . $user->id)); ?>"><?php echo e($user->name); ?></a></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td class="pull-right"><a href="<?php echo e(url('account/delete/' . $user->id)); ?>" class="btn badge badge-danger" style="padding: 7px!important;">Delete</a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
        </div>


        <div class="col-md-12 mt-4">
                <div class="user-data p-3" style="border: 1px solid #e0e0e0;">
                    <!-- DATA TABLE -->
                    <div class="pull-right">
                        <a href="/accounts/admin/create" class="btn btn-primary btn-sm btn-120"><i class="fa fa-plus"></i> Admin</a>
                    </div>

                    <h3 class="title-5">Admin Accounts</h3>

                    <div class="table-responsive">
                        <table class="table table-striped mt-10">
                            <thead>
                                <tr>
                                    <th width="490">Name</th>
                                    <th width="505">Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td width="470"><a href="<?php echo e(url('accounts/' . $user->id)); ?>"><?php echo e($user->name); ?></a></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td class="pull-right"><a href="<?php echo e(url('account/delete/' . $user->id)); ?>" class="btn badge badge-danger" style="padding: 7px!important;">Delete</a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
        </div>


        <div class="col-md-12 mt-4">
                <div class="user-data p-3" style="border: 1px solid #e0e0e0;">
                    <!-- DATA TABLE -->
                    <div class="pull-right">
                        <a href="/accounts/partner/create" class="btn btn-primary btn-sm btn-120"><i class="fa fa-plus"></i> Partner</a>
                    </div>

                    <h3 class="title-5">Partner Accounts</h3>

                    <div class="table-responsive">
                        <table class="table table-striped mt-10">
                            <thead>
                                <tr>
                                    <th width="490">Name</th>
                                    <th width="505">Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td width="480"><a href="<?php echo e(url('accounts/partner/' . $user->id)); ?>"><?php echo e($user->name); ?></a></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td class="pull-right"><a href="<?php echo e(url('account/delete/' . $user->id)); ?>" class="btn badge badge-danger" style="padding: 7px!important;">Delete</a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
        </div>

        <div class="col-md-12 mt-4">
                <div class="user-data p-3" style="border: 1px solid #e0e0e0;">
                    <!-- DATA TABLE -->
                    <div class="pull-right">
                        <a href="/accounts/supplier/create" class="btn btn-primary btn-sm btn-120"><i class="fa fa-plus"></i> Supplier</a>
                    </div>

                    <h3 class="title-5">Supplier Accounts</h3>

                    <div class="table-responsive">
                        <table class="table table-striped mt-10">
                            <thead>
                                <tr>
                                    <th width="490">Name</th>
                                    <th width="505">Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><a href="<?php echo e(url('accounts/supplier/' . $user->id)); ?>"><?php echo e($user->name); ?></a></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td class="pull-right"><a href="<?php echo e(url('account/delete/' . $user->id)); ?>" class="btn badge badge-danger" style="padding: 7px!important;">Delete</a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>