@extends('employees.modal-layout')
@section('modal-title','Crear')
@section('modal-body')
<form class="form-horizontal" role="form">
        @csrf
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
                <option value="">--Escoja el departamento--</option>  
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection    