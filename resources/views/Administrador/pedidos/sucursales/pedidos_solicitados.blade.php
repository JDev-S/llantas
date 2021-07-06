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
<!--MODAL ACTUALIZAR STATUS -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Cambiar status del pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">



                    <div class="form-group col-md-12">
                        <label for="indice_velocidad">Status del pedido</label>
                        <input type="hidden" class="form-control col-sm-8 col-md-10" id="update_id_pedido" name="update_id_pedido">
                        <input type="hidden" id="update_sucursal" name="update_sucursal" >

                        <select class="form-control col-sm-8 col-md-10" id="update_status"  name="update_status" class="form-control">
                        </select>
                    </div>

                    <div class="form-row align-items-center col-md-12">
                        <div class="form-group col-md-12">
                            <label for="rin">Descripcion</label>
                            <textarea class="form-control" id="update_descripcion" name="update_descripcion">
                                    </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
                <button type="submit" class="btn btn-primary" onclick="cambiar_status()">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL ACTUALIZAR STATUS-->
<!--MODAL DETALLE PEDIDO-->
<div class="modal fade modal-lg" id="modalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel2" style="color:white;">
                    DETALLE DEL PEDIDO
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
                                                    <h1 class="page-title text-dark-l3 text-115">
                                                        Pedido
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

            var boton_status = '';
            if (objeto.id_status == "5" || objeto.id_status == "3") {
                boton_status = '<i class="fas fa-times fa-2x"></i>';
            } else {
                //                '<button class="text-blue mx-1" data-target="#editModal" data-toggle="modal"data-id="' + row.id_productos_llantimax + '" data-nombre="' + row.nombre + '" data-marca="' + row.marca + '" data-modelo="' + row.modelo + '" data-medidas="' + row.medidas + '" data-voltaje="' + row.voltaje + '" data-capacidad="' + row.capacidad_arranque + '" data-marc="' + row.id_marca + '" data-frio="' + row.capacidad_arranque_frio + '" data-peso="' + row.peso + '" data-foto="' + row.foto + '" data-tamanio="' + row.tamanio + '" data-precio="' + row.precio + '" ><i class="fa fa-pencil-alt"></i></button>' +
                boton_status = '<button class="btn" data-target="#editModal" data-toggle="modal" data-id="' + objeto.id_pedido + '" data-sucursal="' + objeto.id_sucursal_origen + '"  type="button"><i class="fas fa-redo fa-2x" style=" color:green"></i></button>';
                //class="fas fa-money-bill-alt fa-2x"
            }
            arr.push({
                "id_pedido": objeto.id_pedido,
                "nombre_usuario_destino": objeto.nombre_usuario_destino,
                "nombre_sucursal_usuario_destino": objeto.nombre_sucursal_usuario_destino,
                "nombre_usuario_origen": objeto.nombre_usuario_origen,
                "nombre_sucursal_usuario_origen": objeto.nombre_sucursal_usuario_origen,
                "status": status,
                "boton": boton_status
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
                    title: 'Folio del pedido',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'nombre_usuario_destino',
                    title: 'Solicitante',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'nombre_usuario_origen',
                    title: 'Distribuidor',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'nombre_sucursal_usuario_origen',
                    title: 'Origen',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'nombre_sucursal_usuario_destino',
                    title: 'Destino',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'status',
                    title: 'Status',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'boton',
                    title: 'Cambiar status',
                    align: 'center',
                    printIgnore: true,
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

<script type="text/javascript">
    $('#modalDetalle').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_pedido = button.data('id')
        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var llenado = '';
        var datos = @json($detalles_pedido_sucursal);
        var modal = $(this)


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
    });

</script>

<script type="text/javascript">
    $('#editModal').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_pedido = button.data('id')
        var id_sucursal=button.data('sucursal')
        var modal = $(this)
        modal.find('#update_id_pedido').val(id_pedido)
        modal.find('#update_sucursal').val(id_sucursal)

        var formData = new FormData();
        var token = '{{csrf_token()}}';
        formData.append("pedido", id_pedido);
        formData.append("_token", token);
        $.ajax({
            type: "POST",
            contentType: false,
            url: "/obtener_historiales",
            data: formData,
            processData: false,
            cache: false,
            success: function(msg) {
                var datos = JSON.parse(msg);
                var solicitados = @json($solicitados);
                var aceptados = @json($aceptados);
                var llenado = "";
                //console.log(datos.length);
                if (datos.length == 1) {
                    solicitados.forEach(objeto => {
                            llenado += '<option value="'+objeto.id_status+'">'+objeto.status+' </option>';  
                    });
                } else {
                    aceptados.forEach(objeto => { 
                            llenado += '<option value="'+objeto.id_status+'">'+objeto.status+' </option>';  
                    });
                }
                document.getElementById('update_status').innerHTML = llenado;
            }
        });
    });
</script>

<script type="text/javascript">
function cambiar_status() {
        var id_pedido = document.getElementById('update_id_pedido').value;
        var id_status = document.getElementById("update_status").value;
        var comentario = document.getElementById('update_descripcion').value;
        var sucursal=document.getElementById('update_sucursal').value;

        if(comentario.length==0)
        {
            comentario="Sin comentarios";        
        }
        
         console.log("Id: "+id_pedido+" Status:"+id_status+" Comentario:"+comentario+ " sucursal:"+sucursal);

        alert("Cambiando status del pedido");
       var token = '{{csrf_token()}}';
        var data = {
            id_pedido: id_pedido,
            id_status: id_status,
            sucursal:sucursal,
            comentario: comentario,
            _token: token
        };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "/actualizar_status_pedido",
            data: data,
            success: function(msg) {

                alert(msg);
                location.href = "/mostrar_pedido_solicitado";
            }
        });

    }

</script>
@stop
@stop
