@extends('layouts.layout')
@section('name','CRUD')
    
@section('main')
<table class="table table-striped table-bordered table-hover">
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
        {{ csrf_field() }}
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
                <button class="show-modal btn btn-info" data-id="{{$employee->id}}">
                    <span class="glyphicon glyphicon-eye-open"></span>Ver
                </button>
            </td>
            <td>
                <button class="edit-modal btn btn-secondary" data-id="{{$employee->id}}"> 
                    <span class="glyphicon glyphicon-edit"></span> Editar
                </button>
            </td>
            <td>
                <button class="delete-model btn btn-danger" data-id="{{$employee->id}}">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table><!-- /.mainTable -->
{!!$employees->render()!!}

<!--Modals-->
<div id="createModal" class="modal fade" role="dialog">
    @include('create')
</div><!-- /.createModal -->
<div id="deleteModal" class="modal fade" role="dialog">
    @include('delete')
</div><!-- /.deleteModal -->
<div id="editModal" class="modal fade" role="dialog">
    @include('edit')
</div><!-- /.editModal -->
<div id="showModal" class="modal fade" role="dialog">
    @include('show')
</div><!-- /.showModal -->

@endsection
