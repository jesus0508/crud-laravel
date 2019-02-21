@extends('employees.modal-layout')
@section('modal-title','Mostrar')
@section('modal-body')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
          <img class="card-img-top avatar" src="{{ asset('img/avatar.png') }}" alt="Card image cap">
          <h1 class="card-title"> </h1>
          <p class="lead font-weight-normal"><h2 class="card-subtitle">Email:</h2></p>
          <p class="lead font-weight-normal"><h2 class="card-subtitle">Telefono:</h2></p>
          <a class="btn btn-outline-secondary" data-dismiss="modal">Listo</a>
        </div>
    </div>
@endsection