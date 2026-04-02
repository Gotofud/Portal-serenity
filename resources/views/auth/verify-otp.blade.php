<x-auth>
    <!--  Two Steps Verification -->
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
        <div class="card-body mt-1 text-center">
            <h4 class="mb-1">Cek Email Anda </h4>
            <p class="mb-5">
                Masukkan kode verifikasi 6 digit dari email
                <span
                    class="d-block mt-1 text-primary">{{ \Illuminate\Support\Str::mask($user->email, '*', 2, strpos($user->email, '@') - 1) }}</span>
            </p>
            <form id="twoStepsForm" method="POST" action="{{ route('verify-otp.submit') }}">
                @csrf
                <div class="mb-5 form-control-validation">
                    <div
                        class="auth-input-wrapper d-flex align-items-center justify-content-between numeral-mask-wrapper">
                        <input id="otp" type="text"
                            class="form-control  text-center numeral-mask mx-sm-1 my-2  @error('otp') is-invalid @enderror"
                            name="otp" required autofocus placeholder="123456"
                            style="font-size: 24px; letter-spacing: 10px; font-weight: bold;" maxlength="6"
                            inputmode="numeric">

                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100 mb-5">Verifikasi Akun Saya</button>
            </form>
            <div class="text-center">
                Kode tidak muncul?
                {{-- Kita gunakan span untuk pesan cooldown --}}
                <span id="cooldown-timer" class="text-muted" style="display: none;">
                    Kirim ulang tersedia dalam <b id="seconds">60</b> detik
                </span>

                <a href="javascript:void(0);" id="resend-link"
                    onclick="event.preventDefault(); document.getElementById('resend-form').submit();">
                    Kirim Ulang
                </a>
            </div>

            <form id="resend-form" action="{{ route('verify-otp.resend') }}" method="POST" style="display: none;">
                @csrf
            </form>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
    <img alt="mask" src="../../assets/img/illustrations/auth-basic-login-mask-light.png"
        class="authentication-image d-none d-lg-block"
        data-app-light-img="illustrations/auth-basic-login-mask-light.png"
        data-app-dark-img="illustrations/auth-basic-login-mask-dark.png" />
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const resendLink = document.getElementById('resend-link');
            const timerContainer = document.getElementById('cooldown-timer');
            const secondsText = document.getElementById('seconds');
            let timeLeft = 60;

            function startTimer() {
                // Sembunyikan link, tampilkan timer
                resendLink.style.display = 'none';
                timerContainer.style.display = 'inline';

                let interval = setInterval(function () {
                    timeLeft--;
                    secondsText.innerText = timeLeft;

                    if (timeLeft <= 0) {
                        clearInterval(interval);
                        // Tampilkan kembali link, sembunyikan timer
                        resendLink.style.display = 'inline';
                        timerContainer.style.display = 'none';
                        timeLeft = 60; // reset
                    }
                }, 1000);
            }

            // Jalankan timer jika ada alert success (artinya baru saja kirim OTP)
            @if(session('success'))
                startTimer();
            @endif

            // Jalankan juga saat link diklik (opsional, karena page akan reload)
            resendLink.addEventListener('click', function () {
                // Ini akan lari ke form submit, tapi timer akan muncul lagi 
                // setelah reload jika session('success') ada.
            });
        });
    </script>
</x-auth>