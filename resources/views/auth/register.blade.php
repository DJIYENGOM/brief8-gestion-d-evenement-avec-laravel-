@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="number"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="number" type="text"
                                        class="form-control @error('number') is-invalid @enderror" name="number"
                                        value="{{ old('number') }}" required autocomplete="number">

                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                           
                            <div class="row mb-3">
                                <label for="role"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    <select id="role" class="form-control @error('role') is-invalid @enderror"
                                        name="role" required>
                                        <option value="2" {{ old('role') == '2' ? 'selected' : '' }}>Client</option>
                                        <option value="1" {{ old('role') == '1' ? 'selected' : '' }}>Association</option>
                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" id="adminFieldsDateCreation"
                            style="display: {{ old('role') == '1' ? 'block' : 'none' }}">
                            <label for="date"
                                class="col-md-4 col-form-label text-md-end">{{ __('Date Creation') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date"
                                    class="form-control @error('date') is-invalid @enderror" name="date"
                                    value="{{ old('date') }}">

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                            <!-- Champs spécifiques à l'admin (Association) -->
                            <div class="row mb-3" id="adminFields"
                                style="display: {{ old('role') == '1' ? 'block' : 'none' }}">
                                <label for="logo"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Logo') }}</label>

                                <div class="col-md-6">
                                    <input id="logo" type="file"
                                        class="form-control @error('logo') is-invalid @enderror" name="logo"
                                       >

                                    @error('logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" id="adminFieldsSlogan"
                                style="display: {{ old('role') == '1' ? 'block' : 'none' }}">
                                <label for="slogan"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Slogan') }}</label>

                                <div class="col-md-6">
                                    <input id="slogan" type="text"
                                        class="form-control @error('slogan') is-invalid @enderror" name="slogan"
                                        value="{{ old('slogan') }}">

                                    @error('slogan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <!-- ... Autres champs existants ... -->


                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>


                            <script>
                                document.getElementById('role').addEventListener('change', function() {
                                    var adminFields = document.getElementById('adminFields');
                                    var adminFieldsSlogan = document.getElementById('adminFieldsSlogan');
                                    var adminFieldsDateCreation = document.getElementById('adminFieldsDateCreation');

                                    if (this.value === '1') {
                                        adminFields.style.display = 'block';
                                        adminFieldsSlogan.style.display = 'block';
                                        adminFieldsDateCreation.style.display='block'; 
                                    } else {
                                        adminFields.style.display = 'none';
                                        adminFieldsSlogan.style.display = 'none';
                                        adminFieldsDateCreation.style.display='none';

                                    }
                                });
                            </script>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
