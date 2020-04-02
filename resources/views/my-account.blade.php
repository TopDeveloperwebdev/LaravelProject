@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">

            @if(isset($success) && $success)
            <div class="alert alert-success">
                Account details updated.
            </div>
            @endif

            @if(isset($error) && $error)
            <div class="alert alert-danger">
                An error has occurred account details not updated.
            </div>
            @endif

            <div class="user-data p-3">
            @if(auth()->user()->partner)
            <h3 class="title-5 m-b-20 ml-3">{{ auth()->user()->name }}</h3>
            @else
            <h3 class="title-5 m-b-20">My Account</h3>
            @endif
                @if(auth()->user()->partner)
                    <form  method="POST" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="partner" value="1"> 

                        <div class="col-md-10">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Project Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->project_name }}" name="project_name" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Project Start Date</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->project_start_date }}" name="project_start" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Project Number</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->project_num }}" name="project_num" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Grant Administered by</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->grant_administered_by }}" name="grant_administered_by" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Organisation Type</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->organisation_type }}" name="organisation_type" class="form-control"  disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Organisation Size</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->organisation_size }}" name="organisation_size" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Project Role</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->project_role }}" name="project_role" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Organisation Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->organisation_name }}" name="organisation_name" class="form-control" disabled />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Address Line 1</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->address1 }}" name="address1" class="form-control" disabled />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Address Line 2</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->address2 }}" name="address2" class="form-control" disabled />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">City</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->city }}" name="city" class="form-control" disabled />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Postcode</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->postcode }}" name="postcode" class="form-control" disabled />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Telephone</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->telephone }}" name="telephone" class="form-control" disabled />
                                </div>
                            </div>

                            <h4 class="title-5 m-b-20">Main Contact</h4>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Name</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->name }}" name="name" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Job Title</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->job_title }}" name="job_title" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->email }}" name="email" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Direct Dial</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->partnerInfo->direct_dial }}" name="direct_dial" class="form-control" disabled/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Mobile Number</label>
                                </div>
                                <div class="col-md-8">
                                    <input value="{{ auth()->user()->mobile_num }}" name="mobile_num" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Old Password</label>
                            </div>
                            <div class="col-md-8">
                                <input  type="password" name="old_password" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">New Password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Confirm Password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="password_confirm" class="form-control" />
                            </div>
                        </div>

                        </div>

                        <div class="col-md-12 text-right">
                        <hr>
                        <button class="btn btn-primary">Update</button>
                    </div>
                    </form>
                @else
                <form class="form" method="POST" enctype="multipart/form-data">
                    <div class="col-md-10">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ auth()->user()->name }}" name="name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Email</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ auth()->user()->email }}" name="email" class="form-control" />
                            </div>
                        </div>

                        @if(auth()->user()->is_admin)
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="control-label">Signature</label>
                                </div>
                                <div class="col-md-8 signature">

                                    @if(auth()->user()->signature)
                                        <img style="max-width:500px;" src="/users/signatures/{{ auth()->user()->id }}" />
                                        <i onclick="removeSignature();" class="fa fa-times text-danger"></i>
                                    @else
                                        <input type="file" name="signature" />
                                    @endif
                                </div>
                            </div>
                        @endif

                        <hr>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Old Password</label>
                            </div>
                            <div class="col-md-8">
                                <input  type="password" name="old_password" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">New Password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Confirm Password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="password_confirm" class="form-control" />
                            </div>
                        </div>

                    </div>
                    <hr >
                    <div class="pull-left mt-2 mb-3">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
    <script>
        function removeSignature(){
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
                $('.signature').html('<input type="hidden" name="removeFile" value="1" /><input type="file" name="signature" />');
            }
        });

    }

    </script>
@endsection
