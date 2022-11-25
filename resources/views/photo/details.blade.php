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
            <a href="/gallery/show/{{ $photo->gallery_id }}">Vissza a fotókhoz</a>  
            <h1>{{ $photo->title }}</h1>
            <p class="lead">{{ $photo->description }}</p>
            <p>Itt készült: {{ $photo->location }}</p>
        </div>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        
        <div class="margo">
            <img class="nagykep" src="/fotok/{{ $photo->gallery_id }}/{{ $photo->image }}">
        </div>
    </div>
</div>
@stop