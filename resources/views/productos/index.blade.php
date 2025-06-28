<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Productos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #BDADEA;
      color: #2c2c2c;
    }
    .container {
      margin-top: 50px;
      background-color: #fff;
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 5px 15px rgba(67, 129, 193, 0.3);
    }
    h1, h2 {
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
    <h1>Listado de Productos</h1>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('productos.filtrar') }}" method="POST" class="mb-4">
      @csrf
      <div class="row g-2">
        <div class="col-md-6">
          <label for="id_categoria" class="form-label">Seleccione una categoría:</label>
          <select name="id_categoria" class="form-select" required>
            <option value="">[- SELECCIONE -]</option>
            @foreach ($categorias as $item)
              <option value="{{ $item->id_categoria }}">{{ $item->descripcion }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-6 d-flex align-items-end">
          <button type="submit" class="btn btn-primary me-2">Filtrar</button>
          <a href="{{ route('productos.crear') }}" class="btn btn-pastel">Crear Producto</a>
        </div>
      </div>
    </form>

    @isset($productos)
      <h2>Productos</h2>
      <ul class="list-group">
        @forelse ($productos as $item)
          <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $item->nombre }} - {{ $item->marca }} (${{ $item->precio }})
            <span>
              <a href="{{ route('productos.editar', $item->id_producto) }}" class="btn btn-outline-success btn-sm me-2">Editar</a>

              <form action="{{ route('productos.eliminar', $item->id_producto) }}" method="POST" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm"
                        onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
              </form>
            </span>
          </li>
        @empty
          <li class="list-group-item">No hay productos en esta categoría.</li>
        @endforelse
      </ul>
    @endisset
  </div>
</body>
</html>
