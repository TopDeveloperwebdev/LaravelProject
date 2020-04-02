<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">

        <div class="col-md-12">
                <div class="">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-20">History</h3>
                    <?php if($catHistory->count()): ?>
                    <h5 class="sub-cat">Catalogue</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Requisition No</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $catHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/catalogue/<?php echo e($item->order_id); ?>';">
                                        <td><?php echo e($item->requisition_no); ?></td>
                                        <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($item->admin->name); ?></td>
                                        <td><?php echo e($item->requisitioner->name); ?></td>
                                        <td><?php echo e($item->description); ?></td>
                                        <td><?php echo e($item->total); ?></td>
                                        <td><?php echo e($item->requisitioner->department->short_name); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    <?php endif; ?>

                    <?php if($noneCatHistory->count()): ?>
                    <h5 class="sub-cat">Non Catalogue</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Requisition No</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $noneCatHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/none-catalogue/<?php echo e($item->order_id); ?>';">
                                        <td><?php echo e($item->requisition_no); ?></td>
                                        <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($item->admin->name); ?></td>
                                        <td><?php echo e($item->requisitioner->name); ?></td>
                                        <td><?php echo e($item->description); ?></td>
                                        <td><?php echo e($item->total); ?></td>
                                        <td><?php echo e($item->requisitioner->department->short_name ?? ''); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>

                    <?php if($keyTravelHistory->count()): ?>
                    <h5 class="sub-cat">Key Travel</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>KT Trip ID</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requistisioner</th>
                                    <th>Travel Date</th>
                                    <th>Type</th>
                                    <th>Destination</th>
                                    <th>Value</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $keyTravelHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $order->childRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/key-travel/<?php echo e(strtolower($order->type)); ?>/<?php echo e($order->order_id); ?>'">
                                        <td><?php echo e($item->key_travel_id); ?></td>
                                        <td><?php echo e($order->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($order->admin->name); ?></td>
                                        <td><?php echo e($order->requisitioner->name); ?></td>
                                        <td><?php echo e($item->travel_date); ?></td>
                                        <td><?php echo e($order->type); ?></td>
                                        <td><?php echo e($item->destination); ?></td>
                                        <td><?php echo e($item->value); ?></td>
                                        <td><?php echo e($order->requisitioner->department->short_name); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    <?php endif; ?>

                    <?php if($carHireHistory->count()): ?>
                    <h5 class="sub-cat">Car Hire</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Travel Date</th>
                                    <th>Total</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $carHireHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/car-hire/<?php echo e($item->order_id); ?>';">
                                        <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($item->admin->name); ?></td>
                                        <td><?php echo e($item->requisitioner->name); ?></td>
                                        <td><?php echo e($item->start_date); ?></td>
                                        <td><?php echo e($item->total); ?></td>
                                        <td><?php echo e($item->requisitioner->department->short_name ?? ''); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>


                    <?php if($cateringHistory->count()): ?>
                    <h5 class="sub-cat">Catering</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requisitioner</th>
                                    <th>Event Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $cateringHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/catering/<?php echo e($item->order_id); ?>'">
                                        <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($item->requisitioner->name); ?></td>
                                        <td><?php echo e($item->event_name); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>


                    <?php if($storesHistory->count()): ?>
                    <h5 class="sub-cat">Stores</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Total</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $storesHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr onclick="window.location='/stores/<?php echo e($item->order_id); ?>';">
                                            <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                            <td><?php echo e($item->admin->name); ?></td>
                                            <td><?php echo e($item->requisitioner->name); ?></td>
                                            <td><?php echo e($item->description); ?></td>
                                            <td><?php echo e($item->total); ?></td>
                                            <td><?php echo e($item->requisitioner->department->short_name); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>

                    <?php if($trainingHistory->count()): ?>
                    <h5 class="sub-cat">Training</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $trainingHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/training/<?php echo e($item->order_id); ?>';">
                                        <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($item->admin->name); ?></td>
                                        <td><?php echo e($item->requisitioner->name); ?></td>
                                        <td><?php echo e($item->description); ?></td>
                                        <td><?php echo e($item->value); ?></td>
                                        <td><?php echo e($item->requisitioner->department->short_name); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>

                    <?php if($expenseHistory->count()): ?>
                    <h5 class="sub-cat">Expenses</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $expenseHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/expenses/<?php echo e($item->order_id); ?>';">
                                        <td><?php echo e($item->start_date); ?></td>
                                        <td><?php echo e($item->admin->name); ?></td>
                                        <td><?php echo e($item->requisitioner->name); ?></td>
                                        <td><?php echo e($item->description); ?></td>
                                        <td><?php echo e($item->total); ?></td>
                                        <td><?php echo e($item->requisitioner->department->short_name); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>


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