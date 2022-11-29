@extends('layouts.main')

@section('tartalom')
<div class="off-canvas-content" data-off-canvas-content>
    <div class="title-bar hide-for-large">
        <div class="title-bar-left">
            <button class="menu-icon" type="button" data-toggle="fomenu"></button>
            <span class="title-bar-title">Laravel képgaléria</span>
        </div>
    </div>
    <div class="callout primary">
        <div class="row column">
            <h1>Belépés</h1>
            <p class="lead">A képek feltöltése csak bejelenkezett felhasználóknak lehetséges.</p>
        </div>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="margo">Készíts új képgalériát</div>
        <div class="margo">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email cím</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Jelszó</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Emlékezz rám!
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="button">
                        Belépés
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                           Elfelejtett jelszó
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
    </div>


</div>
@stop

