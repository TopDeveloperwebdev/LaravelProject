<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th colspan="<?php echo e($display=='month_qtr' ? 4 : ($display=='quarterly' ? 1 : 3)); ?>" class="text-center br">Quarter 1</th>
            <th colspan="<?php echo e($display=='month_qtr' ? 4 : ($display=='quarterly' ? 1 : 3)); ?>" class="text-center br">Quarter 2</th>
            <th colspan="<?php echo e($display=='month_qtr' ? 4 : ($display=='quarterly' ? 1 : 3)); ?>" class="text-center br">Quarter 3</th>
            <th colspan="<?php echo e($display=='month_qtr' ? 4 : ($display=='quarterly' ? 1 : 3)); ?>" class="text-center br">Quarter 4</th>
            <th colspan="3" class="text-center">Year Total</th>
        </tr>
        <tr class="dates">
            <th></th>
            <?php $s = $carbon::parse($start);
$i = 1;?>
            <?php while($s->format('M-y')!=$end->format('M-y')): ?>
                <th data-row-date="<?php echo e($s->format('M-y')); ?>" class="blue <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>"> <?php echo e($s->format('M-y')); ?></th>
                <?php if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly")): ?>
                    <th class="blue">Total</th>
                <?php endif; ?>
                <?php $s->addMonth();?>
            <?php endwhile; ?>

            <th class="blue">Incurred</th>


            <?php if(in_array('committed',$filters)): ?>
                <th class="blue">Commited</th>
            <?php endif; ?>

            <th class="blue">Total</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <th>Consumables</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;
