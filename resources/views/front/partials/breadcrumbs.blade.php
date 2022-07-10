@unless($breadcrumbs->isEmpty())
<div class="container-fluid bg-primary py-5 mb-3 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-3 text-white animated slideInDown">@yield('title')</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        @foreach($breadcrumbs as $breadcrumb)

                        @if(!is_null($breadcrumb->url) && !$loop->last)
                        <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                        @else
                        <li class="breadcrumb-item text-white active">{{ $breadcrumb->title }}</li>
                        @endif
                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endunless