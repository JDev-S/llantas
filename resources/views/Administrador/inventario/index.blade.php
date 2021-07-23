@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<style type="text/css">
    .dropdown-toggle::after {
        display: inline-block;
        margin-left: 0.255em;
        vertical-align: 0.255em;
        content: "";
        border-top: 0.3em solid;
        border-right: 0.3em solid transparent;
        border-bottom: 0px;
        border-left: 0.3em solid transparent;
        color: white;
    }

    placeholder.btn-danger,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-danger:active,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-danger:focus,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-danger:hover,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-dark,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-dark:active,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-dark:focus,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-dark:hover,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-info,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-info:active,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-info:focus,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-info:hover,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-primary,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-primary:active,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-primary:focus,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-primary:hover,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-secondary,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-secondary:active,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-secondary:focus,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-secondary:hover,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-success,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-success:active,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-success:focus,
    .bootstrap-select>.dropdown-toggle.bs-placeholder.btn-success:hover {
        color: white;
    }

    .btn-primary {
        background-color: #2470BD;
        border-color: #2470BD;
    }

    .table-responsive {
        max-height: 358px;
    }

</style>
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            <i class="fas fa-th-list text-dark-l3 mr-1"></i>
            Inventario
            <!--<small class="page-info text-secondary-d2">
                <i class="fa fa-angle-double-right text-80"></i>
                extended tables plugin
            </small>-->
        </h1>
    </div>


    <div class="card bcard">
        <div class="card-body p-0 border-x-1 border-b-1 brc-default-m4 radius-0 overflow-hidden">
            <div id="table-toolbar">
                <style>
                    / * Define a class named .thead-blue pattern * / .table .thead-blue th {
                        color: #fff;
                        background-color: #3195f1;
                        border-color: #0d7adf;
                    }

                </style>
                <!----- BOTON DE AGREGAR--->
                <button class="text-blue " data-target="#modalNuevo" data-toggle="modal" type="button" style="margin-right:20px; border:0px;"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></button>
            </div>
            <table class="table text-dark-m2 text-95 bgc-white ml-n1px" id="table">
                <!-- table -->
            </table>
        </div>
    </div>
</div>


<!--MODAL MOSTRAR LLANTA -->
<div class="modal fade" id="modalLlanta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Detalles de la llanta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codigo_llanta">Código de llanta</label>
                                <input type="text" class="form-control" id="nombre_llanta" disabled name="nombre_llanta">
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca</label>

                                <input type="text" class="form-control" disabled id="marca" name="marca">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pos-rel d-style my-3 radius-1 shadow-sm overflow-hidden bgc-brown-m3" id="foto_llanta" name="foto_llanta">

                                <div class="v-hover position-center h-100 w-100 bgc-dark-grad" style="pointer-events: none;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="rin">Rin</label>
                            <input type="text" class="form-control" id="numero_rin" name="numero_rin" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="medida">Medida</label>
                            <input type="text" class="form-control" id="medida" name="medida" disabled>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="modelo">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="rin">Cantidad</label>
                            <input type="text" class="form-control" id="cantidad" name="cantidad" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="medida">sucursal</label>
                            <input type="text" class="form-control" id="sucursal" name="sucursal" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="capacidad_carga">Capacidad de carga</label>

                        <input type="text" class="form-control" id="capacidad_carga" name="capacidad_carga" disabled>
                    </div>

                    <div class="form-group">
                        <label for="indice_velocidad">índice de velocidad</label>
                        <input type="text" class="form-control" id="indice_velocidad" name="indice_velocidad" disabled>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-6">
                            <label for="precio">Precio</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                <input type="text" min='0' , step="any" class="form-control" id="precio" name="precio" disabled>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL MOSTRAR LLANTA-->

