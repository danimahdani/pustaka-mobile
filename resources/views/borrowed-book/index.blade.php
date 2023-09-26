<x-templates.layout :titleHeader="$titleHeader">

    <div class="row">
        <div class="col-12">
            <div class="card">
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
                                    <th>Borrowed</th>
                                    <th>Return Of Date</th>
                                    <th>Status Accepted</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrowed_books as $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $item->books->title }}</td>
                                        <td>{{ $item->users->name }}</td>
                                        <td>{{ $item->return_of_date }}</td>
                                        <td>{{ $item->is_accepted }}</td>
                                        <td>
                                            <a href="{{ route('members.edit', $item->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('members.destroy', $item->id) }}" method="post"
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
