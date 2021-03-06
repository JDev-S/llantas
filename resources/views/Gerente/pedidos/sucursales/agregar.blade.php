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
            <i class="fas fa-shipping-fast text-dark-l3 mr-1"></i>
            Nuevo pedido
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
                            Selecci??n de productos:
                        </h5>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive-xl mt-4 mb-4">
                    <div class="col-md-12 mt-2">
                        <div class="row mb-2">
                            <form id="agregar_pedido_form" class="form-row col-md-12 justify-content-center">
                                <div class="form-row col-md-12 justify-content-center">
                                    <div class="form-group col-md-2 ml-2 justify-content-center">
                                        <select class="form-control selectpicker form-control" title="-- Sucursal destino --" data-size="5" data-header="Seleccione sucursal" data-style="btn-primary" id="destino_sucursal" name="destino_sucursal" data-container="body" onChange="javascript:mostrar_productos_sucursal()" required>
                                            <option data-divider="true"></option>
                                            @foreach($sucursales as $sucursal)
                                            <option data-tokens="{{$sucursal->id_sucursal}}" value="{{$sucursal->id_sucursal}}">{{$sucursal->sucursal}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 ml-2 justify-content-center">
                                        <select class="form-control selectpicker form-control" title="-- Sucursal origen--" data-size="5" data-header="Seleccione sucursal" data-style="btn-primary" onChange="javascript:mostrar_productos_sucursal()" id="sucursal" name="sucursal" data-container="body" required>
                                            <option data-divider="true"></option>
                                            @foreach($sucursales2 as $sucursal)
                                            <option data-tokens="{{$sucursal->id_sucursal}}" value="{{$sucursal->id_sucursal}}">{{$sucursal->sucursal}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 ml-2">
                                        <select class="form-control selectpicker " multiple data-max-options="1" data-live-search="true" title="-- Producto --" data-size="4" data-header="Selecciona una producto" data-style="btn-primary" id="productos" name="productos" data-container="body" required>
                                            <optgroup label="los chidos">
                                                <option data-divider="true"></option>

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
                                        <input type="text" value="0" disabled id="total_final" name="total_final" class="form-control col-4">
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
                                            <th class="align-middle"><b>Cantidad</b></th>
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
    var rowIdx = 0;
    var productos = new Array();

    function mostrar_productos_sucursal() {
        var sucursal = $('#sucursal').val();
        var sucursal_destino = $('#destino_sucursal').val();
        //alert(sucursal);

        if (sucursal == sucursal_destino) {
            alert("Porfavor elegir otra sucursal origen");
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
        } else {
            var token = '{{csrf_token()}}';
            var data = {
                sucursal: sucursal,
                _token: token
            };
            $.ajax({
                type: "POST",
                url: "/mostrar_productos_pedidos",
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
                        if (objeto.cantidad > 0) {
                            $('#productos').append('<option data-thumbnail="assets/image/user.JPG' + objeto.foto + '"  value="' + objeto.id_producto + '"data-producto="' + objeto.nombre_producto + '" data-cantidad="' + objeto.cantidad + '" data-categoria="' + objeto.categoria + '" data-marca="' + objeto.marca + '" data-modelo="' + objeto.modelo + '" data-subtext="Categoria: ' + objeto.categoria + '; Marca: ' + objeto.marca + '; Modelo: ' + objeto.modelo + '; Sucursal: ' + objeto.sucursal + '; Cantidad: ' + objeto.cantidad + '" showSubtext="true" data-precio="' + objeto.precio + '" data-foto="' + objeto.foto + '" data-sucursal="' + objeto.sucursal + '" data-suc="' + objeto.id_sucursal + '">' + objeto.nombre_producto + '</option>');
                            $("#productos").selectpicker("refresh");
                        }

                    });
                }
            });
        }


    }


    function mostrar_tabla() {
        if ($("#agregar_pedido_form")[0].checkValidity()) {
            event.preventDefault();
            /*Value tiene el valor del producto*/
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
            if (parseInt(cantidad_suc) >= parseInt(cantidad)) {
                /VERIFICAR SI LA TABLA TIENE FILAS/
                if ($("#responsive-table tbody tr").length != 0) {
                    /EVALUAR SI ESXISTE EL PRODUCTO AGREGADO EN LA TABLA/
                    $("#responsive-table tbody tr").each(function(index_tr) {
                        if (bandera == 0) {
                            var t_idsucursal = ($(this).attr("data-id_sucursal"));
                            var t_idproducto = ($(this).attr("data-id_producto"));
                            /*SI EL PRODUCTO EXISTE, LO ACTUALIZA*/
                            if (id_sucursal == t_idsucursal && id_producto == t_idproducto) {
                                bandera = 1;
                                //var t_cantidad = $(this).attr("data-cantidad");
                                var t_cantidad = document.getElementById("cant").value;
                                if (parseInt(cantidad_suc) >= (parseInt(cantidad) + parseInt(t_cantidad))) {
                                    cantidad = parseInt(t_cantidad) + parseInt(cantidad);
                                    alert(t_cantidad);

                                    $(this).attr('data-cantidad', cantidad);
                                    $(this).html(""); /*LIMPIA EL CONTENIDO DE TR PARA EVITAR DUPLICADOS*/
                                    var tr = '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                                        '<td data-th="Marca"><span class="bt-content">' + marca + '</span></td>' +
                                        '<td data-th="Modelo"><span class="bt-content">' + modelo + '</span></td>' +
                                        '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input  class="col-9" style="padding-left:0px;" step="1" min="1" max="9999" type="number" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                                        '<td data-th="Acciones"><span class="bt-content text-center">' +
                                        '<button class="btn btn-danger remove"' +
                                        'type="button">Eliminar</button>' +
                                        '</td>';
                                    $(this).append(tr);
                                    var total = $('#total_final').val();
                                    var total_final = total - parseInt(t_cantidad);
                                    total_final = total_final + parseInt(cantidad);
                                    document.getElementById("total_final").value = total_final;

                                    /*ACTUALIZAR ARREGLO*/
                                    productos = productos.map(function(objeto) {
                                        return objeto.id_producto == id_producto && objeto.id_sucursal == id_sucursal ? {
                                            "id_producto": objeto.id_producto,
                                            "cantidad_producto": cantidad,
                                            "id_sucursal": id_sucursal
                                        } : objeto;
                                    });
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
                        $('#table').append(`<tr id="R${++rowIdx}" data-id_sucursal="${id_sucursal}" data-id_producto="${id_producto}" data-marca="${marca}" data-modelo="${modelo}" data-producto="${nombre_producto}" data-cantidad="${cantidad}">` +
                            '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                            '<td data-th="Marca"><span class="bt-content">' + marca + '</span></td>' +
                            '<td data-th="Modelo"><span class="bt-content">' + modelo + '</span></td>' +
                            '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input class="col-9" style="padding-left:0px;" type="number" step="1" min="1" max="9999" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                            '<td data-th="Acciones"><span class="bt-content text-center">' +
                            '<button class="btn btn-danger remove"' +
                            'type="button">Eliminar</button>' +
                            '</td>' +
                            '</tr>');
                        var total = $('#total_final').val();
                        var total_final = parseInt(total) + parseInt(cantidad);
                        document.getElementById("total_final").value = total_final;
                        /*INSERTA EN OBJETO Y A??ADE A ARREGLO*/
                        var producto = {
                            "id_producto": id_producto,
                            "cantidad_producto": cantidad,
                            "id_sucursal": id_sucursal
                        };
                        productos.push(producto);

                        console.log(productos);


                    }
                } else {
                    // Nueva fila dentro de tbody.

                    alert(typeof(id_producto));

                    $('#table').append(`<tr id="R${++rowIdx}" data-id_sucursal="${id_sucursal}" data-id_producto="${id_producto}" data-marca="${marca}" data-modelo="${modelo}" data-producto="${nombre_producto}" data-cantidad="${cantidad}">` +
                        '<td data-th="Producto"><span class="bt-content">' + nombre_producto + '</span></td>' +
                        '<td data-th="Marca"><span class="bt-content">' + marca + '</span></td>' +
                        '<td data-th="Modelo"><span class="bt-content">' + modelo + '</span></td>' +
                        '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input class="col-9" style="padding-left:0px;" type="number" step="1" min="1" max="9999" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                        '<td data-th="Acciones"><span class="bt-content text-center">' +
                        '<button class="btn btn-danger remove"' +
                        'type="button">Eliminar</button>' +
                        '</td>' +
                        '</tr>');
                    var total = $('#total_final').val();
                    var total_final = parseInt(total) + parseInt(cantidad);
                    document.getElementById("total_final").value = total_final;
                    /*INSERTA EN OBJETO Y A??ADE A ARREGLO*/
                    var producto = {
                        "id_producto": id_producto,
                        "cantidad_producto": cantidad,
                        "id_sucursal": id_sucursal
                    };
                    productos.push(producto);

                    console.log(productos);

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
            //SI HAY ERROR DE VALIDACI??N, ENV??A EL MENSAJE DE ERROR
            $("#agregar_pedido_form")[0].reportValidity();
        }

    }

    /*Actualizar fila al cambiar valor del input cantidad*/

    $('#table').on('change', '#cant', function(index) {
        var valores = "";
        var cantidad_suc = $('#productos option:selected').attr("data-cantidad");
        $(this).parents("tr").each(function(index2) {
            var marca = $(this).attr("data-marca");
            var modelo = $(this).attr("data-marca");
            var producto = $(this).attr("data-producto");
            var id_producto = $(this).attr("data-id_producto");
            var id_sucursal = $(this).attr("data-id_sucursal");
            var cantidad = $(this).find("#cant").val();
            var cantidad_anterior = $(this).attr("data-cantidad");
            var total = parseInt($(this).find("#cant").val());
            alert(cantidad_anterior);
             if ($(this).find("#cant")[0].checkValidity()) {
                if (parseInt(cantidad_suc) >= cantidad) {
                    $(this).html("");
                    var tr = '<td data-th="Producto"><span class="bt-content">' + producto + '</span></td>' +
                        '<td data-th="Marca"><span class="bt-content">' + marca + '</span></td>' +
                        '<td data-th="Modelo"><span class="bt-content">' + modelo + '</span></td>' +
                        '<td data-th="Cantidad"><span class="bt-content"><div class="col-9"><input class="col-9" style="padding-left:0px;" type="number" step="1" min="1" max="9999" id="cant" name="cant" value="' + cantidad + '" ></div></span></td>' +
                        '<td data-th="Acciones"><span class="bt-content text-center">' +
                        '<button class="btn btn-danger remove"' +
                        'type="button">Eliminar</button>' +
                        '</td>';
                    $(this).attr('data-cantidad', cantidad);
                    $(this).append(tr);
                    var total2 = $('#total_final').val();
                    var total_final = parseInt(total2) - parseInt(cantidad_anterior);
                    total_final = total_final + total;
                    document.getElementById("total_final").value = total_final;

                    /*ACTUALIZAR ARREGLO*/
                    productos = productos.map(function(objeto) {
                        return objeto.id_producto == id_producto && objeto.id_sucursal == id_sucursal ? {
                            "id_producto": objeto.id_producto,
                            "cantidad_producto": cantidad,
                            "id_sucursal": id_sucursal
                        } : objeto;
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

            var cantidad_anterior = $(this).attr("data-cantidad");
            var id_producto = $(this).attr("data-id_producto");
            var id_sucursal = $(this).attr("data-id_sucursal");
            var total2 = $('#total_final').val();
            var total_final = parseInt(total2) - parseInt(cantidad_anterior);
            document.getElementById("total_final").value = total_final;
            console.log("Productos antes");
            console.log(productos);
            productos = productos.filter(objeto => (objeto.id_producto != id_producto && objeto.id_sucursal == id_sucursal));
            console.log("Productos despues");
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
        if (productos.length > 0) {
            var sucursal = $('#sucursal').val();
            var sucursal_destino = $('#destino_sucursal').val();
            console.log("sucursal :" + sucursal);
            console.log(productos);

            var token = '{{csrf_token()}}';
            var data = {
                array_productos: productos,
                descripcion: "Favor de confirmar el pedido, es urgente",
                id_sucursal: sucursal,
                sucursal_destino: sucursal_destino,
                _token: token
            };
            console.log(data);
            $.ajax({
                type: "POST",
                url: "/insertar_pedido_sucursal",
                data: data,
                success: function(msg) {

                    alert(msg);
                    location.href = "/mostrar_pedidos_sucursales_sucursal";
                }
            });
        } else {
            alert("No ha seleccionado productos");
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
