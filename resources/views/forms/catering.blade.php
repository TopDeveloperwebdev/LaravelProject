@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="">
             <div class="col-md-10">
            <h3 class="title-5 m-b-20">Catering</h3>
                <form class="form">
                  
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Event Name</label>
                            </div>
                            <div class="col-md-9">
                                <input name="event_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Date of Event</label>
                            </div>
                            <div class="col-md-9">
                                <input name="event_date" type="date" class="form-control" />
                            </div>
                        </div>  
                        <hr />

                        <h3 class="font-weight-normal">On Campus</h3>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label font-weight-bold">Catering to room on campus</label>
                            </div>
                            <div class="col-md-9">
                                <input type="checkbox" onchange="showHide(this,'.campus_options');" name="on_campus" />
                            </div>
                        </div>

                        <div class="campus_options d-none">

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="control-label">Building Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input name="building_name" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label class="control-label">Room Number</label>
                                </div>
                                <div class="col-md-9">
                                    <input name="room" class="form-control" />
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
                                        <td width="220px" class="mr-5">Refreshments AM (7:30am to 12pm)</td>
                                        <td width="90px;"><input type="time" class="form-control" name="campus_refreshment_am1" /></td>
                                        <td width="90px"><input class="form-control" name="campus_refreshment_am1_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td width="220px" class="mr-5">Refreshments AM (7:30am to 12pm)</td>
                                        <td width="90px;"><input type="time" class="form-control" name="campus_refreshment_am2" /></td>
                                        <td width="90px"><input class="form-control" name="campus_refreshment_am2_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td width="220px" class="mr-5">Lunch (12pm to 3pm)</td>
                                        <td width="90px;"><input type="time" class="form-control" name="campus_lunch" /></td>
                                        <td width="90px"><input class="form-control" name="campus_lunch_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td width="220px" class="mr-5">Refreshments PM (12pm to 6pm)</td>
                                        <td width="90px;"><input type="time" class="form-control" name="campus_refreshment_pm1" /></td>
                                        <td width="90px"><input class="form-control" name="campus_refreshment_pm1_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td width="220px" class="mr-5">Refreshments PM (12pm to 6pm)</td>
                                        <td width="90px;"><input type="time" class="form-control" name="campus_refreshment_pm2" /></td>
                                        <td width="90px"><input class="form-control" name="campus_refreshment_pm2_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td width="220px" class="mr-5">Dinner</td>
                                        <td width="90px;"><input type="time" class="form-control" name="campus_dinner" /></td>
                                        <td width="90px"><input class="form-control" name="campus_dinner_delegates" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label font-weight-bold">Astor Restaurant (Staff House)</label>
                            </div>
                            <div class="col-md-9">
                                <input type="checkbox" onchange="showHide(this,'.astor_options');" name="astor" />
                            </div>
                        </div>

                        <div class="astor_options d-none">
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
                                        <td width="220px" class="mr-5">Lunch (12pm to 2pm)</td>
                                        <td width="90px;"><input type="time" class="form-control" name="astor_lunch" /></td>
                                        <td width="90px"><input class="form-control" name="astor_lunch_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td width="220px" class="mr-5">Dinner (3pm to 6pm)</td>
                                        <td width="90px;"><input type="time" class="form-control" name="astor_dinner" /></td>
                                        <td width="90px"><input class="form-control" name="astor_dinner_delegates" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr />
                        <h3 class="mb-3 font-weight-normal">Off Campus</h3>
                        <h5 class="mb-2">Edgbaston Park Hotel Restaurant (1900 Bar & Grill)</h5>

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label font-weight-bold">Main Restaurant</label>
                            </div>
                            <div class="col-md-9">
                                <input type="checkbox" onchange="showHide(this,'.main_options');" name="main" />
                            </div>
                        </div>

                        <div class="main_options d-none">
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
                                        <td width="220px" class="mr-5">Breakfast (7am to 10pm) </td>
                                        <td width="90px;"><input type="time" class="form-control" name="main_breakfast" /></td>
                                        <td width="90px"><input class="form-control" name="main_breakfast_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td width="220px" class="mr-5">Lunch (12pm onwards)</td>
                                        <td width="90px;"><input type="time" class="form-control" name="main_lunch" /></td>
                                        <td width="90px"><input class="form-control" name="main_lunch_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td width="220px" class="mr-5">Dinner (6pm to 11pm)</td>
                                        <td width="90px;"><input type="time" class="form-control" name="main_dinner" /></td>
                                        <td width="90px"><input class="form-control" name="main_dinner_delegates" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label font-weight-bold">Buffet Lunch</label>
                            </div>
                            <div class="col-md-9">
                                <input type="checkbox" onchange="showHide(this,'.buffet_options');" name="buffet" />
                            </div>
                        </div>

                        <div class="buffet_options d-none">
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
                                        <td width="220px" class="mr-5">Lunch (12pm to 3pm)</td>
                                        <td width="90px;"><input type="time" class="form-control" name="buffet_lunch" /></td>
                                        <td width="90px"><input class="form-control" name="buffet_lunch_delegates" /></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label font-weight-bold">Private Dining</label>
                            </div>
                            <div class="col-md-9">
                                <input type="checkbox" onchange="showHide(this,'.private_options');" name="private" />
                            </div>
                        </div>

                        <div class="private_options d-none">
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
                                        <td width="220px" class="mr-5">Breakfast</td>
                                        <td width="90px;"><input type="time" class="form-control" name="private_breakfast" /></td>
                                        <td width="90px"><input class="form-control" name="private_breakfast_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td width="220px" class="mr-5">Lunch</td>
                                        <td width="90px;"><input type="time" class="form-control" name="private_lunch" /></td>
                                        <td width="90px"><input class="form-control" name="private_lunch_delegates" /></td>
                                    </tr>
                                    <tr>
                                        <td width="220px" class="mr-5">Dinner</td>
                                        <td width="90px;"><input type="time" class="form-control" name="private_dinner" /></td>
                                        <td width="90px"><input class="form-control" name="private_dinner_delegates" /></td>
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
                                <textarea name="special" class="form-control" style="height: 100px;" ></textarea>
                            </div>
                        </div>

                        <hr />

                        <div class="form-group row">
                            <div class="col-md-3">
                                <label class="control-label">Add a Note</label>
                            </div>
                            <div class="col-md-9">
                                <input name="note" class="form-control" />
                            </div>
                        </div>


                    </div>
                    <hr>
                    <div class="pull-left mt-3 mb-3 ml-2">
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

        function showHide(check,div){
            if($(check).prop('checked')){
                $(div).removeClass('d-none')
            }
            else{
                $(div).addClass('d-none')
            }
        }

        function submitOrder(){
            var data = $('.form').serialize();

            Swal.showLoading();

            $.post("{{ route('catering.store') }}",data,function(response){
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
