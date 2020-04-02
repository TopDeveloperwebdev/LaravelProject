@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="user-data p-3">
            <h3 class="title-5 m-b-20">New Department</h3>
                <form action="/departments" method="post" class="form">
                    <div class="col-md-10">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Department Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="name" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Abbreviated Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="short_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Project Number</label>
                            </div>
                            <div class="col-md-8">
                                <input name="project_number" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Cost Centre</label>
                            </div>
                            <div class="col-md-8">
                                <input name="cost_centre" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Task Number</label>
                            </div>
                            <div class="col-md-8">
                                <input name="task_number" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Activity</label>
                            </div>
                            <div class="col-md-8">
                                <input name="activity" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Source of Funds</label>
                            </div>
                            <div class="col-md-8">
                                <input name="source_of_funds" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Old Project Code</label>
                            </div>
                            <div class="col-md-8">
                                <input name="old_project_code" class="form-control" />
                            </div>
                        </div>

                        <hr>
                        <b>Address</b>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Building Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="building_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Address Line 1</label>
                            </div>
                            <div class="col-md-8">
                                <input name="address1" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Address Line 2</label>
                            </div>
                            <div class="col-md-8">
                                <input name="address2" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Address Line 3</label>
                            </div>
                            <div class="col-md-8">
                                <input name="address3" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">City</label>
                            </div>
                            <div class="col-md-8">
                                <input name="city" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Postcode</label>
                            </div>
                            <div class="col-md-8">
                                <input name="postcode" class="form-control" />
                            </div>
                        </div>

                    </div>
                       <hr>
                    <div class="col-md-12 pull-left mb-3">

                            <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')

@endsection
