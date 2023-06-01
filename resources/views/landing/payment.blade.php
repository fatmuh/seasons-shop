@extends('landing.layouts.app')

@section('content')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(assets/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>CHECKOUT</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                        <form action="{{ route('landing.order') }}" method="post" enctype="multipart/form-data">
                            @method("put")
                            @csrf
                            <input type="hidden" class="form-control" name="users_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" class="form-control" name="product_id" value="{{ $data->id }}">
                            <input type="hidden" class="form-control" name="order_pcs" value="{{ $order_pcs }}">
                            <input type="hidden" class="form-control" name="price_total" value="{{ $total_bayar }}">
                            <input type="hidden" class="form-control" name="status" value="Pending">
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="company">Email</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->email }}" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Phone</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->phone }}" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->address }}" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Waktu Pengambilan <span>*</span></label>
                                    <input type="datetime-local" class="form-control" name="order_time" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Tipe Pembayaran <span>*</span></label>
                                    <select class="w-100" name="type_of_payment">
                                        <option value="Transfer">Transfer</option>
                                        <option value="COD">COD</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Notes <span>*</span></label>
                                    <input type="text" class="form-control" name="notes" value="" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Bukti Transfer <span>(Optional)</span></label>
                                    <input type="file" class="form-control" name="proof_of_payment" value="">
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                            <li><span>Product</span> <span>Total</span></li>
                            <li><span>{{ $data->product_name }}</span> <span>{{ "Rp ".number_format($data->price,2,',','.') }}</span></li>
                            <li><span>Jumlah Pembelian : {{ $order_pcs }}</span> <span>{{ "Rp ".number_format($total_bayar,2,',','.') }}</span></li>
                            <li><span>TRANSFER BCA</span> <span>758-681-823</span></li>
                        </ul>

                        <button type="submit" class="btn essence-btn">Place Order</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

@endsection
