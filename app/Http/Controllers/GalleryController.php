<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//Use database

class GalleryController extends Controller
{
    private $galeria_tabla = 'galleries';
    private $photo_tabla = 'photos';
    //
    public function index(){
        $galleries = DB::table($this->galeria_tabla)->get();//read table from database
        return view('gallery/index', compact('galleries'));
    }

    public function create(Request $gallery_id){
        return view('gallery/create', compact('gallery_id'));
    }

    public function store(Request $request){
        $nev = $request -> input('nev');
        $leiras = $request -> input('leiras');
        $boritokep = $request -> file('boritokep');
        $tulajdonos = 1;
        
        //image save to map
        if($boritokep){
            //die('ok');
            $fajlnev = $boritokep->getClientOriginalName();
            $boritokep->move(public_path('boritokepek'), $fajlnev);
        }
        else{
            //die('hiba');
            $fajlnev = 'nincskep.jpg';
        }

        //data save to database
        DB::table($this->galeria_tabla)->insert(
            [
                'name' => $nev,
                'description' => $leiras,
                'cover_image' => $fajlnev,
                'owner_id' => $tulajdonos
            ]
            );
        //back to home page and write message
        return \Redirect::route('gallery.index')->with('uzenet', 'A képgalériát sikeresen létrehoztad!');//location to home page
    }

    //TODO:Route not 
    public function show($id){
        $gallery = DB::table($this->galeria_tabla)->where('id',$id)->first();
        $photos = DB::table($this->photo_tabla)->where('gallery_id',$id)->get();
        return view('gallery/show', compact('gallery', 'photos'));
    }
}  
?>