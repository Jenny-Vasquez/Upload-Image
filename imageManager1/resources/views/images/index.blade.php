<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @section('content')
<h1>Detalle de la Imagen</h1>
<p><strong>Nombre Original:</strong> {{ $images->original_name }}</p>
<img src="{{ Storage::url('ejercicio' . $images->name) }}" alt="{{ $images->original_name }}">
<a href="{{ route('imagenes.index') }}">Volver</a>
@endsection

</body>
</html>