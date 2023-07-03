<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret  bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="me-1 font-weight-bold text-white">P S </span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse px-0 w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">



        <li class="nav-item">
          <a class="nav-link " href="{{ route('home') }}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text me-1">لوحة القيادة</span>
          </a>
        </li>
        @if(Auth::user()->hasRole('Super-Admin'))


        <li class="nav-item">
            <a class="nav-link " href="{{ route('users.users.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">manage_accounts</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('users.model_plural') }}</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ route('api_users.api_user.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">manage_accounts</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('api_users.model_plural') }}</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ route('importations.importation.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('importations.model_plural') }} </span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link " href="{{ route('countries.countries.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">flag</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('countries.model_plural') }}</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ route('acceptation_clients.acceptation_client.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">history</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('login.history') }}</span>
            </a>
          </li>


          @endif

          <li class="nav-item">
            <a class="nav-link " href="{{ route('clients.client.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">group</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('clients.model_plural') }}</span>
            </a>
          </li>

        {{-- <li class="nav-item">
          <a class="nav-link " href="../pages/tables.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">table_view</i>
            </div>
            <span class="nav-link-text me-1">الجداول</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/billing.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text me-1">الفواتير</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/virtual-reality.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text me-1">الواقع الافتراضي</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../pages/rtl.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text me-1">RTL</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/notifications.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text me-1">إشعارات</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/profile.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">person</i>
            </div>
            <span class="nav-link-text me-1">حساب تعريفي</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-in.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">login</i>
            </div>
            <span class="nav-link-text me-1">تسجيل الدخول</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pages/sign-up.html">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">assignment</i>
            </div>
            <span class="nav-link-text me-1">اشتراك</span>
          </a>
        </li> --}}
      </ul>
    </div>

  </aside>
