<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Venta;
use App\Models\Sneaker;
use App\Mail\VentaRegistrada;
use Illuminate\Support\Facades\Mail;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class VentaController extends Controller
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
        //Obtenemos las variables de los modelos que estan en venta y los mandamos a la vista*/
        /* $ventas = Venta::all(); */
        /* With hará una consulta por cada relación en lugar de hacer consultas registro por registro */
        $ventas = Venta::with('empleado', 'sneakers', 'user')->get();
        return view('ventas/ventasIndex', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtenemos la información de los modelos para poderlos presentar en Create
        $empleados = Empleado::all();
        $sneakers = Sneaker::all();
        return view('ventas/ventasCreate', compact('empleados', 'sneakers'));
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
            'empleado_id' => 'required', 
            'fecha_venta' =>'required|date',
            'forma_pago' => 'required|max:255',
        ]);

        //Agregamos el user que esta logeado
        $request->merge(['user_id' => Auth::id()]);
        $venta = Venta::create($request->all());

        //$venta se ira a la funcion de sneakers(muchos a muchos)
        //El attach() permite recibir un solo id o un arreglo  de id
        $venta->sneakers()->attach($request->sneakers_id);

        return redirect('/venta')->with([
            'insertar' => 'La venta se ha insertado con éxito en la base de datos.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        
        //Obtenemos la información de los modelos para poderlos presentar en Create
        $empleados = Empleado::all();
        $sneakers = Sneaker::all();
        return view('ventas/ventasShow', compact('venta','empleados','sneakers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //Si el usuario loggeado no creo la venta, no podra editarla
        if (! Gate::allows('edita-venta', $venta)) {
            abort(403);
        }
    
        $empleados = Empleado::all();
        $sneakers = Sneaker::all();
        return view('ventas/ventasEdit', compact('venta', 'empleados', 'sneakers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'empleado_id' => 'required',
            'fecha_venta' =>'required|date',
            'forma_pago' => 'required|max:255',
        ]);

         //Añadimos las llaves foraneas
         //$request->merge(['empleado_id', 'sneaker_id']);


        //La información viene de empleadosEdit.blade.php y se guarda
        Venta::where('id', $venta->id)->update($request->except('_token', '_method', 'sneakers_id'));

        //Sincroniza el arreglo recibido de la base de datos
        $venta->sneakers()->sync($request->sneakers_id); 
        
        $venta_id = $venta->id;
        return redirect('/venta')->with([
            'editar' => 'La venta con el ID: '. $venta_id . ' ha sido editada en el sistema correctamente.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //Si el usuario loggeado no creo la venta, no podrá eliminarla
        if (! Gate::allows('elimina-venta', $venta)) {
            abort(403);
        }

        //Elimina la relación entre el sneaker y la venta.
        $venta->sneakers()->detach();
        
        //La información viene de index y se elimina.
        $venta->delete();
        
        $venta_id = $venta->id;

        return redirect('/venta')->with([
            'deletePapelera' => 'La venta con el ID: '. $venta_id . ' ha sido enviado a la papelera correctamente.'
        ]);
        
    }

    /* Agregamos las funciones con las cuales nuestros softDeletes podrán funcionar de manera correcta */
    public function ventasPapelera(){
        $ventas = Venta::onlyTrashed()->get();
        return view('ventas/ventasPapelera', compact('ventas'));
    }

    public function ventasRestore($id){
        $venta = Venta::withTrashed()->find($id);
        $venta->restore();

        $venta_id = $venta->id;
        return redirect('/venta')->with([
            'restaurar' => 'La venta con el ID: '. $venta_id . ' ha sido restaurada al sistema correctamente.'
        ]);
    }

    public function ventasDelete($id){
        $venta = Venta::withTrashed()->find($id);
        $venta->forceDelete();

        $venta_id = $venta->id;
        return redirect('/ventasPapelera')->with([
            'delete' => 'La venta con el ID: '. $venta_id . ' ha sido eliminado del sistema correctamente.'
        ]);
    }

    public function notificacionVenta(Venta $venta)
    {
        Mail::to($venta->empleado->email)->send(new VentaRegistrada($venta));

        return redirect('/venta')->with([
            'correo' => 'La notificación ha sido enviada con éxito.'
        ]);
    }
}
