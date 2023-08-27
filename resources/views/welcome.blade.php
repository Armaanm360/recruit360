<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="Recruitment Management Software"
    />
    <meta
      name="keyword"
      content="Recruitment Management Software"
    />
    
    <link rel="icon" href="{{ asset('public/frontend') }}/assets/img/favicon.ico" type="image/x-icon" />
    <!-- Favicon-->
    <title>:: Recruitment Management :: Software</title>
    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/cssbundle/swiper.min.css" />
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/luno-style.css" />
    <!-- Jquery Core Js -->
    <script src="{{ asset('public/frontend') }}/assets/js/plugins.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
  </head>

  <body class="landing-page" data-luno="theme-blue">
    <!-- Section: header -->
    <div class="section header-7">
      <!-- header: menu bar -->
      <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">
          <a class="navbar-brand p-0 m-0" href="{{('')}}">
            <span class="fs-3 fw-bold text-secondary">Recruitment Management</span>
            <small class="text-muted d-flex">Recruitment Management Software</small>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#main_navbar"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse fs-6" id="main_navbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item me-2">
                <a class="nav-link active" aria-current="page" href="#feature"
                  >Feature</a
                >
              </li>
              {{-- <li class="nav-item me-3 dropdown">
                <a
                  class="nav-link text-secondary dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  >Pages</a
                >
                <ul class="dropdown-menu border-0 shadow">
                  <li>
                    <a class="dropdown-item" href="../index.html">Dashboard</a>
                  </li>
                  <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                  <li>
                    <a class="dropdown-item" href="blog-detail.html"
                      >Blog Detail</a
                    >
                  </li>
                  <li>
                    <a
                      class="dropdown-item"
                      href="https://themeforest.net/user/wrraptheme/portfolio"
                      >Portfolio</a
                    >
                  </li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href="../auth-signin.html"
                      >Sign In</a
                    >
                  </li>
                  <li>
                    <a
                      class="dropdown-item"
                      href="../onepgae-uikit/onepage.html"
                      >Landing Page</a
                    >
                  </li>
                </ul>
              </li> --}}
              <li class="nav-item me-3">
                <a class="nav-link text-secondary" href="#"
                  >Docs</a
                >
              </li>
            </ul>
            <form class="d-flex ms-4">
              @if (Route::has('login'))
              <div class="top-right links">
                @auth
                <a class="btn px-4 rounded btn-primary" href="{{ url('/home') }}">Dashboard</a>
                @else
                <a class="btn px-4 rounded btn-primary" href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif @endauth
              </div>
              @endif
            </form>
          </div>
        </div>
      </nav>
      <!-- header: hero text -->
      <div class="banner-text">
        <div class="container">
          <div
            class="row g-3 justify-content-between text-center text-md-start align-items-lg-center"
          >
            <div class="col-xl-5 col-lg-7 col-md-12">
              <h2 class="bg-text color-900">
                Recruitment Management
                <span class="text-gradient fw-bold">Software</span>
              </h2>
              <p class="color-500 lead mb-4">
                Build a beautiful, modern With the right combination of essential features, you can kick-start your e-recruitment process.
              </p>
              <a  href="{{url("login")}}"
                type="submit"
                class="btn btn-lg px-5 bg-secondary text-white text-uppercase fs-6"
              >
               Login
              </a>
              <ul class="social mb-0 list-inline mt-5">
                <li class="list-inline-item">
                  <a href="#" class="pe-3 color-900 fs-6">Terms of use</a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="pe-3 color-900 fs-6">Privacy Policy</a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="pe-3 color-900 fs-6">FAQs</a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="pe-3 color-900 fs-6">Contact</a>
                </li>
              </ul>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-12">
              <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_1mxgw5zv.json"  background="transparent"  speed="1"  style="width: 100 %;"  loop autoplay></lottie-player>
            </div>
          </div>
          <!-- .row end -->
        </div>
      </div>
      <!-- header: hero image -->
      {{-- <svg
        class="hero-img"
        width="1197"
        height="960"
        viewBox="0 0 1197 960"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
      >
        <path
          class="fill-primary"
          d="M596.944 850.256L287.934 358.513C173.768 180.818 143.277 90.5456 246.707 -0.201699L1202.18 -99.942L1281.28 657.813C1207.07 704.096 1021.83 819.841 874.632 912.564C727.435 1005.29 628.175 909.66 596.944 850.256Z"
          fill="#2794EB"
        />
        <path
          d="M545 821L306.5 336C217.999 160.5 198.5 74 303 0H1197V709C1123.83 744.667 941.2 833.9 796 905.5C650.8 977.1 568.166 879 545 821Z"
          fill="url(#banner_img)"
        />
        <path class="fill-primary" d="M558 768L601.301 843H514.699L558 768Z" />
        <path
          class="fill-primary"
          d="M491 836L517.847 882.5H464.153L491 836Z"
        />
        <path
          class="fill-primary"
          d="M553 898L579.847 944.5H526.153L553 898Z"
        />
        <defs>
          <pattern
            id="banner_img"
            patternContentUnits="objectBoundingBox"
            width="1"
            height="1"
          >
            <use
              xlink:href="#image0_56_46"
              transform="translate(-0.577046 -0.274051) scale(0.000861569)"
            />
          </pattern>
          <image
            id="image0_56_46"
            width="2250"
            height="1500"
            xlink:href="{{ asset('public/frontend') }}/assets/img/web-agency/New Project (15).png"
          />
        </defs>
      </svg> --}}
      
    </div>
    <!-- Section: fun fact -->
    <div class="section facts">
      <div class="container">
        <div class="card border-1 py-4">
          <div class="card-body">
            <div
              class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 g-1 text-center"
            >
              <div class="col">
                <div class="card border-0 bg-transparent">
                  <div class="card-body">
                    <h2 class="display-4 fw-bold chart-text-color1">10+</h2>
                    <h6 class="mb-0 text-uppercase">Years of Experience</h6>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card border-0 bg-transparent">
                  <div class="card-body">
                    <h2 class="display-4 fw-bold chart-text-color2">100+</h2>
                    <h6 class="mb-0 text-uppercase">Satisfied Clients</h6>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card border-0 bg-transparent">
                  <div class="card-body">
                    <h2 class="display-4 fw-bold chart-text-color3">500+</h2>
                    <h6 class="mb-0 text-uppercase">Project Finished</h6>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card border-0 bg-transparent">
                  <div class="card-body">
                    <h2 class="display-4 fw-bold chart-text-color4">50+</h2>
                    <h6 class="mb-0 text-uppercase">Team Members</h6>
                  </div>
                </div>
              </div>
            </div>
            <!-- .row end -->
          </div>
        </div>
      </div>
    </div>

      <!-- Section: feature -->
  <div id="feature" class="section feature">
    <div class="container">
      <div class="row g-3 align-items-center">
        <div class="col-lg-5 col-xl-4 order-2 order-lg-1">
          <h2 class="fw-bold mb-4 h1">Besic <span class="text-gradient">Feature</span></h2>
          <ul class="list-unstyled lh-lg mb-0 lead">
            <li class="py-2">
              <svg width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted" fill-rule="evenodd" clip-rule="evenodd" d="M15 2C15 1.73478 14.8946 1.48043 14.7071 1.29289C14.5196 1.10536 14.2652 1 14 1H2C1.73478 1 1.48043 1.10536 1.29289 1.29289C1.10536 1.48043 1 1.73478 1 2V14C1 14.2652 1.10536 14.5196 1.29289 14.7071C1.48043 14.8946 1.73478 15 2 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V2ZM0 2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0L14 0C14.5304 0 15.0391 0.210714 15.4142 0.585786C15.7893 0.960859 16 1.46957 16 2V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V2Z" />
                <path class="fill-secondary" d="M5.50039 10.9498C5.63307 10.9497 5.76028 10.8969 5.85403 10.803L9.95003 6.707V9.475C9.95003 9.60761 10.0027 9.73479 10.0965 9.82855C10.1902 9.92232 10.3174 9.975 10.45 9.975C10.5826 9.975 10.7098 9.92232 10.8036 9.82855C10.8974 9.73479 10.95 9.60761 10.95 9.475V5.5C10.95 5.36739 10.8974 5.24021 10.8036 5.14645C10.7098 5.05268 10.5826 5 10.45 5H6.47503C6.34243 5 6.21525 5.05268 6.12148 5.14645C6.02771 5.24021 5.97503 5.36739 5.97503 5.5C5.97503 5.63261 6.02771 5.75979 6.12148 5.85355C6.21525 5.94732 6.34243 6 6.47503 6H9.24303L5.14603 10.096C5.05228 10.1899 4.99966 10.3172 4.99976 10.4499C4.99985 10.5825 5.05265 10.7097 5.14653 10.8035C5.24042 10.8973 5.36771 10.9499 5.50039 10.9498Z" />
              </svg>
              <span class="ms-2">Invoice</span>
            </li>
            <li class="py-2">
              <svg width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted" fill-rule="evenodd" clip-rule="evenodd" d="M15 2C15 1.73478 14.8946 1.48043 14.7071 1.29289C14.5196 1.10536 14.2652 1 14 1H2C1.73478 1 1.48043 1.10536 1.29289 1.29289C1.10536 1.48043 1 1.73478 1 2V14C1 14.2652 1.10536 14.5196 1.29289 14.7071C1.48043 14.8946 1.73478 15 2 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V2ZM0 2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0L14 0C14.5304 0 15.0391 0.210714 15.4142 0.585786C15.7893 0.960859 16 1.46957 16 2V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V2Z" />
                <path class="fill-secondary" d="M5.50039 10.9498C5.63307 10.9497 5.76028 10.8969 5.85403 10.803L9.95003 6.707V9.475C9.95003 9.60761 10.0027 9.73479 10.0965 9.82855C10.1902 9.92232 10.3174 9.975 10.45 9.975C10.5826 9.975 10.7098 9.92232 10.8036 9.82855C10.8974 9.73479 10.95 9.60761 10.95 9.475V5.5C10.95 5.36739 10.8974 5.24021 10.8036 5.14645C10.7098 5.05268 10.5826 5 10.45 5H6.47503C6.34243 5 6.21525 5.05268 6.12148 5.14645C6.02771 5.24021 5.97503 5.36739 5.97503 5.5C5.97503 5.63261 6.02771 5.75979 6.12148 5.85355C6.21525 5.94732 6.34243 6 6.47503 6H9.24303L5.14603 10.096C5.05228 10.1899 4.99966 10.3172 4.99976 10.4499C4.99985 10.5825 5.05265 10.7097 5.14653 10.8035C5.24042 10.8973 5.36771 10.9499 5.50039 10.9498Z" />
              </svg>
              <span class="ms-2">Money Receipt</span>
            </li>
            <li class="py-2">
              <svg width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted" fill-rule="evenodd" clip-rule="evenodd" d="M15 2C15 1.73478 14.8946 1.48043 14.7071 1.29289C14.5196 1.10536 14.2652 1 14 1H2C1.73478 1 1.48043 1.10536 1.29289 1.29289C1.10536 1.48043 1 1.73478 1 2V14C1 14.2652 1.10536 14.5196 1.29289 14.7071C1.48043 14.8946 1.73478 15 2 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V2ZM0 2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0L14 0C14.5304 0 15.0391 0.210714 15.4142 0.585786C15.7893 0.960859 16 1.46957 16 2V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V2Z" />
                <path class="fill-secondary" d="M5.50039 10.9498C5.63307 10.9497 5.76028 10.8969 5.85403 10.803L9.95003 6.707V9.475C9.95003 9.60761 10.0027 9.73479 10.0965 9.82855C10.1902 9.92232 10.3174 9.975 10.45 9.975C10.5826 9.975 10.7098 9.92232 10.8036 9.82855C10.8974 9.73479 10.95 9.60761 10.95 9.475V5.5C10.95 5.36739 10.8974 5.24021 10.8036 5.14645C10.7098 5.05268 10.5826 5 10.45 5H6.47503C6.34243 5 6.21525 5.05268 6.12148 5.14645C6.02771 5.24021 5.97503 5.36739 5.97503 5.5C5.97503 5.63261 6.02771 5.75979 6.12148 5.85355C6.21525 5.94732 6.34243 6 6.47503 6H9.24303L5.14603 10.096C5.05228 10.1899 4.99966 10.3172 4.99976 10.4499C4.99985 10.5825 5.05265 10.7097 5.14653 10.8035C5.24042 10.8973 5.36771 10.9499 5.50039 10.9498Z" />
              </svg>
              <span class="ms-2">Client</span>
            </li>
            <li class="py-2">
              <svg width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted" fill-rule="evenodd" clip-rule="evenodd" d="M15 2C15 1.73478 14.8946 1.48043 14.7071 1.29289C14.5196 1.10536 14.2652 1 14 1H2C1.73478 1 1.48043 1.10536 1.29289 1.29289C1.10536 1.48043 1 1.73478 1 2V14C1 14.2652 1.10536 14.5196 1.29289 14.7071C1.48043 14.8946 1.73478 15 2 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V2ZM0 2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0L14 0C14.5304 0 15.0391 0.210714 15.4142 0.585786C15.7893 0.960859 16 1.46957 16 2V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V2Z" />
                <path class="fill-secondary" d="M5.50039 10.9498C5.63307 10.9497 5.76028 10.8969 5.85403 10.803L9.95003 6.707V9.475C9.95003 9.60761 10.0027 9.73479 10.0965 9.82855C10.1902 9.92232 10.3174 9.975 10.45 9.975C10.5826 9.975 10.7098 9.92232 10.8036 9.82855C10.8974 9.73479 10.95 9.60761 10.95 9.475V5.5C10.95 5.36739 10.8974 5.24021 10.8036 5.14645C10.7098 5.05268 10.5826 5 10.45 5H6.47503C6.34243 5 6.21525 5.05268 6.12148 5.14645C6.02771 5.24021 5.97503 5.36739 5.97503 5.5C5.97503 5.63261 6.02771 5.75979 6.12148 5.85355C6.21525 5.94732 6.34243 6 6.47503 6H9.24303L5.14603 10.096C5.05228 10.1899 4.99966 10.3172 4.99976 10.4499C4.99985 10.5825 5.05265 10.7097 5.14653 10.8035C5.24042 10.8973 5.36771 10.9499 5.50039 10.9498Z" />
              </svg>
              <span class="ms-2">Deligate</span>
            </li>
            <li class="py-2">
              <svg width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted" fill-rule="evenodd" clip-rule="evenodd" d="M15 2C15 1.73478 14.8946 1.48043 14.7071 1.29289C14.5196 1.10536 14.2652 1 14 1H2C1.73478 1 1.48043 1.10536 1.29289 1.29289C1.10536 1.48043 1 1.73478 1 2V14C1 14.2652 1.10536 14.5196 1.29289 14.7071C1.48043 14.8946 1.73478 15 2 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V2ZM0 2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0L14 0C14.5304 0 15.0391 0.210714 15.4142 0.585786C15.7893 0.960859 16 1.46957 16 2V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V2Z" />
                <path class="fill-secondary" d="M5.50039 10.9498C5.63307 10.9497 5.76028 10.8969 5.85403 10.803L9.95003 6.707V9.475C9.95003 9.60761 10.0027 9.73479 10.0965 9.82855C10.1902 9.92232 10.3174 9.975 10.45 9.975C10.5826 9.975 10.7098 9.92232 10.8036 9.82855C10.8974 9.73479 10.95 9.60761 10.95 9.475V5.5C10.95 5.36739 10.8974 5.24021 10.8036 5.14645C10.7098 5.05268 10.5826 5 10.45 5H6.47503C6.34243 5 6.21525 5.05268 6.12148 5.14645C6.02771 5.24021 5.97503 5.36739 5.97503 5.5C5.97503 5.63261 6.02771 5.75979 6.12148 5.85355C6.21525 5.94732 6.34243 6 6.47503 6H9.24303L5.14603 10.096C5.05228 10.1899 4.99966 10.3172 4.99976 10.4499C4.99985 10.5825 5.05265 10.7097 5.14653 10.8035C5.24042 10.8973 5.36771 10.9499 5.50039 10.9498Z" />
              </svg>
              <span class="ms-2">Sponsor</span>
            </li>
            <li class="py-2">
              <svg width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted" fill-rule="evenodd" clip-rule="evenodd" d="M15 2C15 1.73478 14.8946 1.48043 14.7071 1.29289C14.5196 1.10536 14.2652 1 14 1H2C1.73478 1 1.48043 1.10536 1.29289 1.29289C1.10536 1.48043 1 1.73478 1 2V14C1 14.2652 1.10536 14.5196 1.29289 14.7071C1.48043 14.8946 1.73478 15 2 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V2ZM0 2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0L14 0C14.5304 0 15.0391 0.210714 15.4142 0.585786C15.7893 0.960859 16 1.46957 16 2V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V2Z" />
                <path class="fill-secondary" d="M5.50039 10.9498C5.63307 10.9497 5.76028 10.8969 5.85403 10.803L9.95003 6.707V9.475C9.95003 9.60761 10.0027 9.73479 10.0965 9.82855C10.1902 9.92232 10.3174 9.975 10.45 9.975C10.5826 9.975 10.7098 9.92232 10.8036 9.82855C10.8974 9.73479 10.95 9.60761 10.95 9.475V5.5C10.95 5.36739 10.8974 5.24021 10.8036 5.14645C10.7098 5.05268 10.5826 5 10.45 5H6.47503C6.34243 5 6.21525 5.05268 6.12148 5.14645C6.02771 5.24021 5.97503 5.36739 5.97503 5.5C5.97503 5.63261 6.02771 5.75979 6.12148 5.85355C6.21525 5.94732 6.34243 6 6.47503 6H9.24303L5.14603 10.096C5.05228 10.1899 4.99966 10.3172 4.99976 10.4499C4.99985 10.5825 5.05265 10.7097 5.14653 10.8035C5.24042 10.8973 5.36771 10.9499 5.50039 10.9498Z" />
              </svg>
              <span class="ms-2">Account</span>
            </li>
            <li class="py-2">
              <svg width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted" fill-rule="evenodd" clip-rule="evenodd" d="M15 2C15 1.73478 14.8946 1.48043 14.7071 1.29289C14.5196 1.10536 14.2652 1 14 1H2C1.73478 1 1.48043 1.10536 1.29289 1.29289C1.10536 1.48043 1 1.73478 1 2V14C1 14.2652 1.10536 14.5196 1.29289 14.7071C1.48043 14.8946 1.73478 15 2 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V2ZM0 2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0L14 0C14.5304 0 15.0391 0.210714 15.4142 0.585786C15.7893 0.960859 16 1.46957 16 2V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V2Z" />
                <path class="fill-secondary" d="M5.50039 10.9498C5.63307 10.9497 5.76028 10.8969 5.85403 10.803L9.95003 6.707V9.475C9.95003 9.60761 10.0027 9.73479 10.0965 9.82855C10.1902 9.92232 10.3174 9.975 10.45 9.975C10.5826 9.975 10.7098 9.92232 10.8036 9.82855C10.8974 9.73479 10.95 9.60761 10.95 9.475V5.5C10.95 5.36739 10.8974 5.24021 10.8036 5.14645C10.7098 5.05268 10.5826 5 10.45 5H6.47503C6.34243 5 6.21525 5.05268 6.12148 5.14645C6.02771 5.24021 5.97503 5.36739 5.97503 5.5C5.97503 5.63261 6.02771 5.75979 6.12148 5.85355C6.21525 5.94732 6.34243 6 6.47503 6H9.24303L5.14603 10.096C5.05228 10.1899 4.99966 10.3172 4.99976 10.4499C4.99985 10.5825 5.05265 10.7097 5.14653 10.8035C5.24042 10.8973 5.36771 10.9499 5.50039 10.9498Z" />
              </svg>
              <span class="ms-2">Refund</span>
            </li>
            <li class="py-2">
              <svg width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted" fill-rule="evenodd" clip-rule="evenodd" d="M15 2C15 1.73478 14.8946 1.48043 14.7071 1.29289C14.5196 1.10536 14.2652 1 14 1H2C1.73478 1 1.48043 1.10536 1.29289 1.29289C1.10536 1.48043 1 1.73478 1 2V14C1 14.2652 1.10536 14.5196 1.29289 14.7071C1.48043 14.8946 1.73478 15 2 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V2ZM0 2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0L14 0C14.5304 0 15.0391 0.210714 15.4142 0.585786C15.7893 0.960859 16 1.46957 16 2V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V2Z" />
                <path class="fill-secondary" d="M5.50039 10.9498C5.63307 10.9497 5.76028 10.8969 5.85403 10.803L9.95003 6.707V9.475C9.95003 9.60761 10.0027 9.73479 10.0965 9.82855C10.1902 9.92232 10.3174 9.975 10.45 9.975C10.5826 9.975 10.7098 9.92232 10.8036 9.82855C10.8974 9.73479 10.95 9.60761 10.95 9.475V5.5C10.95 5.36739 10.8974 5.24021 10.8036 5.14645C10.7098 5.05268 10.5826 5 10.45 5H6.47503C6.34243 5 6.21525 5.05268 6.12148 5.14645C6.02771 5.24021 5.97503 5.36739 5.97503 5.5C5.97503 5.63261 6.02771 5.75979 6.12148 5.85355C6.21525 5.94732 6.34243 6 6.47503 6H9.24303L5.14603 10.096C5.05228 10.1899 4.99966 10.3172 4.99976 10.4499C4.99985 10.5825 5.05265 10.7097 5.14653 10.8035C5.24042 10.8973 5.36771 10.9499 5.50039 10.9498Z" />
              </svg>
              <span class="ms-2">Expense</span>
            </li>
            <li class="py-2">
              <svg width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill-muted" fill-rule="evenodd" clip-rule="evenodd" d="M15 2C15 1.73478 14.8946 1.48043 14.7071 1.29289C14.5196 1.10536 14.2652 1 14 1H2C1.73478 1 1.48043 1.10536 1.29289 1.29289C1.10536 1.48043 1 1.73478 1 2V14C1 14.2652 1.10536 14.5196 1.29289 14.7071C1.48043 14.8946 1.73478 15 2 15H14C14.2652 15 14.5196 14.8946 14.7071 14.7071C14.8946 14.5196 15 14.2652 15 14V2ZM0 2C0 1.46957 0.210714 0.960859 0.585786 0.585786C0.960859 0.210714 1.46957 0 2 0L14 0C14.5304 0 15.0391 0.210714 15.4142 0.585786C15.7893 0.960859 16 1.46957 16 2V14C16 14.5304 15.7893 15.0391 15.4142 15.4142C15.0391 15.7893 14.5304 16 14 16H2C1.46957 16 0.960859 15.7893 0.585786 15.4142C0.210714 15.0391 0 14.5304 0 14V2Z" />
                <path class="fill-secondary" d="M5.50039 10.9498C5.63307 10.9497 5.76028 10.8969 5.85403 10.803L9.95003 6.707V9.475C9.95003 9.60761 10.0027 9.73479 10.0965 9.82855C10.1902 9.92232 10.3174 9.975 10.45 9.975C10.5826 9.975 10.7098 9.92232 10.8036 9.82855C10.8974 9.73479 10.95 9.60761 10.95 9.475V5.5C10.95 5.36739 10.8974 5.24021 10.8036 5.14645C10.7098 5.05268 10.5826 5 10.45 5H6.47503C6.34243 5 6.21525 5.05268 6.12148 5.14645C6.02771 5.24021 5.97503 5.36739 5.97503 5.5C5.97503 5.63261 6.02771 5.75979 6.12148 5.85355C6.21525 5.94732 6.34243 6 6.47503 6H9.24303L5.14603 10.096C5.05228 10.1899 4.99966 10.3172 4.99976 10.4499C4.99985 10.5825 5.05265 10.7097 5.14653 10.8035C5.24042 10.8973 5.36771 10.9499 5.50039 10.9498Z" />
              </svg>
              <span class="ms-2">Report</span>
            </li>
          </ul>
        </div>
        <div class="col-lg-7 col-xl-8 order-1 order-lg-2">
          <img class="img-fluid rounded" src="{{ asset('public/frontend') }}/assets/img/hrms/project-tracker.png" alt="#">
        </div>
      </div> <!-- .row end -->
    </div>
  </div>
  
    <!-- Section: services -->
    <div class="section services">
      <div class="container">
        <div class="row g-3 justify-content-between">
          <div class="col-lg-6 col-md-12">
            <div class="service-img sticky-top">
              {{-- <svg
                class="img-fluid"
                viewBox="0 0 600 449"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
              >
                <path
                  class="fill-primary"
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M457.559 52.7163C450.334 49.4569 442.708 48.3882 437.171 48.4057C435.791 48.4101 434.597 47.3772 434.5 45.9999V45.9999C434.403 44.6226 435.441 43.4224 436.822 43.4082C443.014 43.3447 451.513 44.5037 459.615 48.1586C468.935 52.3629 477.824 59.9261 481.883 72.7452C489.473 96.7143 542.361 253.344 567.868 328.698L567.883 328.742L567.896 328.787C570.988 339.179 572.298 354.704 565.541 367.015C562.123 373.243 556.679 378.564 548.562 381.898C540.489 385.215 529.902 386.516 516.221 384.984C463.462 379.078 365.926 360.148 321.4 350.947C320.048 350.667 319.219 349.352 319.5 348V348C319.78 346.648 321.065 345.772 322.417 346.051C366.956 355.255 464.278 374.139 516.778 380.015C529.897 381.484 539.586 380.181 546.662 377.273C553.695 374.384 558.276 369.861 561.158 364.61C566.993 353.978 566.014 340.029 563.116 330.257C537.618 254.927 484.724 98.2807 477.116 74.2546C473.576 63.0737 465.881 56.4703 457.559 52.7163Z"
                  fill="black"
                />
                <path
                  d="M358 11.5L201.5 60.5C181.334 66.5 135.2 80.1 112 86.5C88.8 92.9 76.3333 118.833 73 131C64.6668 164.667 44.3004 248.4 29.5004 314C14.7004 379.6 57.0004 388.667 80.0004 385C202 368.667 464.4 333.9 538 325.5C611.6 317.1 599.667 271 584.5 249C546 194.5 462.6 76.2 437 39C411.4 1.8 373.667 5.16667 358 11.5Z"
                  fill="url(#pattern0)"
                />
                <path
                  class="fill-primary"
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M123.217 82.4818C136.917 51.7616 164.945 44 177.5 44H240.5C241.881 44 243 45.1193 243 46.5V46.5C243 47.8807 241.881 49 240.5 49H177.5C166.39 49 140.484 56.0384 127.784 84.5182C114.508 114.288 58.1532 208.436 31.6798 251.728C29.5847 255.793 27.2381 262.706 27.0622 270.109C26.9035 276.79 28.5055 283.702 33.4799 289.382C34.3896 290.421 34.4476 291.995 33.5004 293V293C32.5533 294.005 30.961 294.057 30.0349 293.033C23.7787 286.115 21.8806 277.694 22.0636 269.991C22.2616 261.657 24.8867 253.96 27.2817 249.348C27.3086 249.296 27.3372 249.245 27.3676 249.196C53.9139 205.787 110.101 111.895 123.217 82.4818Z"
                  fill="black"
                />
                <path
                  class="fill-secondary"
                  d="M56.5 23L69.0574 44.75H43.9426L56.5 23Z"
                  fill="#C4C4C4"
                />
                <path
                  class="fill-secondary"
                  d="M319 401.5L270.25 429.646L270.25 373.354L319 401.5Z"
                  fill="#C4C4C4"
                />
                <path
                  class="fill-secondary"
                  d="M37 43L44.7942 56.5H29.2058L37 43Z"
                  fill="#C4C4C4"
                />
                <path
                  class="fill-secondary"
                  d="M275 358.5L244.25 376.254L244.25 340.746L275 358.5Z"
                  fill="#C4C4C4"
                />
                <path
                  class="fill-secondary"
                  d="M55 61L62.7942 74.5H47.2058L55 61Z"
                  fill="#C4C4C4"
                />
                <path
                  class="fill-secondary"
                  d="M234 399.5L203.25 417.254L203.25 381.746L234 399.5Z"
                  fill="#C4C4C4"
                />
                <defs>
                  <pattern
                    id="pattern0"
                    patternContentUnits="objectBoundingBox"
                    width="1"
                    height="1"
                  >
                    <use
                      xlink:href="#image0_54_6"
                      transform="translate(0 -0.00197126) scale(0.000444444 0.000669295)"
                    />
                  </pattern>
                  <image
                    id="image0_54_6"
                    width="2250"
                    height="1500"
                    xlink:href="{{ asset('public/frontend') }}/assets/img/web-agency/pexels-1.jpg"
                  />
                </defs>
              </svg> --}}
              <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_8ztbxqr1.json"  background="transparent"  speed="1"   loop  autoplay></lottie-player>
            </div>
          </div>
          <div class="col-lg-5 col-md-12">
            <div class="mb-4">
              <span class="bg-dark px-2 py-1 color-fff">Service</span>
              <h2 class="h1 fw-bold mt-3 color-900">
                Services That We Serve With Extra Care.
              </h2>
            </div>
            <div class="row g-3">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div>
                  <strong class="me-2 fs-2 text-gradient">01.</strong>
                  <h6 class="text-uppercase">Web Designing</h6>
                </div>
                <ul class="list-unstyled list mb-0">
                  <li>
                    <a href="#"><i class="fa fa-plus me-2"></i>UI/UX Design</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-plus me-2"></i>App Design</a>
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fa fa-plus me-2"></i>User Interface Design</a
                    >
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-plus me-2"></i>Theme Layout</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div>
                  <strong class="me-2 fs-2 text-gradient">02.</strong>
                  <h6 class="text-uppercase">Web Development</h6>
                </div>
                <ul class="list-unstyled list mb-0">
                  <li>
                    <a href="#"
                      ><i class="fa fa-plus me-2"></i>WordPress Web
                      Development</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fa fa-plus me-2"></i>App Development</a
                    >
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-plus me-2"></i>E-commerce</a>
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fa fa-plus me-2"></i>Email Template
                      Development</a
                    >
                  </li>
                </ul>
              </div>
              <div class="col-lg-12 col-md-12">
                <div>
                  <strong class="me-2 fs-2 text-gradient">03.</strong>
                  <h6 class="text-uppercase">Social Marketing</h6>
                </div>
                <ul class="list-unstyled list mb-0">
                  <li>
                    <a href="#"
                      ><i class="fa fa-plus me-2"></i>Market Research</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fa fa-plus me-2"></i>Online marketing</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fa fa-plus me-2"></i>Social media marketing</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fa fa-plus me-2"></i>Evaluate Social Media</a
                    >
                  </li>
                  <li>
                    <a href="#"
                      ><i class="fa fa-plus me-2"></i>Work Out When To Post</a
                    >
                  </li>
                </ul>
              </div>
              <div class="col-lg-12 col-md-12">
                <div
                  class="d-flex flex-wrap justify-content-between align-items-center"
                >
                  <a
                    href="https://themeforest.net/user/wrraptheme/portfolio"
                    class="btn btn-lg rounded-pill btn-primary px-5 lead text-uppercase"
                    >View More</a
                  >
                  <div class="mt-md-0 mt-3">
                    <h5 class="mb-1">
                      <strong>4.9</strong>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                      <i class="fa fa-star text-warning"></i>
                    </h5>
                    <span class="text-muted small"
                      ><strong>1000+ tasks</strong> completed by our team with
                      <strong>99%</strong></span
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- .row end -->
      </div>
    </div>
    <!-- Section: more services -->
    <div class="section services more">
      <div class="container">
        <div class="row g-3 justify-content-between mb-5">
          <div class="col-xl-5 col-lg-6 col-md-12">
            <div class="mb-4">
              <span class="bg-dark px-2 py-1 color-fff"
                >We Are A Digital Agency</span
              >
              <h2 class="h1 fw-bold mt-3 color-900">
                Experts Services To Change Business
              </h2>
              <p class="lead">
                It has roots in a piece of classical Latin literature from 45
                BC, making it over 2000 years old. Richard McClintock, a Latin
                professor at Hampden-Sydney College in Virginia
              </p>
            </div>
            <ul class="list-unstyled mb-0">
              <li class="py-2">
                <i class="fa fa-check-circle me-3"></i
                ><span class="h6 mb-0">Perfect for modern startups</span>
              </li>
              <li class="py-2">
                <i class="fa fa-check-circle me-3"></i
                ><span class="h6 mb-0">Ready to be customized</span>
              </li>
              <li class="py-2">
                <i class="fa fa-check-circle me-3"></i
                ><span class="h6 mb-0">Designed for every devices</span>
              </li>
            </ul>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="sticky-md-top">
              {{-- <svg
                class="img-fluid"
                viewBox="0 0 600 562"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
              >
                <path
                  class="fill-secondary"
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M312.397 8.05701C290.222 6.58379 270.299 14.4418 258.012 22.612C256.862 23.3765 255.306 23.1215 254.5 22V22C253.695 20.8785 253.945 19.316 255.093 18.5489C268.114 9.8483 289.174 1.50314 312.728 3.06801C337.709 4.72766 365.177 17.5167 388.571 52.0992C434.576 120.107 505.069 227.762 534.579 273.112C543.89 286.705 553.608 309.814 552.561 335.191C551.506 360.744 539.537 388.351 505.878 410.586L505.804 410.635L505.727 410.678C480.025 425.154 464.905 433.707 456.693 438.385C456.628 438.422 456.607 438.503 456.643 438.568V438.568C456.68 438.635 456.656 438.718 456.589 438.755C453.473 440.477 450.639 442.031 449.2 442.797C448.841 442.989 448.542 443.145 448.342 443.244L448.332 443.249C448.275 443.277 448.079 443.375 447.883 443.442C447.841 443.457 447.769 443.48 447.678 443.503C447.613 443.52 447.415 443.569 447.156 443.579C447.018 443.58 446.674 443.551 446.471 443.511C446.166 443.416 445.487 443.026 445.152 442.699C444.048 441.401 444.794 440.007 444.855 439.894C445.02 439.587 445.213 439.388 445.263 439.336L445.264 439.335C445.342 439.254 445.411 439.194 445.448 439.162C445.497 439.12 445.543 439.085 445.577 439.06C445.596 439.045 445.611 439.034 445.623 439.026C445.894 438.83 446.694 438.359 447.897 437.662C453.043 434.68 468.456 425.932 503.196 406.365C535.48 385.01 546.578 358.888 547.565 334.985C548.559 310.902 539.289 288.824 530.438 275.914L530.421 275.889L530.405 275.864C500.906 230.532 430.416 122.881 384.43 54.9008C361.824 21.4834 335.708 9.60569 312.397 8.05701Z"
                  fill="black"
                />
                <path
                  d="M473 141.5L266 28.5001C185.6 -8.29991 139.833 52.5001 127 87.5001C111.833 125 72.3 222.4 35.5 312C-1.30002 401.6 57.8333 446 92 457C111.5 463.5 172 484.7 258 517.5C336.8 563.1 395.5 519.167 415 491.5C440.667 452.5 503.1 356.8 547.5 286C579.1 213.2 511 159.333 473 141.5Z"
                  fill="url(#pattern1)"
                />
                <path
                  class="fill-secondary"
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M91.3489 159.447C84.0931 166.167 69.4482 180.187 42.248 206.787C15.5241 232.922 8.00598 258.943 9.22121 280.748C10.443 302.673 20.5104 320.595 29.3499 330.318L29.3584 330.328L29.3668 330.337C63.3666 368.504 141.568 456.339 182.37 502.341L182.417 502.394L182.461 502.449C200.238 524.915 220.411 533.538 238.336 535.325C254.975 536.984 269.79 532.761 279.059 528.022C280.289 527.394 281.812 527.803 282.5 529V529C283.189 530.197 282.781 531.728 281.554 532.361C271.518 537.543 255.651 542.076 237.84 540.3C218.588 538.381 197.195 529.1 178.583 505.606C137.776 459.598 59.6335 371.83 25.6418 333.672C16.1501 323.227 5.52341 304.254 4.22896 281.027C2.92752 257.674 11.0761 230.278 38.7521 203.213C65.952 176.613 80.6404 162.55 87.9513 155.778C89.7797 154.085 91.1582 152.837 92.1617 151.958C93.1113 151.127 93.8478 150.515 94.3266 150.207C94.4256 150.143 94.7019 149.965 95.0551 149.847C95.1854 149.803 95.7025 149.631 96.358 149.755C96.7411 149.827 97.2245 150.013 97.6478 150.425C98.0738 150.839 98.277 151.324 98.3594 151.722C98.4995 152.399 98.3193 152.935 98.2753 153.067L98.2752 153.067C98.2049 153.276 98.1211 153.439 98.072 153.529C97.9701 153.717 97.8565 153.88 97.7768 153.991C97.4996 154.374 97.053 154.897 96.5546 155.454C96.4448 155.577 96.2563 155.586 96.1341 155.476V155.476C96.0228 155.375 95.854 155.373 95.7406 155.471C95.6502 155.55 95.5552 155.633 95.4556 155.72C94.5023 156.554 93.1621 157.767 91.3489 159.447ZM94.2541 154.094C94.4427 154.26 94.5723 154.065 94.3858 153.897L94.3446 153.86C94.168 153.7 93.9918 153.844 94.1624 154.01V154.01C94.1927 154.039 94.2233 154.067 94.2541 154.094ZM93.7383 151.042C93.7384 151.042 93.7372 151.044 93.7345 151.048C93.7369 151.044 93.7383 151.042 93.7383 151.042Z"
                  fill="black"
                />
                <path
                  class="fill-primary"
                  d="M515 432L534.919 466.5L495.081 466.5L515 432Z"
                  fill="#C4C4C4"
                />
                <path
                  class="fill-primary"
                  d="M484.5 463L497.057 484.75L471.943 484.75L484.5 463Z"
                  fill="#C4C4C4"
                />
                <path
                  class="fill-primary"
                  d="M513.5 492L526.057 513.75H500.943L513.5 492Z"
                  fill="#C4C4C4"
                />
                <path
                  class="fill-primary"
                  d="M28 98L65.5 75.4833L65.5 120.517L28 98Z"
                  fill="#C4C4C4"
                />
                <path
                  class="fill-primary"
                  d="M78 142L102 129.01L102 154.99L78 142Z"
                  fill="#C4C4C4"
                />
                <path
                  class="fill-primary"
                  d="M113 121L136.25 107.144L136.25 134.856L113 121Z"
                  fill="#C4C4C4"
                />
                <defs>
                  <pattern
                    id="pattern1"
                    patternContentUnits="objectBoundingBox"
                    width="1"
                    height="1"
                  >
                    <use
                      xlink:href="#image0_54_26"
                      transform="translate(0 -0.266724) scale(0.001)"
                    />
                  </pattern>
                  <image
                    id="image0_54_26"
                    width="1000"
                    height="1500"
                    xlink:href="{{ asset('public/frontend') }}/assets/img/web-agency/pexels-2.jpg"
                  />
                </defs>
              </svg> --}}
              <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_yMpiqXia1k.json"  background="transparent"  speed="1"  style="width: 100%; height: 500px;"  loop  autoplay></lottie-player>
            </div>
          </div>
        </div>
        <!-- .row end -->
        <div class="row justify-content-center mb-3">
          <div class="col-lg-12">
            <span class="bg-dark px-2 py-1 color-fff">Choose Us</span>
            <h2 class="mb-1 mt-4 color-900">What Makes Recruitment Management Different?</h2>
            {{-- <p class="lead">
              Use Atomic Design to build components, sections and, then, pages.
            </p> --}}
          </div>
        </div>
        <!-- .row end -->
        <div class="row g-1 row-deck text-center">
          <div class="col-lg-3 col-md-6">
            <div class="card p-4 align-items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                fill="currentColor"
                viewBox="0 0 16 16"
              >
                <path
                  class="fill-secondary"
                  d="M0 13C0 13.3978 0.158035 13.7794 0.43934 14.0607C0.720644 14.342 1.10218 14.5 1.5 14.5H14.5C14.8978 14.5 15.2794 14.342 15.5607 14.0607C15.842 13.7794 16 13.3978 16 13V6C16 5.60218 15.842 5.22064 15.5607 4.93934C15.2794 4.65804 14.8978 4.5 14.5 4.5H1.5C1.10218 4.5 0.720644 4.65804 0.43934 4.93934C0.158035 5.22064 0 5.60218 0 6L0 13ZM1.5 13.5C1.36739 13.5 1.24021 13.4473 1.14645 13.3536C1.05268 13.2598 1 13.1326 1 13V6C1 5.86739 1.05268 5.74021 1.14645 5.64645C1.24021 5.55268 1.36739 5.5 1.5 5.5H14.5C14.6326 5.5 14.7598 5.55268 14.8536 5.64645C14.9473 5.74021 15 5.86739 15 6V13C15 13.1326 14.9473 13.2598 14.8536 13.3536C14.7598 13.4473 14.6326 13.5 14.5 13.5H1.5Z"
                  fill="black"
                ></path>
                <path
                  class="fill-secondary"
                  d="M2.14645 3.35355C2.24021 3.44732 2.36739 3.5 2.5 3.5H13.5C13.6326 3.5 13.7598 3.44732 13.8536 3.35355C13.9473 3.25979 14 3.13261 14 3C14 2.86739 13.9473 2.74021 13.8536 2.64645C13.7598 2.55268 13.6326 2.5 13.5 2.5H2.5C2.36739 2.5 2.24021 2.55268 2.14645 2.64645C2.05268 2.74021 2 2.86739 2 3C2 3.13261 2.05268 3.25979 2.14645 3.35355Z"
                ></path>
                <path
                  d="M4.14645 1.35355C4.24021 1.44732 4.36739 1.5 4.5 1.5H11.5C11.6326 1.5 11.7598 1.44732 11.8536 1.35355C11.9473 1.25979 12 1.13261 12 1C12 0.867392 11.9473 0.740215 11.8536 0.646447C11.7598 0.552678 11.6326 0.5 11.5 0.5H4.5C4.36739 0.5 4.24021 0.552678 4.14645 0.646447C4.05268 0.740215 4 0.867392 4 1C4 1.13261 4.05268 1.25979 4.14645 1.35355Z"
                ></path>
              </svg>
              <h6 class="mt-4">Data Security</h6>
              <span class="text-muted"
                >Hosted on Microsoft Azure and security certified by Ernst & Young (EY)</span
              >
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card p-4 align-items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                fill="currentColor"
                viewBox="0 0 16 16"
              >
                <path
                  d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"
                ></path>
                <path
                  class="fill-secondary"
                  d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0zm2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0z"
                ></path>
              </svg>
              <h6 class="mt-4">Dedicated 24/7 Support</h6>
              <span class="text-muted"
                >Dedicated global support team based in Bangladesh.</span
              >
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card p-4 align-items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                fill="currentColor"
                viewBox="0 0 16 16"
              >
                <path
                  d="M13.5 3C13.6326 3 13.7598 3.05268 13.8536 3.14645C13.9473 3.24021 14 3.36739 14 3.5V11H2V3.5C2 3.36739 2.05268 3.24021 2.14645 3.14645C2.24021 3.05268 2.36739 3 2.5 3H13.5ZM2.5 2C2.10218 2 1.72064 2.15804 1.43934 2.43934C1.15804 2.72064 1 3.10218 1 3.5V12H15V3.5C15 3.10218 14.842 2.72064 14.5607 2.43934C14.2794 2.15804 13.8978 2 13.5 2H2.5Z"
                ></path>
                <path
                  class="fill-secondary"
                  d="M16 12.5H0C0 12.8978 0.158035 13.2794 0.43934 13.5607C0.720644 13.842 1.10218 14 1.5 14H14.5C14.8978 14 15.2794 13.842 15.5607 13.5607C15.842 13.2794 16 12.8978 16 12.5Z"
                ></path>
              </svg>
              <h6 class="mt-4">Enterprise Grade Solution</h6>
              <span class="text-muted"
                >Pre-configured enterprise solution that is easy to use on the go</span
              >
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="card p-4 align-items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="32"
                fill="currentColor"
                viewBox="0 0 16 16"
              >
                <path
                  class="fill-secondary"
                  fill-rule="evenodd"
                  d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"
                ></path>
                <path
                  d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"
                ></path>
                <path
                  d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"
                ></path>
              </svg>
              <h6 class="mt-4">Cost-Effective</h6>
              <span class="text-muted"
                >No hardware and 3rd party software costs or maintainance involved.</span
              >
            </div>
          </div>
        </div>
        <!-- .row end -->
      </div>
    </div>
    <!--  Section: Testimonials  -->
    <div class="section sliders-2">
      <div class="container">
        <div class="testimonials-slider swiper swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img
                    src="{{ asset('public/frontend') }}/assets/img/avatar.png"
                    class="testimonial-img"
                    alt=""
                  />
                  <h4 class="mb-0">Manuella Nevoresky</h4>
                  <h6 class="text-muted mb-3">Ceo &amp; Founder</h6>
                  <h6 class="lh-lg">
                    <i class="fa fa-quote-left"></i> Recruitment Management Software was really easy to setup, took just a few minutes to get started. Their Chrome extension is an absolute gift and saves hours every week. They have the best customer support team I have ever worked with. Customer service really makes a difference.
                    <i class="fa fa-quote-right"></i>
                  </h6>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img
                    src="{{ asset('public/frontend') }}/assets/img/avatar.png"
                    class="testimonial-img"
                    alt=""
                  />
                  <h4 class="mb-0">Brian Swader</h4>
                  <h6 class="text-muted mb-3">Ceo &amp; Founder</h6>
                  <h6 class="lh-lg">
                    <i class="fa fa-quote-left"></i> If you need anything, the team is available to help in no time at all. This is the most versatile system out there and I have trialled a lot! It's intuitive and very user-friendly. They are constantly updating and making the system even better.<i class="fa fa-quote-right"></i>
                  </h6>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img
                    src="{{ asset('public/frontend') }}/assets/img/avatar.png"
                    class="testimonial-img"
                    alt=""
                  />
                  <h4 class="mb-0">Maryam Amiri</h4>
                  <h6 class="text-muted mb-3">Ceo &amp; Founder</h6>
                  <h6 class="lh-lg">
                    <i class="fa fa-quote-left"></i> I've been using this product from the early days and I've seen first hand how far it has come. As an agency, we have fully integrated our business with Recruitment Management Software and find it very efficient. It definitely saves us time on administrative tasks!<i class="fa fa-quote-right"></i>
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
    <script src="{{ asset('public/frontend') }}/assets/js/bundle/swiper.bundle.js"></script>
    <script>
      // Testimonials slider
      new Swiper('.testimonials-slider', {
        speed: 600,
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        slidesPerView: 'auto',
        pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
          clickable: true,
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
            spaceBetween: 20,
          },
          1200: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
        },
      });
    </script>
    <!--  Section: Gallery  -->
    {{-- <div class="section gallery pb-0">
      <div class="container">
        <div class="row justify-content-center mb-3">
          <div class="col-lg-12">
            <span class="bg-dark px-2 py-1 color-fff">Gallery</span>
            <h2 class="mb-1 mt-4 color-900">Awesome Portfolio</h2>
            <p class="lead">
              Lorem Ipsum issss has been the industry's standard dummy text ever
              since the 1500s, when an unknown lorem
            </p>
          </div>
        </div>
        <!-- .row end -->
      </div>
      <div class="container-fluid">
        <div class="img-hover">
          <!-- Gallery: images -->
          <div
            class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-4 row-cols-md-4 row-cols-sm-3 row-cols-2 g-1 mb-2"
          >
            <div class="col">
              <a title="Image 1" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/1.jpg"
                  alt="luno admin template"
              /></a>
            </div>
            <div class="col">
              <a title="Image 2" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/2.jpg"
                  alt="luno admin template"
              /></a>
            </div>
            <div class="col">
              <a title="Image 3" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/3.jpg"
                  alt="luno admin template"
              /></a>
            </div>
            <div class="col">
              <a title="Image 4" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/4.jpg"
                  alt="luno admin template"
              /></a>
            </div>
            <div class="col">
              <a title="Image 5" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/5.jpg"
                  alt="luno admin template"
              /></a>
            </div>
            <div class="col">
              <a title="Image 6" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/6.jpg"
                  alt="luno admin template"
              /></a>
            </div>
            <div class="col">
              <a title="Image 7" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/7.jpg"
                  alt="luno admin template"
              /></a>
            </div>
            <div class="col">
              <a title="Image 8" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/8.jpg"
                  alt="luno admin template"
              /></a>
            </div>
            <div class="col">
              <a title="Image 9" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/9.jpg"
                  alt="luno admin template"
              /></a>
            </div>
            <div class="col">
              <a title="Image 10" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/10.jpg"
                  alt="luno admin template"
              /></a>
            </div>
            <div class="col">
              <a title="Image 11" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/11.jpg"
                  alt="luno admin template"
              /></a>
            </div>
            <div class="col">
              <a title="Image 12" href="#"
                ><img
                  class="thumbnail rounded img-fluid"
                  src="{{ asset('public/frontend') }}/assets/img/gallery/12.jpg"
                  alt="luno admin template"
              /></a>
            </div>
          </div>
          <!-- Row end  -->
        </div>
        <!-- Gallery: carousel popups -->
        <div class="modal fade" id="myModalGallery" tabindex="-1">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Image Gallery</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <div
                  id="modalCarousel"
                  class="carousel slide carousel-fade"
                  data-ride="carousel"
                >
                  <div class="carousel-inner"></div>
                  <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#modalCarousel"
                    data-bs-slide="prev"
                  >
                    <span
                      class="carousel-control-prev-icon"
                      aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#modalCarousel"
                    data-bs-slide="next"
                  >
                    <span
                      class="carousel-control-next-icon"
                      aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          // img gallery
          $(function () {
            /* copy loaded thumbnails into carousel */
            $('.row .thumbnail')
              .on('load', function () {})
              .each(function (i) {
                // if(this.complete) {
                var item = $('<div class="carousel-item"></div>');
                var itemDiv = $(this).parents('div');
                $(itemDiv.html()).appendTo(item);
                item.appendTo('.carousel-inner');
                if (i == 0) {
                  // set first item active
                  item.addClass('active');
                  // }
                }
              });
            /* activate the carousel */
            $('#modalCarousel').carousel({
              interval: false,
            });
            /* when clicking a thumbnail */
            $('.row .thumbnail').click(function () {
              var idx = $(this).parents('div').index();
              var id = parseInt(idx);
              $('#myModalGallery').modal('show'); // show the modal
              $('#modalCarousel').carousel(id); // slide carousel to selected
            });
          });
        </script>
      </div>
    </div> --}}
    <!-- Section: call to action -->
    <div class="section call-action">
      <div class="container">
        <div class="row justify-content-center text-center text-white">
          <div class="col-xl-7 col-lg-10 col-12">
            <span class="bg-white px-3 py-2 text-dark"
              >GETTING STARTED TO WORK</span
            >
            <h2 class="mb-3 mt-4">Take a look at All the layouts of Recruitment Management</h2>
            <p class="lead">
             We help recruiters do everything from sourcing candidates, sending emails, setting up interviews, reminders, collecting updated CVs and feedback from clients.
            </p>
            <div class="mt-5">
              <a
                href="https://m360ict.com/"
                class="btn lift btn-lg px-5 btn-light fs-6"
                >Contact us</a>
            </div>
          </div>
        </div>
        <!-- .row end -->
      </div>
    </div>
    
    <!--  Section: contact us form  -->
    {{-- <div class="section contactus">
      <div class="container">
        <div class="row g-2">
          <div class="col-12">
            <span class="bg-dark px-2 py-1 color-fff">Contact Information</span>
            <h3 class="mb-1 mt-4 color-900">Get in touch</h3>
            <p class="lead">
              There are many variations of passages of the majority have
              suffered alteration.
            </p>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="form-floating">
              <input type="text" class="form-control" placeholder="Your Name" />
              <label>Your Name</label>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="form-floating">
              <input
                type="email"
                class="form-control"
                placeholder="Your email"
              />
              <label>Your email</label>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="form-floating">
              <input type="tel" class="form-control" placeholder="Your Phone" />
              <label>Your Phone</label>
            </div>
          </div>
          <div class="col-12">
            <div class="form-floating">
              <textarea
                class="form-control"
                placeholder="Message (Optional)"
                style="height: 160px"
              ></textarea>
              <label>Message (Optional)</label>
            </div>
          </div>
          <div class="col-12 mt-3">
            <button
              type="submit"
              class="btn btn-lg btn-primary text-uppercase fs-6"
            >
              Send
            </button>
          </div>
        </div>
        <!-- .row end -->
      </div>
    </div> --}}
    <!-- Section: call-to-action app download -->
    {{-- <div class="section bg-dark text-light">
      <div class="container">
        <div class="row g-3 align-items-center justify-content-center">
          <div class="col-lg-6 col-12">
            <h3>Download Our Best Apps</h3>
            <span class="lead"
              >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore</span
            >
          </div>
          <div class="col-lg-6 col-12 text-lg-end">
            <a class="btn btn-lg px-4 lift btn-primary" href="#"
              ><i class="fa fa-apple me-2"></i>App Store</a
            >
            <a class="btn btn-lg px-4 lift btn-outline-primary" href="#"
              ><i class="fa fa-android me-2"></i>Google Play</a
            >
          </div>
        </div>
        <!-- .row end -->
      </div>
    </div> --}}
    <!-- Section: Footer -->
    <div class="section footer">
      <div class="container">
        <div class="row g-3 mb-4">
          <div class="col-lg-12 col-md-12 col-12 text-center">
            <img class="img-fluid" src="{{ asset('public/frontend') }}/assets/img/logo.png" alt="">
            {{-- <h3 class="mb-1 fw-bold color-900">Recruitment Management</h3> --}}
            {{-- <p>
              We help recruiters do everything from sourcing candidates.
            </p> --}}
            <ul class="mt-3 fs-6 lh-lg">
              <li><span>Address:</span> House# 74 Road# 7, Block# H, Banani, Dhaka-1213, Bangladesh</li>
              <li><span>Email:</span> info@m360ict.com</li>
              <li><span>Call:</span> +8809638336699</li>
            </ul>
          </div>
          
        </div>
        <!-- .row end -->
        <div class="row g-3 border-top pt-3">
          <div class="col-lg-6 col-md-12 text-center text-lg-start">
            <span
              >© 2022
              <a
                href="https://m360ict.com/"
                rel="nofollow"
                target="_blank"
                >Recruitment Management</a
              >. All Rights Reserved.</span
            >
          </div>
          <div class="col-lg-6 col-md-12 text-center text-lg-end">
            <ul
              class="list-unstyled d-flex justify-content-center justify-content-lg-end mb-0"
            >
              <li><a class="p-2 ms-2" href="#">Facebook</a></li>
              <li><a class="p-2 ms-2" href="#">Dribbble</a></li>
              <li><a class="p-2 ms-2" href="#">Twitter</a></li>
            </ul>
          </div>
        </div>
        <!-- .row end -->
      </div>
    </div>
   
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="fa fa-arrow-up"></i
    ></a>
    <!-- Jquery Page Js -->
    <script src="{{ asset('public/frontend') }}/assets/js/theme.js"></script>
  </body>
</html>
