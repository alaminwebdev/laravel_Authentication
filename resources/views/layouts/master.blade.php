<!doctype html>
<html lang="en">
@include('partials.head')

<body>
    <main>
        @include('partials.nav')
        <div class="container pt-5">
            <div class="row">
                {{-- @php
                    dd(session()->all());
                @endphp --}}
                @if (session()->has('success'))
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                @if (session()->has('danger'))
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
        @include('partials.footer')
    </main>
</body>
</html>