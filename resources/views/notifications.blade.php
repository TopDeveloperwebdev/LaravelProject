@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="title-5 m-b-20">Notifications</h3>
            @if($notifications->count())
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Account</th>
                            <th>Note</th>
                            <th>Created At</th>
                        </tr>
                    </thead>

                    <tbody>
                    
                    @foreach($notifications as $item)
                        <tr>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->user->is_admin  ? 'Admin' : 'Requisitioner' }}</td>
                            <td><a href="{{ $item->url }}">{{ $item->note }}</a></td>
                            <td>{{ $item->created_at->format('d/m/Y - h:m:s A') }}</td>                
                        </tr>
                    @endforeach    
                    </tbody>
                </table>
                <br /><br />
                {{ $notifications->links() }}
            </div>
            @else 
                <p>Nothing to display</p>
            @endif
        </div>
    </div>
</div>

@endsection