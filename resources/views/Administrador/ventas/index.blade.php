@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
<style type="text/css">
    input:disabled {
        background: white;
    }

    .green_total {
        background: #309B74;
    }

</style>
<style>
    .table .thead-blue th {
        color: #fff;
        background-color: #3195f1;
        border-color: #0d7adf;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    /*.thead-blue thead tr th{ 
      position: sticky;
      top: 0;
      z-index: 10;
      background-color: #ffffff;
    }*/

</style>
<link rel="stylesheet" type="text/css" href="\npm\dropzone@5.9.2\dist\dropzone.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            <i class="fas fa-shopping-cart text-dark-l3 mr-1"></i>
            Ventas
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
                <a href="/agregar_venta" class="text-blue " type="button" style="margin-right:20px; border:0px;"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></a>
            </div>
            <table class="table text-dark-m2 text-95 bgc-white ml-n1px" id="table">
                <!-- table -->
            </table>
        </div>
    </div>
</div>

<!--Modal detalle del producto-->
<div class="modal fade modal-lg" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel2" style="color:white;">
                    DETALLE DE LA VENTA
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card-body p-0">

                    <div role="main" class="main-content">

                        <div class="page-content container container-plus">
                            <div class="container px-0">

                                <div class="row mt-0">
                                    <div class="col-12 col-lg-10 offset-lg-1 col-xl-12 offset-xl-0">

                                        <div class="page-header border-0 mb-0">
                                            <h1 class="page-title text-dark-l3 text-115">
                                                DETALLE VENTA
                                                <i class="fa fa-angle-right text-80 ml-1"></i>
                                                <small class="page-info text-dark-m3">

                                                </small>
                                            </h1>

                                            <div class="page-tools">
                                                <div class="action-buttons">
                                                    <input type="hidden" id="detalle_ticket" name="detalle_ticket">
                                                    <a class="btn bg-white btn-light mx-1px text-95 shadow-sm" href="javascript:mostrar_ticket()" data-title="Print">
                                                        <i class="mr-1 fa fa-print text-primary text-120 w-2"></i>
                                                        Imprimir
                                                    </a>
                                                    <a class="btn bg-white btn-light mx-1px text-95 shadow-sm" href="javascript:mostrar_ticket()" data-title="PDF">
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

                                                        Sucursal: <input type="text" disabled style="border:0;" id="detalle_sucursal" name="detalle_sucursal">
                                                    </span>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <div class="text-100 text-grey-m1 align-middle">
                                                                <div class="mt-1 mb-2 text-secondary-d1 text-600 text-125">
                                                                    Cliente
                                                                </div>
                                                            </div>

                                                            <div class="text-600 text-100 text-primary mt-2">
                                                                <input type="text" class="text-600 text-100 text-primary mt-2" disabled style="border:0;" id="detalle_cliente" name="detalle_cliente" size="20">

                                                            </div>

                                                            <div class="text-dark-l1">
                                                                <div class="my-1">
                                                                    Tel??fono:
                                                                    <input type="text" disabled style="border:0;" id="detalle_telefono" name="detalle_telefono" size="20">
                                                                </div>
                                                                <div class="my-1">
                                                                    Correo:
                                                                    <input type="text" disabled style="border:0;" id="detalle_correo" name="detalle_correo" size="20">
                                                                </div>
                                                                <div class="my-1">
                                                                    M??todo pago:
                                                                    <input type="text" disabled style="border:0;" id="detalle_pago" name="detalle_pago" size="20">
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
                                                                <input type="text" disabled style="border:0;" id="detalle_id_venta" name="detalle_id_venta">
                                                            </div>

                                                            <div class="my-2">
                                                                <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                                                <span class="text-600 text-90">
                                                                    Fecha:
                                                                </span>
                                                                <input type="text" disabled style="border:0;" id="detalle_fecha" name="detalle_fecha">
                                                            </div>
                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.?????? -->
                                                <div class="mt-4">
                                                    <div class="row text-600 text-95 text-secondary-d3 brc-green-l1 py-25 border-y-2">
                                                        <div class="col-7 col-sm-5">
                                                            C??digo
                                                        </div>

                                                        <div class="d-none d-sm-block col-4 col-sm-2">
                                                            Cant.
                                                        </div>

                                                        <div class="d-none d-sm-block col-sm-2">
                                                            Precio
                                                        </div>

                                                        <div class="col-5 col-sm-2">
                                                            Total
                                                        </div>
                                                    </div>

                                                    <div class="text-95 text-dark-m3" id="detalles_venta">


                                                    </div>
                                                    <div class="row border-b-2 brc-green-l1"></div>

                                                    <div class="row mt-4">
                                                        <div class="col-10 col-sm-5 text-dark-l1 text-90 order-first order-sm-last" style="
                          padding-left: 30px; padding-right: 0px;">
                                                            <div class="row my-2 align-items-center bgc-green-d3 p-2 radius-1">
                                                                <div class="col-6 text-right text-white text-100">
                                                                    Monto Total:
                                                                </div>
                                                                <div class="col-6" id="detalle_total">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr class="brc-secondary-l3 border-t-2 mb-5">
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

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!--FIN MODAL DETALLE -->
<!--MODAL ACTUALIZAR Venta -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Actualizar Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <form id="actualizar_venta_form">

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Fecha de la venta</label>
                                <input type="hidden" id="update_id_venta" name="update_id_venta" required>
                                <input type="date" class="form-control " id="update_fecha" name="update_fecha" required placeholder="Fecha venta">
                            </div>

                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Total de la venta</label>
                                <input class="form-control" min="0.01" max="999999999.00" step="any" lang="en" type="number" placeholder="Precio" style="border-color:#2470BD" id="update_total" name="update_total" required>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
                <button type="submit" class="btn btn-primary" onclick="actualizar_venta();">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL ACTUALIZAR Venta-->
