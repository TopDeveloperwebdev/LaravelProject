@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
                <div class="user-data p-3" style="border: 1px solid #e0e0e0;">
                    <!-- DATA TABLE -->
                    <div class="pull-right">
                        <a href="/accounts/requisitioner/create" class="btn btn-primary btn-sm btn-120"><i class="fa fa-plus"></i> Requisitioner</a>
                    </div>

                    <h3 class="title-5">User Accounts</h3>

                    <div class="table-responsive">
                        <table class="table table-striped mt-10">
                            <thead>
                                <tr>
                                    <th width="490">Name</th>
                                    <th width="505">Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td width="480"><a href="{{ url('/accounts/' . $user->id) }}">{{ $user->name }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td class="pull-right"><a href="{{ url('account/delete/' . $user->id) }}" class="btn badge badge-danger" style="padding: 7px!important;">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
        </div>


        <div class="col-md-12 mt-4">
                <div class="user-data p-3" style="border: 1px solid #e0e0e0;">
                    <!-- DATA TABLE -->
                    <div class="pull-right">
                        <a href="/accounts/admin/create" class="btn btn-primary btn-sm btn-120"><i class="fa fa-plus"></i> Admin</a>
                    </div>

                    <h3 class="title-5">Admin Accounts</h3>

                    <div class="table-responsive">
                        <table class="table table-striped mt-10">
                            <thead>
                                <tr>
                                    <th width="490">Name</th>
                                    <th width="505">Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $user)
                                    <tr>
                                        <td width="470"><a href="{{ url('accounts/' . $user->id) }}">{{ $user->name }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td class="pull-right"><a href="{{ url('account/delete/' . $user->id) }}" class="btn badge badge-danger" style="padding: 7px!important;">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
        </div>


        <div class="col-md-12 mt-4">
                <div class="user-data p-3" style="border: 1px solid #e0e0e0;">
                    <!-- DATA TABLE -->
                    <div class="pull-right">
                        <a href="/accounts/partner/create" class="btn btn-primary btn-sm btn-120"><i class="fa fa-plus"></i> Partner</a>
                    </div>

                    <h3 class="title-5">Partner Accounts</h3>

                    <div class="table-responsive">
                        <table class="table table-striped mt-10">
                            <thead>
                                <tr>
                                    <th width="490">Name</th>
                                    <th width="505">Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($partners as $user)
                                    <tr>
                                        <td width="480"><a href="{{ url('accounts/partner/' . $user->id) }}">{{ $user->name }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td class="pull-right"><a href="{{ url('account/delete/' . $user->id) }}" class="btn badge badge-danger" style="padding: 7px!important;">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
        </div>

        <div class="col-md-12 mt-4">
                <div class="user-data p-3" style="border: 1px solid #e0e0e0;">
                    <!-- DATA TABLE -->
                    <div class="pull-right">
                        <a href="/accounts/supplier/create" class="btn btn-primary btn-sm btn-120"><i class="fa fa-plus"></i> Supplier</a>
                    </div>

                    <h3 class="title-5">Supplier Accounts</h3>

                    <div class="table-responsive">
                        <table class="table table-striped mt-10">
                            <thead>
                                <tr>
                                    <th width="490">Name</th>
                                    <th width="505">Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $user)
                                    <tr>
                                        <td><a href="{{ url('accounts/supplier/' . $user->id) }}">{{ $user->name }}</a></td>
                                        <td>{{ $user->email }}</td>
                                        <td class="pull-right"><a href="{{ url('account/delete/' . $user->id) }}" class="btn badge badge-danger" style="padding: 7px!important;">Delete</a></td>
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
