<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Publicaciones</title>
</head>
<body>
    <div class="publicaciones-container">
        @foreach($notices as $notice)
            <div class="publicacion" data-id="{{ $notice->id }}">
                <img src="{{ asset('storage/' . $notice->imagen) }}" alt="Imagen de publicación">
                <h2>{{ $notice->titulo }}</h2>
                <p>{{ $notice->resumen }}</p>
                <p>{{ \Carbon\Carbon::parse($notice->fecha)->format('d-M-Y') }}</p>
                <button class="leer-mas">Leer más</button>
                <!-- Botón de editar -->
                <button class="editar" data-id="{{ $notice->id }}">Editar</button>
            </div>
        @endforeach
    </div>

    <!-- Modal de Edición -->
    <div id="edit-modal" style="display:none;">
        <div id="edit-modal-content">
            <form id="edit-form" method="POST" action="">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit-id">
                <label for="edit-titulo">Título:</label>
                <input type="text" name="titulo" id="edit-titulo" required>
                <label for="edit-resumen">Resumen:</label>
                <textarea name="resumen" id="edit-resumen" required></textarea>
                <label for="edit-imagen">Imagen:</label>
                <input type="file" name="imagen" id="edit-imagen">
                <button type="submit">Guardar Cambios</button>
            </form>
            <button id="close-edit-modal">Cerrar</button>
        </div>
    </div>
    
</body>
</html>
