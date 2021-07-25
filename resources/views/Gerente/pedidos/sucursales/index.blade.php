@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
<style>
    .table .thead-blue th {
        color: #fff;
        background-color: #3195f1;
        border-color: #0d7adf;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .text-red {
        color: red;
    }

    /*.thead-blue thead tr th{ 
      position: sticky;
      top: 0;
      z-index: 10;
      background-color: #ffffff;
    }*/

</style>
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            <i class="fas fa-file-invoice text-dark-l3 mr-1"></i>
            Mis pedidos
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

<!--Modal detalle del producto-->

<div class="modal fade modal-lg" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel2" style="color:white;">
                    DETALLES E HISTORIAL
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
                                        <div class="card dcard mb-4">
                                            <div class="card-body px-4 px-lg-5">
                                                <div class="mt-4">
                                                    <div class="page-header border-0 mb-0">
                                                        <h1 class="page-title text-dark-l3 text-115">
                                                            <small class="page-info text-dark-m3">
                                                            </small>
                                                        </h1>
                                                        <div class="page-tools">
                                                            <div class="action-buttons">
                                                                <input type="hidden" id="detalle_id" name="detalle_id">
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
                                                    <h1 class="page-title text-dark-l3 text-115">
                                                        Detalle del pedido
                                                    </h1>
                                                    <div class="table-responsive row  text-95 text-secondary-d3 py-25 border-y-2" style=" margin-right: 0px; margin-left: 0px;">
                                                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                                                            <thead class="bg-none " style="background-color:#309b74;">
                                                                <tr class="text-white">
                                                                    <th><b>Folio del pedido</b></th>
                                                                    <th><b>Código del producto</b></th>
                                                                    <th><b>Cantidad</b></th>
                                                                    <th><b>Descripción</b></th>

                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-95" id="tbl_pedido" name="tbl_pedido">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <h1 class="page-title text-dark-l3 text-115">
                                                        Historial de mi pedido
                                                    </h1>
                                                    <div class="table-responsive row  text-95 text-secondary-d3 py-25 border-y-2" style=" margin-right: 0px; margin-left: 0px;">
                                                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                                                            <thead class="bg-none " style="background-color:#309b74;">
                                                                <tr class="text-white">
                                                                    <th><b>Folio del pedido</b></th>
                                                                    <th><b>Status</b></th>
                                                                    <th><b>Fecha</b></th>
                                                                    <th><b>Descripción</b></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-95" id="tbl_historial" name="tbl_historial">

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


<script src="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\export\bootstrap-table-export.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\print\bootstrap-table-print.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\mobile\bootstrap-table-mobile.min.js"></script>

