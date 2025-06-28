<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #BDADEA;
    }
    .container {
      margin-top: 50px;
      background-color: #fff;
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 5px 15px rgba(67, 129, 193, 0.3);
    }
    h1 {
      color: #4381C1;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Editar Producto</h1>

    <form action="{{ route('productos.actualizar', $producto->id_producto) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
      </div>

      <div class="mb-3">
        <label for="marca">Marca:</label>
        <input type="text" name="marca" class="form-control" value="{{ $producto->marca }}" required>
      </div>

      <div class="mb-3">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" class="form-control" step="0.01" value="{{ $producto->precio }}" required>
      </div>

      <div class="mb-3">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}" required>
      </div>

      <div class="mb-3">
        <label for="id_categoria">Categoría:</label>
        <select name="id_categoria" class="form-select" required>
          @foreach ($categorias as $item)
            <option value="{{ $item->id_categoria }}" {{ $producto->id_categoria == $item->id_categoria ? 'selected' : '' }}>
              {{ $item->descripcion }}
            </option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-success">Actualizar</button>
      <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>
