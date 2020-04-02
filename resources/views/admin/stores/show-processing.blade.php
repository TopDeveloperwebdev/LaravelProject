@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="">
                <!-- DATA TABLE -->
                <button onclick="javascript:history.back()" class="btn btn-primary btn-sm m-b-10"><i class="fa fa-chevron-left"></i> back</button>
                <h3 class="title-5 m-b-20"> Stores</h3>
                <div class="table-responsive table-responsive-data2 m-b-20">

                <div class="row m-b-60">
                    <div class="col-md-5">
                        <small>
                            <table class="table table-bordered table-small">
                                <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if(!$order->first()->first()->placed_at)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($order->first()->first()->placed_at && !$order->first()->first()->completed_at)
                                            <span class="badge badge-primary">Processing</span>
                                        @else
                                            <span class="badge badge-success">Complete</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr><td width="30%">Requisitioner</td><td>{{ $order->first()->first()->requisitioner->name }}</td></tr>
                                @if($order->first()->first()->admin)<tr><td>Admin</td><td>{{ $order->first()->first()->admin->name }}</td></tr>@endif
                                <tr><td>Order Request Date</td><td>{{ $order->first()->first()->created_at->format('d/m/y') }}</td></tr>
                                <tr><td>Department</td><td>{{ $order->first()->first()->requisitioner->department->name ?? '-' }}</td></tr>
                                <tr><td>Dept Cost Centre</td><td>{{ $order->first()->first()->requisitioner->department->cost_centre ?? '-' }}</td></tr>
                                <tr><td>Old Project Code</td><td>{{ $order->first()->first()->requisitioner->department->old_project_code ?? '-' }}</td></tr>
                                <tr><td>Delivery Location</td><td>{{ $order->first()->first()->requisitioner->department->delivery_location ?? '-' }}</td></tr>
                                </tbody>
                            </table>
                        </small>
                    </div>
                </div>

                <br><br>
                    <table class="table table-data2 orders-table">
                        <thead>
                            <tr>
                                <th>Item Type</th>
                                <th>Item Description</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                                @if($order->first()->first()->placed_at)
                                    <th>Qty Recevied</th>
                                @endif
                                <th>Notes</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $items)
                            @foreach($items as $item)
                                <tr id="{{ $item->id }}">
                                    <td width="20%">
                                        <select class="form-control">
                                            <option {{ $item->item_type=="general" ? 'selected' : '' }} value="general">General Consumable</option>
                                            <option {{ $item->item_type=="lab" ? 'selected' : '' }} value="lab">Lab Consumable</option>
                                        </select>
                                    </td>
                                    <td width="20%"><input value="{{ $item->description }}" class="form-control" /></td>
                                    <td width="20%"><input value="{{ $item->qty }}" class="form-control" /></td>
                                    <td><input onchange="total(this)" value="{{ $item->price }}" class="form-control" /></td>
                                    <td><input value="{{ $item->total }}" class="form-control" /></td>
                                    @if($order->first()->first()->placed_at)
                                    <td><input onchange="total(this);" value="{{ $item->qty_received }}" class="form-control" /></td>
                                    @endif
                                    <td onclick="notes({{ $item->id }});"> {{ $item->notes->count() }}</td>
                                    <td class="text-right">
                                    <button onclick="window.open('/stores/{{ $order->first()->first()->order_id }}/slip')" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                        <tfoot>
                            @if(!$order->first()->first()->completed_at)
                            <tr>
                                <td colspan="9" class=""><button onclick="submitOrder();" class="float-right btn btn-primary submit">Close Requisition</button></td>
                            </tr>
                            @endif
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

        @if($order->first()->first()->completed_at)
            $(function(){
                $('input').each(function(){
                    $(this).attr('disabled', 'disabled');
                });
                $('select').each(function(){
                    $(this).attr('disabled', 'disabled');
                });
            });
        @endif

        $('input').change(function(){
            var data={};
            var id
            $(this).closest('tr').each(function(){
                 data = {
                    '_token': '{{ csrf_token() }}',
                    'item_type' : $(this).find('td').eq(0).find('select').val(),
                    'description': $(this).find('td').eq(1).find('input').val(),
                    'qty': $(this).find('td').eq(2).find('input').val() @if($order->first()->first()->placed_at) ,
                    'qty_received': $(this).find('td').eq(5).find('input').val(),
                    'price': $(this).find('td').eq(3).find('input').val(),
                    'total': $(this).find('td').eq(4).find('input').val()
                    @endif
                };
                id = $(this).attr('id')

            });

            $.post("/stores/{{ $order->first()->first()->order_id }}/"+id,data,function(response){

            });

        });

        function addRow(){

            $('.orders-table tbody').append(
            '<tr>'+
                '<td width="25%"><select class="form-control"><option value="general">General Consumable</option><option value="lab">Lab Consumable</option></select></td>'+
                '<td width="25%"><input class="form-control" /></td>'+
                '<td width="25%"><input class="form-control" /></td>'+
                '<td><input class="form-control" /></td>'+
                '<td class="text-right">'+
                    '<button onclick="removeRow(this);" class="btn btn-danger btn-round btn-sm"><i class="fa fa-times"></i></button>'+
                '</td>'+
            '</tr>'
            );
            $('.submit').removeClass('d-none').addClass('d-block');
        }

        function removeRow(item){
            @if($order->first()->first()->completed_at)
                return;
            @endif
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

            Swal.showLoading();

            $.get("/stores/{{ $order->first()->first()->order_id }}/complete",function(response){
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

        function notes(item){
            $.get('/stores/{{ $order->first()->first()->order_id }}/'+item+'/notes',function(response){

                var notes = "";
                $.each(response,function(){
                    notes += '<tr id="'+this.id+'"><td>'+this.user.name+'</td><td>'+(this.user.id=="{{ $order->first()->first()->user_id }}" ? 'Requisitioner' : 'Admin')+'</td><td>'+this.note+'</td><td class="text-right">'+moment(this.created_at).format('DD/MM/YYYY - hh:mm a')+'</td></tr>';
                })

               var dialog = bootbox.dialog({
                    size: 'large',
                    message: '<div class="col-md-12 text-left"><small>New Note</small><textarea class="form-control new-note"></textarea><br><button onclick="saveNote('+item+');" class="btn btn-primary btn-sm float-right">Save</button><br><div style="max-height:400px; overflow:scroll;"><table class="table notes-table"><thead><tr><th>Type</th><th>User</th><th>Note</th><th class="text-right">Date</th></tr></thead><tbody>'+notes+'</tbody></table></div></div>',
                    buttons: {
                        close: {
                            className: 'btn-primary',
                            callback: function(){

                            }
                        }
                    }
               });
            });
        }

        function saveNote(item){

            var note = $('.new-note').val();

            $.post('/stores/{{ $order->first()->first()->order_id }}/'+item+'/notes','_token={{ csrf_token() }}&note='+encodeURIComponent(note),function(response){
                var tr = '<tr id="'+response.id+'"><td>{{ auth()->user()->is_admin ? "Admin" : "Requisitioner" }}</td><td>{{ auth()->user()->name }}</td><td>'+response.note+'</td><td class="text-right">'+response.created_at+'</td></tr>';
                $('.notes-table tbody').prepend(tr);
                $('.new-note').val('');
            });

        }

        function total(input){
            var qty = parseInt($(input).closest('tr').find('td').eq(5).find('input').val());
            var price = parseFloat($(input).closest('tr').find('td').eq(3).find('input').val());
            var total = qty * price;
            $(input).closest('tr').find('td').eq(4).find('input').val(total.toFixed(2));
        }
    </script>
@endsection
