<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <title>Editar Cita</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

   <div class="container mt-5">

      <h1>Editar Cita</h1>

      <form action="/citas/{{ $cita->id }}" method="POST">
         @csrf
         @method('PUT')

         <input class="form-control mb-2" type="text" name="nombre" value="{{ $cita->nombre }}" required>

         <input class="form-control mb-2" type="text" name="telefono" value="{{ $cita->telefono }}" required>

         <input class="form-control mb-2" type="email" name="correo" value="{{ $cita->correo }}" required>

         <input class="form-control mb-2" type="date" name="fecha" value="{{ $cita->fecha }}" required>

         <input class="form-control mb-2" type="time" name="hora" value="{{ $cita->hora }}" required>

         <textarea class="form-control mb-2" name="motivo" required>{{ $cita->motivo }}</textarea>

         <button class="btn btn-primary">Actualizar</button>

         <a href="/citas" class="btn btn-secondary">Cancelar</a>
      </form>

   </div>

</body>

</html>