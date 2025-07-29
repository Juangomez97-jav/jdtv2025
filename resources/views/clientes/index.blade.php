@extends('layauts.navbar')

@section('titulo','Clientes')

@section('contenido')
<div class="overflow-x-auto">
    <table class="table table-zebra text-center my-20">
      <!-- head -->
      <thead>
        <tr>
          <th></th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Telefono</th>
          <th>Direccion</th>
          <th>Saldo</th>
          <th>Empresa</th>
          <th>Servicio</th>
          <th>Estado</th>
        </tr>
      </thead>
      @foreach ($clientes as $cliente)
      <tbody>
        <tr>
          <th>{{ $cliente->id }}</th>
          <td>{{ $cliente->nombres }}</td>
          <td>{{ $cliente->apellidos }}</td>
          <td>{{ $cliente->telefono }}</td>
          <td>Barrio: {{ $cliente->barrio }} Calle: {{ $cliente->calle }} Poste: {{ $cliente->poste }}</td>
          @php
          $mesActual = now()->format('Y-m');
          $saldoMes = $cliente->saldos ? $cliente->saldos->firstWhere('mes', $mesActual) : null;
          @endphp
          <td>{{ $saldoMes ? '$'.$saldoMes->monto : 'Sin saldo generado' }}</td>
          <td>{{$cliente->empresa->nombre}} {{$cliente->empresa->sede}}</td>
          <td>{{$cliente->servicio->nombre}}</td>
          <th>{{$cliente->cliente_estado->nombre}}</th>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
  </div>
<div class="flex justify-center">
<a href="{{route('clientes.create')}}" class="btn btn-outline btn-info mx-4">Nuevo Cliente</a>
</div>
</div>
@endsection