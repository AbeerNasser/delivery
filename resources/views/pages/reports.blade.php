

@extends('layouts.header')

@section('title', 'التقارير')
@section('content')

        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <form class="card">
                            <div class="card-body">
                                <h3>تقارير النظام</h3>
                                <hr /><br />
                                <div class="row">


                                    <div class="col-sm-2 col-md-2">
                                        <a href="#">
                                            <div style="background-color:#e21e32; padding:20px; text-align:center; color:white; border-radius:50px;">
                                                <i class="fa fa-file" style="font-size:25px; margin-bottom:20px;"></i>
                                                <p> المطاعم</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-2 col-md-2">
                                        <a href="#">
                                            <div style="background-color:#e21e32; padding:20px; text-align:center; color:white; border-radius:50px;">
                                                <i class="fa fa-file" style="font-size:25px; margin-bottom:20px;"></i>
                                                <p> المناديب</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-2 col-md-2">
                                        <a href="#">
                                            <div style="background-color:#e21e32; padding:20px; text-align:center; color:white; border-radius:50px;">
                                                <i class="fa fa-file" style="font-size:25px; margin-bottom:20px;"></i>
                                                <p> الطلبات</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-sm-2 col-md-2">
                                        <a href="#">
                                            <div style="background-color:#e21e32; padding:20px; text-align:center; color:white; border-radius:50px;">
                                                <i class="fa fa-file" style="font-size:25px; margin-bottom:20px;"></i>
                                                <p> المدن</p>
                                            </div>
                                        </a>
                                    </div>


                                    <div class="col-sm-2 col-md-2">
                                        <a href="#">
                                            <div style="background-color:#e21e32; padding:20px; text-align:center; color:white; border-radius:50px;">
                                                <i class="fa fa-file" style="font-size:25px; margin-bottom:20px;"></i>
                                                <p> الأحياء</p>
                                            </div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start page footer -->
        <div class="section-body">
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            جميع الحقوق محفوظة © 2020 تطبيق التوصيل الأسرع, تطوير  <a href="https://sedrait.com" target="_blank">شركة سِدره للبرمجيات</a>.
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>

@endsection