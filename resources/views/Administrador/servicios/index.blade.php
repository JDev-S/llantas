@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            <i class="fas fa-oil-can text-dark-l3 mr-1"></i>
            Servicios
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
<!--MODAL AGREGAR SERVICIO -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Ingresar servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <form id="agregar_servicio_form">
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Nombre del servicio</label>

                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del servicio" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                            </div>

                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="precio">Precio</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" min='0' , step="any" class="form-control" id="precio" name="precio" placeholder="0.00" required>
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
<!--FIN MODAL AGREGAR SERVICIO-->
<!--MODAL ACTUALIZAR SERVICIO -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Ingresar servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <form id="actualizar_servicio_form">
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Nombre del servicio</label>
                                <input type="hidden" class="form-control col-sm-8 col-md-10" id="update_id_servicio" name="update_id_servicio">
                                <input type="text" class="form-control" id="update_nombre" name="update_nombre" placeholder="Nombre del servicio" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-12">
                                <label for="rin">Descripcion</label>
                                <textarea class="form-control" id="update_descripcion" name="update_descripcion" required></textarea>
                            </div>

                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="precio">Precio</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" min='0.00' , step="any" class="form-control" id="update_precio" name="update_precio" placeholder="0.00" required>
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
                <button type="submit" class="btn btn-primary" onclick="actualizar_servicio();">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL ACTUALIZAR SERVICIO-->
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
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

<!-- "Bootstrap Table" page script to enable its demo functionality -->
<script>
    jQuery(function($) {
        var datos = @json($servicios);
        //alert(datos);
        var arr = [];

        datos.forEach(objeto => {
            var a = numeral(objeto.precio);
            var b = a.format('$0,0.00');
            //let tmp =[] ;
            arr.push({
                "id_productos_llantimax": objeto.id_productos_llantimax,
                "precio_total": b,
                "nombre": objeto.nombre,
                "precio": objeto.precio,
                "descripcion": objeto.descripcion

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
                    title: 'Nombre del servicio',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'precio_total',
                    title: 'Precio',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'descripcion',
                    title: 'Descripcion',
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
                    '<p style="font-size:20px;">Tabla de servicios' + '</p>' +
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
                return 'Mostrando: ' + totalRows + ' Servicios';
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + ' Filas por página';
            },
            formatNoMatches: function() {
                return 'Servicio no encontrado';
            },
        })

        function formatTableCellActions(value, row, index, field) {
            var eliminar = row.id_productos_llantimax;
            return '<div class="action-buttons">' +
                // '<a class="text-success mx-1" href="#">\
                //<i class="fa fa-pencil-alt text-105"></i>\
                //</a>'+
                '<button class="text-blue mx-1" data-toggle="modal" data-target="#editModal" data-id="' + row.id_productos_llantimax + '" data-nombre="' + row.nombre + '" data-precio="' + row.precio + '" data-descripcion="' + row.descripcion + '" ><i class="fa fa-pencil-alt"></i></button>' +
                '<button type="button" class="text-danger mx-1 " data-id="' + eliminar + '"  data-toggle="modal" data-target="#eliminarModal">' +
                '<i class="fa fa-trash-alt text-105"></i>' +
                '</button>'
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
    $('#eliminarModal').on('show.bs.modal', function(event) {
        /*RECUPERAR METADATOS DEL BOTÓN*/
        var button = $(event.relatedTarget)
        var id_servicio = button.data('id')
        var modal = $(this)
        modal.find('#delete_id').val(id_servicio)
    });

</script>

<script type="text/javascript">
    function eliminar_producto() {
        var id_producto = document.getElementById("delete_id").value;
        var token = '{{csrf_token()}}';
        var data = {
            id_producto: id_producto,
            _token: token
        };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "/eliminar_Servicio",
            data: data,
            success: function(msg) {
                alert(msg);
                location.href = "/mostrar_servicios";
            }
        });
    }

</script>

<script type="text/javascript">
    function enviar_datos() {
        if ($("#agregar_servicio_form")[0].checkValidity()) {
            event.preventDefault();
            var nombre = document.getElementById("nombre").value;
            var descripcion = document.getElementById("descripcion").value;
            var precio = document.getElementById("precio").value;

            var token = '{{csrf_token()}}';
            var data = {
                nombre: nombre,
                precio: precio,
                descripcion: descripcion,
                _token: token
            };

            //alert("Esta bien todo");
            //alert(nombre+"  "+precio+"  "+descripcion);
            $.ajax({
                type: "POST",
                url: "/agregar_servicios",
                data: data,
                success: function(msg) {
                    location.href = "/mostrar_servicios"
                }
            });
        } else {
            //SI HAY ERROR DE VALIDACIÓN, ENVÍA EL MENSAJE DE ERROR
            $("#agregar_servicio_form")[0].reportValidity();
        }

    }

</script>
<script type="text/javascript">
    $('#editModal').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_servicio = button.data('id')
        var nombre_servicio = button.data('nombre')
        var descripcion = button.data('descripcion')
        var precio = button.data('precio')

        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var modal = $(this)
        modal.find('#update_id_servicio').val(id_servicio)
        modal.find('#update_nombre').val(nombre_servicio)
        modal.find('#update_precio').val(precio)
        modal.find('#update_descripcion').val(descripcion)

    });

</script>
<script type="text/javascript">
    function actualizar_servicio() {
        if ($("#actualizar_servicio_form")[0].checkValidity()) {
            event.preventDefault();
            var update_id_servicio = document.getElementById("update_id_servicio").value;
            var update_nombre = document.getElementById("update_nombre").value;
            var update_precio = document.getElementById("update_precio").value;
            //var update_precio = precio.replace(/[$.,]/g, '');
            var update_descripcion = document.getElementById("update_descripcion").value;


            var formData = new FormData();
            var token = '{{csrf_token()}}';
            formData.append("update_id_servicio", update_id_servicio);
            formData.append("update_nombre", update_nombre);
            formData.append("update_precio", update_precio);
            formData.append("update_descripcion", update_descripcion);
            formData.append("_token", token);
            console.log(formData);
            console.log(update_id_servicio);

            alert("Esta funcionando correctamente");
            alert(update_nombre + "  " + update_descripcion + " " + update_precio);

            $.ajax({
                type: "POST",
                contentType: false,
                url: "/actualizar_Servicio",
                data: formData,
                processData: false,
                cache: false,
                success: function(msg) {
                    //console.log(msg);
                    location.href = "/mostrar_servicios";
                }
            });

        } else {
            //SI HAY ERROR DE VALIDACIÓN, ENVÍA EL MENSAJE DE ERROR
            $("#actualizar_servicio_form")[0].reportValidity();
        }
    }

</script>
@stop
@stop
