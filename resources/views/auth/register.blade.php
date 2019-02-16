@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
                <form method="POST" action="{{ route('register') }}">
                        @csrf
            <div class="card">
                <div class="card-header">{{ __('Register - Company details') }}</div>

                <div class="card-body">


                        <div class="form-group row">
                            <label for="nameinfull" class="col-md-4 col-form-label text-md-right">{{ __('Name in Full') }}</label>

                            <div class="col-md-6">
                                <input id="nameinfull" type="text" class="form-control{{ $errors->has('nameinfull') ? ' is-invalid' : '' }}" name="nameinfull" value="{{ old('nameinfull') }}" required autofocus>

                                @if ($errors->has('nameinfull'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nameinfull') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="companyid" class="col-md-4 col-form-label text-md-right">{{ __('Company ID') }}</label>

                            <div class="col-md-6">
                                <input id="companyid" type="text" class="form-control{{ $errors->has('companyid') ? ' is-invalid' : '' }}" name="companyid" value="{{ old('companyid') }}" required autofocus>

                                @if ($errors->has('companyid'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('companyid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="companyemail" class="col-md-4 col-form-label text-md-right">{{ __('Company email') }}</label>

                            <div class="col-md-6">
                                <input id="companyemail" type="email" class="form-control{{ $errors->has('companyemail') ? ' is-invalid' : '' }}" name="companyemail" value="{{ old('companyemail') }}" required autofocus>

                                @if ($errors->has('companyemail'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('companyemail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="datejoinedtocompany" class="col-md-4 col-form-label text-md-right">{{ __('Date joined to company') }}</label>

                            <div class="col-md-6">
                                <input id="datejoinedtocompany" type="date" class="form-control{{ $errors->has('datejoinedtocompany') ? ' is-invalid' : '' }}" name="datejoinedtocompany" value="{{ old('datejoinedtocompany') }}" required autofocus>

                                @if ($errors->has('datejoinedtocompany'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('datejoinedtocompany') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                            <div class="col-md-6">

<select class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" name="designation" value="{{ old('designation') }}" required id="designation" >
        <option value="" selected disablled>Select the Designation</option>

    @foreach ($designations as $designation)
    <option value="{{ $designation->id }}">{{ $designation->designationname }}</option>
    @endforeach
</select>
                                @if ($errors->has('designation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="mainplant" class="col-md-4 col-form-label text-md-right">{{ __('Main plant') }}</label>
                            <div class="col-md-6">

                            <select class="form-control{{ $errors->has('mainplant') ? ' is-invalid' : '' }}" name="mainplant" value="{{ old('mainplant') }}" required id="mainplant" >
                                    <option value="" selected disablled>Select the main palnt name</option>
                                @foreach ($mainplants as $mainplant)
                                     <option value="{{ $mainplant->id }}">{{ $mainplant->mainplant }}</option>
                                     @endforeach
                                 </select>


                                @if ($errors->has('mainplant'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mainplant') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subplant" class="col-md-4 col-form-label text-md-right">{{ __('Sub plant') }}</label>

                            <div class="col-md-6">
                            <select id="subplant"  class="form-control{{ $errors->has('subplant') ? ' is-invalid' : '' }}" name="subplant" value="{{ old('subplant') }}" required>
                            <option value="" selected disablled>Select the sub palnt name</option>
                                @foreach ($subplants as $subplant)
                              <option value="{{ $subplant->id }}">{{ $subplant->subplantname }}</option>
                              @endforeach


                            </select>


                                @if ($errors->has('subplant'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subplant') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>




                        <div class="card">
                            <div class="card-header">{{ __('Register - Personal Information') }}</div>

                            <div class="card-body">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Personal E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobilenumber" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobilenumber" maxlength="10" type="tel" class="form-control{{ $errors->has('mobilenumber') ? ' is-invalid' : '' }}" name="mobilenumber" value="{{ old('mobilenumber') }}" required>

                                @if ($errors->has('mobilenumber'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobilenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" required>

                                @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="idnumber" class="col-md-4 col-form-label text-md-right">{{ __('Nationa ID No.') }}</label>

                                <div class="col-md-6">
                                    <input id="idnumber" maxlength="12" type="string" class="form-control{{ $errors->has('idnumber') ? ' is-invalid' : '' }}" name="idnumber" required>

                                    @if ($errors->has('idnumber'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('idnumber') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6 mt-2">
                                <input id="gender" type="radio" name="gender" value="m" required> Male <br/>
                                <input id="gender" type="radio" name="gender" value="f" required> Female


                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">{{ __('login informations') }}</div>

                    <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                    Please note that your username will be your company email!
                                  </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
