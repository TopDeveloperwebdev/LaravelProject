<link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="user-data p-3">
                <div id="print">
                <div class="row m-b-60 ">
                    <div class="col-md-5">
                        <small>
                            <table class="table table-bordered table-small">
                                <tbody>
                                <tr><td>Requisitioner</td><td>{{ $order->first()->first()->requisitioner->name }}</td></tr>
                                <tr><td>Order Request Date</td><td>{{ $order->first()->first()->created_at->format('d/m/y') }}</td></tr>
                                <tr><td>Order Approve Date</td><td>{{ $order->first()->first()->placed_at->format('d/m/y') }}</td></tr>
                                <tr><td>Administrator</td><td>{{ $order->first()->first()->admin->name }}</td></tr>
                                <tr><td>Department</td><td>{{ $order->first()->first()->requisitioner->department->name }}</td></tr>
                                <tr><td>Dept Cost Centre</td><td>{{ $order->first()->first()->requisitioner->department->cost_centre }}</td></tr>
                                <tr><td>Old Project Code</td><td>{{ $order->first()->first()->requisitioner->department->old_project_code }}</td></tr>
                                <tr><td>Activity</td><td>{{ $order->first()->first()->requisitioner->department->activity }}</td></tr>
                                <tr><td>Source of Funds</td><td>{{ $order->first()->first()->requisitioner->department->source_of_funds }}</td></tr>
                                </tbody>
                            </table>
                        </small>
                    </div>
                    <div class="col-md-5 text-center">
                        <h4 class="text-danger m-t-50">Valid only for:<br>{{ $order->first()->first()->placed_at->format('d/m/y') }}</h4>
                        <br><br>
                        @if($order->first()->first()->admin->signature)
                            Signed:
                            <img width="200px" src="/users/signatures/{{ $order->first()->first()->admin->id }}" />
                        @endif
                    </div>
                </div>

                <div class="table-responsive table-responsive-data2 m-b-20">

                <br><br>
                    <table class="table table-data2 orders-table">
                        <thead>
                            <tr>
                                <th>Item Type</th>
                                <th>Item Description</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $items)
                            @foreach($items as $item)
                                <tr id="{{ $item->id }}" data-price="{{ $item->price }}">
                                    <td>
                                         {{ $item->item_type=="general" ? 'General Consumable' : 'Lab Consumable' }}
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->qty }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
            </div>
        </div>

    </div>
</div>


<script src="/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/vendor/bootstrap-4.1/bootstrap.min.js"></script>
