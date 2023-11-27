<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FotoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            $id = $user->id;
            $fotos = Foto::where('user_id', $id)->get();
            return view('fotos.fotos', compact('fotos'));
        }
    }
    
    public function subirFoto(Request $request)
    {
        $user = auth()->user();

        if ($request->hasFile('foto')) {
            $id = $user->id;
            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->put('/' . $fileName, file_get_contents($image));
            $foto = new Foto;
            $foto->user_id = $id;
            $foto->descripcion = $request->descripcion;
            $foto->estado = 1;
            $foto->ruta = $fileName;
            $foto->save();
            return redirect('/fotos');
        }
    }
    public function mostrarFoto(string $ruta)
    {
        $file = Storage::disk('local')->get($ruta);
        return Image::make($file)->response();
    }
}