<!--Modal BATERIA-->
<div class="modal fade" id="modalBateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Detalles de la batería</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codigo_llanta">Código de Bateria</label>
                                <input type="text" class="form-control" id="nombre_bateria" disabled name="nombre_bateria">
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca</label>

                                <input type="text" class="form-control" disabled id="marca" name="marca">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pos-rel d-style my-3 radius-1 shadow-sm overflow-hidden bgc-brown-m3" id="foto_bateria" name="foto_bateria">

                                <div class="v-hover position-center h-100 w-100 bgc-dark-grad" style="pointer-events: none;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="rin">Voltaje</label>
                            <input type="text" class="form-control" id="voltaje" name="voltaje" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="medida">Medidas</label>
                            <input type="text" class="form-control" id="medidas" name="medidas" disabled>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="modelo">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="rin">Cantidad</label>
                            <input type="text" class="form-control" id="cantidad" name="cantidad" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="medida">sucursal</label>
                            <input type="text" class="form-control" id="sucursal" name="sucursal" disabled>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="modelo">Capacidad de arranque</label>
                            <input type="text" class="form-control" id="capacidad" name="capacidad" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="medida">Capacidad de arranque frio</label>
                            <input type="text" class="form-control" id="frio" name="frio" disabled>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="modelo">Peso</label>
                            <input type="text" class="form-control" id="peso" name="peso" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="medida">Tamaño</label>
                            <input type="text" class="form-control" id="tamanio" name="tamanio" disabled>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-6">
                            <label for="precio">Precio</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                <input type="text" min='0' , step="any" class="form-control" id="precio" name="precio" disabled>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL BATERIA -->
<!--MODAL ELIMINAR-->
<div class="modal fade" data-backdrop-bg="bgc-white" id="eliminarModal" tabindex="-1" aria-labelledby="dangerModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content bgc-transparent brc-danger-m2 shadow">
            <div class="modal-header py-2 bgc-danger-tp1 border-0  radius-t-1">
                <h5 class="modal-title text-white-tp1 text-110 pl-2 font-bolder" id="dangerModalLabel">
                    Advertencia!
                </h5>
                <button type="button" class="position-tr btn btn-xs btn-outline-white btn-h-yellow btn-a-yellow mt-1px mr-1px btn-brc-tp" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-150">×</span>
                </button>
            </div>
            <div class="modal-body bgc-white-tp2 p-md-4 pl-md-5">
                <form id="eliminar_inventario_form">
                    <div class="d-flex align-items-top mr-2 mr-md-5">
                        <i class="fas fa-exclamation-triangle fa-2x text-orange-d2 float-rigt mr-4 mt-1"></i>
                        <input type="hidden" class="form-control" id="delete_id" name="delete_id">
                        <input type="hidden" class="form-control" id="delete_id_sucursal" name="delete_id_sucursal">
                        <input type="hidden" class="form-control" id="delete_cantidad" name="delete_cantidad">
                        <div class="text-secondary-d2 text-105">
                            Cantidad de producto a eliminar?
                            <input type="number" id="delete_cant_nueva" name="delete_cant_nueva" placeholder="0" min="1" step="1" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bgc-white-tp2 border-0">
                <button type="button" class="btn px-4 btn-light-grey" data-dismiss="modal">
                    No
                </button>
                <button type="button" class="btn px-4 btn-danger" id="id-danger-yes-btn" onclick="eliminar_producto()">
                    Si
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL ELIMINAR-->


<!--Modal REFACCION-->
<div class="modal fade" id="modalRefaccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Detalles de la batería</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codigo_llanta">Código de refacciòn</label>
                                <input type="text" class="form-control" id="nombre" disabled name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca</label>

                                <input type="text" class="form-control" disabled id="marca" name="marca">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pos-rel d-style my-3 radius-1 shadow-sm overflow-hidden bgc-brown-m3" id="foto_refaccion" name="foto_refaccion">

                                <div class="v-hover position-center h-100 w-100 bgc-dark-grad" style="pointer-events: none;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" disabled>
                        </div>

                    </div>

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="modelo">Categoria</label>
                            <input type="text" class="form-control" id="categoria" name="categoria" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="rin">Cantidad</label>
                            <input type="text" class="form-control" id="cantidad" name="cantidad" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="medida">sucursal</label>
                            <input type="text" class="form-control" id="sucursal" name="sucursal" disabled>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-12">
                            <label for="modelo">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" disabled></textarea>
                        </div>

                    </div>



                    <div class="form-row align-items-center">
                        <div class="form-group col-md-6">
                            <label for="precio">Precio</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                <input type="text" min='0' , step="any" class="form-control" id="precio" name="precio" disabled>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL REFACCION -->

