@extends('layouts.layout')
@section('tittle','Crear')
@section('main')
    <form action="/trainers" method="post">
        @csrf
        <div class="form-group">
            <label for="first_name">Nombre: </label>
            <input class="form-control" name="first_name" type="text">
        </div>
        <div class="form-group">
            <label for="last_name">Apellidos: </label>
            <input class="form-control" name="last_name" type="text">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email">
        </div>
        <div class="form-group">
            <label for="phone_number">Telefono</label>
            <input class="form-control" type="number" name="phone_number">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection    