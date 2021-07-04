@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            Pedidos a sucursales
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

            </div>
            <table class="table text-dark-m2 text-95 bgc-white ml-n1px" id="table">
                <!-- table -->
            </table>
        </div>
    </div>
</div>


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
        var datos = @json($pedidos_solicitados);
        // alert(datos);
        var arr = [];

        datos.forEach(objeto => {
            //let tmp =[] ;
            arr.push({
                "id_pedido": objeto.id_pedido,
                "nombre_usuario_destino": objeto.nombre_usuario_destino,
                "nombre_sucursal_usuario_destino": objeto.nombre_sucursal_usuario_destino,
                "nombre_usuario_origen": objeto.nombre_usuario_origen,
                "nombre_sucursal_usuario_origen": objeto.nombre_sucursal_usuario_origen,
                "status": objeto.status
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
                    field: 'nombre_usuario_destino',
                    title: 'Nombre del solicitante',
                    sortable: true
                },
                {
                    field: 'nombre_sucursal_usuario_destino',
                    title: 'Sucursal del solicitante',
                    sortable: true
                },
                {
                    field: 'nombre_usuario_origen',
                    title: 'Nombre del distribuidor',
                    sortable: true
                },
                {
                    field: 'nombre_sucursal_usuario_origen',
                    title: 'Sucursal del distribuidor',
                    sortable: true
                },
                {
                    field: 'status',
                    title: 'Status pedido',
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
                    '<p style="font-size:20px;">Tabla de pedidos a proveedores' + '</p>' +
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
                return 'Mostrando: ' + totalRows + ' Clientes';
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + ' Filas por página';
            },
            formatNoMatches: function() {
                return 'Cliente no encontrado';
            },
        })

        function formatTableCellActions(value, row, index, field) {
            var eliminar = "'" + row.id_cliente + "'";
            return '<div class="action-buttons">' +
                //<button class="text-blue mx-1" data-target="#modalLlanta_' + row.id_llanta + '" data-toggle="modal">' +
                //  '<i class="fa fa-search-plus text-105"></i>' +
                //'</button>' +
                // '<a class="text-success mx-1" href="#">\
                //<i class="fa fa-search-plus text-105"></i>\
                //</a>'+
                '<button class="text-blue mx-1" data-toggle="modal" data-target="#modalDetalle" data-id="' + row.id_pedido + '" ><i class="fa fa-search-plus text-105"></i></button>' +
                '<a class="text-danger-m1 mx-1"  href="javascript:eliminar_cliente(' + eliminar + ')">' +
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



@stop
@stop
