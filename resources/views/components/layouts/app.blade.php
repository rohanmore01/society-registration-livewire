<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Collectorate - Dadra and Nagar Haveli &amp; Daman and Diu">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('/images/emblem-dark.png') }}" type="image/x-icon">
    <title>Gruham - DNH</title>

    <!-- Google Font -->

    <!-- Google Font -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery3.6.3min.js') }}" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap5.3min.css') }}" rel="stylesheet" crossorigin="anonymous">

    <!-- Font Awesome Free's Solid and Brand files -->
    <script src="{{ asset('fontawesomefree/fontawesome.js') }}"></script>
    <script src="{{ asset('fontawesomefree/solid.js') }}"></script>
    <script src="{{ asset('fontawesomefree/brands.js') }}"></script>
    <!-- Font Awesome Free's Solid and Brand files -->

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/base.css') }}">
    <!-- Custom Javascript -->
    <script src="{{ asset('/js/base.js') }}" type="text/javascript"></script>

    <!-- Toast Notification -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    {{-- moment js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <style>
        .toast-top-center {
            top: 10px;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
        }
    </style>
</head>

<body class="d-flex flex-column h-100" style="padding-top: 8.9rem;">
    <header>

        <!-- navbar -->
        <div class="fixed-top">
            <!-- Image Navbar -->
            <div class="bg-light">
                <div class="container d-flex flex-row p-2 align-items-center">
                    <a class="navbar-brand" href="#"></a>
                    <img src="{{ asset('/images/emblem-dark.png') }}" alt="emblem_of_india" height="70px"
                        class="px-2">
                    <div class="mx-3">
                        <div class="logo-title">गृहम</div>
                        <div class="logo-title">Gruham</div>
                        <div class="small-title">U.T. Administration of Dadra and Nagar Haveli and Daman and Diu</div>
                    </div>
                </div>
            </div>

            <!-- Image Navbar -->

            <!-- Menu Navbar -->
            <nav class="navbar navbar-expand-lg nic-bg-color navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-white active" class="nav-link" aria-current="page"
                                    href="{{ url('/') }}" wire:navigate><i class="fa-solid fa-solid fa-house"></i>
                                    Home</a>
                            </li>
                            @if (session('user_type') == 'User')
                                <li class="nav-item">
                                    <a class="nav-link text-white active" class="nav-link"
                                        href="{{ url('/society-registration-form') }}"><i class="fa-solid fa-list"></i>
                                        Apply Online</a>
                                </li>
                            @endif

                            @if (session()->has('email'))

                                @if (session('user_type') == 'User')
                                    <li class="nav-item">
                                        <a class="nav-link text-white active" class="nav-link"
                                            href="{{ url('/applications-list') }}"><i class="fa-solid fa-list"></i>
                                            Application List</a>
                                    </li>
                                @endif

                                @if (session('user_type') != 'User' && session('user_type') != 'Admin')
                                    <li class="nav-item">
                                        <a class="nav-link text-white active" class="nav-link"
                                            href="{{ url('/applications-list') }}"><i class="fa-solid fa-list"></i>
                                            Pending Applications</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link text-white active" class="nav-link"
                                            href="{{ url('/processed-applications') }}"><i
                                                class="fa-solid fa-list-check"></i> Processed Applications</a>
                                    </li>
                                @endif

                            @endif
                            {{-- <li class="nav-item">
                                <a class="nav-link text-white active" class="nav-link" href="">
                                    <i class="fa-solid fa-download"></i> Download Certificate</a>
                            </li> --}}

                            @if (session('user_type') == 'Admin')
                                <li class="nav-item">
                                    <a class="nav-link text-white active" class="nav-link"
                                        href="{{ url('/user-list') }}"><i class="fa fa-users"></i> User
                                        List</a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link text-white active" class="nav-link" href="{{ url('/contact') }}"
                                    wire:navigate><i class="fa-solid fa-address-book"></i> Contact Us</a>
                            </li>

                        </ul>
                        <div class="d-flex">

                            @if (session()->has('email'))
                                <div class="dropdown text-end">
                                    <a href="#"
                                        class="d-block link-dark text-decoration-none dropdown-toggle text-white mx-4"
                                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset('/images/blank_pic.jpg') }}" class="rounded-circle"
                                            height="35" alt="Black and White Portrait of a Man" loading="lazy" />
                                        <span style="color:white;"> {{ session('name') }}</span>
                                    </a>
                                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                                        <li><a class="dropdown-item" href="{{ url('/change-password') }}">
                                                <i class="fa-solid fa-key"></i> Change password</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/logout') }}"><i
                                                    class="fa-solid fa-power-off"></i> Log Out</a></li>
                                    </ul>
                                </div>
                            @endif

                            @if (!session()->has('email'))
                                <a href="{{ url('/registration') }}" class="btn btn-outline-primary text-white"
                                    wire:navigate><i class="fa-solid fa-user-plus"></i> Registration</a>
                                <a href="{{ url('/login') }}" class="btn btn-outline-success text-white mx-3"
                                    wire:navigate><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                            @endif

                        </div>
                    </div>
                </div>
            </nav>
            <!-- Menu Navbar -->
        </div>
        <!-- end navbar -->
    </header>

    <!-- Main Body -->
    <main class="container my-2 p-2" id="content">

        @if (session('success'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{ $slot }}

    </main>
    <!-- Main Body -->

    <!-- Bootstrap Bundle with Popper -->
    <script src="{{ asset('js/boostrap5.3min.js') }}" type="text/javascript" crossorigin="anonymous"></script>

    <!-- Footer -->
    <footer
        class="container-fluid nic-bg-color mt-auto py-3 d-flex flex-row justify-content-between align-items-center">
        <div>
            <!-- <a href="https://dnh.gov.in/" target="_blank" rel="noopener" class="text-white small-title mx-3">dnh.gov.in</a> -->
            <div class="text-white small-title">© {{ date('Y') }} Copyright Reserved | Designed & Developed By NIC
            </div>
        </div>
        <div>
            <a href="https://www.nic.in/" target="_blank" rel="noopener"><img
                    src="{{ asset('images/nic-logo-blue.png') }}" style="height: 40px;"></a>
        </div>
    </footer>
    <!-- Footer -->
</body>

</html>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "iDisplayLength": 8
        });
        $("input[type='search']").addClass('mb-2');

        // for toast notification
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                positionClass: 'toast-top-center'
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                positionClass: 'toast-top-center'
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                positionClass: 'toast-top-center'
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                positionClass: 'toast-top-center'
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    });


    $('.file-upload').change(function() {
        var file = $(this)[0].files[0].name;

        var fileSize = $(this)[0].files[0].size;

        if (fileSize > 5242880) {
            alert("Please Upload PDF File less than 5 MB !!");
            $(this).val('');
            $(this).prev('label').html('<i class="fa fa-cloud-upload"></i> Upload PDF Document');
        } else {
            $(this).prev('label').html('<i class="fa fa-cloud-upload"></i> ' + file);
        }

    });

    var currentRoute = window.location.pathname;

    if (currentRoute == '/applications-list' || currentRoute == '/processed-applications') {
        document.querySelector('.table-responsive').addEventListener('wheel', function(event) {
            if (event.deltaY !== 0) {
                this.scrollLeft += event.deltaY;
                event.preventDefault();
            }
        });
    }
</script>
