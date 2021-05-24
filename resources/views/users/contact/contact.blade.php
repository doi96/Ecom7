@extends('layouts.front_layout.master')
@section('content')
    

<!--? Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Liên hệ</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--? Hero Area End-->
        <!-- ================ contact section start ================= -->
        <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">

                </div>


                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Gửi thư cho chúng tôi</h2>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (Session::has('success_message'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ Session::get('success_message') }}</strong>
                        </div>
                    @endif

                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="{{ route('user.contactPost') }}" method="post">@csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="content" id="content" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Nhập nội dung mail"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Nhập họ tên">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="phone" id="phone" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Số điện thoại liên lạc">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button btn-success">Gửi</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>CÔNG TY TNHH GCAP VN.</h3>
                                <p>Địa chỉ: Thôn Cát Lợi, Xã Vĩnh Lương, Thành Phố Nha Trang, Tỉnh Khánh Hòa, Việt Nam</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+0905590098</h3>
                                <p>Liên lạc trong giờ hành chính!</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>gcapvn79@gmail.com</h3>
                                <p>Gửi thư cho chúng tôi bất cứ khi nào!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ contact section end ================= -->
@endsection
