<div class="row mt-5 ml-1" style="overflow-x: scroll;">
    {{-- <div class="table-responsive"> --}}
    <h4 style="width: 100%">Year 1 Accounting</h4>
    <table class="table table-striped partner-table ">
        <thead>
            <tr class="table-info">
                <th colspan="8"></th>
                @foreach([0,1,2,3] as $index)
                <th style="font-size: 11px">{{$dateArray[$index]->header}}</th>
                @endforeach
                <td colspan="2"></td>
            </tr>
            <tr>
                <th colspan="8"></th>
                @foreach([0,1,2,3] as $index)
                <th>{{$dateArray[$index]->Qn}}</th>
                @endforeach
                <th colspan="2"></th>

            </tr>
            <tr class="table-info">
                <th colspan="2">Cost Item</th>
                <th colspan="5">Description</th>
                <th>Total Budget</th>
                @foreach([0,1,2,3] as $index)
                <th>{{$dateArray[$index]->isCurrent}}</th>
                @endforeach
                <th>PROJECT TOTAL</th>
                <th>VARIANCE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($table as $key=>$row)
            <tr>
                <td colspan="2">{{$makers[$key] }}</td>
                <td colspan="5" width="20%">{{$row->description}}</td>
                <td>£{{ $row->y1_budget}}</td>
                <td>£{{$row->q1}}</td>
                <td>£{{$row->q2}}</td>
                <td>£{{$row->q3}}</td>
                <td>£{{$row->q4}}</td>
                <td>£{{$row->YEAR_1}}</td>
                <td>£{{$row->VARIANCE_1}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (for each claim)</td>
                @foreach([15,1,2,3,4,16,17] as $index)
                <td data-name="price" contentEditable="false" class="edit">{{$colSum[$index]}}</td>
                @endforeach
            </tr>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (cumulative)</td>
                <td></td>
                @foreach([1,2,3,4] as $index)
                <td data-name="price" contentEditable="false" class="edit">{{$col2Sum[$index]}}</td>
                @endforeach
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
                @foreach([4,5,6,7] as $index)
                <th style="font-size: 11px">{{$dateArray[$index]->header}}</th>
                @endforeach
                <th colspan="2"></th>
            </tr>
            <tr>
                <th colspan="8"></th>
                @foreach([4,5,6,7] as $index)
                <th>{{$dateArray[$index]->Qn}}</th>
                @endforeach
                <th></th>
                <th></th>
            </tr>
            <tr class="table-info">
                <th colspan="2">Cost Item</th>
                <th colspan="5">Description</th>
                <th>Total Budget</th>
                @foreach([4,5,6,7] as $index)
                <th>{{$dateArray[$index]->isCurrent}}</th>
                @endforeach
                <th>PROJECT</th>
                <th>VARIANCE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($table as $key=>$row)
            <tr>
                <td colspan="2">{{$makers[$key] }}</td>
                <td colspan="5">{{$row->description}}</td>
                <td>£{{ $row->y2_budget}}</td>
                <td>£{{$row->q5}}</td>
                <td>£{{$row->q6}}</td>
                <td>£{{$row->q7}}</td>
                <td>£{{$row->q8}}</td>
                <td>£{{$row->YEAR_2}}</td>
                <td>£{{$row->VARIANCE_2}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (cumulative)</td>
                @foreach([18,5,6,7,8,19,20] as $index)
                <td data-name="price" contentEditable="false" class="edit">{{$colSum[$index]}}</td>
                @endforeach
            </tr>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (cumulative)</td>
                <td></td>
                @foreach([5,6,7,8] as $index)
                <td data-name="price" contentEditable="false" class="edit">{{$col2Sum[$index]}}</td>
                @endforeach
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
                @foreach([8,9,10,11] as $index)
                <th style="font-size: 11px">{{$dateArray[$index]->header}}</th>
                @endforeach
                <th colspan="2"></th>
            </tr>
            <tr>
                <th colspan="8"></th>
                @foreach([8,9,10,11] as $index)
                <th>{{$dateArray[$index]->Qn}}</th>
                @endforeach
            </tr>
            <tr class="table-info">
                <th colspan="2">Cost Item</th>
                <th colspan="5">Description</th>
                <th>Total Budget</th>
                @foreach([8,9,10,11] as $index)
                <th>{{$dateArray[$index]->isCurrent}}</th>
                @endforeach
                <th>PROJECT</th>
                <th>VARIANCE</th>
            </tr>
        </thead>
        <tbody>
            @foreach($table as $key=>$row)
            <tr>
                <td colspan="2">{{$makers[$key] }}</td>
                <td colspan="5">{{$row->description}}</td>
                <td>£{{ $row->y3_budget}}</td>
                <td>£{{$row->q9}}</td>
                <td>£{{$row->q10}}</td>
                <td>£{{$row->q11}}</td>
                <td>£{{$row->q12}}</td>
                <td>£{{$row->YEAR_3}}</td>
                <td>£{{$row->VARIANCE_3}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (for each claim)</td>
                @foreach([21,9,10,11,12,22,23] as $index)
                <td data-name="price" contentEditable="false" class="edit">{{$colSum[$index]}}</td>
                @endforeach
            </tr>
            <tr class="table-info">
                <td colspan="2"></td>
                <td colspan="5">Total Cost (cumulative)</td>
                <td></td>
                @foreach([9,10,11,12] as $index)
                <td data-name="price" contentEditable="false" class="edit">{{$col2Sum[12]}}</td>
                @endforeach
                <td colspan="2"></td>

            </tr>
        </tfoot>
    </table>
</div>
<script>

</script>