<!--Modal nuevo-->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel2" style="color:white">
                    Registrar a inventario
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="agregar_inventario_form">
                    <div class="card-body p-0">
                        <div class="card acard mt-2 mt-lg-3">
                            <div class="card-body px-3 pb-1">
                                <div class="form-group row">
                                    <?php
                        $query2 = "select * from sucursal ";
                        $data2=DB::select($query2);      
                        ?>
                                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                        <label for="id-form-field-1" class="mb-0">
                                            Sucursal
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <select class="form-control col-sm-8 col-md-10" id="sucursal_nueva" name="sucursal" onChange="javascript:obtener_valor()"  required>

                                            <option value="0">Elige una sucursal</option>
                                            @foreach($data2 as $item)
                                            <option value="{{ $item->id_sucursal }}"> {{ $item->sucursal }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">


                                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                        <label for="id-form-field-1" class="mb-0">
                                            Productos
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <!--<select class="form-control col-sm-8 col-md-10" id="mostrar_productos" name="producto" required>-->
                                            <select class="form-control selectpicker form-control" title="-- Productos --" data-size="5" data-live-search="true" data-header="Seleccione producto" data-style="btn-primary"  id="mostrar_productos" name="producto" data-container="body" required>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                        <label for="id-form-field-1" class="mb-0">
                                            Cantidad
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control col-sm-8 col-md-10" id="nueva_cantidad" name="nueva_cantidad" required>
                                    </div>
                                </div>

                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <div style="align-content:center;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit" class="btn btn-primary" onclick="enviar_datos();">
                        Aceptar
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Fin modal nuevo-->

@section('scripts')

<!-- include vendor scripts used in "Bootstrap Table" page. see "/views//pages/partials/table-bootstrap/@vendor-scripts.hbs" -->
<script src="\npm\tableexport.jquery.plugin@1.10.22\tableExport.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\export\bootstrap-table-export.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\print\bootstrap-table-print.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\mobile\bootstrap-table-mobile.min.js"></script>

<!-- "Bootstrap Table" page script to enable its demo functionality -->
<script type="text/javascript">
    function obtener_valor() {
        //document.cotiza.select1[document.cotiza.select1.selectedIndex].value  
        var sucursal = document.getElementById("sucursal_nueva").value;
        alert(sucursal);

        //console.log(sucursal);
        var token = '{{csrf_token()}}';
        var data = {
            sucursal: sucursal,
            _token: token
        };

        $.ajax({
            type: "POST",
            url: "/mostrar_productos",
            data: data,
            success: function(msg) {
                console.log(msg);
                //var datos=JSON.parse(msg);
                //console.log(datos);
                /*var productos = "";
                document.getElementById('mostrar_productos').innerHTML = '';

                document.getElementById('mostrar_productos').innerHTML = productos
                console.log("MOSTRAR LOS PRODUCTOS");
                console.log(productos);*/
                 $('#mostrar_productos').selectpicker('selectAll');
                var selected = [];
                selected = $('#mostrar_productos').val()
                //alert(selected.length);

                for (i = 0; i < selected.length; i++) {
                    $('#mostrar_productos').find('[value=' + selected[i] + ']').remove();
                    $('#mostrar_productos').selectpicker('refresh');
                }
                
                 for (j = 0; j< msg.length; j++) {

                    console.log('<option value="' + msg[j]['id_productos_llantimax'] + '">' + msg[j]['categoria'] + ' ' + msg[j]['nombre'] + ' ' + msg[j]['marca'] + ' ' + msg[j]['modelo'] + '</option>');
                     
                       $('#mostrar_productos').append('<option   value="' + msg[j]['id_productos_llantimax'] + '" data-subtext="Categoria: ' + msg[j]['categoria'] + '; Marca: ' +msg[j]['marca'] + '; Modelo: ' + msg[j]['modelo']  + '" showSubtext="true">' + msg[j]['nombre'] + '</option>');
                        $("#mostrar_productos").selectpicker("refresh");
                }
                
            }
        });
    }

    function enviar_datos() {
        if ($("#agregar_inventario_form")[0].checkValidity()) {
            event.preventDefault();
            var sucursal = document.getElementById("sucursal_nueva").value;
            var producto = $('#mostrar_productos').val();
            var cantidad = document.getElementById("nueva_cantidad").value;
            console.log("sucursal :" + sucursal + "  producto:" + producto + "   cantidad:" + cantidad);

            var token = '{{csrf_token()}}';
            var data = {
                sucursal: sucursal,
                cantidad: cantidad,
                producto: producto,
                _token: token
            };

            $.ajax({
                type: "POST",
                url: "/agregar_inventarios",
                data: data,
                success: function(msg) {
                    console.log(msg);
                    location.href = "/mostrar_inventario"
                }
            });

        } else {
            $("#agregar_inventario_form")[0].reportValidity();
        }

    }

</script>


<script>
    jQuery(function($) {
        var datos = @json($aProducto_refaccion);
        var datos2 = @json($aProducto_llantas);
        var datos3 = @json($aProducto_baterias);
        //alert(datos);
        //alert(datos2);
        //alert(datos3);
        var arr = [];
        datos.forEach(objeto => {
            //let tmp =[] ;
            arr.push({
                "id_productos_llantimax": objeto.id_productos_llantimax,
                "nombre": objeto.nombre,
                "categoria": objeto.categoria,
                "marca": objeto.marca,
                "modelo": objeto.modelo,
                "precio": objeto.precio,
                "fotografia_miniatura": '<img src="/img/' + objeto.fotografia_miniatura + '" width="80px" height="80px" alt="' + objeto.nombre + '">',
                "sucursal": objeto.sucursal,
                "cantidad": objeto.cantidad,
                "photo": objeto.fotografia_miniatura,
                "descripcion": objeto.descripcion
            }, );
            //arr.push(tmp);
            //console.log(arr);
        });
        console.log(arr)
        //alert(arr);

        datos2.forEach(objeto => {
            //let tmp =[] ;
            arr.push({
                "id_productos_llantimax": objeto.id_productos_llantimax,
                "nombre": objeto.nombre,
                "categoria": objeto.categoria,
                "marca": objeto.marca,
                "modelo": objeto.modelo,
                "precio": objeto.precio,
                "fotografia_miniatura": '<img src="/img/' + objeto.fotografia_miniatura + '" width="80px" height="80px" alt="' + objeto.nombre + '">',
                "sucursal": objeto.sucursal,
                "cantidad": objeto.cantidad,
                "numero_rin": objeto.numero_rin,
                "indice_velocidad": objeto.indice_velocidad,
                "medida": objeto.medida,
                "capacidad_carga": objeto.capacidad_carga,
                "foto": objeto.fotografia_miniatura

            }, );
            //arr.push(tmp);
            //console.log(arr);
        });
        console.log(arr)
        //alert(arr);

        datos3.forEach(objeto => {
            //let tmp =[] ;
            arr.push({
                "id_productos_llantimax": objeto.id_productos_llantimax,
                "nombre": objeto.nombre,
                "categoria": objeto.categoria,
                "marca": objeto.marca,
                "modelo": objeto.modelo,
                "precio": objeto.precio,
                "fotografia_miniatura": '<img src="/img/' + objeto.fotografia_miniatura + '" width="80px" height="80px" alt="' + objeto.nombre + '">',
                "sucursal": objeto.sucursal,
                "cantidad": objeto.cantidad,
                "medidas": objeto.medidas,
                "voltaje": objeto.voltaje,
                "capacidad_arranque": objeto.capacidad_arranque,
                "capacidad_arranque_frio": objeto.capacidad_arranque_frio,
                "peso": objeto.peso,
                "tamanio": objeto.tamanio,
                "foto": objeto.fotografia_miniatura
            }, );
            //arr.push(tmp);
            //console.log(arr);
        });
        console.log(arr)
        //alert(arr);


        // initiate the plugin
        var $_bsTable = $('#table')
        $_bsTable.bootstrapTable({
            data: arr,
            columns: [{
                    field: 'nombre',
                    title: 'Código del producto',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'categoria',
                    title: 'Categoria',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'marca',
                    title: 'Marca',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'modelo',
                    title: 'Modelo',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'precio',
                    title: 'Precio',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'fotografia_miniatura',
                    title: 'Foto',
                    align: 'center',
                    sortable: true,
                    printIgnore: true,
                },
                {
                    field: 'sucursal',
                    title: 'Sucursal',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'cantidad',
                    title: 'Cantidad',
                    align: 'center',
                    sortable: true
                },

                {
                    field: 'tools',
                    title: '<i class="fa fa-cog text-secondary-d1 text-130"></i>',
                    formatter: formatTableCellActions,
                    width: 140,
                    align: 'center',
                    printIgnore: true
                }
            ],

            icons: {
                columns: 'fa-th-list text-orange-d1',
                detailOpen: 'fa-plus text-blue',
                detailClose: 'fa-minus text-blue',
                export: 'fa-download text-blue',
                print: 'fa-print text-purple-d1',
                fullscreen: 'fa fa-expand',

                search: 'fa-search text-blue'
            },


            toolbar: "#table-toolbar",
            theadClasses: "bgc-white text-grey text-uppercase text-80",
            clickToSelect: true,

            checkboxHeader: true,
            search: true,
            searchAlign: "left",
            //showSearchButton: true,

            sortable: true,

            detailView: false,
            detailFormatter: "detailFormatter",

            pagination: true,
            paginationLoop: false,

            buttonsClass: "outline-default bgc-white btn-h-light-primary btn-a-outline-primary py-1 px-25 text-95",

            showExport: true,
            showPrint: true,
            showColumns: true,
            showFullscreen: true,


            mobileResponsive: true,
            checkOnInit: true,

            printPageBuilder: function(table) {

                hoy = new Date();
                return '<html>' +
                    '<head>' +
                    '<style type="text/css" media="print">' +
                    ' @page {' +
                    'size: auto;' +
                    'margin: 25px 0 25px 0;' +
                    '}' +
                    '</style>' +
                    '<style type="text/css" media="all">' +
                    'table {' +
                    'border-collapse: collapse;' +
                    'font-size: 12px;' +
                    '}' +
                    'table, th, td {' +
                    'border: 1px solid grey;' +
                    '}' +
                    'th, td {' +
                    'text-align: center;' +
                    'vertical-align: middle;' +
                    '}' +
                    ' p {' +
                    'font-weight: bold;' +
                    'margin-left:20px;' +
                    'margin-left:3%;' +
                    'margin-right:3%;' +
                    '}' +
                    'table {' +
                    'width:94%;' +
                    'margin-left:3%;' +
                    'margin-right:3%;' +
                    '}' +
                    'div.bs-table-print {' +
                    'text-align:center;' +
                    '}' +
                    '</style>' +
                    '</head>' +
                    '<title>Imprimir inventario</title>' +
                    '<body>' +
                    '<div style="text-align:center;">' +
                    '<p style="font-size:20px;">Tabla de inventario' + '</p>' +
                    '</div>' +
                    '<div >' +
                    '<span style="float:left; margin-left:50px; margin-bottom:15px; ">LLANTIMAX Sucusal:' + @json($sucursal_usuario) + '</span>' +
                    '<span style="float:right;  margin-right:50px;  margin-bottom:15px">Fecha de impresion:' + hoy.toLocaleDateString() + '</span>' +
                    '</div>' +

                    '<div class="bs-table-print">' + table + '</div>' +
                    '</body>' +
                    '</html>'
            },
            formatFullscreen: function() {
                return 'Pantalla completa'
            },
            formatExport: function() {
                return 'Exportar datos'
            },
            formatPrint: function() {
                return 'Imprimir'
            },
            formatColumns: function() {
                return 'Columnas'
            },
            formatSearch: function() {
                return 'Buscar'
            },
            formatShowingRows: function(pageFrom, pageTo, totalRows) {
                return 'Mostrando: ' + totalRows + ' Productos';
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + ' Filas por página';
            },
            formatNoMatches: function() {
                return 'Producto no encontrado';
            },
        })

        function formatTableCellActions(value, row, index, field) {
            var categoria = row.categoria;
            var sucursal = row.sucursal;
            var id_producto = row.id_productos_llantimax;
            var eliminar = row.id_productos_llantimax;
            var botones = "";
            var cantidad = row.cantidad;
            var boton_eliminar = "";
            if (cantidad > 0) {
                boton_eliminar = '<button type="button" class="text-danger mx-1 "   data-cantidad="' + row.cantidad + '" data-id="' + row.id_productos_llantimax + '" data-suc="' + row.sucursal + '"  data-toggle="modal" data-target="#eliminarModal">' +
                    '<i class="fa fa-trash-alt text-105"></i>' +
                    '</button>';
            }

            if (categoria == "Llantas") {
                botones = '<div class="action-buttons">' +
                    '<button class="text-blue mx-1" data-target="#modalLlanta" data-toggle="modal"data-id="' + row.id_productos_llantimax + '" data-cantidad="' + row.cantidad + '" data-sucursal="' + row.sucursal + '" data-categoria="' + row.categoria + '" data-nombre="' + row.nombre + '" data-medida="' + row.medida + '" data-foto="' + row.foto + '" data-marca="' + row.marca + '" data-modelo="' + row.modelo + '" data-precio="' + row.precio + '" data-marc="' + row.id_marca + '" data-capacidad="' + row.capacidad_carga + '" data-indice="' + row.indice_velocidad + '" data-rin="' + row.numero_rin + '" ><i class="fa fa-search-plus text-105"></i></button>' +
                    boton_eliminar +
                    '</div>';
            } else
            if (categoria == "Refacción") {
                botones = '<div class="action-buttons">' +
                    '<button class="text-blue mx-1" data-target="#modalRefaccion" data-toggle="modal"data-id="' + row.id_productos_llantimax + '" data-foto="' + row.photo + '" data-nombre="' + row.nombre + '" data-marca="' + row.marca + '" data-modelo="' + row.modelo + '" data-cantidad="' + row.cantidad + '" data-sucursal="' + row.sucursal + '" data-categoria="' + row.categoria + '" data-descripcion="' + row.descripcion + '" data-precio="' + row.precio + '" ><i class="fa fa-search-plus text-105"></i></button>' +
                    boton_eliminar +
                    '</div>';
            } else
            if (categoria == "Bateria") {
                botones = '<div class="action-buttons">' +
                    '<button class="text-blue mx-1" data-target="#modalBateria" data-toggle="modal"data-id="' + row.id_productos_llantimax + '" data-nombre="' + row.nombre + '" data-marca="' + row.marca + '" data-modelo="' + row.modelo + '" data-cantidad="' + row.cantidad + '" data-sucursal="' + row.sucursal + '" data-categoria="' + row.categoria + '" data-medidas="' + row.medidas + '" data-voltaje="' + row.voltaje + '" data-capacidad="' + row.capacidad_arranque + '" data-frio="' + row.capacidad_arranque_frio + '" data-peso="' + row.peso + '" data-foto="' + row.foto + '" data-tamanio="' + row.tamanio + '" data-precio="' + row.precio + '" ><i class="fa fa-search-plus text-105"></i></button>' +
                    boton_eliminar +
                    '</div>';
            }
            return botones;
        }


        // enable/disable 'remove' button
        var $removeBtn = $('#remove-btn')
        $_bsTable
            .on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function() {
                $removeBtn.prop('disabled', !$_bsTable.bootstrapTable('getSelections').length)
            })

        // remove an item
        $removeBtn.on('click', function() {
            var ids = $.map($_bsTable.bootstrapTable('getSelections'), function(row) {
                return row.id
            })

            $_bsTable.bootstrapTable('remove', {
                field: 'id',
                values: ids
            })

            $removeBtn.prop('disabled', true)
        })


        // change caret of "X" rows per page button
        $('.fixed-table-pagination .caret').addClass('fa fa-caret-down')
        $_bsTable.on('page-change.bs.table', function() {
            $('.fixed-table-pagination .caret').addClass('fa fa-caret-down')
        })

    })

