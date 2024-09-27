  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-text mx-3">Astech Project</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <li class="nav-item ">
          <a class="nav-link" href="{{ route('dashboard.index') }}">
              <i class="fas fa-fw fa-chart-line"></i>
              <span>Dashboard</span></a>
      </li>
      <li class="nav-item ">

      <li class="nav-item ">
          <a class="nav-link" href="{{ route('transactions.index') }}">
              <i class="fas fa-duotone fa-solid fa-dollar-sign"></i>
              <span>Transaksi Uang Masuk</span></a>
      </li>
      <li class="nav-item ">
          <a class="nav-link" href="{{ route('transactions.expense') }}">
              <i class="fas fa-sharp fa-solid fa-dollar-sign"></i> <span>Transaksi Uang Keluar</span></a>
      </li>

      <li class="nav-item ">
          <a class="nav-link" href="{{ route('transactions.category.index') }}">
              <i class="fas fa-fw fa-book"></i>
              <span>Kategori Transaksi</span></a>
      </li>




  </ul>
  <!-- End of Sidebar -->
