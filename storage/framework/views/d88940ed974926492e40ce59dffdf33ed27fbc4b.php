<?php $__env->startSection('content'); ?>
<style>
    .half-div {
        overflow: scroll;
    }
    .form-control{
        height: calc(2.25rem + 2px) !important;
    }
</style>
<div class="container">
    <div class="row">

        <div class="col-md-12">
                <div class="">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-20">Reports</h3>

                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <form onsubmit="get();" action="javascript:get();" class="options">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="control-label">From</label>
                                <input onchange="get();" name="from" type="date" class="form-control" />
                            </div>
                            <div class="col-md-2">
                                <label class="control-label">To</label>
                                <input onchange="get();" name="to" type="date" value="<?php echo e(now()->format('Y-m-d')); ?>" class="form-control" />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <select name="field" onchange="get();" class="form-control">
                                    <option value="requisition_no">Requisition No.</option>
                                    <option value="requisitioner">Requisitioner</option>
                                    <option value="administrator">Administrator</option>
                                    <option value="department">Department</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                        <input name="search" type="text" class="form-control">
                                        <div class="input-group-append">
                                            <button onclick="get();" type="button" class="btn btn-dark"><i class="fa fa-search"></i></button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <select onchange="get();" name="type" class="form-control">
                                    <option value="all">All</option>
                                    <option value="consumables">Consumables</option>
                                    <option value="equipment">Equipment</option>
                                    <option value="travel">Travel &amp; Subsistence</option>
                                </select>
                            </div>
                        </div>
                        </form>
                        <div class="data-here">

                        </div>

                    </div>
                    <!-- END DATA TABLE -->

                </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(function(){
        get();
    });

    function get(){
        var data = $('.options').serialize();
        $.get("",data,function(response){
            $('.data-here').html(response);
        });
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>