@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="">
            <button onclick="javascript:history.back()" class="btn btn-primary btn-sm m-b-10"><i class="fa fa-chevron-left"></i> back</button>
                <h3 class="title-5 m-b-20"> Training</h3>

            <div class="row m-b-60">
                    <div class="col-md-4">
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
                                <tr><td>Order Request Date</td><td>{{ $order->created_at->format('d/m/y') }}</td></tr>
                                <tr><td>Order Submit Date</td><td>{{ $order->created_at->format('d/m/y') }}</td></tr>
                                @if($order->admin)<tr><td>Admin</td><td>{{ $order->admin->name }}</td></tr>@endif
                                <tr><td>Dept Cost Centre</td><td>{{ $order->requisitioner->department->cost_centre }}</td></tr>
                                <tr><td>Old Project Code</td><td>{{ $order->requisitioner->department->old_project_code }}</td></tr>
                                <tr><td>Notes</td><td>{{ $order->notes()->count() }} <button onclick="notes({{ $order->id }});" class="btn btn-primary btn-sm pull-right">View</button></td></tr>
                                </tbody>
                            </table>
                        </small>
                    </div>
                </div>

                <form method="post" action="{{ route('training.store') }}" class="form" enctype="multipart/form-data">
                    <div class="col-md-10">
                        @csrf

                        <div class="checkbox row">
                            <div class="col-md-3">
                                <label>New Supplier</label>
                            </div>
                            <div class="col-md-8">
                                <input {{ $order->new_supplier ? 'checked' : '' }} name="new_supplier" onchange="toggleSupplierInfo($(this).prop('checked'));" type="checkbox" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Supplier Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->supplier_name }}" name="supplier_name" class="form-control" />
                            </div>
                        </div>

                        <div class="supplier_info">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="control-label">Contact Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ $order->contact_name }}" name="contact_name" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="control-label">Supplier Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ $order->supplier_email }}" name="supplier_email" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="control-label">Supplier Tel</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ $order->supplier_tel }}" name="supplier_tel" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="checkbox row">
                            <div class="col-md-3">
                                <label>National</label>
                            </div>
                            <div class="col-md-8">
                                <input {{ $order->national ? 'checked' : '' }} name="national" type="checkbox" />
                            </div>
                        </div>


                        <div class="checkbox row">
                            <div class="col-md-3">
                                <label>International</label>
                            </div>
                            <div class="col-md-8">
                                <input {{ $order->international ? 'checked' : '' }} name="international" type="checkbox" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Training Start Date</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->start_date }}" name="start_date" type="date" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Training End Date</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->end_date }}" name="end_date" type="date" class="form-control" />
                            </div>
                        </div>




                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Training / Site URL</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->url }}" name="url" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Training Description</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->description }}" name="description" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Reason for Training</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->reason }}" name="reason" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Value</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->value }}"name="value" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Currency</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $order->currency }}" disabled name="value" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Quotes</label>
                            </div>
                            <div class="col-md-8">

                                @foreach($files['quotes'] as $file)
                                <button type="button" onclick="window.open('/training/{{ $order->order_id }}/file/{{ $file }}')" class="btn btn-link"><i class="fa fa-file-pdf-o"></i> {{ $file }}</button><br>
                                @endforeach

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Additional Files</label>
                            </div>
                            <div class="col-md-8">
                                @foreach($files['additional'] as $file)
                                <button type="button" onclick="window.open('/training/{{ $order->order_id }}/file/{{ $file }}')" class="btn btn-link"><i class="fa fa-file-pdf-o"></i> {{ $file }}</button><br>
                                @endforeach
                                <!-- <input name="additional[]" multiple type="file" /><br> -->
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 text-right">
                        <hr>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
    <script>
        @if(isset($history))
            $('input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
        @endif

        @if(!$order->new_supplier)
            $('.supplier_info').hide();
        @endif

        function toggleSupplierInfo(value){
            if(value){
                $('.supplier_info').show();
            }
            else{
                $('.supplier_info').hide();
            }
        }

        $('.form input').change(function(){

            var data = {};
            data['_token'] = '{{ @csrf_token() }}';

            var val = $(this).val();

            if($(this).attr('type')=="checkbox"){
                val = $(this).prop('checked') ? 1 :0;
            }
            data[$(this).attr('name')] = val;

            $.post("/training/{{ $order->order_id }}",data,function(response){ });

        });

        function submitOrder(){

            Swal.showLoading();

            $.get("/training/{{ $order->order_id }}/processing",function(response){
                Swal.close();
                if(response.success){
                    Swal.fire(
                        'Success',
                        'Order moved to processing',
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
            $.get('/training/{{ $order->order_id }}/'+item+'/notes',function(response){

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

            $.post('/training/{{ $order->order_id }}/'+item+'/notes','_token={{ csrf_token() }}&note='+encodeURIComponent(note),function(response){
                var tr = '<tr id="'+response.id+'"><td>{{ auth()->user()->is_admin ? "Admin" : "Requisitioner" }}</td><td>{{ auth()->user()->name }}</td><td>'+response.note+'</td><td class="text-right">'+response.created_at+'</td></tr>';
                $('.notes-table tbody').prepend(tr);
                $('.new-note').val('');
            });

        }

    </script>
@endsection
