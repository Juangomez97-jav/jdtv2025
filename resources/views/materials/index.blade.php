@extends('layauts.navbar')

@section('titulo','Materiales')

@section('contenido')
<div>
  <div class="text-center text-5xl font-bold my-20">
    <h2>MATERIALES</h2>
  </div>
    

    <div class="overflow-x-auto my-20">
        <table class="table">
          <!-- head -->
          <thead>
            <tr>
              <th></th>
              <th>NOMBRE</th>
              <th>CANTIDAD</th>
              <th>PRECIO</th>
              <th>OPCIONES</th>
            </tr>
          </thead>
          @foreach ($materials as $material)
          <tbody>
            <!-- row 1 -->
            <tr class="bg-base-200">
              <th>{{ $material->id }}</th>
              <td>{{ $material->nombre}}</td>
              <td>{{ $material->cantidad}}</td>
              <td>{{ $material->precio }}</td>
              <td>
                <div class="stat">
                    <div class="stat-figure flex justify-initial">
                      <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-outline btn-success">Editar</a>
                      <form action="{{ route('materials.destroy', $material->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline btn-error mx-2">Eliminar</button>
                      </form>
                    </div>
                  </div>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    
</div>
<div class="text-center my-6">
  <a href="{{ route('materials.create') }}" class="btn btn-outline btn-success">Crear Material</a>
</div>
@endsection