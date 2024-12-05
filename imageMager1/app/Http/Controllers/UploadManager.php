<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;

class UploadManager extends Controller
{
    public function index()
    {
        $images = Image::all(["id","name","original_name", "url"]);
        return view('uploads.index', compact("images"));
    }
    public function upload(Request $request){
        $file = $request->file('file');
        echo 'File name: '. $file->getClientOriginalName();
        echo '<br>';
        echo 'File path = '. $file->getRealPath();
        echo '<br>';
        //
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
     
        // Obtener el archivo
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $uniqueName = now()->format('Y_m_d_H_i_s') . '_' . $originalName;
    
        // Guardar en storage
   
     $path = $file->storeAs('images', $uniqueName, 'public');
       //$file->move(public_path('public/ejercicio'), $uniqueName);
     
      echo '<br>';
      echo '<br>';
      
      echo ''. $path;
        // Guardar en la base de datos
        Image::create([
            'original_name' => $originalName,
            'name' => $uniqueName,
            'url'=> $path
        ]);
        
       


       return redirect()->route('images.index')->with('success', 'Imagen subida con éxito.');
       //return $request->file('file')->store('images');
       //return $request->file('file')->storeAs('images')

    }
    public function show(string $id)
    {
        $images = Image::findOrFail($id);
        return view('images.index', compact('images'));    
    }
    public function create()
    {
        return view('images.create');
    }


    
    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'name' => 'required',
            'original_name' => 'required',
            'url' => 'required'

        ]);

        $image->update($request->all());
        return redirect()->route('upload.index')->with('success', 'Image has been updated.');
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return redirect()->route('upload.index')->with('success', 'Image removed.');
    }

   

}
