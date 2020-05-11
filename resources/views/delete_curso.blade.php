@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column text-left">
            <p class="text-3xl">Eliminar curso</p>
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
        <form method="POST" action="{{ route('delete_curso_handle') }}">
            @csrf
            {{ method_field('DELETE') }}
            <input type="hidden" name="idCurso" value={{$curso->idCurso}} />
            <div class="field">
                <label class="label">Nombre del curso</label>
                <div class="control">
                    <input class="input" type="text" value={{$curso->nombreCurso}} disabled>
                </div>
            </div>
            <div class="field">
                <label class="label">Fecha de alta</label>
                <div class="control">
                    <input class="input" type="date" name="fechaAlta" value={{$curso->fechaAlta}} disabled required>
                </div>
            </div>
            <div class="field">
                <label class="label">Fecha de baja</label>
                <div class="control">
                    <input class="input" type="date" name="fechaBaja" value={{$curso->fechaBaja}} disabled required>
                </div>
                @error('fechaAlta')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label class="checkbox">
                    <input id='testNameHidden' type='hidden' value='0' name='vigente'>
                    <input type="checkbox" name="vigente" value='1' checked={{$curso->vigente == 1 ? true : false}} disabled>
                    Vigente
                </label>
            </div>
            <button class="button is-danger is-fullwidth h-full text-2xl font-bold">
                Eliminar curso
            </button>
        </form>
    </div>
</div>
@endsection
