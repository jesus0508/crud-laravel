@extends('layouts.layout')
@section('title','Editar')
@section('main')
<form action="{{route('employees.update',$employee->id)}}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="first_name">Nombre: </label>
            <input class="form-control" name="first_name" type="text" value="{{$employee->first_name}}">
        </div>
        <div class="form-group">
            <label for="last_name">Apellidos: </label>
            <input class="form-control" name="last_name" type="text" value="{{$employee->last_name}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="{{$employee->email}}">
        </div>
        <div class="form-group">
            <label for="phone_number">Telefono</label>
            <input class="form-control" type="number" name="phone_number" value="{{$employee->phone_number}}">
        </div>
        <div class="form-group">
            <label for="jobs">Titulo</label>
            <select name="job_id" id="jobs" class="form-control" required>
                <option value="">--Escoja la profesion-</option>  
                @foreach ($jobs as $job)
                    <option value="{{$job->id}}"
                    @if ($employee->job->id==$job->id)
                        selected
                    @endif>
                        {{$job->title}}
                    </option>   
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="departments">Departamento</label>
            <select name="department_id" id="departments" class="form-control" required>
                <option value="">--Escoja el departamento-</option>  
                @foreach ($departments as $department)
                    <option value="{{$department->id}}"
                    @if ($employee->department->id==$department->id)
                        selected
                    @endif>
                        {{$department->name}}
                    </option>   
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection