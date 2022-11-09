<!DOCTYPE html>
<html lang="en">


    <head>
        
        <meta charset="utf-8" />
        <title>Panel Administrativo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=base_url('public/images/valtx.png') ?>">

        <!-- jquery.vectormap css -->
        <link href="<?=base_url('public/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css'); ?>" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="<?=base_url('public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="<?=base_url('public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />  

        <!-- Bootstrap Css -->
        <link href="<?=base_url('public/assets/css/bootstrap.min.css'); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?=base_url('public/assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?=base_url('public/assets/css/app.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <!-- js principales -->
        <script src="<?=base_url('public/assets/libs/jquery/jquery.min.js'); ?>"></script>
        <script src="<?=base_url('public/assets/libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
           <!-- Required datatable js -->
     
        <script src="<?=base_url('public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
        <script src="<?=base_url('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
        <!-- https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js -->
        <link href="<?=base_url('public/assets/libs/sweetalert2/sweetalert2.min.css'); ?>" rel="stylesheet" type="text/css" />
    </head>


    
<body data-topbar="dark" data-layout="horizontal">
        <input type="hidden" name="base_url" id="base_url" value="<?=base_url(); ?>">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?=base_url('home')?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?=base_url('public/images/valtx.png') ?>" alt="" height="50">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?=base_url('public/images/valtx.png') ?>" alt="" height="60" width="150">
                                </span>
                            </a>

        
                        </div>
                        <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>
                    
                    </div>
     <!-- aqui se agregaria el usuario activo  -->
                    <div class="d-flex">

                      

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?=base_url('public/images/avatar_login.png') ?>"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1">Usuario</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="ri-user-line align-middle mr-1"></i> Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                       
            
                    </div>
                </div>
            </header>
            <!-- aqui esta el menu para agregar y modificar -->
            <div class="topnav">
                    <div class="container-fluid">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">
    
                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">

                                    <li class="nav-item">
                                        <a class="nav-link" href="<?=base_url('home')?>">
                                            <i class="ri-dashboard-line mr-2"></i> Dashboard
                                        </a>
                                    </li>
    
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-pencil-ruler-2-line mr-2"></i>Campañas <div class="arrow-down"></div>
                                        </a>

                                        <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                                            aria-labelledby="topnav-uielement">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div>
                                                        <a href="<?=base_url('Main/home')?>" class="dropdown-item">Mantenimiento</a>
                                                        <!-- <a href="ui-buttons.html" class="dropdown-item">Buttons</a>
                                                        <a href="ui-cards.html" class="dropdown-item">Cards</a>
                                                        <a href="ui-carousel.html" class="dropdown-item">Carousel</a>
                                                        <a href="ui-dropdowns.html" class="dropdown-item">Dropdowns</a>
                                                        <a href="ui-grid.html" class="dropdown-item">Grid</a>
                                                        <a href="ui-images.html" class="dropdown-item">Images</a> -->
                                                    </div>
                                                </div>
                                     
                                            </div>

                                        </div>
                                    </li>
    
                                  
    
                                </ul>
                            </div>
                        </nav>
                    </div>
            </div>
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
