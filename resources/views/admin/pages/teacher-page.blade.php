@extends('layout.app')
@section('content')
    @include('admin.components.dashboard')
    @include('admin.components.teacher-list')
    @include('admin.components.add-teacher')
    @include('admin.components.update-teacher')
    @include('admin.components.delete-teacher')
@endsection
