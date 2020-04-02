@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="">
            <button onclick="javascript:history.back()" class="btn btn-primary btn-sm m-b-10"><i class="fa fa-chevron-left"></i> back</button>
                <h3 class="title-5 m-b-20"> Catering</h3>

            <div class="row m-b-60">
                    <div class="col-md-8">
                        <small>
                            <table class="table table-bordered table-small">
                                <tbody>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if(!$order->placed_at)
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif($order->placed_at && !$order->completed_at)
                                            <span class="badge badge-warning">Processing</span>
                                        @else
                                            <span class="badge badge-success">Complete</span>
                                        @endif
                                    </td>
                                </tr>
                                    <tr><td width="30%">Requisitioner</td><td>{{ $order->requisioner->name ?? '-' }}</td></tr>
                                    @if($order->admin)<tr><td>Admin</td><td>{{ $order->admin->name }}</td></tr>@endif
                                    <tr><td>Order Request Date</td><td>{{ $order->created_at->format('d/m/y') }}</td></tr>
                                    <tr><td>Order Submit Date</td><td>{{ $order->created_at->format('d/m/y') }}</td></tr>
                                    <tr><td>Dept Cost Centre</td><td>{{ $order->requisitioner->department->cost_centre }}</td></tr>
                                    <tr><td>Old Project Code</td><td>{{ $order->requisitioner->department->old_project_code }}</td></tr>
                                    <tr><td>Delivery Location</td><td width="80%">{{ $order->requisitioner->department->delivery_location ?? '-' }}</td></tr>
                                    <tr><td>Notes</td><td>{{ $order->notes()->count() }} <button onclick="notes({{ $order->id }});" class="btn btn-primary btn-sm pull-right">View</button></td></tr>
                                </tbody>
                            </table>
                        </small>
                    </div>
                </div>


                <form class="form">
                    <div class="col-md-8" style="font-size:12px;">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Event Name</label>
                            </div>
                            <div class="col-md-9">
                                <input value="{{ $order->event_name }}" name="event_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Date of Event</label>
                            </div>
                            <div class="col-md-9">
                                <input value="{{ $order->event_date ? $order->event_date->format('Y-m-d') : null }}" name="event_date" type="date" class="form-control" />
                            </div>
                        </div>

                        <h1>On Campus</h1>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Catering to room on campus</label>
                            </div>
                            <div class="col-md-9">
                                <input {{ $order->on_campus ? 'checked' : '' }} type="checkbox" onchange="showHide(this,'.campus_options');" name="on_campus" />
                            </div>
                        </div>



                        <div class="campus_options {{ $order->on_campus ? '' : 'd-none' }}">

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="control-label">Building Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input value="{{ $order->building_name }}" name="building_name" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="control-label">Room Number</label>
                                </div>
                                <div class="col-md-9">
                                    <input value="{{ $order->room }}" name="room" class="form-control" />
                                </div>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Options</th>
                                        <th>Time</th>
                                        <th>Delegates</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Refreshments AM (8am to 10am)</td>
                                        <td><input  value="{{ $order->campus_refreshment_am1 }}" type="time" class="form-control" name="campus_refreshment_am1" /></td>
                                        <td width="40px"><input value="{{ $order->campus_refreshment_am1_delegates }}" class="form-control" name="campus_refreshment_am1_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td>Refreshments AM (10am to 12pm)</td>
                                        <td><input type="time" value="{{ $order->campus_refreshment_am2 }}" class="form-control" name="campus_refreshment_am2" /></td>
                                        <td width="40px"><input class="form-control" value="{{ $order->campus_refreshment_am2_delegates }}" name="campus_refreshment_am2_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td>Lunch</td>
                                        <td><input type="time" value="{{ $order->campus_lunch }}" class="form-control" name="campus_lunch" /></td>
                                        <td width="40px"><input value="{{ $order->campus_lunch_delegates }}" class="form-control" name="campus_lunch_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td>Refreshments PM</td>
                                        <td><input type="time" class="form-control" name="campus_refreshment_pm1" value="{{ $order->campus_refreshment_pm1 }}" /></td>
                                        <td width="40px"><input class="form-control" name="campus_refreshment_pm1_delegates" value="{{ $order->campus_refreshment_pm1_delegates }}" /></td>
                                    </tr>
                                    <tr>
                                        <td>Refreshments PM</td>
                                        <td><input type="time" class="form-control" name="campus_refreshment_pm2" value="{{ $order->campus_refreshment_pm2 }}" /></td>
                                        <td width="40px"><input class="form-control" name="campus_refreshment_pm2_delegates" value="{{ $order->campus_refreshment_pm2_delegates }}" /></td>
                                    </tr>
                                    <tr>
                                        <td>Dinner</td>
                                        <td><input type="time" class="form-control" name="campus_dinner" value="{{ $order->campus_dinner }}" /></td>
                                        <td width="40px"><input class="form-control" name="campus_dinner_delegates" value="{{ $order->campus_dinner_delegates }}" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Astor Restaurant (Staff House)</label>
                            </div>
                            <div class="col-md-9">
                                <input {{ $order->astor ? 'checked' : '' }} type="checkbox" onchange="showHide(this,'.astor_options');" name="astor" />
                            </div>
                        </div>

                        <div class="astor_options {{ $order->astor ? '' : 'd-none' }}">
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>Options</th>
                                        <th>Time</th>
                                        <th>Delegates</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Lunch</td>
                                        <td><input type="time" class="form-control" name="astor_lunch" value="{{ $order->astor_lunch }}" /></td>
                                        <td width="40px"><input class="form-control" name="astor_lunch_delegates" value="{{ $order->astor_lunch_delegates }}" /></td>
                                    </tr>
                                    <tr>
                                        <td>Dinner</td>
                                        <td><input type="time" class="form-control" name="astor_dinner" value="{{ $order->astor_dinner }}" /></td>
                                        <td width="40px"><input class="form-control" name="astor_dinner_delegates" value="{{ $order->astor_dinner_delegates }}" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <h1>Off Campus</h1>

                        <h5>Edgbaston Park Hotel Restaurant (1900 Bar & Grill)</h5>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Main Restaurant</label>
                            </div>
                            <div class="col-md-9">
                                <input {{ $order->main ? 'checked' : '' }} type="checkbox" onchange="showHide(this,'.main_options');" name="main" />
                            </div>
                        </div>

                        <div class="main_options {{ $order->main ? '' : 'd-none' }}">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Options</th>
                                        <th>Time</th>
                                        <th>Delegates</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Breakfast</td>
                                        <td><input type="time" class="form-control" value="{{ $order->main_breakfast }}" name="main_breakfast" /></td>
                                        <td width="40px"><input class="form-control" value="{{ $order->main_breakfast_delegates }}" name="main_breakfast_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td>Lunch</td>
                                        <td><input type="time" class="form-control" name="main_lunch" value="{{ $order->main_lunch }}" /></td>
                                        <td width="40px"><input class="form-control" name="main_lunch_delegates" value="{{ $order->main_lunch_delegates }}" /></td>
                                    </tr>
                                    <tr>
                                        <td>Dinner</td>
                                        <td><input type="time" class="form-control" name="main_dinner" value="{{ $order->main_dinner }}" /></td>
                                        <td width="40px"><input class="form-control" name="main_dinner_delegates" value="{{ $order->main_dinner_delegates }}" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Buffet Lunch</label>
                            </div>
                            <div class="col-md-9">
                                <input {{ $order->buffet ? 'checked' : '' }} type="checkbox" onchange="showHide(this,'.buffet_options');" name="buffet" />
                            </div>
                        </div>

                        <div class="buffet_options {{ $order->buffet ? '' : 'd-none' }}">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Options</th>
                                        <th>Time</th>
                                        <th>Delegates</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Lunch</td>
                                        <td><input type="time" class="form-control" name="buffet_lunch" value="{{ $order->buffet_lunch }}" /></td>
                                        <td width="40px"><input class="form-control" name="buffet_lunch_delegates" value="{{ $order->buffet_lunch_delegates }}"/></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Private Dining</label>
                            </div>
                            <div class="col-md-9">
                                <input {{ $order->private ? 'checked' : '' }} type="checkbox" onchange="showHide(this,'.private_options');" name="private" />
                            </div>
                        </div>

                        <div class="private_options {{ $order->private ? '' : 'd-none' }}">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Options</th>
                                        <th>Time</th>
                                        <th>Delegates</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Breakfast</td>
                                        <td><input type="time" class="form-control" name="private_breakfast"  value="{{ $order->private_breakfast }}" /></td>
                                        <td width="40px"><input class="form-control" name="private_breakfast_delegates" value="{{ $order->private_breakfast_delegates }}" /></td>
                                    </tr>
                                    <tr>
                                        <td>Lunch</td>
                                        <td><input type="time" class="form-control" name="private_lunch" value="{{ $order->private_lunch }}" /></td>
                                        <td width="40px"><input class="form-control" name="private_lunch_delegates" value="{{ $order->private_lunch_delegates }}" /></td>
                                    </tr>
                                    <tr>
                                        <td>Dinner</td>
                                        <td><input type="time" class="form-control" name="private_dinner" value="{{ $order->private_dinner }}" /></td>
                                        <td width="40px"><input class="form-control" name="private_dinner_delegates" value="{{ $order->private_dinner_delegates }}" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Dietary and Special Requirements</label>
                            </div>
                            <div class="col-md-9">
                            <textarea rows="6" name="special" class="form-control" />{{ $order->special }}</textarea>
                            </div>
                        </div>


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Quote</th>
                                        <th>Contract</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Fresh Thinking</td>
                                        <td>
                                            @if(!$order->fresh_quote)
                                                <form method="post" enctype="multipart/form-data">
                                                    <input name="fresh_quote" onchange="upload(this);" type="file" class="upload d-none" />
                                                </form>
                                                <i onclick="uploader(this);" class="fa fa-upload"></i>
                                            @else
                                                <i onclick="removeFile(this,'fresh_quote');" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open('/catering/{{ $order->order_id }}/{{ $order->id }}/file/{{ $order->fresh_quote }}');" class="fa fa-file-pdf attached"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$order->fresh_contract)
                                                <form method="post" enctype="multipart/form-data">
                                                    <input name="fresh_contract" onchange="upload(this);" type="file" class="upload d-none" />
                                                </form>
                                                <i onclick="uploader(this);" class="fa fa-upload"></i>
                                            @else
                                                <i onclick="removeFile(this,'fresh_contract');" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open('/catering/{{ $order->order_id }}/{{ $order->id }}/file/{{ $order->fresh_contract }}');" class="fa fa-file-pdf attached"></i>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jacksons Catering</td>
                                        <td>
                                            @if(!$order->jacksons_quote)
                                                <form method="post" enctype="multipart/form-data">
                                                    <input name="jacksons_quote" onchange="upload(this);" type="file" class="upload d-none" />
                                                </form>
                                                <i onclick="uploader(this);" class="fa fa-upload"></i>
                                            @else
                                                <i onclick="removeFile(this,'jacksons_quote');" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open('/catering/{{ $order->order_id }}/{{ $order->id }}/file/{{ $order->jacksons_quote }}');" class="fa fa-file-pdf attached"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$order->jacksons_contract)
                                            <form method="post" enctype="multipart/form-data">
                                                <input name="jacksons_contract" onchange="upload(this);" type="file" class="upload d-none" />
                                            </form>
                                            <i onclick="uploader(this);" class="fa fa-upload"></i>
                                            @else
                                            <i onclick="removeFile(this,'jacksons_contract');" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open('/catering/{{ $order->order_id }}/{{ $order->id }}/file/{{ $order->jacksons_contract }}');" class="fa fa-file-pdf attached"></i>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Edgbaston Park Hotel</td>
                                        <td>
                                            @if(!$order->edgbaston_quote)
                                                <form method="post" enctype="multipart/form-data">
                                                    <input name="edgbaston_quote" onchange="upload(this);" type="file" class="upload d-none" />
                                                </form>
                                                <i onclick="uploader(this);" class="fa fa-upload"></i>
                                            @else
                                                <i onclick="removeFile(this,'edgbaston_quote');" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open('/catering/{{ $order->order_id }}/{{ $order->id }}/file/{{ $order->edgbaston_quote }}');" class="fa fa-file-pdf attached"></i>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$order->edgbaston_contract)
                                                <form method="post" enctype="multipart/form-data">
                                                    <input name="edgbaston_contract" onchange="upload(this);" type="file" class="upload d-none" />
                                                </form>
                                                <i onclick="uploader(this);" class="fa fa-upload"></i>
                                            @else
                                                <i onclick="removeFile(this,'edgbaston_contract');" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open('/catering/{{ $order->order_id }}/{{ $order->id }}/file/{{ $order->edgbaston_contract }}');" class="fa fa-file-pdf attached"></i>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Astor Restaurant</td>
                                        <td>
                                        @if(!$order->astor_quote)
                                            <form method="post" enctype="multipart/form-data">
                                                <input name="astor_quote" onchange="upload(this);" type="file" class="upload d-none" />
                                            </form>
                                            <i onclick="uploader(this);" class="fa fa-upload"></i>
                                        @else
                                            <i onclick="removeFile(this,'astor_quote');" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open('/catering/{{ $order->order_id }}/{{ $order->id }}/file/{{ $order->astor_quote }}');" class="fa fa-file-pdf attached"></i>
                                        @endif
                                        </td>
                                        <td>
                                        @if(!$order->astor_contract)
                                            <form method="post" enctype="multipart/form-data">
                                                <input name="astor_contract" onchange="upload(this);" type="file" class="upload d-none" />
                                            </form>
                                            <i onclick="uploader(this);" class="fa fa-upload"></i>
                                        @else
                                            <i onclick="removeFile(this,'astor_contract');" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open('/catering/{{ $order->order_id }}/{{ $order->id }}/file/{{ $order->astor_contract }}');" class="fa fa-file-pdf attached"></i>
                                        @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                    </div>
                    <div class="col-md-12 text-right">
                        <hr>
                        @if(!$order->completed_at)
                            <button type="button" onclick="complete();" class="btn btn-primary">Close Requisition</button>
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
            $('.fa-times').hide();
        @endif


        $('.form textarea').change(function(){

            var data = {};
            data['_token'] = '{{ csrf_token() }}';
            data[$(this).attr('name')] = $(this).val();

            $.post("/catering/{{ $order->order_id }}",data,function(response){ });

        });

        $('.form input').change(function(){

            var data = {};
            data['_token'] = '{{ csrf_token() }}';
            data[$(this).attr('name')] = $(this).attr('type') == "checkbox" ? ($(this).prop('checked') ? 1 : 0) : $(this).val();

            $.post("/catering/{{ $order->order_id }}",data,function(response){ });

        });


        function showHide(check,div){
            if($(check).prop('checked')){
                $(div).removeClass('d-none')
            }
            else{
                $(div).addClass('d-none')
            }
        }


        function complete(){

            var data = $('.form').serialize();

            Swal.showLoading();

            $.get("/catering/{{ $order->order_id }}/complete",data,function(response){
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
            $.get('/catering/{{ $order->order_id }}/'+item+'/notes',function(response){

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

            $.post('/catering/{{ $order->order_id }}/'+item+'/notes','_token={{ csrf_token() }}&note='+encodeURIComponent(note),function(response){
                var tr = '<tr id="'+response.id+'"><td>{{ auth()->user()->is_admin ? "Admin" : "Requisitioner" }}</td><td>{{ auth()->user()->name }}</td><td>'+response.note+'</td><td class="text-right">'+response.created_at+'</td></tr>';
                $('.notes-table tbody').prepend(tr);
                $('.new-note').val('');
            });

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
            var id = '{{ $order->id }}';

            var formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('file', file);

            $.ajax({
                url: '/catering/{{ $order->order_id }}' + '/' + id + "/upload/"+$(input).attr('name'),
                type:"POST",
                processData:false,
                contentType: false,
                data: formData,
                complete: function(data){
                    $(input).closest('td').html('<i onclick="removeFile(\''+data.responseJSON.file+'\');" class="fa fa-times text-danger pull-right p-1"></i><i onclick="window.open(\'/catering/{{ $order->order_id }}/'+id+'/file/'+data.responseJSON.file+'\')" class="fa fa-file-pdf attached"></i>');
                    check();
                }
            });

        }

        /**
         *
         */
        function removeFile(input, type){

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
                    $.get('/catering/{{ $order->order_id }}/{{ $order->id }}/file/' + type + '/delete', function(response){

                        var html = '<form method="post" enctype="multipart/form-data">'+
                                        '<input name="'+type+'" onchange="upload(this);" type="file" class="upload d-none" />'+
                                    '</form>'+
                                    '<i onclick="uploader(this);" class="fa fa-upload"></i>';
                        $(input).closest('td').html(html);

                    });
                }
            })

        }


    </script>
@endsection
