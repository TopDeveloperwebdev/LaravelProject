<?php $__env->startSection('content'); ?>
<style>
    td input {
        max-width:150px;
    }
</style>
<div class="container">
    <div class="row">

        <div class="col-md-12">
                <div class="">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-20">Processing</h3>
                    <?php if($catProcessing->count()): ?>
                    <h5 class="sub-cat">Catalogue</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table  table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Requisition No</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Supplier</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Value</th>
                                    <th>Qty Received</th>
                                    <th>Date Received</th>
                                    <th>Notes</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $catProcessing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="<?php echo e($item->id); ?>" onclick="window.location='/catalogue/<?php echo e($order[0]->order_id); ?>'" data-url="/catalogue/<?php echo e($order[0]->order_id); ?>/<?php echo e($item->id); ?>">
                                        <td><?php echo e($item->requisition_no); ?></td>
                                        <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($item->admin->name); ?></td>
                                        <td><?php echo e($item->requisitioner->name); ?></td>
                                        <td><?php echo e($item->supplier); ?></td>
                                        <td><?php echo e($item->description); ?></td>
                                        <td><?php echo e($item->qty); ?></td>
                                        <td><?php echo e($item->total); ?></td>
                                        <td data-name="qty_received" onclick="event.cancelBubble=true;editable(this,'text');"><?php echo e($item->qty_received); ?></td>
                                        <td data-name="received_at" onclick="event.cancelBubble=true;editable(this,'date');"><?php echo e($item->received_at ? $item->received_at->format('d/m/y') : ''); ?></td>
                                        <td><?php echo e($item->notes()->count()); ?></td>
                                        <td>
                                        <?php if($order[0]->file): ?>
                                            <i onclick="event.cancelBubble=true;window.open('/catalogue/<?php echo e($order[0]->order_id); ?>/<?php echo e($order[0]->id); ?>/file')" class="fa fa-file-pdf attached" />
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    <?php endif; ?>

                    <?php if($noneCatProcessing->count()): ?>
                    <h5 class="sub-cat">Non Catalogue</h5>
                    <div class="table-responsive table-responsive-data2 mb-5">
                        <table class="table  table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Requisition No</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Supplier</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Value</th>
                                    <th>Qty Received</th>
                                    <th>Date Received</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $noneCatProcessing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/none-catalogue/<?php echo e($item->order_id); ?>'" data-url="/none-catalogue/<?php echo e($item->order_id); ?>/<?php echo e($item->id); ?>">
                                        <td><?php echo e($item->requisition_no); ?></td>
                                        <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($item->admin->name); ?></td>
                                        <td><?php echo e($item->requisitioner->name); ?></td>
                                        <td><?php echo e($item->supplier); ?></td>
                                        <td><?php echo e($item->description); ?></td>
                                        <td><?php echo e($item->qty); ?></td>
                                        <td><?php echo e($item->total); ?></td>
                                        <td data-name="qty_received" onclick="event.cancelBubble=true;editable(this,'text');"><?php echo e($item->qty_received); ?></td>
                                        <td data-name="received_at" onclick="event.cancelBubble=true;editable(this,'date');"><?php echo e($item->received_at ? $item->received_at->format('d/m/y') : ''); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>

                    <?php if($keyTravelProcessing->count()): ?>
                    <h5 class="sub-cat">Key Travel</h5>
                    <div class="table-responsive table-responsive-data2 mb-5">
                        <table class="table  table-hover table-striped">
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
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $keyTravelProcessing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $order->childRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="<?php echo e($order->id); ?>" onclick="window.location='/key-travel/<?php echo e(strtolower($order->type)); ?>/<?php echo e($order->order_id); ?>'" data-url="/key-travel/<?php echo e(strtolower($order->type)); ?>/<?php echo e($order->order_id); ?>/<?php echo e($item->id); ?>">
                                        <td><?php echo e($item->key_travel_id); ?></td>
                                        <td><?php echo e($order->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($order->admin->name); ?></td>
                                        <td><?php echo e($order->requisitioner->name); ?></td>
                                        <td><?php echo e($item->travel_date); ?></td>
                                        <td><?php echo e($order->type); ?></td>
                                        <td><?php echo e($item->destination); ?></td>
                                        <td><?php echo e($item->value); ?></td>
                                        <td><?php echo e($item->notes()->count()); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    <?php endif; ?>


                    <?php if($carHireProcessing->count()): ?>
                    <h5 class="sub-cat">Car Hire</h5>
                    <div class="table-responsive table-responsive-data2 mb-5">
                        <table class="table  table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Travel Date</th>
                                    <th>Value</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $carHireProcessing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/car-hire/<?php echo e($item->order_id); ?>'" data-url="/car-hire/<?php echo e($item->order_id); ?>">
                                        <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($item->admin->name); ?></td>
                                        <td><?php echo e($item->requisitioner->name); ?></td>
                                        <td><?php echo e($item->start_date); ?></td>
                                        <td><?php echo e($item->total); ?></td>
                                        <td><?php echo e($item->notes()->count()); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>


                    <?php if($cateringProcessing->count()): ?>
                    <h5 class="sub-cat">Catering</h5>
                    <div class="table-responsive table-responsive-data2 mb-5">
                        <table class="table  table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Event Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $cateringProcessing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/catering/<?php echo e($item->order_id); ?>'">
                                        <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($item->admin->name); ?></td>
                                        <td><?php echo e($item->requisitioner->name); ?></td>
                                        <td><?php echo e($item->event_name); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>


                    <?php if($storesProcessing->count()): ?>
                    <h5 class="sub-cat">Stores</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table  table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Value</th>
                                    <th>Qty Received</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $storesProcessing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/stores/<?php echo e($order[0]->order_id); ?>'" data-url="/stores/<?php echo e($order[0]->order_id); ?>/<?php echo e($item->id); ?>">
                                            <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                            <td><?php echo e($item->admin->name); ?></td>
                                            <td><?php echo e($item->requisitioner->name); ?></td>
                                            <td><?php echo e($item->description); ?></td>
                                            <td><?php echo e($item->qty); ?></td>
                                            <td><?php echo e($item->total); ?></td>
                                            <td data-name="qty_received" onclick="event.cancelBubble=true;editable(this,'text');"><?php echo e($item->qty_received); ?></td>
                                            <td><?php echo e($item->notes()->count()); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>


                    <?php if($trainingProcessing->count()): ?>
                    <h5 class="sub-cat">Training</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table  table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Requisition No</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $trainingProcessing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location='/training/<?php echo e($item->order_id); ?>'" data-url="/training/<?php echo e($item->order_id); ?>">
                                        <td><?php echo e($item->requisition_no); ?></td>
                                        <td><?php echo e($item->created_at->format('d/m/y')); ?></td>
                                        <td><?php echo e($item->admin->name); ?></td>
                                        <td><?php echo e($item->requisitioner->name); ?></td>
                                        <td><?php echo e($item->description); ?></td>
                                        <td><?php echo e($item->value); ?></td>
                                        <td><?php echo e($item->notes()->count()); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>


                </div>
        </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script>
        function editable(td, type="text"){
            var val = $(td).html();
            $(td).attr('onclick','event.cancelBubble=true;');
            $(td).html('<input type="'+type+'" id="active-edit" onblur="onEditFinish(this,\''+type+'\');" class="form-control sm" value="'+val+'" />');
            $('#active-edit').focus();
        }
        function onEditFinish(input, type){
            var val = $(input).val();
            var td = $(input).closest('td');
            console.log(td);
            td.html(val);
            td.attr('onclick','event.cancelBubble=true;editable(this, \''+type+'\');');

            var url = td.closest('tr').attr('data-url');
            console.log(url);
            var data = { '_token': '<?php echo e(csrf_token()); ?>'};
            td.closest('tr').find('td[data-name]').each(function(){
                data[$(this).attr('data-name')]=$(this).html();
            });

            $.post(url ,data,function(response){  });
        }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>