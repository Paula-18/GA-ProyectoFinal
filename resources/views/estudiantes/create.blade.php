<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Estudiante</title>
</head>
<body>
    <h1>Registrar Estudiante</h1>
    <a href="{{route('estudiantes.index')}}">Regresar</a>
    <form method="POST" action="{{route('estudiantes.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div>
            <label>Matricula</label>
            <input type="text" name="matricula" id="matricula">
        </div>
        <div>
            <label>Carrera</label>
            <input type="text" name="carrera" id="carrera">
        </div>
        <div>
            <label>Promedio</label>
            <input type="text" name="promedio" id="promedio">
        </div>
        <div>
            <label>Foto</label>
            <input type="file" name="foto" id="foto">
        </div>
        <div>
            <button type="submit">Crear</button>
        </div>
    </form>
</body>
</html>