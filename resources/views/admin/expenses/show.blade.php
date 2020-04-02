@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="">
            <button onclick="javascript:history.back()" class="btn btn-primary btn-sm m-b-10"><i class="fa fa-chevron-left"></i> back</button>
                <h3 class="title-5 m-b-20"> Expenses</h3>

            <div class="row m-b-60">
                    <div class="col-md-5">
                        <small>
                            <table class="table table-bordered table-small">
                                <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if(!$order->completed_at)
                                            <span class="badge badge-warning">Pending</span>
                                        @else
                                            <span class="badge badge-success">Complete</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr><td width="30%">Requisitioner</td><td>{{ $order->requisitioner->name }}</td></tr>
                                @if($order->admin)<tr><td>Admin</td><td>{{ $order->admin->name }}</td></tr>@endif
                                <tr><td>Order Request Date</td><td>{{ $order->created_at->format('d/m/y') }}</td></tr>
                                <tr><td>Department</td><td>{{ $order->requisitioner->department->name ?? '-' }}</td></tr>
                                <tr><td>Dept Cost Centre</td><td>{{ $order->requisitioner->department->cost_centre ?? '-' }}</td></tr>
                                <tr><td>Old Project Code</td><td>{{ $order->requisitioner->department->old_project_code ?? '-' }}</td></tr>
                                <tr><td>Delivery Location</td><td>{{ $order->requisitioner->department->delivery_location ?? '-' }}</td></tr>
                                <tr><td>Notes</td><td>{{ $order->notes()->count() }} <button onclick="notes({{ $order->id }});" class="btn btn-primary btn-sm pull-right">View</button></td></tr>
                                </tbody>
                            </table>
                        </small>
                    </div>
                </div>


                <form class="form">
                    <div class="col-md-10">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Travel UK</label>
                            </div>
                            <div class="col-md-8">
                                <input onkeyup="totals();" value="{{ $order->travel_uk }}" name="travel_uk" class="form-control val" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Subsistence UK</label>
                            </div>
                            <div class="col-md-8">
                                <input onkeyup="totals();"  value="{{ $order->subsistence_uk }}" name="subsistence_uk" class="form-control val" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Travel Overseas</label>
                            </div>
                            <div class="col-md-8">
                                <input onkeyup="totals();"  value="{{ $order->travel_overseas }}" name="travel_overseas" class="form-control val" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Subsistence Overseas</label>
                            </div>
                            <div class="col-md-8">
                                <input onkeyup="totals();"  value="{{ $order->subsistence_overseas }}" name="subsistence_overseas" class="form-control val" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Total</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->total }}" name="total" class="form-control total" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Start Date</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->start_date_raw }}" name="start_date" type="date" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">General Description</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->description }}" name="description" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <hr>
                        @if(!$order->completed_at)
                            <button type="button" onclick="submitOrder();" class="btn btn-primary">Confirm Expenses</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
    <script>
         @if($order->completed_at)
            $('input').attr('disabled','disabled');
         @endif
        $('.form input').change(function(){

            var data = {};
            $('.form input').each(function(){
                data[$(this).attr('name')] = $(this).val() == "on" ? 1 : $(this).val() ;
            });

            $.post("/expenses/{{ $order->order_id }}",data,function(response){ });

        });

        function submitOrder(){
            var data = $('.form').serialize();

            Swal.showLoading();

            $.get("/expenses/{{ $order->order_id }}/complete",data,function(response){
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

        function notes(item){
            $.get('/expenses/{{ $order->order_id }}/'+item+'/notes',function(response){

                var notes = "";
                $.each(response,function(){
                    notes += '<tr id="'+this.id+'"><td>'+(this.user.id=="{{ $order->user_id }}" ? 'Requisitioner' : 'Admin')+'</td><td>'+this.user.name+'</td><td>'+this.note+'</td><td class="text-right">'+this.created_at+'</td></tr>';
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

            $.post('/expenses/{{ $order->order_id }}/'+item+'/notes','_token={{ csrf_token() }}&note='+encodeURIComponent(note),function(response){
                var tr = '<tr id="'+response.id+'"><td>{{ auth()->user()->is_admin ? "Admin" : "Requisitioner" }}</td><td>{{ auth()->user()->name }}</td><td>'+response.note+'</td><td class="text-right">'+response.created_at+'</td></tr>';
                $('.notes-table tbody').prepend(tr);
                $('.new-note').val('');
            });

        }

        function totals() {
            var total = 0;

            $('.val').each(function(){
                if($(this).val()){
                    total+=parseFloat($(this).val());
                }
            });

            $('.total').val(total.toFixed(2));
        }
    </script>
@endsection
