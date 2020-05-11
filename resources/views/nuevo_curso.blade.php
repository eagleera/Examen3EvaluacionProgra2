@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column text-left">
            <p class="text-3xl">Agregar Nuevo curso</p>
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
        <form method="POST" action="{{ route('agregar_nuevo_curso') }}">
            @csrf
            <div class="field">
                <label class="label">Nombre del curso</label>
                <div class="control">
                    <input class="input @error('nombreCurso') is-invalid @enderror" type="text" placeholder="Escritura..." name="nombreCurso" required autofocus>
                </div>
                @error('nombreCurso')
                    <p class="is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label class="label">Fecha de alta</label>
                <div class="control">
                    <input class="input @error('fechaAlta') is-invalid @enderror" type="date" name="fechaAlta" required>
                </div>
                @error('fechaAlta')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label class="label">Fecha de baja</label>
                <div class="control">
                    <input class="input @error('fechaBaja') is-invalid @enderror" type="date" name="fechaBaja" required>
                </div>
                @error('fechaAlta')
                    <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field">
                <label class="checkbox">
                    <input id='testNameHidden' type='hidden' value='0' name='vigente'>
                    <input type="checkbox" name="vigente" value='1'>
                    Vigente
                </label>
            </div>
            <button class="button is-primary is-fullwidth h-full text-2xl font-bold">
                Agregar curso
            </button>
        </form>
    </div>
</div>
@endsection
