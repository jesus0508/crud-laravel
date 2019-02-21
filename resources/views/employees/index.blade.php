@extends('layouts.layout')
@section('title','CRUD')
    
@section('main')
<table id="employeeTable" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th valign="middle" scope="col">#</th>
            <th valign="middle" scope="col">Nombres</th>
            <th valign="middle" scope="col">Apellidos</th>
            <th valign="middle" scope="col">Email</th>
            <th valign="middle" scope="col">Telefono</th>
            <th valign="middle" scope="col">Departamento</th>
            <th valign="middle" scope="col">Titulo</th>
        </tr>
        {{csrf_field()}}
    </thead>
    <tbody>
        @foreach ($employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->first_name}}</td>
            <td>{{$employee->last_name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone_number}}</td>
            <td>{{$employee->department->name}}</td>
            <td>{{$employee->job->title}}</td>
            <td>
                <button id="show" type="button" class="btn btn-info" data-toggle="modal" data-target="#showModal" data-id="{{$employee->id}}">
                    <span class="glyphicon glyphicon-eye-open"></span>Ver
                </button>
            </td>
            <td>
                <button id="edit" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editModal" data-id="{{$employee->id}}"> 
                    <span class="glyphicon glyphicon-edit"></span>Editar
                </button>
            </td>
            <td>
                <button id="delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$employee->id}}">
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
    @include('employees.modals.create')
</div><!-- /.createModal -->

<div id="editModal" class="modal fade" role="dialog" aria-hidden="true">
    @include('employees.modals.edit')
</div><!-- /.editModal -->

<div id="deleteModal" class="modal fade" role="dialog" aria-hidden="true">
    @include('employees.modals.delete')
</div><!-- /.deleteModal -->
@endsection
