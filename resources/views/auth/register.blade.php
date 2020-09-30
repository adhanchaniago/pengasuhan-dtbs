<x-guest-layout>

    <!-- Page title -->
    <x-slot name="pageTitle">
        Daftar
    </x-slot>

    <!-- Javascript Library -->
    <x-slot name="jsLib">
        <script src="{{ asset('argon') }}/js/components/password-strength/zxcvbn.min.js"></script>
        <script src="{{ asset('argon') }}/js/components/password-strength/check.min.js"></script>
    </x-slot>

    <!-- Page Headers -->
    <x-slot name="headers">
        <div class="col-xl-6 col-lg-6 col-md-8 px-5">
            <h1 class="text-white"> Bagian dari keluarga kita? yuk daftar. </h1>
        </div>
    </x-slot>
    
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="row mt-3">
                    <div class="col-6">
                        <a href="{{ route('login') }}" class="text-light">
                            <i class="fa fa-arrow-left"></i><small> Kembali </small>
                        </a>
                    </div>
                </div>
                <div class="card bg-secondary border-0">
                    <div class="card-body px-lg-5 py-lg-3">

                        <div class="text-center text-muted mb-4 mt-4"> 
                            <h4> Buat akun baru </h4> 
                        </div>
    
                        <!-- Error template -->
                        <x-jet-validation-errors class="alert alert-danger alert-dismissible show fade" />
    
                        <form id="form-registration" role="form" action="{{ route('register') }}" method="POST">
                            @csrf
    
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative {{ $errors->has('name') ? ' has-danger' : '' }} mb-3">
                                    <div class="input-group-prepend"> <span class="input-group-text"><i class="ni ni-single-02"></i></span> </div>
                                    <input 
                                        type="text" 
                                        class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                        name="name" 
                                        id="name" 
                                        value="{{ old('name') }}" 
                                        placeholder="Nama Lengkap"
                                    /> 
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative {{ $errors->has('username') ? ' has-danger' : '' }} mb-3">
                                    <div class="input-group-prepend"> <span class="input-group-text"><i class="ni ni-circle-08"></i></span> </div>
                                    <input 

                                        type="text" 
                                        class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" 
                                        name="username" 
                                        id="username" 
                                        value="{{ old('username') }}" 
                                        placeholder="Nama pengguna"
                                    /> 
                                </div>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative {{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                    <div class="input-group-prepend"> <span class="input-group-text"><i class="ni ni-email-83"></i></span> </div>
                                    <input 
                                        type="email" 
                                        class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                        name="email" 
                                        id="email" 
                                        value="{{ old('email') }}" 
                                        placeholder="Email"
                                    /> 
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
    
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative {{ $errors->has('nohp') ? ' has-danger' : '' }} mb-3">
                                    <div class="input-group-prepend"> <span class="input-group-text"><i class="fa fa-phone"></i></span> </div>
                                    <input 
                                        type="text" 
                                        class="form-control {{ $errors->has('nohp') ? ' is-invalid' : '' }}" 
                                        name="nohp" 
                                        id="nohp" 
                                        value="{{ old('nohp') }}" 
                                        placeholder="Gunakan 62"
                                    /> 
                                </div>
                                @if ($errors->has('nohp'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('nohp') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative {{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend"> <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span> </div>
                                    <input 
                                        type="password" 
                                        class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                        name="password" 
                                        id="password" 
                                        onkeyup="passwordCheck()" 
                                        placeholder="Kata sandi"
                                    /> 
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <div class="text-muted font-italic">
                                    <small> 
                                        Kekuatan kata sandi: <span id="password-strength"> </span>
                                    </small>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend"> <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span> </div>
                                    <input 
                                        type="password" 
                                        class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" 
                                        name="password_confirmation" 
                                        id="password_confirmation" 
                                        placeholder="Konfirmasi kata sandi"
                                    /> 
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                <div class="text-muted font-italic">
                                    <small> 
                                        <span id="password-confirm" class=""> </span>
                                    </small>
                                </div>
                            </div>
    
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox {{ $errors->has('agree') ? ' has-danger' : '' }}">
                                        <input type="checkbox" name="agree" class="custom-control-input" id="agree" disabled>
                                        <label class="custom-control-label" for="agree">
                                            <span class="text-muted">
                                                Saya setuju dengan <a href="javascript:void(0);"> Syarat dan Ketentuan </a>
                                            </span> 
                                        </label>
                                        @if ($errors->has('agree'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('agree') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4" id="register" disabled> Daftar </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
