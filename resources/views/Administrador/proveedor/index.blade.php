@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            Proveedores
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

<!--MODAL AGREGAR Proovedor -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Ingresar proveedores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="codigo_llanta">Nombre de la empresa</label>
                            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre de la empresa">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modelo">Teléfono</label>
                            <input type="text" class="form-control mb-2" id="telefono" name="telefono" placeholder="Teléfono">
                        </div>
                    </div>

                    <div class="form-row align-items-center col-md-12">
                        <div class="form-group col-md-6">
                            <label for="rin">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modelo">Nombre de proveedor</label>
                            <input type="text" class="form-control mb-2" id="nombre_contacto" name="nombre_contacto" placeholder="Nombre de proveedor">
                        </div>

                    </div>

                    <div class="form-row align-items-center col-md-12">
                        <div class="form-group col-md-6">
                            <label for="rin">Correo</label>
                            <input type="text" class="form-control" id="correo" name="correo" placeholder="Email">
                        </div>


                    </div>

                    <div class="form-group col-md-12">
                        <label for="indice_velocidad">Sucursal</label>
                        <?php
                            $query2 = "select * from sucursal ";
                            $data2=DB::select($query2);      
                        ?>
                        <select id="sucursal" name="sucursal" class="form-control">
                            <option value="0">General</option>
                            @foreach($data2 as $item)
                            <option value="{{ $item->id_sucursal }}"> {{ $item->sucursal }} </option>
                            @endforeach
                        </select>
                    </div>


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

<!--MODAL ACTUALIZAR Proovedor -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Actualizar proveedores</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="codigo_llanta">Nombre de la empresa</label>
                             <input type="hidden" class="form-control" id="update_id_proveedor" name="update_id_proveedor" >
                            <input type="text" class="form-control" id="update_empresa" name="update_empresa" placeholder="Nombre de la empresa">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modelo">Teléfono</label>
                            <input type="text" class="form-control mb-2" id="update_telefono" name="update_telefono" placeholder="Teléfono">
                        </div>
                    </div>

                    <div class="form-row align-items-center col-md-12">
                        <div class="form-group col-md-6">
                            <label for="rin">Dirección</label>
                            <input type="text" class="form-control" id="update_direccion" name="update_direccion" placeholder="Dirección">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modelo">Nombre de proveedor</label>
                            <input type="text" class="form-control mb-2" id="update_nombre" name="update_nombre" placeholder="Nombre de proveedor">
                        </div>

                    </div>

                    <div class="form-row align-items-center col-md-12">
                        <div class="form-group col-md-6">
                            <label for="rin">Correo</label>
                            <input type="text" class="form-control" id="update_correo" name="update_correo" placeholder="Email">
                        </div>


                    </div>

                    <div class="form-group col-md-12">
                        <label for="indice_velocidad">Sucursal</label>
                        <?php
                            $query2 = "select * from sucursal ";
                            $data2=DB::select($query2);      
                        ?>
                        <select id="update_sucursal" name="update_sucursal" class="form-control">
                             <option value="0"> General </option>
                            @foreach($data2 as $item)
                            <option value="{{ $item->id_sucursal }}"> {{ $item->sucursal }} </option>
                            @endforeach
                        </select>
                    </div>


                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
                <button type="submit" class="btn btn-primary" onclick="actualizar_proveedor();">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL ACTUALIZAR PROVEEDOR-->
@section('scripts')

<!-- include vendor scripts used in "Bootstrap Table" page. see "/views//pages/partials/table-bootstrap/@vendor-scripts.hbs" -->
<script src="\npm\tableexport.jquery.plugin@1.10.22\tableExport.min.js"></script>


<script src="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\export\bootstrap-table-export.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\print\bootstrap-table-print.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\mobile\bootstrap-table-mobile.min.js"></script>

