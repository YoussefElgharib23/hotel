<x-layouts.user>

    <div class="container">
        <h1 class="tracking-tighter fw-bold">Mon hotel</h1>
        <form action="" method="POST" class="bg-white p-3 border border-2 rounded w-full" enctype="multipart/form-data">
            @csrf

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

            <div>
                <label for="nom">Le nom de votre hotel</label>
                <input type="text" id="nom" name="name" class="form-control" placeholder="Entrez le nom de votre hotel" value="{{ old('name') ?? $hotel->name }}" required>
            </div>

            <div class="mt-3">
                <label for="image">L'image de votre hotel</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>

            <button class="btn btn-success mt-3 mx-auto">
                <i class="fas fa-save me-2"></i>
                <span>Mettre a jour mon hotel</span>
            </button>
        </form>
    </div>

</x-layouts.user>