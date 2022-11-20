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
        <link href="<?=base_url('public/assets/css/home.css'); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <!-- js principales -->
        <script src="<?=base_url('public/assets/libs/jquery/jquery.min.js'); ?>"></script>
        <script src="<?=base_url('public/assets/libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
           <!-- Required datatable js -->
        
        <script src="<?=base_url('public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
        <script src="<?=base_url('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js'); ?>"></script>
        <!-- https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js -->
        <link href="<?=base_url('public/assets/libs/sweetalert2/sweetalert2.min.css'); ?>" rel="stylesheet" type="text/css" />
        <script src="https://unpkg.com/sortablejs-make/Sortable.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>
       <!-- twitter-bootstrap-wizard css -->
       <link rel="stylesheet" href="<?=base_url('public/assets/libs/twitter-bootstrap-wizard/prettify.css'); ?>">
		<script src="https://kit.fontawesome.com/bbc732d875.js" crossorigin="anonymous"></script>
    </head>


    
<body data-sidebar="dark">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                          
                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?=base_url('public/images/valtx.png') ?>" alt="" height="20" >
                                </span>
                                <span class="logo-lg">
                                    <img src="<?=base_url('public/images/valtx.png') ?>" alt="" height="60" width="150">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn"  style="color:#fff">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                       
                        
                    </div>

                    <div class="d-flex">

                       
                        <div class="dropdown d-inline-block user-dropdown" >
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#fff">
                                <img class="rounded-circle header-profile-user" src="<?=base_url('public/images/avatar_login.png') ?>"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ml-1" ><?php echo $this->session->userdata('usuario');?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a class="dropdown-item" href=""><i class="ri-user-line align-middle mr-1"></i> Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?=base_url()?>auth/logout"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                           
                            <li>
                                <a href="<?=base_url('home') ?>" class="waves-effect">
                                    <i class=" fas fa-home"></i>
                                    <span>Inicio</span>
                                </a>
                            </li>

                            
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="fas fa-list-alt"></i>
                                    <span>Campañas</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                  
                                    <?php  if($this->session->userdata('idcall') == 2){?>
                                    <li><a href="<?=base_url('Asesor/listCampanias') ?>">Listado Asesor</a></li>
                                    <?php  }else{ ?>
                                    <li><a href="<?=base_url('Main/listCampanias') ?>">Listado</a></li>
                                    <li><a href="<?=base_url('Main/manCampanias') ?>">Mantenimiento</a></li>
                                    <?php  } ?>
                                </ul>
                            </li>
                
                            <li>
                            <li>
                            <?php  if($this->session->userdata('idcall') != 2){?>
                                <a href="apps-chat.html" class=" waves-effect">
                                    <i class="fas fa-users"></i>
                                    <span>Clientes</span>
                                </a>
                            <?php  } ?>
                            </li>

                           

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
    <div class="main-content">
        <input type="hidden" name="" id="base_url" value=<?=base_url()?>>
       
        <div class="page-content">
            <div class="container-fluid">
