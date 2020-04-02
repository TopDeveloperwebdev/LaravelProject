@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
        <div class="col-md-10">
            <div class="">
            <h3 class="title-5 m-b-20">Expenses</h3>
                <form class="form">
                    
                        @csrf

                        <div class="form-group row">
                         <div class="col-md-3">
                            <label class="control-label">Travel UK</label>
                            </div>
                            
 
                            <div class="col-md-8">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend" style="height: 30px;">
                                        <div class="input-group-text">£</div>
                                    </div>
                                    <input onkeyup="totals();" name="travel_uk" class="form-control val" />
                                </div>
                            
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Subsistence UK</label>
                            </div>
                            <div class="col-md-8">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend" style="height: 30px;">
                                        <div class="input-group-text">£</div>
                                    </div>
                                    <input onkeyup="totals();" name="subsistence_uk" class="form-control val" />
                                </div>

                                </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Travel Overseas</label>
                            </div>
                            <div class="col-md-8">
                           
                            <div class="input-group mb-2">
                                    <div class="input-group-prepend" style="height: 30px;">
                                        <div class="input-group-text">£</div>
                                    </div>
                                    <input onkeyup="totals();" name="travel_overseas" class="form-control val" />
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Subsistence Overseas</label>
                            </div>
                            <div class="col-md-8">
                            {{-- <input onkeyup="totals();" name="subsistence_overseas" class="form-control val" /> --}}
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend" style="height: 30px;">
                                    <div class="input-group-text">£</div>
                                    </div>
                                    <input onkeyup="totals();" type="text" class="form-control val" name="subsistence_overseas" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Total</label>
                            </div>
                            <div class="col-md-8">
                            {{-- <input name="total" class="form-control total" /> --}}
                            <div class="input-group mb-2">
                                    <div class="input-group-prepend" style="height: 30px;">
                                    <div class="input-group-text">£</div>
                                    </div>
                                    <input type="text" class="form-control total" name="total" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Currency</label>
                            </div>
                            <div class="col-md-8">
                            <select name="currency" class="form-control" style="height: 30px;">
                                <option value="GBP">GBP</option>
                                <option value="EUR">EUR</option>
                                <option value="USD">USD</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Start Date</label>
                            </div>
                            <div class="col-md-8">
                            <input name="start_date" type="date" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">General Description</label>
                            </div>
                            <div class="col-md-8">
                            <input name="description" class="form-control" />
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                        <div class="col-md-3">
                            <label class="control-label">Add a Note</label>
                            </div>
                            <div class="col-md-8">
                            <input name="note" class="form-control" />
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="pull-left mb-3">
                     
                            <button type="button" onclick="submitOrder();" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
    <script>


        function submitOrder(){
            var data = $('.form').serialize();

            Swal.showLoading();

            $.post("{{ route('expenses.store') }}",data,function(response){
                Swal.close();
                if(response.success){
                    Swal.fire(
                        'Success',
                        'Order has been placed',
                        'success'
                    ).then((result) => {
                        window.location = '/';
                    });
                }
            }).fail(function(xhr,status,error){
                Swal.close();
            });

        }

        function totals() {
            var total = 0;

            $('.val').each(function(){
                if($(this).val()){
                    total+=parseFloat($(this).val());
                }
            });

            $('.total').val(total.toFixed(2));
        }
    </script>
@endsection
