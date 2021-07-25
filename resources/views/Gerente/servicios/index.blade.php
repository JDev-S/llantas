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
                    title: 'Descripción',
                    align: 'center',
                    sortable: true
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