<!--MODAL ELIMINAR-->
<div class="modal fade" data-backdrop-bg="bgc-white" id="eliminarModal" tabindex="-1" aria-labelledby="dangerModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content bgc-transparent brc-danger-m2 shadow">
            <div class="modal-header py-2 bgc-danger-tp1 border-0  radius-t-1">
                <h5 class="modal-title text-white-tp1 text-110 pl-2 font-bolder" id="dangerModalLabel">
                    Advertencia!
                </h5>

                <button type="button" class="position-tr btn btn-xs btn-outline-white btn-h-yellow btn-a-yellow mt-1px mr-1px btn-brc-tp" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-150">??</span>
                </button>
            </div>


            <div class="modal-body bgc-white-tp2 p-md-4 pl-md-5">
                <div class="d-flex align-items-top mr-2 mr-md-5">
                    <i class="fas fa-exclamation-triangle fa-2x text-orange-d2 float-rigt mr-4 mt-1"></i>
                    <input type="hidden" class="form-control" id="delete_id" name="delete_id">
                    <div class="text-secondary-d2 text-105">
                        Esta seguro de que desea eliminarlo?
                    </div>
                </div>
            </div>

            <div class="modal-footer bgc-white-tp2 border-0">
                <button type="button" class="btn px-4 btn-light-grey" data-dismiss="modal">
                    No
                </button>

                <button type="button" class="btn px-4 btn-danger" id="id-danger-yes-btn" onclick="eliminar_producto()" data-dismiss="modal">
                    Si
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL ELIMINAR-->

@section('scripts')

<!-- include vendor scripts used in "Bootstrap Table" page. see "/views//pages/partials/table-bootstrap/@vendor-scripts.hbs" -->
<script src="\npm\tableexport.jquery.plugin@1.10.22\tableExport.min.js"></script>

<script src="\npm\dropzone@5.9.2\dist\dropzone.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\export\bootstrap-table-export.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\print\bootstrap-table-print.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\mobile\bootstrap-table-mobile.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script src="\npm\eonasdan-bootstrap-datetimepicker@4.17.49\src\js\bootstrap-datetimepicker.min.js"></script>
<script src="\npm\tiny-date-picker@3.2.8\dist\date-range-picker.min.js"></script>
<script src="\npm\tableexport.jquery.plugin@1.10.22\tableExport.min.js"></script>
<script src="\npm\dropzone@5.9.2\dist\dropzone.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\export\bootstrap-table-export.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\print\bootstrap-table-print.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\mobile\bootstrap-table-mobile.min.js"></script>
<script src="\npm\tiny-date-picker@3.2.8\dist\date-range-picker.min.js"></script>
<script src="\npm\moment@2.29.1\moment.min.js"></script>
<script src="\npm\eonasdan-bootstrap-datetimepicker@4.17.49\src\js\bootstrap-datetimepicker.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script type="text/javascript">
    var TinyDatePicker = DateRangePicker.TinyDatePicker;
    TinyDatePicker('#update_fecha', {
            mode: 'dp-below',
            lang: {
                days: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vier', 'S??b'],
                months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                today: 'Hoy',
                clear: 'Limpiar',
                close: 'Cerrar',
            },
        })
        .on('statechange', function(ev) {

        })

