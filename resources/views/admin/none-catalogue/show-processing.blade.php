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
                <h3 class="title-5 m-b-20"> Non Catalogue</h3>
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
                                @if($order[0]->admin)<tr><td>Admin</td><td>{{ $order[0]->admin->name }}</td></tr>@endif
                                <tr><td>Order Request Date</td><td>{{ $order[0]->created_at->format('d/m/y') }}</td></tr>
                                <tr><td>Department</td><td>{{ $order[0]->requisitioner->department->name ?? '-' }}</td></tr>
                                <tr><td>Dept Cost Centre</td><td>{{ $order[0]->requisitioner->department->cost_centre ?? '-' }}</td></tr>
                                <tr><td>Old Project Code</td><td>{{ $order[0]->requisitioner->department->old_project_code ?? '-' }}</td></tr>
                                <tr><td>Delivery Location</td><td>{{ $order[0]->requisitioner->department->delivery_location ?? '-' }}</td></tr>
                                <tr>
                                    <td>Req Attached</td>
                                    <td class="uploader">
                                        @if(!$order[0]->file)
                                            <form method="post" enctype="multipart/form-data">
                                                <input name="file" onchange="upload(this);" type="file" class="upload d-none" />
                                            </form>
                                            <i onclick="uploader(this);" class="fa fa-upload"></i>
                                        @else
                                            @if(!$order[0]->completed_at)
                                                <i onclick="removeFile();" class="fa fa-times text-danger pull-right p-1"></i>
                                            @endif
                                            <i onclick="window.open('/none-catalogue/{{ $order[0]->order_id }}/{{ $order[0]->id }}/file')" class="fa fa-file-pdf attached" />
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </small>
                    </div>

                    @if($order[0]->new_supplier)
                    <div class="col-md-4">
                        <small>
                            <table class="table table-bordered table-small">
                                <tbody>
                                <tr><td>Supplier Name</td><td>{{ $order[0]->supplier }}</td></tr>
                                <tr><td>Supplier Contact</td><td>{{ $order[0]->contact_name }}</td></tr>
                                <tr><td>Supplier Email</td><td>{{ $order[0]->supplier_email }}</td></tr>
                                <tr><td>Supplier Tel</td><td>{{ $order[0]->supplier_tel }}</td></tr>
                                </tbody>
                            </table>
                        </small>
                    </div>
                    @endif

                </div>
                <div class="table-responsive-xl table-responsive-data2 m-b-20">
                    <table class="table orders-table">
                    <thead>
                                <tr>
                                   
                                    <td>Requistision No</td>
                                    <td>Type</td>
                                    <td>Cat/Item No</td>
                                    <td>Supplier</td>
                                    <td>Description</td>
                                    <td>Qty</td>
                                    <td>Price</td>
                                    <td>Currency</td>
                                    <td>Total</td>
                                    <td>Qty Received</td>
                                    <td>Date Received</td>
                                    <td>Attached</td>
                                    <td>Notes</td>
                                    <td>Actions</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $item)
                                    <tr id="{{ $item->id }}">
                                        
                                        <td data-name="requisition_no" onclick="editable(this);">{{ $item->requisition_no }}</td>
                                        <td>
                                            <select name="type_id" onchange="selChange(this)">
                                                <option value="">Select Type</option>
                                                <option @if($item->type_id==1) selected @endif value="1">CONSUMABLES</option>
                                                <option @if($item->type_id==2) selected @endif value="2">EQUIPMENT</option>
                                                <option @if($item->type_id==3) selected @endif value="3">TRAVEL & SUB</option>
                                            </select>
                                        </td>
                                        <td data-name="item_no" onclick="editable(this);">{{ $item->item_no }}</td>
                                        <td data-name="supplier" onclick="editable(this);">{{ $item->supplier }}</td>
                                        <td data-name="description" onclick="editable(this);">{{ $item->description }}</td>
                                        <td data-name="qty" onclick="editable(this);">{{ $item->qty }}</td>
                                        <td data-name="price" onclick="editable(this);">{{ $item->price }}</td>
                                        <td>GBP</td>
                                        <td data-name="total" onclick="editable(this);">{{ $item->total }}</td>
                                        <td data-name="qty_received" onclick="editable(this);">{{ $item->qty_received ?? '0'  }}</td>
                                        <td><input onchange="onChangeDate({{ $item->id }},this.value,'received_at');" value="{{ $item->received_at ? $item->received_at->format('Y-m-d') : null }}" type="date" name="received_at" /></td>
                                        <td onclick="showFiles({{ $item->id }});">{{ $item->files->count() }}</td>
                                        <td onclick="notes({{ $item->id }});">{{ $item->notes->count() }}</td>
                                        <td>
                                            <div class="rs-select2--trans rs-select2--sm">
                                                <select onchange="onChange({{ $item->id }},this.value,'status_id')" class="js-select2" name="action">
                                                    @foreach($status as $s)
                                                        <option @if($item->status_id==$s->id) selected  @endif value="{{ $s->id }}">{{ $s->text }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                @if(!$order[0]->completed_at)
                                    <tr><td colspan="15" class="text-right"><button class="btn btn-primary complete-btn" style="display:none;" onclick="complete();">Close Requisition</button></td></tr>
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
        @if($order[0]->completed_at)
            $('input').attr('disabled','disabled');
            $('select').attr('disabled','disabled');
        @endif
        $(function(){
            check();
        });
        /**
         *
         */
        function editable(td){
            @if($order[0]->completed_at)
                return;
            @endif
            var val = $(td).html();
            $(td).removeAttr('onclick');
            $(td).html('<input id="active-edit" onblur="onEditFinish(this);" class="form-control sm" value="'+val+'" />');
            $('#active-edit').focus();
        }

        function selChange(select){
            var id = $(select).closest('tr').attr('id');
            var data = { '_token': '{{ csrf_token() }}'};
            data[$(select).attr('name')]=$(select).val();

            $.post('/none-catalogue/{{ $order[0]->order_id }}/' + id ,data,function(response){ check(); });
        }
        /**
         *
         */
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

            $.post('/none-catalogue/{{ $order[0]->order_id }}/' + id ,data,function(response){ check(); });
        }
        /**
         *
         */
        function propChecked(id,value,name){
            var data = { '_token': '{{ csrf_token() }}'};
            data[name]=value ? 1 : 0;
            $.post('/none-catalogue/{{ $order[0]->order_id }}/' + id ,data,function(response){ check(); });
        }
        /**
         *
         */
        function onChange(id,value,name){
            var data = { '_token': '{{ csrf_token() }}'};
            data[name]=value;
            $.post('/none-catalogue/{{ $order[0]->order_id }}/' + id ,data,function(response){ check(); });
        }
        /**
         *
         */
        function onChangeDate(id,value,name){
            var data = { '_token': '{{ csrf_token() }}'};
            data[name]=value;
            $.post('/none-catalogue/{{ $order[0]->order_id }}/' + id ,data,function(response){ check(); });
        }
        /**
         *
         */
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
                    $.get('/none-catalogue/{{ $order[0]->order_id }}/' + id + '/delete' ,function(response){
                        check();
                    });
                }
            })
        }
        /**
         *
         */
        function uploader(btn){
            $(btn).closest('td').find('.upload').click();
        }
        /**
         *
         */
        function upload(input) {

            var file = $(input)[0].files[0];
            var id = '{{ $order[0]->id }}';

            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('file', file);

            $.ajax({
                url: '/none-catalogue/{{ $order[0]->order_id }}' + '/' + id + "/upload",
                type:"POST",
                processData:false,
                contentType: false,
                data: formData,
                complete: function(data){
                    $(input).closest('td').html('<i onclick="removeFile();" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open(\'/none-catalogue/{{ $order[0]->order_id }}/'+id+'/file\')" class="fa fa-file-pdf attached"></i>')
                    $('.orders-table tbody tr').each(function(){
                        $(this).find('td[data-name=requisition_no]').html(data.responseJSON.requisition_no);
                    });
                    check();
                }
            });

        }
        /**
         *
         */
        function notes(item){
            $.get('/none-catalogue/{{ $order[0]->order_id }}/'+item+'/notes',function(response){

                var notes = "";
                $.each(response,function(){
                    notes += '<tr id="'+this.id+'"><td>'+(this.user.id=="{{ $order[0]->user_id }}" ? 'Requisitioner' : 'Admin')+'</td><td>'+this.user.name+'</td><td>'+this.note+'</td><td class="text-right">'+moment(this.created_at).format('DD/MM/YYYY - hh:mm a')+'</td></tr>';
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

            $.post('/none-catalogue/{{ $order[0]->order_id }}/'+item+'/notes','_token={{ csrf_token() }}&note='+encodeURIComponent(note),function(response){
                var tr = '<tr id="'+response.id+'"><td>{{ auth()->user()->is_admin ? "Admin" : "Requisitioner" }}</td><td>{{ auth()->user()->name }}</td><td>'+response.note+'</td><td class="text-right">'+response.created_at+'</td></tr>';
                $('.notes-table tbody').prepend(tr);
                $('.new-note').val('');
            });

        }
        /**
         *
         */
        function check(){
            var files = $('.attached').length;
            var rows = $('.orders-table tbody tr').length;

            var ok = true;
            $('.orders-table tbody tr').each(function(){
                var val = $(this).find('td[data-name=requisition_no]').html();
                if(!val){
                    ok = false;
                }


                if($(this).find('input[name=received_at]').val()==""){
                    ok=false;
                }

                if($(this).find('select[name=action]').val()=="0"){
                    ok=false;
                }

            });

            if(files == 1 && ok){
                $('.complete-btn').show();
            }
            else {
                $('.complete-btn').hide();
            }
        }
        /**
         *
         */
        function complete(){

            Swal.showLoading();

            $.get('/none-catalogue/{{ $order[0]->order_id }}/close',function(response){
                Swal.close();
                if(response.success){
                    Swal.fire(
                        'Success',
                        'Requisition Closed.',
                        'success'
                    ).then((result) => {
                        window.location = '/home';
                    });
                }
            }).fail(function(xhr,status,error){
                Swal.close();
            });

        }
        /**
         *
         */
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
                    $.get('/none-catalogue/{{ $order[0]->order_id }}/{{ $order[0]->id }}/file-delete', function(response){
                        $('.uploader').html('<form method="post" enctype="multipart/form-data">'+
                            '<input name="file" onchange="upload(this);" type="file" class="upload d-none" />'+
                        '</form>'+
                        '<i onclick="uploader(this);" class="fa fa-upload"></i>');
                        check();
                    });
                }
            })

        }

        var attachement;
        function showFiles(id){

            $.get('{{ $order[0]->order_id }}/'+id+'/get-files',function(files){

                var html = '<div class="row">';
                $.each(files,function(index,file){
                    html+='<div class="col-md-4"><button onclick="openFile(\''+file+'\')" class="btn btn-link">File '+(index+1)+' <i class="fa fa-file-pdf-o"></i></button><i onclick="removeF(\''+file+'\', '+id+')" class="fa fa-times text-danger"></i></div>';
                });
                html+='</div>';

                attachement = bootbox.dialog({
                    title: 'Attachments',
                    message: html
                });

            });

        }

        function openFile(file){
            window.open(file);
        }

        function removeF(file, id){
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
                    $.get(file+'/delete', function(response){
                        attachement.modal('hide');
                        showFiles(id);
                    });
                }
            })
        }
    </script>
@endsection
