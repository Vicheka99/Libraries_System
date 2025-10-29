<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flexy Free Bootstrap Admin Template by WrapPixel</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/styles.min.css.map') }}" />

</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="text-nowrap logo-img">
                        <img src="assets/images/logos/logo.svg" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-6"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                            <span class="hide-menu">Home</span>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Dashboard -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="#" aria-expanded="false">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="d-flex">
                                        <i class="ti ti-aperture"></i>
                                    </span>
                                    <span class="hide-menu">DashBoard</span>
                                </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="javascript:void(0)" id="drop1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-bell"></i>
                                <div class="notification bg-primary rounded-circle"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                                <div class="message-body">
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        Item 1
                                    </a>
                                    <a href="javascript:void(0)" class="dropdown-item">
                                        Item 2
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                            <li class="nav-item dropdown">
                                <a class="nav-link " href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="./assets/images/profile/user-1.jpg" alt="" width="35"
                                        height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-list-check fs-6"></i>
                                            <p class="mb-0 fs-3">My Task</p>
                                        </a>
                                        <a href="./authentication-login.html"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="body-wrapper-inner">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Products Performance</h4>
                                    <p class="card-subtitle">
                                        Ample Admin Vs Pixel Admin
                                    </p>
                                </div>
                                <div class="ms-auto mt-3 mt-md-0">
                                    <select class="form-select theme-select border-0"
                                        aria-label="Default select example">
                                        <option value="1">March 2025</option>
                                        <option value="2">March 2025</option>
                                        <option value="3">March 2025</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive mt-4">
                                <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-0 text-muted">
                                                Assigned
                                            </th>
                                            <th scope="col" class="px-0 text-muted">Name</th>
                                            <th scope="col" class="px-0 text-muted">
                                                Priority
                                            </th>
                                            <th scope="col" class="px-0 text-muted text-end">
                                                Budget
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <img src="./assets/images/profile/user-3.jpg"
                                                        class="rounded-circle" width="40" alt="flexy" />
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 fw-bolder">Sunil Joshi</h6>
                                                        <span class="text-muted">Web Designer</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-0">Elite Admin</td>
                                            <td class="px-0">
                                                <span class="badge bg-info">Low</span>
                                            </td>
                                            <td class="px-0 text-dark fw-medium text-end">
                                                $3.9K
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <img src="./assets/images/profile/user-5.jpg"
                                                        class="rounded-circle" width="40" alt="flexy" />
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 fw-bolder">
                                                            Andrew McDownland
                                                        </h6>
                                                        <span class="text-muted">Project Manager</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-0">Real Homes WP Theme</td>
                                            <td class="px-0">
                                                <span class="badge text-bg-primary">Medium</span>
                                            </td>
                                            <td class="px-0 text-dark fw-medium text-end">
                                                $24.5K
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <img src="./assets/images/profile/user-6.jpg"
                                                        class="rounded-circle" width="40" alt="flexy" />
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 fw-bolder">
                                                            Christopher Jamil
                                                        </h6>
                                                        <span class="text-muted">SEO Manager</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-0">MedicalPro WP Theme</td>
                                            <td class="px-0">
                                                <span class="badge bg-warning">Hight</span>
                                            </td>
                                            <td class="px-0 text-dark fw-medium text-end">
                                                $12.8K
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <img src="./assets/images/profile/user-7.jpg"
                                                        class="rounded-circle" width="40" alt="flexy" />
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 fw-bolder">Nirav Joshi</h6>
                                                        <span class="text-muted">Frontend Engineer</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-0">Hosting Press HTML</td>
                                            <td class="px-0">
                                                <span class="badge bg-danger">Low</span>
                                            </td>
                                            <td class="px-0 text-dark fw-medium text-end">
                                                $2.4K
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-0">
                                                <div class="d-flex align-items-center">
                                                    <img src="./assets/images/profile/user-8.jpg"
                                                        class="rounded-circle" width="40" alt="flexy" />
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 fw-bolder">Micheal Doe</h6>
                                                        <span class="text-muted">Content Writer</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-0">Helping Hands WP Theme</td>
                                            <td class="px-0">
                                                <span class="badge bg-success">Low</span>
                                            </td>
                                            <td class="px-0 text-dark fw-medium text-end">
                                                $9.3K
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by <a href="#"
                        class="pe-1 text-primary text-decoration-underline">Wrappixel.com</a> Distributed by <a
                        href="https://themewagon.com" target="_blank">ThemeWagon</a></p>
            </div>
        </div>
    </div>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/sidebarmenu.js"></script>
    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="./assets/js/dashboard.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
