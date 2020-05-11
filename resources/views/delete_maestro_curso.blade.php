@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column text-left">
            <p class="text-3xl">Eliminar maestro del curso {{ $curso->nombreCurso }}</p>
        </div>
    </div>
    @if (isset($errors) && count($errors))
        <div class="notification is-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="h-full card rounded-md p-6 has-background-light">
        <form method="POST" action="{{ route('delete_maestro_curso_handle') }}">
            @csrf
            {{ method_field('DELETE') }}
            <input type="hidden" name="idMaestro" value={{$maestro->idMaestro}} />
            <input type="hidden" name="idCurso" value={{$curso->idCurso}} />
            <div class="field">
                <label class="label">Maestro a eliminar del curso:</label>
                {{ $maestro->nombre}} {{ $maestro->paterno }} {{$maestro->materno }}
            </div>
            <button class="button is-danger is-fullwidth h-full text-2xl font-bold">
                Eliminar Maestro
            </button>
        </form>
    </div>
</div>
@endsection
