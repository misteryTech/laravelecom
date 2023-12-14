<div>
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item collapsed" >
            <a class="nav-link collapsed" onclick="toggleClass()" id="dashBoard" href="{{route('dashboard')}}">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
            </a>
          </li><!-- End Dashboard Nav -->

          @if (Auth::user()->utype =='ADM')
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" id="dashBoard">
              <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('view.products')}}">
                      <i class="bi bi-circle"></i><span>View Products</span>
                    </a>
                  </li>

              <li>
                <a href="{{route('add.products')}}">
                  <i class="bi bi-circle"></i><span>Add Products</span>
                </a>
              </li>

            </ul>
          </li><!-- End Components Nav -->
          @else
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" id="dashBoard">
              <i class="bi bi-menu-button-wide"></i><span>Animals</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="#">
                  <i class="bi bi-circle"></i><span>Add Animals</span>
                </a>
              </li>

            </ul>
          </li><!-- End Components Nav -->
          @endif

          <li class="nav-heading">Pages</li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
              <i class="bi bi-person"></i>
              <span>Profile</span>
            </a>
          </li><!-- End Profile Page Nav -->








        </ul>

      </aside><!-- End Sidebar-->
    </div>
