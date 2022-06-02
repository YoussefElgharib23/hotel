<x-layout>
    <form action="/search" class="col-md-10 mx-auto p-4 border border-2 bg-white rounded shadow-lg">
        <h1 class="text-center tracking-tighter" style="font-weight: 900; color: #545454;">WHERE ARE YOU PLANNING TO GO?</h1>
        <div>
            <label for="station">Station</label>
            <input type="text" name="station" placeholder="Wich station" class="form-control" required>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <div>
                    <label for="check_in">Check in</label>
                    <input type="date" name="check_in" placeholder="Wich station" class="form-control" required>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <label for="check_in">Check out</label>
                    <input type="date" name="check_out" placeholder="Wich station" class="form-control" required>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <label for="check_in">Adults</label>
                    <input type="number" name="adults" placeholder="Wich station" class="form-control" required>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <label for="check_in">Kids</label>
                    <input type="number" name="kids" placeholder="Wich station" class="form-control" required>
                </div>
            </div>
            <div class="col-md-3 mx-auto">
                <button class="btn btn-primary mt-3 w-100">
                    <i class="fa fa-search me-1"></i>
                    <span>Search</span>
                </button>
            </div>
        </div>
    </form>
</x-layout>