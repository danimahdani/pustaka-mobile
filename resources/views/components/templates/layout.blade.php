<!DOCTYPE html>
<html lang="en">

@include('components.templates.partials.head')


<body>
    <div id="app">
        <div class="main-wrapper">

            @include('components.templates.partials.navbar')

            @include('components.templates.partials.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>{{ $titleHeader ?? 'Dashboard' }}</h1>
                    </div>

                    <div class="section-body">
                        {{ $slot }}
                    </div>
                </section>
            </div>
        </div>
    </div>

    @include('components.templates.partials.scripts')

</body>

</html>
