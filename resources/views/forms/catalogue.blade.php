@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-20">Catalogue</h3>
                <div class="table-responsive table-responsive-data2 m-b-20">
                    <table class="table table-data2 orders-table">
                        <thead>
                            <tr>
                                <th>Cat/Item No</th>
                                <th>Supplier</th>
                                <th>Item Description</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Price (Inc. VAT)</th>
                                <th class="text-center">Currency</th>
                                <th class="text-center">Total</th>
                                <th>Notes</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="9"><button onclick="addRow();" class="btn btn-primary btn-round"><i class="fa fa-plus"></i></button></td>
                            </tr>
                            
                        </tfoot>
                    </table>
                    <div class="d-flex justify-content-end mt-3"  style="margin-right: 70px;">
                        <button onclick="submitOrder();" class="btn btn-primary d-none submit">Submit Order</button>
                    </div>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
    <script>
        function addRow(){

            $('.orders-table tbody').append(
            '<tr>'+
                '<td width="10%"><input class="form-control" /></td>'+
                '<td width="10%"><input class="form-control" /></td>'+
                '<td width="30%"><input class="form-control" /></td>'+
                '<td width="5%"><input onkeyup="qty(this);" value="1" class="form-control" /></td>'+
                '<td width="8%"><input onkeyup="totals(this);" class="form-control" /></td>'+
                '<td width="8%"><select class="form-control" style="height: 30px;"><option value="GBP">GBP</option><option value="EUR">EUR</option><option value="USD">USD</option></select></td>'+
                '<td width="6%" class="text-center total">0.00</td>'+
                '<td><input class="form-control" /></td>'+
                '<td class="text-right">'+
                    '<button onclick="removeRow(this);" class="btn btn-danger btn-round btn-sm"><i class="fa fa-times"></i></button>'+
                '</td>'+
            '</tr>'
            );
            $('.submit').removeClass('d-none').addClass('d-block');
        }

        function removeRow(item){

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Remove'
                }).then((result) => {
                if (result.value) {
                    $(item).closest('tr').remove();
                    if($('.orders-table tbody tr').length == 0){
                        $('.submit').removeClass('d-block').addClass('d-none');
                    }
                }
            })

        }

        function submitOrder(){
            var items = [];
            $('.orders-table tbody tr').each(function(){
                var item = {
                    'item_no' : $(this).find('td').eq(0).find('input').val(),
                    'supplier': $(this).find('td').eq(1).find('input').val(),
                    'description': $(this).find('td').eq(2).find('input').val(),
                    'qty': $(this).find('td').eq(3).find('input').val(),
                    'price': $(this).find('td').eq(4).find('input').val(),
                    'currency': $(this).find('td').eq(5).find('select').val(),
                    'total': $(this).find('td').eq(6).html(),
                    'note': $(this).find('td').eq(7).find('input').val(),
                };
                items.push(item);
            });
            Swal.showLoading();

            $.post("{{ route('catalogue.store') }}",'_token={{ csrf_token() }}&items='+JSON.stringify(items),function(response){
                Swal.close();
                if(response.success){
                    Swal.fire(
                        'Success',
                        'Order has been placed',
                        'success'
                    ).then((result) => {
                        window.location = '/home';
                    });
                }
            }).fail(function(xhr,status,error){
                Swal.close();
            });

        }

        function qty(item){
            var qty = parseFloat($(item).val());
            var val = parseFloat($(item).closest('tr').find('td').eq(4).find('input').val());
            var total = val*qty;
            $(item).closest('tr').find('.total').html(total.toFixed(2));
        }

        function totals(item){
            var val = parseFloat($(item).val());
            var qty = parseFloat($(item).closest('tr').find('td').eq(3).find('input').val());
            var total = val*qty;
            $(item).closest('tr').find('.total').html(total.toFixed(2));
        }

        $(function(){
            addRow();
        })

    </script>
@endsection
