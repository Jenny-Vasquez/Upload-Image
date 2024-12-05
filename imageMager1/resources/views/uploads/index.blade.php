<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Laravel - Upload Image</title>

</head>


<body>
    <header id="main-header">
        <div class=hero>
            <img src="{{ asset('iconos/icono.png') }}" alt="Logo" class="header-logo">
            <h1>Image Manager</h1>
        </div>
       
    </header>

    <div class="form">
        <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
            @csrf 
          
            <div class="">
                <input type="file" name="file">
                <button type="submit">Upload</button>
            </div>
        </form>
    </div>
<div class="container">

    <div>
        <table>
        <thead>
            <tr>
                <th>Name</th>
                
                <th>Show</th>
                <th>Image</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($images as $image)
                <tr>
                    <td>{{ $image->name }}</td>
                    <td>
                    <a href="{{ asset(Storage::disk('public')->url($image->url ))}}">
                        <img src="{{ asset('iconos/icono1.png') }}" alt="icono" class="icono" >
                    </a>
                   
                    </td>
                    <td>
                        <img src="{{ asset(Storage::disk('public')->url($image->url ))}}" >
                    </td>

                    <td>
                        <form action="{{ route('images.destroy', $image->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this image?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>                      
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
    

</body>



<footer style="margin-top: 4rem; text-align:center; border-top: 2px solid #97a5b4">
    <p>© 2024 Jenny P. Vásquez Calero | Desarrollo web Entorno Servidor </p>
</footer>
</html>