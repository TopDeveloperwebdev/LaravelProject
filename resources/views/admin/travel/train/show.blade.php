@extends('layouts.app')

@section('content')
<style>
    .sm {
        width: auto;
        padding: 0;
    }
    .table {
        font-size: 12px;
    }
    .table thead tr th .au-checkbox .au-checkmark {
        top: -10px;
    }
</style>
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="">
                <!-- DATA TABLE -->
                <button onclick="javascript:history.back()" class="btn btn-primary btn-sm m-b-10"><i class="fa fa-chevron-left"></i> back</button>
                <h3 class="title-5 m-b-20"> Train</h3>
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

                <div class="col-md-8">
                @foreach($order->childRows as $item)

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">From Station*</label>
                        </div>
                        <div class="col-md-8">
                            <input name="from_station" value="{{ $item->from_station }}" class="form-control required" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">To Station*</label>
                        </div>
                        <div class="col-md-8">
                            <input name="to_station" value="{{ $item->to_station }}" class="form-control required" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Departure Date*</label>
                        </div>
                        <div class="col-md-8">
                            <input name="departure_date" value="{{ $item->departure_date }}" type="date" class="form-control required" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Departure Time*</label>
                        </div>
                        <div class="col-md-8">
                            <input name="departure_time" value="{{ $item->departure_time }}" type="time" class="form-control required" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Return Date</label>
                        </div>
                        <div class="col-md-8">
                            <input name="return_date" value="{{ $item->return_date }}" type="date"   class="form-control " />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Return Time</label>
                        </div>
                        <div class="col-md-8">
                            <input name="return_time" value="{{ $item->return_time }}" type="time" class="form-control " />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Open Return</label>
                        </div>
                        <div class="col-md-8">
                            <select name="open_return" class="form-control ">
                                <option  {{ !$item->open_return ? 'selected' : ''}} value="0">no</option>
                                <option {{ $item->open_return ? 'selected' : ''  }}  value="1">yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">London Travel Card (Zones 1-4)</label>
                        </div>
                        <div class="col-md-8">
                            <input {{ $item->ltc_14 ? 'checked' : ''  }} type="checkbox" name="ltc_14" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">London Travel Card (Zones 1-6)</label>
                        </div>
                        <div class="col-md-8">
                            <input {{ $item->ltc_16 ? 'checked' : ''  }} type="checkbox" name="ltc_16" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Key Travel ID</label>
                        </div>
                        <div class="col-md-8">
                            <input name="key_travel_id" value="{{ $item->key_travel_id }}" class="form-control " />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Value</label>
                        </div>
                        <div class="col-md-8">
                            <input name="value" value="{{ $item->value }}" class="form-control " />
                        </div>
                    </div>


                    <div class="col-md-12 text-right">
                        <hr>
                            <button type="button" onclick="complete();" class="btn btn-primary complete-btn">Approve Order</button>
                    </div>

                    @endforeach
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
    <script>
        $('.complete-btn').hide();
        $('input').change(function(){
            var data = { '_token': '{{ csrf_token() }}'};
            data[$(this).attr('name')]= $(this).attr('type')== 'checkbox' ? ($(this).prop('checked') ? 1 : 0) : $(this).val();

            $.post('/key-travel/{{ strtolower($order->type) }}/{{ $order->order_id }}/{{ $order->childRows[0]->id }}' ,data,function(response){ check(); });
        });
        $('select').change(function(){
            var data = { '_token': '{{ csrf_token() }}'};
            data[$(this).attr('name')]= $(this).val();

            $.post('/key-travel/{{ strtolower($order->type) }}/{{ $order->order_id }}/{{ $order->childRows[0]->id }}' ,data,function(response){ check(); });
        });
        function editable(td, type="text", attr = ''){
            var val = $(td).html();
            $(td).removeAttr('onclick');
            $(td).html('<input type="'+type+'" ' + attr + ' id="active-edit" onblur="onEditFinish(this,\''+type+'\',\''+attr+'\')" class="form-control sm" value="'+val+'" />');
            $('#active-edit').focus();
        }

        function onEditFinish(input, type="text", attr = ''){
            var val = $(input).val();
            var td = $(input).closest('td');
            td.html(val);
            td.attr('onclick',"editable(this,'"+type+"','"+attr+"')");
            var id = td.closest('tr').attr('id');

            var data = { '_token': '{{ csrf_token() }}'};
            td.closest('tr').find('td[data-name]').each(function(){
                data[$(this).attr('data-name')]=$(this).html();
            });
            data['open_return'] = td.closest('tr').find('td').eq(7).find('select').val();
            data['ltc_14'] = td.closest('tr').find('td').eq(8).find('input').prop('checked') || 0;
            data['ltc_16'] = td.closest('tr').find('td').eq(9).find('input').prop('checked') || 0;
            data['ltc_14'] = data['ltc_14'] ? 1 : 0;
            data['ltc_16'] = data['ltc_16'] ? 1 : 0;

            $.post('/key-travel/{{ strtolower($order->type) }}/{{ $order->order_id }}/' + id ,data,function(response){ check(); });
        }

        function changed(input){


            var td = $(input).closest('td');
            var id = td.closest('tr').attr('id');

            var data = { '_token': '{{ csrf_token() }}'};
            td.closest('tr').find('td[data-name]').each(function(){
                data[$(this).attr('data-name')]=$(this).html();
            });
            data['open_return'] = td.closest('tr').find('td').eq(7).find('select').val();
            data['ltc_14'] = td.closest('tr').find('td').eq(8).find('input').prop('checked') || 0;
            data['ltc_16'] = td.closest('tr').find('td').eq(9).find('input').prop('checked') || 0;
            data['ltc_14'] = data['ltc_14'] ? 1 : 0;
            data['ltc_16'] = data['ltc_16'] ? 1 : 0;

            $.post('/key-travel/{{ strtolower($order->type) }}/{{ $order->order_id }}/' + id ,data,function(response){ check(); });

        }

        function removeItem(id){
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
                    $.get('/catalogue/{{ $order->order_id }}/' + id + '/delete' ,function(response){
                        check();
                    });
                }
            })
        }

        function uploader(btn){
            $(btn).closest('td').find('.upload').click();
        }

        function upload(input) {

            var file = $(input)[0].files[0];
            var id = '{{ $order->id }}';

            var formData = new FormData();
            formData.append('file', file);

            $.ajax({
                url: '/catalogue/{{ $order->order_id }}' + '/' + id + "/upload",
                type:"POST",
                processData:false,
                contentType: false,
                data: formData,
                complete: function(data){
                    $(input).closest('td').html('<i onclick="removeFile();" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open(\'/catalogue/{{ $order->order_id }}/'+id+'/file\')" class="fa fa-file-pdf attached"></i>')
                    $('.orders-table tbody tr').each(function(){
                        $(this).find('td[data-name=requisition_no]').html(data.responseJSON.requisition_no);
                    });
                    check();
                }
            });

        }


        function check(){

            var ok = true;

            var val = $('input[name=key_travel_id]').val();
            if(!val){
                ok = false;
            }

            var val = $('input[name=value]').val();
            if(!val || val=="0.00"){
                ok = false;
            }

            if(ok){
                $('.complete-btn').show();
            }
            else {
                $('.complete-btn').hide();
            }
        }

        $(function(){
            check();
        });

        function complete(){

            Swal.showLoading();

            $.get('/key-travel/{{ strtolower($order->type) }}/{{ $order->order_id }}/processing',function(response){
                Swal.close();
                if(response.success){
                    Swal.fire(
                        'Success',
                        'Order moved to processing',
                        'success'
                    ).then((result) => {
                        window.location = '/home';
                    });
                }
            }).fail(function(xhr,status,error){
                Swal.close();
            });

        }

        function removeFile(){
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
                    $.get('/catalogue/{{ $order->order_id }}/{{ $order->id }}/file-delete', function(response){
                        $('.uploader').html('<form method="post" enctype="multipart/form-data">'+
                            '<input name="file" onchange="upload(this);" type="file" class="upload d-none" />'+
                        '</form>'+
                        '<i onclick="uploader(this);" class="fa fa-upload"></i>');
                        check();
                    });
                }
            })
        }

        function notes(item){
            $.get('/key-travel/train/{{ $order->order_id }}/'+item+'/notes',function(response){

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

            $.post('/key-travel/train/{{ $order->order_id }}/'+item+'/notes','_token={{ csrf_token() }}&note='+encodeURIComponent(note),function(response){
                var tr = '<tr id="'+response.id+'"><td>{{ auth()->user()->is_admin ? "Admin" : "Requisitioner" }}</td><td>{{ auth()->user()->name }}</td><td>'+response.note+'</td><td class="text-right">'+response.created_at+'</td></tr>';
                $('.notes-table tbody').prepend(tr);
                $('.new-note').val('');
            });

        }

    </script>
@endsection
