<?php

namespace App\Http\Controllers;

use App\Propierty;
use App\User;
use App\Properties_photos;
use App\Utilities\GoogleMaps;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //$properties saca to do el contenido del modelo Propierty

        $user = auth()->user()->id;
        $properties= Propierty::all();
        return view('properties.index',compact('properties', 'user'));

    }

    /**
     * Show the form for creating a new resource.
     *https://www.youtube.com/watch?v=Y5Le4maNdM4
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

//        $property=Propierty::find($id);
//        $users=User::all();
        return view('properties.newproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id_user = auth()->user()->id;

        if($request->published != null){
            $published = 0;

        }else{
            $published=1;
        }

        $facadeF=$request->file('facade');
        $facade=$facadeF->store('photos','public');
//
//        var_dump($facadeF);

      $propiedad = Propierty::create([
            'type'=>$request->type,
            'id_user'=>$id_user,
            'state'=>$request->state,
            'description'=>$request->description,
            'price'=>$request->price,
            'direction'=>$request->direction,
            'city'=>$request->city,
            'cp'=>$request->cp,
            'province'=>$request->province,
            'published'=>$published,
            'area'=>$request->area,
            'facade'=>$facade

        ]);

        $photos = $request->file('photo');

        foreach($photos as $photo){
            $path= $photo->store('photos','public');
            Properties_photos::create([
                'propiedad_id' => $propiedad->id,
                'photo' => $path
            ]);

        }


        return redirect()->route('propiedades.index');
//        $a = $request->type;
//        echo "<pre>";
//        var_dump($a);
//        die;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {




        $property=Propierty::find($id);



        $cord = new GoogleMaps();
        $dir= $property["direction"]." ".$property['city'];

        $cordenadas = $cord->getGeocodeData($dir);
        $latitud = $cordenadas[0];
        $longitud = $cordenadas[1];


        $photospropertys = $property->photos()->get('photo');
        if($photospropertys != null){
            $total = count($photospropertys);
        }





        return view('properties.product',compact('property',
            'photospropertys', 'total','latitud','longitud'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property=Propierty::find($id);
        $users=User::all();
        return view('properties.edit',compact('property','users'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $property = Propierty::find($id);
        //Convertir el Strin recibido a input para que funcione el update
        $precio = (int)$request->price;
        $property->update(['city' => $request->city,
            'price' => $precio
//            'id_user'=>$request->id_user
        ]);


        $photos = $request->file('photo');

        if ($photos != null) {

        foreach ($photos as $photo) {
            $path = $photo->store('photos', 'public');
            Properties_photos::create([
                'propiedad_id' => $property->id,
                'photo' => $path
            ]);

        }
    }

//        echo "<pre>";
//       var_dump($property);
//        die();
        return redirect()->route('propiedades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propiedad = Propierty::find($id);
        $propiedad->delete();
              return redirect()->route('propiedades.index');
    }

}