<!-- "Bootstrap Table" page script to enable its demo functionality -->
<script>
    jQuery(function($) {
        var datos = @json($pedidos_sucursales);
        // alert(datos);
        var arr = [];

        datos.forEach(objeto => {
            var status = "";
            if (objeto.status == "Solicitado") {
                status = '<span class="badge badge-sm bgc-info-d1 text-white pb-1 px-25">Solicitado</span>';
            } else
            if (objeto.status == "Aceptado") {
                status = '<span class="badge badge-sm bgc-green-d1 text-white pb-1 px-25">Aceptado</span>';
            } else
            if (objeto.status == "Rechazado") {
                status = '<span class="badge badge-sm bgc-red-d1 text-white pb-1 px-25">Rechazado</span>';
            } else
            if (objeto.status == "En transito") {
                status = '<span class="badge badge-sm bgc-warning-d1 text-white pb-1 px-25">En transito</span>';
            } else
            if (objeto.status == "Entregado") {
                status = '<span class="badge badge-sm bgc-green-d1 text-white pb-1 px-25">Entregado</span>';
            }
            arr.push({
                "id_pedido": objeto.id_pedido,
                "fecha": objeto.fecha,
                "nombre_usuario_destino": objeto.nombre_usuario_destino,
                "nombre_sucursal_usuario_destino": objeto.nombre_sucursal_usuario_destino,
                "nombre_usuario_origen": objeto.nombre_usuario_origen,
                "nombre_sucursal_usuario_origen": objeto.nombre_sucursal_usuario_origen,
                "status": status
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
                    field: 'id_pedido',
                    title: 'Folio pedido',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'fecha',
                    title: 'Fecha pedido',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'nombre_usuario_destino',
                    title: 'Nombre del solicitante',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'nombre_sucursal_usuario_destino',
                    title: 'Sucursal del solicitante',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'nombre_usuario_origen',
                    title: 'Nombre del distribuidor',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'nombre_sucursal_usuario_origen',
                    title: 'Sucursal del distribuidor',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'status',
                    title: 'Status pedido',
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
                return 'Mostrando: ' + totalRows + ' Pedidos';
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + ' Filas por página';
            },
            formatNoMatches: function() {
                return 'Pedido no encontrado';
            },
        })

        function formatTableCellActions(value, row, index, field) {
            return '<div class="action-buttons">' +
                //<button class="text-blue mx-1" data-target="#modalLlanta_' + row.id_llanta + '" data-toggle="modal">' +
                //  '<i class="fa fa-search-plus text-105"></i>' +
                //'</button>' +
                // '<a class="text-success mx-1" href="#">\
                //<i class="fa fa-search-plus text-105"></i>\
                //</a>'+
                '<button class="text-blue mx-1" data-toggle="modal" data-target="#modalDetalle" data-id="' + row.id_pedido + '" ><i class="fa fa-search-plus text-105"></i></button>' +
                '<button type="button" class="text-danger mx-1 " data-id="' + row.id_pedido + '"  data-toggle="modal" data-target="#eliminarModal">' +
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

<script type="text/javascript">
    $('#modalDetalle').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_pedido = button.data('id')
        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var llenado = '';
        var llenado2 = '';
        var datos = @json($detalles_pedido_sucursal);
        var historial = @json($historial_pedidos);
        var modal = $(this)
        modal.find('#detalle_id').val(id_pedido)

        datos.forEach(objeto => {
            if (objeto.id_pedido == id_pedido) {
                //alert("hola");
                llenado += '<tr> <td>' + objeto.id_pedido + '</td>' +
                    '<td>' + objeto.nombre + '</td>' +
                    '<td>' + objeto.cantidad + '</td>' +
                    '<td>' + objeto.descripcion + '</td>' +
                    '</tr>';
            }
        });
        console.log(llenado);
        document.getElementById('tbl_pedido').innerHTML = llenado;

        historial.forEach(objeto => {
            if (objeto.id_pedido == id_pedido) {
                var status = "";
                if (objeto.status == "Solicitado") {
                    status = '<span class="badge badge-sm bgc-info-d1 text-white pb-1 px-25">Solicitado</span>';
                } else
                if (objeto.status == "Aceptado") {
                    status = '<span class="badge badge-sm bgc-green-d1 text-white pb-1 px-25">Aceptado</span>';
                } else
                if (objeto.status == "Rechazado") {
                    status = '<span class="badge badge-sm bgc-red-d1 text-white pb-1 px-25">Rechazado</span>';
                } else
                if (objeto.status == "En transito") {
                    status = '<span class="badge badge-sm bgc-warning-d1 text-white pb-1 px-25">En transito</span>';
                } else
                if (objeto.status == "Entregado") {
                    status = '<span class="badge badge-sm bgc-green-d1 text-white pb-1 px-25">Entregado</span>';
                }

                llenado2 += '<tr> <td>' + objeto.id_pedido + '</td>' +
                    '<td>' + status + '</td>' +
                    '<td>' + objeto.fecha_evento + '</td>' +
                    '<td>' + objeto.descripcion_evento + '</td>' +
                    '</tr>';
            }
        });
        console.log(llenado2);
        document.getElementById('tbl_historial').innerHTML = llenado2;


    });

</script>
<script type="text/javascript">
    $('#eliminarModal').on('show.bs.modal', function(event) {
        /*RECUPERAR METADATOS DEL BOTÓN*/
        var button = $(event.relatedTarget)
        var id_pedido = button.data('id')
        var modal = $(this)
        modal.find('#delete_id').val(id_pedido)
    });

</script>

<script type="text/javascript">
    function eliminar_producto() {
        var id_pedido = document.getElementById("delete_id").value;
        var token = '{{csrf_token()}}';
        var data = {
            id_pedido: id_pedido,
            _token: token
        };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "/eliminar_pedido_sucursal",
            data: data,
            success: function(msg) {
                alert(msg);
                location.href = "/mostrar_pedido_sucursal";
            }
        });
    }

</script>
<script type="text/javascript">
function mostrar_ticket()
{
    var ticket=document.getElementById("detalle_id").value;
     var url = '/exportar_pedido_sucursal/' + ticket;
        window.open(
            url,
            '_blank' // <- This is what makes it open in a new window.
        );
}
</script>

@stop
@stop
