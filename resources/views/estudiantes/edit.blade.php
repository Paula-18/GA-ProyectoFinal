<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar informacion del estudiante</title>
</head>
<body>
    <h1>Editar informacion del estudiante</h1>
    <a href="{{route('estudiantes.index')}}">Regresar</a>
    <form method="POST" action="{{route('estudiantes.update', $estudiante->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{$estudiante->nombre}}">
        </div>
        <div>
            <label>Matricula</label>
            <input type="text" name="matricula" id="matricula" value="{{$estudiante->matricula}}">
        </div>
        <div>
        <div>
            <label>Carrera</label>
            <input type="text" name="carrera" id="carrera" value="{{$estudiante->carrera}}"></input>
        </div>
        <div>
            <label>Promedio</label>
            <input type="text" name="promedio" id="promedio" value="{{$estudiante->promedio}}"></input>
        </div>
        <div>
            <label>Foto</label>
            <input type="file" name="foto" id="foto" value="{{$estudiante->foto}}">
        </div>
        <div>
            <button type="submit">Actualizar</button>
        </div>
    </form>
</body>
</html>