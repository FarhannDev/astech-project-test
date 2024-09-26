  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-text mx-3">Astech Project</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <li class="nav-item ">
          <a class="nav-link" href="">
              <i class="fas fa-fw fa-chart-line"></i>
              <span>Dashboard</span></a>
      </li>
      <li class="nav-item ">

      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#catatanKeuangan"
              aria-expanded="true" aria-controls="catatanKeuangan">
              <i class="fa fa-solid fa-fw fa-wallet"></i>
              <span>Catatan Keuangan</span>
          </a>
          <div id="catatanKeuangan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="{{ route('transactions.index') }}">Pemasukan</a>
                  <a class="collapse-item" href="{{ route('transactions.expense') }}">Pengeluaran</a>
                  <a class="collapse-item" href="#">Laporan</a>

              </div>
          </div>
      </li>


      <li class="nav-item ">
          <a class="nav-link" href="">
              <i class="fas fa-fw fa-sign-out-alt"></i>
              <span>Logout</span></a>
      </li>

  </ul>
  <!-- End of Sidebar -->
