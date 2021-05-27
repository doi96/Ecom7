<div class="shop-method-area">
    <div class="container">
        <div class="method-wrapper">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40 text-center">
                        <i class="ti-crown"></i>
                        <h6>{{__('label.bestquality')}}</h6>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40 text-center">
                        <i class="ti-wallet"></i>
                        <h6>{{__('label.bestprice')}}</h6>
                    </div>
                </div> 
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40 text-center">
                        <i class="ti-world"></i>
                        <h6>{{__('label.worldwide')}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="{{ route('user.home') }}"><img src="{{ asset('images/front_images/GCapvn.png') }}" alt="" style="width: 100px"></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>{{__('label.slogan')}} </p><hr> <p><span style="color: #45812b"> {{__('label.slogan_ex')}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>{{__('label.quicklinks')}}</h4>
                                <ul>
                                    <li><a href="{{ route('user.about') }}">{{__('label.about')}}</a></li>
                                    <li><a href="#"> {{__('label.offeranddiscou')}}</a></li>
                                    <li><a href="#"> {{__('label.getcoupon')}}</a></li>
                                    <li><a href="{{ route('user.contact') }}">  {{__('label.contact')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>{{__('label.productdistri')}}</h4>
                                <ul>
                                    <li><a href="{{ route('user.distribution') }}">{{__('label.distributionPolicy')}}</a></li>
                                    <li><a href="{{ route('user.distributor') }}">{{__('label.DistributorList')}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>{{__('label.customersupport')}}</h4>
                                <ul>
                                    <li><a href="#">Frequently Asked Questions</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Report a Payment Issue</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Div where the WhatsApp will be rendered-->  
                <div id="WAButton"></div>  
                <!-- Footer bottom -->
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p>Copyright 2021 All rights reserved <span style="color: green">GCAPVN CO., LTD</span>| This website is designed by <i class="fa fa-heart" aria-hidden="true"></i><a href="#" target="_blank">Thanh Doi</a></p>                  
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <p>Các kênh phân phối</p>
                            <div class="footer-social">
                                <a href="https://gcapvn.trustpass.alibaba.com/company_profile.html"><img src="{{ asset('logo/alibaba.png') }}" style="width: 45px; margin-bottom: 3px; margin-left: 5px"></a>
                                <a href="#"><img src="{{ asset('logo/amzon.png') }}" style="width: 45px; margin-bottom: 3px; margin-left: 5px"></a>
                                <a href="#"><img src="{{ asset('logo/shopee.png') }}" style="width: 45px; margin-bottom: 3px; margin-left: 5px"></a>
                                <a href="#"><img src="{{ asset('logo/tiki.png') }}" style="width: 45px; margin-bottom: 3px; margin-left: 5px"></a>
                                <a href="#"><img src="{{ asset('logo/lazada.png') }}" style="width: 45px; margin-bottom: 3px; margin-left: 5px"></a>
                                <a href="#"><img src="{{ asset('logo/go.png') }}" style="width: 45px; margin-bottom: 3px; margin-left: 5px"></a>
                                <a href="#"><img src="{{ asset('logo/vinmart.png') }}" style="width: 45px; margin-bottom: 3px; margin-left: 5px"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
