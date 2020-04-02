<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th colspan="{{ $display=='month_qtr' ? 4 : ($display=='quarterly' ? 1 : 3) }}" class="text-center br">Quarter 1</th>
            <th colspan="{{ $display=='month_qtr' ? 4 : ($display=='quarterly' ? 1 : 3) }}" class="text-center br">Quarter 2</th>
            <th colspan="{{ $display=='month_qtr' ? 4 : ($display=='quarterly' ? 1 : 3) }}" class="text-center br">Quarter 3</th>
            <th colspan="{{ $display=='month_qtr' ? 4 : ($display=='quarterly' ? 1 : 3) }}" class="text-center br">Quarter 4</th>
            <th colspan="3" class="text-center">Year Total</th>
        </tr>
        <tr class="dates">
            <th></th>
            <?php $s = $carbon::parse($start);
$i = 1;?>
            @while($s->format('M-y')!=$end->format('M-y'))
                <th data-row-date="{{ $s->format('M-y') }}" class="blue {{ $display=='quarterly' ? 'd-none' : '' }}"> {{ $s->format('M-y') }}</th>
                @if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly"))
                    <th class="blue">Total</th>
                @endif
                <?php $s->addMonth();?>
            @endwhile

            <th class="blue">Incurred</th>


            @if(in_array('committed',$filters))
                <th class="blue">Commited</th>
            @endif

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
            @while($s->format('M-y')!=$end->format('M-y'))

                <?php $rTotal += $rows['Consumables'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="{{ $i }}" class="{{ $i % 3 == 0 && $display!='month_qtr' ? 'br' : '' }} {{ $display=='quarterly' ? 'd-none' : '' }}"> {{ $rows['Consumables'][$s->format('M-y')] ?? '-'  }}</td>
                @if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly"))
                    <td data-num-qtr="{{ $i }}" class="br">{{ number_format($rTotal,2) }}</td>
                @endif
                <?php $s->addMonth();?>

            @endwhile
            <td data-row-incurred>-</td>
            @if(in_array('committed',$filters))
                <td data-row-committed>-</td>
            @endif
            <td data-row-total>-</td>
        </tr>
        @if(in_array('committed',$filters))
            <tr>
                <th class="text-danger">Committed</th>
                <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
                @while($s->format('M-y')!=$end->format('M-y'))
                    <?php $rTotal += $rows['Consumables_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="{{ $i }}" class="text-danger {{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }} {{ $display=='quarterly' ? 'd-none' : '' }}"> {{ $rows['Consumables_committed'][$s->format('M-y')] ?? '-'  }}</td>
                    @if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly"))
                        <td data-num-committed-qtr="{{ $i }}" class="br text-danger">{{ number_format($rTotal,2) }}</td>
                    @endif
                    <?php $s->addMonth();?>
                @endwhile
                <td data-row-incurred class="text-danger">-</td>
                <td data-row-committed class="text-danger">-</td>
                <td data-row-total class="text-danger">-</td>
            </tr>
        @endif


        <tr>
            <th>Equipment</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
            @while($s->format('M-y')!=$end->format('M-y'))
                <?php $rTotal += $rows['Equipment'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="{{ $i }}" class="{{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }} {{ $display=='quarterly' ? 'd-none' : '' }}"> {{ $rows['Equipment'][$s->format('M-y')] ?? '-'  }}</td>
                @if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly"))
                    <td data-num-qtr="{{ $i }}" class="br">{{ number_format($rTotal,2) }}</td>
                @endif
                <?php $s->addMonth();?>
            @endwhile
            <td data-row-incurred>-</td>
            @if(in_array('committed',$filters))
                <td data-row-committed>-</td>
            @endif
            <td data-row-total>-</td>
        </tr>
        @if(in_array('committed',$filters))
            <tr>
                <th class="text-danger">Committed</th>
                <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
                @while($s->format('M-y')!=$end->format('M-y'))
                    <?php $rTotal += $rows['Equipment_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="{{ $i }}" class="text-danger {{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }} {{ $display=='quarterly' ? 'd-none' : '' }}"> {{ $rows['Equipment_committed'][$s->format('M-y')] ?? '-'  }}</td>
                    @if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly"))
                        <td data-num-committed-qtr="{{ $i }}" class="br">{{ number_format($rTotal,2) }}</td>
                    @endif

                    <?php $s->addMonth();?>
                @endwhile
                <td data-row-incurred class="text-danger">-</td>
                <td data-row-committed class="text-danger">-</td>
                <td data-row-total class="text-danger">-</td>
            </tr>
        @endif



        <tr>
            <th>Travel &amp; Subsistence</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
            @while($s->format('M-y')!=$end->format('M-y'))
                <?php $rTotal += $rows['Travel'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="{{ $i }}" class="{{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }} {{ $display=='quarterly' ? 'd-none' : '' }}"> {{ $rows['Travel'][$s->format('M-y')] ?? '-'  }}</td>
                @if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly"))
                    <td data-num="{{ $i }}" class="br">{{ number_format($rTotal,2) }}</td>
                @endif
                <?php $s->addMonth();?>
            @endwhile
            <td data-row-incurred>-</td>
            @if(in_array('committed',$filters))
                <td data-row-committed>-</td>
            @endif
            <td data-row-total>-</td>
        </tr>
        @if(in_array('committed',$filters))
            <tr>
                <th class="text-danger">Committed</th>
                <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
                @while($s->format('M-y')!=$end->format('M-y'))
                    <?php $rTotal += $rows['Travel_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="{{ $i }}" class="text-danger {{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }} {{ $display=='quarterly' ? 'd-none' : '' }}"> {{ $rows['Travel_committed'][$s->format('M-y')] ?? '-'  }}</td>
                    @if($i++%3==0 && ($display=="month_qtr" || $display=="quarterly"))
                        <td data-num-committed-qtr="{{ $i }}" class="br">{{ number_format($rTotal,2) }}</td>
                    @endif
                    <?php $s->addMonth();?>
                @endwhile
                <td data-row-incurred class="text-danger">-</td>
                <td data-row-committed class="text-danger">-</td>
                <td data-row-total class="text-danger">-</td>
            </tr>
        @endif

    </tbody>
    <tfoot>

    <?php $colums = $display == "month_qtr" || $display == "quarterly" ? 17 : 13;?>

        @if(in_array('budget',$filters))
            <tr class="budget">
                <th class="">Budget</th>
    <?php
$i = 1;
$totRow = 1;
$s = $carbon::parse($start);
$total = 0;
?>
                @while($i<$colums)
                    <?php $total += $budget[$s->format('M-y')] ?? 0;?>
                    @if($colums==17 && $i%4==0)
                        <td data-budget-total-qtr="{{ $totRow-- }}">{{ number_format($total, 2, '.',"") }}</td>
                        <?php $totRow++;
$total = 0;?>
                    @else
                        <td onclick="budgetChange(this);" data-budget="{{ $totRow }}" class="{{ $display=='quarterly' ? 'd-none' : '' }}">{{ number_format($budget[$s->format('M-y')] ?? '0.00',2,".","")  }}</td>
                        <?php $totRow++;
$s->addMonth();?>
                    @endif
<?php
$i++;
?>
                @endwhile
            </tr>
        @endif

        <tr class="incurred">
            <th class="blue">Incurred</th>
<?php $i = 1;
$totRow = 1;?>
            @while($i<$colums)
                @if($colums==17 && $i%4==0)
                    <td class="blue" data-total-qtr="{{ $totRow-- }}">-</td>
                    <?php $totRow++;?>
                @else
                    <td class="blue {{ $display=='quarterly' ? 'd-none' : '' }}" data-total="{{ $totRow }}">-</td>
                    <?php $totRow++;?>
                @endif
                <?php $i++;?>
            @endwhile
        </tr>
        @if(in_array('tracker',$filters))
        <tr>
            <th class="blue">Difference</th>
<?php $i = 1;
$totRow = 1;?>
            @while($i<$colums)
                @if($colums==17 && $i%4==0)
                    <td class="blue" data-difference="{{ $totRow-- }}">-</td>
                    <?php $totRow++;?>
                @else
                    <td class="blue {{ $display=='quarterly' ? 'd-none' : '' }}" data-difference="{{ $totRow }}">-</td>
                    <?php $totRow++;?>
                @endif
                <?php $i++;?>
            @endwhile
        </tr>
        <tr>
            <th class="blue">% Diff</th>
<?php $i = 1;
$totRow = 1;?>
            @while($i<$colums)
                @if($colums==17 && $i%4==0)
                    <td class="blue" data-difference-percent="{{ $totRow-- }}">-</td>
                    <?php $totRow++;?>
                @else
                    <td class="blue {{ $display=='quarterly' ? 'd-none' : '' }}" data-difference-percent="{{ $totRow }}">-</td>
                    <?php $totRow++;?>
                @endif
                <?php $i++;?>
            @endwhile
        </tr>
        @endif

        @if(in_array('committed',$filters))
        <tr>
            <th class="blue text-danger">Committed</th>
<?php $i = 1;
$totRow = 1;?>
            @while($i<$colums)
                @if($colums==17 && $i%4==0)
                    <td class="blue text-danger" data-committed-qtr-all="{{ $totRow-- }}">-</td>
                    <?php $totRow++;?>
                @else
                    <td class="blue text-danger {{ $display=='quarterly' ? 'd-none' : '' }}" data-committed="{{ $totRow }}">-</td>
                    <?php $totRow++;?>
                @endif
                <?php $i++;?>
            @endwhile
        </tr>
        @endif
        <tr>
            <th class="blue">Total</th>
            <?php $i = 1;
$totRow = 1;
?>
            @while($i<$colums)
                @if($colums==17 && $i%4==0)
                    <td class="blue" data-total-all-qtr="{{ $totRow-- }}">-</td>
                    <?php $totRow++;?>
                @else
                    <td class="blue {{ $display=='quarterly' ? 'd-none' : '' }}" data-total-all="{{ $totRow }}">-</td>
                    <?php $totRow++;?>
                @endif
                <?php $i++;?>
            @endwhile
        </tr>
    </tfoot>
</table>
<script>
    var budget = {!! $budget !!};
</script>