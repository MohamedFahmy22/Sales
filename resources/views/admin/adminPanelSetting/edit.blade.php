@extends('layouts.admin')
@section('title')
    تعديل الضبط العام
@endsection
@section("css")
    <link rel="stylesheet" href="{{ asset('public/assets/admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('public/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection


@section('mainheader')
    الضبط
@endsection

@section('headerlink')
    <a href="{{ route('admin.panelSetting.index') }}">الضبط</a>
@endsection

@section('activeheader')
    تعديل
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تعديل بيانات الضبط العام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if (@isset($data) && !@empty($data))
                        <form action="{{ route('admin.panelSetting.update') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="system_name">إسم الشركة</label>
                                <input name="system_name" id="system_name" class="form-control"
                                       value="{{ $data['system_name'] }}" placeholder="ادخل اسم الشركة"
                                       oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                       onchange="try{setCustomValidity('')}catch(e){}">
                                @error('system_name')
                                <span class="text-danger">
                                        {{  $message }}
                                    </span
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="address">عنوان الشركة</label>
                                <input name="address" id="address" class="form-control" value="{{ $data['address'] }}"
                                       placeholder="ادخل عنوان الشركة"
                                       oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                       onchange="try{setCustomValidity('')}catch(e){}">
                                @error('address')
                                <span class="text-danger">
                                        {{  $message }}
                                    </span
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="phone">هاتف الشركة</label>
                                <input name="phone" id="phone" class="form-control" value="{{ $data['phone'] }}"
                                       placeholder="ادخل هاتف الشركة"
                                       oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                       onchange="try{setCustomValidity('')}catch(e){}">
                                @error('phone')
                                <span class="text-danger">
                                        {{  $message }}
                                    </span
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="general_alert">رساله تنبيه أعلي الشاشة</label>
                                <input name="generl_alert" id="general_alert" class="form-control"
                                       value="{{ $data['generl_alert'] }}" placeholder="ادخل رساله تنبية الشركة"
                                       oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                       onchange="try{setCustomValidity('')}catch(e){}">
                                @error('generl_alert')
                                <span class="text-danger">
                                        {{  $message }}
                                    </span
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">لوجو الشركة</label>
                                <div class="image">
                                    <img class="custom_img"
                                         src="{{ asset('public/assets/admin/uploads').'/'.$data['photo'] }}"
                                         alt="لوجو الشركة">
                                    <hr>
                                    <div id="oldImage">
                                    </div>
                                    <hr>
                                    <button type="button" class="btn btn-sm btn-success" id="update_image">تغيير
                                        الصورة
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger" style="display: none"
                                            id="cancel_update_image"> إلغاء
                                    </button>

                                </div>
                            </div>

                            <div class="form-group" style="margin: 30px;">
                                <button type="submit" class="btn btn-primary"> حفظ التغييرات</button>
                            </div>

                        </form>
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


