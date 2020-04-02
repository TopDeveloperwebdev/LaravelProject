@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
        <div class="col-md-10">
            <div class="user-data">
            <h3 class="title-5 m-b-20">Training</h3>
                <form method="post" action="{{ route('training.store') }}" class="form" enctype="multipart/form-data">
                
                        @csrf

                        <div class="checkbox row">
                            <div class="col-md-3">
                                <label>New Supplier</label>
                            </div>
                            <div class="col-md-8">
                                <input name="new_supplier" onchange="toggleSupplierInfo($(this).prop('checked'));" type="checkbox" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Supplier Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="supplier_name" class="form-control required" />
                            </div>
                        </div>

                        <div class="supplier_info">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="control-label">Contact Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input name="contact_name" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="control-label">Supplier Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input name="supplier_email" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="control-label">Supplier Tel</label>
                                </div>
                                <div class="col-md-8">
                                    <input name="supplier_tel" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="checkbox row">
                            <div class="col-md-3">
                                <label>National</label>
                            </div>
                            <div class="col-md-8">
                                <input name="national" type="checkbox" />
                            </div>
                        </div>


                        <div class="checkbox row">
                            <div class="col-md-3">
                                <label>International</label>
                            </div>
                            <div class="col-md-8">
                                <input name="international" type="checkbox" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Training Start Date</label>
                            </div>
                            <div class="col-md-8">
                                <input name="start_date" type="date" class="form-control required" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Training End Date</label>
                            </div>
                            <div class="col-md-8">
                                <input name="end_date" type="date" class="form-control required" />
                            </div>
                        </div>


                        <input type="hidden" name="org_name" value="0" />


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Training / Site URL</label>
                            </div>
                            <div class="col-md-8">
                                <input name="url" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Training Description</label>
                            </div>
                            <div class="col-md-8">
                                <input name="description" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Reason for Training</label>
                            </div>
                            <div class="col-md-8">
                                <input name="reason" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Value (Inc. VAT)</label>
                            </div>
                            <div class="col-md-8">
                                <input name="value" class="form-control required" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Currency</label>
                            </div>
                            <div class="col-md-8">
                                <select name="currency" class="form-control" style="height: 30px;">
                                    <option value="GBP">GBP</option>
                                    <option value="EUR">EUR</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Quotes</label>
                            </div>
                            <div class="col-md-8">
                                Quote 1: <input name="quote1" type="file" /><br><br>
                                Quote 2: <input name="quote2" type="file" /><br><br>
                                Quote 3: <input name="quote3" type="file" />
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-3">
                                <label class="control-label">Additional Files</label>
                            </div>
                            <div class="col-md-8">
                                <input name="additional" type="file" /><br>
                            </div>
                        </div>

                        <hr />
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Add a Note</label>
                            </div>
                            <div class="col-md-8">
                                <input name="note" class="form-control" />
                            </div>
                        </div>

                    </div>
                     <hr>
                    <div class="pull-left mt-3 mb-3">
                        <button type="button" onclick="submitOrder();" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
    <script>
        $('.supplier_info').hide();

        function toggleSupplierInfo(value){
            if(value){
                $('.supplier_info').show();
            }
            else{
                $('.supplier_info').hide();
            }
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

            var data = new FormData();

            $('.form input').each(function(){
                data.append($(this).attr('name'),$(this).val());
            });
            $('.form select').each(function(){
                data.append($(this).attr('name'),$(this).val());
            });

            $('input[type=file]').each(function(index,input){

                var files = $(input)[0].files;

                // if(files.length>1){
                //     $.each(files,function(index,file){
                //         data.append($(input).attr('name')+'[]', file);
                //     });
                // }
                // else {
                    data.append($(input).attr('name'), files[0]);
                // }

            });

            Swal.showLoading();

            $.ajax({
                url: "{{ route('training.store') }}",
                type:"POST",
                processData:false,
                contentType: false,
                data: data,
                complete: function(response){
                    Swal.close();
                    if(response.responseJSON.success){
                        Swal.fire(
                            'Success',
                            'Order has been placed',
                            'success'
                        ).then((result) => {
                            window.location = '/home';
                        });
                    }
                },
                error: function(xhr,status,error){
                    console.log(error);
                    Swal.close();
                }
            });

        }

    </script>
@endsection