</script>
<!-- "Bootstrap Table" page script to enable its demo functionality -->
<script>
    jQuery(function($) {
        var datos = @json($ventas);
        //alert(datos);
        var arr = [];

        datos.forEach(objeto => {
            //let tmp =[] ;
            var myNumeral = numeral(objeto.total_venta);
            var currencyString = myNumeral.format('$0,0.00');
            var factura = "";
            var fact = "";
            if (objeto.factura === 1) {
                factura = "S??";
                fact = '<input type="checkbox" checked="true" disabled>';
            } else {
                factura = "No";
                fact = '<input type="checkbox" disabled>';
            }
            arr.push({
                //"id_productos_llantimax": '<button class="btn px-4 btn-info mb-1" data-target="#modalLlanta_' + objeto.id_productos_llantimax + '_' + objeto.sucursal + '" data-toggle="modal" type="button">' + objeto.id_productos_llantimax + '</button>',
                "id_venta": objeto.id_venta,
                //"id_productos_llantimax": '<button class="btn px-4 btn-info mb-1" data-target="#modalLlanta_' + objeto.id_productos_llantimax + '" data-toggle="modal" type="button">Ver detalles </button>',
                "vendedor": objeto.vendedor,
                //"categoria": objeto.categoria,
                "sucursal": objeto.sucursal,
                "cliente": objeto.cliente,
                "telefono": objeto.telefono,
                "correo": objeto.correo_electronico,
                "factura": factura,
                "invoice": fact,
                "total_venta": currencyString,
                "total":objeto.total_venta,
                "metodo_pago": objeto.metodo_pago,
                "fecha_venta": objeto.fecha_venta
                //"fotografia_miniatura": '<img src="/img/' + objeto.fotografia_miniatura + '" width="80px" height="80px" alt="' + objeto.nombre + '">'
                // "sucursal": objeto.sucursal
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
                    field: 'id_venta',
                    title: 'Folio venta',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'vendedor',
                    title: 'Vendedor',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'sucursal',
                    title: 'Sucursal',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'cliente',
                    title: 'Cliente',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'total_venta',
                    title: 'Total de la venta',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'metodo_pago',
                    title: 'M??todo de pago',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'fecha_venta',
                    title: 'Fecha de la venta',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'invoice',
                    title: 'Factura',
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
            //theadClasses: "bgc-white text-grey text-uppercase text-80 sticky",
            theadClasses: "thead-blue",
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
                    '<p style="font-size:20px;">Tabla de ventas' + '</p>' +
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
                return 'Mostrando: ' + totalRows + ' Ventas';
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + ' Filas por p??gina';
            },
            formatNoMatches: function() {
                return 'Venta no encontrada';
            },

        })

        function formatTableCellActions(value, row, index, field) {

            return '<div class="action-buttons">\
                <button class="text-blue mx-1" data-target="#modalDetalle" data-id="' + row.id_venta + '" data-factura="' + row.factura + '" data-pago="' + row.metodo_pago + '" data-vendedor="' + row.vendedor + '"  data-suc="' + row.sucursal + '" data-cliente="' + row.cliente + '" data-telefono="' + row.telefono + '" data-total="' + row.total_venta + '" data-correo="' + row.correo + '" data-fecha="' + row.fecha_venta + '" data-toggle="modal">' +
                '<i class="fa fa-search-plus text-105"></i>' +
                '</button>' +
                '<button class="text-blue mx-1" data-toggle="modal" data-target="#editModal" data-id="' + row.id_venta  + '" data-fecha="' + row.fecha_venta + '" data-total="' + row.total + '" ><i class="fa fa-pencil-alt"></i></button>' +
                '<button type="button" class="text-danger mx-1 " data-id="' + row.id_venta + '"  data-toggle="modal" data-target="#eliminarModal">' +
                '<i class="fa fa-trash-alt text-105"></i>' +
                '</button>' +
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

<script>
    $('#ace-file-input1').aceFileInput({
        /**
        btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
        btnChooseText: 'SELECT FILE',
        placeholderText: 'NO FILE YET',
        placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
        */
    })
    Dropzone.autoDiscover = false;

    jQuery(function($) {
        try {

            $('#dropzone').addClass('dropzone');
            var myDropzone = new Dropzone('#dropzone', {
                previewTemplate: $('#preview-template').html(),
                // autoProcessQueue: false,
                addRemoveLinks: false,

                thumbnailHeight: 120,
                thumbnailWidth: 120,
                maxFilesize: 0.5,
                filesizeBase: 1000,

                //addRemoveLinks : true,
                //dictRemoveFile: 'Remove',


                thumbnail: function(file, dataUrl) {
                    if (file.previewElement) {
                        $(file.previewElement).removeClass("dz-file-preview");
                        $(file.previewElement).find("[data-dz-thumbnail]").each(function() {
                            var thumbnailElement = this;
                            thumbnailElement.alt = file.name;
                            thumbnailElement.src = dataUrl;
                        })

                        setTimeout(function() {
                            $(file.previewElement).addClass("dz-image-preview")
                        }, 1)
                    }
                }
            }) // new Dropzone



            // simulating upload progress
            var minSteps = 6,
                maxSteps = 60,
                timeBetweenSteps = 100,
                bytesPerStep = 100000;

            myDropzone.uploadFiles = function(files) {
                var self = this;

                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                    for (var step = 0; step < totalSteps; step++) {
                        var duration = timeBetweenSteps * (step + 1);
                        setTimeout(function(file, totalSteps, step) {
                            return function() {
                                file.upload = {
                                    progress: 100 * (step + 1) / totalSteps,
                                    total: file.size,
                                    bytesSent: (step + 1) * file.size / totalSteps
                                };

                                self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
                                if (file.upload.progress == 100) {
                                    file.status = Dropzone.SUCCESS;
                                    self.emit("success", file, 'success', null);
                                    self.emit("complete", file);
                                    self.processQueue();
                                }
                            };
                        }(file, totalSteps, step), duration);
                    } // fpr step
                } //for i

            } // myDropzone.uploadFiles

        } catch (err) {
            // console.log(err)
            // alert('Dropzone.js does not support older browsers!');
            $('#dropzone').addClass('p-0')
                .find('.fallback').removeClass('d-none')
                .end().find('.dz-default').addClass('d-none')
                .end().find('input[type=file]').aceFileInput({
                    style: 'drop',
                    droppable: true,

                    container: 'border-0 py-3',

                    placeholderClass: 'text-125 text-600 text-grey-m3 my-2',
                    placeholderText: 'Drop images here or click to choose',
                    placeholderIcon: '<i class="fa fa-cloud-upload-alt fa-3x text-info-m2 my-2"></i>',

                    //previewSize: 64,
                    thumbnail: 'large'
                })
        }

    })

</script>

<script type="text/javascript">
    function enviar_datos() {

        var nombre_llanta = document.getElementById("nombre_llanta").value;
        var marca = document.getElementById("marca").value;
        var precio = document.getElementById("precio").value;
        var fotografia_miniatura = document.getElementById("ace-file-input1").files[0];
        var modelo = document.getElementById("modelo").value;
        var medida = document.getElementById("medida").value;
        var capacidad_carga = document.getElementById("capacidad_carga").value;
        var indice_velocidad = document.getElementById("indice_velocidad").value;
        var numero_rin = document.getElementById("numero_rin").value;

        //alert(nombre_llanta + "  " + marca + "  " + precio + "  " + fotografia_miniatura + "  " + modelo + "  " + medida + "  " + capacidad_carga + "  " + indice_velocidad + "  " + numero_rin + "  ");

        var formData = new FormData();
        var token = '{{csrf_token()}}';
        formData.append("fotografia_miniatura", fotografia_miniatura);
        formData.append("nombre_llanta", nombre_llanta);
        formData.append("marca", marca);
        formData.append("precio", precio);
        formData.append("modelo", modelo);
        formData.append("medida", medida);
        formData.append("capacidad_carga", capacidad_carga);
        formData.append("indice_velocidad", indice_velocidad);
        formData.append("numero_rin", numero_rin);
        formData.append("_token", token);
        $.ajax({
            type: "POST",
            contentType: false,
            url: "/agregar_llantas",
            data: formData,
            processData: false,
            cache: false,
            success: function(msg) {
                location.href = "/mostrar_llantas";
            }
        });
    }

</script>
<script type="text/javascript">
    function mostrar_ticket() {
        //location.href="/imprimir","_blank";
        var ticket = document.getElementById("detalle_id_venta").value;
        var url = '/exportar_ticket/' + ticket;
        window.open(
            url,
            '_blank' // <- This is what makes it open in a new window.
        );

    }

</script>
<script type="text/javascript">
    $('#eliminarModal').on('show.bs.modal', function(event) {
        /*RECUPERAR METADATOS DEL BOT??N*/
        var button = $(event.relatedTarget)
        var id_venta = button.data('id')
        var modal = $(this)
        modal.find('#delete_id').val(id_venta)
    });

</script>

<script type="text/javascript">
    function eliminar_producto() {
        var id_venta = document.getElementById("delete_id").value;
        var token = '{{csrf_token()}}';
        var data = {
            id_venta: id_venta,
            _token: token
        };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "/eliminar_venta",
            data: data,
            success: function(msg) {
                alert(msg);
                location.href = "/mostrar_venta";
            }
        });
    }

</script>
<script type="text/javascript">
    $('#modalDetalle').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOT??N/
        var button = $(event.relatedTarget)
        var id_venta = button.data('id')
        var vendedor = button.data('vendedor')
        var sucursal = button.data('suc')
        var cliente = button.data('cliente')
        var telefono = button.data('telefono')
        var correo = button.data('correo')
        var factura = button.data('factura')
        var fecha_venta = button.data('fecha')
        var total_venta = button.data('total')
        var pago = button.data('pago')
        var llenado = '';
        var datos = @json($detalles);
        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var modal = $(this)
        modal.find('#detalle_id_venta').val(id_venta)
        modal.find('#detalle_vendedor').val(vendedor)
        modal.find('#detalle_sucursal').val(sucursal)
        modal.find('#detalle_cliente').val(cliente)
        modal.find('#detalle_telefono').val(telefono)
        modal.find('#detalle_correo').val(correo)
        modal.find('#detalle_factura').val(factura)
        modal.find('#detalle_fecha').val(fecha_venta)
        modal.find('#detalle_pago').val(pago)
        //modal.find('#detalle_total').val(total_venta)

        document.getElementById('detalle_total').innerHTML = '';
        document.getElementById('detalle_total').innerHTML = '<span class="text-100 text-white">' + total_venta + '</span>';
        datos.forEach(objeto => {
            if (objeto.id_venta == id_venta) {
                //alert("hola");
                var a = numeral(objeto.precio_unidad);
                var b = a.format('$0,0.00');
                var c = numeral(objeto.total);
                var d = c.format('$0,0.00');

                llenado += '<div class="row mb-2 mb-sm-0 py-25">' +
                    '<div class="col-7 col-sm-5">' + objeto.nombre + '</div>' +
                    '<div class="d-none d-sm-block col-1">' + objeto.cantidad_producto + '</div>' +
                    '<div class="d-none d-sm-block col-3 text-95">' +
                    b +
                    '</div>' +
                    '<div class="col-5 col-sm-3 text-secondary-d3 text-600">' +
                    d +
                    '</div>' +
                    '</div>';
            }
        });
        console.log(llenado);
        document.getElementById('detalles_venta').innerHTML = "";
        document.getElementById('detalles_venta').innerHTML = llenado;

    });

