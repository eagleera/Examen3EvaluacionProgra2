@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column text-left">
            <p class="text-3xl">Maestros</p>
        </div>
        <div class="column text-right">
            <a class="button is-primary" href="{{ route('nuevo_maestro') }}">Agregar nuevo</a>
        </div>
    </div>
    <div class="h-full card rounded-md p-6 has-background-light">
        @if (count($maestros) === 0)
            <p>Aún no has agregado ningún maestro</p>
        @else
        <div class="table-container">
            <table class="table is-fullwidth is-hoverable is-bordered">
                <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>CURP</th>
                    <th>grado Academico</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr @foreach ($maestros as $maestro)>
                    <td>{{$maestro->matricula}}</td>
                    <td>{{$maestro->nombre}}</td>
                    <td>{{$maestro->paterno}}</td>
                    <td>{{$maestro->materno}}</td>
                    <td>{{$maestro->curp}}</td>
                    <td>{{$maestro->gradoAcademico}}</td>
                    <td class="text-center">
                        <a href="{{route('edit_maestro', ['id' => $maestro->idMaestro])}}">
                            <i class="fas fa-user-edit has-text-link"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="{{route('delete_maestro', ['id' => $maestro->idMaestro])}}">
                            <i class="fas fa-trash has-text-danger"></i>
                        </a>
                    </td>
                    </tr @endforeach>
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection
