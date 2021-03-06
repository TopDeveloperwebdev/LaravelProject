<div class="row mt-5 ml-1" style="overflow-x: scroll;">
    
    <h4 style="width: 100%">Year 1 Accounting</h4>
    <table class="table table-striped partner-table ">
        <thead>
            <tr class="table-info">
                <th colspan="8"></th>
                <?php $__currentLoopData = [0,1,2,3]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th style="font-size: 11px"><?php echo e($dateArray[$index]->header); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td colspan="2"></td>
            </tr>
            <tr>
                <th colspan="8"></th>
                <?php $__currentLoopData = [0,1,2,3]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo e($dateArray[$index]->Qn); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th colspan="2"></th>

            </tr>
            <tr class="table-info">
                <th colspan="2">Cost Item</th>
                <th colspan="5">Description</th>
                <th>Total Budget</th>
                <?php $__currentLoopData = [0,1,2,3]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo e($dateArray[$index]->isCurrent); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th>PROJECT TOTAL</th>
                <th>VARIANCE</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="2"><?php echo e($makers[$key]); ?></td>
                <td colspan="5" width="20%"><?php echo e($row->description); ?></td>
                <td>£<?php echo e($row->y1_budget); ?></td>
                <td>£<?php echo e($row->q1); ?></td>
                <td>£<?php echo e($row->q2); ?></td>
                <td>£<?php echo e($row->q3); ?></td>
                <td>£<?php echo e($row->q4); ?></td>
                <td>£<?php echo e($row->YEAR_1); ?></td>
                <td>£<?php echo e($row->VARIANCE_1); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (for each claim)</td>
                <?php $__currentLoopData = [15,1,2,3,4,16,17]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td data-name="price" contentEditable="false" class="edit"><?php echo e($colSum[$index]); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (cumulative)</td>
                <td></td>
                <?php $__currentLoopData = [1,2,3,4]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td data-name="price" contentEditable="false" class="edit"><?php echo e($col2Sum[$index]); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td colspan="2"></td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="row mt-5 ml-1" style="overflow-x: scroll;">

    <h4 style="width: 100%">Year 2 Accounting</h4>
    <table class="table table-striped partner-table ">
        <thead>
            <tr class="table-info">
                <th colspan="8"></th>
                <?php $__currentLoopData = [4,5,6,7]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th style="font-size: 11px"><?php echo e($dateArray[$index]->header); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th colspan="2"></th>
            </tr>
            <tr>
                <th colspan="8"></th>
                <?php $__currentLoopData = [4,5,6,7]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo e($dateArray[$index]->Qn); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th></th>
                <th></th>
            </tr>
            <tr class="table-info">
                <th colspan="2">Cost Item</th>
                <th colspan="5">Description</th>
                <th>Total Budget</th>
                <?php $__currentLoopData = [4,5,6,7]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo e($dateArray[$index]->isCurrent); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th>PROJECT</th>
                <th>VARIANCE</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="2"><?php echo e($makers[$key]); ?></td>
                <td colspan="5"><?php echo e($row->description); ?></td>
                <td>£<?php echo e($row->y2_budget); ?></td>
                <td>£<?php echo e($row->q5); ?></td>
                <td>£<?php echo e($row->q6); ?></td>
                <td>£<?php echo e($row->q7); ?></td>
                <td>£<?php echo e($row->q8); ?></td>
                <td>£<?php echo e($row->YEAR_2); ?></td>
                <td>£<?php echo e($row->VARIANCE_2); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (cumulative)</td>
                <?php $__currentLoopData = [18,5,6,7,8,19,20]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td data-name="price" contentEditable="false" class="edit"><?php echo e($colSum[$index]); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (cumulative)</td>
                <td></td>
                <?php $__currentLoopData = [5,6,7,8]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td data-name="price" contentEditable="false" class="edit"><?php echo e($col2Sum[$index]); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>

<div class="row mt-5 ml-1" style="overflow-x: scroll;">
    <h4 style="width: 100%">Year 3 Accounting</h4>
    <table class="table table-striped partner-table ">
        <thead>
            <tr class="table-info">
                <th colspan="8"></th>
                <?php $__currentLoopData = [8,9,10,11]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th style="font-size: 11px"><?php echo e($dateArray[$index]->header); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th colspan="2"></th>
            </tr>
            <tr>
                <th colspan="8"></th>
                <?php $__currentLoopData = [8,9,10,11]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo e($dateArray[$index]->Qn); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <tr class="table-info">
                <th colspan="2">Cost Item</th>
                <th colspan="5">Description</th>
                <th>Total Budget</th>
                <?php $__currentLoopData = [8,9,10,11]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <th><?php echo e($dateArray[$index]->isCurrent); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <th>PROJECT</th>
                <th>VARIANCE</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="2"><?php echo e($makers[$key]); ?></td>
                <td colspan="5"><?php echo e($row->description); ?></td>
                <td>£<?php echo e($row->y3_budget); ?></td>
                <td>£<?php echo e($row->q9); ?></td>
                <td>£<?php echo e($row->q10); ?></td>
                <td>£<?php echo e($row->q11); ?></td>
                <td>£<?php echo e($row->q12); ?></td>
                <td>£<?php echo e($row->YEAR_3); ?></td>
                <td>£<?php echo e($row->VARIANCE_3); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (for each claim)</td>
                <?php $__currentLoopData = [21,9,10,11,12,22,23]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td data-name="price" contentEditable="false" class="edit"><?php echo e($colSum[$index]); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (cumulative)</td>
                <td></td>
                <?php $__currentLoopData = [9,10,11,12]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td data-name="price" contentEditable="false" class="edit"><?php echo e($col2Sum[12]); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <td colspan="2"></td>

            </tr>
        </tfoot>
    </table>
</div>
<script>

</script>
