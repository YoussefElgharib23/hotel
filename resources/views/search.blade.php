<x-layout>
    <div class="row mb-5">
        <div class="col-md-5 mb-lg-0 mb-4">
            <form action="/search" class="col-md-10 mx-auto p-4 border border-2 bg-white rounded shadow-lg">
                <h1 class="text-center tracking-tighter" style="font-weight: 900; color: #545454;">WHERE ARE YOU PLANNING TO GO?</h1>
                <div class="mb-3">
                    <label for="station">Station</label>
                    <input value="{{ request()->get('station', '') }}" type="text" name="station" placeholder="Wich station" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="check_in">Check in</label>
                    <input value="{{ request()->get('check_in', '') }}" type="date" name="check_in" placeholder="Wich station" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="check_in">Check out</label>
                    <input value="{{ request()->get('check_out', '') }}" type="date" name="check_out" placeholder="Wich station" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="check_in">Adults</label>
                    <input value="{{ request()->get('adults', '') }}" type="number" name="adults" placeholder="Wich station" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="check_in">Kids</label>
                    <input value="{{ request()->get('kids', '') }}" type="number" name="kids" placeholder="Wich station" class="form-control" required>
                </div>
                <button class="btn btn-primary w-100">
                    <i class="fa fa-search me-1"></i>
                    <span>Search</span>
                </button>
            </form>
        </div>

        <div class="col-md-7">
            @foreach ($hotels as $hotel)
            <a href="{{ route('hotel.rooms', [...request()->all(), 'hotel' => $hotel]) }}" class="hotel-card p-3 border border-2 bg-white rounded d-flex align-items-center">
                <div class="me-3" style="flex-shrink: 0; width: 200px; border-radius: 0.25rem; height: 200px; overflow: hidden">
                    <img style="width: 100%; height: 100%; object-fit: cover; border-radius: 0.25rem;" src="/storage/{{ $hotel->image_path }}" style alt="">
                </div>

                <div>
                    <h2 class="fw-bold">{{ $hotel->name }}</h2>
                    <p>{{ $hotel->description }}</p>
                    <div>
                        @for ($i =0; $i < $hotel->stars; $i++)
                            <i class="fas fa-star text-warning"></i>
                            @endfor
                            ({{$hotel->stars}})
                    </div>
                </div>
            </a>
            @endforeach

        </div>

    </div>
</x-layout>