</script>
<script type="text/javascript">
    $('#editModal').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOT??N/
        var button = $(event.relatedTarget)
        var id_venta = button.data('id')
        var fecha_venta = button.data('fecha')
        var total_venta = button.data('total')
       

        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var modal = $(this)
        modal.find('#update_id_venta').val(id_venta)
        modal.find('#update_fecha').val(fecha_venta)
        modal.find('#update_total').val(total_venta)
       
    });

</script>
<script type="text/javascript">
    function actualizar_venta() {
        if ($("#actualizar_venta_form")[0].checkValidity()) {
            event.preventDefault();
            var update_id_venta = document.getElementById("update_id_venta").value;
            var update_fecha = document.getElementById("update_fecha").value;
            var update_total = document.getElementById("update_total").value;

            var principal = new Date(update_fecha); // M-D-YYYY
            var d = principal.getDate();
            var m = principal.getMonth() + 1;
            var y = principal.getFullYear();
            alert(y + "  " + "  " + m + "  " + d);
            var fecha_inicio = y + '-' + (m <= 9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);

            var formData = new FormData();
            var token = '{{csrf_token()}}';

            formData.append("update_id_venta", update_id_venta);
            formData.append("update_fecha", fecha_inicio);
            formData.append("update_total", update_total);



            formData.append("_token", token);
            console.log(formData);

            alert("ESTA BIEN TODO");
            $.ajax({
                type: "POST",
                contentType: false,
                url: "/actualizar_venta",
                data: formData,
                processData: false,
                cache: false,
                success: function(msg) {
                    console.log(msg);
                    location.href = "/mostrar_venta";
                }
            });

        } else {
            $("#actualizar_venta_form")[0].reportValidity();
        }
    }

</script>

@stop
@stop
