@extends('welcome')
@section('contenido')
<div class="page-content container container-plus">
    <!-- page header and toolbox -->
    <div class="page-header pb-2">
        <h1 class="page-title text-primary-d2 text-150">
            <i class="fas fa-home text-dark-l3 mr-1"></i>
            Principal
            <small class="page-info text-secondary-d2 text-nowrap">

                <p class="text-justify"> ¡Bienvenido! Este es el panel principal del sistema.</p>
            </small>
        </h1>
    </div>
    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="row px-3 px-lg-4">
                <div class="col-12">
                    <div class="row h-100 mx-n425">
                        <div class="col-6 col-sm-4 p-0 pos-rel mt-3 mt-sm-0 pt-0 pt-sm-0 text-center cards-container">
                            <div class="h-100 d-flex flex-column mx-2 px-2 py-3">
                                <div class="card border-0 shadow-sm radius-0">
                                    <div class="card-header bgc-primary-d1">
                                        <h5 class="card-title text-white">
                                            PROVEEDORES
                                        </h5>
                                    </div>
                                    <div class="card-body bgc-transparent p-0 border-1 brc-primary-m3 border-t-0">
                                        <i class="fas fa-shipping-fast fa-7x mb-1" style="padding-top:22px"></i>
                                        <?php
                                            $query2 = "select COUNT(*) as proveedores from proveedores ";
                                            $data2=DB::select($query2);  
                                            echo "<p><b>".$data2[0]->proveedores." Registrados</b> </p>";
                                        ?>
                                        <a href="/mostrar_proveedores" class='btn btn-outline-blue radius-round btn-bold px-4 py-1 mb-3 mx-auto'>Ir a ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 p-0 pos-rel mt-3 mt-sm-0 pt-0 pt-sm-0 text-center cards-container">
                            <div class="h-100 d-flex flex-column mx-2 px-2 py-3">
                                <div class="card border-0 shadow-sm radius-0">
                                    <div class="card-header bgc-primary-d1">
                                        <h5 class="card-title text-white">
                                            USUARIOS
                                        </h5>
                                    </div>
                                    <div class="card-body bgc-transparent p-0 border-1 brc-primary-m3 border-t-0">
                                        <i class="fas fa-user-tie fa-fw fa-7x mb-1" style="padding-top:22px"></i>
                                        <?php
                                             $query2 = "SELECT COUNT(*) as usuarios FROM usuario ";
                                            $data2=DB::select($query2);  
                                            echo "<p><b>".$data2[0]->usuarios." Registrados</b> </p>";
                                        ?>
                                        <a href="#" class='btn btn-outline-blue radius-round btn-bold px-4 py-1 mb-3 mx-auto'>Ir a ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 p-0 pos-rel mt-3 mt-sm-0 pt-0 pt-sm-0 text-center cards-container">
                            <div class="h-100 d-flex flex-column mx-2 px-2 py-3">
                                <div class="card border-0 shadow-sm radius-0">
                                    <div class="card-header bgc-primary-d1">
                                        <h5 class="card-title text-white">
                                            CLIENTES
                                        </h5>
                                    </div>
                                    <div class="card-body bgc-transparent p-0 border-1 brc-primary-m3 border-t-0">
                                        <i class="fas fa-child fa-7x mb-1" style="padding-top:22px"></i>
                                        <?php
                                             $query2 = "SELECT COUNT(*) as clientes FROM clientes ";
                                            $data2=DB::select($query2);  
                                            echo "<p><b>".$data2[0]->clientes." Registrados</b> </p>";
                                        ?>
                                        <a href="/mostrar_clientes" class='btn btn-outline-blue radius-round btn-bold px-4 py-1 mb-3 mx-auto'>Ir a ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 p-0 pos-rel mt-3 mt-sm-0 pt-0 pt-sm-0 text-center cards-container">
                            <div class="h-100 d-flex flex-column mx-2 px-2 py-3">
                                <div class="card border-0 shadow-sm radius-0">
                                    <div class="card-header bgc-primary-d1">
                                        <h5 class="card-title text-white">
                                            PRODUCTOS
                                        </h5>
                                    </div>
                                    <div class="card-body bgc-transparent p-0 border-1 brc-primary-m3 border-t-0">
                                        <i class="fas fa-boxes fa-7x mb-1" style="padding-top:22px"></i>
                                        <?php
                                             $query2 = "SELECT COUNT(*) as productos from (SELECT producto.id_producto FROM producto UNION
                                                SELECT productos_independientes.id_producto_independiente FROM productos_independientes) as productos ";
                                            $data2=DB::select($query2);  
                                            echo "<p><b>".$data2[0]->productos." Registrados</b> </p>";
                                        ?>
                                        <a href="/mostrar_inventario" class='btn btn-outline-blue radius-round btn-bold px-4 py-1 mb-3 mx-auto'>Ir a ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 p-0 pos-rel mt-3 mt-sm-0 pt-0 pt-sm-0 text-center cards-container">
                            <div class="h-100 d-flex flex-column mx-2 px-2 py-3">
                                <div class="card border-0 shadow-sm radius-0">
                                    <div class="card-header bgc-primary-d1">
                                        <h5 class="card-title text-white">
                                            VENTAS
                                        </h5>
                                    </div>
                                    <div class="card-body bgc-transparent p-0 border-1 brc-primary-m3 border-t-0">
                                        <i class="fas fa-shipping-fast fa-7x mb-1" style="padding-top:22px"></i>
                                        <div class="mt-2">
                                            <a href="/mostrar_venta" class='btn btn-outline-blue radius-round btn-bold px-4 py-1 mb-3 mx-auto'>Ir a ver</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 p-0 pos-rel mt-3 mt-sm-0 pt-0 pt-sm-0 text-center cards-container">
                            <div class="h-100 d-flex flex-column mx-2 px-2 py-3">
                                <div class="card border-0 shadow-sm radius-0">
                                    <div class="card-header bgc-primary-d1">
                                        <h5 class="card-title text-white">
                                            COMPRAS
                                        </h5>
                                    </div>
                                    <div class="card-body bgc-transparent p-0 border-1 brc-primary-m3 border-t-0">
                                        <i class="fas fa-file-invoice-dollar fa-7x mb-1" style="padding-top:22px"></i>
                                        <div class="mt-2">
                                            <a href="/mostrar_pedido_proveedor" class='btn btn-outline-blue radius-round btn-bold px-4 py-1 mb-3 mx-auto'>Ir a ver</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 p-0 pos-rel mt-3 mt-sm-0 pt-0 pt-sm-0 text-center cards-container">
                            <div class="h-100 d-flex flex-column mx-2 px-2 py-3">
                                <div class="card border-0 shadow-sm radius-0">
                                    <div class="card-header bgc-primary-d1">
                                        <h5 class="card-title text-white">
                                            REPORTES
                                        </h5>
                                    </div>
                                    <div class="card-body bgc-transparent p-0 border-1 brc-primary-m3 border-t-0">
                                        <i class="far fa-file-pdf fa-fw fa-7x mb-1" style="padding-top:22px"></i>
                                        <div class="mt-2">
                                            <a href="/mostrar_reportes" class='btn btn-outline-blue radius-round btn-bold px-4 py-1 mb-3 mx-auto'>Ir a ver</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
