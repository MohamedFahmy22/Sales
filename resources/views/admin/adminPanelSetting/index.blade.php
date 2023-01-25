@extends('layouts.admin')
@section('title')
    الضبط العام
@endsection

@section('content')
    @section('mainheader')
        الضبط
    @endsection

    @section('headerlink')
        <a href="{{ route('admin.panelSetting.index') }}">الضبط</a>
    @endsection

    @section('activeheader')
        عرض
    @endsection

    @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">بيانات الضبط العام</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        @if (@isset($data) && !@empty($data))
                            <table class="table table-hover">
                                <tr>
                                    <th style="width: 20%">إسم الشركة</th>
                                    <td>{{ $data['system_name'] }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 20%">كود الشركة</th>
                                    <td>{{ $data['company_code'] }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 20%">حالة الشركة</th>
                                    <td>
                                        @if ($data['active'] == 1)
                                            <span class="btn-sm btn btn-success"> مفعل</span>
                                        @else
                                            <span class="btn btn-danger">غير مفعل</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 20%">عنوان الشركة</th>
                                    <td>{{ $data['address'] }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 20%">تليفون الشركة</th>
                                    <td>{{ $data['phone'] }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 20%">رسالة تنبية الشركة</th>
                                    <td>{{ $data['generl_alert'] }}</td>
                                </tr>

                                <tr>
                                    <th style="width: 20%">لوجو الشركة</th>
                                    <td>
                                        <div class="custom_img">
                                            <img class="custom_img"
                                                 src="{{ asset('public/assets/admin/uploads').'/'.$data['photo'] }}"
                                                 alt="لوجو الشركة">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 20%">تاريخ أخر تحديث</th>
                                    <td>
                                        @if ($data['updated_by'] > 0 && $data['updated_by'] != null)
                                            @php
                                                $dt = new DateTime($data['updated_at']);
                                                $date = $dt->format("Y-M-D");
                                                $time = $dt->format("h:i");
                                                $newDateTime = date("A",strtotime($time));
                                                $timeType = (($newDateTime == 'am')? 'ص':'م');

                                            @endphp
                                            <span class="btn btn-primary">{{ $date }}</span>
                                            <span class="btn btn-primary"> {{ $time }} </span>
                                            <span class="btn btn-primary"> {{ $timeType }} </span>
                                            <span
                                                class="btn btn-primary"> بواسطة {{ $data['updated_by_admin'] }} </span>
                                        @else
                                            <span class="btn btn-danger">لا يوجد تحديث</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 20%"> عمليات</th>
                                    <td>
                                        <a href="{{route('admin.panelSetting.edit')}}" class="btn btn-sm btn-success">Edit</a>
                                    </td>
                                </tr>


                            </table>
                        @else
                            <div class="alert alert-danger">
                                عفواً لاتوجد بيانات لعرضها
                            </div>

                        @endif

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    @endsection

@endsection
