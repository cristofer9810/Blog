@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @can('admin.categories.create')
        <a class="float-right btn btn-secondary btn-sm" href="{{ route('admin.categories.create') }}">Agregar categoría</a>
    @endcan
    <h1>Lista de categorías</h1>
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
                        <th class="">Id</th>
                        <th class="">Nombre</th>
                        <th class="" colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)

                        <tr>
                            <td class="">{{ $category->id }}</td>
                            <td class="">{{ $category->name }}</td>
                            <td width="10px">
                                @can('admin.categories.edit')
                                    <a class="btn btn-success" href="{{ route('admin.categories.edit', $category) }}"><i
                                            class="fas fa-pencil-alt"></i></a>
                                @endcan
                            </td>
                            <td width="10px">

                                @can('admin.categories.destroy')



                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
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
