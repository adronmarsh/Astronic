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
                <div class="col-md-12 d-flex justify-content-left flex-wrap">
                    <i class="material-icons setting-icon">language</i>
                    <div>Idioma</div>
                </div>

                <select id="language-select" name="language" class="form-control"
                    onchange="document.getElementById('language-form').submit()">
                    <option value="es" @if (app()->getLocale() == 'es') selected @endif>Español</option>
                    <option value="en" @if (app()->getLocale() == 'en') selected @endif>English</option>
                </select>
            </form>
        </div>

        <div class="row mt-5">
            <form id="font-form" method="POST" action="{{ route('setFont') }}">
                @csrf
                <div class="col-md-12 d-flex justify-content-left flex-wrap">
                    <i class="material-icons setting-icon">text_format</i>
                    <div>Fuente</div>
                </div>
                <select id="font-family" name="font-family" class="form-control"
                    onchange="document.getElementById('font-form').submit()">
                    <option value="Arial" {{ session('fontFamily') === 'Arial' ? 'selected' : '' }}>Arial</option>
                    <option value="Times New Roman" {{ session('fontFamily') === 'Times New Roman' ? 'selected' : '' }}>
                        Times New Roman</option>
                    <option value="Verdana" {{ session('fontFamily') === 'Verdana' ? 'selected' : '' }}>Verdana</option>
                    <option value="Roboto" {{ session('fontFamily') === 'Roboto' ? 'selected' : '' }}>Roboto</option>
                </select>
            </form>
        </div>

        <div class="row mt-5">
            <form id="location-form" method="POST" action="{{ route('setLocation') }}">
                @csrf
                <div class="col-md-12 d-flex justify-content-left flex-wrap">
                    <i class="material-icons setting-icon">location_on</i>
                    <div>Ubicación</div>
                </div>
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
                    <div class="col-md-4 col-form-label text-md-right">Longitud</div>
                    <div class="col-md-6">
                        <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror"
                            name="longitude" value="{{ old('longitude') }}" required autocomplete="longitude" autofocus>

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
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="material-icons setting-icon">arrow_downward</i>
                            <div>Bajar a la membresía gratuita</div>
                        </div>
                    </a>
                </div>
            @else
                <div class="col-md-12 mb-5">
                    <a href="{{ route('upgrade') }}" class="btn btn-primary btn-block">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="material-icons setting-icon">upgrade</i>
                            <div>Suscribirse</div>
                        </div>
                    </a>
                </div>
            @endif
        </div>


    </section>

@endsection
