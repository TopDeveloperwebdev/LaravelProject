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
                <h3 class="title-5 m-b-20"> Catalogue</h3>
                <div class="row m-b-60">
                    <div class="col-md-4">
                        <small>
                            <table class="table table-bordered table-small">
                                <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if(!$order[0]->placed_at)
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif($order[0]->placed_at && !$order[0]->completed_at)
                                            <span class="badge badge-warning">Processing</span>
                                        @else
                                            <span class="badge badge-success">Complete</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr><td width="30%">Requisitioner</td><td>{{ $order[0]->requisitioner->name }}</td></tr>
                                <tr><td>Order Request Date</td><td>{{ $order[0]->created_at->format('d/m/y') }}</td></tr>
                                <tr><td>Department</td><td>{{ $order[0]->requisitioner->department->name ?? '-' }}</td></tr>
                                <tr><td>Dept Cost Centre</td><td>{{ $order[0]->requisitioner->department->cost_centre ?? '-' }}</td></tr>
                                <tr><td>Old Project Code</td><td>{{ $order[0]->requisitioner->department->old_project_code ?? '-' }}</td></tr>
                                <tr><td>Delivery Location</td><td>{{ $order[0]->requisitioner->department->delivery_location ?? '-' }}</td></tr>
                                <tr>
                                    <td>Req Attached</td>
                                    <td class="uploader">
                                        @if(!$order[0]->file)
                                        <form method="post" enctype="multipart/form-data"><input name="file" onchange="upload(this);" type="file" class="upload d-none" /></form><i onclick="uploader(this);" class="fa fa-upload"></i>
                                        @else
                                        <i onclick="removeFile();" class="fa fa-times text-danger pull-right p-1"></i>
                                        <i onclick="window.open('/catalogue/{{ $order[0]->order_id }}/{{ $order[0]->id }}/file')" class="fa fa-file-pdf attached" />
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </small>
                    </div>
                </div>

                <div class="table-responsive table-responsive-data2 m-b-20">
                    <table class="table orders-table">
                    <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th>Requistision No</th>
                                    <th>Cat/Item No</th>
                                    <th>Supplier</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Currency</th>
                                    <th>Total</th>
                                    <th>Notes</th>
                                    <th><i class="fa fa-times text-danger"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $item)
                                    <tr id="{{ $item->id }}">
                                        <td>

                                        </td>
                                        <td data-name="requisition_no" onclick="editable(this);">{{ $item->requisition_no }}</td>
                                        <td data-name="item_no" onclick="editable(this);">{{ $item->item_no }}</td>
                                        <td data-name="supplier" onclick="editable(this);">{{ $item->supplier }}</td>
                                        <td data-name="description" onclick="editable(this);">{{ $item->description }}</td>
                                        <td data-name="qty" onclick="editable(this);">{{ $item->qty }}</td>
                                        <td data-name="price" onclick="editable(this);">{{ $item->price }}</td>
                                        <td>GBP</td>
                                        <td data-name="total" onclick="editable(this);">{{ $item->total }}</td>
                                        <td onclick="notes({{ $item->id }});"> {{ $item->notes->count() }}</td>
                                        <td><i onclick="removeItem({{ $item->id }})" class="fa fa-times text-danger"></i></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr><td colspan="12" class="text-right"><button class="btn btn-primary complete-btn" style="display:none;" onclick="complete();">Order Placed</button></td></tr>
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
        function editable(td){
            var val = $(td).html();
            $(td).removeAttr('onclick');
            $(td).html('<input id="active-edit" onblur="onEditFinish(this)" class="form-control sm" value="'+val+'" />');
            $('#active-edit').focus();
        }

        function onEditFinish(input){
            var val = $(input).val();
            var td = $(input).closest('td');
            td.html(val);
            td.attr('onclick','editable(this)');
            var id = td.closest('tr').attr('id');

            var qty = parseInt(td.closest('tr').find('td[data-name=qty]').html());
            var price = parseFloat(td.closest('tr').find('td[data-name=price]').html());
            var total = qty * price;
            td.closest('tr').find('td[data-name=total]').html(total.toFixed(2));

            var data = { '_token': '{{ csrf_token() }}'};
            td.closest('tr').find('td[data-name]').each(function(){
                data[$(this).attr('data-name')]=$(this).html();
            });

            $.post('/catalogue/{{ $order[0]->order_id }}/' + id ,data,function(response){ check(); });
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
                    $.get('/catalogue/{{ $order[0]->order_id }}/' + id + '/delete' ,function(response){
                        $('#'+id).remove();
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
            var id = '{{ $order[0]->id }}';

            var formData = new FormData();
            formData.append('file', file);

            $.ajax({
                url: '/catalogue/{{ $order[0]->order_id }}' + '/' + id + "/upload",
                type:"POST",
                processData:false,
                contentType: false,
                data: formData,
                complete: function(data){
                    $(input).closest('td').html('<i onclick="removeFile();" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open(\'/catalogue/{{ $order[0]->order_id }}/'+id+'/file\')" class="fa fa-file-pdf attached"></i>')
                    $('.orders-table tbody tr').each(function(){
                        $(this).find('td[data-name=requisition_no]').html(data.responseJSON.requisition_no);
                    });
                    check();
                }
            });

        }

        function notes(item){
            $.get('/catalogue/{{ $order[0]->order_id }}/'+item+'/notes',function(response){

                var notes = "";
                $.each(response,function(){
                    notes += '<tr id="'+this.id+'"><td>'+(this.user.id=="{{ $order[0]->user_id }}" ? 'Requisitioner' : 'Admin')+'</td><td>'+this.user.name+'</td><td>'+this.note+'</td><td class="text-right">'+moment(this.created_at).format('DD/MM/YYYY - hh:mm a')+'</td></tr>';
                })

               var dialog = bootbox.dialog({
                    size: 'large',
                    message: '<div class="col-md-12 text-left"><small>New Note</small><textarea class="form-control new-note"></textarea><br><button onclick="saveNote('+item+');" class="btn btn-primary btn-sm float-right">Save</button><br><div style="max-height:400px;" class="mt-3"><table class="table notes-table"><thead><tr><th>Type</th><th>User</th><th>Note</th><th class="text-right">Date</th></tr></thead><tbody>'+notes+'</tbody></table></div></div>',
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

            $.post('/catalogue/{{ $order[0]->order_id }}/'+item+'/notes','_token={{ csrf_token() }}&note='+encodeURIComponent(note),function(response){
                var tr = '<tr id="'+response.id+'"><td>{{ auth()->user()->is_admin ? "Admin" : "Requisitioner" }}</td><td>{{ auth()->user()->name }}</td><td>'+response.note+'</td><td class="text-right">'+response.created_at+'</td></tr>';
                $('.notes-table tbody').prepend(tr);
                $('.new-note').val('');
            });

        }

        function check(){
            var files = $('.attached').length;
            var rows = $('.orders-table tbody tr').length;

            var ok = true;
            $('.orders-table tbody tr').each(function(){
                var val = $(this).find('td[data-name=requisition_no]').html();
                if(!val){
                    ok = false;
                }
            });

            if(files == 1 && ok){
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

            $.get('/catalogue/{{ $order[0]->order_id }}/processing',function(response){
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
                    $.get('/catalogue/{{ $order[0]->order_id }}/{{ $order[0]->id }}/file-delete', function(response){
                        $('.uploader').html('<form method="post" enctype="multipart/form-data">'+
                            '<input name="file" onchange="upload(this);" type="file" class="upload d-none" />'+
                        '</form>'+
                        '<i onclick="uploader(this);" class="fa fa-upload"></i>');
                        check();
                    });
                }
            })
        }

    </script>
@endsection
