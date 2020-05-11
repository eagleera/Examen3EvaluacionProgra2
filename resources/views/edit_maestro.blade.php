@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
        <div class="column text-left">
            <p class="text-3xl">Editar Maestro</p>
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
        <form method="POST" action="{{ route('edit_maestro_handle') }}">
            @csrf
            <input type="hidden" name="idMaestro" value={{$maestro->idMaestro}} />
            {{ method_field('PUT') }}
            <div class="columns">
                <div class="field column">
                    <label class="label">Matricula</label>
                    <div class="control">
                        <input class="input @error('matricula') is-invalid @enderror" type="number" placeholder="4300..." value={{ $maestro->matricula }} name="matricula" required autofocus>
                    </div>
                    @error('matricula')
                        <p class="is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field column">
                    <label class="label">Nombre</label>
                    <div class="control">
                        <input class="input @error('nombre') is-invalid @enderror" type="text" name="nombre"  value={{ $maestro->nombre }} required>
                    </div>
                    @error('nombre')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="columns">
                <div class="field column">
                    <label class="label">Apellido paterno</label>
                    <div class="control">
                        <input class="input @error('paterno') is-invalid @enderror" type="text" name="paterno"  value={{ $maestro->paterno }} required>
                    </div>
                    @error('paterno')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field column">
                    <label class="label">Apellido materno</label>
                    <div class="control">
                        <input class="input @error('materno') is-invalid @enderror" type="text" name="materno"  value={{ $maestro->materno }} required>
                    </div>
                    @error('materno')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="columns">
                <div class="field column">
                    <label class="label">CURP</label>
                    <div class="control">
                        <input class="input @error('curp') is-invalid @enderror" type="text" name="curp"  value={{ $maestro->curp }} required>
                    </div>
                    @error('curp')
                        <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="field column">
                    <label class="label">Grado academico</label>
                    <div class="select is-fullwidth">
                        <select name="idGradoAca" required value={{ $maestro->idGradoAca }}">
                            <option selected disabled>Selecciona una opción...</option>
                            @foreach ($grados as $grado)
                                @if ($maestro->idGradoAca == $grado->idGradoAca)
                                    <option value={{ $grado->idGradoAca }} selected>{{ $grado->gradoAcademico }}</option>
                                @else
                                <option value={{ $grado->idGradoAca }}>
                                    {{ $grado->gradoAcademico }}
                                </option>
                                @endif
                            @endforeach>
                        </select>
                    </div>
                </div>
            </div>
            <button class="button is-primary is-fullwidth h-full text-2xl font-bold">
                Editar maestro
            </button>
        </form>
    </div>
</div>
@endsection
