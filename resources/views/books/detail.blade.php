<x-templates.layout :titleHeader="$titleHeader">
    <div class="row">
        <div class="col-12">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/' . $book->image) }}" class="img-fluid rounded-start"
                            alt="{{ $book->title }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->description }}</p>
                            <p class="card-text"><small class="text-muted">Location :
                                    {{ $book->location }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-templates.layout>
