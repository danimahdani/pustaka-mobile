<x-templates.layout :titleHeader="$titleHeader">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form method="post" action="{{ route('categories.update', $category->id) }}">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Edit Category</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $category->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-templates.layout>
