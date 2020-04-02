@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class=" col-md-10">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-20">Eurostar</h3>
                <form class="form">

                    @csrf

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">From Station<span class="ast">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input name="from_station" class="form-control required" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">To Station<span class="ast">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input name="to_station"  class="form-control required" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Departure Date<span class="ast">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input name="departure_date" type="date" class="form-control required" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Departure Time<span class="ast">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input name="departure_time" type="time" class="form-control required" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Return Date</label>
                        </div>
                        <div class="col-md-8">
                            <input name="return_date" type="date"   class="form-control " />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Return Time</label>
                        </div>
                        <div class="col-md-8">
                            <input name="return_time" type="time" class="form-control " />
                        </div>
                    </div>

                    <hr />
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Note</label>
                        </div>
                        <div class="col-md-8">
                            <input name="note" class="form-control " />
                        </div>
                    </div>


                    <hr />
                    <div class="pull-left mb-3">
                            <button type="button" onclick="submitOrder();" class="btn btn-primary">Submit</button>
                    </div>

                </form>

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
                '<td ><input class="form-control" /></td>'+
                '<td ><input type="date" class="form-control" /></td>'+
                '<td ><input type="time" class="form-control" /></td>'+
                '<td ><input type="date" class="form-control" /></td>'+
                '<td ><input type="time" class="form-control" /></td>'+
                '<td><input type="text" class="form-control" /></td>'+
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

            var ok = true;
            $('.required').removeClass('is-invalid');
            $('.form .required').each(function(){
                if($(this).val()==""){
                    $(this).addClass('is-invalid');
                    ok = false;
                }
            });

            if(!ok){
                Swal.fire({
                    title: 'Form Error',
                    text: "Please complete highlighted fields to continue",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });

                 return;
            }

            Swal.showLoading();

            $.post("{{ route('key-travel.eurostar.store') }}",$('.form').serialize(),function(response){
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
