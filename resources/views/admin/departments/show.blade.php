@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">

            @if(isset($updated) && $updated)
            <div class="alert alert-success">
                Department Details Updated.
            </div>
            @endif

            <div class="user-data p-3">
            <h3 class="title-5 m-b-20">Department</h3>
                <form action="/departments/{{ $department->id }}" method="post" class="form">
                    <div class="col-md-10">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Department Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->name }}" name="name" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Abbreviated Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->short_name }}" name="short_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Project Number</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->project_number }}" name="project_number" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Cost Centre</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->cost_centre }}" name="cost_centre" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Task Number</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->task_number }}" name="task_number" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Activity</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->activity }}" name="activity" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Source of Funds</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->source_of_funds }}" name="source_of_funds" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Old Project Code</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->old_project_code }}" name="old_project_code" class="form-control" />
                            </div>
                        </div>

                        <hr>
                        <b>Address</b>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Building Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->building_name }}" name="building_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Address Line 1</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->address1 }}" name="address1" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Address Line 2</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->address2 }}" name="address2" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Address Line 3</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->address3 }}" name="address3" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">City</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->city }}" name="city" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Postcode</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $department->postcode }}" name="postcode" class="form-control" />
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
