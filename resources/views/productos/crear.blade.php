<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Producto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    .btn-pastel {
      background-color: #a5d6a7;
      color: #2c2c2c;
      border: none;
    }
    .btn-pastel:hover {
      background-color: #81c784;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Crear Producto</h1>

    <form action="{{ route('productos.guardar') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="marca">Marca:</label>
        <input type="text" name="marca" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" class="form-control" step="0.01" required>
      </div>

      <div class="mb-3">
        <label for="stock">Stock:</label>
        <input type="number" name="stock" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="id_categoria">Categoría:</label>
        <select name="id_categoria" class="form-select" required>
          @foreach ($categorias as $item)
            <option value="{{ $item->id_categoria }}">{{ $item->descripcion }}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-pastel">Guardar</button>
      <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>
</body>
</html>
