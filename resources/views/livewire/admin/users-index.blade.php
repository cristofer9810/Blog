<div>

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o correo de un usuario">
    </div>

@if ($users->count())
    
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="">{{ $user->id }}</td>
                        <td class="">{{ $user->name }}</td>
                        <td class="">{{ $user->email }}</td>
                        <td width="10px">
                            {{-- aqui es el boton que edita la informacio en nuestra tabla --}}
                            <a class="btn btn-success" href="{{ route('admin.users.edit', $user) }}"><i
                                    class="fas fa-pencil-alt"></i></a>
                        </td>                      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="card-footer">
        {{ $users->links() }}
    </div>

    @else
        <div class="card-body">
            <strong>No hay ningún registro</strong>
        </div>
    @endif

</div>
