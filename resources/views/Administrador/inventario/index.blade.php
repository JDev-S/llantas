@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
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
                            <textarea  class="form-control" id="descripcion" name="descripcion" disabled></textarea>
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
                                        Marca
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-control col-sm-8 col-md-10" id="sucursal_nueva" name="sucursal" onChange="javascript:obtener_valor()">

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
                                    <select class="form-control col-sm-8 col-md-10" id="mostrar_productos" required name="producto">

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
                                    <input type="text" class="form-control col-sm-8 col-md-10" id="cantidad" name="cantidad">
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
                var productos = "";
                document.getElementById('mostrar_productos').innerHTML = '';

                for (i = 0; i < msg.length; i++) {

                    productos += '<option value="' + msg[i]['id_productos_llantimax'] + '">' + msg[i]['categoria'] + ' ' + msg[i]['nombre'] + ' ' + msg[i]['marca'] + ' ' + msg[i]['modelo'] + '</option>';

                }
                document.getElementById('mostrar_productos').innerHTML = productos
                console.log("MOSTRAR LOS PRODUCTOS");
                console.log(productos);
            }
        });


    }

    function enviar_datos() {
        var sucursal = document.getElementById("sucursal").value;
        var producto = document.getElementById("mostrar_productos").value;
        var cantidad = document.getElementById("cantidad").value;

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
                location.href = "/mostrar_inventario"
            }
        });


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
                    sortable: true
                },
                {
                    field: 'categoria',
                    title: 'Categoria',
                    sortable: true
                },
                {
                    field: 'marca',
                    title: 'Marca',
                    sortable: true
                },
                {
                    field: 'modelo',
                    title: 'Modelo',
                    sortable: true
                },
                {
                    field: 'precio',
                    title: 'Precio',
                    sortable: true
                },
                {
                    field: 'fotografia_miniatura',
                    title: 'Foto',
                    sortable: true,
                    printIgnore: true,
                },
                {
                    field: 'sucursal',
                    title: 'Sucursal',
                    sortable: true
                },
                {
                    field: 'cantidad',
                    title: 'Cantidad',
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

            if (categoria == "Llantas") {
                botones = '<div class="action-buttons">' +
                    '<button class="text-blue mx-1" data-target="#modalLlanta" data-toggle="modal"data-id="' + row.id_productos_llantimax + '" data-cantidad="' + row.cantidad + '" data-sucursal="' + row.sucursal + '" data-categoria="' + row.categoria + '" data-nombre="' + row.nombre + '" data-medida="' + row.medida + '" data-foto="' + row.foto + '" data-marca="' + row.marca + '" data-modelo="' + row.modelo + '" data-precio="' + row.precio + '" data-marc="' + row.id_marca + '" data-capacidad="' + row.capacidad_carga + '" data-indice="' + row.indice_velocidad + '" data-rin="' + row.numero_rin + '" ><i class="fa fa-search-plus text-105"></i></button>' +
                    //'<a class="text-success mx-1" href="#">\
                    //<i class="fa fa-pencil-alt text-105"></i>\
                    //</a>\
                    //<a class="text-danger-m1 mx-1" href="#">\
                    //  <i class="fa fa-trash-alt text-105"></i>\
                    //</a>\
                    '</div>';
            } else
            if (categoria == "Refacción") {
                botones = '<div class="action-buttons">' +
                    '<button class="text-blue mx-1" data-target="#modalRefaccion" data-toggle="modal"data-id="' + row.id_productos_llantimax + '" data-foto="' + row.photo + '" data-nombre="' + row.nombre + '" data-marca="' + row.marca + '" data-modelo="' + row.modelo + '" data-cantidad="' + row.cantidad + '" data-sucursal="' + row.sucursal + '" data-categoria="' + row.categoria + '" data-descripcion="' + row.descripcion + '" data-precio="' + row.precio + '" ><i class="fa fa-search-plus text-105"></i></button>'
                //'<a class="text-success mx-1" href="#">\
                //<i class="fa fa-pencil-alt text-105"></i>\
                //</a>\
                //<a class="text-danger-m1 mx-1" href="#">\
                //  <i class="fa fa-trash-alt text-105"></i>\
                //</a>\
                '</div>';
            } else
            if (categoria == "Bateria") {
                botones = '<div class="action-buttons">' +
                    '<button class="text-blue mx-1" data-target="#modalBateria" data-toggle="modal"data-id="' + row.id_productos_llantimax + '" data-nombre="' + row.nombre + '" data-marca="' + row.marca + '" data-modelo="' + row.modelo + '" data-cantidad="' + row.cantidad + '" data-sucursal="' + row.sucursal + '" data-categoria="' + row.categoria + '" data-medidas="' + row.medidas + '" data-voltaje="' + row.voltaje + '" data-capacidad="' + row.capacidad_arranque + '" data-frio="' + row.capacidad_arranque_frio + '" data-peso="' + row.peso + '" data-foto="' + row.foto + '" data-tamanio="' + row.tamanio + '" data-precio="' + row.precio + '" ><i class="fa fa-search-plus text-105"></i></button>'
                //'<a class="text-success mx-1" href="#">\
                //<i class="fa fa-pencil-alt text-105"></i>\
                //</a>\
                //<a class="text-danger-m1 mx-1" href="#">\
                //  <i class="fa fa-trash-alt text-105"></i>\
                //</a>\
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
@stop
@stop