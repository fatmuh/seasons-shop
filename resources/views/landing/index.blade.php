@extends('landing.layouts.app')

@section('content')
    <!-- ##### Header Area End ##### -->

    <!-- ##### Welcome Area Start ##### -->
    <section class="welcome_area bg-img background-overlay" style="background-image: url(assets/img/bg-img/bg.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h3>Jaga Investasi Anda dengan Casing Terbaik<br>untuk Smartphone Anda</h3><br>
                        {{-- <  a href="#" class="btn essence-btn">view products</> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Brands Area Start ##### -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Tersedia Untuk</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="brands-area d-flex align-items-center justify-content-between">

        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="https://logos-world.net/wp-content/uploads/2022/01/iPhone-Symbol.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="https://www.freepnglogos.com/uploads/samsung-logo-text-png-1.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Vivo_logo_2019.svg/3953px-Vivo_logo_2019.svg.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="https://logos-download.com/wp-content/uploads/2016/05/Xiaomi_Logo_2019.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="https://www.freepnglogos.com/uploads/oppo-logo-png/oppo-green-logo-transparent-0.png" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="https://zeevector.com/wp-content/uploads/Realme-Logo-HD.png" alt="">
        </div>
    </div>
    <!-- ##### Brands Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">

                        @foreach ($data as $dataProduk)
                        <!-- Single Product -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="{{ asset('storage/'. old('image', $dataProduk->image)) }}" alt="">
                                </div>

                                <!-- Product Description -->
                                <div class="product-description">
                                    <a href="single-product-details.html">
                                        <h6>{{ $dataProduk->product_name }}</h6>
                                    </a>
                                    <p class="product-price">{{ "Rp".number_format($dataProduk->price,2,',','.') }}</p>

                                    <!-- Hover Content -->
                                    <div class="hover-content">
                                        <!-- Add to Cart -->
                                        <div class="add-to-cart-btn">
                                            <a href="{{ url('/checkout/'.$dataProduk->id) }}" class="btn essence-btn">Buy</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ##### New Arrivals Area End ##### -->

    @endsection
