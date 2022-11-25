<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//Use database

class PhotoController extends Controller
{
    private $photo_tabla = 'photos';

    public function create(Request $gallery_id){
        return view('photo/create', compact('gallery_id'));
    }

    public function store(Request $request){
        $cim = $request -> input('cim');
        $leiras = $request -> input('leiras');
        $helyszin = $request -> input('helyszin');
        $kep = $request -> file('kep');
        $galeria = $request -> input('galeria');
        $tulajdonos = 1;
        
        //image save to map
        if($kep){
            //die('ok');
            $fajlnev = $kep->getClientOriginalName();
            $kep->move(public_path('fotok/'.$galeria), $fajlnev);

            //data save to database
            DB::table($this->photo_tabla)->insert(
                [
                    'title' => $cim,
                    'description' => $leiras,
                    'location' => $helyszin,
                    'image' => $fajlnev,
                    'gallery_id' => $galeria,
                    'owner_id' => $tulajdonos
                ]
                );
            //back to home page and write message
            return \Redirect::route('gallery.show', array('id'=>$galeria))->with('uzenet', 'A fotót sikeresen feltöltötted!');//location to home page
        
        }

        else{
            //die('hiba');
            return \Redirect::route('gallery.show', array('id'=>$galeria))->with('uzenet', 'A fotó feltöltése nem sikerült!');//location to home page

        }

        
    }
    
    public function details($id){
        $photo = DB::table($this->photo_tabla)->where('id',$id)->first();
        return view('photo/details', compact('photo'));
    }
}
