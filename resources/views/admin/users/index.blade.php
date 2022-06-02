<x-layouts.admin>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Gestion des utlisateurs</h1>

            <a class="btn btn-primary" href="javascript:;" data-bs-toggle="modal" data-bs-target="#addModal">Ajouter un nouveau utilisateur</a>
        </div>
        <div class="bg-white p-3 rounded border border-2">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endisset
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Addresse email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span style="text-transform: capitalize;" class="badge bg-info">{{ implode(' ', explode('_', $user->role)) }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary edit">
                                <i class="fas fa-pencil"></i>
                                <span>Editer</span>
                            </a>
                            <form method="POST" onsubmit="return confirm('Etes-vous sur de supprimer votre utilisateur ? ')" action="{{ route('admin.users.delete', $user) }}" id="form-delete-{{ $user->id }}" class="d-none">
                                @method('DELETE')
                                @csrf
                            </form>
                            <a href="javascript:;" onclick="event.preventDefault(); $('#form-delete-{{ $user->id }}').submit()" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                                <span>Supprimer</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.users.store') }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Ajouter un nouveau utilisateur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="mb-3">
                            <label for="name">Nom complet</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email">Addresse email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">Mote de passe</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ajouter l'utitlisateur</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="modalResult"></div>

    <x-slot:scripts>
        @if ($errors->any())
        <script>
            $(function() {
                $('#addModal').modal('toggle')
            })
        </script>
        @endif

        <script>
            $(function() {
                $('.edit').click(function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: $(this).attr('href'),
                        method: 'GET',
                        success: function(data) {
                            $("#modalResult").html(data)
                            $("#editModal").modal('toggle')
                        }
                    })
                })
            })
        </script>
    </x-slot:scripts>


</x-layouts.admin>