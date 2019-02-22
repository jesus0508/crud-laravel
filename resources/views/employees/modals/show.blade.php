@extends('employees.modal-layout')
@section('modal-title','Mostrar')
@section('modal-body')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-10 mx-auto my-5">
          <img class="card-img-top avatar" src="{{ asset('img/avatar.png') }}" alt="Card image cap">
          <h1 id="full_name" class="card-title"> </h1>
          <p class="lead font-weight-normal">
            <h2 class="card-subtitle">Email:</h2>
            <p id="email_show"></p>
          </p>
          <p class="lead font-weight-normal">
            <h2 class="card-subtitle">Telefono:</h2>
            <p id="phone_number_show"></p>
          </p>
          <p class="lead font-weight-normal">
            <h2 class="card-subtitle">Departamento:</h2>
            <p id="deparment_name_show"></p>
          </p>
          <p class="lead font-weight-normal">
            <h2 class="card-subtitle">Puesto:</h2>
            <p id="job_title_show"></p>
          </p>
          <a class="btn btn-outline-secondary" data-dismiss="modal">Listo</a>
        </div>
    </div>
@endsection
