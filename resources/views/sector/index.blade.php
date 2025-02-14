@extends('layouts.master')

@section('content')
<h1 style="font-size: 2rem;" class="pt-3 ml-2">Gestion de Sectores</h1>
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create">Registrar</button>
                    </th>
                </thead>
                <tbody>
                    @foreach ($sectors as $sector)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sector->name }}</td>
                        <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update_{{ $sector->id }}">Editar</button>
                            <a href="#" class="btn btn-danger" onclick="confirmDelete(event, '{{ route('admin.sector.destroy', $sector->id) }}')">Eliminar</a>
                            <!-- Botón o enlace de eliminación -->
                            <form id="delete-form" action="{{ route('admin.sector.destroy', $sector->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="update_{{ $sector->id }}" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="updateLabel">Actualizar Empresa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.sector.update') }}" method="POST">
                                    @csrf   
                                    <!-- campo oculto para manejar el id del registro -->   
                                    <input type="hidden" name="sector_id" value={{ $sector->id}}>                              
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" value="{{ $sector->name }}" name="name" class="form-control" placeholder="Ingrese el nombre" required>
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
        <h1 class="modal-title fs-5" id="createLabel">Registrar Empresa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.sector.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre" required>
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