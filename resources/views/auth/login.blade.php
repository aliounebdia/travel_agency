<x-guest-layout>
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ route('accueil') }}" class="h1"><b>Travel</b>Agency</a>
        </div>
        <div class="card-body">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="text-red" :errors="$errors" />

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input id="email" class="form-control @error('email') is-invalid @enderror"
                           type="email" name="email" value="{{ old('email') }}"
                           placeholder="Adresse email" required autofocus />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" class="form-control @error('password') is-invalid @enderror"
                           type="password" name="password" placeholder="Mot de passe" required />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Se souvenir de moi
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button class="btn btn-primary btn-block">Se connecter</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1">
                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
</x-guest-layout>
