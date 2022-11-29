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
            <h1>Elfelejtett jelszó újragenerálása</h1>
            
        </div>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="margo">Készíts új jelszót</div>
        <div class="margo">
            <form method="POST" action="{{ route('password.email') }}">
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

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="button">
                            Jelszó küldése
                        </button>
                    </div>
                </div>
            </form>
    </div>
    </div>


</div>
@stop
