
<table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th colspan="{{ $display=='month_qtr' ? 4 : 3 }}" class="text-center br">Quarter 1</th>
            <th colspan="{{ $display=='month_qtr' ? 4 : 3 }}" class="text-center br">Quarter 2</th>
            <th colspan="{{ $display=='month_qtr' ? 4 : 3 }}" class="text-center br">Quarter 3</th>
            <th colspan="{{ $display=='month_qtr' ? 4 : 3 }}" class="text-center br">Quarter 4</th>
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
            <th>Catalogue Items</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;
?>
            @while($s->format('M-y')!=$end->format('M-y'))
                <?php $rTotal += $rows['catalogue'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="{{ $i }}" class="{{ $i % 3 == 0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['catalogue'][$s->format('M-y')] ?? '-'  }}</td>
                @if($i++%3==0 && $display=="month_qtr")
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
                    <?php $rTotal += $rows['catalogue_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="{{ $i }}" class="text-danger {{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['catalogue_committed'][$s->format('M-y')] ?? '-'  }}</td>
                    @if($i++%3==0 && $display=="month_qtr")
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
            <th>Non Catalogue Items</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
            @while($s->format('M-y')!=$end->format('M-y'))
                <?php $rTotal += $rows['nonecatalogue'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="{{ $i }}" class="{{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['nonecatalogue'][$s->format('M-y')] ?? '-'  }}</td>
                @if($i++%3==0 && $display=="month_qtr")
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
                    <?php $rTotal += $rows['noncatalogue_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="{{ $i }}" class="text-danger {{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['noncatalogue_committed'][$s->format('M-y')] ?? '-'  }}</td>
                    @if($i++%3==0 && $display=="month_qtr")
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
            <th>Key Travel</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
            @while($s->format('M-y')!=$end->format('M-y'))
                <?php $rTotal += $rows['travel'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="{{ $i }}" class="{{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['travel'][$s->format('M-y')] ?? '-'  }}</td>
                @if($i++%3==0 && $display=="month_qtr")
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
                    <?php $rTotal += $rows['travel_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="{{ $i }}" class="text-danger {{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['travel_committed'][$s->format('M-y')] ?? '-'  }}</td>
                    @if($i++%3==0 && $display=="month_qtr")
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
            <th>Car Hire</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
            @while($s->format('M-y')!=$end->format('M-y'))
                <?php $rTotal += $rows['carhire'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="{{ $i }}" class="{{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['carhire'][$s->format('M-y')] ?? '-'  }}</td>
                @if($i++%3==0 && $display=="month_qtr")
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
                    <?php $rTotal += $rows['carhire_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="{{ $i }}" class="text-danger {{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['carhire_committed'][$s->format('M-y')] ?? '-'  }}</td>
                    @if($i++%3==0 && $display=="month_qtr")
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
            <th>Catering</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
            @while($s->format('M-y')!=$end->format('M-y'))
                <?php $rTotal += $rows['catering'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="{{ $i }}" class="{{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['catering'][$s->format('M-y')] ?? '-'  }}</td>
                @if($i++%3==0 && $display=="month_qtr")
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
                    <?php $rTotal += $rows['catering_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="{{ $i }}" class="text-danger {{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['catering_committed'][$s->format('M-y')] ?? '-'  }}</td>
                    @if($i++%3==0 && $display=="month_qtr")
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
            <th>Stores</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
            @while($s->format('M-y')!=$end->format('M-y'))
                <?php $rTotal += $rows['stores'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="{{ $i }}" class="{{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['stores'][$s->format('M-y')] ?? '-'  }}</td>
                @if($i++%3==0 && $display=="month_qtr")
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
                    <?php $rTotal += $rows['stores_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="{{ $i }}" class="text-danger {{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['stores_committed'][$s->format('M-y')] ?? '-'  }}</td>
                    @if($i++%3==0 && $display=="month_qtr")
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
            <th>Training</th>
            <?php $s = $carbon::parse($start);
$i = 1;
$rTotal = 0;?>
            @while($s->format('M-y')!=$end->format('M-y'))
                <?php $rTotal += $rows['training'][$s->format('M-y')] ?? 0.00;?>
                <td data-num="{{ $i }}" class="{{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['training'][$s->format('M-y')] ?? '-'  }}</td>
                @if($i++%3==0 && $display=="month_qtr")
                    <td class="br" data-num-qtr="{{ $i }}">{{ number_format($rTotal,2) }}</td>
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
                    <?php $rTotal += $rows['training_committed'][$s->format('M-y')] ?? 0.00;?>
                    <td data-num-committed="{{ $i }}" class="text-danger {{ $i%3==0 && $display!='month_qtr' ? 'br' : '' }}"> {{ $rows['training_committed'][$s->format('M-y')] ?? '-'  }}</td>
                    @if($i++%3==0 && $display=="month_qtr")
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

    <?php $colums = $display == "month_qtr" ? 17 : 13;?>

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
                        <td onclick="budgetChange(this);" data-budget="{{ $totRow }}">{{ number_format($budget[$s->format('M-y')] ?? '0.00',2,".","")  }}</td>
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
                    <td class="blue" data-total="{{ $totRow }}">-</td>
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
                    <td class="blue" data-difference="{{ $totRow }}">-</td>
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
                    <td class="blue" data-difference-percent="{{ $totRow }}">-</td>
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
                    <td class="blue text-danger" data-committed="{{ $totRow }}">-</td>
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
                    <td class="blue" data-total-all="{{ $totRow }}">-</td>
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