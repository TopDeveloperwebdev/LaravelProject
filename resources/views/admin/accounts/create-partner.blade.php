@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="user-data p-3">
            <h3 class="title-5 m-b-20">New Partner Account</h3><br>
                <form action="" method="post" class="form">
                @csrf
                    <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Project Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="project_name" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Project Start Date</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="project_start" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Project Number</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="project_num" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Grant Administered by</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="grant_administered_by" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Organisation Type</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="organisation_type" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Organisation Size</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="organisation_size" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Project Role</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="project_role" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Organisation Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="organisation_name" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Address Line 1</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="address1" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Address Line 2</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="address2" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">City</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="city" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Postcode</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="postcode" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Telephone</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="telephone" class="form-control" />
                                </div>
                            </div>

                            <h4 class="title-5 m-b-20">Main Contact</h4>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="name" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="username" class="form-control" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Job Title</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="job_title" class="form-control" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Direct Dial</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="direct_dial" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Mobile Number</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="" name="mobile_num" class="form-control" />
                                </div>
                            </div>

                            <hr />

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