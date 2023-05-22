<!DOCTYPE html>

<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}/"
    data-template="vertical-menu-template-no-customizer"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Home</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="{{ asset('assets') }}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets') }}/js/config.js"></script>
</head>

<body>
<!-- Content -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <div class="layout-page">
            <!-- navigation header -->
            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar"
            >
                <a href="/application/" class="btn" style="margin-left: -20px">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">

                    <span class="app-brand-text demo menu-text fw-bold">

                        BakeTime
                    </span>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <div class="navbar-nav align-items-center">
                        <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                            <i class="ti ti-sm"></i>
                        </a>
                    </div>
                </div>
            </nav>
            <!-- /navigation header -->
            <div class="content-wrapper">
                <div class="container-xxl">
                    <div class="py-4">
                        <!-- Login -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Logo -->
                                <div class="app-brand justify-content-center mb-4 mt-2">
                                    <a href="/application" class="app-brand-link gap-2">
                          <span class="app-brand-logo">
                              <span class="app-brand-text demo menu-text fw-bold">Scanner </span>
                          </span>
                                        <span class="app-brand-text demo text-body fw-bold ms-1"></span>
                                    </a>
                                </div>
                                <!-- /Logo -->
                                <h4 class="mb-1 pt-2"></h4>
                                <div class="mb-3">
                                    <h5>Status <button type="button" class="btn btn-sm {{ $remarks == "NA" ? "btn-danger" : "btn-success" }} waves-effect waves-light">{{ $remarks }}</button> </h5>
                                </div>

                            </div>
                        </div>

                        <!-- /Register -->
                    </div>
                    <div class="py-2">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Product Information</h5>
                            </div>
                            <div class="card-body">
                                <form action="/updateScanner" method="POST">
                                    @csrf
                                    <input id="scan_id" name="scan_id" type="hidden" />
                                    <input id="bread_id" name="id" type="hidden" />
                                    <div class="form-group mb-3">
                                        <label>Bread Info</label>
                                        <input id="bread_info" type="text" class="form-control" name="bread_info" required value="" />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Manufacturing Date</label>
                                        <input id="manufacturing_date" type="date" class="form-control" name="manufacturing_date" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Expiration Date</label>
                                        <input id="expiration_date" type="date" class="form-control" name="expiration_date" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Quantity</label>
                                        <input id="quantity" type="number" class="form-control" name="quantity" required />
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-warning btn-block waves-effect waves-light" {{ $remarks == "in" ? "" : "disabled" }} style="width: 100%"><i class="fa fa-save"> </i>&nbsp; Update</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('assets') }}/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('assets') }}/vendor/js/bootstrap.js"></script>
<script src="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{ asset('assets') }}/vendor/libs/node-waves/node-waves.js"></script>

<script src="{{ asset('assets') }}/vendor/libs/hammer/hammer.js"></script>
<script src="{{ asset('assets') }}/vendor/libs/i18n/i18n.js"></script>
<script src="{{ asset('assets') }}/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="{{ asset('assets') }}/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets') }}/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="{{ asset('assets') }}/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

<!-- Main JS -->
<script src="{{ asset('assets') }}/js/main.js"></script>

<!-- Page JS -->
<script src="{{ asset('assets') }}/js/pages-auth.js"></script>

<script>
    let id = "";
    async function getDataOnce() {
        const response = await fetch('/scanLogsIn');
        let jsonData = await response.json();

        $("#bread_info").val(jsonData[1]['bread_info']);
        $("#manufacturing_date").val(jsonData[1]['manufacturing_date']);
        $("#expiration_date").val(jsonData[1]['expiration_date']);
        $("#quantity").val(jsonData[1]['quantity']);
        $("#scan_id").val(jsonData[0]['id']);
        $("#bread_id").val(jsonData[1]['id']);

    }

    async function getData() {
        const response = await fetch('/scanLogsIn');
        let jsonData = await response.json();
        let id = $("#scan_id").val();
        if(id != jsonData[0]['id']) {
            $("#scan_id").val(jsonData[0]['id']);
            $("#bread_id").val(jsonData[1]['id']);
            $("#bread_info").val(jsonData[1]['bread_info']);
            $("#manufacturing_date").val(jsonData[1]['manufacturing_date']);
            $("#expiration_date").val(jsonData[1]['expiration_date']);
            $("#quantity").val(jsonData[1]['quantity']);
        }
    }

    getDataOnce();

    setInterval(function () {
        getData()
    }, 1000);
</script>
</body>
</html>
