<?php $__env->startSection('content'); ?>
<style>
    body{
        font-size:14px;
    }
    input.form-control {
        height: 30px;
    }

    .table td, .table th {
        max-width: 100%;
        white-space: nowrap;
    }
    .table td.yellow, .table th.yellow {
        background-color:lemonchiffon !important;

    }
    .table td.green, .table th.green {
        background-color:#98FB98 !important;

    }
    .table td.blue, .table th.blue {
        background-color:paleturquoise !important;

    }
    .table .br {
        border-right:2px solid #dee2e6;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-20">Department Accounts</h3>
        </div>

        <div class="col-md-12">

            <div class="row p-3">
                <div class="col-md-2 mr-2">
                    <table class="table">
                    <tr>
                        <td>ACCOUNTS YEAR 1</td>
                        <td><input name="year_1" type="checkbox"></td>
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
                        <td><input name="total" type="checkbox"></td>
                       
                    </tr>
                    <tr>
                        <td>CLAIM FORMAT</td>
                        <td><input name="claim" checked type="checkbox"></td>
                        
                    </tr>        
                </table>
                </div>

                <div class="col-md-2 ml-5">
                    <table class="table">
                    <tr >
                        <td>MONTHLY</td>
                        <td><input name="monthly" type="checkbox"></td>
                    </tr>
                    <tr>  
                        <td>QUARTERLY</td>
                        <td><input name="quarterly" type="checkbox"></td>
                    </tr>
                    <tr>

                        <td>COMMITTED</td>
                        <td><input name="committed" type="checkbox"></td>
                    </tr>
                    <tr>

                        <td>BUDGET DATA</td>
                        <td><input name="budget" checked type="checkbox"></td>
                    </tr>
                    <tr>

                        <td>% TRACKER</td>
                        <td><input name="tracker" checked type="checkbox"></td>
                    </tr>        
                </table>
                </div>
                
            </div>

        

        </div>



        <div class="col-md-8"></div>



        <div class="col-md-12 m-t-20 table-here">




        </div>


    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>

        $('input[type=checkbox]').click(function(){

            if($(this).attr('name')=="year_1"){
                $('input[name=year_2]').prop('checked',false);
                $('input[name=year_3]').prop('checked',false);
            }
            if($(this).attr('name')=="year_2"){
                $('input[name=year_1]').prop('checked',false);
                $('input[name=year_3]').prop('checked',false);
            }
            if($(this).attr('name')=="year_3"){
                $('input[name=year_1').prop('checked',false);
                $('input[name=year_2]').prop('checked',false);
            }

            if($(this).attr('name')=="total"){
                $('input[name=claim]').prop('checked',false);
            }

            if($(this).attr('name')=="claim"){
                $('input[name=total]').prop('checked',false);
            }

            var filters = [];
            $('input[type=checkbox]:checked').each(function(){
                filters.push($(this).attr('name'));
            });

            $.get("",'filters='+JSON.stringify(filters),function(response){
                $('.table-here').html(response)
                totals();
            });

        });
        function totals(){
            $('td[data-total]').each(function(){
                var num = $(this).attr('data-total');
                var total = 0;
                $('td[data-num='+num+']').each(function(){
                    var val = isNaN(parseFloat($(this).html())) ? 0 : parseFloat($(this).html());
                    total+= val;
                    total = isNaN(total) ? 0 : total;
                });
                $(this).html(total.toFixed(2));
            });

            $('td[data-committed]').each(function(){
                var num = $(this).attr('data-committed');
                var total = 0;
                $('td[data-num-committed='+num+']').each(function(){
                    var val = isNaN(parseFloat($(this).html())) ? 0 : parseFloat($(this).html());
                    total+= val;
                    total = isNaN(total) ? 0 : total;
                });
                $(this).html(total.toFixed(2));
            });

            $('td[data-total-all]').each(function(){
                var num = $(this).attr('data-total-all');
                var total = 0;
                var val = parseFloat($('td[data-committed='+num+']').html());
                total += isNaN(val) ? 0 : val;
                val = parseFloat($('td[data-total='+num+']').html());
                total += isNaN(val) ? 0 : val;
                $(this).html(total.toFixed(2));
            });




            $('td[data-row-incurred]').each(function(){
                var total = 0;
                $(this).closest('tr').find('td[data-num]').each(function(){
                    var val = isNaN(parseFloat($(this).html())) ? 0 : parseFloat($(this).html());
                    total+= val;
                    total = isNaN(total) ? 0 : total;
                });
                $(this).html(total.toFixed(2));
            });

            $('td[data-row-committed]').each(function(){
                var total = 0;
                $(this).closest('tr').find('td[data-num-committed]').each(function(){
                    var val = isNaN(parseFloat($(this).html())) ? 0 : parseFloat($(this).html());
                    total+= val;
                    total = isNaN(total) ? 0 : total;
                });
                $(this).html(total.toFixed(2));
            });

            $('td[data-row-total]').each(function(){

                var val = parseFloat($(this).closest('tr').find('td[data-row-committed]').html());
                var total = isNaN(val) ? 0 : val;
                val = parseFloat($(this).closest('tr').find('td[data-row-incurred]').html());
                total += isNaN(val) ? 0 : val;
                $(this).html(total.toFixed(2));
            });


            $('td[data-total-qtr]').each(function(){

                var tot = 0;
                var num = $(this).attr('data-total-qtr');

                $('td[data-num-qtr='+num+']').each(function(){
                        var val = parseFloat($(this).html());
                        val = isNaN(val) ? 0.00 : val;
                        tot+=val;
                });

                $(this).html(tot.toFixed(2));
            });

            $('td[data-committed-qtr-all]').each(function(){

                var tot = 0;
                var num = $(this).attr('data-committed-qtr-all');
                $('td[data-num-committed-qtr='+num+']').each(function(){
                        var val = parseFloat($(this).html());
                        val = isNaN(val) ? 0.00 : val;
                        tot+=val;
                });

                $(this).html(tot.toFixed(2));
            });


            $('td[data-total-all-qtr]').each(function(){

                var tot = 0;
                var num = $(this).attr('data-total-all-qtr');
                $('td[data-num-committed-qtr='+num+']').each(function(){
                        var val = parseFloat($(this).html());
                        val = isNaN(val) ? 0.00 : val;
                        tot+=val;
                });

                $('td[data-num-qtr='+num+']').each(function(){
                        var val = parseFloat($(this).html());
                        val = isNaN(val) ? 0.00 : val;
                        tot+=val;
                });

                $(this).html(tot.toFixed(2));
            });


            $('td[data-difference]').each(function(){


                var index = $(this).index()-1;
                var val = parseFloat($('.budget').find('td').eq(index).html());
                val = isNaN(val) ? 0 : val;

                var incurred = parseFloat($('.incurred').find('td').eq(index).html());
                incurred = isNaN(incurred) ? 0 : incurred;

                var percent = incurred/val *100;
                percent = isNaN(percent) ? 0 : percent;

                $('td[data-difference-percent]').eq(index).html(percent.toFixed(0)+'%');

                var total = val-incurred;

                $(this).html(total.toFixed(2));


            });



        }

        $(function(){
            $('input[type=checkbox]')[0].click();
        })

        function budgetChange(td){
            var val = $(td).html();
            $(td).attr('onclick','return false;')
            $(td).html('<input id="active-input" class="form-control" value="'+val+'" onblur="budgetBlur(this);" />');
            $('#active-input').focus();
        }
        function budgetBlur(input){
            var val = $(input).val();

            var td = $(input).closest('td');
            var index = td.index();
            var month = $('.dates').find('th').eq(index).attr('data-row-date');
            $.post('/save-month-budget','_token=<?php echo e(@csrf_token()); ?>&month='+month+'&val='+val,function(){
                totals();
            });
            $(input).remove();
            td.html(val);
            td.attr('onclick','budgetChange(this);')
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>