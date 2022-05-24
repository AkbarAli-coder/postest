@extends('layouts.app')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid mb-4">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">


                                @csrf
                                <div class="card-body">

                                    <div class="form-row justify-content-center">
                                        <div class="col-lg-3">
                                            <div class="from-group">
                                                <div class="form-group">
                                                    <label for="date">Date <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" name="date" id="date"
                                                        required value="{{ now()->format('Y-m-d') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="status">Status <span class="text-danger">*</span></label>
                                                <select name="product_id" id="product_id" class="form-control product_id" >
                                                            <option value="">Select Product</option>
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}" id="product_name">{{ $product->product_name }}</option>


                                                            @endforeach
                                                </select>
                                            </div>

                                        </div>


                                                <input type="hidden" name="product_price" id="product_price" class="form-control product_price" >
                                                <input type="hidden" name="product_stock" id="product_stock" class="form-control" >






                                        <div class="col-lg-3">
                                            <div class="form-group mt-4"">
                                      <a class=" btn btn-primary addeventmore" style="margin-top: 8px;"><i class="fas fa-plus-square"></i> +Add
                                                Item</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="card-body">
                                    <form id="purchase-form" action="{{ route('store') }}" method="POST">
                                       @csrf

                                       <table class="table table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Batch</th>
                                                <th>Unit</th>
                                                <th>Stock</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Promotions</th>
                                                <th>total price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="addRow" class="addRow">

                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td class=" text-right">Sub Total</td>
                                                <td>
                                                    <input type="text" name="estimated_amount" value=""
                                                        id="estimated_amount"
                                                        class="form-control form-control-sm text-right estimated_amount"
                                                        readonly>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Mobile No</td>
                                                <td><input type="text"></td>
                                                <td colspan="4"></td>

                                                <td class=" text-right">Discount </td>
                                                <td>
                                                    <input type="text" name="discount_amount" value="0"
                                                        id="discount_amount"
                                                        class="form-control form-control-sm text-right discount_amount"
                                                        >
                                                </td>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <td>Customer Name</td>
                                                <td><input type="text" name="customer_name"></td>
                                                <td colspan="4"></td>
                                                <td class=" text-right">Total</td>
                                                <td>
                                                    <input type="number" name="net_amount" value="0"
                                                        id="net_amount"
                                                        class="form-control form-control-sm text-right net_amount"
                                                        readonly>
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"></td>


                                                    <td class=" text-right">Paid</td>

                                                <td>
                                                    <input type="text" name="paid_amount" value=""
                                                        id="paid_amount"
                                                        class="form-control form-control-sm text-right paid_amount "
                                                        >
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td class=" text-right">Due</td>
                                                <td>
                                                    <input type="text" onkeyup="calculate()" name="due_amount" value="0"
                                                        id="due_amount"
                                                        class="form-control form-control-sm text-right due_amount "                                                         readonly >
                                                </td>
                                                <td></td>
                                            </tr>
                                        </tbody>

                                    </table>


                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary" id="storeButton">
                                            Create Invoice <i class="bi bi-check"></i>
                                        </button>
                                    </div>


                                    </form>
                                </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->



@endsection
@push('js')

<script id="document-template" type="text/x-handlebars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
    <input type="hidden" name="date[]" value="@{{ date }}">

      <td>
        <input type="hidden" name="product_name[]" value="@{{ product_name }}">
        <input type="hidden" name="product_id[]" value="@{{ product_id }}">

        @{{product_name}}
    </td>
    <td>
            <select name="batch[]" id="" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
    </td>
    <td>
            <select name="Unit[]" id="" class="form-control">
                <option value="1">Pack</option>
                <option value="2">Pics</option>

            </select>
    </td>
    <td>
        <input type="number" class="form-control" name="product_stock[]" value="@{{ product_stock  }}" readonly >

    </td>
    <td>
        <input type="number" class="form-control product_price" name="product_price[]" value="@{{ product_price }}"  >

    </td>
    <td>
        <input type="number" min="1" class="form-control sale_qty"  name="sale_qty[]" value="1" >
    </td>
<td>
    <input type="number" class="form-control" name="promotions[]" value="0" >

</td>


    <td>
        <input name="item_subtotal[]" value="0"  class="form-control item_subtotal text-right" readonly>
    </td>
    <td>
        <i class="btn btn-warning btn-sm fa fa-window-close removeeventmore"></i>
    </td>

</tr>
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("click", ".addeventmore", function () {

            var date = $('#date').val();
            var product_id = $('#product_id').val();
            var product_price = $('#product_price').val();
            var product_stock = $('#product_stock').val();
            var product_name = $("#product_id option:selected").text();




        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var data = {
                date: date,
                product_id: product_id,
                product_name: product_name,
                product_price:product_price,
                product_stock:product_stock
            };
            var html = template(data);
            $("#addRow").append(html);
        });


        $(document).on("click", ".removeeventmore", function (event) {
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();
        });

        $(document).on('ready keyup click', '.product_price,.sale_qty', function () {
            var product_price = $(this).closest("tr").find("input.product_price").val();
            var qty = $(this).closest("tr").find("input.sale_qty").val();
            var total = product_price * qty;
            $(this).closest("tr").find("input.item_subtotal").val(total);
            totalAmountPrice();
        });

        function totalAmountPrice() {
            var sum = 0;
            $(".item_subtotal").each(function () {
                var value = $(this).val();
                if (!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
            });
            $('#estimated_amount').val(sum);
            $('#net_amount').val(sum);
        }

// Discount calulation

        $(document).on('keyup keydown', 'estimated_amount,.discount_amount', function () {

            var amount = $('#estimated_amount').val();
            var dis = $('#discount_amount').val();
           if(dis > 0)

                var net = amount - dis;
            $('#net_amount').val(net);



        });


// Due amount calculation

    $(document).on('keyup', '.net_amount,.paid_amount', function () {
            var amount = $('#net_amount').val();
            var paid_amount = $('#paid_amount').val();
            if(paid_amount > 0)
            var net = amount - paid_amount;
            $('#due_amount').val(net);

        });

    });




</script>




<script type="text/javascript">
$(function () {
  $(document).on('change','#product_id',function(){
    var product_id = $(this).val();

    $.ajax({
        url:"{{ route('getproduct') }}",
        type:'GET',
        data:{product_id:product_id},

        success:function(data){
            $('#product_price').val(data.product_price);
            $('#product_stock').val(data.product_stock);

        }

    });
  });
});
</script>


@endpush
