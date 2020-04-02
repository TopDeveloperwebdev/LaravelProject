@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
                <div class="user-data p-3">
                    <!-- DATA TABLE -->
                    <a href="/departments/create" class="btn btn-primary btn-sm pull-right mr-3"><i class="fa fa-user-plus"></i> Add</a>
                    <h3 class="title-5 mb-4">Departments</h3>

                    <div class="table-responsive table-responsive-data2 m-b-30">
                        <table class="table table-data2 mt-10">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Short Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $d)
                                    <tr>
                                        <td><a href="/departments/{{ $d->id }}">{{ $d->name }}</a></td>
                                        <td>{{ $d->short_name }}</td>
                                        <td class="float-right ml-5 text-right"><a href="{{ url('departments/delete/' . $d->id) }}" class="btn badge badge-danger" style="padding: 7px!important; margin-right: -20px;">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
        </div>

    </div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection
