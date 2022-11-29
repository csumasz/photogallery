
@extends('layouts.main')

@section('tartalom')
<div class="off-canvas-content" data-off-canvas-content>
          <div class="title-bar hide-for-large">
            <div class="title-bar-left">
              <button class="menu-icon" type="button" data-toggle="fomenu"></button>
              <span class="title-bar-title">Laravel képgaléria</span>
            </div>
          </div>

          <!--message-->
          @if(Session::has('uzenet'))
          <div class="callout success" onClick="$(this).fadeOut()">
            {{Session::get('uzenet')}}
          ><button class="close-button" type="button">&times;</button>
          </div>
          @endif


          <div class="callout primary">
            <div class="row column">
                <a href="/">Vissza</a>  
                <h1>{{$gallery->name}}</h1>
                <p class="lead">{{$gallery->description}}</p>
                <?php
                if(Auth::check()){//Bejelentkezettséghez kötött láthatóság
                ?>
                   <a class="button gomb" href="/photo/create/{{$gallery->id}}">Új fotó feltöltése</a>
                <?php }?>
              </div>
          </div>
          <div class="row small-up-2 medium-up-3 large-up-4">
            <?php
              foreach($photos as $photo) {
            ?>
              <div class="column">
                <a href="/photo/details/{{$photo->id}}"><img class="thumbnail" src="/fotok/{{ $gallery->id }}/{{ $photo->image }}"></a>
                <h5>{{ $photo->title }}</h5>
                <p>{{ $photo->description }}</p>
              </div>
            <?php
              }
              
            ?>
          </div>

          
        </div>
@stop

