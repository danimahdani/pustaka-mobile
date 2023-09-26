<x-templates.layout :titleHeader="$titleHeader">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Book Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Book Author</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                            value="{{ old('author') }}">
                        @error('author')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Book Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                            name="location" value="{{ old('location') }}">
                        @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <img style="max-height: 400px " class="d-block img-preview img-fluid mb-3" />
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                            id="image" onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="">Category</label>
                        <div class="">
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        @if (old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" name="description" style="height: 120px;">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @push('extra-scripts')
        <script src="{{ asset('js/image-preview.js') }}"></script>
    @endpush
</x-templates.layout>
