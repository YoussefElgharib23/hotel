<x-layout>

    <div class="bg-white border border-2 p-4 rounded">
        @if (session('success'))
        <div class="alert alert-success mb-2">
            {{session('success')}}
        </div>
        @endif
        <h1 class="tracking-tighter fw-bold">Contact us</h1>
        <p class="text-left">Pour toutes demandes, merci de nous envoyer un mail via le formulaire ci-dessous.</p>

        <form action="" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="first_name">Prenom</label>
                    <input class="form-control" type="text" id="first_name" name="first_name" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name">Nom</label>
                    <input class="form-control" type="text" id="last_name" name="last_name" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email">Addresse email</label>
                    <input class="form-control" type="email" id="email" name="email" required>
                </div>
                <div class="col-md-6">
                    <label for="subject">Sujet</label>
                    <input class="form-control" type="text" id="subject" name="subject" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" value="{{ old('description') }}" class="form-control"></textarea>
            </div>

            <button class="btn btn-success">Envoyez</button>
        </form>
    </div>
</x-layout>