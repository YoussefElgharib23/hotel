<x-layout>

    <div class="bg-white border border-2 p-4 rounded">
        @if (session('success'))
        <div class="alert alert-success mb-2">
            {{session('success')}}
        </div>
        @endif
        <h1 class="tracking-tighter fw-bold " style="font-size: 70px;">Les chambres de {{ $hotel->name }}</h1>
        <div class="row mb-5">
            @foreach ($rooms as $room)
            <div class="col-md-3">
                <a data-room-id="{{ $room->id }}" data-bs-toggle="modal" data-bs-target="#reservationModal" href="javascript:;" class="room p-2 hotel-card border border-2 bg-white rounded d-flex align-items-start flex-column">
                    <div class="me-3" style="flex-shrink: 0; width: 100%; border-radius: 0.25rem; height: 250px; overflow: hidden">
                        <img style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.25rem;" src="/storage/{{ $room->image_path }}" style alt="">
                    </div>

                    <div class="p-3">
                        <p class="m-0 h6 mb-2">Category: {{ $room->category->name }}</p>
                        <p class="m-0 h6 mb-2">Description: {{ $room->description }}</p>
                        <p class="m-0 h6 mb-2">Prix haut saison: {{ $room->prix_haut_saison }} MAD</p>
                        <p class="m-0 h6 mb-2">Prix bas saison: {{ $room->prix_bas_saison }} MAD</p>

                    </div>
                    <button class="btn btn-success w-100">
                        <span>Reserver</span>
                    </button>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reservationModalLabel">Reserver votre chambre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="room_id">

                        @foreach (request()->all() as $query => $value)
                        <input type="hidden" name="{{ $query }}" value="{{ $value }}">
                        @endforeach

                        <div class="mb-3">
                            <label for="name">Votre nom</label>
                            <input class="form-control" type="text" name="name" required placeholder="Entrez votre nom">
                        </div>
                        <div class="mb-3">
                            <label for="email">Votre addresse email</label>
                            <input class="form-control" type="email" name="email" required placeholder="Entrez votre addresse email">
                        </div>
                        <div class="mb-3">
                            <label for="name">Votre numero de telephone</label>
                            <input class="form-control" type="text" name="phone" required placeholder="Entrez votre numero de telephone">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Reserver</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(function() {
            $('.room').click(function() {
                $('input[name="room_id"]').val($(this).data('room-id'));
            })
        })
    </script>
</x-layout>