?>
            <?php while($s->format('M-y')!=$end->format('M-y')): ?>

                <?php $rTotal += $rows['Consumables'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="<?php echo e($i); ?>" class="<?php echo e($i % 3 == 0 && $display!='month_qtr' ? 'br' : ''); ?> <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>"> <?php echo e($rows['Consumables'][$s->format('M-y')] ?? '-'); ?></td>
                <?php if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly")): ?>
                    <td data-num-qtr="<?php echo e($i); ?>" class="br"><?php echo e(number_format($rTotal,2)); ?></td>
                <?php endif; ?>
                <?php $s->addMonth();?>

            <?php endwhile; ?>
            <td data-row-incurred>-</td>
            <?php if(in_array('committed',$filters)): ?>
                <td data-row-committed>-</td>
            <?php endif; ?>
            <td data-row-total>-</td>
        </tr>
        <?php if(in_array('committed',$filters)): ?>
            <tr>
                <th class="text-danger">Committed</th>
                <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
                <?php while($s->format('M-y')!=$end->format('M-y')): ?>
                    <?php $rTotal += $rows['Consumables_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="<?php echo e($i); ?>" class="text-danger <?php echo e($i%3==0 && $display!='month_qtr' ? 'br' : ''); ?> <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>"> <?php echo e($rows['Consumables_committed'][$s->format('M-y')] ?? '-'); ?></td>
                    <?php if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly")): ?>
                        <td data-num-committed-qtr="<?php echo e($i); ?>" class="br text-danger"><?php echo e(number_format($rTotal,2)); ?></td>
                    <?php endif; ?>
                    <?php $s->addMonth();?>
                <?php endwhile; ?>
                <td data-row-incurred class="text-danger">-</td>
                <td data-row-committed class="text-danger">-</td>
                <td data-row-total class="text-danger">-</td>
            </tr>
        <?php endif; ?>


        <tr>
            <th>Equipment</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
            <?php while($s->format('M-y')!=$end->format('M-y')): ?>
                <?php $rTotal += $rows['Equipment'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="<?php echo e($i); ?>" class="<?php echo e($i%3==0 && $display!='month_qtr' ? 'br' : ''); ?> <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>"> <?php echo e($rows['Equipment'][$s->format('M-y')] ?? '-'); ?></td>
                <?php if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly")): ?>
                    <td data-num-qtr="<?php echo e($i); ?>" class="br"><?php echo e(number_format($rTotal,2)); ?></td>
                <?php endif; ?>
                <?php $s->addMonth();?>
            <?php endwhile; ?>
            <td data-row-incurred>-</td>
            <?php if(in_array('committed',$filters)): ?>
                <td data-row-committed>-</td>
            <?php endif; ?>
            <td data-row-total>-</td>
        </tr>
        <?php if(in_array('committed',$filters)): ?>
            <tr>
                <th class="text-danger">Committed</th>
                <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
                <?php while($s->format('M-y')!=$end->format('M-y')): ?>
                    <?php $rTotal += $rows['Equipment_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="<?php echo e($i); ?>" class="text-danger <?php echo e($i%3==0 && $display!='month_qtr' ? 'br' : ''); ?> <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>"> <?php echo e($rows['Equipment_committed'][$s->format('M-y')] ?? '-'); ?></td>
                    <?php if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly")): ?>
                        <td data-num-committed-qtr="<?php echo e($i); ?>" class="br"><?php echo e(number_format($rTotal,2)); ?></td>
                    <?php endif; ?>

                    <?php $s->addMonth();?>
                <?php endwhile; ?>
                <td data-row-incurred class="text-danger">-</td>
                <td data-row-committed class="text-danger">-</td>
                <td data-row-total class="text-danger">-</td>
            </tr>
        <?php endif; ?>



        <tr>
            <th>Travel &amp; Subsistence</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
            <?php while($s->format('M-y')!=$end->format('M-y')): ?>
                <?php $rTotal += $rows['Travel'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="<?php echo e($i); ?>" class="<?php echo e($i%3==0 && $display!='month_qtr' ? 'br' : ''); ?> <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>"> <?php echo e($rows['Travel'][$s->format('M-y')] ?? '-'); ?></td>
                <?php if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly")): ?>
                    <td data-num="<?php echo e($i); ?>" class="br"><?php echo e(number_format($rTotal,2)); ?></td>
                <?php endif; ?>
                <?php $s->addMonth();?>
            <?php endwhile; ?>
            <td data-row-incurred>-</td>
            <?php if(in_array('committed',$filters)): ?>
                <td data-row-committed>-</td>
            <?php endif; ?>
            <td data-row-total>-</td>
        </tr>
        <?php if(in_array('committed',$filters)): ?>
            <tr>
                <th class="text-danger">Committed</th>
                <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
                <?php while($s->format('M-y')!=$end->format('M-y')): ?>
                    <?php $rTotal += $rows['Travel_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="<?php echo e($i); ?>" class="text-danger <?php echo e($i%3==0 && $display!='month_qtr' ? 'br' : ''); ?> <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>"> <?php echo e($rows['Travel_committed'][$s->format('M-y')] ?? '-'); ?></td>
                    <?php if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly")): ?>
                        <td data-num-committed-qtr="<?php echo e($i); ?>" class="br"><?php echo e(number_format($rTotal,2)); ?></td>
                    <?php endif; ?>
                    <?php $s->addMonth();?>
                <?php endwhile; ?>
                <td data-row-incurred class="text-danger">-</td>
                <td data-row-committed class="text-danger">-</td>
                <td data-row-total class="text-danger">-</td>
            </tr>
        <?php endif; ?>

    </tbody>
    <tfoot>

    <?php $colums = $display == "month_qtr" || $display == "quarterly" ? 17 : 13;?>

        <?php if(in_array('budget',$filters)): ?>
            <tr class="budget">
                <th class="">Budget</th>
    <?php
$i = 1;
$totRow = 1;
$s = $carbon::parse($start);
$total = 0;
?>
                <?php while($i<$colums): ?>
                    <?php $total += $budget[$s->format('M-y')] ?? 0;?>
                    <?php if($colums==17 && $i%4==0): ?>
                        <td data-budget-total-qtr="<?php echo e($totRow--); ?>"><?php echo e(number_format($total, 2, '.',"")); ?></td>
                        <?php $totRow++;
$total = 0;?>
                    <?php else: ?>
                        <td onclick="budgetChange(this);" data-budget="<?php echo e($totRow); ?>" class="<?php echo e($display=='quarterly' ? 'd-none' : ''); ?>"><?php echo e(number_format($budget[$s->format('M-y')] ?? '0.00',2,".","")); ?></td>
                        <?php $totRow++;
$s->addMonth();?>
                    <?php endif; ?>
<?php
$i++;
?>
                <?php endwhile; ?>
            </tr>
        <?php endif; ?>

        <tr class="incurred">
            <th class="blue">Incurred</th>
<?php $i = 1;
$totRow = 1;?>
            <?php while($i<$colums): ?>
                <?php if($colums==17 && $i%4==0): ?>
                    <td class="blue" data-total-qtr="<?php echo e($totRow--); ?>">-</td>
                    <?php $totRow++;?>
                <?php else: ?>
                    <td class="blue <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>" data-total="<?php echo e($totRow); ?>">-</td>
                    <?php $totRow++;?>
                <?php endif; ?>
                <?php $i++;?>
            <?php endwhile; ?>
        </tr>
        <?php if(in_array('tracker',$filters)): ?>
        <tr>
            <th class="blue">Difference</th>
<?php $i = 1;
$totRow = 1;?>
            <?php while($i<$colums): ?>
                <?php if($colums==17 && $i%4==0): ?>
                    <td class="blue" data-difference="<?php echo e($totRow--); ?>">-</td>
                    <?php $totRow++;?>
                <?php else: ?>
                    <td class="blue <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>" data-difference="<?php echo e($totRow); ?>">-</td>
                    <?php $totRow++;?>
                <?php endif; ?>
                <?php $i++;?>
            <?php endwhile; ?>
        </tr>
        <tr>
            <th class="blue">% Diff</th>
<?php $i = 1;
$totRow = 1;?>
            <?php while($i<$colums): ?>
                <?php if($colums==17 && $i%4==0): ?>
                    <td class="blue" data-difference-percent="<?php echo e($totRow--); ?>">-</td>
                    <?php $totRow++;?>
                <?php else: ?>
                    <td class="blue <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>" data-difference-percent="<?php echo e($totRow); ?>">-</td>
                    <?php $totRow++;?>
                <?php endif; ?>
                <?php $i++;?>
            <?php endwhile; ?>
        </tr>
        <?php endif; ?>

        <?php if(in_array('committed',$filters)): ?>
        <tr>
            <th class="blue text-danger">Committed</th>
<?php $i = 1;
$totRow = 1;?>
            <?php while($i<$colums): ?>
                <?php if($colums==17 && $i%4==0): ?>
                    <td class="blue text-danger" data-committed-qtr-all="<?php echo e($totRow--); ?>">-</td>
                    <?php $totRow++;?>
                <?php else: ?>
                    <td class="blue text-danger <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>" data-committed="<?php echo e($totRow); ?>">-</td>
                    <?php $totRow++;?>
                <?php endif; ?>
                <?php $i++;?>
            <?php endwhile; ?>
        </tr>
        <?php endif; ?>
        <tr>
            <th class="blue">Total</th>
            <?php $i = 1;
$totRow = 1;
?>
            <?php while($i<$colums): ?>
                <?php if($colums==17 && $i%4==0): ?>
                    <td class="blue" data-total-all-qtr="<?php echo e($totRow--); ?>">-</td>
                    <?php $totRow++;?>
                <?php else: ?>
                    <td class="blue <?php echo e($display=='quarterly' ? 'd-none' : ''); ?>" data-total-all="<?php echo e($totRow); ?>">-</td>
                    <?php $totRow++;?>
                <?php endif; ?>
                <?php $i++;?>
            <?php endwhile; ?>
        </tr>
    </tfoot>
</table>
<script>
    var budget = <?php echo $budget; ?>;
</script>