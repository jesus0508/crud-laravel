@extends('employees.modal-layout')
@section('modal-title','Eliminar')
@section('modal-body')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
          <img class="card-img-top avatar" src="{{ asset('img/avatar.png') }}" alt="Card image cap">
          <h1 class="card-title"></h1>
          <p class="lead font-weight-normal"><h2 class="card-subtitle">Email:</h2></p>
          <p class="lead font-weight-normal"><h2 class="card-subtitle">Telefono:</h2></p>
          <button id="destroy" type="submit" class="btn btn-outline-secondary">Eliminar</button>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>
@endsection