<x-layouts.auth>

    <div class="bg-gray d-flex flex-column align-items-center justify-content-center w-full" style="height: 100vh">

        <h1 class="text-center fw-bolder tracking-tighter mb-2" style="max-width: 30rem">Se connecter a votre compte
            {{ env('APP_NAME') }}</h1>

        <form action="" class="bg-white w-100 p-3 rounded border border-2 login-form" method="POST">

            @csrf

            <div class="mb-3">
                <label for="email">Address email</label>
                <input value="{{ old('email') }}" type="email" id="email" name="email" class="@error('email') is-invalid @enderror form-control"
                    placeholder="Entrez vote addresse email" required>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password">Mote de passe</label>
                <input type="password" id="password" name="password"
                    class="@error('password') is-invalid @enderror form-control" placeholder="Entrez vote mot de passe"
                    required>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button class="btn btn-success w-100">Se connecter</button>

        </form>


    </div>

</x-layouts.auth>
