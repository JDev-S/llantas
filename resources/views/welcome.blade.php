<!doctype html>
<html lang="es" style="--scrollbar-width:17px; --moz-scrollbar-thin:17px; font-size: 0.83rem;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <base href="../">

    <title>Sistema Llantimax</title>

    <!-- include common vendor stylesheets & fontawesome -->
    <link rel="stylesheet" type="text/css" href="\npm\bootstrap@4.6.0\dist\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
    <link rel="stylesheet" type="text/css" href="\npm\@fortawesome\fontawesome-free@5.15.3\css\fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="\npm\@fortawesome\fontawesome-free@5.15.3\css\regular.min.css">
    <link rel="stylesheet" type="text/css" href="\npm\@fortawesome\fontawesome-free@5.15.3\css\brands.min.css">
    <link rel="stylesheet" type="text/css" href="\npm\@fortawesome\fontawesome-free@5.15.3\css\solid.min.css">

    <!-- include vendor stylesheets used in "Dashboard" page. see "/views//pages/partials/dashboard/@vendor-stylesheets.hbs" -->
    <!-- include fonts -->
    <link rel="stylesheet" type="text/css" href="css.css?family=Open+Sans:300,400,600&display=swap">

    <!-- ace.css -->
    <link rel="stylesheet" type="text/css" href="\dist\css\ace.min.css">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="\assets\favicon.png">

    <!-- "Dashboard" page styles, specific to this page for demo only -->
    <style>
        .piechart-legends ul {
            list-style: none;
            margin-left: 1.5rem;
            padding-left: 0;
        }

        .piechart-legends li {
            margin-bottom: 0.25rem;
            white-space: nowrap;
        }

        .piechart-legends span {
            display: inline-block;
            vertical-align: middle;
            border-radius: 1rem;
            width: 0.5rem;
            height: 0.5rem;
            margin-right: 0.5rem;
        }

        .piechart-legends-info li {
            margin-bottom: 0.25rem;
            white-space: nowrap;
        }


        .rtl .piechart-legends ul {
            list-style: none;
            margin-left: 0;
            margin-right: 1.5rem;
            padding-right: 0;
        }

        .rtl .piechart-legends span {
            margin-left: 0.5rem;
            margin-right: 0;
        }

    </style>
    @yield('styles')
</head>

