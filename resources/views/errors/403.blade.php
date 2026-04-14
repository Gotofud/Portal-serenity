<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" href="{{ asset('assets/img/text-icon.svg') }}" />

    <x-partials.user.style />

    <title>Forbidden</title>
</head>

<body>
    <div id="main-wrapper">
        <div
            class="position-relative overflow-hidden min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <img src="{{ asset('assets/img/text-icon.svg') }}" style="width:10rem" class="mb-5"
                                alt="error jir" class="img-fluid" width="500">
                            <h1 class="fw-semibold mb-7 fs-9"><span class="text-danger">403</span> | Halaman Diblokir</h1>
                            <h5 class="fw-semibold mb-7">Anda tidak memiliki izin untuk mengakses halaman ini.</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>