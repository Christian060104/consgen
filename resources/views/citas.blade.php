<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <title>Agendar Cita</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

   <div class="container mt-5">

      <h1 class="text-center mb-4">Sistema de Citas Médicas</h1>

      @if(session('success'))
      <div class="alert alert-success">
         {{ session('success') }}
      </div>
      @endif

      <div class="card p-4 mb-4">
         <form action="/citas" method="POST">
            @csrf

            <div class="row">
               <div class="col-md-6 mb-3">
                  <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
               </div>

               <div class="col-md-6 mb-3">
                  <input class="form-control" type="text" name="telefono" placeholder="Teléfono" required>
               </div>

               <div class="col-md-6 mb-3">
                  <input class="form-control" type="email" name="correo" placeholder="Correo" required>
               </div>

               <div class="col-md-3 mb-3">
                  <input class="form-control" type="date" name="fecha" required>
               </div>

               <div class="col-md-3 mb-3">
                  <input class="form-control" type="time" name="hora" required>
               </div>

               <div class="col-12 mb-3">
                  <textarea class="form-control" name="motivo" placeholder="Motivo de la cita" required></textarea>
               </div>
            </div>

            <button class="btn btn-primary w-100">Guardar Cita</button>
         </form>
      </div>
      <div class="card p-4">

         <h3 class="mb-3">Lista de Citas</h3>

         <table class="table table-striped">
            <thead>
               <tr>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Motivo</th>
                  <th>Acciones
                  </th>
               </tr>
            </thead>

            <tbody>
               @foreach($citas as $cita)
               <tr>
                  <td>{{ $cita->nombre }}</td>
                  <td>{{ $cita->telefono }}</td>
                  <td>{{ $cita->correo }}</td>
                  <td>{{ $cita->fecha }}</td>
                  <td>{{ $cita->hora }}</td>
                  <td>{{ $cita->motivo }}</td>

                  <td>
                     <a href="/citas/{{ $cita->id }}/edit" class="btn btn-warning btn-sm">
                        Editar
                     </a>

                     <form action="/citas/{{ $cita->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                           Eliminar
                        </button>
                     </form>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>

      </div>

   </div>

</body>

</html>