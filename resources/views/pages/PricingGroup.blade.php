﻿
    @extends('layouts.header')

    @section('title', 'مجموعات التسعير')
    @section('content')
        <div class="section-body">
            <div class="container-fluid">
                <button type="button" data-id="{{$restaurant->id}}" class="btn btn-success btn-block mb-3" data-toggle="modal" data-target="#addModalGroup">إضافة مجموعة تسعيير جديدة</button>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                                <thead>
                                    <tr>
                                        <th>إسم المجموعة</th>
                                        <th>أحياء المجموعة</th>
                                        <th>سعر التوصيل</th>
                                        <th>نسبة المندوب</th>
                                        <th>عمليات</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>إسم المجموعة</th>
                                        <th>أحياء المجموعة</th>
                                        <th>سعر التوصيل</th>
                                        <th>نسبة المندوب</th>
                                        <th>عمليات</th>
                                    </tr>
                                </tfoot>
                                
                                <tbody>
                                    @if (count($groups)==0)
                                        <tr>
                                            <td>No Groups</td>
                                        </tr>
                                    @else
                                        @foreach ($groups as $group)
                                            <tr>
                                                <td>{{$group->name}}</td>
                                                {{-- <td>{{$group->city_name}}</td> --}}
                                                <td>{{$group->district_name}},{{$group->city_name}}</td>
                                                <td>{{$group->price}}</td>
                                                <td>{{$group->percentage}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">حذف</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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
    <div class="modal fade" id="addModalGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">إضافة مجموعة تسعيير</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="addForm">
                        @method('post')
                        @csrf
                        <div class="col-md-12">
                            <label>إسم المجموعة</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        {{-- <hr /> --}}
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label class="form-label">الاحياء</label>
                                <select class="form-control custom-select" multiple name="district">
                                    <option value="">إختر ....</option>
                                    @foreach($districts as $district)
                                        <option value="{{$district->district['id']}}">{{$district->district['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <hr /> --}}
                        <div class="col-md-12">
                            <label>سعر التوصيل</label>
                            <input type="number" name="price" class="form-control" />
                        </div>
                        {{-- <hr /> --}}
                        <div class="col-md-12 mt-2">
                            <label>نسبة المندوب (نسبة مئوية)</label>
                            <input type="text" name="percentage" class="form-control" />
                        </div>
                        <br />
                        <hr/>
                        <button type="submit" class="btn btn-success">حفظ المجموعة</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
              
                    </form>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-success">حفظ المجموعة</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                </div> --}}
            </div>
        </div>
    </div>   

    @endsection
