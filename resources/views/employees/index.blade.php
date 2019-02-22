@extends('layouts.layout')
@section('title','CRUD')
    
@section('main')
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th halign="middle" scope="col">#</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Departamento</th>
            <th scope="col">Titulo</th>
        </tr>
        {{csrf_field()}}
    </thead>
    <tbody id="employeeTable">
        @foreach ($employees as $indexKey=>$employee)
        <tr id="row-{{$employee->id}}">
            <td class="colIndex">{{$indexKey+1}}</td>
            <td>{{$employee->first_name}}</td>
            <td>{{$employee->last_name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone_number}}</td>
            <td>{{$employee->department->name}}</td>
            <td>{{$employee->job->title}}</td>
            <td>
                <button type="button" class="btn btn-info show-modal" data-id="{{$employee->id}}">
                    <span class="glyphicon glyphicon-eye-open"></span>Ver
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-secondary edit-modal" data-id="{{$employee->id}}"> 
                    <span class="glyphicon glyphicon-edit"></span>Editar
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-danger delete-modal" data-toggle="modal" data-target="#deleteModal" data-id="{{$employee->id}}">
                    <span class="glyphicon glyphicon-trash"></span>Eliminar
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table><!-- /.mainTable -->
{!!$employees->render()!!}


<!--Modals-->
<div id="showModal" class="modal fade" role="dialog" aria-hidden="true">
    @include('employees.modals.show')
</div><!-- /.showModal -->

<div id="createModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Crear</h1>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="createForm" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="first_name">Nombre: </label>
                        <input id="first_name" class="form-control" name="first_name" type="text">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellidos: </label>
                        <input id="last_name" class="form-control" name="last_name" type="text">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Telefono</label>
                        <input id="phone_number" class="form-control" type="number" name="phone_number">
                    </div>
                    <div class="form-group">
                        <label for="jobs">Titulo</label>
                        <select name="job_id" id="jobs" class="form-control" required>
                            <option value="">--Escoja la profesion--</option>  
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="departments">Departamento</label>
                        <select name="department_id" id="departments" class="form-control" required>
                            {{-- <option value="">--Escoja el departamento--</option>   --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <button id="store" type="submit" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                    </div>
                </form>
            </div><!-- /.modal-body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.createModal -->

<div id="editModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Editar</h1>
                <button class="close" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <form class="horizontal" role="form">
                    <div class="form-group">
                        <label for="first_name_edit">Nombre: </label>
                        <input id="first_name_edit" class="form-control" name="first_name" type="text">
                    </div>
                    <div class="form-group">
                        <label for="last_name_edit">Apellidos: </label>
                        <input id="last_name_edit" class="form-control" name="last_name" type="text">
                    </div>
                    <div class="form-group">
                        <label for="email_edit">Email</label>
                        <input id="email_edit" class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="phone_number_edit">Telefono</label>
                        <input id="phone_number_edit" class="form-control" type="number" name="phone_number">
                    </div>
                    <div class="form-group">
                        <label for="jobs_edit">Titulo</label>
                        <select name="job_id" id="jobs_edit" class="form-control" required>
                            <option value="">--Escoja la profesion--</option>  
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="departments_edit">Departamento</label>
                        <select name="department_id" id="departments_edit" class="form-control" required>
                            {{-- <option value="">--Escoja el departamento--</option>   --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <button id="update" type="submit" class="btn btn-secondary" data-dismiss="modal">Actualizar</button>
                    </div>                    
                </form>
            </div><!-- /.modal-body -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.editModal -->

<div id="deleteModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Eliminar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Esta seguro que desea eliminar?</p>
        </div>
        <div class="modal-footer">
            <button id="destroy" type="submit" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
</div>
@endsection
