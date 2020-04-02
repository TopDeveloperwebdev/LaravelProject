@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="user-data p-3">
            <h3 class="title-5 m-b-20">New {{ $type }} Account</h3>
                <form action="/accounts" method="post" class="form" enctype="multipart/form-data">
                    <div class="col-md-10">
                        @csrf

                        {!! $input !!}

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Project Number</label>
                            </div>
                            <div class="col-md-8">
                                <input name="project_num" class="form-control" />
                            </div>
                        </div>


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
                                <label class="control-label">Name</label>
                            </div>
                            <div class="col-md-8">
                                <input name="name" class="form-control" />
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

                        <hr>

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
                                <label class="control-label">Uob Alias</label>
                            </div>
                            <div class="col-md-8">
                                <input name="uob_alias" class="form-control" />
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
                                <label class="control-label">Primary Department Location</label>
                            </div>
                            <div class="col-md-8">
                                <select onchange="setData(this.value);" name="primary_department_location_id" class="form-control">
                                    <option value="0">Select Department</option>
                                    @foreach($departments as $d)
                                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Location Details</label>
                            </div>
                            <div class="col-md-8">
                                <input disabled class="form-control location" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Cost Code</label>
                            </div>
                            <div class="col-md-8">
                                <input disabled class="form-control cost_code" />
                            </div>
                        </div>

                        @if($type=="Admin")
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="control-label">Signature</label>
                            </div>
                            <div class="col-md-8">
                                <input type="file" name="signature" />
                            </div>
                        </div>
                        @endif

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
</script>
@endsection