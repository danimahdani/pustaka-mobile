<x-templates.layout :titleHeader="$titleHeader">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('books.create') }}" class="btn btn-icon icon-left btn-primary"><i
                            class="fas fa-plus"></i> Add
                        Books</a>
                </div>
                <div class="card-body">
                    <div class="col-sm-5 px-0">
                        <x-alert></x-alert>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="table">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">
                                        No
                                    </th>
                                    <th>Book Title</th>
                                    <th>Author</th>
                                    <th>Book Location</th>
                                    <th>Book Entry Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->location }}</td>
                                        <td>{{ $book->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('books.show', $book->id) }}"
                                                class="btn btn-primary">Detail</a>
                                            <a href="{{ route('books.edit', $book->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('books.destroy', $book->id) }}" method="post"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure delete ?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-templates.layout>
