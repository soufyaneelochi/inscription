@extends('layouts.app')

@section('content')
{{-- @php
$user=Auth::guard()->user();
@endphp --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>User Profile</h1>

                    <p>Name: {{ $user->nom }}</p>
                    <p>Email: {{ $user->email }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
