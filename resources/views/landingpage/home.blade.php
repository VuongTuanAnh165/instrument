@extends('layouts.app')

@section('title')
<title>Trang chủ</title>
@endsection

@section('content')
<!-- Banner -->
<div class="banner ov-hidden">
    <div id="particles" data-bg-img="{{asset('frontend/assets/img/bg/banner-bg.png')}}"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <!-- Banner Content -->
                <div class="banner-content text-white mt-xl-0 pt-xl-0 mb-5 mb-lg-0">
                    <form action="sendmail.php" class="contact-form">
                        <!--Start Contact Form -->
                        <h3 class="pb-1">Liên hệ với chúng tôi</h3>
                        <div class="form-group">
                            <label for="name">Tên đầy đủ</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Họ và tên...">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="phonenumber">Số điện thoại</label>
                                    <input type="text" name="phonenumber" class="form-control" id="phonenumber" placeholder="+84......">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Zalo</label>
                                    <input type="text" name="zalo" class="form-control" id="zalo" placeholder="Tài khoản zalo...">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Địa chỉ Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email...">
                        </div>

                        <div class="form-group">
                            <label for="message">Lời nhắn</label>
                            <textarea id="message" name="message" class="form-control" placeholder="Viết gì đó..."></textarea>
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="btn">
                                <img src="{{asset('frontend/assets/img/icons/btn_submit.svg')}}" alt="" class="svg">Gửi
                            </button>
                        </div>
                        <div class="form-response mt-3"></div>
                    </form>
                    <!-- End Contact Form -->
                </div>
                <!-- End Banner Content -->
            </div>
            <div class="col-lg-6">
                <!-- Banner IMG -->
                <div class="banner-img mb-60 mb-lg-0">
                    <img src="{{asset('frontend/assets/img/media/banner-img.png')}}" alt="">

                    <div class="banner-img-content">
                        <h2>Do a Portrait Painting Artwork!</h2>

                        <!-- List Info -->
                        <ul class="list-info text-white style--two">
                            <li>
                                <h5>Ngày hôm nay</h5>
                                <h4 class="mb-0"><img src="{{asset('frontend/assets/img/icons/eth.svg')}}" alt="" class="svg"> 03.66 ETH
                                </h4>
                            </li>
                            <li>
                                <h5>Thời gian còn lại</h5>
                                <div class="countdown-wrap">
                                    <img src="{{asset('frontend/assets/img/icons/time.svg')}}" alt="" class="svg">
                                    <ul class="countdown">
                                        <li>
                                            <span class="hours">00</span>
                                        </li>
                                        <li class="ms-1 me-1"> : </li>
                                        <li>
                                            <span class="minutes">00</span>
                                        </li>
                                        <li class="ms-1 me-1"> : </li>
                                        <li>
                                            <span class="seconds">00</span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        <!-- End List Info -->

                        <!-- Button Group -->
                        <div class="button-group">
                            <a href="#" class="btn-circle love-react mr-10"></a>

                            <div class="dropdown mr-10">
                                <button class="btn-circle dropdown-toggle" data-bs-toggle="dropdown">
                                    <img src="{{asset('frontend/assets/img/icons/share.svg')}}" alt="" class="svg">
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" target="_blank" href="https://www.facebook.com/"><img src="{{asset('frontend/assets/img/icons/facebook.svg')}}" alt=""> Share on Facebook</a>
                                    </li>
                                    <li><a class="dropdown-item" target="_blank" href="https://www.twitter.com/"><img src="{{asset('frontend/assets/img/icons/twitter.svg')}}" alt=""> Share on Twitter</a></li>
                                    <li><a class="dropdown-item" target="_blank" href="https://www.Instagram.com/"><img src="{{asset('frontend/assets/img/icons/instagram.svg')}}" alt=""> Share on Instagram</a>
                                    </li>
                                    <li><a class="dropdown-item" target="_blank" href="https://www.linkedin.com/"><img src="{{asset('frontend/assets/img/icons/linkedin.svg')}}" alt=""> Share on Linkedin</a>
                                    </li>
                                </ul>
                            </div>

                            <a href="item-details.html" class="btn btn-sm">
                                <img src="{{asset('frontend/assets/img/icons/judge-icon.svg')}}" alt="" class="svg">
                                Place Bid
                            </a>
                        </div>
                        <!-- End Button Group -->
                    </div>
                </div>
                <!-- End Banner IMG -->
            </div>
        </div>
    </div>
</div>
<!-- End Banner -->


<!-- End Top Collection -->
@endsection