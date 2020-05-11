@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column text-left">
            <p class="text-3xl">Cursos disponibles</p>
        </div>
    </div>
    <div class="h-full card rounded-md p-6 has-background-light">
        @if (count($cursos) === 0)
            <p>Aún no has agregado ningún curso</p>
        @else
            @foreach ($cursos as $curso)
                <div class="card p-4 shadow-md rounded-md mb-8">
                    <div class="columns border-b-2 border-gray-600">
                        <div class="column">
                            <p class="font-bold text-3xl">{{ $curso[0]->nombreCurso }}</p>
                        </div>
                        <div class="column text-right">
                            <a class="button is-primary" href="{{ route('nuevo_maestro_curso', ['id' => $curso[0]->idCurso]) }}">Agregar maestro</a>
                        </div>
                    </div>
                    <div class="table-container mt-4">
                        <table class="table is-fullwidth is-hoverable is-bordered">
                            <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nombre Completo</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr @foreach ($curso as $maestro)>
                                    @if ($maestro->idMaestro == null)
                                        <td colspan="3">Aún no has agregado ningún maestro a este curso</td>
                                    @else
                                        <td>{{ $maestro->matricula }}</td>
                                        <td>{{ $maestro->maestroNombreCompleto }}</td>
                                        <td class="text-center">
                                            <a href="{{route('delete_maestro_curso', ['idCurso' => $maestro->idCurso, 'idMaestro' => $maestro->idMaestro])}}">
                                                <i class="fas fa-trash has-text-danger"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr @endforeach>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
