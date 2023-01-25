@extends('layouts.admin')
@section('title')
    إضافة خزنة جديدة
@endsection

@section('mainheader')
    الخزن
@endsection

@section('headerlink')
    <a href="{{ route('admin.panelSetting.index') }}">الضبط</a>
@endsection

@section('activeheader')
    إضافة
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">إضافة خزنة جديدة</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{route('admin.treasuries.store')}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">إسم الخزنة</label>
                            <input name="name" id="name" value="{{old('name')}}" class="form-control" value=""
                                   placeholder="ادخل إسم الخزنة" oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                   onchange="try{setCustomValidity('')}catch(e){}">
                            @error('name')
                            <span class="text-danger">
                                        {{  $message }}
                                    </span
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="is_master">هل الخزنة رئيسية</label>
                            <select class="form-control" name="is_master" id="is_master">
                                <option value="" disabled selected>إختر النوع</option>
                                <option {{ old('is_master') == '1' ? 'selected' : '' }} value="1">نعم</option>
                                <option {{ old('is_master') == '0' && old('is_master') == '' ? 'selected' : '' }} value="0">
                                    لا
                                </option>
                            </select>
                            @error('is_master')
                            <span class="text-danger">
                                        {{  $message }}
                                    </span
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="last_receipt_number_exchange"> أخر رقم إيصال صرف نقدية لهذه الخزنة</label>
                            <input name="last_receipt_number_exchange" id="last_receipt_number_exchange"
                                   class="form-control" value="{{old('last_receipt_number_exchange')}}"
                                   placeholder="ادخل أخر رقم إيصال صرف نقدية لهذه الخزنة"
                                   oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                   onchange="try{setCustomValidity('')}catch(e){}"
                                   oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                            @error('last_receipt_number_exchange')
                            <span class="text-danger">
                                        {{  $message }}
                                    </span
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="last_receipt_number_collection"> أخر رقم إيصال تحصيل نقدية لهذه الخزنة</label>
                            <input name="last_receipt_number_collection" id="last_receipt_number_collection"
                                   class="form-control" value="{{old('last_receipt_number_collection')}}"
                                   placeholder="ادخل أخر رقم إيصال تحصيل نقدية لهذه الخزنة"
                                   oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
                                   onchange="try{setCustomValidity('')}catch(e){}"
                                   oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                            @error('last_receipt_number_collection')
                            <span class="text-danger">
                                        {{  $message }}
                                    </span
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="active">حالة التفعيل</label>
                            <select class="form-control" name="active" id="active">
                                <option value="" disabled selected>إختر الحالة</option>
                                <option {{ old('active') == '1' ? 'selected' : '' }} value="1">نعم</option>
                                <option {{ old('active') == '0' && old('active') == '' ? 'selected' : '' }} value="0">
                                    لا
                                </option>
                            </select>
                            @error('is_master')
                            <span class="text-danger">
                                        {{  $message }}
                                    </span
                            @enderror
                        </div>

                        <div class="form-group" style="margin: 30px;">
                            <button type="submit" class="btn btn-primary"> حفظ التغييرات</button>
                            <a href="{{route('admin.treasuries.index')}}" class="btn btn-danger">إلغاء </a>
                        </div>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection


