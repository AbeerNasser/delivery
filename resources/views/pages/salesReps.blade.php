﻿@extends('layouts.header')

@section('title','المناديب')
@section('content')
        <div class="section-body">
            <div class="container-fluid">
            <a href="delegats/create" class="btn btn-danger btn-block">إضافة مندوب جديد</a><br />
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                                <thead>
                                    <tr>
                                        <th>إسم المندوب</th>
                                        <th>رقم الهوية</th>
                                        <th>صورة الهوية</th>
                                        <th>رقم الجوال</th>
                                        <th>عمليات</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>إسم المندوب</th>
                                        <th>رقم الهوية</th>
                                        <th>صورة الهوية</th>
                                        <th>رقم الجوال</th>
                                        <th>عمليات</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if (count($delegats)==0)
                                        <tr>
                                            <td>No Delegats</td>
                                        </tr>
                                    @else
                                        @foreach ($delegats as $delegat)
                                        <tr>
                                            <td>{{$delegat->name}}</td>
                                            <td>{{$delegat->sn_no}}</td>
                                            <td>
                                                <a href="{{asset('img/'.$delegat->sn_img)}}" target="_blank"><img src="{{asset('img/'.$delegat->sn_img)}}" width="80px" height="80px"/></a>
                                            </td>
                                            <td>{{$delegat->phone}}</td>
                                            <td>
                                                <a href="{{url('admin/delegats/'.$delegat->id)}}" class="btn btn-danger">عرض</a>                                   
                                                <a href="{{url('admin/delegats/'.$delegat->id.'/edit')}}" class="btn btn-secondary">تعديل</a>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#disableModal">تعطيل مؤقت</button>
                                                <form action="{{url('admin/delegats/'.$delegat->id)}}" method="POST" class="d-inline-block">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#deleteModal">حذف</button>
                                                </form>
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
                <p>هل أنت متأكد من تعطيل هذا المندوب ؟</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">تأكيد</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
            </div>
        </div>
    </div>
</div> 

@endsection