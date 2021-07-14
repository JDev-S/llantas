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
        <h1 class="page-title text-primary-d3">
            <i class="fas fa-clipboard-list text-dark-l3 mr-1"></i>
            Agregar productos al proveedor
            <!--<small class="page-info text-secondary-d2">
                <i class="fa fa-angle-double-right text-80"></i>
                extended tables plugin
            </small>-->
        </h1>
    </div>
    <div class="card bcard mt-4">
        <div class="card-body p-0 border-x-0 border-y-0 border-b-0 brc-default-m4 radius-0">
            <div class="mt-0 mt-lg-0 card dcard h-auto overflow-hidden shadow border-t-0 ml-0 mr-0">
                <div class="col-md-12">
                    <div class="card-header t-border-1 mb-0 mt-2">
                        <h5 class="text-success-d4 mb-0">
                            Llena el formulario:
                        </h5>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive-xl mt-4 mb-4">
                    <div class="col-md-12 mt-2">
                        <div class="row mb-2 ">
                            <form id="agregar_catalogo_form" class=" form-row col-md-12 justify-content-center">
                                <div class="form-row col-md-12 justify-content-center">
                                    <div class="form-group col-md-2 ml-2 justify-content-center">
                                        <select class="form-control selectpicker form-control" title="-- Sucursal --" data-size="5" data-header="Seleccione sucursal" data-style="btn-primary" id="sucursal" name="sucursal" onchange="javascript:uso_sucursal()" data-container="body" required>
                                            <option data-divider="true"></option>
                                            <?php
                                            $query = "select * from sucursal ";
                                            $sucursales=DB::select($query);
                                        ?>
                                            <option value="0">General</option>
                                            @foreach($sucursales as $sucursal)
                                            <option data-tokens="{{$sucursal->id_sucursal}}" value="{{$sucursal->id_sucursal}}">{{$sucursal->sucursal}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 ml-2 justify-content-center" id="mostrar_categorias" name="mostrar_categorias">
                                        <!-- SELECT DE CATEGORIAS -->
                                    </div>
                                    <div class="form-group col-md-2 ml-2 justify-content-center">
                                        <select class="form-control selectpicker form-control" multiple data-max-options="1" title="-- Proveedores--" data-size="5" data-header="Seleccione un proveedor" data-style="btn-primary" id="mostrar_proveedores" name="mostrar_proveedores" data-container="body" required>
                                            <option data-divider="true"></option>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 ml-2">
                                        <select class="form-control selectpicker " multiple data-max-options="1" data-live-search="true" title="-- Productos --" data-size="4" data-header="Selecciona un producto" data-style="btn-primary" id="productos" name="productos" data-container="body" required>
                                            <optgroup label="los chidos">
                                                <option data-divider="true"></option>

                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-1 ml-2">
                                        <input class="form-control" min="1" step="1" type="number" placeholder="Precio" style="border-color:#2470BD" id="precio" name="precio" required>
                                    </div>
                                </div>
                            </form>
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

            <div class="col-auto mt-5 shadow">
                <div class="card acard h-100">
                    <div class="card-header t-border-1 mb-2 mt-2">
                        <div class="row col-12">
                            <div class="col clearfix">
                                <span class="float-left">
                                    <h5 class="text-success-d4 mb-1">
                                        Detalles:
                                    </h5>
                                </span>
                                <span class="float-right">
                                    <div class="row justify-content-between">
                                        <button class="btn-primary mb-1 px-4 btn" style="padding-right:20px;" onclick="generar_pedido()">Realizar pedido</button>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 p-md-3">
                        <div class="panel panel-default">
                            <div class="panel-body table-responsive">
                                <table class="table table-striped-success table-borderless text-dark-m1 mb-0 justify-content-center two-axis" id="responsive-table">
                                    <thead>
                                        <tr class="bgc-success-d3 text-white">
                                            <th class="align-middle"><b>Producto</b></th>
                                            <th class="align-middle"><b>Marca</b></th>
                                            <th class="align-middle"><b>Modelo</b></th>
                                            <th class="align-middle"><b>Proveedor</b></th>
                                            <th class="align-middle"><b>Precio</b></th>
                                            <th class="align-middle"><b>Acciones</b></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bgc-success-d2" id="table">
                                    </tbody>
                                </table>
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
    var id_sucursal = "";
    var nombre_categoria = "";
    var rowIdx = 0;
    var productos = new Array();

    function uso_sucursal() {
        var sucursal = document.getElementById("sucursal").value;
        console.log(document.getElementById("sucursal").value.type);
        document.getElementById('mostrar_categorias').innerHTML = '';
        console.log("Valor de la sucursal : " + sucursal + "   tipo es :" + sucursal.type);
        id_sucursal = "";
        console.log("Se ingreso una sucuresal");
        if (sucursal != 0) {
            console.log("No se eligio general");
            document.getElementById('mostrar_categorias').innerHTML = "";
            var categorias2 = '<select class="form-control selectpicker form-control" title="-- Categorías --" data-size="5" data-header="Seleccione categoria" data-style="btn-primary" id="categoria" name="categoria" data-container="body" required>' +
                '<option  data-divider="true"></option>' +
                '</select>';
            document.getElementById('mostrar_categorias').innerHTML = categorias2;
            $('#categoria').append('<option selected value="Refacción">Refaccion</option>');
            $("#categoria").selectpicker("refresh");
        } else {
            console.log("Es una sucursal general");
            document.getElementById('mostrar_categorias').innerHTML = "";
            var categorias = '<select class="form-control selectpicker form-control" title="-- Categorías --" data-size="5" data-header="Seleccione categoria" data-style="btn-primary" id="categoria" name="categoria" onChange="javascript:uso_categoria()" data-container="body" required>' +
                '<option data-divider="true"></option>' +

                '</select>';
            document.getElementById('mostrar_categorias').innerHTML = categorias;
            $('#categoria').append('<option value="Llantas">Llantas</option>');
            $("#categoria").selectpicker("refresh");
            $('#categoria').append('<option value="Bateria">Bateria</option>');
            $("#categoria").selectpicker("refresh");

        }
        var categoria = document.getElementById("categoria").value;
        console.log("Imprimir valor del la categoria " + categoria);
        $("#responsive-table tbody tr").html("");
        document.getElementById("precio").value = "";
        productos = new Array();

        /*Limpiar productos*/
        $('#productos').selectpicker('selectAll');
        var selected = [];
        selected = $('#productos').val()
        alert("limpieza de productos :" + selected.length);

        for (i = 0; i < selected.length; i++) {
            $('#productos').find('[value=' + selected[i] + ']').remove();
            $('#productos').selectpicker('refresh');
        }
        /*Fin limpiar productos*/

        /*Limpiar proveedores*/
        $('#mostrar_proveedores').selectpicker('selectAll');
        var selected2 = [];
        selected2 = $('#mostrar_proveedores').val()
        alert("Limpieza de proveedores: " + selected2.length);

        for (i = 0; i < selected2.length; i++) {
            $('#mostrar_proveedores').find('[value=' + selected2[i] + ']').remove();
            $('#mostrar_proveedores').selectpicker('refresh');
        }
        /*Fin limpiar proveedores*/
        nombre_categoria = categoria;
        console.log("Muestro la categoria :" + categoria);
        console.log("Muestro el id_sucursal en ajax :" + id_sucursal);

        var token = '{{csrf_token()}}';
        var data = {
            sucursal: sucursal,
            _token: token
        };

        $.ajax({
            type: "POST",
            url: "/mostrar_productos_catalogo",
            data: data,
            success: function(msg) {
                console.log(msg);
                console.log("Categoria: " + categoria);
                console.log(msg.length);
                for (j = 0; j < msg[0].length; j++) {
                    if (categoria == msg[0][j]['categoria']) {
                        //productos += '<option value="' + msg[0][j]['id_productos_llantimax'] + '">' + msg[0][j]['categoria'] + ' ' + msg[0][j]['nombre'] + ' ' + msg[0][j]['marca'] + ' ' + msg[0][j]['modelo'] + '</option>';
                        $('#productos').append('<option  value="' + msg[0][j]['id_productos_llantimax'] + '"data-producto="' + msg[0][j]['nombre'] + '"data-marca="' + msg[0][j]['marca'] + '"data-modelo="' + msg[0][j]['modelo'] + '"data-id_producto="' + msg[0][j]['id_productos_llantimax'] + '" data-subtext="Categoria: ' + msg[0][j]['categoria'] + '; Marca: ' + msg[0][j]['marca'] + '; Modelo: ' + msg[0][j]['modelo'] + '">' + msg[0][j]['nombre'] + '</option>');
                        $("#productos").selectpicker("refresh");
                    }
                }

                //Obtener los proveedores
                for (k = 0; k < msg[1].length; k++) {
                    //proovedores += '<option value="' + msg[1][k]['id_proveedor'] + '">' + msg[1][k]['nombre_empresa'] + ' ' + //msg[1][k]['nombre_contacto'] + '</option>';

                    $('#mostrar_proveedores').append('<option  value="' + msg[1][k]['id_proveedor'] + '"data-nombre="' + msg[1][k]['nombre_contacto'] + '"data-id_proveedor="' + msg[1][k]['id_proveedor'] + '" data-subtext="Empresa: ' + msg[1][k]['nombre_empresa'] + '; Teléfono: ' + msg[1][k]['telefono'] + '; Dirección: ' + msg[1][k]['direccion'] + '">' + msg[1][k]['nombre_contacto'] + '</option>');
                    $("#mostrar_proveedores").selectpicker("refresh");
                }

                console.log("MOSTRAR LOS PRODUCTOS");
            }
        });
    }


    function uso_categoria() {
        alert("ENTRO AL SEGUNDO METODO");
        var sucursal = document.getElementById("sucursal").value;
        var categoria = document.getElementById("categoria").value;
        //document.getElementById('productos').innerHTML = '';
        console.log("Imprimir valor del la categoria " + categoria);
        nombre_categoria = categoria;
        console.log("Muestro la categoria :" + categoria);
        console.log("Muestro el id_sucursal en ajax :" + id_sucursal);
        $("#responsive-table tbody tr").html("");
        document.getElementById("precio").value = "";
        productos = new Array();
        /*Limpiar productos*/
        $('#productos').selectpicker('selectAll');
        var selected = [];
        selected = $('#productos').val()
        alert("limpieza de productos :" + selected.length);

        for (i = 0; i < selected.length; i++) {
            $('#productos').find('[value=' + selected[i] + ']').remove();
            $('#productos').selectpicker('refresh');
        }
        /*Fin limpiar productos*/

        /*Limpiar proveedores*/
        $('#mostrar_proveedores').selectpicker('selectAll');
        var selected2 = [];
        selected2 = $('#mostrar_proveedores').val()
        alert("Limpieza de proveedores: " + selected2.length);

        for (i = 0; i < selected2.length; i++) {
            $('#mostrar_proveedores').find('[value=' + selected2[i] + ']').remove();
            $('#mostrar_proveedores').selectpicker('refresh');
        }
        /*Fin limpiar proveedores*/

        var token = '{{csrf_token()}}';
        var data = {
            sucursal: sucursal,
            _token: token
        };

        $.ajax({
            type: "POST",
            url: "/mostrar_productos_catalogo",
            data: data,
            success: function(msg) {
                console.log(msg);

                //var datos=JSON.parse(msg);
                //console.log(datos);
                //var productos = "";
                //7var proovedores = "";
                //document.getElementById('mostrar_proveedores').innerHTML = '';
                //console.log(msg.length);
                /*Obtener los productos*/
                for (j = 0; j < msg[0].length; j++) {
                    if (categoria == msg[0][j]['categoria']) {
                        //productos += '<option value="' + msg[0][j]['id_productos_llantimax'] + '">' + msg[0][j]['categoria'] + ' ' + msg[0][j]['nombre'] + ' ' + msg[0][j]['marca'] + ' ' + msg[0][j]['modelo'] + '</option>';
                        $('#productos').append('<option  value="' + msg[0][j]['id_productos_llantimax'] + '"data-producto="' + msg[0][j]['nombre'] + '"data-marca="' + msg[0][j]['marca'] + '"data-modelo="' + msg[0][j]['modelo'] + '"data-id_producto="' + msg[0][j]['id_productos_llantimax'] + '" data-subtext="Categoria: ' + msg[0][j]['categoria'] + '; Marca: ' + msg[0][j]['marca'] + '; Modelo: ' + msg[0][j]['modelo'] + '">' + msg[0][j]['nombre'] + '</option>');
                        $("#productos").selectpicker("refresh");
                    }
                }

                /*Obtener los proveedores*/
                for (k = 0; k < msg[1].length; k++) {
                    //proovedores += '<option value="' + msg[1][k]['id_proveedor'] + '">' + msg[1][k]['nombre_empresa'] + ' ' + //msg[1][k]['nombre_contacto'] + '</option>';
                    $('#mostrar_proveedores').append('<option  value="' + msg[1][k]['id_proveedor'] + '"data-nombre="' + msg[1][k]['nombre_contacto'] + '"data-id_proveedor="' + msg[1][k]['id_proveedor'] + '" data-subtext="Empresa: ' + msg[1][k]['nombre_empresa'] + '; Teléfono: ' + msg[1][k]['telefono'] + '; Dirección: ' + msg[1][k]['direccion'] + '">' + msg[1][k]['nombre_contacto'] + '</option>');
                    $("#mostrar_proveedores").selectpicker("refresh");
                }
            }
        });
    }


    function mostrar_tabla() {
        //agregar_catalogo_form
        if ($("#agregar_catalogo_form")[0].checkValidity()) {
            event.preventDefault();
            /*Value tiene el valor del producto*/
            /*OBTENER LOS VALORES DE LOS OTROS DATA */
            // var datos=$('#productos option:selected').attr("data-value2");
            var cantidad = document.getElementById("precio").value;
            var sucursal = $('#sucursal').val();
            var id_producto = $('#productos').val()[0];
            var id_proveedor = $('#mostrar_proveedores').val()[0];
            var nombre_producto = $('#productos option:selected').attr("data-producto");
            var nombre_proveedor = $('#mostrar_proveedores option:selected').attr("data-nombre");
            var marca = $('#productos option:selected').attr("data-marca");
            var modelo = $('#productos option:selected').attr("data-modelo");
            var bandera = 0;

            /VERIFICAR SI LA TABLA TIENE FILAS/
            if ($("#responsive-table tbody tr").length != 0) {
                /EVALUAR SI ESXISTE EL PRODUCTO AGREGADO EN LA TABLA/
                $("#responsive-table tbody tr").each(function(index_tr) {
                    if (bandera == 0) {
                        var t_idproveedor = ($(this).attr("data-id_proveedor"));
                        var t_idproducto = ($(this).attr("data-id_producto"));
                        /*SI EL PRODUCTO EXISTE, LO ACTUALIZA*/
                        if (id_proveedor == t_idproveedor && id_producto == t_idproducto) {
                            //var t_cantidad = $(this).attr("data-cantidad");
                            var t_cantidad = document.getElementById("precio").value;
                            cantidad = t_cantidad;
                            alert(t_cantidad);
                            bandera = 1;
                            $(this).attr('data-precio', cantidad);
                            $(this).html(""); /*LIMPIA EL CONTENIDO DE TR PARA EVITAR DUPLICADOS*/
                            var tr = '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                                '<td data-th="Marca"><span class="bt-content">' + marca + '</span></td>' +
                                '<td data-th="Modelo"><span class="bt-content">' + modelo + '</span></td>' +
                                '<td data-th="Proveedor"><span class="bt-content">' + nombre_proveedor + '</span></td>' +
                                '<td data-th="Precio"><span class="bt-content"><div class="col-9"><input  class="col-9" style="padding-left:0px;" step="1" min="1" type="number" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                                '<td data-th="Acciones"><span class="bt-content text-center">' +
                                '<button class="btn btn-danger remove"' +
                                'type="button">Eliminar</button>' +
                                '</td>';
                            $(this).append(tr);


                            /*ACTUALIZAR ARREGLO*/
                            productos = productos.map(function(objeto) {
                                return objeto.id_producto == id_producto && objeto.id_proveedor == id_proveedor ? {
                                    "id_producto": objeto.id_producto,
                                    "precio": t_cantidad,
                                    "id_proveedor": id_proveedor
                                } : objeto;
                            });

                        }
                    }
                });
                /*SI NO EXISTE EL ELEMENTO, ENTONCES LO INSERTA*/
                if (bandera == 0) {
                    alert("nueva fila");
                    // Nueva fila dentro de tbody.
                    $('#table').append(`<tr id="R${++rowIdx}" data-id_proveedor="${id_proveedor}" data-id_producto="${id_producto}" data-marca="${marca}" data-modelo="${modelo}" data-producto="${nombre_producto}" data-proveedor="${nombre_proveedor}" data-precio="${cantidad}">` +
                        '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                        '<td data-th="Marca"><span class="bt-content">' + marca + '</span></td>' +
                        '<td data-th="Modelo"><span class="bt-content">' + modelo + '</span></td>' +
                        '<td data-th="Proveedor"><span class="bt-content">' + nombre_proveedor + '</span></td>' +
                        '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input class="col-9" style="padding-left:0px;" type="number" step="1" min="1" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                        '<td data-th="Acciones"><span class="bt-content text-center">' +
                        '<button class="btn btn-danger remove"' +
                        'type="button">Eliminar</button>' +
                        '</td>' +
                        '</tr>');

                    /*INSERTA EN OBJETO Y AÑADE A ARREGLO*/
                    var producto = {
                        "id_producto": id_producto,
                        "precio": cantidad,
                        "id_proveedor": id_proveedor
                    };
                    productos.push(producto);

                    console.log(productos);


                }
            } else {
                // Nueva fila dentro de tbody.

                alert(typeof(id_producto));

                $('#table').append(`<tr id="R${++rowIdx}" data-id_proveedor="${id_proveedor}" data-id_producto="${id_producto}" data-marca="${marca}" data-modelo="${modelo}" data-producto="${nombre_producto}" data-proveedor="${nombre_proveedor}" data-precio="${cantidad}">` +
                    '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                    '<td data-th="Marca"><span class="bt-content">' + marca + '</span></td>' +
                    '<td data-th="Modelo"><span class="bt-content">' + modelo + '</span></td>' +
                    '<td data-th="Proveedor"><span class="bt-content">' + nombre_proveedor + '</span></td>' +
                    '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input class="col-9" style="padding-left:0px;" type="number" step="1" min="1" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                    '<td data-th="Acciones"><span class="bt-content text-center">' +
                    '<button class="btn btn-danger remove"' +
                    'type="button">Eliminar</button>' +
                    '</td>' +
                    '</tr>');

                /*INSERTA EN OBJETO Y AÑADE A ARREGLO*/
                var producto = {
                    "id_producto": id_producto,
                    "precio": cantidad,
                    "id_proveedor": id_proveedor
                };
                productos.push(producto);

                console.log(productos);
            }
        } else {
            $("#agregar_catalogo_form")[0].reportValidity();
        }
    }

    /*Actualizar fila al cambiar valor del input cantidad*/

    $('#table').on('change', '#cant', function(index) {
        var valores = "";
        $(this).parents("tr").each(function(index2) {
            var marca = $(this).attr("data-marca");
            var modelo = $(this).attr("data-modelo");
            var producto = $(this).attr("data-producto");
            var proveedor = $(this).attr("data-proveedor");
            var id_producto = $(this).attr("data-id_producto");
            var id_proveedor = $(this).attr("data-id_proveedor");
            var cantidad = $(this).find("#cant").val();
            var cantidad_anterior = $(this).attr("data-precio");
            var total = $(this).find("#cant").val();

            alert(cantidad_anterior);

            $(this).html("");
            var tr = '<td data-th="Producto"><span class="bt-content">' + producto + '</span></td>' +
                '<td data-th="Marca"><span class="bt-content">' + marca + '</span></td>' +
                '<td data-th="Modelo"><span class="bt-content">' + modelo + '</span></td>' +
                '<td data-th="Proveedor"><span class="bt-content">' + proveedor + '</span></td>' +
                '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input class="col-9" style="padding-left:0px;" type="number" step="1" min="1" id="cant" name="cant" value="' + total + '" ></div></span></td>' +
                '<td data-th="Acciones"><span class="bt-content text-center">' +
                '<button class="btn btn-danger remove"' +
                'type="button">Eliminar</button>' +
                '</td>';
            $(this).attr('data-precio', total);
            $(this).append(tr);

            /*ACTUALIZAR ARREGLO*/
            productos = productos.map(function(objeto) {
                return objeto.id_producto == id_producto && objeto.id_proveedor == id_proveedor ? {
                    "id_producto": objeto.id_producto,
                    "precio": total,
                    "id_proveedor": id_proveedor
                } : objeto;
            });

        });
    });


    /*------------------------------------------------------------------------------------------------------------------------------*/

    /*ELIMINAR UNA FILA DE LA TABLA*/

    $('#table').on('click', '.remove', function() {

        $(this).parents("tr").each(function(index2) {

            console.log("PRODUCTOS ANTES");
            console.log(productos);
            var id_producto = $(this).attr("data-id_producto");
            var id_proveedor = $(this).attr("data-id_proveedor");

            productos = productos.filter(objeto => ((objeto.id_producto != id_producto && objeto.id_proveedor != id_proveedor) || (objeto.id_producto != id_producto && objeto.id_proveedor == id_proveedor)));
            console.log("PRODUCTOS DEspues");
            console.log(productos);
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
        console.log(productos);
        if (productos.length > 0) {
            alert("TODO ESTA BIEN");
            var token = '{{csrf_token()}}';
            var data = {
                array_productos: productos,
                _token: token
            };
            console.log(data);
            $.ajax({
                type: "POST",
                url: "/agregar_producto_catalogo",
                data: data,
                success: function(msg) {

                    alert(msg);
                    location.href = "/mostrar_proveedores";
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
