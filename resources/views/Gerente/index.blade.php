@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/basictable@2.0.2/dist/css/basictable.min.css">
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
        <h1 class="page-title text-primary-d4">
            Nueva venta
            <!--<small class="page-info text-secondary-d2">
                <i class="fa fa-angle-double-right text-80"></i>
                extended tables plugin
            </small>-->
        </h1>
    </div>
    <div class="card bcard mt-4">
        <div class="card-body p-0 border-x-0 border-y-0 border-b-0 brc-default-m4 radius-0">
            <div class="mt-0 mt-lg-0 card dcard h-auto overflow-hidden shadow border-t-0 ml-0 mr-0 mb-4">
                <div class="col-md-12">
                    <div class="card-header t-border-1 mb-0 mt-2">
                        <h4 class="text-success-d4 mb-0">
                            Selección de productos:
                        </h4>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive-xl mt-4 mb-4">
                    <div class="col-md-12 mt-2">
                        <div class="row mb-2">
                            <div class="form-row col-md-12 justify-content-center">
                                <div class="form-group col-md-2 ml-2 justify-content-center">
                                    <select class="form-control selectpicker form-control" title="-- Sucursal --" data-size="5" data-header="Seleccione sucursal" data-style="btn-primary" onChange="javascript:mostrar_productos_sucursal()" id="sucursal" name="sucursal" data-container="body">
                                        <option data-divider="true"></option>
                                        <option data-tokens="Salamanca" value="Salamanca">Salamanca</option>
                                        <option data-tokens="Cortazar" value="Cortazar">Cortazar</option>
                                        <option data-tokens="San Miguel de Allende" value="San Miguel de Allende">San Miguel de Alllende</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 ml-2">
                                    <select class="form-control selectpicker form-control" multiple data-max-options="1" data-live-search="true" title="-- Producto --" data-size="4" data-header="Selecciona una producto" data-style="btn-primary" id="productos" name="productos" data-container="body">
                                        <optgroup label="los chidos">
                                            <option data-divider="true"></option>
                                            <option data-tokens="Producto 1" value="Salamanca">Producto 1</option>
                                            <option data-tokens="Producto 2" value="Salamanca">Producto 2</option>
                                            <option data-tokens="Producto 3" value="Salamanca">Producto 3</option>
                                            <option data-tokens="Producto 4" value="Salamanca">Producto 4</option>
                                            <option data-tokens="Producto 5" value="Salamanca">Producto 5</option>
                                            <option data-tokens="Producto 6" value="Salamanca">Producto 6</option>
                                            <option data-tokens="Producto 7" value="Salamanca">Producto 7</option>
                                        </optgroup>
                                        <optgroup label="los mamalones">
                                            <option data-divider="true"></option>
                                            <option data-tokens="Producto 8" value="Salamanca">Producto 8</option>
                                            <option data-tokens="Producto 9" value="Salamanca">Producto 9</option>
                                            <option data-tokens="Producto 10" value="Salamanca">Producto 10</option>
                                            <option data-tokens="Producto 11" value="Salamanca">Producto 11</option>
                                            <option data-tokens="Producto 12" value="Salamanca">Producto 12</option>
                                            <option data-tokens="Producto 13" value="Salamanca">Producto 13</option>
                                            <option data-tokens="Producto 14" value="Salamanca">Producto 14</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group col-md-1 ml-2">
                                    <input class="form-control" min="1" max="9999" step="1" type="number" placeholder="Cantidad" style="border-color:#2470BD" id="cantidad" name="cantidad">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-row col-md-12 justify-content-center">
                                <div class="form-group col-md-2 ml-2 justify-content-center">
                                    <button class="btn px-4 btn-primary mb-1 " onclick="mostrar_tabla()">Añadir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--<div class="" style="margin-bottom:110px;"></div>
            <div class="col-md-12 col-sm-9 align-middle">
                <table class="table text-dark-m2 text-95 bgc-white ml-n1px  " id="table">
                    <thead>
                        <tr>
                            <th class="align-middle"><b>Código del producto</b></th>
                            <th class="align-middle"><b>Nombre del proveedor</b></th>
                            <th class="align-middle"><b>Cantidad</b></th>
                            <th class="align-middle"><b>Precio unitario</b></th>
                            <th class="align-middle"><b>Total</b></th>
                        </tr>
                    </thead>
                    
                </table>
            </div>-->



            <div class="mt-0 mt-lg-0 card dcard h-auto overflow-hidden shadow border-t-0 ml-0 mr-0">
                <div class="col-md-12">
                    <div class="card-header t-border-1 mb-0 mt-2">
                        <h4 class="text-success-d4 mb-0">
                            Detalles:
                        </h4>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive-xl mt-4 mb-4">
                    <div class="row mt-4 col-auto pr-0 pl-1 ml-0">
                        <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">

                            <div class="page-header border-0 mb-0">
                                <h1 class="page-title text-dark-l3 text-115">
                                    Ticket
                                    <i class="fa fa-angle-right text-80 ml-1"></i>
                                    <small class="page-info text-dark-m3">
                                        #111-222
                                    </small>
                                </h1>

                                <div class="page-tools">
                                    <div class="action-buttons">
                                        <a class="btn bg-white btn-light mx-1px text-95 shadow-sm" href="#" data-title="Print">
                                            <i class="mr-1 fa fa-print text-primary text-120 w-2"></i>
                                            Imprimir
                                        </a>
                                        <a class="btn bg-white btn-light mx-1px text-95 shadow-sm" href="#" data-title="PDF">
                                            <i class="mr-1 far fa-file-pdf text-danger text-120 w-2"></i>
                                            Exportar
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="card dcard mb-4">
                                <div class="card-body px-4 px-lg-5">

                                    <div class="text-center">
                                        <i class="fa fa-leaf text-200 text-green-m1 mr-1 ml-n4"></i>
                                        <span class="text-dark-m3 text-140">
                                            Llantimax
                                        </span>
                                        <br>
                                        <span class="text-dark-l2 text-90">
                                            Sucursal Salamanca
                                        </span>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <div>
                                                <div class="text-secondary-d1 text-600 text-125 align-middle">
                                                    Cliente
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="form-group col-7 col-lg-7 col-md-4 justify-content-center pl-2 mt-2 ml-2 mb-1">
                                                        <select class="form-control selectpicker form-control" title="-- Cliente --" data-size="5" data-header="" data-style="btn-primary" onChange="javascript:mostrar_productos_sucursal()" id="sucursal" name="sucursal" data-container="body">
                                                            <option data-divider="true"></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-2 text-left align-self-center pl-0 mb-1 mt-2">
                                                        <button type="button" class="btn btn-primary" data-toggle="popover" data-trigger="hover" id="btn_modal_cliente" data-placement="top" data-content="Agregar cliente" data-original-title="" title="">
                                                            <i class="fas fa-user-plus"></i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="text-dark-l1">
                                                    <div class="my-1">
                                                        Teléfono:
                                                    </div>
                                                    <div class="my-1">
                                                        Correo:
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.col -->


                                        <div class="col-sm-6 align-self-start d-sm-flex justify-content-end text-95">
                                            <hr class="d-sm-none">
                                            <div class="text-dark-l1">
                                                <div class="mt-1 mb-2 text-secondary-d1 text-600 text-125">
                                                    Ticket
                                                </div>

                                                <div class="my-2">
                                                    <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                    <span class="text-600 text-90">
                                                        ID:
                                                    </span>
                                                    #111-222
                                                </div>

                                                <div class="my-2">
                                                    <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                    <span class="text-600 text-90">
                                                        Fecha:
                                                    </span>
                                                    12 Jun, 2021
                                                </div>
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.قخص -->


                                    <div class="mt-4">
                                        <div class="row text-600 text-95 text-secondary-d3 brc-green-l1 py-25 border-y-2">
                                            <div class="d-none d-sm-block col-1">
                                                #
                                            </div>

                                            <div class="col-7 col-sm-5">
                                                Descripción
                                            </div>

                                            <div class="d-none d-sm-block col-4 col-sm-2">
                                                Cant.
                                            </div>

                                            <div class="d-none d-sm-block col-sm-2">
                                                Precio U.
                                            </div>

                                            <div class="col-5 col-sm-2">
                                                Total
                                            </div>
                                        </div>

                                        <div class="text-95 text-dark-m3">
                                            <div class="row mb-2 mb-sm-0 py-25">
                                                <div class="d-none d-sm-block col-1">
                                                    1
                                                </div>

                                                <div class="col-7 col-sm-5">
                                                    Producto 1
                                                </div>

                                                <div class="d-none d-sm-block col-2">
                                                    2
                                                </div>

                                                <div class="d-none d-sm-block col-2 text-95">
                                                    $10
                                                </div>

                                                <div class="col-5 col-sm-2 text-secondary-d3 text-600">
                                                    $20
                                                </div>
                                            </div>

                                            <div class="row mb-2 mb-sm-0 py-25 bgc-green-l4">
                                                <div class="d-none d-sm-block col-1">
                                                    2
                                                </div>

                                                <div class="col-7 col-sm-5">
                                                    Producto 2
                                                </div>

                                                <div class="d-none d-sm-block col-2">
                                                    1
                                                </div>

                                                <div class="d-none d-sm-block col-2 text-95">
                                                    $30
                                                </div>

                                                <div class="col-5 col-sm-2 text-secondary-d3 text-600">
                                                    $30
                                                </div>
                                            </div>

                                            <div class="row mb-2 mb-sm-0 py-25">
                                                <div class="d-none d-sm-block col-1">
                                                    3
                                                </div>

                                                <div class="col-7 col-sm-5">
                                                    Producto 3
                                                </div>

                                                <div class="d-none d-sm-block col-2">
                                                    --
                                                </div>

                                                <div class="d-none d-sm-block col-2 text-95">
                                                    $1,700
                                                </div>

                                                <div class="col-5 col-sm-2 text-secondary-d3 text-600">
                                                    $1,700
                                                </div>
                                            </div>

                                            <div class="row mb-2 mb-sm-0 py-25 bgc-green-l4">
                                                <div class="d-none d-sm-block col-1">
                                                    4
                                                </div>

                                                <div class="col-7 col-sm-5">
                                                    Producto 4
                                                </div>

                                                <div class="d-none d-sm-block col-2">
                                                    1
                                                </div>

                                                <div class="d-none d-sm-block col-2 text-95">
                                                    $500
                                                </div>

                                                <div class="col-5 col-sm-2 text-secondary-d3 text-600">
                                                    $500
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row border-b-2 brc-green-l1"></div>

                                        <!-- or use a table instead -->
                                        <!--
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                            <thead class="bg-none bgc-default-tp1">
                                <tr class="text-white">
                                    <th class="opacity-2">#</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th width="140">Amount</th>
                                </tr>
                            </thead>

                            <tbody class="text-95 text-secondary-d3">
                                <tr></tr>
                                <tr>
                                    <td>1</td>
                                    <td>Domain registration</td>
                                    <td>2</td>
                                    <td class="text-95">$10</td>
                                    <td class="text-secondary-d2">$20</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    -->


                                        <div class="row mt-4">
                                            <div class="col-12 col-sm-7 mt-2 mt-lg-0">
                                                <div class="d-inline-block text-center">
                                                    <p class="text-95 text-dark-m2">
                                                        <i class="fa fa-exclamation-triangle text-danger-m2 mr-1"></i>
                                                        Seleccione algún método
                                                        <br>
                                                        para realizar el pago
                                                    </p>

                                                    <div>
                                                        <form autocomplete="off" class="p-2 p-sm-3 bgc-secondary-l4 radius-1 btn-group btn-group-toggle mx-n3 mx-sm-0" data-toggle="buttons">
                                                            <div role="button" class="mr-1 p-3 border-2 btn btn-brc-tp shadow-sm btn-light btn-text-blue btn-h-lighter-blue btn-a-light-blue bgc-white">
                                                                <input type="radio" name="place" id="place1" value="1">
                                                                <i class="fab fa-paypal d-block text-150 text-blue-d1 w-4 mx-2"></i>
                                                            </div>

                                                            <div role="button" class="mr-1 p-3 border-2 btn btn-brc-tp shadow-sm btn-text-purple btn-light btn-h-lighter-purple btn-a-light-purple bgc-white">
                                                                <input type="radio" name="place" id="place2" value="1">
                                                                <i class="far fa-credit-card d-block text-150 text-purple-d1 w-4 mx-2"></i>
                                                            </div>

                                                            <div role="button" class="p-3 border-2 btn btn-brc-tp shadow-sm btn-light btn-text-orange btn-h-lighter-orange btn-a-light-orange bgc-white">
                                                                <input type="radio" name="place" id="place3" value="3">
                                                                <i class="fab fa-bitcoin d-block text-150 text-orange-d3 w-4 mx-2"></i>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5 text-dark-l1 text-90 order-first order-sm-last">
                                                <div class="row my-3 align-items-center bgc-green-d3 p-2 radius-1 mr-4 ml-1">
                                                    <div class="col-7 text-right text-white text-140 justify-content-start">
                                                        Monto Total:
                                                    </div>
                                                    <div class="col-5 justify-content-end">
                                                        <span class="text-140 text-white">
                                                            $2,475
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row my-2 col-12 justify-content-center pr-0">
                                                    <button class="btn px-4 btn-primary mb-1 btn-lg btn-block">Finalizar Compra</button>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="brc-secondary-l3 border-t-2">

                                        <div class="text-center text-secondary-d4 text-120">
                                            Gracias por su compra!!
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


