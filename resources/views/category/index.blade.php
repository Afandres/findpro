@extends('layouts.master')

@section('content')
<h1 style="font-size: 2rem;" class="pt-3 ml-2">Gestion de Categorias</h1>
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Sector</th>
                    <th><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create">Registrar</button>
                    </th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->sector->name }}</td>
                        <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update_{{ $category->id }}">Editar</button>
                            <a href="#" class="btn btn-danger" onclick="confirmDelete(event, '{{ route('admin.category.destroy', $category->id) }}')">Eliminar</a>
                            <!-- Botón o enlace de eliminación -->
                            <form id="delete-form" action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="update_{{ $category->id }}" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="updateLabel">Actualizar Categoria</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.category.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="category_id" value={{ $category->id}}>
                                        <label for="">Nombre</label>
                                        <input type="text" value="{{ $category->name }}" name="name" class="form-control" placeholder="Ingrese el Nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sector</label>
                                        <select name="sector_id" class="form-control">
                                            <option value="">Seleccione el sector</option>
                                            @foreach ($sectors as $sector)
                                                <option value="{{ $sector->id }}" 
                                                    {{ $category->sector_id == $sector->id ? 'selected' : '' }}>
                                                    {{ $sector->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-primary mt-3">Actualizar</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="createLabel">Registrar Categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Ingrese el Nombre" required>
                </div>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <select name="sector_id" id="" class="form-control">
                        <option value="">Seleccione el sector</option>
                        @foreach ($sectors as $sector)
                            <option value="{{ $sector->id}}">{{ $sector->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary mt-3">Registrar</button>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
        </div>
    </div>
    </div>
</div>
@endsection