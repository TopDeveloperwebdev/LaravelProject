@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="user-data p-3">
            <h3 class="title-5 m-b-20">New Supplier Account</h3><br>
                <form action="" method="post" class="form">
                    <div class="col-md-10">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Project Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="project_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Organisation Type</label>
                            </div>
                            <div class="col-md-8">
                                <input name="organisation_type" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Organisation Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="organisation_name" class="form-control" />
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


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Telephone</label>
                            </div>
                            <div class="col-md-8">
                                <input name="telephone" class="form-control" />
                            </div>
                        </div>

                        <hr>

                        <h5>Main Contact:</h5>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Job Title</label>
                            </div>
                            <div class="col-md-8">
                                <input name="job_title" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Direct Dial</label>
                            </div>
                            <div class="col-md-8">
                                <input name="direct_dial" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Mobile Number</label>
                            </div>
                            <div class="col-md-8">
                                <input name="mobile_num" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Login Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="email" class="form-control" />
                                </div>
                            </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>


                    </div>
                    <div class="col-md-12 pull-left mb-3">
                        <hr>
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