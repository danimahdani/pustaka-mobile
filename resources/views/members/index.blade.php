<x-templates.layout :titleHeader="$titleHeader">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('members.create') }}" class="btn btn-icon icon-left btn-primary"><i
                            class="fas fa-plus"></i> Add new
                        Member</a>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            <a href="{{ route('members.edit', $user->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('members.destroy', $user->id) }}" method="post"
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
