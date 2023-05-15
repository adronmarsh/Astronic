@extends('layout')

@section('title', 'Settings')

@section('content')
    <section class="mt-5 container col-md-6 mx-auto">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="mb-5">{{ __('messages.settings-text') }} <h1>
            </div>
        </div>

        <div class="row mt-5">
            <form id="language-form" method="POST" action="{{ route('setLanguage') }}">
                @csrf
                <div class="col-md-12 d-flex justify-content-center flex-wrap">
                    <i class="material-icons setting-icon">language</i>
                    <div>Idioma</div>
                </div>

                <select id="language-select" name="language" class="form-control">
                    <option value="es" @if (app()->getLocale() == 'es') selected @endif>Español</option>
                    <option value="en" @if (app()->getLocale() == 'en') selected @endif>English</option>
                </select>
                <button type="submit" class="btn btn-primary mt-2">Guardar</button>
            </form>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 d-flex justify-content-center flex-wrap">
                <i class="material-icons setting-icon">text_format</i>
                <div>Fuente</div>
            </div>
            <form id="font-form" method="POST" action="{{ route('setFont') }}">
                @csrf
                <select id="font-family" name="font-family" class="form-control">
                    <option value="Arial" {{ session('fontFamily') === 'Arial' ? 'selected' : '' }}>Arial</option>
                    <option value="Times New Roman" {{ session('fontFamily') === 'Times New Roman' ? 'selected' : '' }}>
                        Times New Roman</option>
                    <option value="Verdana" {{ session('fontFamily') === 'Verdana' ? 'selected' : '' }}>Verdana</option>
                    <option value="Roboto" {{ session('fontFamily') === 'Roboto' ? 'selected' : '' }}>Roboto</option>
                </select>

                <button type="submit" id="apply-font-btn" class="btn btn-primary mt-2">Aplicar fuente</button>
            </form>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 d-flex justify-content-center flex-wrap">
                <i class="material-icons setting-icon">location_on</i>
                <div>Ubicación</div>
            </div>
            <form method="POST" action="{{ route('setLocation') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-md-4 col-form-label text-md-right">Latitud</div>

                    <div class="col-md-6">
                        <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror"
                            name="latitude" value="{{ old('latitude') }}" required autocomplete="latitude" autofocus>

                        @error('latitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="longitude" class="col-md-4 col-form-label text-md-right">Longitud</label>

                    <div class="col-md-6">
                        <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror"
                            name="longitude" value="{{ old('longitude') }}" required autocomplete="longitude">

                        @error('longitude')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary mt-2">Guardar ubicación</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row mt-5">
            @if (auth()->user()->premium)
                <div class="col-md-12 mb-5">
                    <a href="{{ route('downgrade') }}" class="btn btn-danger btn-block">
                        <i class="material-icons setting-icon">arrow_downward</i> Bajar a la membresía gratuita
                    </a>
                </div>
            @else
                <div class="col-md-12 mb-5">
                    <a href="{{ route('upgrade') }}" class="btn btn-primary btn-block">
                        <i class="material-icons setting-icon">upgrade</i> Suscribirse
                    </a>
                </div>
            @endif
        </div>


    </section>

@endsection
