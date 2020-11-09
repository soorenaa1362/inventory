<!DOCTYPE html>
<html lang="en" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>سیستم مالی وانبارداری  شعله سازان شرق </title>

    <link rel="shortcut icon" type="{{asset('adminAssets/image/png" href="img/ico/favicon03.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAssets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAssets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" 
        href="{{asset('adminAssets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" 
        href="{{asset('adminAssets/vendors/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAssets/vendors/css/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAssets/vendors/css/chartist.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAssets/css/app.css')}}">
    @yield('header')
</head>
<body data-col="2-columns" class="2-columns">
    
    <div class="wrapper">

<!----------------------------------- START THE RIGHT SIDEBAR ----------------------------------->        
        <div data-active-color = "white" data-background-color = "crystal-clear" 
        data-image = "{{asset('adminAssets/img/sidebar-bg/08.jpg')}}" class="app-sidebar">
            
            <div class="sidebar-header">
                <div class="logo clearfix">
                    <a href="" class="logo-text float-right">
                        <div class="logo-img">
                            <img src="{{asset('adminAssets/img/logos/logo03.png')}}" 
                            alt="Convex Logo"/>
                        </div>
                        <span class="text align-middle">شعله سازان شرق </span>
                    </a>
                    <a id="sidebarClose" href="javascript:;" 
                    class="nav-close d-block d-md-block d-lg-none d-xl-none">
                        <i class="ft-circle"></i>
                    </a>
                </div> <!-- End Logo -->
            </div> <!-- End Sidebar Header -->

            <div class="sidebar-content">
<!------------------- Start The Right Menu ------------------------>                
                <div class="nav-container">
                    <ul id="main-menu-navigation" data-menu="menu-navigation" 
                        class="navigation navigation-main">

                        <li class="{{checkActiveMenu([route('Dashboard')])}}">
                            <a href="{{route('Dashboard')}}" class="menu-item">
                                <i class="icon-screen-desktop"></i>
                                <span data-i18n="" class="menu-title">داشبورد</span>
                            </a>
                        </li>

<!-- Start Nav Inventory -->
                        <li class="has-sub nav-item">
                            <a href="#">
                                <i class="icon-home"></i>
                                <span data-i18n="" class="menu-title">انبار داری</span>
                            </a>

                            <ul class="menu-content">
                                <li class="{{checkActiveMenu([route('InventoryRawMaterials')])}}">
                                    <a href="{{route('InventoryRawMaterials')}}" class="menu-item">
                                        مواد اولیه 
                                    </a>
                                </li>
                            </ul>

                            <ul class="menu-content">
                                <li class="{{checkActiveMenu([route('InventoryPieces')])}}">
                                    <a href="{{route('InventoryPieces')}}" class="menu-item">
                                        قطعات
                                    </a>
                                </li>
                            </ul>   
                            
                            <ul class="menu-content">
                                <li class="{{checkActiveMenu([route('InventoryCustomers')])}}">
                                    <a href="{{route('InventoryCustomers')}}" class="menu-item">
                                        مشتری
                                    </a>
                                </li>
                            </ul>

                            <ul class="menu-content">
                                <li class="{{checkActiveMenu([route('InventoryContracts')])}}">
                                    <a href="{{route('InventoryContracts')}}" class="menu-item">
                                        قرارداد
                                    </a>
                                </li>
                            </ul>

                            <ul class="menu-content">
                                <li class="{{checkActiveMenu([route('InventoryRepositories')])}}">
                                    <a href="{{route('InventoryRepositories')}}" class="menu-item">
                                        انبار
                                    </a>
                                </li>
                            </ul>

                            <ul class="menu-content">
                                <li class="{{checkActiveMenu([route('InventoryContractors')])}}">
                                    <a href="{{route('InventoryContractors')}}" class="menu-item">
                                        پیمانکار
                                    </a>
                                </li>
                            </ul>                            
                            
                            <ul class="menu-content">
                                <li class="{{checkActiveMenu([route('InventoryProductionStage')])}}">
                                    <a href="{{route('InventoryProductionStage')}}" class="menu-item">
                                        پروسه تولید
                                    </a>
                                </li>
                            </ul>
                        </li> 
<!-- End Nav Inventory -->

                    </ul>
                </div> <!-- End Nav Container --> 
<!------------------- End The Right Menu ------------------------>           
            </div> <!-- End Sidebar Content -->

            <div class="sidebar-background"></div>

        </div> <!-- End App Sidebar -->
<!----------------------------------- END THE RIGHT SIDEBAR ----------------------------------->


