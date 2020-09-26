<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta name="author" content="Sedra Technology">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>المطاعم</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />

<!-- Plugins css -->
<link rel="stylesheet" href="../assets/plugins/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
<style>
    td.details-control {
    background: url('../assets/images/details_open.png') no-repeat center center;
    cursor: pointer;
}
    tr.shown td.details-control {
        background: url('../assets/images/details_close.png') no-repeat center center;
    }
</style>
<!-- Core css -->
<link rel="stylesheet" href="../assets/css/main.css"/>
<link rel="stylesheet" href="../assets/css/theme1.css" id="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">

</head>

<body class="font-opensans iconcolor rtl">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<!-- Start main html -->
<div id="main_content">

    <!-- Small icon top menu -->
    <div id="header_top" class="header_top">
        <div class="container">
            <div class="hleft">
                <div class="dropdown">
                    <a href="javascript:void(0)" class="nav-link user_btn"><img class="avatar" src="../assets/images/user.png" alt=""/></a>
                    <a href="index.html" class="nav-link icon"><i class="fa fa-home"></i></a>
                    <a href="users.html"  class="nav-link icon app_inbox"><i class="fa fa-users"></i></a>
                    <a href="orders.html"  class="nav-link icon xs-hide"><i class="fa fa-shopping-cart"></i></a>
                    <a href="restaurants.html"  class="nav-link icon app_file xs-hide"><i class="fa fa-university"></i></a>
                </div>
            </div>
            <div class="hright">
                <div class="dropdown">
                    <a href="reports.html" class="nav-link icon settingbar"><i class="fa fa-file"></i></a>
                    <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fa fa-navicon"></i></a>
                </div>            
            </div>
        </div>
    </div>


    <!-- start User detail -->
    <div class="user_div">
        <h5 class="brand-name mb-4">إسم المستخدم<a href="javascript:void(0)" class="user_btn"><i class="icon-close"></i></a></h5>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">بيانات المستخدم</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">name@faster-delivery.com</li>
                <li class="list-group-item">+ 202-555-2828</li>
                <li class="list-group-item">مسؤول عام</li>
            </ul>
        </div>
    </div>

    <!-- start Main menu -->
    <div id="left-sidebar" class="sidebar">
        <div class="d-flex justify-content-between brand_name">
            <h5 class="brand-name">التوصيل الأسرع</h5>
            <div class="theme_btn">
                <a class="theme1" data-toggle="tooltip" title="التصميم الأحمر" href="#" onclick="setStyleSheet('../assets/css/theme1.css', 0);"></a>
                <a class="theme2" data-toggle="tooltip" title="التصميم الأخضر" href="#" onclick="setStyleSheet('../assets/css/theme2.css', 0);"></a>
                <a class="theme3" data-toggle="tooltip" title="التصميم الأزرق" href="#" onclick="setStyleSheet('../assets/css/theme3.css', 0);"></a>
                <a class="theme4" data-toggle="tooltip" title="التصميم الرمادي" href="#" onclick="setStyleSheet('../assets/css/theme4.css', 0);"></a>
            </div>
        </div>
        <div class="input-icon">
            <span class="input-icon-addon">
                <i class="fe fe-search"></i>
            </span>
            <input type="text" class="form-control" placeholder="Search...">
        </div>
        <ul class="nav nav-tabs b-none">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#all-tab"> الروابط </a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting-tab">المظهر </a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="all-tab">
                <nav class="sidebar-nav">
                    <ul class="metismenu ci-effect-1">

                        <li class="g_heading">رئيسية النظام</li>
                        <li>
                            <a href="index.html"><i class="fa fa-home"></i><span data-hover="الصفحة الرئيسية">الصفحة الرئيسية</span></a>
                        </li>

                        <li class="g_heading">أساسيات النظام</li>
                        <li class="active">
                            <a href="restaurants.html"><i class="fa fa-university"></i><span data-hover="المطاعم">المطاعم</span></a>
                        </li>

                        <li>
                            <a href="salesReps.html"><i class="fa fa-male"></i><span data-hover="المناديب">المناديب</span></a>
                        </li>

                        <li>
                            <a href="cities.html"><i class="fa fa-map"></i><span data-hover="المدن">المدن</span></a>
                        </li>

                        <li>
                            <a href="districts.html"><i class="fa fa-map-marker"></i><span data-hover="الأحياء">الأحياء</span></a>
                        </li>

                        <li>
                            <a href="priceGroups.html"><i class="fa fa-cubes"></i><span data-hover="مجموعات التسعير">مجموعات التسعير</span></a>
                        </li>

                        <li>
                            <a href="users.html"><i class="fa fa-users"></i><span data-hover="المستخدمين">المستخدمين</span></a>
                        </li>

              
                        <li class="g_heading">الإدارة والتقارير</li>
                        <li>
                        <a href="reports.html"><i class="fa fa-file"></i><span data-hover="التقارير">التقارير</span></a>
                        </li>
                        <li>
                        <a href="settings.html"><i class="fa fa-cogs"></i><span data-hover="الإعدادات">الإعدادات</span></a>
                        </li>

                    </ul>
                </nav>
            </div>

            <div class="tab-pane fade" id="setting-tab">
                <div class="mb-4 mt-3">
                    <h6 class="font-14 font-weight-bold text-muted">نوع الخط</h6>
                    <div class="custom-controls-stacked font_setting">
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="font" value="font-opensans" checked="">
                            <span class="custom-control-label">الخط الرئيسي</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="font" value="font-poppins">
                            <span class="custom-control-label">خط بوبينس</span>
                        </label>
                    </div>
                </div>
                <div class="mb-4">
                    <h6 class="font-14 font-weight-bold text-muted">أيقونة القائمة المنسدلة</h6>
                    <div class="custom-controls-stacked arrow_option">
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="marrow" value="arrow-a" checked="">
                            <span class="custom-control-label">1</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="marrow" value="arrow-b">
                            <span class="custom-control-label">2</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="marrow" value="arrow-c">
                            <span class="custom-control-label">3</span>
                        </label>
                    </div>
                    <h6 class="font-14 font-weight-bold mt-4 text-muted">أيقونة القائمة الفرعية</h6>
                    <div class="custom-controls-stacked list_option">
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="listicon" value="list-a" checked="">
                            <span class="custom-control-label">1</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="listicon" value="list-b">
                            <span class="custom-control-label">2</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="listicon" value="list-c">
                            <span class="custom-control-label">3</span>
                        </label>
                    </div>
                </div>
                <div>
                    <h6 class="font-14 font-weight-bold mt-4 text-muted">إعدادات المظهر الرئيسية</h6>
                    <ul class="setting-list list-unstyled mt-1 setting_switch">
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">الوضع الليلي</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-darkmode">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">تثبيت الجزء العلوي</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-fixnavbar">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">تعتيم الجزء العلوي</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-pageheader">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">تعتيم القائمة الجانبية الفرعية</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-min_sidebar">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">تعتيم القائمة الجانبية الأساسية</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-sidebar">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">تلويين الأيقونات</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-iconcolor" checked="">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">تدريج الألوان</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-gradient">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">ظل للأزرار</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-boxshadow">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">التنسيق العربي</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-rtl" checked="">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- start main body part-->
    <div class="page">

        <!-- start body header -->
        <div id="page_top" class="section-body">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="left">
                        <h1 class="page-title"> تطبيق | Faster Delivery - التوصيل الأسرع</h1>
                    </div>
                    <div class="right">
                        <div class="notification d-flex">
                            <button type="button" class="btn btn-facebook"><i class="fa fa-info-circle mr-2"></i>الدعم الفني</button>
                            <button type="button" class="btn btn-facebook"><i class="fa fa-power-off mr-2"></i>تسجيل الخروج</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="container-fluid">
            <a href="addNewRest.html" class="btn btn-danger btn-block">إضافة مطعم جديد</a><br />
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                                <thead>
                                    <tr>
                                        <th>إسم المطعم</th>
                                        <th>عنوان المطعم</th>
                                        <th>الإيميل</th>
                                        <th>المدينة</th>
                                        <th>الحي</th>
                                        <th>عمليات</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>إسم المطعم</th>
                                        <th>عنوان المطعم</th>
                                        <th>الإيميل</th>
                                        <th>المدينة</th>
                                        <th>الحي</th>
                                        <th>عمليات</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>مطعم 1</td>
                                        <td>جده, حي الفيصلية </td>
                                        <td>rest@gmail.com</td>
                                        <td>جده</td>
                                        <td>الفيصلية</td>
                                        <td>
                                            <a href="#" class="btn btn-danger">عرض</a>                                   
                                            <a href="#" class="btn btn-secondary">تعديل</a>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#disableModal">تعطيل مؤقت</button>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#deleteModal">حذف</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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

<!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف عنصر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد من حذف هذا العنصر ؟</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">تأكيد الحذف</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
            </div>
        </div>
    </div>
</div>   

<!-- Disable Modal -->
    <div class="modal fade" id="disableModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعطيل مؤقت</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد من تعطيل هذا المطعم ؟</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">تأكيد</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
            </div>
        </div>
    </div>
</div> 

<!-- jQuery and bootstrtap js -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<!-- start plugin js file  -->
<script src="../assets/bundles/dataTables.bundle.js"></script>

<!-- Start core js and page js -->
<script src="../assets/js/core.js"></script>
<script src="assets/js/table/datatable.js"></script>
</body>
</html>