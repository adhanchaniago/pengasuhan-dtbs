<x-guest-layout>

    <!-- Page title -->
    <x-slot name="pageTitle">
        Lupa kata sandi
    </x-slot>

    <!-- Page Headers -->
    <x-slot name="headers">
        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
            <h1 class="text-white"> Lupa kata sandi? Kuy kita bantu ingetin... </h1>
        </div>
    </x-slot>

    <!-- Error template -->
    <x-jet-validation-errors class="mb-4" />

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
                            <small> Masukkan nomor hp kamu!  </small> 
                        </div>

                        {{-- Show Error --}}
                        @if ($errors->first('error'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    {{ $errors->first('error') }}
                                    
                                </div>
                            </div>
                        @endif

                        <form role="form" action="{{ route('login') }}" method="POST">
                            
                            {{-- CSRF Token --}}
                            @csrf
                            <div class="form-group {{ $errors->has('nohp') ? ' has-danger' : '' }} mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend"> <span class="input-group-text"><i class="ni ni-circle-08"></i></span> </div>
                                    <input 
                                        type="text" 
                                        class="form-control {{ $errors->has('nohp') ? ' is-invalid' : '' }}" 
                                        placeholder="Gunakan 62" 
                                        name="nohp" 
                                        value="{{ old('nohp') }}" 
                                        required 
                                        autofocus
                                    /> 
                                </div>
                                @if ($errors->has('nohp'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('nohp') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4"> Kirim </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        @if (Route::has('login'))
                            <div class="text-left">
                                <a href="{{ route('login') }}" class="text-light">
                                    <small> Masuk </small>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>