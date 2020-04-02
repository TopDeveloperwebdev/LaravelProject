@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="user-data p-3">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-20">Hotel</h3>
                <div class="table-responsive table-responsive-data2 m-b-20">
                    <table class="table table-data2 orders-table">
                        <thead>
                            <tr>
                                <th>Location*</th>
                                <th>Check in Date*</th>
                                <th>Check out Date*</th>
                                <th>No. of Occupants*</th>
                                <th>Traveller Name*</th>
                                <th>Notes</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <!-- <td colspan="9"><button onclick="addRow();" class="btn btn-primary btn-round"><i class="fa fa-plus"></i></button></td> -->
                            </tr>
                            <tr>
                                <td colspan="9" class=""><button onclick="submitOrder();" class="float-right btn btn-primary d-none submit">Submit Order</button></td>
                            </tr>
                        </tfoot>
                    </table>
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
                '<td ><input class="form-control" /></td>'+
                '<td ><input type="date" class="form-control" /></td>'+
                '<td ><input type="date" class="form-control" /></td>'+
                '<td ><input class="form-control" /></td>'+
                '<td ><input class="form-control" /></td>'+
                '<td><input class="form-control" /></td>'+
                '<td class="text-right">'+
                    '<button onclick="removeRow(this);" class="btn d-none btn-danger btn-round btn-sm"><i class="fa fa-times"></i></button>'+
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
            var ok = true;

            $('.orders-table tbody tr').each(function(){
                var item = {
                    'location' : $(this).find('td').eq(0).find('input').val(),
                    'checkin_date': $(this).find('td').eq(1).find('input').val(),
                    'checkout_date': $(this).find('td').eq(2).find('input').val(),
                    'persons': $(this).find('td').eq(3).find('input').val(),
                    'traveller_name': $(this).find('td').eq(4).find('input').val(),
                    'note': $(this).find('td').eq(5).find('input').val(),
                };

                if(!item['location'] || !item['checkin_date'] || !item['checkout_date'] || !item['persons']|| !item['traveller_name']){
                    ok = false;
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Please complete all required * fields!',
                    });
                    return;
                }

                items.push(item);
            });


            if(!ok){
                return;
            }

            Swal.showLoading();

            $.post("{{ route('key-travel.hotel.store') }}",'_token={{ csrf_token() }}&items='+JSON.stringify(items),function(response){
                Swal.close();
                if(response.success){
                    Swal.fire(
                        'Success',
                        'Order has been placed',
                        'success'
                    ).then((result) => {
                        window.location = '/';
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
