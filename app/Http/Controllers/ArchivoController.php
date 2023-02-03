<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Sneaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        return view('archivos/archivosEdit', compact('archivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivo $archivo)
    {
        $request->validate([
            'imagen' => 'required',
        ]);

        $file = Archivo::findOrFail($archivo->id);

        if($request->hasFile('imagen')){
            //Se comprueba que exista la foto
            if(Storage::exists($file->ubicacion))
            {
                //En esta linea se borra la ubicación local
                Storage::delete($file->ubicacion);
            }
            $file->ubicacion = Storage::putFile('public', $request->file('imagen'));
            $file->nombre_original = $request->file('imagen')->getClientOriginalName();
        }

        $file->update($request->only('ubicacion','nombre_original'));

        return redirect('/sneaker')->with([
            'actualizarimagen' => 'Imagen actualizada correctamente.'
        ]);
    }
}
