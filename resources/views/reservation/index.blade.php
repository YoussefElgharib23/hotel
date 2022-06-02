<x-layouts.user>
    <style>
        td,
        th {
            white-space: nowrap;
        }
    </style>
    <div class="container">
        <h1 class="tracking-tighter fw-bold">Les reservations</h1>
        <div class="bg-white p-3 border border-2 rounded">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom du client</th>
                            <th scope="col">Numero de telephone</th>
                            <th scope="col">Addresse email</th>
                            <th scope="col">N de chambre</th>
                            <th scope="col">Hotel</th>
                            <th scope="col">Adults</th>
                            <th scope="col">Kids</th>
                            <th scope="col">Status</th>
                            <th scope="col">Check in</th>
                            <th scope="col">Check ou</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($reservations as $reservation)
                        <tr>

                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->name }}</td>
                            <td>
                                <a href="tel:{{ $reservation->phone }}">{{ $reservation->phone }}</a>
                            </td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->room_id }}</td>
                            <td>{{ $reservation->room->hotel->name }}</td>
                            <td>{{ $reservation->adults }}</td>
                            <td>{{ $reservation->kids }}</td>
                            <td>
                                @if (!$reservation->is_accepted)
                                <div class="badge bg-warning">Pending</div>
                                @else
                                <div class="badge bg-success">Accepted</div>
                                @endif
                            </td>
                            <td>{{ optional($reservation->check_in)->format('M d, Y') }}</td>
                            <td>{{ optional($reservation->check_out)->format('M d, Y') }}</td>
                            <td>
                                @if(!$reservation->is_accepted)
                                <a href="{{ route('user.reserations.accept', $reservation) }}" class="btn btn-success">Accepter</a>
                                <a href="{{ route('user.reserations.refuse', $reservation) }}" class="btn btn-danger">Refuser</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            {{$reservations->links() }}
        </div>
    </div>
</x-layouts.user>