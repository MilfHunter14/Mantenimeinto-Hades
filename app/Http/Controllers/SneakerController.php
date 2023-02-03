<?php

namespace App\Http\Controllers;

use App\Models\Sneaker;
use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class SneakerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sneakers = Sneaker::all();
        return view('sneakers.sneakersIndex', compact('sneakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sneakers.sneakersCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required | max:255',
            'marca' => 'required | max:255',
            'precio' => 'integer | min:1000' ,
            'talla' => 'required',
            'stock' => 'integer | min:0',
            'imagen' => 'required',
        ]);

        $sneaker = Sneaker::create($request->all());
        /* Sneaker::create($request->all()); */
        
        // Imágenes //
        //Verifica si el archivo es válido
        if ($request->file('imagen')->isValid())
        {
            //Nos devolverá el path de la ubicación del archivo
            $ubicacion = $request->imagen->store('public');
            //Crea una instancia
            $imagen = new Archivo();
            //Se le asigna la ubicación
            $imagen->ubicacion = $ubicacion;
            //Se le asigna el nombre original
            $imagen->nombre_original = $request->imagen->getClientOriginalName();

            //Se guarda la instancia
            $sneaker->archivos()->save($imagen);
        }
        
        return redirect('/sneaker')->with([
            'insertar' => 'El sneaker se ha insertado con éxito en la base de datos.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function show(Sneaker $sneaker)
    {
        return view('sneakers.sneakersShow', compact('sneaker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Sneaker $sneaker)
    {
        return view('sneakers.sneakersEdit', compact('sneaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sneaker $sneaker)
    {
        $request->validate([
            'nombre' => 'required | max:255',
            'marca' => 'required | max:255',
            'precio' => 'integer | min:1000' ,
            'talla' => 'required | max:255',
            'stock' => 'integer | min:0',
        ]);
        
        Sneaker::where('id', $sneaker->id)->update($request->except('_token', '_method'));

        $sneaker_id = $sneaker->id;
        return redirect('/sneaker')->with([
            'editar' => 'El sneaker con el ID: '. $sneaker_id . ' ha sido editado en el sistema correctamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sneaker $sneaker)
    {
        $notification = '';
        $count=0;
        $count2=0;
        $sneaker_id = $sneaker->id;
        
        // Contamos los registros en las relaciones
        $count+=count($sneaker->ventas);
        // Comprobamos si existen registros 
        if($count>0) 
        {
            return redirect('/sneaker')->with([
                'validacion' => 'El sneaker con el ID: '. $sneaker_id . ' no puede ser eliminado ya que esta ligado a una venta, verifica el listado de ventas.'
            ]);
        } else {
            //Eliminar Imagenes relacionadas con empleado
            foreach($sneaker->archivos as $archivo){
                $count2++;
                $file = Archivo::whereId($archivo->id)->firstOrFail();
                //En caso de que se suba más de un archivo, se eliminarán todos sus archivos relacionados
                if($count2 > 0){
                    unlink(public_path(Storage::url($file->ubicacion)));
                }
            }

            $sneaker->delete();
        }

        return redirect('/sneaker')->with([
            'delete' => 'El sneaker con el ID: '. $sneaker_id . ' ha sido eliminado del sistema correctamente.'
        ]);
    }
}


