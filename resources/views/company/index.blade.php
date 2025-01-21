@extends('layouts.master')

@section('content')
<h1 style="font-size: 2rem;" class="pt-3 ml-2">Gestion de Empresas</h1>
<div class="container mt-3">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>NIT</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Encargado</th>
                    <th><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create">Registrar</button>
                    </th>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $company->nit }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->telephone }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->in_charge }}</td>
                        <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update_{{ $company->id }}">Editar</button>
                            <a href="#" class="btn btn-danger" onclick="confirmDelete(event, '{{ route('admin.company.destroy', $company->id) }}')">Eliminar</a>
                            <!-- Botón o enlace de eliminación -->
                            <form id="delete-form" action="{{ route('admin.company.destroy', $company->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="update_{{ $company->id }}" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="updateLabel">Actualizar Empresa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.company.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="company_id" value={{ $company->id}}>
                                        <label for="">NIT</label>
                                        <input type="number" value="{{ $company->nit }}" name="nit" class="form-control" placeholder="Ingrese el NIT" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" value="{{ $company->name }}" name="name" class="form-control" placeholder="Ingrese el nombre" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Telefono</label>
                                        <input type="number" value="{{ $company->telephone }}" name="telephone" class="form-control" placeholder="Ingrese el telefono" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" value="{{ $company->email }}" name="email" class="form-control" placeholder="Ingrese el email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Encargado</label>
                                        <input type="text" value="{{ $company->in_charge }}" name="in_charge" class="form-control" placeholder="Ingrese el nombre del encargado" required>
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
            <form action="{{ route('admin.company.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">NIT</label>
                    <input type="number" name="nit" class="form-control" placeholder="Ingrese el NIT" required>
                </div>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre" required>
                </div>
                <div class="form-group">
                    <label for="">Telefono</label>
                    <input type="number" name="telephone" class="form-control" placeholder="Ingrese el telefono" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Ingrese el email" required>
                </div>
                <div class="form-group">
                    <label for="">Encargado</label>
                    <input type="text" name="in_charge" class="form-control" placeholder="Ingrese el nombre del encargado" required>
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