<template>
    <div>
        <div class="row p-3">
            <div class="col-md-2 mr-2">
                <table class="table">
                    <tr>
                        <td>ACCOUNTS YEAR 1</td>
                        <td><input name="year_1"  type="checkbox"></td>
                    </tr>
                    <tr>  
                        <td>ACCOUNTS YEAR 2</td>
                        <td><input name="year_2" type="checkbox"></td>
                    </tr>
                    <tr>
                        <td>ACCOUNTS YEAR 3</td>
                        <td><input name="year_3" type="checkbox"></td>
                    
                    </tr>
                    <tr>
                        <td>TOTAL FORMAT</td>
                        <td><input name="total"  type="checkbox"></td>
                    
                    </tr>
                    <tr>
                        <td>CLAIM FORMAT</td>
                        <td><input name="claim" type="checkbox"></td>
                        
                    </tr>        
                </table>
            </div>

            <div class="col-md-2 ml-5">
                <table class="table">
                    <tr >
                        <td>MONTHLY</td>
                        <td><input name="monthly"  type="checkbox"></td>
                    </tr>
                    <tr>  
                        <td>QUARTERLY</td>
                        <td><input name="quarterly" type="checkbox"></td>
                    </tr>
                    <tr>

                        <td>COMMITTED</td>
                        <td><input name="committed" checked type="checkbox"></td>
                    </tr>
                    <tr>

                        <td>BUDGET DATA</td>
                        <td><input name="budget" type="checkbox"></td>
                    </tr>
                    <tr>

                        <td>% TRACKER</td>
                        <td><input name="tracker" type="checkbox"></td>
                    </tr>        
                </table>
            </div>
        </div>  

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th colspan="{{ display=='month_qtr' ? 4 : (display=='quarterly' ? 1 : 3) }}" class="text-center br">Quarter 1</th>
                        <th colspan="{{ display=='month_qtr' ? 4 : (display=='quarterly' ? 1 : 3) }}" class="text-center br">Quarter 2</th>
                        <th colspan="{{ display=='month_qtr' ? 4 : (display=='quarterly' ? 1 : 3) }}" class="text-center br">Quarter 3</th>
                        <th colspan="{{ display=='month_qtr' ? 4 : (display=='quarterly' ? 1 : 3) }}" class="text-center br">Quarter 4</th>
                        <th colspan="3" class="text-center">Year Total</th>
                    </tr>
                    <tr class="dates">
                        <th></th>
                        <!-- <?php $s = $carbon::parse($start); $i = 1;?> -->
                        <!-- @while($s->format('M-y')!=$end->format('M-y')) -->
                            <!-- <th data-row-date="{{ carbon->format('M-y') }}" class="blue {{ display=='quarterly' ? 'd-none' : '' }}"> {{ carbon->format('M-y') }}</th> -->
                            <!-- @if($i++%3==0 && (display=="month_qtr" || display=="quarterly"))
                                <th class="blue">Total</th>
                            @endif -->
                            <!-- <?php $s->addMonth();?> -->
                        <!-- @endwhile -->

                        <!-- <th class="blue">Incurred</th>


                        @if(in_array('committed',$filters))
                            <th class="blue">Commited</th>
                        @endif

                        <th class="blue">Total</th> -->
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
        <!-- end main table -->
    </div>
</template>

<script>
    export default {
        props: ['display', 'carbon'],
    }
</script>
