<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ __('general.database') }}</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('admin/img/database.png') }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('user/css/styles.css') }}" rel="stylesheet" />

        <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="/">{{ __('general.database') }}</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="#">About</a></li> --}}
                            {{-- <li class="nav-item"><a class="nav-link" href="#">Contact</a></li> --}}
                            @guest
                            @else
                                <li class="nav-item"><a class="nav-link" href="{{ route('api') }}">API</a></li>
                            @endguest    
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">SARS</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="{{ route('searchSars') }}">Search Data</a></li>
                                @guest
                                @else
                                    <li><a class="dropdown-item" href="{{ route('sars.map') }}">Map</a></li>
                                @endguest
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">SUSDAT</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="{{ route('userIndexSusdat') }}">Table Data</a></li>
                                </ul>
                            </li>
                            <li class="nav-item nav-link">|</li>

                            <!-- Authentication Links -->
                            
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @auth
                        @if(Auth::user()->is_admin)
                            <li class="nav-item"><a class="nav-link" href="/admin/home">Admin</a></li>
                        @endif
                        @endauth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {!! Auth::user()->full_name !!}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                            {{--
                            <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
                                    <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
                                    <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
                                </ul>
                            </li>
                            --}}
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->
        @yield('content')
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2023</div></div>
                    {{-- <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div> --}}
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('user/js/scripts.js') }}"></script>

        {{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
        <script src=https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js></script>
        <script>
            new DataTable('#dataTable', {
                pagingType: 'full_numbers'
                });
        </script>
        <script src="{{ asset('user/js/scripts.js') }}"></script>
        
    </body>
</html>
