@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
                <div class="user-dat">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-20">Pending</h3>
                    @if($catPending->count())
                    <h5 class="sub-cat">Catalogue</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($catPending as $order)
                                    @foreach($order as $item)
                                    <tr onclick="window.location='/catalogue/{{ $order[0]->order_id }}'">
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    @endif

                    @if($noneCatPending->count())
                    <h5 class="sub-cat">Non Catalogue</h5>
                    <div class="table-responsive table-responsive-data2  m-b-20">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($noneCatPending as $order)
                                    @foreach($order as $item)
                                    <tr onclick="window.location='/none-catalogue/{{ $order[0]->order_id }}'">
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($keyTravelPending->count())
                    <h5 class="sub-cat">Key Travel</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requistisioner</th>
                                    <th>Travel Date</th>
                                    <th>Type</th>
                                    <th>Destination</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($keyTravelPending as $order)
                                    @foreach($order->childRows as $item)
                                    <tr onclick="window.location='/key-travel/{{ strtolower($order->type) }}/{{ $order->order_id }}'">
                                        <td>{{ $order->created_at->format('d/m/y') }}</td>
                                        <td>{{ $order->requisitioner->name }}</td>
                                        <td>{{ $item->travel_date }}</td>
                                        <td>{{ $order->type }}</td>
                                        <td>{{ $item->destination }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    @endif


                    @if($carHirePending->count())
                    <h5 class="sub-cat">Car Hire</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requisitioner</th>
                                    <th>Travel Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carHirePending as $item)
                                    <tr onclick="window.location='/car-hire/{{ $item->order_id }}'">
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->start_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if($cateringPending->count())
                    <h5 class="sub-cat">Catering</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requisitioner</th>
                                    <th>Event Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cateringPending as $item)
                                    <tr onclick="window.location='/catering/{{ $item->order_id }}'">
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->event_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if($storesPending->count())
                    <h5 class="sub-cat">Stores</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($storesPending as $order)
                                    @foreach($order as $item)
                                        <tr onclick="window.location='/stores/{{ $item->order_id }}'">
                                            <td>{{ $item->created_at->format('d/m/y') }}</td>
                                            <td>{{ $item->requisitioner->name }}</td>
                                            <td>{{ $item->description }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if($trainingPending->count())
                    <h5 class="sub-cat">Training</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trainingPending as $item)
                                    <tr onclick="window.location='/training/{{ $item->order_id }}'">
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->value }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($expensePending->count())
                    <h5 class="sub-cat">Expenses</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expensePending as $order)
                                    @foreach($order as $item)
                                    <tr onclick="window.location='/expenses/{{ $item->order_id }}'">
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                </div>
        </div>

        </div>
    </div>
</div>
@endsection
