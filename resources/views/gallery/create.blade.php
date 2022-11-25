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
            <h1>Képgalériák</h1>
            <p class="lead">Készíts új képgalériát és töltsd fel!</p>
        </div>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="margo">Készíts új képgalériát</div>
        <div class="margo">

            <!-- form létrehozása form helper segítségével -->
            {!! Form::open(['action' => 'GalleryController@store', 'enctype' => 'multipart/form-data']) !!}

            {!! Form::label('nev', 'Név') !!}
            {!! Form::text('nev', $value=null, $attributes=['placehoder' => 'Galéria neve', 'name' => 'nev']) !!}

            {!! Form::label('leiras', 'Leírás') !!}
            {!! Form::text('leiras', $value=null, $attributes=['placehoder' => 'Galéria leírása', 'name' => 'leiras'])
            !!}

            {!! Form::label('boritokep', 'Borítókép') !!}
            {!! Form::file('boritokep') !!}

            {!! Form::submit('Létrehozás', $attributes=['class' => 'button']) !!}

            {!! Form::close() !!}
        </div>
    </div>


</div>
@stop