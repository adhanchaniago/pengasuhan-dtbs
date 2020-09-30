<x-guest-layout>

    <!-- Page title -->
    <x-slot name="pageTitle">
        Masuk
    </x-slot>

    <!-- Page Headers -->
    <x-slot name="headers">
        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
            <h1 class="text-white"> Assalamualaikum </h1>
            <p class="text-lead text-white"> Selamat Datang di aplikasi pondok pesantren {{ config('app.name') }} </p>
        </div>
    </x-slot>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4"> 
                            <small> Silahkan masuk untuk melanjutkan </small> 
                        </div>
                        
                        <!-- Error template -->
                        <x-jet-validation-errors class="alert alert-danger alert-dismissible show fade" />

                        <form role="form" action="{{ route('login') }}" method="POST">
                            
                            {{-- CSRF Token --}}
                            @csrf
                            <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend"> <span class="input-group-text"><i class="ni ni-circle-08"></i></span> </div>
                                    <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Email / Username" name="username" value="{{ old('username') }}" required autofocus> 
                                </div>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend"> <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span> </div>
                                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Kata sandi" name="password" required> 
                                </div>
                                @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                <label class="custom-control-label" for=" customCheckLogin"> <span class="text-muted"> Ingat saya </span> </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4"> Masuk </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-light">
                                <small> Lupa kata sandi? </small>
                            </a>
                        @endif
                        
                    </div>
                    @if (Route::has('register'))
                        <div class="col-6 text-right">
                            <a href="{{ route('register') }}" class="text-light">
                                <small> Daftar </small>
                            </a>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>