</script>

<script type="text/javascript">
    $('#modalLlanta').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_llanta = button.data('id')
        var nombre_llanta = button.data('nombre')
        var marca = button.data('marca')
        var categoria = button.data('categoria')
        var sucursal = button.data('sucursal')
        var cantidad = button.data('cantidad')
        var id_marca = button.data('marc')
        var precio = button.data('precio')
        var modelo = button.data('modelo')
        var medida = button.data('medida')
        var capacidad_carga = button.data('capacidad')
        var indice_velocidad = button.data('indice')
        var numero_rin = button.data('rin')
        var foto = button.data('foto')
        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var modal = $(this)
        modal.find('#nombre_llanta').val(nombre_llanta)
        modal.find('#modelo').val(modelo)
        modal.find('#categoria').val(categoria)
        modal.find('#sucursal').val(sucursal)
        modal.find('#cantidad').val(cantidad)
        modal.find('#medida').val(medida)
        modal.find('#numero_rin').val(numero_rin)
        modal.find('#marca').val(marca)
        modal.find('#capacidad_carga').val(capacidad_carga)
        modal.find('#indice_velocidad').val(indice_velocidad)
        modal.find('#precio').val(precio)
        var llenado = '<a href="#" class="show-lightbox">' +
            '<img alt="Gallery Image 1" src="/img/' + foto + '" class="w-100 d-zoom-2 " data-size="1200x800">' +
            '</a>';
        document.getElementById('foto_llanta').innerHTML = llenado;

    });

