@extends('layouts.nav')

@section('main')
    <div class="md:flex md:justify-between py-6 flex-row-reverse">
        <div>
            <div class="dropdown relative mb-2">
                <button
                    class="flex text-lg hover:bg-green-500 hover:text-white focus:text-white focus:bg-green-500  border-green-500 text-green-500 px-6 py-2 border-2 font-medium leading-tight rounded focus:ring-0 transition duration-150 ease-in-out"
                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name }}
                    <span class="iconify h-6 w-6 ml-2" data-icon="bxs:user"></span>
                </button>
                <ul class="
                             w-40
                            dropdown-menu
                            min-w-max
                            absolute
                            hidden
                            bg-white
                            text-base
                            z-50
                            float-left
                            py-2
                            list-none
                            text-left
                            rounded-lg
                            shadow-lg
                            mt-1
                            m-0
                            bg-clip-padding
                            border-none
                        "
                    aria-labelledby="dropdownMenuButton1">
                    <li>
                        <a class="
                                dropdown-item
                                text-sm
                                py-2
                                px-4
                                font-normal
                                block
                                w-full
                                whitespace-nowrap
                                bg-transparent
                                text-gray-700
                                hover:bg-gray-100
                                "
                            href="/logout">Log out</a>
                    </li>
                </ul>
            </div>
        </div>

        <header>
            <h2 class="text-2xl font-bold">DASHBOARD ADMIN</h2>
        </header>

    </div>
    <div class="" id="employeeeApp">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="register">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="role"
                                    class="col-md-4 col-form-label text-md-end">{{ __('role') }}</label>

                                <div class="col-md-6">
                                    <input id="role" type="text"
                                        class="form-control @error('role') is-invalid @enderror" name="role"
                                        value="{{ old('role') }}" required autocomplete="role" autofocus>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tps"
                                    class="col-md-4 col-form-label text-md-end">{{ __('tps') }}</label>

                                <div class="col-md-6">
                                    <input id="tps" type="text"
                                        class="form-control @error('tps') is-invalid @enderror" name="tps"
                                        value="{{ old('tps') }}" required autocomplete="tps" autofocus>

                                    @error('tps')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
