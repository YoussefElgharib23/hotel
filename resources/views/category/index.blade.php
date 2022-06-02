<x-layouts.user>

    <div class="container">

        <div class="w-100 d-flex justify-content-between align-items-center mb-3">
            <h1 class="tracking-tighter fw-bold">Les categories</h1>

            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Ajouter une nouvelle categorie</a>
        </div>
        <div class="bg-white p-3 border border-2 rounded">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('user.categories.edit', $category) }}" class="edit btn btn-primary">
                                <i class="fas fa-edit"></i>
                                <span>Edit</span>
                            </a>
                            <a href="#" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                <span>Delete</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{$categories->links()}}

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Ajouter une nouvelle category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf

                        <div class="mb-3">
                            <label for="name">Le nom de categorie</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Donnez le nom de votre category" required>
                            @error('name')
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

    <div id="modalResult"></div>

    <x-slot:scripts>
        @if ($errors->any())
        <script>
            $(function() {
                $('#addModal').modal('toggle')
            })
        </script>
        @endif

        <script>
            $(function() {
                $('.edit').click(function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: $(this).attr('href'),
                        method: 'GET',
                        success: function(data) {
                            $("#modalResult").html(data)
                            $("#editModal").modal('toggle')
                        }
                    })
                })
            })
        </script>
    </x-slot:scripts>
</x-layouts.user>