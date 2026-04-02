<!doctype html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default"
  data-bs-theme="light" data-assets-path="assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Demo: Wizard Numbered - Forms | Materialize - Bootstrap Dashboard PRO</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}" />

  <!-- Core CSS -->
  <!-- build:css assets/vendor/css/theme.css -->

  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css') }}" />

  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Vendors CSS -->

  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <!-- endbuild -->

  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />

  <!-- Page CSS -->
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">


      <!-- / Navbar -->

      <!-- Content wrapper -->
      <div class="content-wrapper d-flex align-items-center justify-content-center min-vh-100">
        <!-- Content -->
        <div class="container-xxl">
          <!-- Default -->
          <div class="row justify-content-center">
            <!-- Default Wizard -->
            <div class="col-lg-8 col-md-10 col-12 mb-6">

              <div class="bs-stepper wizard-numbered mt-2">
                <div class="bs-stepper-header">
                  <div class="step" data-target="#account-details">
                    <button type="button" class="step-trigger">
                      <span class="bs-stepper-circle"><i class="icon-base ri ri-check-line"></i></span>
                      <span class="bs-stepper-label">
                        <span class="bs-stepper-number">01</span>
                        <span class="d-flex flex-column gap-1 ms-2">
                          <span class="bs-stepper-title">Profil Pribadi</span>
                          <span class="bs-stepper-subtitle">Setup Account Details</span>
                        </span>
                      </span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#personal-info">
                    <button type="button" class="step-trigger">
                      <span class="bs-stepper-circle"><i class="icon-base ri ri-check-line"></i></span>
                      <span class="bs-stepper-label">
                        <span class="bs-stepper-number">02</span>
                        <span class="d-flex flex-column gap-1 ms-2">
                          <span class="bs-stepper-title">Personal Info</span>
                          <span class="bs-stepper-subtitle">Add personal info</span>
                        </span>
                      </span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#social-links">
                    <button type="button" class="step-trigger">
                      <span class="bs-stepper-circle"><i class="icon-base ri ri-check-line"></i></span>
                      <span class="bs-stepper-label">
                        <span class="bs-stepper-number">03</span>
                        <span class="d-flex flex-column gap-1 ms-2">
                          <span class="bs-stepper-title">Social Links</span>
                          <span class="bs-stepper-subtitle">Add social links</span>
                        </span>
                      </span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">
                  <form onSubmit="return false">
                    <!-- Account Details -->
                    <div id="account-details" class="content">
                      <div class="content-header mb-4">
                        <h6 class="mb-0">Account Details</h6>
                        <small>Enter Your Account Details.</small>
                      </div>
                      <div class="row g-5">
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="username" name="full_name" class="form-control"
                              placeholder="johndoe" />
                            <label for="username">Nama Panjang</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <div class="form-floating form-floating-outline">
                              <select class="form-select" name="gender">
                                <option label="Pilih Jenis Kelamin">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                              </select>
                              <label for="gender">Jenis Kelamin</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <div class="form-floating form-floating-outline">
                              <select class="form-select" name="citizenship">
                                <option label="Pilih Kewarganegaraan">Pilih Kewarganegaraan</option>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                              </select>
                              <label for="citizenship">Kewarganegaraan</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="pod" name="pod" class="form-control" placeholder="Bandung" />
                            <label for="pod">Tempat Lahir</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="date" id="bod" name="bod" class="form-control"
                              max="{{ \Carbon\Carbon::now()->subYears(17)->format('Y-m-d') }}" />
                            <label for="bod">Tanggal Lahir</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <div class="form-floating form-floating-outline">
                              <select class="form-select" name="citizenship">
                                <option label="Pilih Agama">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Konguchu">Konguchu</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Kepercayaan Lain">Kepercayaan Lain</option>
                              </select>
                              <label for="citizenship">Agama</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                          <button class="btn btn-outline-secondary btn-prev" disabled>
                            <i class="icon-base ri ri-arrow-left-line icon-sm me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                          </button>
                          <button class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                            <i class="icon-base ri ri-arrow-right-line icon-sm"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- Personal Info -->
                    <div id="personal-info" class="content">
                      <div class="content-header mb-4">
                        <h6 class="mb-0">Personal Info</h6>
                        <small>Enter Your Personal Info.</small>
                      </div>
                      <div class="row g-5">
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="first-name" class="form-control" placeholder="John" />
                            <label for="first-name">First Name</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="last-name" class="form-control" placeholder="Doe" />
                            <label for="last-name">Last Name</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <select class="select2 form-select" id="country">
                              <option label=" "></option>
                              <option>UK</option>
                              <option>USA</option>
                              <option>Spain</option>
                              <option>France</option>
                              <option>Italy</option>
                              <option>Australia</option>
                            </select>
                            <label for="country">Country</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <select class="selectpicker w-auto" id="language" data-style="btn-transparent"
                              data-tick-icon="icon-base ri ri-check-line text-white" multiple>
                              <option>English</option>
                              <option>French</option>
                              <option>Spanish</option>
                            </select>
                            <label for="language">Language</label>
                          </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                          <button class="btn btn-outline-secondary btn-prev">
                            <i class="icon-base ri ri-arrow-left-line icon-sm me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                          </button>
                          <button class="btn btn-primary btn-next">
                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                            <i class="icon-base ri ri-arrow-right-line icon-sm"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- Social Links -->
                    <div id="social-links" class="content">
                      <div class="content-header mb-4">
                        <h6 class="mb-0">Social Links</h6>
                        <small>Enter Your Social Links.</small>
                      </div>
                      <div class="row g-5">
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="twitter" class="form-control"
                              placeholder="https://twitter.com/abc" />
                            <label for="twitter">Twitter</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="facebook" class="form-control"
                              placeholder="https://facebook.com/abc" />
                            <label for="facebook">Facebook</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="google" class="form-control"
                              placeholder="https://plus.google.com/abc" />
                            <label for="google">Google+</label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-floating form-floating-outline">
                            <input type="text" id="linkedin" class="form-control"
                              placeholder="https://linkedin.com/abc" />
                            <label for="linkedin">LinkedIn</label>
                          </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                          <button class="btn btn-outline-secondary btn-prev">
                            <i class="icon-base ri ri-arrow-left-line icon-sm me-sm-1 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                          </button>
                          <button class="btn btn-primary btn-submit">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /Default Wizard -->


          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->

    <!-- build:js assets/vendor/js/theme.js  -->

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <script src="{{ asset('assets/js/form-wizard-numbered.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard-validation.js') }}"></script>
</body>

</html>