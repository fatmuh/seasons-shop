@extends('landing.layouts.app')

@section('content')

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(assets/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>SEASONS SHOP</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

    <!-- Single Product Thumb -->
    <div class="single_product_thumb clearfix">
        <img src="{{ asset('storage/'. old('image', $data->image)) }}" alt="">
    </div>

    <!-- Single Product Description -->
    <div class="single_product_desc clearfix">
        {{-- <span>CASE</span> --}}
        <a href="cart.html">
            <h2>{{ $data->product_name }}</h2>
        </a>
        <p class="product-price">{{ "Rp".number_format($data->price,2,',','.') }}</p>
        <p class="product-desc">{!! nl2br($data->description) !!}</p>

        <!-- Form -->
        <!-- Select Box -->
        <div class="select-box d-flex mt-50 mb-30">
            <div class="mb-3">
                <form action="{{ url('/payment/'.$data->id) }}" method="GET">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="name">Merek Smartphone</label>
                            <input type="text" class="form-control" name="merk_hp" placeholder="Merek Smartphone" required>
                        </div>

                        <div class="col-6 mb-3">
                            <label for="company">Tipe Smartphone</label>
                            <input type="text" class="form-control" name="tipe_hp" placeholder="Tipe Smartphone" required>
                        </div>

                        <div class="col-12">
                            <label for="company">Jumlah Pemesanan</label><br>
                            <select name="order_pcs" class="w-100">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
            </div>
        </div>
        <div class="add-to-cart-btn">
            <button type="submit" class="btn essence-btn">Buy</button>
        </div>
        </form>
    </div>
</section>
<!-- ##### Single Product Details Area End ##### -->

@endsection