</script>
<script type="text/javascript">
    $('#modalBateria').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_bateria = button.data('id')
        var nombre_bateria = button.data('nombre')
        var marca = button.data('marca')
        var modelo = button.data('modelo')
        var medidas = button.data('medidas')
        var voltaje = button.data('voltaje')
        var capacidad = button.data('capacidad')
        var frio = button.data('frio')
        var peso = button.data('peso')
        var foto = button.data('foto')
        var tamanio = button.data('tamanio')
        var precio = button.data('precio')
        var categoria = button.data('categoria')
        var sucursal = button.data('sucursal')
        var cantidad = button.data('cantidad')

        var modal = $(this)
        var llenado = '<a href="#" class="show-lightbox">' +
            '<img alt="Gallery Image 1" src="/img/' + foto + '" class="w-100 d-zoom-2 " data-size="1200x800">' +
            '</a>';
        document.getElementById('foto_bateria').innerHTML = llenado;
        modal.find('#nombre_bateria').val(nombre_bateria)
        modal.find('#marca').val(marca)
        modal.find('#modelo').val(modelo)
        modal.find('#medidas').val(medidas)
        modal.find('#voltaje').val(voltaje)
        modal.find('#capacidad').val(capacidad)
        modal.find('#frio').val(frio)
        modal.find('#peso').val(peso)
        modal.find('#tamanio').val(tamanio)
        modal.find('#precio').val(precio)
        modal.find('#categoria').val(categoria)
        modal.find('#sucursal').val(sucursal)
        modal.find('#cantidad').val(cantidad)

    });

