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
            <i class="fas fa-cash-register text-dark-l3 mr-1"></i>
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
                            Selecci??n de productos:
                        </h4>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive-xl mt-4 mb-4">
                    <div class="col-md-12 mt-2">
                        <div class="row mb-2">
                            <form type="POST" id="agregar_ventas_form" class="form-row col-md-12 justify-content-center">
                                <div class="form-row col-md-12 justify-content-center">
                                    <div class="form-group col-md-2 ml-2 justify-content-center">
                                        <select class="form-control selectpicker form-control" title="-- Sucursal --" data-size="5" data-header="Seleccione sucursal" data-style="btn-primary" onChange="javascript:mostrar_productos_sucursal()" id="sucursal" name="sucursal" data-container="body" required>
                                            <?php
                                        $id_sucursal=Session::get('id_sucursal_usuario');
                                        $query2 = "select * from sucursal where id_sucursal=".$id_sucursal;
                                        $data2=DB::select($query2);      
                                        ?>
                                            @foreach($data2 as $item)
                                            <option data-tokens="Sucursal" data-sucur="{{$item->sucursal}}" value="{{$item->id_sucursal}}">{{$item->sucursal}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 ml-2">
                                        <select class="form-control selectpicker form-control" multiple data-max-options="1" data-live-search="true" title="-- Producto --" data-size="4" data-header="Selecciona una producto" data-style="btn-primary" id="productos" name="productos" data-container="body" required>
                                            <optgroup label="los chidos">

                                            </optgroup>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-1 ml-2">
                                        <input class="form-control" min="1" max="9999" step="1" type="number" placeholder="Cantidad" style="border-color:#2470BD" id="cantidad" name="cantidad">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="form-row col-md-12 justify-content-center">
                                <div class="form-group col-md-2 ml-2 justify-content-center">
                                    <button class="btn px-4 btn-primary mb-1 " onclick="mostrar_tabla()">A??adir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                        #{{$id_venta}}
                                    </small>
                                </h1>

                                <div class="page-tools">
                                    <div class="action-buttons">
                                        <a class="btn bg-white btn-light mx-1px text-95 shadow-sm" href="javascript:imprimir()" data-title="Print">
                                            <i class="mr-1 fa fa-print text-primary text-120 w-2"></i>
                                            Imprimir
                                        </a>
                                        <a class="btn bg-white btn-light mx-1px text-95 shadow-sm" href="javascript:imprimir()" data-title="PDF">
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
                                        <span class="text-dark-l2 text-90" id="sucursal_venta">

                                        </span>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <div>
                                                <div class="text-secondary-d1 text-600 text-125 align-middle">
                                                    Cliente
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="form-group col-7 col-lg-8 col-md-7 justify-content-center pl-2 mt-2 ml-2 mb-1">
                                                        <select onChange="javascript:mostrar_info()" class="form-control selectpicker form-control" multiple data-max-options="1" data-live-search="true" title="-- Cliente --" data-size="4" data-header="Selecciona un cliente" data-style="btn-primary" id="cliente" name="cliente" data-container="body" required>
                                                            <optgroup label="los chidos">

                                                            </optgroup>

                                                        </select>
                                                    </div>
                                                    <div class="col-2 text-left align-self-center pl-0 mb-1 mt-2">
                                                        <button type="button" class="btn btn-primary" data-trigger="hover" data-target="#modalNuevo" data-toggle="modal" type="button" data-placement="top" data-content="Agregar cliente" data-original-title="" title="">
                                                            <i class="fas fa-user-plus"></i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="text-dark-l1">
                                                    <div class="my-1" id="telefono_cliente">

                                                    </div>
                                                    <div class="my-1" id="correo_cliente">

                                                    </div>
                                                    <div class="my-1">
                                                        <input type="text" class="form-control mr-3" placeholder="Tipo de auto" id="auto" name="auto">
                                                    </div>
                                                    <div class="my-1" id="fecha_ultima">

                                                    </div>
                                                    <div class="my-1" id="comentario">

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
                                                     #{{$id_venta}}
                                                </div>

                                                <div class="my-2">
                                                    <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                    <span class="text-600 text-90">
                                                        Fecha:
                                                    </span>
                                                    <?php $hoy = getdate();   
                                                        echo $hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year'];
                                                        //print_r($hoy);
                                                    ?>
                                                </div>
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.?????? -->


                                    <div class="mt-4">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1" id="responsive-table">
                                                <thead class="bg-none bgc-default-tp1">
                                                    <tr class="text-white">
                                                        <th class="opacity-2">Producto/servicio</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Total</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>

                                                <tbody class="text-95 text-secondary-d3" id="table">

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12 col-sm-7 mt-2 mt-lg-0">
                                                <div class="d-inline-block text-center">
                                                    <p class="text-95 text-dark-m2">
                                                        <i class="fa fa-exclamation-triangle text-danger-m2 mr-1"></i>
                                                        Seleccione alg??n m??todo
                                                        <br>
                                                        para realizar el pago
                                                    </p>

                                                    <div>
                                                        <div autocomplete="off" class="p-2 p-sm-3 bgc-secondary-l4 radius-1 btn-group btn-group-toggle mx-n3 mx-sm-0" data-toggle="buttons">
                                                            <div role="button" class="mr-1 p-3 border-2 btn btn-brc-tp shadow-sm btn-light btn-text-blue btn-h-lighter-blue btn-a-light-blue bgc-white" title="Efectivo" onclick="limpiar()">
                                                                <input type="radio" name="pago" id="pago" value="2" required>
                                                                <i class="far fa-money-bill-alt fa-4x text-150 text-blue-d1 w-4 mx-2"></i>
                                                            </div>

                                                            <div role="button" class="mr-1 p-3 border-2 btn btn-brc-tp shadow-sm btn-text-purple btn-light btn-h-lighter-purple btn-a-light-purple bgc-white" title="Tarjeta de cr??dito" onclick="mostrar_comision()">
                                                                <input type="radio" name="pago" id="pago" value="1" required>
                                                                <i class="far fa-credit-card d-block text-150 text-purple-d1 w-4 mx-2"></i>
                                                            </div>

                                                            <div role="button" class="p-3 border-2 btn btn-brc-tp shadow-sm btn-light btn-text-orange btn-h-lighter-orange btn-a-light-orange bgc-white" title="Llantimax cr??dito" onclick="mostrar_formulario_credito()">
                                                                <input type="radio" name="pago" id="pago" value="3" required>
                                                                <i class="fas fa-clipboard-list text-150 text-orange-d3 w-4 mx-2"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-5 text-dark-l1 text-90 order-first order-sm-last">
                                                <div class="row my-2" id="comision">

                                                </div>

                                                <div class="row my-2 align-content-center" id="subtotal">

                                                </div>

                                                <div class="row my-2" id="total_extra">

                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text bgc-green-d3 text-white">$</div>
                                                    </div>
                                                    <input type="text" disabled class="form-control bgc-green-d3 text-white mr-3" id="total_final" name="total_final" value="0">
                                                </div>

                                                <div class="row my-2 align-items-center">
                                                    <div class="col-5 col-lg-7 col-sm-8 text-left">
                                                        Requiere Factura
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check mb-2 float-left">
                                                            <input class="form-check-input" type="checkbox" id="check_factura" name="check_factura">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-2 col-12 justify-content-center pr-0">
                                                    <button class="btn px-4 btn-primary mb-1 btn-lg btn-block" onclick="generar_pedido()">Finalizar Compra</button>
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

<!--MODAL AGREGAR CLIENTE -->

<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Ingresar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <form id="agregar_cliente_form">
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Nombre completo del cliente</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo del cliente" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="modelo">Telefono</label>
                                <input type="text" class="form-control mb-2" id="telefono" name="telefono" placeholder="Telefono" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Correo el??ctronico</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Email" required>
                            </div>

                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">RFC</label>
                                <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC" required>
                            </div>

                        </div>



                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="id-form-field-1" class="mb-0">
                                    Cliente habitual
                                </label>

                                <div class="radio-custom radio-default radio-inline">
                                    <label for="inputBasicMale">S??</label>
                                    <input type="radio" id="habitual" name="habitual" value="1" required>

                                </div>
                                <div class="radio-custom radio-default radio-inline">
                                    <label for="inputBasicFemale">No</label>
                                    <input type="radio" id="habitual" name="habitual" value="0" required>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">

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
<!--FIN MODAL AGREGAR CLIENTE-->

@section('scripts')

<!-- include vendor scripts used in "Bootstrap Table" page. see "/views//pages/partials/table-bootstrap/@vendor-scripts.hbs" -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/basictable@2.0.2/dist/js/jquery.basictable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('input[type=number]').forEach(node => node.addEventListener('keypress', e => {
            if (e.keyCode == 13) {
                e.preventDefault();
            }
        }))
    });

