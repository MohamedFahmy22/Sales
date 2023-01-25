@extends('layouts.admin')
@section('title')
    بيانات الخزن
@endsection

@section('content')
    @section('mainheader')
        الخزن
    @endsection

    @section('headerlink')
        <a href="{{ route('admin.treasuries.index') }}">الخزن</a>
    @endsection

    @section('activeheader')
        عرض
    @endsection

    @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">بيانات الخزن </h3>
                        <a class="btn btn-outline-dark" href="{{route('admin.treasuries.create')}}">إضافة</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        @if (@isset($data) && !@empty($data))
                            @php
                                $i = 1;
                            @endphp
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>إسم الخزنة</th>
                                    <th>هل رئيسية</th>
                                    <th>حالة التفعيل</th>
                                    <th>أخر إيصال صرف</th>
                                    <th>أخر إيصال تحصيل</th>
                                    <th>تاريخ الإضافة</th>
                                    <th>تاريخ التحديث</th>
                                    <th>العمليات</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($data as $info)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $info->name }}</td>
                                        <td>
                                            @if ($info->is_master == 1)
                                                <span class="btn-sm btn btn-success">رئيسية</span>
                                            @else
                                                <span class="btn-sm btn btn-danger">فرعية</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($info->active == 1)
                                                <span class="btn-sm btn btn-success">مُفعل</span>
                                            @else
                                                <span class="btn-sm btn btn-danger">مُعطل</span>
                                            @endif
                                        </td>
                                        <td> {{ $info->last_receipt_number_exchange  }}</td>
                                        <td> {{ $info->last_receipt_number_collection }} </td>
                                        <td>
                                            @php
                                                $dt = new DateTime($info->created_at);
                                                $date = $dt->format("y-m-d");
                                                $time = $dt->format("h:i");
                                                $newDateTime = date("A",strtotime($time));
                                                $timeType = (($newDateTime == 'am')? 'ص':'م');

                                            @endphp
                                            {{ $date }} <br>
                                            {{ $time }}
                                            {{ $timeType }}<br>
                                            {{ $info->updated_by_admin }}
                                        </td>

                                        <td>
                                            @if ($info->updated_by > 0 && $info->updated_by != null)

                                                @php
                                                    $dt = new DateTime($info->updated_at);
                                                    $date = $dt->format("y-m-d");
                                                    $time = $dt->format("h:i");
                                                    $newDateTime = date("A",strtotime($time));
                                                    $timeType = (($newDateTime == 'am')? 'ص':'م');

                                                @endphp
                                                {{ $date }} <br>
                                                {{ $time }}
                                                {{ $timeType }}<br>
                                                {{ $info->updated_by_admin }}
                                            @else
                                                <span class="btn btn-danger">لا يوجد تحديث</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.treasuries.edit',$info->id)}}"
                                               class="btn-sm btn btn-primary">
                                                تعديل
                                            </a>
                                            <button data-id="{{$info->id}}" class="btn-sm btn btn-info">
                                                المذيد
                                            </button>

                                        </td>

                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                                </tbody>

                            </table>

                            {!! $data->links() !!}
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