<!----------------------------------- START THE TOP NAVBAR ----------------------------------->
        <nav class="navbar navbar-expand-lg navbar-light bg-faded">
            <div class="container-fluid">
                <div class="navbar-header">

                    <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-right">
                        <span class="sr-only">تغییر ناوبری </span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="d-lg-none navbar-right navbar-collapse-toggle">
                        <a class="open-navbar-container">
                            <i class="ft-more-vertical"></i>
                        </a>
                    </span>
                    <a id="navbar-fullscreen" href="javascript:;" class="ml-2 display-inline-block apptogglefullscreen">
                        <i class="ft-maximize blue-grey darken-4 toggleClass"></i>
                        <p class="d-none">تمام صفحه</p>
                    </a>
                    <a class="mr-2 display-inline-block">
                        <i class="ft-shopping-cart blue-grey darken-4"></i>
                            <p class="d-none">سبد خرید</p>
                    </a>
                        
                    <div class="dropdown mr-2 display-inline-block">
                        <a id="apps" href="#" data-toggle="dropdown" 
                        class="nav-link position-relative dopdown-toggle">
                            <i class="ft-edit blue-grey darken-4"></i>
                            <span class="mx-1 blue-grey darken-4 text-bold-400">برنامه ها</span>
                        </a>
                        <div class="apps dropdown-menu">
                            <div class="arrow_box">
                                <a href="chat.html" class="dropdown-item py-1">
                                    <span>چت</span>
                                </a>
                                <a href="taskboard.html" class="dropdown-item py-1">
                                    <span>وظیفه</span>
                                </a>
                                <a href="calendar.html" class="dropdown-item py-1">
                                    <span>تقویم</span>
                                </a>
                            </div>
                        </div>
                    </div> <!-- End DropDown -->
                    
                </div> <!-- End Navbar Header -->

                <div class="navbar-container">
                    <div id="navbarSupportedContent" class="collapse navbar-collapse">
                        <ul class="navbar-nav">
                            
                            <li class="nav-item mt-1 navbar-search text-left dropdown">
                                <a id="search" href="#" data-toggle="dropdown" 
                                    class="nav-link dropdown-toggle">
                                    <i class="ft-search blue-grey darken-4"></i>
                                </a>
                                <div aria-labelledby="search" class="search dropdown-menu dropdown-menu-right">
                                    <div class="arrow_box_right">
                                        <form role="search" class="navbar-form navbar-right">
                                            <div class="position-relative has-icon-right mb-0">
                                            <input id="navbar-search" type="text" placeholder="Search" 
                                            class="form-control"/>
                                            <div class="form-control-position navbar-search-close">
                                                <i class="ft-x"></i></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>

                            <li class="dropdown nav-item mt-1">
                                <a id="dropdownBasic" href="#" data-toggle="dropdown" 
                                class="nav-link position-relative dropdown-toggle">
                                    <i class="ft-flag blue-grey darken-4"></i>
                                    <span class="selected-language d-none"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left">
                                    <div class="arrow_box_right">
                                        <a href="javascript:;" class="dropdown-item py-1">
                                            <img src="{{asset('adminAssets/img/flags/us.png')}}" 
                                                alt="English Flag" class="langimg"/>
                                            <span> انگلیس</span>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item py-1">
                                            <img src="{{asset('adminAssets/img/flags/es.png')}}" 
                                                alt="Spanish Flag" class="langimg"/>
                                            <span> اسپانیا</span>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item py-1">
                                            <img src="{{asset('adminAssets/img/flags/br.png')}}" 
                                                alt="Portuguese Flag" class="langimg"/>
                                            <span> پرتغال</span>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item">
                                            <img src="{{asset('adminAssets/img/flags/de.png')}}" 
                                                alt="French Flag" class="langimg"/>
                                            <span> فرانسه</span>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="dropdown nav-item mt-1">
                                <a id="dropdownBasic2" href="#" data-toggle="dropdown" 
                                    class="nav-link position-relative dropdown-toggle">
                                    <i class="ft-bell blue-grey darken-4"></i>
                                    <span class="notification badge badge-pill badge-danger">4</span>
                                    <p class="d-none">اطلاعیه</p>
                                </a>
                                <div class="notification-dropdown dropdown-menu dropdown-menu-left">
                                    <div class="arrow_box_right">

                                        <div class="noti-list">
                                            <a class="dropdown-item noti-container py-2">
                                                <i class="ft-share info float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                <span class="noti-wrapper">
                                                    <span class="noti-title line-height-1 d-block text-bold-400 info">سفارش جدید دریافت شده</span>
                                                    <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                </span>
                                            </a>
                                            <a class="dropdown-item noti-container py-2">
                                                <i class="ft-save warning float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                <span class="noti-wrapper">
                                                    <span class="noti-title line-height-1 d-block text-bold-400 warning">کاربر جدید ثبت شده است</span>
                                                    <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                </span>
                                            </a>
                                            <a class="dropdown-item noti-container py-2">
                                                <i class="ft-repeat danger float-right d-block font-medium-4 mt-2 ml-2"></i><span class="noti-wrapper">
                                                    <span class="noti-title line-height-1 d-block text-bold-400 danger">سفارش جدید دریافت شده</span>
                                                    <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                </span>
                                            </a>
                                            <a class="dropdown-item noti-container py-2">
                                                <i class="ft-shopping-cart success float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                <span class="noti-wrapper">
                                                    <span class="noti-title line-height-1 d-block text-bold-400 success">مورد جدید در سبد خرید شما</span>
                                                    <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                </span>
                                            </a>
                                            <a class="dropdown-item noti-container py-2">
                                                <i class="ft-heart info float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                <span class="noti-wrapper">
                                                    <span class="noti-title line-height-1 d-block text-bold-400 info">فروش جدید</span>
                                                    <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                </span>
                                            </a>
                                            <a class="dropdown-item noti-container py-2">
                                                <i class="ft-box warning float-right d-block font-medium-4 mt-2 ml-2"></i>
                                                <span class="noti-wrapper">
                                                    <span class="noti-title line-height-1 d-block text-bold-400 warning">سفارش تحویل داده شده</span>
                                                    <span class="noti-text">لورم ایپسوم متن ساختگی با تولید سادگی</span>
                                                </span>
                                            </a>
                                        </div> <!-- End Noti List -->
                                        <a class="noti-footer primary text-center d-block border-top border-top-blue-grey border-top-lighten-4 text-bold-400 py-1">خواندن همه اعلان ها</a>
                                    
                                    </div> <!-- End Arrow Box Right -->
                                </div> <!-- End Notification DropDown -->
                            </li>

                            <li class="nav-item mt-1 d-none d-lg-block">
                                <a id="navbar-notification-sidebar" href="javascript:;" 
                                class="nav-link position-relative notification-sidebar-toggle">
                                    <i class="icon-equalizer blue-grey darken-4"></i>
                                    <p class="d-none">نوار اطلاع رسانی</p>
                                </a>
                            </li>

                            <li class="dropdown nav-item mr-0">
                                <a id="dropdownBasic3" href="#" data-toggle="dropdown" 
                                class="nav-link position-relative dropdown-user-link dropdown-toggle">
                                    <span class="avatar avatar-online">
                                        <img id="navbar-avatar" 
                                            src="{{asset('adminAssets/img/portrait/small/avatar-s-3.jpg')}}" 
                                            alt="avatar"/>
                                    </span>
                                    <p class="d-none">تنظیمات کاربر</p>
                                </a>
                                <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-left">
                                    <div class="arrow_box_right">
                                        <a href="user-profile-page.html" class="dropdown-item py-1">
                                            <i class="ft-edit ml-2"></i>
                                            <span>پروفایل من</span>
                                        </a>
                                        <a href="chat.html" class="dropdown-item py-1">
                                            <i class="ft-message-circle ml-2"></i>
                                            <span>چت من</span>
                                        </a>
                                        <a href="javascript:;" class="dropdown-item py-1">
                                            <i class="ft-settings ml-2"></i><span>تنظیمات</span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:;" class="dropdown-item">
                                            <i class="ft-power ml-2"></i>
                                            <span>خروج</span>
                                        </a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div> <!-- End Collapse -->
                </div> <!--  End Navbar Container -->

            </div> <!-- End Container Fluid -->
        </nav>