</script>
<script type="text/javascript">
    var rowIdx = 0;
    var productos = new Array();

    function mostrar_info() {
        var telefono = $('#cliente option:selected').attr("data-telefono");
        var correo = $('#cliente option:selected').attr("data-correo");

        document.getElementById("telefono_cliente").innerHTML = "";
        document.getElementById("telefono_cliente").innerHTML = "Tel??fono: " + telefono;

        document.getElementById("correo_cliente").innerHTML = "";
        document.getElementById("correo_cliente").innerHTML = "Correo: " + correo;
    }

    function mostrar_productos_sucursal() {
        var sucursal = $('#sucursal').val();
        alert(sucursal);

        var sucursal_ventas = $('#sucursal option:selected').attr("data-sucur");
        document.getElementById("sucursal_venta").innerHTML = "";
        document.getElementById("sucursal_venta").innerHTML = "Sucursal: " + sucursal_ventas;

        /*LIMPIAR CLIENTES CUANDO CAMBIE LA SUCURSAL*/
        $('#cliente').selectpicker('selectAll');
        var selected2 = [];
        selected2 = $('#cliente').val()
        alert("Valor del selected2 clientes: " + selected2.length);

        for (j = 0; j < selected2.length; j++) {
            $('#cliente').find('[value=' + selected2[j] + ']').remove();
            $('#cliente').selectpicker('refresh');
        }


        var token = '{{csrf_token()}}';
        var data = {
            sucursal: sucursal,
            _token: token
        };
        $.ajax({
            type: "POST",
            url: "/mostrar_productos_ventas",
            data: data,
            success: function(msg) {
                console.log(msg);
                var llenado = '';
                var datos = JSON.parse(msg);
                var clientes = @json($clientes);
                /*LIMPIAR PRODUCTOS CUANDO CAMBIE LA SUCURSAL*/
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
                document.getElementById("total_extra").innerHTML = "";
                document.getElementById("subtotal").innerHTML = "";
                document.getElementById("total_final").value = 0;
                document.getElementById("comision").innerHTML = "";

                productos = new Array();


                datos.forEach(objeto => {

                    if (objeto.cantidad > 0) {
                        $('#productos').append('<option data-thumbnail="assets/image/user.JPG' + objeto.foto + '"  value="' + objeto.id_producto + '"data-producto="' + objeto.nombre_producto + '" data-cantidad="' + objeto.cantidad + '" data-categoria="' + objeto.categoria + '" data-marca="' + objeto.marca + '" data-modelo="' + objeto.modelo + '" data-subtext="Categoria: ' + objeto.categoria + '; Marca: ' + objeto.marca + '; Modelo: ' + objeto.modelo + '; Sucursal: ' + objeto.sucursal + '; Cantidad: ' + objeto.cantidad + '" showSubtext="true" data-precio="' + objeto.precio + '" data-foto="' + objeto.foto + '" data-sucursal="' + objeto.sucursal + '" data-suc="' + objeto.id_sucursal + '">' + objeto.nombre_producto + '</option>');
                        $("#productos").selectpicker("refresh");
                    }

                });

                clientes.forEach(objeto => {
                    if (objeto.id_sucursal == sucursal) {
                        $('#cliente').append('<option  value="' + objeto.id_cliente + '" data-nombre="' + objeto.nombre_completo + '" data-suc="' + objeto.sucursal + '" data-telefono="' + objeto.telefono + '" data-correo="' + objeto.correo_electronico + '">' + objeto.nombre_completo + '</option>');
                        $("#cliente").selectpicker("refresh");
                    }
                });
            }
        });
    }



    function mostrar_tabla() {

        if ($("#agregar_ventas_form")[0].checkValidity()) {
            event.preventDefault();
            /Value tiene el valor del producto/
            /*OBTENER LOS VALORES DE LOS OTROS DATA */
            // var datos=$('#productos option:selected').attr("data-value2");
            var canti = document.getElementById("cantidad").value;
            if (canti == "") {
                document.getElementById("cantidad").value = "1";
            }
            var cantidad = document.getElementById("cantidad").value;
            var sucursal = $('#sucursal').val();
            var id_producto = $('#productos').val()[0];
            var nombre_producto = $('#productos option:selected').attr("data-producto");
            var categoria = $('#productos option:selected').attr("data-categoria");
            var marca = $('#productos option:selected').attr("data-marca");
            var modelo = $('#productos option:selected').attr("data-modelo");
            var precio = $('#productos option:selected').attr("data-precio");
            var foto = $('#productos option:selected').attr("data-foto");
            var nombre_sucursal = $('#productos option:selected').attr("data-sucursal");
            var id_sucursal = $('#productos option:selected').attr("data-suc");
            var cantidad_suc = $('#productos option:selected').attr("data-cantidad");
            var bandera = 0;
            let pago = $('input[name="pago"]:checked').val();
            alert("Imprimo valor de pago: " + pago + "tipo de pago " + typeof(pago));
            alert("cantidad_sucu" + cantidad_suc);
            alert("cantidad_ingresada" + cantidad);
            /*VERIFICAR QUE LA CANTIDAD INGRESADA SEA MENOR QUE LA EXISTENTE*/
            if (parseInt(cantidad_suc) >= parseInt(cantidad)) {
                /*PROCEDER A INSERTAR*/
                /*VERIFICAR SI LA TABLA TIENE FILAS*/
                if ($("#responsive-table tbody tr").length != 0) {
                    /*EVALUAR SI EXISTE EL PRODUCTO AGREGADO EN LA TABLA*/
                    $("#responsive-table tbody tr").each(function(index_tr) {
                        if (bandera == 0) {
                            var t_idsucursal = ($(this).attr("data-id_sucursal"));
                            var t_idproducto = ($(this).attr("data-id_producto"));

                            /*SI EL PRODUCTO EXISTE, LO ACTUALIZA*/
                            if (id_sucursal == t_idsucursal && id_producto == t_idproducto) {
                                //var t_cantidad = document.getElementById("cant").value;
                                bandera = 1;
                                var t_cantidad = ($(this).attr("data-cantidad"));
                                alert("Imprimo t_cant:" + t_cantidad);
                                alert("Imprimo cantidad_arriba:" + cantidad);
                                alert("Suma cantidades: suma del input cant + suma del input arriba : " + t_cantidad + " + " + cantidad);

                                /*VERIFICAR QUE LA SUMA DE PRODUCTOS AGREGADOS SEA MENOR AL STOCK*/
                                if (parseInt(cantidad_suc) >= (parseInt(cantidad) + parseInt(t_cantidad))) {
                                    /*SI EL STOCK ES MAYOR, SE PROCEDE A ACTUALIZAR*/
                                    cantidad = parseInt(t_cantidad) + parseInt(cantidad);
                                    alert("Valor nuevo: " + cantidad);

                                    $(this).attr('data-cantidad', cantidad);
                                    $(this).attr('data-total', parseInt(cantidad) * parseInt(precio));
                                    //$(this).dataset.cantidad = cantidad;
                                    $(this).html("");
                                    /*LIMPIA EL CONTENIDO DE TR PARA EVITAR DUPLICADOS*/
                                    var tr = '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                                        '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input  class="col-9" style="padding-left:0px;" min="1" max="9999" step="1" type="number" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                                        '<td data-th="Precio unitario"><span class="bt-content">' + precio + '</span></td>' +
                                        '<td data-th="Total"><span class="bt-content">' + parseInt(cantidad) * parseInt(precio) + '</span></td>' +
                                        '<td data-th="Acciones"><span class="bt-content text-center">' +
                                        '<button class="btn btn-danger remove"' +
                                        'type="button">Eliminar</button>' +
                                        '</td>';
                                    $(this).append(tr);

                                    var total = $('#total_final').val();
                                    var total_final = total - (parseInt(t_cantidad) * parseInt(precio));
                                    total_final = total_final + (parseInt(cantidad) * parseInt(precio));
                                    document.getElementById("total_final").value = total_final;
                                    /*ACTUALIZAR ARREGLO*/
                                    productos = productos.map(function(objeto) {
                                        return objeto.id_producto == id_producto && objeto.id_sucursal == id_sucursal ? {
                                            "id_producto": objeto.id_producto,
                                            "cantidad_producto": cantidad,
                                            "precio_unidad": objeto.precio_unidad,
                                            "total": parseInt(cantidad) * parseInt(objeto.precio_unidad),
                                            "nombre_producto": nombre_producto,
                                            "id_sucursal": id_sucursal
                                        } : objeto;
                                    });
                                    console.log("ANTES DEL IF ");
                                    console.log(productos);

                                    if (pago == undefined || pago == "2") {
                                        alert("no es llantimax");

                                        limpiar();
                                    } else
                                    if (pago == "3") {
                                        alert("es llantimax");

                                        mostrar_formulario_credito();

                                    }


                                } else {
                                    /*NO HAY STOCK SUFICIENTE*/
                                    $.aceToaster.add({
                                        placement: 'br',
                                        body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>No es posible agregar esa cantidad. La cantidad que desea agregar es mayor al stock actual</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",

                                        width: 480,
                                        delay: 5000,

                                        close: false,

                                        className: 'shadow border-none radius-0 border-l-4 brc-danger',

                                        bodyClass: 'border-0 p-0',
                                        headerClass: 'd-none'
                                    })
                                }
                            }
                        }
                    });
                    /*SI NO EXISTE EL ELEMENTO, ENTONCES LO INSERTA*/
                    if (bandera == 0) {
                        alert("nueva fila");
                        // Nueva fila dentro de tbody.
                        $('#table').append(`<tr id="R${++rowIdx}" data-id_sucursal="${id_sucursal}" data-id_producto="${id_producto}" data-precio="${precio}" data-producto="${nombre_producto}"  data-total="${parseInt(cantidad) * parseInt(precio)}" data-cantidad="${cantidad}">` +
                            '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                            '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input class="col-9" style="padding-left:0px;" type="number" min="1" max="9999" step="1" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                            '<td data-th="Precio unitario"><span class="bt-content">' + precio + '</span></td>' +
                            '<td data-th="Total"><span class="bt-content">' + parseInt(cantidad) * parseInt(precio) + '</span></td>' +
                            '<td data-th="Acciones"><span class="bt-content text-center">' +
                            '<button class="btn btn-danger remove"' +
                            'type="button">Eliminar</button>' +
                            '</td>' +
                            '</tr>');
                        var total = $('#total_final').val();
                        var total_final = parseInt(total) + (parseInt(cantidad) * parseInt(precio));
                        document.getElementById("total_final").value = total_final;
                        /INSERTA EN OBJETO Y A??ADE A ARREGLO/
                        var producto = {
                            "id_producto": id_producto,
                            "cantidad_producto": cantidad,
                            "precio_unidad": precio,
                            "total": parseInt(cantidad) * parseInt(precio),
                            "nombre_producto": nombre_producto,
                            "id_sucursal": id_sucursal
                        };
                        productos.push(producto);

                        console.log(productos);

                        if (pago == undefined || pago == "2") {
                            alert("no es llantimax");

                            limpiar();
                        } else
                        if (pago == "3") {
                            alert("es llantimax");

                            mostrar_formulario_credito();

                        }


                    }
                } else {
                    // Nueva fila dentro de tbody.

                    alert(typeof(id_producto));

                    $('#table').append(`<tr id="R${++rowIdx}" data-id_sucursal="${id_sucursal}" data-id_producto="${id_producto}" data-precio="${precio}" data-producto="${nombre_producto}"  data-total="${parseInt(cantidad) * parseInt(precio)}" data-cantidad="${cantidad}">` +
                        '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                        '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input class="col-9" style="padding-left:0px;" type="number" min="1" max="9999" step="1" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                        '<td data-th="Precio unitario"><span class="bt-content">' + precio + '</span></td>' +
                        '<td data-th="Total"><span class="bt-content">' + parseInt(cantidad) * parseInt(precio) + '</span></td>' +
                        '<td data-th="Acciones"><span class="bt-content text-center">' +
                        '<button class="btn btn-danger remove"' +
                        'type="button">Eliminar</button>' +
                        '</td>' +
                        '</tr>');
                    var total = $('#total_final').val();
                    var total_final = parseInt(total) + (parseInt(cantidad) * parseInt(precio));
                    document.getElementById("total_final").value = total_final;
                    /INSERTA EN OBJETO Y A??ADE A ARREGLO/
                    var producto = {
                        "id_producto": id_producto,
                        "cantidad_producto": cantidad,
                        "precio_unidad": precio,
                        "total": parseInt(cantidad) * parseInt(precio),
                        "nombre_producto": nombre_producto,
                        "id_sucursal": id_sucursal
                    };
                    productos.push(producto);

                    console.log(productos);

                    if (pago == undefined || pago == "2") {
                        alert("no es llantimax");

                        limpiar();
                    } else
                    if (pago == "3") {
                        alert("es llantimax");

                        mostrar_formulario_credito();

                    }
                }
            } else {
                /*DEVOLVER MENSAJE QUE NO ES POSIBLE INSERTAR*/
                $.aceToaster.add({
                    placement: 'br',
                    body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>No es posible agregar esa cantidad. La cantidad que desea agregar es mayor al stock actual</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",

                    width: 480,
                    delay: 5000,

                    close: false,

                    className: 'shadow border-none radius-0 border-l-4 brc-danger',

                    bodyClass: 'border-0 p-0',
                    headerClass: 'd-none'
                })

            }


        } else {
            $("#agregar_ventas_form")[0].reportValidity();
        }
    }

    /*Actualizar fila al cambiar valor del input cantidad*/

    $('#table').on('change', '#cant', function(index) {

        let pago = $('input[name="pago"]:checked').val();
        var cantidad_suc = $('#productos option:selected').attr("data-cantidad");
        var valores = "";
        var valor_anterior_aux = "";
        $(this).parents("tr").each(function(index2) {
            var input_cantidad = $(this).find("#cant");
            var id_sucursal = $(this).attr("data-id_sucursal");
            var id_producto = $(this).attr("data-id_producto");
            var nombre_producto = $(this).attr("data-producto");
            var precio_compra = $(this).attr("data-precio");
            var producto = $(this).attr("data-producto");
            var cantidad = $(this).find("#cant").val();
            var cantidad_anterior = $(this).attr("data-cantidad");
            var total = parseInt($(this).find("#cant").val()) * parseInt($(this).attr("data-precio"));
            alert(input_cantidad[0].checkValidity());
            alert($(this).find("#cant")[0].checkValidity());
            if ($(this).find("#cant")[0].checkValidity()) {


                alert(cantidad_anterior);

                if (parseInt(cantidad_suc) >= cantidad) {
                    $(this).html("");
                    var tr = '<td data-th="Producto"><span class="bt-content">' + producto + '</span></td>' +
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
                    /*ACTUALIZAR ARREGLO*/
                    productos = productos.map(function(objeto) {
                        return objeto.id_producto == id_producto && objeto.id_sucursal == id_sucursal ? {
                            "id_producto": objeto.id_producto,
                            "cantidad_producto": cantidad,
                            "precio_unidad": objeto.precio_unidad,
                            "total": parseInt(cantidad) * parseInt(objeto.precio_unidad),
                            "nombre_producto": nombre_producto,
                            "id_sucursal": id_sucursal
                        } : objeto;
                    });
                    alert(pago);

                    if (pago == undefined || pago == "2") {
                        alert("no es llantimax");

                        limpiar();
                    } else
                    if (pago == "3") {
                        alert("es llantimax");

                        mostrar_formulario_credito();

                    }
                } else {
                    $.aceToaster.add({
                        placement: 'br',
                        body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>No es posible agregar esa cantidad. La cantidad que desea agregar es mayor al stock actual</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",

                        width: 480,
                        delay: 5000,

                        close: false,

                        className: 'shadow border-none radius-0 border-l-4 brc-danger',

                        bodyClass: 'border-0 p-0',
                        headerClass: 'd-none'
                    })
                }
            } else {
                $(this).find("#cant")[0].reportValidity();
                $(this).find("#cant").val(cantidad_anterior);
            }


        });
    });


    /*------------------------------------------------------------------------------------------------------------------------------*/

    /*ELIMINAR UNA FILA DE LA TABLA*/

    $('#table').on('click', '.remove', function() {

        $(this).parents("tr").each(function(index2) {
            let pago = $('input[name="pago"]:checked').val();
            var precio_compra = $(this).attr("data-precio");
            var cantidad_anterior = $(this).attr("data-cantidad");
            var id_producto = $(this).attr("data-id_producto");
            var id_sucursal = $(this).attr("data-id_sucursal");
            var total2 = $('#total_final').val();
            var total_final = parseInt(total2) - parseInt(cantidad_anterior) * parseInt(precio_compra);
            document.getElementById("total_final").value = total_final;
            console.log(precio_compra + "  " + cantidad_anterior + "  " + id_producto + "  " + id_sucursal + "  " + total2 + "   " + total_final);

            console.log("productos antes")
            console.log(productos);
            var info = "";
            var total_venta = 0;

            console.log(info);
            console.log("numero :" + total_venta);

            productos = productos.filter(objeto => (objeto.id_producto != id_producto));
            console.log("despues productos");
            console.log(productos);

            if (pago == undefined || pago == "2") {
                alert("no es llantimax");

                limpiar();
            } else
            if (pago == "3") {
                alert("es llantimax");

                mostrar_formulario_credito();

            }

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
        let metodo_pago = $('input[name="pago"]:checked').val();
        var id_cliente = $('#cliente').val();
        alert(id_cliente);
        var auto = document.getElementById('auto').value;
        console.log(metodo_pago);
        console.log(id_cliente);
        console.log(auto);
        if (productos.length > 0) {
            if (metodo_pago != undefined) {
                if (auto != "") {
                    if (id_cliente != "") {
                        var sucursal = $('#sucursal').val();
                        console.log("sucursal :" + sucursal);
                        console.log(productos);
                        //let metodo_pago = $('input[name="pago"]:checked').val();
                        //var id_cliente = $('#cliente').val();
                        //var auto = document.getElementById('auto').value;
                        var total_venta = 0;
                        for (var t = 0; t < productos.length; t++) {
                            total_venta += parseInt(productos[t]['total']);
                        }


                        var factura = 0;
                        var checado = document.getElementById('check_factura').checked;
                        if (checado) {
                            factura = 1;
                        } else {
                            factura = 0;
                        }

                        console.log(total_venta);
                        console.log(metodo_pago);
                        console.log(factura);
                        console.log(id_cliente);



                        var comentario_credito = "";
                        var fecha_credito = "";


                        console.log(productos);


                        if (metodo_pago == "3") {
                            fecha_credito = document.getElementById('fecha').value;
                            comentario_credito = document.getElementById('descripcion').value;
                            if (fecha_credito == "" || comentario_credito == "") {
                                $.aceToaster.add({
                                    placement: 'br',
                                    body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Porfavor llene todos los campos.</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",

                                    width: 480,
                                    delay: 5000,

                                    close: false,

                                    className: 'shadow border-none radius-0 border-l-4 brc-danger',

                                    bodyClass: 'border-0 p-0',
                                    headerClass: 'd-none'
                                })
                                return 0;
                            }

                        } else {
                            fecha_credito = "";
                            comentario_credito = "";
                        }
                        var comision = $('#comision_venta').val();

                        if (metodo_pago == "1") {
                            var comision = $('#comision_venta').val();
                            if (comision == "") {
                                $.aceToaster.add({
                                    placement: 'br',
                                    body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Porfavor ingrese la comisi??n a cobrar.</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",
                                    width: 480,
                                    delay: 5000,
                                    close: false,
                                    className: 'shadow border-none radius-0 border-l-4 brc-danger',
                                    bodyClass: 'border-0 p-0',
                                    headerClass: 'd-none'
                                })
                                return 0;
                            }

                        } else {
                            comision = "0";
                        }

                        alert("Generando venta");
                        var token = '{{csrf_token()}}';
                        var data = {
                            id_cliente: id_cliente,
                            id_sucursal: sucursal,
                            id_metodo_pago: metodo_pago,
                            total_venta: total_venta,
                            factura: factura,
                            array_productos: productos,
                            fecha: fecha_credito,
                            descripcion: comentario_credito,
                            comision: comision,
                            auto: auto,
                            _token: token
                        };
                        console.log(data);
                        $.ajax({
                            type: "POST",
                            url: "/insertar_venta",
                            data: data,
                            success: function(msg) {
                                console.log(msg);
                                console.log(typeof(msg));
                                console.log(msg === "si");
                                if (msg === "si") {
                                    $.aceToaster.add({
                                        placement: 'rc',
                                        body: "<p class='p-3 mb-0 text-center text-white'>\
                                            <span class='d-inline-block mb-3 border-2 bgc-white radius-round p-25'>\
                                            <i class='fa fa-check fa-2x mx-1px text-success'></i>\
                                            </span><br />\
                                            <span class='text-125'>Venta realizada correctamente</span>\
                                            </p>\
                                            <button data-dismiss='toast' class='close position-tr mt-1 mr-2 text-white'>&times;</button>\ ",
                                        width: 360,
                                        delay: 4000,
                                        close: false,
                                        className: 'bgc-success-d2 shadow ',
                                        bodyClass: 'border-0 p-0',
                                        headerClass: 'd-none',
                                        progress: 'position-bl bgc-white-tp4 py-2px m-1px',
                                        progressReverse: true
                                    })

                                    var url = "https://www.sat.gob.mx/personas/factura-electronica";
                                    window.open(
                                        url,
                                        '_blank' // <- This is what makes it open in a new window.
                                    );
                                    location.href = "/mostrar_ventas_realizadas_sucursal";
                                } else {
                                    $.aceToaster.add({
                                        placement: 'rc',
                                        body: "<p class='p-3 mb-0 text-center text-white'>\
                                            <span class='d-inline-block mb-3 border-2 bgc-white radius-round p-25'>\
                                            <i class='fa fa-check fa-2x mx-1px text-success'></i>\
                                            </span><br />\
                                            <span class='text-125'>Venta realizada correctamente</span>\
                                            </p>\
                                            <button data-dismiss='toast' class='close position-tr mt-1 mr-2 text-white'>&times;</button>\ ",
                                        width: 360,
                                        delay: 4000,
                                        close: false,
                                        className: 'bgc-success-d2 shadow ',
                                        bodyClass: 'border-0 p-0',
                                        headerClass: 'd-none',
                                        progress: 'position-bl bgc-white-tp4 py-2px m-1px',
                                        progressReverse: true
                                    })
                                    location.href = "/mostrar_ventas_realizadas_sucursal";
                                }

                            }
                        }).fail(function(jqXHR, textStatus, errorThrown) {

                            if (jqXHR.status === 0) {

                                alert('Not connect: Verify Network.');

                            } else if (jqXHR.status == 404) {

                                alert('Requested page not found [404]');

                            } else if (jqXHR.status == 500) {

                                alert('Internal Server Error [500].');

                            } else if (textStatus === 'parsererror') {

                                alert('Requested JSON parse failed.');
                                alert(msg);

                            } else if (textStatus === 'timeout') {

                                alert('Time out error.');

                            } else if (textStatus === 'abort') {

                                alert('Ajax request aborted.');

                            } else {

                                alert('Uncaught Error: ' + jqXHR.responseText);

                            }

                        });
                    } else {
                        $.aceToaster.add({
                            placement: 'br',
                            body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Seleccione el cliente para realizar la venta.</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",

                            width: 480,
                            delay: 5000,

                            close: false,

                            className: 'shadow border-none radius-0 border-l-4 brc-danger',

                            bodyClass: 'border-0 p-0',
                            headerClass: 'd-none'
                        })
                    }
                } else {
                    $.aceToaster.add({
                        placement: 'br',
                        body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Escriba para que tipo de auto es.</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",

                        width: 480,
                        delay: 5000,

                        close: false,

                        className: 'shadow border-none radius-0 border-l-4 brc-danger',

                        bodyClass: 'border-0 p-0',
                        headerClass: 'd-none'
                    })
                }

            } else {

                $.aceToaster.add({
                    placement: 'br',
                    body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Elija la forma de pago</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",

                    width: 480,
                    delay: 5000,

                    close: false,

                    className: 'shadow border-none radius-0 border-l-4 brc-danger',

                    bodyClass: 'border-0 p-0',
                    headerClass: 'd-none'
                })
            }
        } else {
            $.aceToaster.add({
                placement: 'br',
                body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Eliga productos</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",

                width: 480,
                delay: 5000,

                close: false,

                className: 'shadow border-none radius-0 border-l-4 brc-danger',

                bodyClass: 'border-0 p-0',
                headerClass: 'd-none'
            })
        }

    }

    function imprimir() {
        let metodo_pago = $('input[name="pago"]:checked').val();
        var id_cliente = $('#cliente').val();
        var auto = document.getElementById('auto').value;
        console.log(metodo_pago);
        console.log(id_cliente);
        console.log(auto);
        if (productos.length > 0) {
            if (metodo_pago != undefined) {
                if (auto != "") {
                    if (id_cliente != "") {
                        var sucursal = $('#sucursal').val();
                        console.log("sucursal :" + sucursal);
                        console.log(productos);
                        var total_venta = 0;
                        for (var t = 0; t < productos.length; t++) {
                            total_venta += parseInt(productos[t]['total']);
                        }


                        var factura = 0;
                        var checado = document.getElementById('check_factura').checked;
                        if (checado) {
                            factura = 1;
                        } else {
                            factura = 0;
                        }

                        console.log(total_venta);
                        console.log(metodo_pago);
                        console.log(factura);
                        console.log(id_cliente);
                        var comentario_credito = "";
                        var fecha_credito = "";
                        console.log(productos);
                        if (metodo_pago == "3") {
                            fecha_credito = document.getElementById('fecha').value;
                            comentario_credito = document.getElementById('descripcion').value;
                            if (fecha_credito == "" || comentario_credito == "") {
                                $.aceToaster.add({
                                    placement: 'br',
                                    body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Porfavor llene todos los campos.</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",
                                    width: 480,
                                    delay: 5000,
                                    close: false,
                                    className: 'shadow border-none radius-0 border-l-4 brc-danger',
                                    bodyClass: 'border-0 p-0',
                                    headerClass: 'd-none'
                                })
                                return 0;
                            }

                        } else {
                            fecha_credito = "";
                            comentario_credito = "";
                        }
                        if (metodo_pago == "1") {
                            var comision = $('#comision_venta').val();
                            if (comision == "") {
                                $.aceToaster.add({
                                    placement: 'br',
                                    body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Porfavor ingrese la comisi??n a cobrar.</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",
                                    width: 480,
                                    delay: 5000,
                                    close: false,
                                    className: 'shadow border-none radius-0 border-l-4 brc-danger',
                                    bodyClass: 'border-0 p-0',
                                    headerClass: 'd-none'
                                })
                                return 0;
                            }

                        } else {
                            comision = "";
                        }
                        var telefono = $('#cliente option:selected').attr("data-telefono");
                        var correo = $('#cliente option:selected').attr("data-correo");
                        var nombre_cliente = $('#cliente option:selected').attr("data-nombre");
                        var sucursal_cliente = $('#cliente option:selected').attr("data-suc");
                        alert("Generando venta");
                        var token = '{{csrf_token()}}';
                        var datos = new Array();
                        var data = {
                            id_cliente: id_cliente,
                            id_sucursal: sucursal,
                            id_metodo_pago: metodo_pago,
                            total_venta: total_venta,
                            factura: factura,
                            array_productos: productos,
                            fecha: fecha_credito,
                            descripcion: comentario_credito,
                            auto: auto,
                            nombre_cliente: nombre_cliente,
                            sucursal_cliente: sucursal_cliente,
                            correo_cliente: correo,
                            telefono: telefono,
                            comision: comision,
                            _token: token
                        };
                        datos.push(data);
                        var url = '/imprimir_venta/' + JSON.stringify(datos);
                        window.open(
                            url,
                            '_blank' // <- This is what makes it open in a new window.
                        );
                    } else {
                        $.aceToaster.add({
                            placement: 'br',
                            body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Seleccione el cliente para realizar la venta.</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",
                            width: 480,
                            delay: 5000,
                            close: false,
                            className: 'shadow border-none radius-0 border-l-4 brc-danger',
                            bodyClass: 'border-0 p-0',
                            headerClass: 'd-none'
                        })
                    }
                } else {
                    $.aceToaster.add({
                        placement: 'br',
                        body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Escriba para que tipo de auto es.</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",
                        width: 480,
                        delay: 5000,
                        close: false,
                        className: 'shadow border-none radius-0 border-l-4 brc-danger',
                        bodyClass: 'border-0 p-0',
                        headerClass: 'd-none'
                    })
                }
            } else {

                $.aceToaster.add({
                    placement: 'br',
                    body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Elija la forma de pago</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",
                    width: 480,
                    delay: 5000,
                    close: false,
                    className: 'shadow border-none radius-0 border-l-4 brc-danger',
                    bodyClass: 'border-0 p-0',
                    headerClass: 'd-none'
                })
            }
        } else {
            $.aceToaster.add({
                placement: 'br',
                body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Eliga productos</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",
                width: 480,
                delay: 5000,
                close: false,
                className: 'shadow border-none radius-0 border-l-4 brc-danger',
                bodyClass: 'border-0 p-0',
                headerClass: 'd-none'
            })
        }
    }

    function enviar_datos() {
        if ($("#agregar_cliente_form")[0].checkValidity()) {
            event.preventDefault();
            var nombre = document.getElementById("nombre").value;
            var rfc = document.getElementById("rfc").value;

            var telefono = document.getElementById("telefono").value;
            var correo = document.getElementById("correo").value;
            //var habitual = document.getElementById("habitual").value;

            let habitual = $('input[name="habitual"]:checked').val();

            var token = '{{csrf_token()}}';
            var data = {
                nombre: nombre,

                rfc: rfc,
                telefono: telefono,
                correo: correo,
                habitual: habitual,
                _token: token
            };

            $.ajax({
                type: "POST",
                url: "/agregar_cliente_sucursal",
                data: data,
                success: function(msg) {
                    location.href = "/mostrar_clientes_sucursal"
                }
            });
        } else {
            //SI HAY ERROR DE VALIDACI??N, ENV??A EL MENSAJE DE ERROR
            $("#agregar_cliente_form")[0].reportValidity();
        }

    }


    function mostrar_formulario_credito() {

        document.getElementById("fecha_ultima").innerHTML = "";
        document.getElementById("comentario").innerHTML = "";
        document.getElementById("comision").innerHTML = "";
        document.getElementById("fecha_ultima").innerHTML = '<input type="date" name="fecha" id="fecha">';
        document.getElementById("comentario").innerHTML = '<textarea class="form-control" id="descripcion" name="descripcion" required placeholder="Descripci??n"></textarea>'
        //var total = $('#total_final').val();
        var total_venta = 0;
        for (var t = 0; t < productos.length; t++) {
            total_venta += parseInt(productos[t]['total']);
        }
        //var comision = parseInt(total_venta) * 0.03;
        //alert(comision + "    " + total_venta);
        //var total_extra = parseInt(total_venta) + comision;
        /*document.getElementById("total_extra").innerHTML = "";
        document.getElementById("total_extra").innerHTML = '<div class="col-6 text-left">' +
            'Comisi??n (3%)' +
            '</div>' +

            '<div class="col-5" style=" padding-left: 0px;">' +
            '<span class="text-125 text-secondary-d3 float-left  ">' +
            '$' + comision.toFixed(2) +
            '</span>' +
            '</div>';*/

        document.getElementById("subtotal").innerHTML = "";
        document.getElementById("subtotal").innerHTML = '<div class="col-4 text-left">' +
            'SubTotal' +
            '</div>' +
            '<div class="col-5 align-content-center">' +
            '<span class="text-125 text-secondary-d3 float-right">' +
            '$' + total_venta +
            '</span>' +
            '</div>';
        document.getElementById("total_final").value = total_venta;
    }

    function limpiar() {

        var total_venta = 0;
        for (var t = 0; t < productos.length; t++) {
            total_venta += parseInt(productos[t]['total']);
        }
        document.getElementById("fecha_ultima").innerHTML = '';
        document.getElementById("comision").innerHTML = "";
        document.getElementById("comentario").innerHTML = '';
        document.getElementById("total_extra").innerHTML = "";
        document.getElementById("subtotal").innerHTML = "";
        document.getElementById("subtotal").innerHTML = '<div class="col-4 text-left">' +
            'SubTotal' +
            '</div>' +
            '<div class="col-5 align-content-center">' +
            '<span class="text-125 text-secondary-d3 float-right">' +
            '$' + total_venta +
            '</span>' +
            '</div>';
        alert(total_venta);
        document.getElementById("total_final").value = total_venta;
    }

    function mostrar_comision() {
        var total_venta = 0;
        for (var t = 0; t < productos.length; t++) {
            total_venta += parseInt(productos[t]['total']);
        }
        document.getElementById("fecha_ultima").innerHTML = '';
        document.getElementById("comentario").innerHTML = '';
        document.getElementById("total_extra").innerHTML = "";
        document.getElementById("subtotal").innerHTML = "";
        document.getElementById("subtotal").innerHTML = '<div class="col-4 text-left">' +
            'SubTotal' +
            '</div>' +
            '<div class="col-5 align-content-center">' +
            '<span class="text-125 text-secondary-d3 float-right">' +
            '$' + total_venta +
            '</span>' +
            '</div>';
        document.getElementById("comision").innerHTML = "";
        document.getElementById("comision").innerHTML = '<select class="form-control selectpicker form-control" title="-- Comisi??n --" data-size="5" data-header="Seleccione comisi??n" data-style="btn-primary" onChange="javascript:mostrar_total_extra()" id="comision_venta" name="comision_venta" data-container="body" required>' +
            '</select>';

        $('#comision_venta').append('<option value="0.01">1%</option>');
        $("#comision_venta").selectpicker("refresh");
        $('#comision_venta').append('<option value="0.02">2%</option>');
        $("#comision_venta").selectpicker("refresh");
        $('#comision_venta').append('<option value="0.03">3%</option>');
        $("#comision_venta").selectpicker("refresh");
        $('#comision_venta').append('<option value="0.04">4%</option>');
        $("#comision_venta").selectpicker("refresh");
        $('#comision_venta').append('<option value="0.05">5%</option>');
        $("#comision_venta").selectpicker("refresh");

    }

    function mostrar_total_extra() {

        document.getElementById("fecha_ultima").innerHTML = "";
        document.getElementById("comentario").innerHTML = "";
        document.getElementById("fecha_ultima").innerHTML = '';
        document.getElementById("comentario").innerHTML = ''

        var total_venta = 0;
        for (var t = 0; t < productos.length; t++) {
            total_venta += parseInt(productos[t]['total']);
        }
        var comision = $('#comision_venta').val();
        var comision_total = parseInt(total_venta) * parseFloat(comision);
        //alert(comision + "    " + total_venta);
        var total_extra = parseInt(total_venta) + comision_total;
        document.getElementById("total_extra").innerHTML = "";
        document.getElementById("total_extra").innerHTML = '<div class="col-6 text-left">' +
            'Comisi??n' +
            '</div>' +

            '<div class="col-5" style=" padding-left: 0px;">' +
            '<span class="text-125 text-secondary-d3 float-left  ">' +
            '$' + comision_total.toFixed(2) +
            '</span>' +
            '</div>';

        document.getElementById("subtotal").innerHTML = "";
        document.getElementById("subtotal").innerHTML = '<div class="col-4 text-left">' +
            'SubTotal' +
            '</div>' +
            '<div class="col-5 align-content-center">' +
            '<span class="text-125 text-secondary-d3 float-right">' +
            '$' + total_venta +
            '</span>' +
            '</div>';

        document.getElementById("total_final").value = total_extra;
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
