<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NoticeController extends Controller
{

    public function showPublicaciones(){
        $notices = Notice::all();
        return view('publicaciones', compact('notices'));
    }

    public function index()
    {
        $notice = Notice::all();
        return response()->json([
            'success' => true,
            'data' => $notice,
        ], 200);
    }

    public function store(NoticeRequest $request)
    {
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/images'); 
        } else {
            $path = null;
        }
        $notice = new Notice();
        $notice->titulo = $request->input('titulo');
        $notice->resumen = $request->input('resumen');
        $notice->fecha = Carbon::now(); 
        $notice->imagen = $path;
        $notice->save();

        return response()->json([
            'message' => 'Publicación guardada correctamente',
            'data' => $notice,
        ], 201);
    }

    public function update(NoticeRequest $request, string $id)
    {
        $notice = Notice::findOrFail($id);
        if ($request->hasFile('imagen')) {
            if ($notice->imagen) {
                Storage::delete($notice->imagen);
            }
            $path = $request->file('imagen')->store('public/images');
            $notice->imagen = $path;
        }
        $notice->titulo = $request->input('titulo');
        $notice->resumen = $request->input('resumen');
        $notice->save();
        return response()->json([
            'message' => 'Publicación actualizada correctamente',
            'data' => $notice, 
        ], 200);
    }

    public function show($id)
    {
        $notice = Notice::find($id);
        if ($notice) {
            return response()->json([
                'success' => true,
                'data' => $notice,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Publicación no encontrada',
            ], 404);
        }
    }

    public function destroy(string $id)
    {
        $notice = Notice::findOrFail($id);

        if($notice->imagen){
            Storage::delete($notice->imagen);
        }

        $notice->delete();

        return response()->json([
            'message' => 'Publicación eliminada correctamente',
        ], 204);
    }
}