<!-- "Bootstrap Table" page script to enable its demo functionality -->
<script>
    jQuery(function($) {
        var datos = @json($proveedores);
        // alert(datos);
        var arr = [];

        datos.forEach(objeto => {
            //let tmp =[] ;
            arr.push({
                "id_proveedor": objeto.id_proveedor,
                "nombre_empresa": objeto.nombre_empresa,
                "telefono": objeto.telefono,
                "direccion": objeto.direccion,
                "nombre_contacto": objeto.nombre_contacto,
                "correo_electronico": objeto.correo_electronico,
                "sucursal": objeto.sucursal,
                "id_sucursal": objeto.id_sucursal
            }, );
            //arr.push(tmp);
            //console.log(arr);
        });
        console.log(arr)
        // initiate the plugin
        var $_bsTable = $('#table')
        $_bsTable.bootstrapTable({
            data: arr,
            columns: [{
                    field: 'nombre_empresa',
                    title: 'Nombre de la empresa',
                    sortable: true
                },
                {
                    field: 'telefono',
                    title: 'Teléfono',
                    sortable: true
                },
                {
                    field: 'direccion',
                    title: 'Dirección',
                    sortable: true
                },
                {
                    field: 'nombre_contacto',
                    title: 'Nombre de contacto',
                    sortable: true
                },
                {
                    field: 'correo_electronico',
                    title: 'Correo eléctronico',
                    sortable: true
                },
                {
                    field: 'sucursal',
                    title: 'Sucursal',
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
                    '<p style="font-size:20px;">Tabla de proveedores' + '</p>' +
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
                return 'Mostrando: ' + totalRows + ' Proveedores';
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + ' Filas por página';
            },
            formatNoMatches: function() {
                return 'Proveedor no encontrado';
            },
        })

        function formatTableCellActions(value, row, index, field) {
            var eliminar = "'" + row.id_proveedor + "'";
            return '<div class="action-buttons">' +
                //<button class="text-blue mx-1" data-target="#modalLlanta_' + row.id_llanta + '" data-toggle="modal">' +
                //  '<i class="fa fa-search-plus text-105"></i>' +
                //'</button>' +
                // '<a class="text-success mx-1" href="#">\
                //<i class="fa fa-pencil-alt text-105"></i>\
                //</a>'+
                '<button class="text-blue mx-1" data-toggle="modal" data-target="#editModal" data-id="' + row.id_proveedor + '" data-nombre="' + row.nombre_contacto + '" data-telefono="' + row.telefono + '" data-correo="' + row.correo_electronico + '" data-sucursal="' + row.sucursal + '" data-direccion="' + row.direccion + '" data-empresa="' + row.nombre_empresa + '" data-suc="' + row.id_sucursal + '" ><i class="fa fa-pencil-alt"></i></button>' +
                '<a class="text-danger-m1 mx-1"  href="javascript:eliminar_Proveedor(' + eliminar + ')">' +
                '<i class="fa fa-trash-alt text-105"></i>' +
                '</a>' +
                '</div>'
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
    function enviar_datos() {
        var nombre_empresa = document.getElementById("nombre_empresa").value;
        var sucursal = document.getElementById("sucursal").value;
        var telefono = document.getElementById("telefono").value;
        var direccion = document.getElementById("direccion").value;
        var nombre_contacto = document.getElementById("nombre_contacto").value;
        var correo = document.getElementById("correo").value;

        var token = '{{csrf_token()}}';
        var data = {
            nombre_empresa: nombre_empresa,
            sucursal: sucursal,
            telefono: telefono,
            direccion: direccion,
            nombre_contacto: nombre_contacto,
            correo: correo,
            _token: token
        };

        $.ajax({
            type: "POST",
            url: "/agregar_proveedores",
            data: data,
            success: function(msg) {
                location.href = "/mostrar_proveedores"
            }
        });
    }

</script>
<script type="text/javascript">
    function eliminar_Proveedor(id_proveedor) {
        var id_proveedor = id_proveedor;
        var token = '{{csrf_token()}}';
        var data = {
            id_proveedor: id_proveedor,
            _token: token
        };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "/eliminar_Proveedor",
            data: data,
            success: function(msg) {
                alert(msg);
                location.href = "/mostrar_proveedores";
            }
        });
    }

</script>
<script type="text/javascript">
    $('#editModal').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_proveedor = button.data('id')
        var nombre = button.data('nombre')
        var sucursal = button.data('sucursal')
        var id_sucursal = button.data('suc')
        var correo = button.data('correo')
        var empresa = button.data('empresa')
        var telefono = button.data('telefono')
        var direccion = button.data('direccion')
       
        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var modal = $(this)
        modal.find('#update_id_proveedor').val(id_proveedor)
        modal.find('#update_nombre').val(nombre)
        modal.find('#update_correo').val(correo)
        modal.find('#update_telefono').val(telefono)
        modal.find('#update_empresa').val(empresa)
        modal.find('#update_direccion').val(direccion)
                
        $('#update_sucursal > option[value="' + id_sucursal + '"]').attr('selected', 'selected');
    });

</script>
<script type="text/javascript">
    function actualizar_proveedor() {
        var update_id_proveedor = document.getElementById("update_id_proveedor").value;
        var update_nombre = document.getElementById("update_nombre").value;
        var update_correo = document.getElementById("update_correo").value;
        var update_telefono = document.getElementById("update_telefono").value;
        var update_empresa = document.getElementById("update_empresa").value;
        var update_direccion = document.getElementById("update_direccion").value;
        var update_sucursal = document.getElementById("update_sucursal").value;
        
        var formData = new FormData();
        var token = '{{csrf_token()}}';
       
        formData.append("update_id_proveedor", update_id_proveedor);
        formData.append("update_nombre", update_nombre);
        formData.append("update_correo", update_correo);
        formData.append("update_telefono", update_telefono);
        formData.append("update_sucursal", update_sucursal);
        formData.append("update_empresa", update_empresa);
        formData.append("update_direccion", update_direccion);
        formData.append("_token", token);
        console.log(formData);
        

        $.ajax({
            type: "POST",
            contentType: false,
            url: "/actualizar_proveedor",
            data: formData,
            processData: false,
            cache: false,
            success: function(msg) {
                console.log(msg);
                location.href = "/mostrar_proveedores";
            }
        });
    }

</script>
@stop
@stop
