@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    @can('admin.tags.create')
        <a class="float-right btn btn-secondary" href="{{ route('admin.tags.create') }}">Nueva etiqueta</a>
    @endcan

    <h1>Mostrar listado de etiqueta</h1>
@stop

@section('content')

    @if (session('info'))

        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>


    @endif
    <div class="card">

        <div class="card-body">

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>


                </thead>
                <tbody>
                    @foreach ($tags as $tag)

                        <tr>
                            <td class="">{{ $tag->id }}</td>
                            <td class="">{{ $tag->name }}</td>
                            <td width="10px">
                                {{-- aqui es el boton que edita la informacio en nuestra tabla --}}
                                @can('admin.tags.edit')
                                    <a class="btn btn-success" href="{{ route('admin.tags.edit', $tag) }}"><i
                                            class="fas fa-pencil-alt"></i></a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.tags.destroy')
                                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                        {{-- este metodo elimina un registro en nuestra BD --}}
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger" href=""><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
