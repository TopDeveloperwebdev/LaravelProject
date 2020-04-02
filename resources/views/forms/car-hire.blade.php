@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
         <div class="col-md-10">
            <div class="">
            <h3 class="title-5 m-b-20">Car Hire</h3>
                <form class="form">
                   
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-3">
                            <label class="control-label">Name</label>
                            </div>
                            <div class="col-md-8">
                            <input name="name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Email Address</label>
                            </div>
                            <div class="col-md-8">
                                <input name="email" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Department</label>
                            </div>
                            <div class="col-md-8">
                                <input type="hidden" value="{{ auth()->user()->department->name ?? '' }}" name="department"/>
                                <input disabled value="{{ auth()->user()->department->name ?? '' }}" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Telephone</label>
                            </div>
                            <div class="col-md-8">
                                <input name="telephone" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Driver 1 Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="driver1_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Driver 2 Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="driver2_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Driver 3 Name</label>
                            </div>
                            <div class="col-md-8">
                            <input name="driver3_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Start Date</label>
                        </div>
                        <div class="col-md-8">
                            <input name="start_date" type="date" class="form-control" />
                        </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Finish Date</label>
                        </div>
                        <div class="col-md-8">
                            <input name="finish_date" type="date" class="form-control" />
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Start Time</label>
                            </div>
                            <div class="col-md-8">
                                <input name="start_time" type="time" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Finish Time</label>
                            </div>
                            <div class="col-md-8">
                                <input name="finish_time" type="time" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label>
                            Collect From Low Hills Car Park
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input name="collect" type="checkbox" />
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                            <label class="control-label">Collect Other location</label>
                            </div>
                            <div class="col-md-8">
                            <input name="collect_other" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label>
                            Return to Low Hills Car Park
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input name="return" type="checkbox" />
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Return Other location</label>
                            </div>
                            <div class="col-md-8">
                                <input name="return_other" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Special Requirement</label>
                            </div>
                            <div class="col-md-8">
                                <input name="special" class="form-control" />
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label>Confirm age
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input name="min_21" type="checkbox" />
                                &nbsp;&nbsp;I agree all drivers are 21 years of age or greater
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label>Confirm License
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input name="valid_license" type="checkbox" />
                                &nbsp;&nbsp;All Named drivers hold a Full UK License with less than 6 points
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Add a note</label>
                            </div>
                            <div class="col-md-8">
                                <input name="note" class="form-control" />
                            </div>
                        </div>


                    </div>
                    <div class="col-md-12"><hr/></div>
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


        function submitOrder(){
            var data = $('.form').serialize();

            Swal.showLoading();

            $.post("{{ route('car-hire.store') }}",data,function(response){
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

    </script>
@endsection
