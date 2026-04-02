<x-auth>
    <!-- Login -->
    <div class="card p-md-7 p-1">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
            <a href="index.html" class="app-brand-link gap-2">
                <a href="index.html" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <img src="{{ asset('assets/img/text-icon.svg') }}">
                    </span>
                </a>
            </a>
        </div>
        <!-- /Logo -->

        <div class="card-body mt-4">
            <h4 class="mb-1">Selamat Datang! 👋</h4>
            <p class="mb-5">Nikmati kemudahan akses layanan perumahan.</p>

            <form id="formAuthentication" class="mb-5" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-floating form-floating-outline mb-5 form-control-validation">
                    <input type="email" class="form-control @error('email') is-invalid @enderror"" id=" email"
                        name="email" placeholder="Enter your email" autofocus />
                    <label for="email">Email</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-5">
                    <div class="form-password-toggle form-control-validation">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <label for="password">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <span class="input-group-text cursor-pointer"><i
                                    class="icon-base ri ri-eye-off-line icon-20px"></i></span>
                        </div>
                    </div>
                </div>
                <div class="mb-5 d-flex justify-content-between mt-5">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="remember-me" />
                        <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                    <a href="auth-forgot-password-basic.html" class="float-end mb-1 mt-2">
                        <span>Forgot Password?</span>
                    </a>
                </div>
                <div class="mb-5">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
            </form>

            <p class="text-center mb-5">
                <span>Warga baru?</span>
                <a href="{{ route('register') }}">
                    <span>Buat Akun disini</span>
                </a>
            </p>

            <div class="divider my-5">
                <div class="divider-text">or</div>
            </div>

            <div class="row">
                <div class="col-12 mb-2 mb-sm-0">
                    <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-4"
                        href="/auth/google" role="button">
                        <img src="{{ asset('assets/img/icons/google-icon.svg') }}" class="img-fluid me-2" width="18"
                            height="18">
                        <span class="flex-shrink-0">Masuk Dengan Google</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Login -->
    <img alt="mask" src="../../assets/img/illustrations/auth-basic-login-mask-light.png"
        class="authentication-image d-none d-lg-block"
        data-app-light-img="illustrations/auth-basic-login-mask-light.png"
        data-app-dark-img="illustrations/auth-basic-login-mask-dark.png" />
</x-auth>