<body>
    <div class="body-container">
        <nav class="navbar navbar-expand-lg navbar-fixed navbar-blue">
            <div class="navbar-inner">

                <div class="navbar-intro justify-content-xl-between">

                    <button type="button" class="btn btn-burger burger-arrowed static collapsed ml-2 d-flex d-xl-none" data-toggle-mobile="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
                        <span class="bars"></span>
                    </button><!-- mobile sidebar toggler button -->

                    <a class="navbar-brand text-white" href="/principal">
                        <i class="fas fa-car"></i>

                        <span>Llantimax</span>
                    </a><!-- /.navbar-brand -->

                    <button type="button" class="btn btn-burger mr-2 d-none d-xl-flex" data-toggle="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="true" aria-label="Toggle sidebar">
                        <span class="bars"></span>
                    </button><!-- sidebar toggler button -->

                </div><!-- /.navbar-intro -->

                <!-- mobile #navbarMenu toggler button -->
                <button class="navbar-toggler ml-1 mr-2 px-1" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navbar menu">
                    <span class="pos-rel">
                        <img class="border-2 brc-white-tp1 radius-round" width="36" src="..\assets\image\avatar\user_llantimax.png" alt="Jason's Photo">
                        <span class="bgc-warning radius-round border-2 brc-white p-1 position-tr mr-n1px mt-n1px"></span>
                    </span>
                </button>


                <div class="navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu">

                    <div class="navbar-nav">
                        <ul class="nav">

                            <li class="nav-item dropdown order-first order-lg-last">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img id="id-navbar-user-image" class="d-none d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2 w-6" src="..\assets\image\avatar\user_llantimax.png" alt="Jason's Photo">
                                    <span class="d-inline-block d-lg-none d-xl-inline-block">
                                        <span class="text-90" id="id-user-welcome">Bienvenido,</span>
                                        <span class="nav-user-name"><?php echo Session::get('nombre_completo'); ?></span>
                                    </span>

                                    <i class="caret fa fa-angle-down d-none d-xl-block"></i>
                                    <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                                </a>

                                <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3 py-1">
                                    <div class="d-none d-lg-block d-xl-none">
                                        <div class="dropdown-header">
                                            Bienvenido, <?php echo Session::get('nombre_completo'); ?>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>

                                    <div class="dropdown-divider brc-primary-l2"></div>
                                    <?php
                                    echo'<a class="dropdown-item btn btn-outline-grey bgc-h-secondary-l3 btn-h-light-secondary btn-a-light-secondary"  data-toggle="modal" data-target="#edit" data-id="'.Session::get("id_usuario").'" data-name="'.Session::get("nombre_completo").'" data-correo="'.Session::get("correo_electronico").'" data-contrasenia="'.Session::get("contrasenia").'" >
                                        <i class="fa fa-user text-primary-m1 text-105 mr-1"></i>
                                        Perfil
                                    </a>';
                                    ?>
                                    <div class="dropdown-divider brc-primary-l2"></div>

                                    <a class="dropdown-item btn btn-outline-grey bgc-h-secondary-l3 btn-h-light-secondary btn-a-light-secondary" href="/cerrar_sesion">
                                        <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i>
                                        Cerrar sesión
                                    </a>
                                </div>
                            </li><!-- /.nav-item:last -->

                        </ul><!-- /.navbar-nav menu -->
                    </div><!-- /.navbar-nav -->

                </div><!-- /#navbarMenu -->
            </div><!-- /.navbar-inner -->
        </nav>
        <div class="main-container bgc-white">

            <div id="sidebar" class="sidebar sidebar-fixed expandable sidebar-light">
                <div class="sidebar-inner">

                    <div class="ace-scroll flex-grow-1" data-ace-scroll="{}">



                        <ul class="nav has-active-border active-on-right">
                            <?php 
                            if(Session::get('rol_usuario')==1)
                            {
                                                            
                            echo'

                            <li class="nav-item">

                                <a href="/principal" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <span class="nav-text fadeable">
                                        <span>Principal</span>
                                    </span>
                                </a>

                                <b class="sub-arrow"></b>

                            </li>


                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fas fa-cube"></i>
                                    <span class="nav-text fadeable">
                                        <span>Productos</span>
                                    </span>

                                    <b class="caret fa fa-angle-left rt-n90"></b>

                                   
                                </a>

                                <div class="hideable submenu collapse">
                                    <ul class="submenu-inner">
                                        <li class="nav-item">
                                            <a href="/mostrar_llantas" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar llantas</span>
                                                </span>
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="/mostrar_baterias" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar Baterias</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/mostrar_refacciones" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar Refacciones</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/mostrar_servicios" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar servicios</span>
                                                </span>
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="/mostrar_inventario" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar inventario</span>
                                                </span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                                <b class="sub-arrow"></b>

                            </li>


                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fa fa-desktop"></i>
                                    <span class="nav-text fadeable">
                                        <span>Administración</span>
                                    </span>

                                    <b class="caret fa fa-angle-left rt-n90"></b>

                                   
                                </a>

                                <div class="hideable submenu collapse">
                                    <ul class="submenu-inner">
                                        <li class="nav-item">
                                            <a href="/mostrar_clientes" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar clientes</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/mostrar_proveedores" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar proveedores</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/agregar_catalogo" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Proveedor catalogo</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/mostrar_creditos" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar créditos</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <b class="sub-arrow"></b>
                            </li>


                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fas fa-shipping-fast"></i>
                                    <span class="nav-text fadeable">
                                        <span>Compras a proveedor</span>
                                    </span>
                                    <b class="caret fa fa-angle-left rt-n90"></b>
                                </a>

                                <div class="hideable submenu collapse">
                                    <ul class="submenu-inner">
                                        <li class="nav-item">
                                            <a href="/mostrar_pedido_proveedor" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Pedidos proveedores</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/pedido_proveedor" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Generar pedido</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fas fa-cash-register"></i>
                                    <span class="nav-text fadeable">
                                        <span>Ventas</span>
                                    </span>

                                    <b class="caret fa fa-angle-left rt-n90"></b>

                                </a>

                                <div class="hideable submenu collapse">
                                    <ul class="submenu-inner">
                                        <li class="nav-item">
                                            <a href="/mostrar_venta" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar ventas</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/agregar_venta" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Agregar venta</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item">
                                <a href="/mostrar_reportes" class="nav-link">
                                    <i class="nav-icon fas fa-file-pdf"></i>
                                    <span class="nav-text fadeable">
                                        <span>Reportes</span>
                                    </span>
                                </a>
                                <b class="sub-arrow"></b>
                            </li>

                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fa fa-people-carry"></i>
                                    <span class="nav-text fadeable">
                                        <span>Pedidos sucursales</span>
                                    </span>

                                    <b class="caret fa fa-angle-left rt-n90"></b>
                                </a>

                                <div class="hideable submenu collapse">
                                    <ul class="submenu-inner">
                                        <li class="nav-item">
                                            <a href="/mostrar_pedido_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar pedidos</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/mostrar_pedido_solicitado" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Pedidos solicitados</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/pedido_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Generar pedido</span>
                                                </span>
                                            </a>
                                        </li>
                            
                                    </ul>
                                </div>
                                <b class="sub-arrow"></b>
                            </li>';
                            }
                            else
                            {
                                                            
                            echo'

                            <li class="nav-item">

                                <a href="/principal_sucursal" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <span class="nav-text fadeable">
                                        <span>Principal</span>
                                    </span>
                                </a>

                                <b class="sub-arrow"></b>

                            </li>


                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fas fa-cube"></i>
                                    <span class="nav-text fadeable">
                                        <span>Productos</span>
                                    </span>

                                    <b class="caret fa fa-angle-left rt-n90"></b>

                                
                                </a>

                                <div class="hideable submenu collapse">
                                    <ul class="submenu-inner">
                                        <li class="nav-item">
                                            <a href="/mostrar_llantas_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar llantas</span>
                                                </span>
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="/mostrar_baterias_sucursales" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar Baterias</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/mostrar_refacciones_sucursales" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar Refacciones</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/mostrar_servicios_sucursales" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar servicios</span>
                                                </span>
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a href="/mostrar_inventarios_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar inventario</span>
                                                </span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                                <b class="sub-arrow"></b>

                            </li>


                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fa fa-desktop"></i>
                                    <span class="nav-text fadeable">
                                        <span>Administración</span>
                                    </span>

                                    <b class="caret fa fa-angle-left rt-n90"></b>

                                   
                                </a>

                                <div class="hideable submenu collapse">
                                    <ul class="submenu-inner">
                                        <li class="nav-item">
                                            <a href="/mostrar_clientes_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar clientes</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/mostrar_proveedor_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar proveedores</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/agregar_catalogo_sucursales" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Proveedor catalogo</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/mostrar_creditos_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar créditos</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <b class="sub-arrow"></b>
                            </li>


                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fas fa-shipping-fast"></i>
                                    <span class="nav-text fadeable">
                                        <span>Compras a proveedor</span>
                                    </span>
                                    <b class="caret fa fa-angle-left rt-n90"></b>
                                </a>

                                <div class="hideable submenu collapse">
                                    <ul class="submenu-inner">
                                        <li class="nav-item">
                                            <a href="/mostrar_pedido_proveedor_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Pedidos proveedores</span>
                                                </span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="/mostrar_catalogo_proveedores_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Generar pedido</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fas fa-cash-register"></i>
                                    <span class="nav-text fadeable">
                                        <span>Ventas</span>
                                    </span>

                                    <b class="caret fa fa-angle-left rt-n90"></b>

                                </a>

                                <div class="hideable submenu collapse">
                                    <ul class="submenu-inner">
                                        <li class="nav-item">
                                            <a href="/mostrar_ventas_realizadas_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar ventas</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/agregar_venta_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Agregar venta</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item">
                                <a href="/mostrar_reportes_sucursal" class="nav-link">
                                    <i class="nav-icon fas fa-file-pdf"></i>
                                    <span class="nav-text fadeable">
                                        <span>Reportes</span>
                                    </span>
                                </a>
                                <b class="sub-arrow"></b>
                            </li>

                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fa fa-people-carry"></i>
                                    <span class="nav-text fadeable">
                                        <span>Pedidos sucursales</span>
                                    </span>

                                    <b class="caret fa fa-angle-left rt-n90"></b>
                                </a>

                                <div class="hideable submenu collapse">
                                    <ul class="submenu-inner">
                                        <li class="nav-item">
                                            <a href="/mostrar_pedidos_sucursales_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar pedidos</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/mostrar_pedidos_solicitados_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Pedidos solicitados</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/pedido_sucursal_sucursal" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Generar pedido</span>
                                                </span>
                                            </a>
                                        </li>
                            
                                    </ul>
                                </div>
                                <b class="sub-arrow"></b>
                            </li>';
                            }
                            ?>
                        </ul>

                    </div><!-- /.sidebar scroll -->

                </div>
            </div>

            <div role="main" class="main-content">

                @yield('contenido')

                <footer class="footer d-none d-sm-block">
                    <div class="footer-inner bgc-white-tp1">
                        <div class="pt-3 border-none border-t-3 brc-grey-l2 border-double">
                            <span class="text-primary-m1 font-bolder text-120"><a href="https://jdevs.com.mx/" target="_blank">JDev-S</a></span>
                            <span class="text-grey">Llantimax &copy; <?php $hoy = getdate();   
                                   echo $hoy['year'];
                                  ?></span>


                            <span class="mx-3 action-buttons">
                                <a href="#" class="text-blue-m2 text-150"><i class="fab fa-twitter-square"></i></a>
                                <a href="#" class="text-blue-d2 text-150"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="text-orange-d1 text-150"><i class="fa fa-rss-square"></i></a>
                            </span>
                        </div>
                    </div><!-- .footer-inner -->

                    <!-- `scroll to top` button inside footer (for example when in boxed layout) -->
                    <div class="footer-tools">
                        <a href="#" class="btn-scroll-up btn btn-dark mb-2 mr-2">
                            <i class="fa fa-angle-double-up mx-2px text-95"></i>
                        </a>
                    </div>
                </footer>

                <!-- footer toolbox for mobile view -->
                <!--<footer class="d-sm-none footer footer-sm footer-fixed">
                    <div class="footer-inner">
                        <div class="btn-group d-flex h-100 mx-2 border-x-1 border-t-2 brc-primary-m3 bgc-white-tp1 radius-t-1 shadow">
                            <button class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0" data-toggle="modal" data-target="#id-ace-settings-modal">
                                <i class="fas fa-sliders-h text-blue-m1 text-120"></i>
                            </button>

                            <button class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0">
                                <i class="fa fa-plus-circle text-green-m1 text-120"></i>
                            </button>

                            <button class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0" data-toggle="collapse" data-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle navbar search">
                                <i class="fa fa-search text-orange text-120"></i>
                            </button>

                            <button class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0 mr-0">
                                <span class="pos-rel">
                                    <i class="fa fa-bell text-purple-m1 text-120"></i>
                                    <span class="badge badge-dot bgc-red position-tr mt-n1 mr-n2px"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </footer>-->
            </div>


        </div>
    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#2470bd;">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Actualizar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                        <!--<form id="actualizar_servicio_form">-->
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Nombre del usuario</label>
                                <input type="hidden" class="form-control col-sm-8 col-md-10" id="update_id_usuario" name="update_id_usuario">
                                <input type="text" class="form-control" id="update_nombre" name="update_nombre" placeholder="Nombre del servicio" required>
                            </div>
                        </div>

                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Correo eléctronico</label>

                                <input type="email" class="form-control" id="update_correo" name="update_correo" placeholder="Correo eléctronico" required>
                            </div>
                        </div>


                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Contraseña</label>

                                <input type="password" class="form-control" id="update_contrasenia" name="update_contrasenia" placeholder="Contraseña" required>
                            </div>
                        </div>


                        <!--</form>-->
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" class="btn btn-primary" onclick="actualizar_usuario();">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- include common vendor scripts used in demo pages -->
    <script src="\npm\jquery@3.6.0\dist\jquery.min.js"></script>
    <script src="\npm\popper.js@1.16.1\dist\umd\popper.min.js"></script>
    <script src="\npm\bootstrap@4.6.0\dist\js\bootstrap.min.js"></script>


    <!-- include vendor scripts used in "Dashboard" page. see "/views//pages/partials/dashboard/@vendor-scripts.hbs" -->
    <script src="\npm\chart.js@2.9.4\dist\Chart.min.js"></script>


    <script src="\npm\sortablejs@1.13.0\Sortable.min.js"></script>


    <!-- include ace.js -->
    <script src="\dist\js\ace.min.js"></script>



    <!-- demo.js is only for Ace's demo and you shouldn't use it -->
    <script src="\app\browser\demo.min.js"></script>

    <script type="text/javascript">
        $('#edit').on('show.bs.modal', function(event) {
            /RECUPERAR METADATOS DEL BOTÓN/
            var button = $(event.relatedTarget)
            var id_usuario = button.data('id')
            var nombre_usuario = button.data('name')
            var correo = button.data('correo')
            var contrasenia = button.data('contrasenia')
            /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
            var modal = $(this)
            modal.find('#update_id_usuario').val(id_usuario)
            modal.find('#update_nombre').val(nombre_usuario)
            modal.find('#update_correo').val(correo)
            modal.find('#update_contrasenia').val(contrasenia)
        });

    </script>

    <script type="text/javascript">
        function actualizar_usuario() {
            var update_id_usuario = document.getElementById("update_id_usuario").value;
            var update_nombre = document.getElementById("update_nombre").value;
            var update_correo = document.getElementById("update_correo").value;
            var update_contrasenia = document.getElementById("update_contrasenia").value;

            var token = '{{csrf_token()}}';
            var data = {
                update_id_usuario: update_id_usuario,
                update_nombre: update_nombre,
                update_correo: update_correo,
                update_contrasenia: update_contrasenia,
                _token: token
            };

            $.ajax({
                type: "POST",
                url: "/actualizar_usuario",
                data: data,
                success: function(msg) {
                    location.href = "/"
                }
            });
        }

    </script>

    @yield('scripts')
</body>

</html>
