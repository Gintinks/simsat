<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="bg-login">

    <div class="col-lg-4 bg-testing">
        <div style="height: 150px;"></div>
        <div style="height: 600px;" class="container-md col-lg-9 border rounded bg-white">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <h1 class="text-center mt-3">Website SIMSAT</h1>
                <img src="{{ asset('img/batu.png') }}" class="login-pic">
                <div class="offset-md-3 mt-2">
                    <label for="email" class="col-md-4">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="password" class="col-md-4 mt-3">{{ __('Password') }}</label>

                    <div class="col-md-8">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8 d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Masuk') }}
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
</body>

</html>
