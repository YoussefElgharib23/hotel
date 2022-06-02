<x-layouts.admin>


    <div class="container">
        <h1>Les messages de contact</h1>

        <div class="bg-white p-3 rounded border border-2">
            <table class="table">

                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Addresse email</th>
                        <th>Sujet</th>
                        <th>Message</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($c as $contact)
                    <tr>
                        <th>{{ $contact->id }}</th>
                        <th>{{ $contact->first_name }}</th>
                        <th>{{ $contact->last_name }}</th>
                        <th>{{ $contact->email }}</th>
                        <th>{{ $contact->subject }}</th>
                        <th>{{ $contact->description }}</th>
                    </tr>
                    @endforeach

                </tbody>

            </table>

            {{ $c->links() }}

        </div>
    </div>


</x-layouts.admin>