<!----------------------------------- END THE TOP NAVBAR ----------------------------------->

<!----------------------------------- START THE MAIN PANEL --------------------------------->
        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            @yield('content')
                        </div> <!--End Row -->
                    </div> <!-- End Conatiner Fluid -->
                </div> <!-- End Content Wrapper -->
            </div> <!-- End Main Content -->
        </div> <!-- End Main Panel -->
<!----------------------------------- END THE MAIN PANEL --------------------------------->

    </div> <!-- End Wrapper -->



    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('adminAssets/vendors/js/core/jquery-3.3.1.min.js')}}"></script>
    <!--<script src="../app-assets/js/persian-datepicker.min.js"></script>-->
    <script src="{{asset('adminAssets/vendors/js/core/popper.min.js')}}"></script>
    <script src="{{asset('adminAssets/vendors/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('adminAssets/vendors/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('adminAssets/vendors/js/prism.min.js')}}"></script>
    <script src="{{asset('adminAssets/vendors/js/jquery.matchHeight-min.js')}}"></script>
    <script src="{{asset('adminAssets/vendors/js/screenfull.min.js')}}"></script>
    <script src="{{asset('adminAssets/vendors/js/pace/pace.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('adminAssets/vendors/js/chartist.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CONVEX JS-->
    <script src="{{asset('adminAssets/js/app-sidebar.js')}}"></script>
    <script src="{{asset('adminAssets/js/notification-sidebar.js')}}"></script>
    <script src="{{asset('adminAssets/js/customizer.js')}}"></script>
    <!-- END CONVEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('adminAssets/js/dashboard-ecommerce.js')}}"></script>
    <!-- END PAGE LEVEL JS-->
    @yield('footer')
</body>

</html>











