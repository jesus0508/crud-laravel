@extends('layouts.layout')
@section('title','Editar')
@section('main')
<form action="/employees/{{$employee->id}}" method="post">
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
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection