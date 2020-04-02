@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">

        @if(isset($updated) && $updated)
        <div class="alert alert-success">
            Partner Details Updated.
        </div>
        @endif


            <div class="user-data p-3">
            <h3 class="title-5 m-b-20">Partner Account</h3><br>
                <form action="" method="post" class="form">
                    <div class="col-md-10">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Project Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->project_name }}" name="project_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Project Role</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->partnerInfo->project_role }}" name="project_role" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Grant Administered By</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->partnerInfo->grant_administered_by }}" name="grant_administered_by" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Organisation Size</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->partnerInfo->organisation_size }}" name="organisation_size" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Organisation Type</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->partnerInfo->organisation_type }}" name="organisation_type" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Cost Category Type</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->partnerInfo->cost_category_type }}" name="cost_category_type" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Organisation Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->partnerInfo->organisation_name }}" name="organisation_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Address Line 1</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->partnerInfo->address1 }}" name="address1" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Address Line 2</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->partnerInfo->address2 }}" name="address2" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">City</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->partnerInfo->city }}" name="city" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Postcode</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->partnerInfo->postcode }}" name="postcode" class="form-control" />
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Telephone</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->telephone }}" name="telephone" class="form-control" />
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
                                <input value="{{ $user->job_title }}" name="job_title" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Email</label>
                            </div>
                            <div class="col-md-8">
                                <input disabled value="{{ $user->email }}" name="email" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Direct Dial</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->partnerInfo->direct_dial }}" name="direct_dial" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Mobile Number</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->mobile_num }}" name="mobile_num" class="form-control" />
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <p>To change password insert new password below, else leave blank.</p>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">New Password</label>
                            </div>
                            <div class="col-md-8">
                                <input name="password" class="form-control" />
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 pull-left mb-3">
                        <hr>
                            <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')

@endsection