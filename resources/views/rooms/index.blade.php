<x-layouts.user>

    <div class="container">

        <div class="w-100 d-flex justify-content-between align-items-center mb-3">
            <h1 class="tracking-tighter fw-bold">Les chambres</h1>

            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Ajouter une nouvelle chambre</a>
        </div>
        <div class="bg-white p-3 border border-2 rounded">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Description</th>
                            <th scope="col">Prix haut saison</th>
                            <th scope="col">Prix bas saison</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                        <tr>
                            <th scope="row">{{ $room->id }}</th>
                            <td>
                                <div style="width: 60px; height: 60px; overflow: hidden; border-radius: 0.25rem;">
                                    <img src="/storage/{{ $room->image_path }}" class="w-100 h-100" style="object-fit: cover;" alt="">
                                </div>
                            </td>
                            <td>{{ $room->category->name }}</td>
                            <td>{{ $room->phone }}</td>
                            <td>{{ $room->description }}</td>
                            <td>{{ $room->prix_haut_saison }} MAD</td>
                            <td>{{ $room->prix_bas_saison }} MAD</td>
                            <td>
                                <a href="{{ route('user.rooms.edit', $room) }}" class="edit btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>
                                <form class="d-none" id="delete-{{ $room->id }}" action="{{ route('user.rooms.destroy', $room) }}" onsubmit="return confirm('Etes-vous sur de suppimer la categorie ?')" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a href="javascript:;" onclick="$('#delete-{{ $room->id }}').submit()" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                    <span>Delete</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{$rooms->links()}}

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Ajouter une nouvelle chambre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="mb-3">
                            <label for="room_category_id">La categorie</label>
                            <select id="room_category_id" name="room_category_id" class="form-select @error('room_category_id') is-invalid @enderror" required>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('room_category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone">Numero de telephone</label>
                            <input type="text" id="phone" value="{{ old('phone')}}" name="phone" placeholder="Entrez le numero de votre telephone" class="form-control @error('phone') is-invalid @enderror" required>
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" required>
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prix_haut_saison">Prix haut saison</label>
                            <input type="number" id="prix_haut_saison" value="{{ old('prix_haut_saison')}}" name="prix_haut_saison" class="form-control @error('prix_haut_saison') is-invalid @enderror" required>
                            @error('prix_haut_saison')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prix_bas_saison">Prix bas saison</label>
                            <input type="number" id="prix_bas_saison" value="{{ old('prix_bas_saison')}}" name="prix_bas_saison" class="form-control @error('prix_bas_saison') is-invalid @enderror" required>
                            @error('prix_bas_saison')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description')}}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
</x-layouts.user>