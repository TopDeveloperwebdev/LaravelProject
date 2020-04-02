@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="">
            <button onclick="javascript:history.back()" class="btn btn-primary btn-sm m-b-10"><i class="fa fa-chevron-left"></i> back</button>
                <h3 class="title-5 m-b-20"> Car Hire</h3>

            <div class="row m-b-60">
                    <div class="col-md-5">
                        <small>
                            <table class="table table-bordered table-small">
                                <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if(!$order->placed_at)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($order->placed_at && !$order->completed_at)
                                            <span class="badge badge-primary">Processing</span>
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
                    <div class="col-md-8">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->name }}" name="name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Email Address</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->email }}" name="email" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Department</label>
                            </div>
                            <div class="col-md-8">
                                <input disabled value="{{ $order->department }}" name="department" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Telephone</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->telephone }}" name="telephone" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Driver 1 Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->driver1_name }}" name="driver1_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Driver 2 Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->driver2_name }}" name="driver2_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Driver 3 Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->driver3_name }}" name="driver3_name" class="form-control" />
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
                                <label class="control-label">Finish Date</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->finish_date }}" name="finish_date" type="date" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Start Time</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->start_time }}" name="start_time" type="time" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Finish Time</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->finish_time }}" name="finish_time" type="time" class="form-control" />
                            </div>
                        </div>

                        <div class="checkbox row">
                            <div class="col-md-4">
                                <label>
                                Collect From Low Hills Car Park
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input {{ $order->collect ? ' checked ' : '' }} name="collect" type="checkbox" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Collect Other location</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->collect_other }}" name="collect_other" class="form-control" />
                            </div>
                        </div>

                        <div class="checkbox row">
                            <div class="col-md-4">
                                <label>
                                Return to Low Hills Car Park
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input {{ $order->return ? ' checked ' : '' }} name="return" type="checkbox" />
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Return Other location</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->return_other }}" name="return_other" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Special Requirement</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->special }}" name="special" class="form-control" />
                            </div>
                        </div>

                        <hr>

                        <div class="checkbox row">
                            <div class="col-md-4">
                                <label>Agree all drivers are 21 years of age or greater</label>
                            </div>
                            <div class="col-md-8">
                                <input {{ $order->min_21 ? ' checked ' : '' }} name="min_21" type="checkbox" />
                            </div>

                        </div>

                        <div class="checkbox row">
                            <div class="col-md-4">
                                <label>All Named drivers hold a Full UK License with less than 6 points</label>
                            </div>
                            <div class="col-md-8">
                                <input {{ $order->valid_license ? ' checked ' : '' }} name="valid_license" type="checkbox" />
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <div class="col-md-4">
                            <label class="control-label">Car Hire Value per Day</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->per_day }}" name="per_day" class="form-control price totals" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Number of Days Hired</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->days }}" name="days" class="form-control days totals" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Fees</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->fees }}" name="fees" class="form-control fees totals" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Other</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->other }}" name="other" class="form-control other totals" />
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

                    </div>
                    <div class="col-md-12 text-right">
                        <hr>
                        @if(!$order->completed_at)
                            <button type="button" onclick="submitOrder();" class="btn btn-primary">Order Complete</button>
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
        $('.totals').change(function(){
            var total = 0;

            total += parseFloat($('.price').val() || 0) * (parseInt($('.days').val() || 0) );
            total += parseFloat($('.other').val()) || 0;
            total += parseFloat($('.fees').val()) || 0;

            $('.total').val(total);
        });


        $('.form input').change(function(){

            var data = {};
            $('.form input').each(function(){
                data[$(this).attr('name')] = $(this).val() == "on" ? 1 : $(this).val() ;
            });

            $.post("/car-hire/{{ $order->order_id }}",data,function(response){ });

        });


        function submitOrder(){

            var data = $('.form').serialize();

            Swal.showLoading();

            $.get("/car-hire/{{ $order->order_id }}/complete",data,function(response){
                Swal.close();
                if(response.success){
                    Swal.fire(
                        'Success',
                        'Order status changed to processing',
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
            $.get('/car-hire/{{ $order->order_id }}/'+item+'/notes',function(response){

                var notes = "";
                $.each(response,function(){
                    notes += '<tr id="'+this.id+'"><td>'+(this.user.id=="{{ $order->user_id }}" ? 'Requisitioner' : 'Admin')+'</td><td>'+this.user.name+'</td><td>'+this.note+'</td><td class="text-right">'+moment(this.created_at).format('DD/MM/YYYY - hh:mm a')+'</td></tr>';
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

            $.post('/car-hire/{{ $order->order_id }}/'+item+'/notes','_token={{ csrf_token() }}&note='+encodeURIComponent(note),function(response){
                var tr = '<tr id="'+response.id+'"><td>{{ auth()->user()->is_admin ? "Admin" : "Requisitioner" }}</td><td>{{ auth()->user()->name }}</td><td>'+response.note+'</td><td class="text-right">'+response.created_at+'</td></tr>';
                $('.notes-table tbody').prepend(tr);
                $('.new-note').val('');
            });

        }

    </script>
@endsection
