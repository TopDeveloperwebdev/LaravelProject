@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
                <div class="">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-20">Security</h3>

                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="300">User</th>
                                    <th width="300">Type</th>
                                    <th>IP</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($rows as $row)
                                    {{-- {{ dd($row) }} --}}
                                    <tr>
                                        <td>{{ $row->user->name ? $row->user->name : 'n/a' }}</td>
                                        <td>{{ $row->user->type ? $row->user->type : 'n/a' }}</td>
                                        <td>{{ $row->ip }}</td>
                                        <td>{{ $row->created_at }}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
                            <tfoot>
                                <tr><td>{{ $rows->links() }}</td></tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>

</script>
@endsection