@section('scripts')

<!-- include vendor scripts used in "Bootstrap Table" page. see "/views//pages/partials/table-bootstrap/@vendor-scripts.hbs" -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/basictable@2.0.2/dist/js/jquery.basictable.min.js"></script>



<script type="text/javascript">
    var rowIdx = 0;
    var productos = new Array();

    function mostrar_productos_sucursal() {
        var sucursal = $('#sucursal').val();
        //alert(sucursal);

        var token = '{{csrf_token()}}';
        var data = {
            sucursal: sucursal,
            _token: token
        };
        $.ajax({
            type: "POST",
            url: "/mostrar_catalogo_sucursal",
            data: data,
            success: function(msg) {
                console.log(msg);
                var llenado = '';
                var datos = JSON.parse(msg);

                $('#productos').selectpicker('selectAll');
                var selected = [];
                selected = $('#productos').val()
                //alert(selected.length);

                for (i = 0; i < selected.length; i++) {
                    $('#productos').find('[value=' + selected[i] + ']').remove();
                    $('#productos').selectpicker('refresh');
                }

                $("#responsive-table tbody tr").html("");
                document.getElementById("cantidad").value = "";
                document.getElementById("total_final").value = 0;
                productos = new Array();

                datos.forEach(objeto => {
                    // alert("Id_proveedor: " + objeto.id_proveedor);
                    //llenado += '<option data-tokens="Espresso" data-subtext="Proveedor: ' + objeto.nombre_contacto + '; precio: $' + objeto.precio_compra + '" showSubtext="true">' + objeto.nombre + '</option>';
                    $('#productos').append('<option value="' + objeto.id_producto + '"    data-sucursal="' + objeto.id_sucursal + '" data-catalogo="' + objeto.id_catalogo + '" data-tokens="Espresso" data-subtext="Proveedor: ' + objeto.nombre_contacto + '; precio: $' + objeto.precio_compra + '" showSubtext="true" data-contacto="' + objeto.nombre_contacto + '" data-precio="' + objeto.precio_compra + '" data-producto="' + objeto.nombre + '" data-proveedor="' + objeto.id_proveedor + '">' + objeto.nombre + '</option>');
                    $("#productos").selectpicker("refresh");
                });
            }
        });
    }


    function mostrar_tabla() {

        /Value tiene el valor del producto/
        /*OBTENER LOS VALORES DE LOS OTROS DATA */
        // var datos=$('#productos option:selected').attr("data-value2");
        var cantidad = document.getElementById("cantidad").value;
        var sucursal = $('#sucursal').val();
        var id_producto = $('#productos').val()[0];
        var id_proveedor = $('#productos option:selected').attr("data-proveedor");
        var id_sucursal = $('#productos option:selected').attr("data-sucursal");
        var id_catalogo = $('#productos option:selected').attr("data-catalogo");
        var nombre_proveedor = $('#productos option:selected').attr("data-contacto");
        var precio_compra = $('#productos option:selected').attr("data-precio");
        var nombre_producto = $('#productos option:selected').attr("data-producto");
        var bandera = 0;

        /VERIFICAR SI LA TABLA TIENE FILAS/
        if ($("#responsive-table tbody tr").length != 0) {
            /EVALUAR SI ESXISTE EL PRODUCTO AGREGADO EN LA TABLA/
            $("#responsive-table tbody tr").each(function(index_tr) {
                if (bandera == 0) {
                    var t_idcatalogo = ($(this).attr("data-id_catalogo"));
                    var t_idproducto = ($(this).attr("data-id_producto"));
                    /SI EL PRODUCTO EXISTE, LO ACTUALIZA/
                    if (id_catalogo == t_idcatalogo && id_producto == t_idproducto) {
                        //var t_cantidad = $(this).attr("data-cantidad");
                        var t_cantidad = document.getElementById("cant").value;
                        cantidad = parseInt(t_cantidad) + parseInt(cantidad);
                        alert(t_cantidad);
                        bandera = 1;
                        $(this).attr('data-cantidad', cantidad);
                        $(this).attr('data-total', parseInt(cantidad) * parseInt(precio_compra));
                        //$(this).dataset.cantidad = cantidad;
                        $(this).html("");
                        /LIMPIA EL CONTENIDO DE TR PARA EVITAR DUPLICADOS/
                        var tr = '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                            '<td data-th="Proveedor"><span class="bt-content">' + nombre_proveedor + '</span></td>' +
                            '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input  class="col-9" style="padding-left:0px;" step="1" min="1" type="number" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                            '<td data-th="Precio unitario"><span class="bt-content">' + precio_compra + '</span></td>' +
                            '<td data-th="Total"><span class="bt-content">' + parseInt(cantidad) * parseInt(precio_compra) + '</span></td>' +
                            '<td data-th="Acciones"><span class="bt-content text-center">' +
                            '<button class="btn btn-danger remove"' +
                            'type="button">Eliminar</button>' +
                            '</td>';
                        $(this).append(tr);
                        var total = $('#total_final').val();
                        var total_final = total - (parseInt(t_cantidad) * parseInt(precio_compra));
                        total_final = total_final + (parseInt(cantidad) * parseInt(precio_compra));
                        document.getElementById("total_final").value = total_final;

                        /ACTUALIZAR ARREGLO/
                        productos = productos.map(function(objeto) {
                            return objeto.id_producto == id_producto && objeto.catalogo == id_catalogo ? {
                                "id_producto": objeto.id_producto,
                                "cantidad_producto": cantidad,
                                "precio_unidad": objeto.precio_unidad,
                                "total": parseInt(cantidad) * parseInt(objeto.precio_unidad),
                                "catalogo": id_catalogo
                            } : objeto;
                        });

                    }
                }
            });
            /SI NO EXISTE EL ELEMENTO, ENTONCES LO INSERTA/
            if (bandera == 0) {
                alert("nueva fila");
                // Nueva fila dentro de tbody.
                $('#table').append(`<tr id="R${++rowIdx}" data-id_catalogo="${id_catalogo}" data-id_producto="${id_producto}" data-precio="${precio_compra}" data-producto="${nombre_producto}"  data-proveedor="${nombre_proveedor}" data-total="${parseInt(cantidad) * parseInt(precio_compra)}" data-cantidad="${cantidad}">` +
                    '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                    '<td data-th="Proveedor"><span class="bt-content">' + nombre_proveedor + '</span></td>' +
                    '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input class="col-9" style="padding-left:0px;" type="number" step="1" min="1" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                    '<td data-th="Precio unitario"><span class="bt-content">' + precio_compra + '</span></td>' +
                    '<td data-th="Total"><span class="bt-content">' + parseInt(cantidad) * parseInt(precio_compra) + '</span></td>' +
                    '<td data-th="Acciones"><span class="bt-content text-center">' +
                    '<button class="btn btn-danger remove"' +
                    'type="button">Eliminar</button>' +
                    '</td>' +
                    '</tr>');
                var total = $('#total_final').val();
                var total_final = parseInt(total) + (parseInt(cantidad) * parseInt(precio_compra));
                document.getElementById("total_final").value = total_final;
                /INSERTA EN OBJETO Y AÑADE A ARREGLO/
                var producto = {
                    "id_producto": id_producto,
                    "cantidad_producto": cantidad,
                    "precio_unidad": precio_compra,
                    "total": parseInt(cantidad) * parseInt(precio_compra),
                    "catalogo": id_catalogo
                };
                productos.push(producto);

                console.log(productos);


            }
        } else {
            // Nueva fila dentro de tbody.

            alert(typeof(id_producto));

            $('#table').append(`<tr id="R${++rowIdx}" data-id_catalogo="${id_catalogo}" data-id_producto="${id_producto}" data-precio="${precio_compra}" data-producto="${nombre_producto}"  data-proveedor="${nombre_proveedor}" data-total="${parseInt(cantidad) * parseInt(precio_compra)}" data-cantidad="${cantidad}" >` +
                '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                '<td data-th="Proveedor"><span class="bt-content">' + nombre_proveedor + '</span></td>' +
                '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input class="col-9" style="padding-left:0px;" type="number" step="1" min="1" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                '<td data-th="Precio unitario"><span class="bt-content">' + precio_compra + '</span></td>' +
                '<td data-th="Total"><span class="bt-content">' + parseInt(cantidad) * parseInt(precio_compra) + '</span></td>' +
                '<td data-th="Acciones"><span class="bt-content text-center">' +
                '<button class="btn btn-danger remove"' +
                'type="button">Eliminar</button>' +
                '</td>' +
                '</tr>');
            var total = $('#total_final').val();
            var total_final = parseInt(total) + (parseInt(cantidad) * parseInt(precio_compra));
            document.getElementById("total_final").value = total_final;
            /INSERTA EN OBJETO Y AÑADE A ARREGLO/
            var producto = {
                "id_producto": id_producto,
                "cantidad_producto": cantidad,
                "precio_unidad": precio_compra,
                "total": parseInt(cantidad) * parseInt(precio_compra),
                "catalogo": id_catalogo
            };
            productos.push(producto);

            console.log(id_producto);
            console.log(productos);
        }
    }

    /Actualizar fila al cambiar valor del input cantidad/

    $('#table').on('change', '#cant', function(index) {
        var valores = "";
        $(this).parents("tr").each(function(index2) {
            var proveedor = $(this).attr("data-proveedor");
            var producto = $(this).attr("data-producto");
            var id_producto = $(this).attr("data-id_producto");
            var id_catalogo = $(this).attr("data-id_catalogo");
            var cantidad = $(this).find("#cant").val();
            var precio_compra = $(this).attr("data-precio");
            var cantidad_anterior = $(this).attr("data-cantidad");
            var total = parseInt($(this).find("#cant").val()) * parseInt($(this).attr("data-precio"));

            alert(cantidad_anterior);

            $(this).html("");
            var tr = '<td data-th="Producto"><span class="bt-content">' + producto + '</span></td>' +
                '<td data-th="Proveedor"><span class="bt-content">' + proveedor + '</span></td>' +
                '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input class="col-9" style="padding-left:0px;" type="number" step="1" min="1" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                '<td data-th="Precio unitario"><span class="bt-content">' + precio_compra + '</span></td>' +
                '<td data-th="Total"><span class="bt-content">' + total + '</span></td>' +
                '<td data-th="Acciones"><span class="bt-content text-center">' +
                '<button class="btn btn-danger remove"' +
                'type="button">Eliminar</button>' +
                '</td>';
            $(this).attr('data-cantidad', cantidad);
            $(this).attr('data-total', total);
            $(this).append(tr);
            var total2 = $('#total_final').val();
            var total_final = parseInt(total2) - parseInt(cantidad_anterior) * parseInt(precio_compra);
            total_final = total_final + total;
            document.getElementById("total_final").value = total_final;

            /ACTUALIZAR ARREGLO/
            productos = productos.map(function(objeto) {
                return objeto.id_producto == id_producto && objeto.catalogo == id_catalogo ? {
                    "id_producto": objeto.id_producto,
                    "cantidad_producto": cantidad,
                    "precio_unidad": objeto.precio_unidad,
                    "total": parseInt(cantidad) * parseInt(objeto.precio_unidad),
                    "catalogo": id_catalogo
                } : objeto;
            });

        });
    });


    /------------------------------------------------------------------------------------------------------------------------------/

    /
    ELIMINAR UNA FILA DE LA TABLA /

        $('#table').on('click', '.remove', function() {

            $(this).parents("tr").each(function(index2) {
                var precio_compra = $(this).attr("data-precio");
                var cantidad_anterior = $(this).attr("data-cantidad");
                var id_producto = $(this).attr("data-id_producto");
                var id_catalogo = $(this).attr("data-id_catalogo");
                var total2 = $('#total_final').val();
                var total_final = parseInt(total2) - parseInt(cantidad_anterior) * parseInt(precio_compra);
                document.getElementById("total_final").value = total_final;
                productos = productos.filter(objeto => (objeto.id_producto != id_producto && objeto.id_catalogo != id_catalogo));
            });

            // Getting all the rows next to the row
            // containing the clicked button
            var child = $(this).closest('tr').nextAll();

            // Iterating across all the rows 
            // obtained to change the index
            child.each(function() {

                // Getting <tr> id.
                var id = $(this).attr('id');

                // Getting the <p> inside the .row-index class.
                var idx = $(this).children('.row-index').children('p');

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row index.
                idx.html(`Row ${dig - 1}`);

                // Modifying row id.
                $(this).attr('id', `R${dig - 1}`);
            });

            // Removing the current row.
            $(this).closest('tr').remove();

            // Decreasing total number of rows by 1.
            rowIdx--;
        });

    //alert( $('#R1').attr("data-id_catalogo"));

    function generar_pedido() {
        var sucursal = $('#sucursal').val();
        console.log("sucursal :" + sucursal);
        console.log(productos);

        var total_venta = 0;
        for (var t = 0; t < productos.length; t++) {
            total_venta += parseInt(productos[t]['total']);
        }

        var token = '{{csrf_token()}}';
        var data = {
            total_venta: total_venta,
            array_productos: productos,
            sucursal: sucursal,
            _token: token
        };

        $.ajax({
            type: "POST",
            url: "/insertar_pedido_proveedor",
            data: data,
            success: function(msg) {
                alert(msg);
                location.href = "/mostrar_pedido_proveedor"
            }
        });
    }

</script>
<script>
    jQuery(function($) {
        $('#responsive-table').basictable({
            breakpoint: 508
        })
    })

</script>
@stop
@stop
