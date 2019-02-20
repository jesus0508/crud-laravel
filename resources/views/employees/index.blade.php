@extends('layouts.layout')
@section('title','Home')

@section('main')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Departamento</th>
                <th scope="col">Titulo</th>
            </tr>
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
                <td><a class="btn btn-info" href="{{route('employees.show',$employee->id)}}">Ver</a></td>
                <td><a class="btn btn-secondary" href="{{route('employees.edit',$employee->id)}}">Editar</a></td>
                <td>
                    <form action="{{route('employees.destroy',$employee->id)}}" method="post"> 
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!!$employees->render()!!}    
@endsection