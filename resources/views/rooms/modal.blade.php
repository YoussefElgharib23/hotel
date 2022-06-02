<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('user.rooms.update', $room) }}" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Modifier la chambre numero {{ $room->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="room_category_id">La categorie</label>
                        <select id="room_category_id" name="room_category_id" class="form-select @error('room_category_id') is-invalid @enderror" required>
                            @foreach ($categories as $category)
                            <option @if ($room->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
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
                        <input type="text" id="phone" value="{{ $room->phone }}" name="phone" placeholder="Entrez le numero de votre telephone" class="form-control @error('phone') is-invalid @enderror" required>
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" @if(!$room->image_path) required @endif>
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="prix_haut_saison">Prix haut saison</label>
                        <input type="number" id="prix_haut_saison" value="{{ $room->prix_haut_saison }}" name="prix_haut_saison" class="form-control @error('prix_haut_saison') is-invalid @enderror" required>
                        @error('prix_haut_saison')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="prix_bas_saison">Prix bas saison</label>
                        <input type="number" id="prix_bas_saison" value="{{ $room->prix_bas_saison }}" name="prix_bas_saison" class="form-control @error('prix_bas_saison') is-invalid @enderror" required>
                        @error('prix_bas_saison')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" required>{{ $room->description }}</textarea>
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