</script>

<script type="text/javascript">
    $('#modalRefaccion').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_refaccion = button.data('id')
        var nombre = button.data('nombre')
        var marca = button.data('marca')
        var modelo = button.data('modelo')
        var foto = button.data('foto')
        var precio = button.data('precio')
        var categoria = button.data('categoria')
        var sucursal = button.data('sucursal')
        var cantidad = button.data('cantidad')
        var descripcion = button.data('descripcion')

        var modal = $(this)
        var llenado = '<a href="#" class="show-lightbox">' +
            '<img alt="Gallery Image 1" src="/img/' + foto + '" class="w-100 d-zoom-2 " data-size="1200x800">' +
            '</a>';
        document.getElementById('foto_refaccion').innerHTML = llenado;
        modal.find('#nombre').val(nombre)
        modal.find('#marca').val(marca)
        modal.find('#modelo').val(modelo)
        modal.find('#precio').val(precio)
        modal.find('#categoria').val(categoria)
        modal.find('#sucursal').val(sucursal)
        modal.find('#cantidad').val(cantidad)
        modal.find('#descripcion').val(descripcion)

    });

</script>
<script type="text/javascript">
    $('#eliminarModal').on('show.bs.modal', function(event) {
        /*RECUPERAR METADATOS DEL BOTÓN*/
        var button = $(event.relatedTarget)
        var id_servicio = button.data('id')
        var id_sucursal = button.data('suc')
        var cantidad = button.data('cantidad')

        var modal = $(this)
        modal.find('#delete_id').val(id_servicio)
        modal.find('#delete_id_sucursal').val(id_sucursal)
        modal.find('#delete_cantidad').val(cantidad)
    });

</script>

<script type="text/javascript">
    function eliminar_producto() {
        if ($("#eliminar_inventario_form")[0].checkValidity()) {
            event.preventDefault();
            var id_producto = document.getElementById("delete_id").value;
            var id_sucursal = document.getElementById("delete_id_sucursal").value;
            var cantidad_anterior = document.getElementById("delete_cantidad").value;
            var cantidad_nueva = document.getElementById("delete_cant_nueva").value;


            alert(id_producto + "  " + id_sucursal + "   " + cantidad_anterior + "  " + cantidad_nueva);
            var token = '{{csrf_token()}}';
            var data = {
                id_producto: id_producto,
                sucursal: id_sucursal,
                cantidad_anterior: cantidad_anterior,
                cantidad_nueva: cantidad_nueva,
                _token: token
            };
            console.log(data);
            $.ajax({
                type: "POST",
                url: "/eliminar_producto_inventario",
                data: data,
                success: function(msg) {
                    alert(msg);
                    location.href = "/mostrar_inventario";
                }
            });
        } else {
            $("#eliminar_inventario_form")[0].reportValidity();
        }

    }

</script>
@stop
@stop
