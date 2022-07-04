<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body class="bg-login">

    <div class=" bg-green-600 min-h-screen lg:w-3/12 ">
        <div class=" py-20"></div>
        <div class=" bg-white md:mx-12 md:rounded-2xl">
            <form method="POST" action="/login">
                @csrf

                <h1 class="text-center py-2 font-bold text-2xl">Website SIMSAT</h1>
                <img src="{{ asset('img/batu.png') }}" class="login-pic">  
                    <div class=" px-6">
                        <label for="email" class="col-md-4">{{ __('E-Mail Address') }}</label>
                        <input id="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            type="email" name="email"
                            class="@error('email') is-invalid @enderror  px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                            placeholder="you@example.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong class=" text-red-600 text-xs">{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="px-6">
                        <label for="password" class="col-md-4 mt-3">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="@error('password') is-invalid @enderror px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"
                            name="password" required autocomplete="current-password" placeholder="**********">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="flex space-x-2 justify-center py-4 px-6">
                        <button type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light"
                            class=" lg:w-full inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                            {{ __('Masuk') }}
                        </button>
                    </div>
            </form>
        </div>

    </div>
</body>

</html>
