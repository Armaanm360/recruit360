@extends('authlogin')

@section('content')
<body id="layout-1" data-luno="theme-blue">
  <!-- start: body area -->
  <div class="wrapper">
    <!-- Sign In version 1 -->
    <!-- start: page body -->
    <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
      <div class="container-fluid">
        <div class="row g-0">
          <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
            <div style="max-width: 25rem;">
              <div class="mb-4">
                  <h3 style="font-weight: bold;color:black">Recruitment Management Software</h3>
              </div>
              <div class="mb-5">
                <h2 class="color-900">M360 ICT</h2>
              </div>
              <!-- List Checked -->
              <!--<ul class="list-unstyled mb-5">-->
              <!--  <li class="mb-4">-->
              <!--    <span class="d-block mb-1 fs-4 fw-light">All-in-one tool</span>-->
              <!--    <span class="color-600">Amazing Features to make your life easier & work efficient</span>-->
              <!--  </li>-->
              <!--  <li>-->
              <!--    <span class="d-block mb-1 fs-4 fw-light">Easily add &amp; manage your services</span>-->
              <!--    <span class="color-600">It brings together your tasks, projects, timelines, files and more</span>-->
              <!--  </li>-->
              <!--</ul>-->
              <!--<div class="mb-2">-->
              <!--  <a href="#" class="me-3 color-600">Home</a>-->
              <!--  <a href="#" class="me-3 color-600">About Us</a>-->
              <!--  <a href="#" class="me-3 color-600">FAQs</a>-->
              <!--</div>-->
              <!--<div>-->
              <!--  <a href="#" class="me-3 color-400"><i class="fa fa-facebook-square fa-lg"></i></a>-->
              <!--  <a href="#" class="me-3 color-400"><i class="fa fa-github-square fa-lg"></i></a>-->
              <!--  <a href="#" class="me-3 color-400"><i class="fa fa-linkedin-square fa-lg"></i></a>-->
              <!--  <a href="#" class="me-3 color-400"><i class="fa fa-twitter-square fa-lg"></i></a>-->
              <!--</div>-->
            </div>
          </div>
          <div class="col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
              <!-- Form -->

              <form class="row g-3" method="POST" action="{{ route('login') }}">
               @csrf
                <div class="col-12 text-center mb-5">
                  <h1>{{ __('Login') }}</h1>
                  <span class="text-muted">Free access to our dashboard.</span>
                </div>
                <div class="col-12 text-center mb-4">
                  {{-- <a class="btn btn-lg btn-outline-secondary btn-block disabled" href="#">
                    <span class="d-flex justify-content-center align-items-center">
                      <img class="avatar xs me-2" src="{{ asset('public/frontend') }}/assets/img/re-logo.png" alt="Image Description"> Recruitment Management </span>
                  </a> --}}
                  <img class="d-flex justify-content-center align-items-center img-fluid" src="{{ asset('public/frontend') }}/assets/img/logo.png" alt="">
                  <span class="dividers text-muted mt-4"><img class="avatar me-2" src="{{ asset('public/frontend') }}/assets/img/m360ict.gif" alt="Image Description"> </span>
                </div>
                <div class="col-12">
                  <div class="mb-2">
                    <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>

                    
                    <input id="email" type="email"
                      class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                      value="demo@recruit360.services" required autocomplete="email" autofocus>


                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="mb-2">
                    <div class="form-label">

                      <label class="d-flex justify-content-between align-items-center"
                        for="password">{{ __('Password') }}</label>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="12345678"
                      name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                      {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                    </label>
                  </div>
                </div>
                <div class="col-12 text-center mt-4">
                  <button type="submit" class="btn btn-lg btn-block btn-dark lift text-uppercase">{{ __('Sign In') }}</button>
                </div>
              </form>
              <!-- End Form -->
            </div>
          </div>
        </div> <!-- End Row -->
      </div>
    </div>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
      $(function () {
        $('#password').password()
      })
    </script>
  </div>
  <!-- Modal: Setting -->
  <!--<div class="modal fade" id="SettingsModal" tabindex="-1">-->
  <!--  <div class="modal-dialog modal-dialog-vertical right-side modal-dialog-scrollable">-->
  <!--    <div class="modal-content">-->
  <!--      <div class="px-xl-4 modal-header">-->
  <!--        <h5 class="modal-title">Theme Setting</h5>-->
  <!--        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
  <!--      </div>-->
  <!--      <div class="px-xl-4 modal-body custom_scroll">-->
          <!-- start: color setting -->
  <!--        <div class="card fieldset border border-primary p-3 setting-theme mb-4">-->
  <!--          <span class="fieldset-tile text-primary bg-card">Color Settings</span>-->
  <!--          <ul class="list-unstyled d-flex choose-skin mb-0">-->
  <!--            <li data-theme="black">-->
  <!--              <div class="black"></div>-->
  <!--            </li>-->
  <!--            <li data-theme="indigo">-->
  <!--              <div class="indigo"></div>-->
  <!--            </li>-->
  <!--            <li data-theme="blue">-->
  <!--              <div class="blue"></div>-->
  <!--            </li>-->
  <!--            <li data-theme="cyan">-->
  <!--              <div class="cyan"></div>-->
  <!--            </li>-->
  <!--            <li data-theme="green">-->
  <!--              <div class="green"></div>-->
  <!--            </li>-->
  <!--            <li data-theme="orange">-->
  <!--              <div class="orange"></div>-->
  <!--            </li>-->
  <!--            <li data-theme="blush">-->
  <!--              <div class="blush"></div>-->
  <!--            </li>-->
  <!--            <li data-theme="red">-->
  <!--              <div class="red"></div>-->
  <!--            </li>-->
  <!--            <li data-theme="dynamic">-->
  <!--              <div class="dynamic"><i class="fa fa-paint-brush"></i></div>-->
  <!--            </li>-->
  <!--          </ul>-->
            <!-- Settings: Theme dynamics -->
  <!--          <div class="card fieldset border border-primary p-3 dt-setting mt-4">-->
  <!--            <span class="fieldset-tile text-primary bg-card">Dynamic Color Settings</span>-->
  <!--            <div class="row g-3">-->
  <!--              <div class="col-7">-->
  <!--                <ul class="list-unstyled mb-0">-->
  <!--                  <li>-->
  <!--                    <button id="primaryColorPicker" class="btn bg-primary avatar xs me-2"></button>-->
  <!--                    <label>Primary Color</label>-->
  <!--                  </li>-->
  <!--                  <li>-->
  <!--                    <button id="secondaryColorPicker" class="btn bg-secondary avatar xs me-2"></button>-->
  <!--                    <label>Secondary Color</label>-->
  <!--                  </li>-->
  <!--                  <li>-->
  <!--                    <button id="BodyColorPicker" class="btn btn-outline-secondary bg-body avatar xs me-2"></button>-->
  <!--                    <label>Site Background</label>-->
  <!--                  </li>-->
  <!--                  <li>-->
  <!--                    <button id="CardColorPicker" class="btn btn-outline-secondary bg-card avatar xs me-2"></button>-->
  <!--                    <label>Widget Background</label>-->
  <!--                  </li>-->
  <!--                  <li>-->
  <!--                    <button id="BorderColorPicker" class="btn btn-outline-secondary bg-card avatar xs me-2"></button>-->
  <!--                    <label>Border Color</label>-->
  <!--                  </li>-->
  <!--                </ul>-->
  <!--              </div>-->
  <!--              <div class="col-5">-->
  <!--                <ul class="list-unstyled mb-0">-->
  <!--                  <li>-->
  <!--                    <button id="chartColorPicker1" class="btn chart-color1 avatar xs me-2"></button>-->
  <!--                    <label>Chart Color 1</label>-->
  <!--                  </li>-->
  <!--                  <li>-->
  <!--                    <button id="chartColorPicker2" class="btn chart-color2 avatar xs me-2"></button>-->
  <!--                    <label>Chart Color 2</label>-->
  <!--                  </li>-->
  <!--                  <li>-->
  <!--                    <button id="chartColorPicker3" class="btn chart-color3 avatar xs me-2"></button>-->
  <!--                    <label>Chart Color 3</label>-->
  <!--                  </li>-->
  <!--                  <li>-->
  <!--                    <button id="chartColorPicker4" class="btn chart-color4 avatar xs me-2"></button>-->
  <!--                    <label>Chart Color 4</label>-->
  <!--                  </li>-->
  <!--                  <li>-->
  <!--                    <button id="chartColorPicker5" class="btn chart-color5 avatar xs me-2"></button>-->
  <!--                    <label>Chart Color 5</label>-->
  <!--                  </li>-->
  <!--                </ul>-->
  <!--              </div>-->
  <!--            </div>-->
  <!--          </div>-->
  <!--        </div>-->
          <!-- start: Light/dark -->
  <!--        <div class="card fieldset border setting-mode mb-4">-->
  <!--          <span class="fieldset-tile bg-card">Light/Dark & Contrast Layout</span>-->
  <!--          <div class="c_radio d-flex text-center">-->
  <!--            <label class="m-1 theme-switch" for="theme-switch">-->
  <!--              <input type="checkbox" id="theme-switch" />-->
  <!--              <span class="card p-2">-->
  <!--                <img class="img-fluid" src="{{ asset('public/frontend') }}/assets/img/dark-version.svg" alt="Dark Mode" />-->
  <!--              </span>-->
  <!--            </label>-->
  <!--            <label class="m-1 theme-dark" for="theme-dark">-->
  <!--              <input type="checkbox" id="theme-dark" />-->
  <!--              <span class="card p-2">-->
  <!--                <img class="img-fluid" src="{{ asset('public/frontend') }}/assets/img/dark-theme.svg" alt="Theme Dark Mode" />-->
  <!--              </span>-->
  <!--            </label>-->
  <!--            <label class="m-1 theme-high-contrast" for="theme-high-contrast">-->
  <!--              <input type="checkbox" id="theme-high-contrast" />-->
  <!--              <span class="card p-2">-->
  <!--                <img class="img-fluid" src="{{ asset('public/frontend') }}/assets/img/high-version.svg" alt="High Contrast" />-->
  <!--              </span>-->
  <!--            </label>-->
  <!--            <label class="m-1 theme-rtl" for="theme-rtl">-->
  <!--              <input type="checkbox" id="theme-rtl" />-->
  <!--              <span class="card p-2">-->
  <!--                <img class="img-fluid" src="{{ asset('public/frontend') }}/assets/img/rtl-version.svg" alt="RTL Mode!" />-->
  <!--              </span>-->
  <!--            </label>-->
  <!--          </div>-->
  <!--        </div>-->
          <!-- start: Font setting -->
  <!--        <div class="card fieldset border setting-font">-->
  <!--          <span class="fieldset-tile bg-card">Google Font Settings</span>-->
  <!--          <div class="c_radio d-flex text-center font_setting">-->
  <!--            <label class="m-1" for="font-opensans">-->
  <!--              <input type="radio" name="font" id="font-opensans" value="font-opensans" />-->
  <!--              <span class="card p-2">-->
  <!--                <img class="img-fluid" src="{{ asset('public/frontend') }}/assets/img/font-opensans.svg" alt="Dark Mode" />-->
  <!--              </span>-->
  <!--            </label>-->
  <!--            <label class="m-1" for="font-quicksand">-->
  <!--              <input type="radio" name="font" id="font-quicksand" value="font-quicksand" />-->
  <!--              <span class="card p-2">-->
  <!--                <img class="img-fluid" src="{{ asset('public/frontend') }}/assets/img/font-quicksand.svg" alt="Dark Mode" />-->
  <!--              </span>-->
  <!--            </label>-->
  <!--            <label class="m-1" for="font-nunito">-->
  <!--              <input type="radio" name="font" id="font-nunito" value="font-nunito" checked="" />-->
  <!--              <span class="card p-2">-->
  <!--                <img class="img-fluid" src="{{ asset('public/frontend') }}/assets/img/font-nunito.svg" alt="Dark Mode" />-->
  <!--              </span>-->
  <!--            </label>-->
  <!--            <label class="m-1" for="font-raleway">-->
  <!--              <input type="radio" name="font" id="font-raleway" value="font-raleway" />-->
  <!--              <span class="card p-2">-->
  <!--                <img class="img-fluid" src="{{ asset('public/frontend') }}/assets/img/font-raleway.svg" alt="Dark Mode" />-->
  <!--              </span>-->
  <!--            </label>-->
  <!--          </div>-->
  <!--        </div>-->
          <!-- start: Dynamic Font Settings -->
  <!--        <div class="m-1 p-3 bg-body rounded-4 mb-4">-->
  <!--          <p>Dynamic Font Settings</p>-->
  <!--          <div class="mb-2">-->
  <!--            <label class="form-label small text-muted mb-0">Enter font URL</label>-->
  <!--            <input id="font_url" type="text" class="form-control" placeholder="http://fonts.cdnfonts.com/css/vonfont">-->
  <!--          </div>-->
  <!--          <div class="mb-3">-->
  <!--            <label class="form-label small text-muted mb-0">Enter font family name</label>-->
  <!--            <input id="font_family" type="text" class="form-control" placeholder="vonfont">-->
  <!--          </div>-->
  <!--          <button id="font_apply" type="submit" class="btn btn-primary">Save Changes</button>-->
  <!--          <button id="font_cancel" type="submit" class="btn btn-secondary">Clear Changes</button>-->
  <!--        </div>-->
          <!-- start: Extra setting -->
  <!--        <div class="setting-more mb-4">-->
  <!--          <h6 class="card-title">More Setting</h6>-->
  <!--          <ul class="list-group list-group-flush list-group-custom fs-6">-->
              <!-- Settings: Horizontal menu version -->
  <!--            <li class="list-group-item">-->
  <!--              <div class="form-check form-switch h-menu-switch mb-1">-->
  <!--                <input class="form-check-input" type="checkbox" id="h_menu">-->
  <!--                <label class="form-check-label" for="h_menu">Horizontal Menu Version</label>-->
  <!--              </div>-->
  <!--            </li>-->
              <!-- Settings: page header top Fix -->
  <!--            <li class="list-group-item">-->
  <!--              <div class="form-check form-switch pageheader-switch mb-1">-->
  <!--                <input class="form-check-input" type="checkbox" id="PageHeader" checked>-->
  <!--                <label class="form-check-label" for="PageHeader">Page Header Fix</label>-->
  <!--              </div>-->
  <!--            </li>-->
              <!-- Settings: page header Dark version  -->
  <!--            <li class="list-group-item">-->
  <!--              <div class="form-check form-switch pageheader-dark-switch mb-1">-->
  <!--                <input class="form-check-input" type="checkbox" id="PageHeader_dark">-->
  <!--                <label class="form-check-label" for="PageHeader_dark">Page Header Dark Mode</label>-->
  <!--              </div>-->
  <!--            </li>-->
              <!-- Settings: Border radius -->
  <!--            <li class="list-group-item">-->
  <!--              <div class="form-check form-switch radius-switch mb-1">-->
  <!--                <input class="form-check-input" type="checkbox" id="BorderRadius">-->
  <!--                <label class="form-check-label" for="BorderRadius">Border Radius none</label>-->
  <!--              </div>-->
  <!--            </li>-->
              <!-- Settings: sidebar version 2 -->
  <!--            <li class="list-group-item">-->
  <!--              <div class="form-check form-switch sidebar-v2 mb-1">-->
  <!--                <input class="form-check-input" type="checkbox" id="sidebar_v2">-->
  <!--                <label class="form-check-label" for="sidebar_v2">Sidebar Version 2</label>-->
  <!--              </div>-->
  <!--            </li>-->
              <!-- Settings: sidebar dark -->
  <!--            <li class="list-group-item">-->
  <!--              <div class="form-check form-switch sidebardark-switch mb-1">-->
  <!--                <input class="form-check-input" type="checkbox" id="SidebarDark">-->
  <!--                <label class="form-check-label" for="SidebarDark">Enable Dark! ( Sidebar )</label>-->
  <!--              </div>-->
  <!--            </li>-->
              <!-- Settings: Sidebar bg image -->
  <!--            <li class="list-group-item setting-img">-->
  <!--              <div class="form-check form-switch imagebg-switch mb-1">-->
  <!--                <input class="form-check-input" type="checkbox" id="CheckImage">-->
  <!--                <label class="form-check-label" for="CheckImage">Background Image (Sidebar)</label>-->
  <!--              </div>-->
  <!--              <div class="bg-images">-->
  <!--                <ul class="list-unstyled d-flex">-->
  <!--                  <li class="sidebar-img-1 me-1 sidebar-img-active"><a class="rounded sidebar-img" id="img-1"-->
  <!--                      href="#"><img src="{{ asset('public/frontend') }}/assets/img/sidebar-bg/sidebar-1.jpg" alt="" /></a></li>-->
  <!--                  <li class="sidebar-img-2 me-1"><a class="rounded sidebar-img" id="img-2" href="#"><img-->
  <!--                        src="{{ asset('public/frontend') }}/assets/img/sidebar-bg/sidebar-2.jpg" alt="" /></a></li>-->
  <!--                  <li class="sidebar-img-3 me-1"><a class="rounded sidebar-img" id="img-3" href="#"><img-->
  <!--                        src="{{ asset('public/frontend') }}/assets/img/sidebar-bg/sidebar-3.jpg" alt="" /></a></li>-->
  <!--                  <li class="sidebar-img-4 me-1"><a class="rounded sidebar-img" id="img-4" href="#"><img-->
  <!--                        src="{{ asset('public/frontend') }}/assets/img/sidebar-bg/sidebar-4.jpg" alt="" /></a></li>-->
  <!--                  <li class="sidebar-img-5 me-1"><a class="rounded sidebar-img" id="img-5" href="#"><img-->
  <!--                        src="{{ asset('public/frontend') }}/assets/img/sidebar-bg/sidebar-5.jpg" alt="" /></a></li>-->
  <!--                </ul>-->
  <!--              </div>-->
  <!--            </li>-->
              <!-- Settings: Container Fluid -->
  <!--            <li class="list-group-item">-->
  <!--              <div class="form-check form-switch fluid-switch mb-1">-->
  <!--                <input class="form-check-input" type="checkbox" id="fluidLayout" checked="">-->
  <!--                <label class="form-check-label" for="fluidLayout">Container Fluid</label>-->
  <!--              </div>-->
  <!--            </li>-->
              <!-- Settings: Card box shadow  -->
  <!--            <li class="list-group-item">-->
  <!--              <div class="form-check form-switch shadow-switch mb-1">-->
  <!--                <input class="form-check-input" type="checkbox" id="card_shadow">-->
  <!--                <label class="form-check-label" for="card_shadow">Card Box-Shadow</label>-->
  <!--              </div>-->
  <!--            </li>-->
  <!--          </ul>-->
  <!--        </div>-->
          <!-- start: Extra link, please do not add in your project -->
  <!--        <div class="mb-4">-->
  <!--          <a class="btn lift  btn-outline-secondary" href="./marketing/index.html">Marketing page</a>-->
  <!--          <a class="btn lift  btn-outline-secondary" href="./onepgae-uikit/onepage.html">Landing page</a>-->
  <!--          <a class="btn lift  btn-outline-secondary" href="./onepgae-uikit/index.html">One page Ui Kit Elements</a>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--      <div class="px-xl-4 modal-footer d-flex justify-content-start text-center">-->
  <!--        <button type="button" class="btn flex-fill btn-primary lift">Save Changes</button>-->
  <!--        <button type="button" class="btn flex-fill btn-white border lift" data-bs-dismiss="modal">Close</button>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <!--<a class="page-setting" href="#" title="Settings" data-bs-toggle="modal" data-bs-target="#SettingsModal"><i-->
  <!--    class="fa fa-gear text-light"></i></a>-->
  <!-- Jquery Page Js -->
  <!-- Jquery Page Js -->
  <script src="{{ asset('public/frontend') }}/assets/js/theme.js"></script>
  <!-- Plugin Js -->
  <!-- Vendor Script -->
</body>

@endsection
