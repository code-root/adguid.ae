<body class="sticky-header {{ $basicFields['dark_mode'] ? 'dark-mode' : '' }}">
    <div id="al-eman-preloader">
        <div class="loading-spinner">
            <div class="preloader-spin-1"></div>
            <div class="preloader-spin-2"></div>
        </div>
    </div>

    <div id="main-wrapper" class="main-wrapper">

        <header class="eman-header header-style-1" @if (session('locale') == 'ar') style="direction: rtl;" @endif>
            @include('site.partials.home-page.top-bar')

            <div id="eman-sticky-placeholder"></div>
            <div class="header-mainmenu">
                <div class="container">
                    <div class="header-navbar">
                        <div class="header-brand">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img class="logo-light"
                                        src="{{ route('view-image', ['m' => 'Setting', 'id' => 0, 'nameVar' => 'logo']) }}"
                                        alt="{{ $basicFields['site_name'] ?? 'My Website' }}" style="width: 10rem;">
                                    <img class="logo-dark"
                                        src="{{ route('view-image', ['m' => 'Setting', 'id' => 0, 'nameVar' => 'logo']) }}"
                                        alt="{{ $basicFields['site_name'] ?? 'My Website' }}" style="width: 10rem;">
                                </a>
                            </div>
                        </div>
                        <div class="header-mainnav">
                            <nav class="mainmenu-nav">
                                <ul class="mainmenu">
                                    <li><a href="{{ url('/') }}">{{ $locale === 'ar' ? 'الرئيسية' : 'Home' }}</a>
                                    </li>
                                    @foreach ($sections as $section)
                                        <li class="has-droupdown">
                                            <a href="#">{{ $section->{'name_' . session('locale')} }}</a>
                                            @if ($section->pages->count() > 0)
                                                <ul class="submenu">
                                                    @foreach ($section->pages as $page)
                                                        <li><a
                                                                href="{{ route('page.show', $page->id) }}">{{ $page->{'name_' . session('locale')} }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach


                                </ul>
                            </nav>
                        </div>

                        <div class="header-right">
                            <ul class="header-action">
                                <li class="mobile-menu-bar d-block d-xl-none">
                                    <button class="hamberger-button">
                                        <i class="icon-54"></i>
                                    </button>
                                </li>
                                <li class="theme-toggle" id="theme-toggle-button">
                                    <img src="/storage/moon_12080168.png" alt="Light Mode" id="theme-icon"
                                        style="border-radius: 4px;width: 35px;height: 27px;background-color: #ffffff;">
                                </li>
                                <li>
                                    <a href="{{ url('set-locale/ar') }}"
                                        class="{{ $locale === 'ar' ? 'active' : '' }}">العربية</a>
                                </li>
                                <li>
                                    <a href="{{ url('set-locale/en') }}"
                                        class="{{ $locale === 'en' ? 'active' : '' }}">English</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popup-mobile-menu">
                <div class="inner">
                    <div class="header-top">
                        <div class="logo">
                            <a href="/">
                                <img class="logo-light"
                                    src="{{ route('view-image', ['m' => 'Setting', 'id' => 0, 'nameVar' => 'logo']) }}"
                                    alt="{{ $settings['site_name'] ?? 'My Website' }}">
                                <img class="logo-dark"
                                    src="{{ route('view-image', ['m' => 'Setting', 'id' => 0, 'nameVar' => 'logo']) }}"
                                    alt="{{ $settings['site_name'] ?? 'My Website' }}">
                            </a>
                        </div>
                        <div class="close-menu">
                            <button class="close-button">
                                <i class="icon-73"></i>
                            </button>
                        </div>
                    </div>
                    <ul class="mainmenu">
                        <li><a href="{{ url('/') }}">{{ $locale === 'ar' ? 'الرئيسية' : 'Home' }}</a></li>
                        <li><a href="{{ url('/contact') }}">{{ $locale === 'ar' ? 'تواصل معنا' : 'Contact Us' }}</a>
                        </li>

                        @foreach ($sections as $section)
                            <li class="has-droupdown">
                                <a href="#">{{ $section->{'name_' . session('locale')} }}</a>
                                @if ($section->pages->count() > 0)
                                    <ul class="submenu">
                                        @foreach ($section->pages as $page)
                                            <li><a
                                                    href="{{ route('page.show', $page->id) }}">{{ $page->{'name_' . session('locale')} }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach


                    </ul>
                </div>
            </div>

            <div class="eman-search-popup">
                <div class="content-wrap">
                    <div class="site-logo">
                        <img class="logo-light"
                            src="{{ route('view-image', ['m' => 'Setting', 'id' => 0, 'nameVar' => 'logo']) }}"
                            alt="Corporate Logo">
                        <img class="logo-dark"
                            src="{{ route('view-image', ['m' => 'Setting', 'id' => 0, 'nameVar' => 'logo']) }}"
                            alt="Corporate Logo">
                    </div>
                    <div class="close-button">
                        <button class="close-trigger"><i class="icon-73"></i></button>
                    </div>
                </div>
            </div>

            <!-- Start Search Popup  -->

            <!-- End Search Popup  -->
        </header>

        <!--=====================================-->
        <!--=       Hero Banner Area Start      =-->
        <!--=====================================-->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const body = document.querySelector('body');
                const themeToggleButton = document.getElementById('theme-toggle-button');
                const themeIcon = document.getElementById('theme-icon');

                // تحقق من الوضع الحالي من خلال الكلاس
                if (body.classList.contains('dark-mode')) {
                    themeIcon.src = '/storage/dark_13674412.png';
                } else {
                    themeIcon.src = '/storage/moon_12080168.png'; // صورة الوضع الفاتح
                }

                themeToggleButton.addEventListener('click', function() {
                    body.classList.toggle('dark-mode');

                    // تغيير الصورة بناءً على الوضع الحالي
                    if (body.classList.contains('dark-mode')) {
                        themeIcon.src = '/storage/dark_13674412.png';
                    } else {
                        themeIcon.src = '/storage/moon_12080168.png'; // صورة الوضع الفاتح
                    }
                });
            });
        </script>
