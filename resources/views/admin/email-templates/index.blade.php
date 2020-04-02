@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <h3 class="title-5 m-b-20">Email Templates</h3>
            </div>

            <div class="pull-right">
                <a href="{{ url('email-templates/create') }}" class="btn btn-primary btn-sm btn-120"><i class="fa fa-plus"></i> New Template</a>
            </div>
        </div>

        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Template Name</th>
                        <th>Subject</th>
                        <th>Created At</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($templates as $template)
                    <tr>
                        <td><a href="{{ url('email-templates/edit/'. $template->id) }}">{{ $template->name }}</a></td>
                        <td>{{ $template->subject }}</td>
                        <td>{{ $template->created_at->format('d/m/y') }}</td>
                    </tr>
                </tbody>
                @empty
                    <tr><td>Nothing to display</td></tr>
                @endforelse
            </table>
        </div>
    </div>
</div>

@endsection