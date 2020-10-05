
@extends('layouts.header')

@section('title', 'العروض')
@section('content')
        <div class="section-body">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="table-responsive mb-4">
                            <table class="table table-hover js-basic-example dataTable table_custom spacing5">
                                <thead>
                                    <tr>
                                        <th>إسم المطعم</th>
                                        <th>الإيميل</th>
                                        <th>عمليات</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>إسم المطعم</th>
                                        <th>الإيميل</th>
                                        <th>عمليات</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    {{-- @if (count($offers)==0)
                                        <tr>
                                            <td>No Offers</td>
                                        </tr>
                                    @else
                                        @foreach ($offers as $offer)
                                            <tr>
                                                <td>{{$offer->name}}</td>
                                                <td>{{$offers->email}}</td>
                                                <td>
                                                    <a href="{{url('admin/offers/'.$offer->id)}}" class="btn btn-danger">عرض</a>                                   
                                                    <a href="{{url('admin/offers/'.$offer->id.'/edit')}}" class="btn btn-secondary">تعديل</a>
                                                    <a href="{{url('admin/PricingGroup')}}" class="btn btn-secondary"><i class="fa fa-usd"></i> مجموعات التسعير </a>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#disableModal">تعطيل مؤقت</button>
                                                    <form action="{{url('admin/offers/'.$offer->id)}}" method="POST" class="d-inline-block">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#deleteModal">حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif --}}
                                    <tr>
                                        <td>مطعم 1</td>
                                        <td>rest@gmail.com</td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">إضافة عرض</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#disableModal">تعطيل العرض</button>
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
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة عرض توصيل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="color:red;">عروض التوصيل تقوم بخصم كامل قيمة التوصيل من المطعم ولكن تضاف للمندوب من الحساب الخاص للتطبيق</p>
                <form>
                    <div class="col-md-12">
                        <label>نسبة الخصم (نسبة مئوية)</label>
                        <input type="number" class="form-control" />
                    </div>
                    <br /><hr /><br />
                    <div class="col-md-12">
                        <label>تطبيق الخصم حتى تاريخ</label>
                        <input type="date" class="form-control" />
                    </div>
                    <br />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">تأكيد تطبيق العرض</button>
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
                <h5 class="modal-title" id="exampleModalLabel">تعطيل العرض على المتجر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="color:red;">عروض التوصيل تقوم بخصم كامل قيمة التوصيل من المطعم ولكن تضاف للمندوب من الحساب الخاص للتطبيق</p>
                <form>
                    <div class="col-md-12">
                        <label>نسبة الخصم (نسبة مئوية)</label>
                        <input type="number" class="form-control" disabled/>
                    </div>
                    <br /><hr /><br />
                    <div class="col-md-12">
                        <label> الخصم حتى تاريخ</label>
                        <input type="date" class="form-control" disabled/>
                    </div>
                    <br />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">تأكيد تعطيل العرض</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
            </div>
        </div>
    </div>
</div> 

@endsection