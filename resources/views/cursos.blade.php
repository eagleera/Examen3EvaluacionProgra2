@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column text-left">
            <p class="text-3xl">Cursos</p>
        </div>
        <div class="column text-right">
            <a class="button is-primary" href="{{ route('nuevo_curso') }}">Agregar nuevo</a>
        </div>
    </div>
    <div class="h-full card rounded-md p-6 has-background-light">
        @if (count($cursos) === 0)
            <p>Aún no has agregado ningún curso o no se encuentran vigentes</p>
        @else
        <div class="table-container">
            <table class="table is-fullwidth is-hoverable is-bordered">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de alta</th>
                    <th>Fecha de baja</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <tr @foreach ($cursos as $curso)>
                        <td>{{$curso->nombreCurso}}</td>
                        <td>{{$curso->fechaAlta}}</td>
                        <td>{{$curso->fechaBaja}}</td>
                        <td class="text-center">
                            <a href="{{route('edit_curso', ['id' => $curso->idCurso])}}">
                                <i class="fas fa-user-edit has-text-link"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{route('delete_curso', ['id' => $curso->idCurso])}}">
                                <i class="fas fa-trash has-text-danger"></i>
                            </a>
                        </td>
                    </tr @endforeach>
                </tbody>
            </table>
        </div>
        @endif
        @if (count($cursos_vencidos) > 0)
            <p class="text-2xl font-bold">Cursos pasados</p>
            <div class="table-container">
                <table class="table is-fullwidth is-hoverable is-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fecha de alta</th>
                        <th>Fecha de baja</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr @foreach ($cursos_vencidos as $curso)>
                            <td>{{$curso->nombreCurso}}</td>
                            <td>{{$curso->fechaAlta}}</td>
                            <td>{{$curso->fechaBaja}}</td>
                        </tr @endforeach>
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
