@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column text-left">
            <p class="text-3xl">Agregar Nuevo maestro al curso {{$curso->nombreCurso }}</p>
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
        <form method="POST" action="{{ route('agregar_maestro_curso') }}">
            @csrf
            <input type="hidden" name="idCurso" value={{$curso->idCurso}} />
            {{ method_field('PUT') }}
            <div class="field column">
                <label class="label">Maestros</label>
                <div class="select is-fullwidth">
                    <select name="idMaestro" required>
                        <option selected disabled>Selecciona una opción...</option>
                        @foreach ($maestros as $maestro)
                            <option value={{ $maestro->idMaestro }}>
                                {{ $maestro->nombre }} {{ $maestro->paterno}} {{ $maestro->materno }}
                            </option>
                        @endforeach>
                    </select>
                    @if (count($maestros) == 0)
                        <p class="has-text-danger">Aún no has agregado maestros o todos los maestros se encuentran escritos al curso actual</p>    
                    @endif
                </div>
            </div>
            <button class="button is-primary is-fullwidth h-full text-2xl font-bold mt-8">
                Agregar maestro
            </button>
        </form>
    </div>
</div>
@endsection
