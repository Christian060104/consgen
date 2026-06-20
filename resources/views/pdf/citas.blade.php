<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <title>Reporte de Citas</title>
</head>

<body>

   <h2>Reporte de Citas Médicas</h2>

   <table border="1" width="100%" cellpadding="5">
      <tr>
         <th>Nombre</th>
         <th>Teléfono</th>
         <th>Correo</th>
         <th>Fecha</th>
         <th>Hora</th>
         <th>Motivo</th>
      </tr>

      @foreach($citas as $cita)
      <tr>
         <td>{{ $cita->nombre }}</td>
         <td>{{ $cita->telefono }}</td>
         <td>{{ $cita->correo }}</td>
         <td>{{ $cita->fecha }}</td>
         <td>{{ $cita->hora }}</td>
         <td>{{ $cita->motivo }}</td>
      </tr>
      @endforeach

   </table>

</body>

</html>