@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="">
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-20">Non Catalogue</h3>
                <div class="table-responsive table-responsive-data2 m-b-20">

                    <form class="supplier_form">
                        <div class="checkbox row">
                            <div class="col-md-2">
                                <label>New Supplier</label>
                            </div>
                            <div class="col-md-5">
                                <input name="new_supplier" onchange="toggleSupplierInfo($(this).prop('checked'));" type="checkbox" />
                            </div>
                        </div>

                        <div class="supplier_info">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label class="control-label">Supplier Name</label>
                                </div>
                                <div class="col-md-5">
                                    <input name="supplier" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label class="control-label">Contact Name</label>
                                </div>
                                <div class="col-md-5">
                                    <input name="contact_name" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label class="control-label">Supplier Email</label>
                                </div>
                                <div class="col-md-5">
                                    <input name="supplier_email" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label class="control-label">Supplier Tel</label>
                                </div>
                                <div class="col-md-5">
                                    <input name="supplier_tel" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </form>

                    <table class="table table-data2 orders-table">
                        <thead>
                            <tr>
                                <th>Item No/Code</th>
                                <th>Supplier</th>
                                <th>Item Description</th>
                                <th>Item URL</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Price (Inc. VAT)</th>
                                <th class="text-center">Currency</th>
                                <th class="text-center">Total</th>
                                <th>Notes</th>
                                <th>Attachments</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="11"><button onclick="addRow();" class="btn btn-primary btn-round"><i class="fa fa-plus"></i></button></td>
                            </tr>
                            {{-- <tr>
                                <td colspan="11" class=""><button onclick="submitOrder();" class="float-right btn btn-primary d-none submit">Submit Order</button></td>
                            </tr> --}}
                        </tfoot>
                    </table>
                    <div class="d-flex justify-content-end mt-3"  style="margin-right: 70px;">
                        <button onclick="submitOrder();" class="btn btn-primary d-none submit">Submit Order</button>
                    </div>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
    <script>
        function addRow(){

            $('.orders-table tbody').append(
            '<tr>'+
                '<td width="10%"><input class="form-control" /></td>'+
                '<td width="10%"><input class="form-control" /></td>'+
                '<td width="15%"><input class="form-control" /></td>'+
                '<td width="10%"><input class="form-control" /></td>'+
                '<td width="5%"><input onkeyup="qty(this);" value="1" class="form-control" /></td>'+
                '<td width="6%" ><input onkeyup="totals(this);" class="form-control" /></td>'+
                '<td width="8%"><select class="form-control" style="height: 30px;"><option value="GBP">GBP</option><option value="EUR">EUR</option><option value="USD">USD</option></select></td>'+
                '<td width="6%" class="text-center total">0.00</td>'+
                '<td width="8%"><input class="form-control" /></td>'+
                '<td class=""><input class="files" multiple type="file" style="width: 190px!important; "/></td>'+
                '<td class="text-right">'+
                    '<button onclick="removeRow(this);" class="btn btn-danger btn-round btn-sm"><i class="fa fa-times"></i></button>'+
                '</td>'+
            '</tr>'
            );
            $('.submit').removeClass('d-none').addClass('d-block');
        }

        function removeRow(item){

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Remove'
                }).then((result) => {
                if (result.value) {
                    $(item).closest('tr').remove();
                    if($('.orders-table tbody tr').length == 0){
                        $('.submit').removeClass('d-block').addClass('d-none');
                    }
                }
            })

        }

        function submitOrder(){
            var items = [];

            var supplier = { };

            $.each($('.supplier_form').serializeArray(), function() {
                supplier[this.name] = this.value;
            });

            supplier['new_supplier'] = supplier.hasOwnProperty('new_supplier') ? 1 : 0;

            var formData = new FormData();
            formData.append('_token','{{ csrf_token() }}');

            $('.orders-table tbody tr').each(function(index, row){

                formData.append('item['+index+'][item_no]', $(row).find('td').eq(0).find('input').val());
                formData.append('item['+index+'][supplier]', supplier['supplier'] || $(row).find('td').eq(1).find('input').val());
                formData.append('item['+index+'][description]', $(row).find('td').eq(2).find('input').val());
                formData.append('item['+index+'][item_url]', $(row).find('td').eq(3).find('input').val());
                formData.append('item['+index+'][qty]', $(row).find('td').eq(4).find('input').val());
                formData.append('item['+index+'][price]', $(row).find('td').eq(5).find('input').val());
                formData.append('item['+index+'][currency]', $(row).find('td').eq(6).find('select').val());
                formData.append('item['+index+'][total]', $(row).find('td').eq(7).html());
                formData.append('item['+index+'][note]', $(row).find('td').eq(8).find('input').val());
                formData.append('item['+index+'][new_supplier]', supplier['new_supplier']);
                formData.append('item['+index+'][contact_name]', supplier['contact_name']);
                formData.append('item['+index+'][supplier_email]', supplier['supplier_email']);
                formData.append('item['+index+'][supplier_tel]', supplier['supplier_tel']);

                var files = $(row).find('td').eq(9).find('input')[0].files;

                $.each(files,function(index2,file){
                    formData.append('item['+index+'][file]['+index2+']', file);
                })

            });

            Swal.showLoading();

            $.ajax({
                url: "{{ route('none-catalogue.store') }}",
                type:"POST",
                processData:false,
                contentType: false,
                data: formData,
                complete: function(response){
                    Swal.close();
                    if(response.responseJSON.success){
                        Swal.fire(
                            'Success',
                            'Order has been placed',
                            'success'
                        ).then((result) => {
                            window.location = '/home';
                        });
                    }
                },
                error: function(xhr,status,error){
                    console.log(error);
                    Swal.close();
                }
            });

            return;

        }

        function qty(item){
            var qty = parseFloat($(item).val());
            var val = parseFloat($(item).closest('tr').find('td').eq(5).find('input').val());
            var total = val*qty;
            $(item).closest('tr').find('.total').html(total.toFixed(2));
        }

        function totals(item){
            var val = parseFloat($(item).val());
            var qty = parseFloat($(item).closest('tr').find('td').eq(4).find('input').val());
            var total = val*qty;
            $(item).closest('tr').find('.total').html(total.toFixed(2));
        }

        $(function(){
            addRow();
        })

        function showFiles(){
            var dialog = bootbox.dialog({
                message: '<h4>Attachments</h4><br><ul class="list-group"><li class="list-group-item">file 1</li><li class="list-group-item">file 2</li></ul>',
                closeButton: true,
            });
        }

        $('.supplier_info').hide();

        function toggleSupplierInfo(value){
            if(value){
                $('.supplier_info').show();
            }
            else{
                $('.supplier_info').hide();
            }
        }
    </script>
@endsection
