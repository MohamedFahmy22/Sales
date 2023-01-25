@extends('layouts.admin')
@section('title')
    Fahmy
@endsection

@section('content')
    @section('mainheader')
        Mohamed Fahmy
    @endsection

    @section('headerlink')
        <a href="{{ route('admin.dashboard') }}">الرئيسية</a>
    @endsection

    @section('activeheader')
        عرض
    @endsection

@endsection
