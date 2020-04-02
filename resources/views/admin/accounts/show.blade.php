@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">



        <div class="col-md-12">

        @if(isset($updated) && $updated)
        <div class="alert alert-success">
            User Details Updated.
        </div>
        @endif

            <div class="user-data p-3">
            <h3 class="title-5 m-b-20">User Account</h3>
                <form action="/accounts/{{ $user->id }}" method="post" class="form" enctype="multipart/form-data">
                    <div class="col-md-10">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Project Number</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->project_num }}" name="project_num" class="form-control" />
                            </div>
                        </div>


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
                                <label class="control-label">Name</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->name }}" name="name" class="form-control" />
                            </div>
                        </div>

                        <hr>

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
                                <label class="control-label">Uob Alias</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->uob_alias }}" name="uob_alias" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Email</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->email }}" name="email" class="form-control" />
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

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Mobile Number</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->mobile_num }}" name="mobile_num" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Primary Department Location</label>
                            </div>
                            <div class="col-md-8">
                                <select onchange="setData(this.value);" name="primary_department_location_id" class="form-control">
                                    <option value="0">Select Department</option>
                                    @foreach($departments as $d)
                                        <option {{ $user->primary_department_location_id==$d->id ? 'selected' : '' }} value="{{ $d->id }}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Location Details</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->department->delivery_location ?? '' }}" disabled class="form-control location" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Cost Code</label>
                            </div>
                            <div class="col-md-8">
                                <input value="{{ $user->department->cost_centre ?? '' }}" disabled class="form-control cost_code" />
                            </div>
                        </div>

                        @if($user->is_admin)
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Signature</label>
                            </div>
                            <div class="col-md-8 signature">
                                @if($user->signature)
                                    <img style="max-width:200px;" src="/users/signatures/{{ $user->id }}" />
                                    <i onclick="removeSignature();" class="fa fa-times text-danger"></i>
                                @else
                                    <input type="file" name="signature" />
                                @endif
                            </div>
                        </div>
                        @endif

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
<script>
    var departments = {!! $departments !!};
    function setData(id){
        $('.cost_code').val('');
        $('.location').val('');
        $.each(departments,function(){
            if(this.id == id){
                $('.cost_code').val(this.cost_centre);
                var address = this.building_name ? this.building_name + ', ' : '';
                    address += this.address1 ? this.address1 + ', ' : '';
                    address += this.address2 ? this.address2 + ', ' : '';
                    address += this.address3 ? this.address3 + ', ' : '';
                    address += this.city ? this.city + ', ' : '';
                    address += this.postcode ? this.postcode + ', ' : '';
                    address += this.address3 ? this.address3 : '';

                $('.location').val(address);
            }
        });
    }

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