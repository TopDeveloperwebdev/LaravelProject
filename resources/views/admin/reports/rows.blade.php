<div class="row">

        <div class="col-md-12">
                <div class="">
                    <!-- DATA TABLE -->
                    @if($rows['catalogue']->count())
                    <h5 class="sub-cat">Catalogue</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Requisition No</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows['catalogue'] as $item)
                                    <tr onclick="window.location='/catalogue/{{ $item->order_id }}';">
                                        <td>{{ $item->requisition_no }}</td>
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->admin->name }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->requisitioner->department->short_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    @endif

                    @if($rows['noncatalogue']->count())
                    <h5 class="sub-cat">Non Catalogue</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Requisition No</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows['noncatalogue'] as $item)
                                    <tr onclick="window.location='/none-catalogue/{{ $item->order_id }}';">
                                        <td>{{ $item->requisition_no }}</td>
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->admin->name }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->requisitioner->department->short_name ?? '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($rows['travel']->count())
                    <h5 class="sub-cat">Key Travel</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>KT Trip ID</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requistisioner</th>
                                    <th>Travel Date</th>
                                    <th>Type</th>
                                    <th>Destination</th>
                                    <th>Value</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows['travel'] as $order)
                                    @foreach($order->childRows as $item)
                                    <tr onclick="window.location='/key-travel/{{ strtolower($order->type) }}/{{ $order->order_id }}'">
                                        <td>{{ $item->key_travel_id }}</td>
                                        <td>{{ $order->created_at->format('d/m/y') }}</td>
                                        <td>{{ $order->admin->name }}</td>
                                        <td>{{ $order->requisitioner->name }}</td>
                                        <td>{{ $item->travel_date }}</td>
                                        <td>{{ $order->type }}</td>
                                        <td>{{ $item->destination }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>{{ $order->requisitioner->department->short_name }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    @endif

                    @if($rows['carhire']->count())
                    <h5 class="sub-cat">Car Hire</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Travel Date</th>
                                    <th>Total</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows['carhire'] as $item)
                                    <tr onclick="window.location='/car-hire/{{ $item->order_id }}';">
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->admin->name }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->requisitioner->department->short_name ?? ''}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($rows['catering']->count())
                    <h5 class="sub-cat">Catering</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requisitioner</th>
                                    <th>Event Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows['catering'] as $item)
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

                    @if($rows['stores']->count())
                    <h5 class="sub-cat">Stores</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Total</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows['stores'] as $item)
                                        <tr onclick="window.location='/stores/{{ $item->order_id }}';">
                                            <td>{{ $item->created_at->format('d/m/y') }}</td>
                                            <td>{{ $item->admin->name }}</td>
                                            <td>{{ $item->requisitioner->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->total }}</td>
                                            <td>{{ $item->requisitioner->department->short_name }}</td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($rows['training']->count())
                    <h5 class="sub-cat">Training</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows['training'] as $item)
                                    <tr onclick="window.location='/training/{{ $item->order_id }}';">
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->admin->name }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>{{ $item->requisitioner->department->short_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($rows['expenses']->count())
                    <h5 class="sub-cat">Expenses</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows['expenses'] as $item)
                                    <tr onclick="window.location='/expenses/{{ $item->order_id }}';">
                                        <td>{{ $item->start_date }}</td>
                                        <td>{{ $item->admin->name }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->requisitioner->department->short_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                </div>
        </div>

    </div>
