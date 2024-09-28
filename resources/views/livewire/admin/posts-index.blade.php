<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un post">
    </div>

    @if ($posts->count())



        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="cursor-pointer" wire:click="order('id')">ID
                                     {{-- ID --}}
                            @if ($sort == 'id')
                                @if ($direction == 'desc')
                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                @else
                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                @endif

                            @else
                                <i class="float-right fas fa-sort"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('name')">Nombre
                            {{-- Nombre --}}
                            @if ($sort == 'name')
                                @if ($direction == 'desc')
                                    <i class="float-right mt-1 fas fa-sort-alpha-down-alt"></i>
                                @else
                                    <i class="float-right mt-1 fas fa-sort-alpha-up-alt"></i>
                                @endif

                            @else
                                <i class="float-right fas fa-sort"></i>
                            @endif
                        </th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="">{{ $post->id }}</td>
                            <td class="">{{ $post->name }}</td>
                            <td width="10px">
                                {{-- aqui es el boton que edita la informacio en nuestra tabla --}}
                                <a class="btn btn-success" href="{{ route('admin.posts.edit', $post) }}"><i
                                        class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                    {{-- este metodo elimina un registro en nuestra BD --}}
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger" href=""><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif
</div>

{{-- plantilla para no repetir tablas en livewire --}}
{{-- <div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>



        </table>
    </div>
</div> --}}

<!-- This example requires Tailwind CSS v2.0+ -->

