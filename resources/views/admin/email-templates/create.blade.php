@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <h3 class="title-5 m-b-20">Create Template</h3>
            </div>
        </div>

        <div class="col-md-12">
            <form action="{{ url('email-templates/store') }}" method="post" class="form" enctype="multipart/form-data">
                @csrf

                <div class="col-md-10">
                    <div class="form-group row">
                        <label class="control-label">Name</label>
                        <input value="" name="name" class="form-control" />
                        <small id="nameHelp" class="form-text text-muted">This is only used for reference</small>
                    </div>

                    <div class="form-group row">
                        <label class="control-label">Email Subject</label>
                        <input value="" name="subject" class="form-control" />
                    </div>

                    <div class="form-group row">
                        <label class="control-label">Email Body</label>
                        <textarea class="form-control" name="content" rows="5"></textarea>
                    </div>

                    <div class="form-group row">
                        <label class="control-label">File(s)</label>
                        <input value="" name="file" class="form-control" />
                    </div>
                </div>  

                <hr>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection