@extends('layout.app')
@section('content')
    @include('admin.components.dashboard')
    @include('admin.components.report')

    @include('admin.components.teacher-list')
    @include('admin.components.add-teacher')
    @include('admin.components.update-teacher')
    @include('admin.components.delete-teacher')

    @include('admin.components.student-list')
    @include('admin.components.add-student')
    @include('admin.components.update-student')
    @include('admin.components.delete-student')

@endsection

