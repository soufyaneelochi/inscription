@extends('layouts.app')

@section('content')
<style>
    .form {
    background-color: white;
    padding: 3.125em;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 5px 5px 15px -1px rgba(0,0,0,0.75);
    }

    .signup {
    color: rgb(77, 75, 75);
    text-transform: uppercase;
    letter-spacing: 2px;
    display: block;
    font-weight: bold;
    font-size: x-large;
    margin-bottom: 0.5em;
    }

    .form--input {
    width: 100%;
    margin-bottom: 1.25em;
    height: 40px;
    border-radius: 5px;
    border: 1px solid gray;
    padding: 0.8em;
    font-family: 'Inter', sans-serif;
    outline: none;
    }

    .form--input:focus {
    border: 1px solid #639;
    outline: none;
    }

    .form--marketing {
    display: flex;
    margin-bottom: 1.25em;
    align-items: center;
    }

    .form--marketing > input {
    margin-right: 0.625em;
    }

    .form--marketing > label {
    color: grey;
    }

    .checkbox, input[type="radio"] {
    accent-color: #639;
    }

    .form--submit {
    width: 50%;
    padding: 0.625em;
    border-radius: 5px;
    color: white;
    background-color: #639;
    border: 1px dashed #639;
    cursor: pointer;
    }

    .form--submit:hover {
    color: #639;
    background-color: white;
    border: 1px dashed #639;
    cursor: pointer;
    transition: 0.5s;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    
                    <form class="form" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <span class="signup">SIGN UP</span>
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
