@extends('layouts.panel')

@section('title', 'Create User — ManuCore ERP')
@section('header', 'Create User')
@section('subheader', 'Add a new system user and assign roles.')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            @include('admin.users._form')
        </form>
    </div>
</div>
@endsection
