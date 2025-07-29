@extends('layauts.navbar')

@section('titulo','Pagos')

@section('contenido')
<div class="my-40">
  <form method="POST">
   @csrf
           <div>
             <h2 class="text-center text-2xl font-bold text-success">RECAUDO</h2>
           </div>
           <div class="mx-60 my-4">
            <input id="input" class="input border-neutral" method="POST">
            <button id="buscar" class="btn btn bg-green-500" method="POST">Buscar</button>
           </div>
          
           {{-- formulario --}}
           <div>
           <h2 class="text-center font-bold">DATOS DEL CLIENTE</h2>
           @foreach ($pagos as $pago)
            <div class="mx-60">
             <p class="font-bold">Cliente: <span id="cliente-nombre" class="font-normal">{{$pago->cliente->nombres}} {{$pago->cliente->apellidos}}</span></p>
             <p class="font-bold">Identificación: <span id="cliente-identificacion" class="font-normal">{{$pago->cliente->identificacion}}</span></p>
             <p class="font-bold">Dirección: <span id="cliente-direccion" class="font-normal">Barrio: {{$pago->cliente->barrio}} Calle: {{$pago->cliente->calle}} Poste: {{$pago->cliente->poste}}</span></p>
             <p class="font-bold">Servicio: <span id="cliente-servicio" class="font-normal">{{$pago->servicio->nombre}}</span></p>
             <div id="search-result" class="mt-4"></div>
           </div>
           @endforeach
          
           </div>
           <div>
            <h2 class="text-center font-bold">PAGOS PENDIENTES</h2>
            <table class="justifice-center border-separate border-spacing-x-6 dark:border mx-auto my-4">
              <thead class="text-center">
                <tr>
                  <th class="dark:border">N° Factura</th>
                  <th class="dark:border">Saldo anterior</th>
                  <th class="dark:border">Saldo actual</th>
                  <th class="dark:border">Fecha ult pago</th>
                </tr>
              </thead>
              <tbody class="text-center">
               <tr>
                  <td>0000</td>
                  <td>2000</td>
                  <td>0000</td>
                  <td>09/05/25</td>
               </tr>
              </tbody>
            </table>
            <div class="text-center">
            <div>
            <span class="font-bold">Saldo a pagar  <input class="border-neutral mx-2"></span>
            <span class="font-bold">Efectivo  <input class="border-neutral mx-2"></span>
            <span class="font-bold">Vueltas  <input class="border-neutral mx-2"></span>
           </div>
           <div class="my-6">
            <button class="btn bg-green-400">Pagar</button>
          <button class="btn btn-outline btn-error mx-2">Cancelar</button>
           </div>
            </div>
  </form>
</div>
@endsection
