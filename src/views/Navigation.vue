<template>
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <!-- class="nav-link {{ PAGE_ID == 'index' ? 'active' : '' }}" -->
          <RouterLink aria-current="page" to="/">
            <span data-feather="home" class="align-text-bottom"></span>
            Certificates
          </RouterLink>
        </li>
      </ul>

      <h6
        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
      >
        <span>Certificate Functions</span>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <RouterLink aria-current="page" to="/CERT/Import">
            <span data-feather="copy" class="align-text-bottom"></span>
            Import
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink aria-current="page" to="/CERT/Upload">
            <span data-feather="upload" class="align-text-bottom"></span>
            Upload
          </RouterLink>
        </li>
      </ul>

      <h6
        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
      >
        <span>CSR Functions</span>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <RouterLink aria-current="page" to="/CSR/Create">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
            Create
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink aria-current="page" to="/CSR/Import">
            <span data-feather="copy" class="align-text-bottom"></span>
            Import
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink aria-current="page" to="/CSR/Upload">
            <span data-feather="upload" class="align-text-bottom"></span>
            Upload
          </RouterLink>
        </li>
      </ul>
    </div>
  </nav>
</template>
