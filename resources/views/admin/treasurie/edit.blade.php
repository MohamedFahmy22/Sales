@extends('layouts.admin')
@section('title')
    تعديل بيانات الخزنة
@endsection

@section('mainheader')
    الخزن
@endsection

@section('headerlink')
    <a href="{{ route('admin.panelSetting.index') }}">الخزن</a>
@endsection

@section('activeheader')
    تعديل
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تعديل بيانات خزنة </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(isset($data) && !@empty($data))
                        <form action="{{route('admin.treasuries.update',$data['id'])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">إسم الخزنة</label>
                                <input name="name" id="name" class="form-control"
                                       value=" @if(isset($_POST['name'])) {{old('name')}} @else {{$data['name']}} @endif "
                                       placeholder="ادخل إسم الخزنة"
                                       oninvalid="setCustomValidity('من فضلك ادخل هذا الحقل')"
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
                                    /* لو انا عملت تعديل ع قيمه السلكت اللي جايه وعاوز اعمل submit وحصل ايرور هقوله
                                    رجعلي القيمه اللي انا لسه حاططها اللي بترجعها الداله old انما لو مش هعدل هخليه
                                    يبجيبلي اللي جاي من الداتا بيز او لو اول مره أخش ع فورم التعديل ومعملتش اي أكشن */
                                    <option
                                        @if(isset($_POST['is_master']))
                                            @if( old('is_master') == 1 &&  old('is_master') !== "")
                                                selected = "selected"
                                        @endif
                                        @else
                                            @if ($data['is_master'] == 1)
                                                selected = "selected"
                                        @endif
                                        @endif
                                        value="1">نعم
                                    </option>

                                    /* لو انا عملت تعديل ع قيمه السلكت اللي جايه وعاوز اعمل submit وحصل ايرور هقوله
                                    رجعلي القيمه اللي انا لسه حاططها اللي بترجعها الداله old انما لو مش هعدل هخليه
                                    يبجيبلي اللي جاي من الداتا بيز او لو اول مره أخش ع فورم التعديل ومعملتش اي أكشن */

                                    <option
                                        @if(isset($_POST['is_master']))
                                            @if( old('is_master') == 0 &&  old('is_master') !== "")
                                                selected = "selected"
                                        @endif
                                        @else
                                            @if ($data['is_master'] == 0)
                                                selected = "selected"
                                        @endif
                                        @endif

                                        value="0">لا
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
                                       class="form-control"
                                       value="@if(isset($_POST['last_receipt_number_exchange'])) {{old('last_receipt_number_exchange')}} @else {{$data['last_receipt_number_exchange']}} @endif "
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
                                <label for="last_receipt_number_collection"> أخر رقم إيصال تحصيل نقدية لهذه
                                    الخزنة</label>
                                <input name="last_receipt_number_collection" id="last_receipt_number_collection"
                                       class="form-control"
                                       value="@if(isset($_POST['last_receipt_number_collection'])) {{old('last_receipt_number_collection')}} @else {{$data['last_receipt_number_collection']}} @endif"
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
                                    <option


                                        @if(isset($_POST['active']))
                                            @if( old('active') == 1 &&  old('active') !== "")
                                                selected = "selected"
                                        @endif
                                        @else
                                            @if ($data['active'] == 1)
                                                selected
                                        @endif
                                        @endif

                                        value="1">نعم
                                    </option>
                                    <option
                                        @if(isset($_POST['active']))
                                            @if( old('active') == 0 &&  old('active') !== "")
                                                selected = "selected"
                                        @endif
                                        @else
                                            @if ($data['active'] == 0)
                                                selected
                                        @endif
                                        @endif

                                        value="0">لا
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
                    @else
                        <div class="alert alert-danger">
                            عفوا لاتوجد بيانات لعرضها !!
                        </div>
                    @endif
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection


