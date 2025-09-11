@extends('layouts.panel')

@section('title', 'Edit User — ManuCore ERP')
@section('header', 'Edit User')
@section('subheader', 'Update user details and assign roles.')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PUT')
            @include('admin.users._form')
        </form>
    </div>
</div>
@endsection
