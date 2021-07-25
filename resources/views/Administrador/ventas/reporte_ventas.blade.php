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

    /*.thead-blue thead tr th{ 
      position: sticky;
      top: 0;
      z-index: 10;
      background-color: #ffffff;
    }*/

</style>
<link rel="stylesheet" type="text/css" href="\combine\npm\tiny-date-picker@3.2.8\tiny-date-picker.min.css,npm\tiny-date-picker@3.2.8\date-range-picker.min.css">
<link rel="stylesheet" type="text/css" href="\npm\eonasdan-bootstrap-datetimepicker@4.17.49\build\css\bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="\npm\dropzone@5.9.2\dist\dropzone.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d3">
            <i class="fas fa-file-pdf text-dark-l3 mr-1"></i>
            Reportes de ventas
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
                            Introduce fechas:
                        </h5>
                    </div>
                </div>
                <div class="card-body p-0 table-responsive-xl mt-4 mb-4">
                    <div class="col-md-12 mt-2">
                        <div class="row mb-2 ">
                            <form id="reporte_form" class=" form-row col-md-12 justify-content-center">
                                <div class="form-row col-md-12 justify-content-center">
                                    <div class="form-group col-md-2 ml-2 justify-content-center">
                                        
                                        <input type="text" class="form-control " id="id-date-1" name="id-date-1" required placeholder="Fecha Inicial"> 
                                    </div>

                                    <div class="form-group col-md-2 ml-2 justify-content-center">
                                    
                                        <input type="text" class="form-control " id="id-date-2" name="id-date-2" required placeholder="Fecha final"> 
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="form-row col-md-12 justify-content-center">
                                <div class="form-group col-auto ml-2 justify-content-center">
                                    <button class="btn px-4 btn-primary mb-1 " onclick="mostrar_ventas();">Visualizar</button>
                                </div>
                                 <div class="form-group col-auto ml-2 justify-content-center">
                                    <button class="btn px-4 btn-primary mb-1 " onclick="limpiar()">Limpiar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content container container-plus">

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
    TinyDatePicker('#id-date-1', {
            mode: 'dp-below',
            lang: {
                days: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vier', 'Sáb'],
                months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                today: 'Hoy',
                clear: 'Limpiar',
                close: 'Cerrar',
            },
        })
        .on('statechange', function(ev) {

        })

    var TinyDatePicker = DateRangePicker.TinyDatePicker;
    TinyDatePicker('#id-date-2', {
            mode: 'dp-below',
            lang: {
                days: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vier', 'Sáb'],
                months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                today: 'Hoy',
                clear: 'Limpiar',
                close: 'Cerrar',
            },
        })
        .on('statechange', function(ev) {

        })

</script>
<script type="text/javascript">
    function limpiar() {
        document.getElementById("id-date-1").value = "";
        document.getElementById("id-date-2").value = "";
        var $_bsTable = $('#table')
        $_bsTable.bootstrapTable('destroy')
    }

</script>

<script type="text/javascript">
    var tabla;
    var llenado = "";
    var productos = new Array();
    var total = 0;

    function mostrar_ventas() {
        if ($("#reporte_form")[0].checkValidity()) {
            event.preventDefault();
            var arr = [];
            var $_bsTable = $('#table')
            var inicio = document.getElementById("id-date-1").value;
            var fin = document.getElementById("id-date-2").value;
            alert(inicio + "      " + fin);
            console.log(inicio);
            console.log(fin);
            var principal = new Date(inicio); // M-D-YYYY
            var d = principal.getDate();
            var m = principal.getMonth() + 1;
            var y = principal.getFullYear();
            alert(y + "  " + "  " + m + "  " + d);
            var fecha_inicio = y + '-' + (m <= 9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
            var final = new Date(fin); // M-D-YYYY
            var d = final.getDate();
            var m = final.getMonth() + 1;
            var y = final.getFullYear();
            var fecha_fin = y + '-' + (m <= 9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
            alert(fecha_inicio + "   " + fecha_fin);
            var token = '{{csrf_token()}}';
            var data = {
                fecha_inicio: fecha_inicio,
                fecha_fin: fecha_fin,
                _token: token
            };
            $.ajax({
                type: "POST",
                url: "/mostrar_reportes_ventas",
                data: data,
                success: function(msg) {
                    jQuery(function($) {
                        var datos = JSON.parse(msg);
                        datos.forEach(objeto => {
                            //let tmp =[] ;
                            var myNumeral = numeral(objeto.venta);
                            var currencyString = myNumeral.format('$0,0.00');
                            arr.push({
                                "sucursal": objeto.sucursal,
                                "venta": currencyString,
                                "fecha": fecha_inicio + '<span style="color:blue; font-size:20px;"> - </span>' + fecha_fin

                            }, );
                            //arr.push(tmp);
                            //console.log(arr);
                        });
                        console.log(arr)
                        $_bsTable.bootstrapTable('destroy')


                        $_bsTable.bootstrapTable({
                            data: arr,
                            columns: [{
                                    field: 'sucursal',
                                    title: 'Sucursal',
                                    align: 'center',
                                    sortable: true
                                },
                                /*{
                                    field: 'categoria',
                                    title: 'Categoria',
                                    align: 'center',
                                    sortable: true
                                },*/
                                {
                                    field: 'venta',
                                    title: 'Total',
                                    align: 'center',
                                    sortable: true
                                },
                                {
                                    field: 'fecha',
                                    title: 'Fechas',
                                    align: 'center',
                                    sortable: true
                                },
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
                                    '<p style="font-size:20px;">Reporte de ventas' + '</p>' +
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
                                return 'Mostrando: ' + totalRows + ' Resultados';
                            },
                            formatRecordsPerPage: function(pageNumber) {
                                return pageNumber + ' Filas por página';
                            },
                            formatNoMatches: function() {
                                return 'Resultado no encontrado';
                            },

                        })

                        function formatTableCellActions(value, row, index, field) {
                            var eliminar = "'" + row.id_llanta + "'";
                            return '<div class="action-buttons">' +
                                //'<button class="text-blue mx-1" data-target="#modalLlanta_' + row.id_llanta + '" data-toggle="modal">' +
                                //  '<i class="fa fa-search-plus text-105"></i>' +
                                //    '</button>' +
                                // '<a class="text-success mx-1" href="#">\
                                //<i class="fa fa-pencil-alt text-105"></i>\
                                //</a>'+
                                //  '<a class="text-danger-m1 mx-1"  href="javascript:eliminar_producto(' + eliminar + ')">' +
                                //    '<i class="fa fa-trash-alt text-105"></i>' +
                                //  '</a>' +
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
                }
            });
        } else {
            $("#reporte_form")[0].reportValidity();
        }
    }

</script>
@stop
@stop
