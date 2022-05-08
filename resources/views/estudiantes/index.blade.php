<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela</title>
</head>
<body>
    <h1>Consulta de Informacion de Estudiantes</h1>
    @if(Session::has('exito'))
        <p>{{Session::get('exito')}}</p>
    @endif
    @if(Session::has('error'))
        <p>{{Session::get('error')}}</p>
    @endif
    <a href="{{route('estudiantes.create')}}">Registrar Estudiante</a>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Matricula</th>
                <th>Carrera</th>
                <th>Promedio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td>{{$estudiante->nombre}}</td>
                    <td>{{$estudiante->matricula}}</td>
                    <td>{{$estudiante->carrera}}</td>
                    <td>{{$estudiante->promedio}}</td>
                    <td>
                        <form method="post" action="{{ route('estudiantes.destroy', $estudiante->id) }}">
                            @csrf
                            @method('delete')
                            <a href="{{ route('estudiantes.edit', $estudiante->id) }}">Editar</a>
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>