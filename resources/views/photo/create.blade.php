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
            <h1>Új fotó feltöltése</h1>
            <p class="lead">Készíts új fotót és töltsd fel!</p>
        </div>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="margo">Készíts új képgalériát</div>
        <div class="margo">

            <!-- form létrehozása form helper segítségével -->
            {!! Form::open(['action' => 'PhotoController@store', 'enctype' => 'multipart/form-data']) !!}

            {!! Form::label('cim', 'Cím') !!}
            {!! Form::text('cim', $value=null, $attributes=['placehoder' => 'fotó címe', 'name' => 'cim']) !!}

            {!! Form::label('leiras', 'Leírás') !!}
            {!! Form::text('leiras', $value=null, $attributes=['placehoder' => 'Fotó leírása', 'name' => 'leiras'])
            !!}
            {!! Form::label('helyszin', 'Helyszín(ha van') !!}
            {!! Form::text('helyszin', $value=null, $attributes=['placehoder' => 'Helysín leírása', 'name' => 'helyszin'])
            !!}

            {!! Form::label('kep', 'Kép') !!}
            {!! Form::file('kep') !!}

            <input type="hidden" name="galeria" value="{{$gallery_id}}">

            {!! Form::submit('Feltöltés', $attributes=['class' => 'button']) !!}

            {!! Form::close() !!}
        </div>
    </div>


</div>
@stop