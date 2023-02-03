@component('mail::message')
Notifica Venta Registrada Exitosamente

Saludos Coordiales Emplead@: {{ $venta->empleado->nombre }} la venta que realizo fue registrada de manera éxitosa.

@component('mail::button', ['url' => route('venta.show', $venta)])
Detalles venta 
@endcomponent

Thanks, <br>
{{ config('app.name') }}
@endcomponent