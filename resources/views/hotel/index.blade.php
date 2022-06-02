<x-layouts.user>

    <div class="container">
        <h1 class="tracking-tighter fw-bold">Mon hotel</h1>
        <form action="" method="POST" class="bg-white p-3 border border-2 rounded w-full" enctype="multipart/form-data">
            @csrf

            <div class="col-md-10 mx-auto">
                <div class="border border-2" style="margin: auto; width: 200px; height: 200px; overflow: hidden; border-radius: 50%">
                    <img src="/storage/{{ $hotel->image_path }}" class="w-100 h-100" style="object-fit: cover" alt="">
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <p class="m-0">{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                <div class="mb-3">
                    <label for="nom">Le nom de votre hotel</label>
                    <input type="text" id="nom" name="name" class="form-control" placeholder="Entrez le nom de votre hotel" value="{{ old('name') ?? $hotel->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="image">L'image de votre hotel</label>
                    <input type="file" id="image" name="image" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea type="file" id="description" name="description" class="form-control" placeholder="Entrez une petite description" required>{{ old('description') ?? $hotel->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="address">Hotel address</label>
                    <input type="text" id="address" name="address" class="form-control" placeholder="Entrez l'address de votre hotel" value="{{ old('address') ?? $hotel->address }}" required>
                </div>

                <div class="mb-3">
                    <label for="stars">Nombre d'etoile</label>
                    <input type="number" id="stars" name="stars" class="form-control" value="{{ old('stars') ?? $hotel->stars }}" required>
                </div>

                <button class="btn btn-success mx-auto">
                    <i class="fas fa-save me-2"></i>
                    <span>Mettre a jour mon hotel</span>
                </button>
            </div>
        </form>
    </div>

</x-layouts.user>