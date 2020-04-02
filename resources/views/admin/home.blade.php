@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h3 class="title-5 m-b-20">Pending</h3>
                <div class="">
                    <!-- DATA TABLE -->
                    @if($catPending->count())
                    <h5 class="sub-cat">Catalogue</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requistisioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Department</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($catPending as $order)
                                    @foreach($order as $item)
                                    <tr onclick="window.location='/catalogue/{{ $item->order_id }}'">
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->requisitioner->department->name }}</td>
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
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Department</th>
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
                                        <td>{{ $item->requisitioner->department->name }}</td>
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
                        <table class="table table-striped table-hover">
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
                                        <td>{{ $order->created_at ? $order->created_at->format('d/m/y') : '' }}</td>
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
                        <table class="table table-striped table-hover">
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
                        <table class="table table-striped table-hover">
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
                        <table class="table table-striped table-hover">
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
                        <table class="table table-striped table-hover">
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
                        <table class="table table-striped table-hover">
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






        <div class="col-md-12 mt-1">
            <h3 class="title-5 m-b-20">Processing</h3>
                <div class="">
                    <!-- DATA TABLE -->

                    @if($catProcessing->count())
                    <h5 class="sub-cat">Catalogue</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Requisition No</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Supplier</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Value</th>
                                    <th>Qty Received</th>
                                    <th>Date Received</th>
                                    <th>Notes</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($catProcessing as $order)
                                    @foreach($order as $item)
                                    <tr id="{{ $item->id  }}" onclick="window.location='/catalogue/{{ $order[0]->order_id }}'" data-url="/catalogue/{{ $order[0]->order_id }}/{{ $item->id }}">
                                        <td data-name="requisition_no" onclick="event.cancelBubble=true;editable(this,'text');">{{ $item->requisition_no }}</td>
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->admin->name }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->supplier }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td data-name="qty_received" onclick="event.cancelBubble=true;editable(this,'text');">{{ $item->qty_received }}</td>
                                        <td data-name="received_at" onclick="event.cancelBubble=true;editable(this,'date');">{{ $item->received_at ? $item->received_at->format('d/m/y') : '' }}</td>
                                        <td>{{ $item->notes()->count() }}</td>
                                        <td>
                                        @if($order[0]->file)
                                            <i onclick="event.cancelBubble=true;window.open('/catalogue/{{ $order[0]->order_id }}/{{ $order[0]->id }}/file')" class="fa fa-file-pdf attached" />
                                        @else
                                            -
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    @endif

                    @if($noneCatProcessing->count())
                    <h5 class="sub-cat">Non Catalogue</h5>
                    <div class="table-responsive table-responsive-data2  m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Requisition No</th>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Supplier</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Value</th>
                                    <th>Qty Received</th>
                                    <th>Date Received</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($noneCatProcessing as $order)
                                    @foreach($order as $item)
                                    <tr onclick="window.location='/none-catalogue/{{ $item->order_id }}'" data-url="/none-catalogue/{{ $item->order_id }}/{{ $item->id }}">
                                    <td data-name="requisition_no" onclick="event.cancelBubble=true;editable(this,'text');">{{ $item->requisition_no }}</td>
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->admin->name }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->supplier }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td data-name="qty_received" onclick="event.cancelBubble=true;editable(this,'text');">{{ $item->qty_received }}</td>
                                        <td data-name="received_at" onclick="event.cancelBubble=true;editable(this,'date');">{{ $item->received_at }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($keyTravelProcessing->count())
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
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($keyTravelProcessing as $order)
                                    @foreach($order->childRows as $item)
                                    <tr id="{{ $order->id }}" onclick="window.location='/key-travel/{{ strtolower($order->type) }}/{{ $order->order_id }}'" data-url="/key-travel/{{ strtolower($order->type) }}/{{ $order->order_id }}/{{ $item->id }}">
                                        <td data-name="key_travel_id" onclick="event.cancelBubble=true;editable(this,'text');">{{ $item->key_travel_id }}</td>
                                        <td>{{ $order->created_at->format('d/m/y') }}</td>
                                        <td>{{ $order->admin->name }}</td>
                                        <td>{{ $order->requisitioner->name }}</td>
                                        <td>{{ $item->travel_date }}</td>
                                        <td>{{ $order->type }}</td>
                                        <td>{{ $item->destination }}</td>
                                        <td data-name="value" onclick="event.cancelBubble=true;editable(this,'text');">{{ $item->value }}</td>
                                        <td>{{ $item->notes()->count() }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                    @endif


                    @if($carHireProcessing->count())
                    <h5 class="sub-cat">Car Hire</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Travel Date</th>
                                    <th>Value</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carHireProcessing as $item)
                                    <tr onclick="window.location='/car-hire/{{ $item->order_id }}'" data-url="/car-hire/{{ $item->order_id }}">
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->admin->name }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->start_date }}</td>
                                        <td data-name="total" onclick="event.cancelBubble=true;editable(this,'text');">{{ $item->total }}</td>
                                        <td>{{ $item->notes()->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($cateringProcessing->count())
                    <h5 class="sub-cat">Catering</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Event Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cateringProcessing as $item)
                                    <tr onclick="window.location='/catering/{{ $item->order_id }}'">
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->admin->name }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->event_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if($storesProcessing->count())
                    <h5 class="sub-cat">Stores</h5>
                    <div class="table-responsive table-responsive-data2 m-b-20">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Admin</th>
                                    <th>Requisitioner</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Value</th>
                                    <th>Qty Received</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($storesProcessing as $order)
                                    @foreach($order as $item)
                                    <tr onclick="window.location='/stores/{{ $order[0]->order_id }}'" data-url="/stores/{{ $order[0]->order_id }}/{{ $item->id }}">
                                            <td>{{ $item->created_at->format('d/m/y') }}</td>
                                            <td>{{ $item->admin->name }}</td>
                                            <td>{{ $item->requisitioner->name }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td data-name="total" onclick="event.cancelBubble=true;editable(this,'text');">{{ $item->total }}</td>
                                            <td data-name="qty_received" onclick="event.cancelBubble=true;editable(this,'text');">{{ $item->qty_received }}</td>
                                            <td>{{ $item->notes()->count() }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if($trainingProcessing->count())
                    <h5 class="sub-cat">Training</h5>
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
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trainingProcessing as $item)
                                    <tr onclick="window.location='/training/{{ $item->order_id }}'" data-url="/training/{{ $item->order_id }}">
                                        <td data-name="requisition_no" onclick="event.cancelBubble=true;editable(this,'text');">{{ $item->requisition_no }}</td>
                                        <td>{{ $item->created_at->format('d/m/y') }}</td>
                                        <td>{{ $item->admin->name }}</td>
                                        <td>{{ $item->requisitioner->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->value }}</td>
                                        <td>{{ $item->notes()->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(e){
        $('.half-div').css('height',($(window).height()/2)+'px');
    });
    function editable(td, type="text"){
            var val = $(td).html();
            $(td).attr('onclick','event.cancelBubble=true;');
            $(td).html('<input type="'+type+'" id="active-edit" onblur="onEditFinish(this,\''+type+'\');" class="form-control sm" value="'+val+'" />');
            $('#active-edit').focus();
        }
        function onEditFinish(input, type){
            var val = $(input).val();
            var td = $(input).closest('td');
            td.html(val);
            td.attr('onclick','event.cancelBubble=true;editable(this, \''+type+'\');');

            var url = td.closest('tr').attr('data-url');

            var data = { '_token': '{{ csrf_token() }}'};
            td.closest('tr').find('td[data-name]').each(function(){
                data[$(this).attr('data-name')]=$(this).html();
            });

            $.post(url ,data,function(response){  });
        }
</script>
@endsection
