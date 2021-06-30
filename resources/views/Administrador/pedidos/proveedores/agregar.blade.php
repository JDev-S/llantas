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

</style>
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            Compras a proveedores
            <!--<small class="page-info text-secondary-d2">
                <i class="fa fa-angle-double-right text-80"></i>
                extended tables plugin
            </small>-->
        </h1>
    </div>
    <div class="card bcard mt-2">
        <div class="card-body p-0 border-x-1 border-y-1 border-b-1 brc-default-m4 radius-0 overflow-hidden">
            <div class="row col-16 mt-3 justify-content-center mt-5">
                <div class="form-row col-md-12">
                    <div class="form-group col-md-2 ml-2">

                        <select class="form-control selectpicker form-control" title="-- Sucursal --" data-size="5" data-header="Seleccione sucursal" data-style="btn-primary" onChange="javascript:mostrar_productos_sucursal()" id="sucursal" name="sucursal">
                            <option data-divider="true"></option>
                            @foreach($sucursales as $sucursal)
                            <option data-tokens="{{$sucursal->id_sucursal}}" value="{{$sucursal->id_sucursal}}">{{$sucursal->sucursal}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4 ml-2">
                        <select class="form-control selectpicker form-control" data-live-search="true" title="-- Producto --" data-size="3" data-header="Selecciona una producto" data-style="btn-primary" id="productos" name="productos">
                            <optgroup label="los chidos">
                                <option data-divider="true"></option>

                            </optgroup>
                        </select>

                    </div>
                    <div class="form-group col-md-2 ml-2">
                        <input class="form-control" min="1" max="9999" step="1" type="number" placeholder="Cantidad" style="border-color:#2470BD" id="cantidad" name="cantidad">
                    </div>

                </div>


            </div>
            <div class="form-group col-md-2 justify-content-start ">
                <button class="btn btn-primary btn-lg" onclick="mostrar_tabla()">Añadir</button>
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

            <div class="col-md-12 col-sm-9">
                <div class="card acard h-100">
                    <div class="card-header border-0">
                        <h5 class="text-success-d1 mb-0">
                            Pedido
                        </h5>
                    </div>

                    <div class="card-body p-0 p-md-3">
                        <table class="table table-striped-success table-borderless text-dark-m1 mb-0" id="responsive-table">
                            <thead>
                                <tr class="bgc-success-d2 text-white">
                                    <th class="align-middle"><b>Código del producto</b></th>
                                    <th class="align-middle"><b>Nombre del proveedor</b></th>
                                    <th class="align-middle"><b>Cantidad</b></th>
                                    <th class="align-middle"><b>Precio unitario</b></th>
                                    <th class="align-middle"><b>Total</b></th>
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


    @section('scripts')

    <!-- include vendor scripts used in "Bootstrap Table" page. see "/views//pages/partials/table-bootstrap/@vendor-scripts.hbs" -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="\npm\tableexport.jquery.plugin@1.10.22\tableExport.min.js"></script>
    <script src="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.js"></script>
    <script src="\npm\bootstrap-table@1.18.3\dist\extensions\export\bootstrap-table-export.min.js"></script>
    <script src="\npm\bootstrap-table@1.18.3\dist\extensions\print\bootstrap-table-print.min.js"></script>
    <script src="\npm\bootstrap-table@1.18.3\dist\extensions\mobile\bootstrap-table-mobile.min.js"></script>


    <script type="text/javascript">
        function mostrar_productos_sucursal() {
            var sucursal = $('#sucursal').val();
            alert(sucursal);

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

                    datos.forEach(objeto => {
                        alert("Id_proveedor: " + objeto.id_proveedor);
                        //llenado += '<option data-tokens="Espresso" data-subtext="Proveedor: ' + objeto.nombre_contacto + '; precio: $' + objeto.precio_compra + '" showSubtext="true">' + objeto.nombre + '</option>';
                        $('#productos').append('<option value="' + objeto.id_producto + '"    data-sucursal="' + objeto.id_sucursal + '" data-catalogo="' + objeto.id_catalogo + '" data-tokens="Espresso" data-subtext="Proveedor: ' + objeto.nombre_contacto + '; precio: $' + objeto.precio_compra + '" showSubtext="true" data-contacto="' + objeto.nombre_contacto + '" data-precio="' + objeto.precio_compra + '" data-producto="' + objeto.nombre + '" data-proveedor="' + objeto.id_proveedor + '">' + objeto.nombre + '</option>');
                        $("#productos").selectpicker("refresh");
                    });
                }
            });
        }

    </script>

    <script type="text/javascript">
        function mostrar_tabla() {
            /*Value tiene el valor del producto*/
            /*OBTENER LOS VALORES DE LOS OTROS DATA */
            // var datos=$('#productos option:selected').attr("data-value2");
            var cantidad = document.getElementById("cantidad").value;
            var sucursal = $('#sucursal').val();
            var id_producto = $('#productos').val();
            var id_proveedor = $('#productos option:selected').attr("data-proveedor");
            var id_sucursal = $('#productos option:selected').attr("data-sucursal");
            var id_catalogo = $('#productos option:selected').attr("data-catalogo");
            var nombre_proveedor = $('#productos option:selected').attr("data-contacto");
            var precio_compra = $('#productos option:selected').attr("data-precio");
            var nombre_producto = $('#productos option:selected').attr("data-producto");

            alert("cantidad :" + cantidad + " sucursal :" + sucursal + " id_producto:" + id_producto + " id_proveedor:" + id_proveedor + " id_sucursal:" + id_sucursal + " id_catalogo:" + id_catalogo + " nombre_proveedor:" + nombre_proveedor + " precio_compra:" + precio_compra + " nombre_producto:" + nombre_producto);

            var rowIdx = 0;
            // Adding a row inside the tbody.
            $('#table').append(`<tr id="R${++rowIdx}">` +
                '<td data-th="Name"><span class="bt-content">' + nombre_producto + '</span></td>' +
                '<td data-th="Name"><span class="bt-content">' + nombre_proveedor + '</span></td>' +
                '<td data-th="Age"><span class="bt-content">' + cantidad + '</span></td>' +
                '<td data-th="Height"><span class="bt-content">' + precio_compra + '</span></td>' +
                '<td data-th="Sport"><span class="bt-content">' + parseInt(cantidad) * parseInt(precio_compra) + '</span></td>' +
                '<td class="text-center">' +
                '<button class="btn btn-danger remove"' +
                'type="button">Eliminar</button>' +
                '</td>' +
                '</tr>');

            /*ELIMINAR UNA FILA DE LA TABLA*/

            $('#table').on('click', '.remove', function() {

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
        }

    </script>

    <script type="text/javascript">



    </script>
    @stop
    @stop
