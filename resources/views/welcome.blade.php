<!doctype html>
<html lang="es" style="--scrollbar-width:17px; --moz-scrollbar-thin:17px; font-size: 0.83rem;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <base href="../">

    <title>Sistema Llantimax</title>

    <!-- include common vendor stylesheets & fontawesome -->
    <link rel="stylesheet" type="text/css" href="\npm\bootstrap@4.6.0\dist\css\bootstrap.min.css">

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

                    <a class="navbar-brand text-white" href="#">
                        <i class="fa fa-leaf"></i>
                        <span>Ace</span>
                        <span>App</span>
                    </a><!-- /.navbar-brand -->

                    <button type="button" class="btn btn-burger mr-2 d-none d-xl-flex" data-toggle="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="true" aria-label="Toggle sidebar">
                        <span class="bars"></span>
                    </button><!-- sidebar toggler button -->

                </div><!-- /.navbar-intro -->

                <!-- mobile #navbarMenu toggler button -->
                <button class="navbar-toggler ml-1 mr-2 px-1" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navbar menu">
                    <span class="pos-rel">
                        <img class="border-2 brc-white-tp1 radius-round" width="36" src="..\assets\image\avatar\avatar6.jpg" alt="Jason's Photo">
                        <span class="bgc-warning radius-round border-2 brc-white p-1 position-tr mr-n1px mt-n1px"></span>
                    </span>
                </button>


                <div class="navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu">

                    <div class="navbar-nav">
                        <ul class="nav">

                            <li class="nav-item dropdown order-first order-lg-last">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <img id="id-navbar-user-image" class="d-none d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2 w-6" src="..\assets\image\avatar\avatar6.jpg" alt="Jason's Photo">
                                    <span class="d-inline-block d-lg-none d-xl-inline-block">
                                        <span class="text-90" id="id-user-welcome">Welcome,</span>
                                        <span class="nav-user-name"><?php echo Session::get('nombre_completo'); ?></span>
                                    </span>

                                    <i class="caret fa fa-angle-down d-none d-xl-block"></i>
                                    <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                                </a>

                                <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3 py-1">
                                    <div class="d-none d-lg-block d-xl-none">
                                        <div class="dropdown-header">
                                            Welcome, <?php echo Session::get('nombre_completo'); ?>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    </div>


                                    <?php
                                    echo'<button class="mt-1 dropdown-item btn btn-outline-grey bgc-h-primary-l3 btn-h-light-primary btn-a-light-primary"  data-toggle="modal" data-target="#edit" data-id="'.Session::get("id_usuario").'" data-name="'.Session::get("nombre_completo").'" data-correo="'.Session::get("correo_electronico").'" data-contrasenia="'.Session::get("contrasenia").'" >
                                        <i class="fa fa-user text-primary-m1 text-105 mr-1"></i>
                                        Perfil
                                    </button>';
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

                            <li class="nav-item active">

                                <a href="/principal" class="nav-link">
                                    <i class="nav-icon fa fa-tachometer-alt"></i>
                                    <span class="nav-text fadeable">
                                        <span>Principal</span>
                                    </span>
                                </a>

                                <b class="sub-arrow"></b>

                            </li>


                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fa fa-cube"></i>
                                    <span class="nav-text fadeable">
                                        <span>Productos</span>
                                    </span>

                                    <b class="caret fa fa-angle-left rt-n90"></b>

                                    <!-- or you can use custom icons. first add `d-style` to 'A' -->
                                    <!--
               	 	<b class="caret d-n-collapsed fa fa-minus text-80"></b>
               	 	<b class="caret d-collapsed fa fa-plus text-80"></b>
               	 -->
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

                                    <!-- or you can use custom icons. first add `d-style` to 'A' -->
                                    <!--
               	 	<b class="caret d-n-collapsed fa fa-minus text-80"></b>
               	 	<b class="caret d-collapsed fa fa-plus text-80"></b>
               	 -->
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
                                            <a href="/mostrar_creditos" class="nav-link">
                                                <span class="nav-text">
                                                    <span>Mostrar creditos</span>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <b class="sub-arrow"></b>

                            </li>


                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fa fa-table"></i>
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
                                            <a href="/mostrar_catalogo" class="nav-link">
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
                                    <i class="nav-icon fa fa-edit"></i>
                                    <span class="nav-text fadeable">
                                        <span>Ventas</span>
                                    </span>

                                    <b class="caret fa fa-angle-left rt-n90"></b>

                                    <!-- or you can use custom icons. first add `d-style` to 'A' -->
                                    <!--
               	 	<b class="caret d-n-collapsed fa fa-minus text-80"></b>
               	 	<b class="caret d-collapsed fa fa-plus text-80"></b>
               	 -->
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
                                    <i class="nav-icon far fa-window-restore"></i>
                                    <span class="nav-text fadeable">
                                        <span>Reportes</span>
                                    </span>
                                </a>
                                <b class="sub-arrow"></b>
                            </li>

                            <!--<li class="nav-item">

                                <a href="gallery.html" class="nav-link">
                                    <i class="nav-icon far fa-image"></i>
                                    <span class="nav-text fadeable">
                                        <span>Gallery</span>
                                    </span>
                                </a>
                                <b class="sub-arrow"></b>
                            </li>-->

                            <li class="nav-item">

                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                    <i class="nav-icon fa fa-tag"></i>
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
                            </li>



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

    <!--MODAL ACTUALIZAR USUARIO -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#2470bd;">
                    <h5 class="modal-title" id="exampleModalLabel2" style="color:white">
                        Actualizar usuario
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="card acard mt-2 mt-lg-3">
                            <div class="card-body px-3 pb-1">

                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                        <label for="id-form-field-1" class="mb-0">
                                            Nombre del usuario
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control col-sm-8 col-md-10" id="update_id_usuario" name="update_id_usuario">
                                        <input type="text" class="form-control col-sm-8 col-md-10" id="update_nombre" name="update_nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                        <label for="id-form-field-1" class="mb-0">
                                            Correo electronico
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control col-sm-8 col-md-10" id="update_correo" name="update_correo">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                        <label for="id-form-field-1" class="mb-0">
                                            Contraseña
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control col-sm-8 col-md-10" id="update_contrasenia" name="update_contrasenia">
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="align-content:center;">
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
    </div>
    <!--FIN MODAL ACTUALIZAR USUARIO-->


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
    <script>
        jQuery(function($) {

            // show tooltips only when not touchscreen
            if (!('ontouchstart' in window)) $('[data-toggle="tooltip"]').tooltip({
                container: 'body'
            })


            // display the message only 2 times
            var displayed = parseInt(localStorage.getItem('welcome.classic.ace') || '0');
            if (displayed < 2) {
                localStorage.setItem('welcome.classic.ace', displayed + 1)

                $.aceToaster.add({
                    placement: 'tc',
                    body: "<div class='py-2 pl-1 pr-3 d-flex '>\
                  <span class='d-inline-block mr-2 text-center py-3 px-1'>\
                    <i class='pos-abs fa fa-leaf fa-2x w-6 text-dark-m3 mt-2px'></i>\
                    <i class='pos-rel fa fa-leaf fa-2x w-6 text-success-m3 mr-1'></i>\
                  </span>\
                  <div>\
                    <h3 class='text-125 text-success'>Welcome to Ace!</h3>\
                    <p class='mb-1'>A lightweight, feature-rich, customizable and easy to use admin template!</p>\
                  </div>\
                  <button data-dismiss='toast' class='btn btn-sm btn-brc-tp btn-lighter-grey btn-h-lighter-danger btn-a-lighter-danger radius-round position-tr mt-1 mr-2px'>\
                    <i class='fa fa-times px-1px'></i>\
                  </button>\
                </div>",

                    width: 500,
                    delay: 10,
                    //sticky: true,

                    progress: 'position-tl bgc-success-tp1 pt-3px',
                    progressReverse: true,

                    close: false,
                    //belowNav: true,

                    className: 'bgc-white overflow-hidden border-0 p-0 radius-0',

                    bodyClass: 'border-1 border-t-0 brc-secondary-l2 text-dark-tp3 text-120 p-2',
                    headerClass: 'd-none'
                })
            }


            //////////////////////////////////////////////////
            // Sortable task list
            Sortable.create(document.getElementById('tasks'), {
                draggable: ".task-item",
                filter: "label.checkbox",
                preventOnFilter: false,
                animation: 200,

                ghostClass: "bgc-yellow-l1", // Class name for the drop placeholder
                chosenClass: "", // Class name for the chosen item
                dragClass: "", // Class name for the dragging item
            })

            // toggle tasks checkbox on/off
            $('#tasks input[type=checkbox]').on('change', function() {
                $(this).closest('#tasks > div').toggleClass('bgc-secondary-l4', this.checked).find('label').toggleClass('line-through text-grey-d2', this.checked);
            })



            //////////////////////////////////////////////////
            //draw charts


            // make sure no animation is displayed according to user preferences
            var _animate = !AceApp.Util.isReducedMotion()


            // Traffic Sources piechart
            var trafficSourceCanvas = document.getElementById('traffic-source-chart');

            var trafficSourcePieChart = new Chart(trafficSourceCanvas, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        label: 'Traffic Sources',
                        data: [40.7, 27.5, 9.3, 19.6, 4.9],
                        backgroundColor: [
                            "#4ca5ae",
                            "#f18e5d",
                            "#ea789d",
                            "#22c1e4",
                            "#e2e3e4"
                        ],
                    }],
                    labels: [
                        'Social Networks',
                        'Search Engines',
                        'Ad Campaings',
                        'Direct Traffic',
                        'Other'
                    ]
                },

                options: {
                    responsive: true,

                    cutoutPercentage: 70,
                    legend: {
                        display: false
                    },
                    animation: {
                        animateRotate: true,
                        duration: _animate ? 1000 : false
                    },
                    tooltips: {
                        enabled: true,
                        cornerRadius: 0,
                        bodyFontColor: '#fff',
                        bodyFontSize: 14,
                        fontStyle: 'bold',

                        backgroundColor: 'rgba(34, 34, 34, 0.73)',
                        borderWidth: 0,

                        caretSize: 5,

                        xPadding: 12,
                        yPadding: 12,

                        callbacks: {
                            label: function(tooltipItem, data) {
                                return ' ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] + '%'
                            }
                        }
                    }
                }
            })

            // place the legends
            $(trafficSourceCanvas)
                .parent().after("<div id='traffic-source-legends' class='piechart-legends text-95 text-secondary-d3'>" + trafficSourcePieChart.generateLegend() + "</div>")



            ////////////////////////////
            // the sales stats chart
            var salesChart = document.getElementById("saleschart")
            if (salesChart.parentNode.offsetWidth < 600) {
                salesChart.height = 180
            }

            var salesChartCtx = salesChart.getContext("2d")

            /*** Background Gradient ***/
            var gradient1 = salesChartCtx.createLinearGradient(0, 0, 0, 400)
            gradient1.addColorStop(0, 'rgba(114,193,224, 0.2)')
            gradient1.addColorStop(1, 'rgba(114,193,224, 0)')

            var gradient2 = salesChartCtx.createLinearGradient(0, 0, 0, 300)
            gradient2.addColorStop(0, 'rgba(138,200,138, 0.45)')
            gradient2.addColorStop(1, 'rgba(138,200,138, 0)')

            var gradients = [gradient1, gradient2]

            var chartOptions1 = {
                lineTension: 0.3,
                borderWidth: 1.5,
                pointRadius: 0
            }

            new Chart(salesChartCtx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                            label: "In-store",
                            data: [3200, 1500, 3500, 2500, 3200, 7000, 2300, 3500, 3500, 6000, 6200, 8100],

                            borderColor: '#72c1e0',
                            pointBorderColor: '#72c1e0',

                            fill: true,
                            backgroundColor: gradients[0],
                            pointBackgroundColor: '#fff',

                            borderWidth: chartOptions1.borderWidth,
                            pointRadius: chartOptions1.pointRadius,
                            lineTension: chartOptions1.lineTension,
                        },
                        {
                            label: "Online",
                            data: [2500, 4200, 3000, 4000, 5500, 4800, 4600, 5900, 5800, 8900, 8200, 9000],

                            borderColor: '#8ac88a',
                            pointBorderColor: '#8ac88a',

                            fill: true,
                            backgroundColor: gradients[1],
                            pointBackgroundColor: '#fff',

                            borderWidth: chartOptions1.borderWidth,
                            pointRadius: chartOptions1.pointRadius,
                            lineTension: chartOptions1.lineTension,
                        }
                    ]
                },

                options: {
                    responsive: true,
                    animation: {
                        duration: _animate ? 1000 : false
                    },

                    datasetStrokeWidth: 3,
                    pointDotStrokeWidth: 4,

                    tooltips: {
                        enabled: true,
                        cornerRadius: 0,

                        titleFontColor: 'rgba(0, 0, 0, 0.8)',
                        titleFontSize: 16,
                        titleFontStyle: 'normal',
                        titleFontFamily: 'Open Sans',


                        bodyFontColor: 'rgba(0, 0, 0, 0.8)',
                        bodyFontSize: 14,
                        bodyFontFamily: 'Open Sans',

                        backgroundColor: 'rgba(255, 255, 255, 0.73)',
                        borderWidth: 2,
                        borderColor: 'rgba(254, 224, 116, 0.73)',

                        caretSize: 5,

                        xPadding: 12,
                        yPadding: 12,
                    },

                    scales: {
                        yAxes: [{
                            ticks: {
                                fontFamily: "Open Sans",
                                fontColor: "#a0a4a9",
                                fontStyle: "600",
                                fontSize: 12,
                                beginAtZero: false,
                                maxTicksLimit: 6,
                                padding: 16,
                                callback: function(value, index, values) {
                                    var val = parseInt(value / 1000);
                                    return val > 0 ? val + 'k' : val;
                                }
                            },
                            gridLines: {
                                drawTicks: false,
                                display: false
                            }
                        }],

                        xAxes: [{
                            gridLines: {
                                zeroLineColor: "transparent",
                                display: true,
                                borderDash: [2, 3],
                                tickMarkLength: 3
                            },
                            ticks: {
                                fontFamily: "Open Sans",
                                fontColor: "#808489",
                                fontSize: 13,
                                fontStyle: "400",
                                padding: 12
                            }
                        }]
                    },

                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            })



            ///////////
            // the Page views chart in infoboxes
            $('canvas.infobox-line-chart').each(function() {
                var ctx = this.getContext('2d');
                var gradientbg = ctx.createLinearGradient(0, 0, 0, 50);
                gradientbg.addColorStop(0, 'rgba(109, 187, 109, 0.25)');
                gradientbg.addColorStop(1, 'rgba(109, 187, 109, 0.05)');

                let data = $(this).data('values');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                                data: data,
                                backgroundColor: gradientbg,
                                hoverBackgroundColor: '#70bcd9',
                                fill: true,

                                borderColor: 'rgba(109, 187, 109, 0.8)',

                                borderWidth: 2.25,
                                pointRadius: 7,
                                lineTension: 0.4,

                                pointBackgroundColor: 'transparent',
                                pointBorderColor: 'transparent',

                                pointHoverBackgroundColor: 'rgba(109, 187, 109, 0.8)',
                                pointHoverBorderColor: 'rgba(109, 187, 109, 0.8)',
                            },
                            {
                                type: 'bar',
                                data: data,
                                backgroundColor: 'transparent',
                                hoverBackgroundColor: 'transparent',
                                fill: false,

                                borderColor: 'transparent',

                                barPercentage: 0.8
                            },
                        ]
                    },

                    options: {

                        responsive: false,
                        animation: {
                            duration: _animate ? 1000 : false
                        },

                        legend: {
                            display: false
                        },
                        layout: {
                            padding: {
                                left: 10,
                                right: 10,
                                top: 0,
                                bottom: -10
                            }
                        },
                        scales: {
                            yAxes: [{
                                stacked: true,
                                ticks: {
                                    display: false,
                                    beginAtZero: true,
                                },
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                }
                            }],

                            xAxes: [{
                                stacked: true,
                                gridLines: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    display: false //this will remove only the label
                                }
                            }, ]
                        }, //scales

                        tooltips: {
                            // Disable the on-canvas tooltip, because canvas area is small and tooltips will be cut (clipped)
                            enabled: false,
                            mode: 'index',

                            //use bootstrap tooltip instead
                            custom: function(tooltipModel) {
                                var title = '';
                                var canvas = this._chart.canvas;

                                if (tooltipModel.body) {
                                    title = tooltipModel.title[0] + ': ' + Number(tooltipModel.body[0].lines[0]).toLocaleString();
                                }
                                canvas.setAttribute('data-original-title', title); //will be used by bootstrap tooltip

                                $(canvas)
                                    .tooltip({
                                        placement: 'bottom',
                                        template: '<div class="tooltip" role="tooltip"><div class="brc-info-d2 arrow"></div><div class="bgc-info-d2 tooltip-inner text-600 text-110"></div></div>'
                                    })
                                    .tooltip('show')
                                    .on('hidden.bs.tooltip', function() {
                                        canvas.setAttribute('data-original-title', ''); //so that when mouse is back over canvas's blank area, no tooltip is shown
                                    });

                            }
                        } // tooltips

                    }
                })
            })


            // infobox's circular progress bar
            $('canvas.infobox-progress-chart').each(function() {
                var color = $(this).css('color')

                new Chart(this.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        datasets: [{
                            data: [$(this).data('percent'), 100 - $(this).data('percent')],
                            backgroundColor: [
                                color,
                                "#e3e5ea"
                            ],
                            hoverBackgroundColor: [
                                color,
                                "#e3e5ea"
                            ],
                            borderWidth: 0
                        }]
                    },

                    options: {
                        responsive: false,
                        cutoutPercentage: 80,
                        legend: {
                            display: false
                        },
                        animation: {
                            duration: _animate ? 500 : false,
                            easing: 'easeInCubic'
                        },
                        tooltips: {
                            enabled: false,
                        }
                    }
                })
            })


        })


        // Update conversation's max-height according to available space
        var updateScrollAreaHeight = function() {
            var _scroller = document.querySelector('#conversations [class*="ace-scroll"]')
            _scroller.style.display = 'none'
            if (_scroller) _scroller.style.maxHeight = (Math.max(320, _scroller.parentNode.clientHeight)) + 'px'
            _scroller.style.display = ''
        }
        window.addEventListener('load', updateScrollAreaHeight)
        window.addEventListener('resize', updateScrollAreaHeight)

    </script>
    @yield('scripts')
</body>

</html>
