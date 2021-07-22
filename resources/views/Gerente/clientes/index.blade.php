@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            <i class="fas fa-user text-dark-l3 mr-1"></i>
            Clientes
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

<!--MODAL AGREGAR CLIENTE -->

<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Ingresar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <form id="agregar_cliente_form">
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Nombre completo del cliente</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo del cliente" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="modelo">Telefono</label>
                                <input type="text" class="form-control mb-2" id="telefono" name="telefono" placeholder="Telefono" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Correo eléctronico</label>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Email" required>
                            </div>

                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">RFC</label>
                                <input type="text" class="form-control" id="rfc" name="rfc" placeholder="RFC" required>
                            </div>

                        </div>



                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="id-form-field-1" class="mb-0">
                                    Cliente habitual
                                </label>

                                <div class="radio-custom radio-default radio-inline">
                                    <label for="inputBasicMale">Sí</label>
                                    <input type="radio" id="habitual" name="habitual" value="1" required>

                                </div>
                                <div class="radio-custom radio-default radio-inline">
                                    <label for="inputBasicFemale">No</label>
                                    <input type="radio" id="habitual" name="habitual" value="0" required>

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
<!--FIN MODAL AGREGAR CLIENTE-->
<!--MODAL ACTUALIZAR CLIENTE -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Actualizar cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <form id="actualizar_clientes_form">
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Nombre del cliente</label>
                                <input type="hidden" class="form-control col-sm-8 col-md-10" id="update_id_cliente" name="update_id_cliente">

                                <input type="text" class="form-control" id="update_nombre" name="update_nombre" placeholder="Nombre del cliente" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="modelo">Teléfono</label>
                                <input type="text" class="form-control mb-2" id="update_telefono" name="update_telefono" placeholder="Marca" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Correo</label>
                                <input type="text" class="form-control" id="update_correo" name="update_correo" placeholder="Correo" required>
                            </div>

                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">RFC</label>
                                <input type="text" class="form-control" id="update_rfc" name="update_rfc" placeholder="RFC" required>
                            </div>

                        </div>


                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="id-form-field-1" class="mb-0">
                                    Cliente habitual
                                </label>
                                <div class="radio-custom radio-default radio-inline">
                                    <label for="inputBasicMale">Sí</label>
                                    <input type="radio" id="update_habitual" name="update_habitual" value="1" required>

                                </div>
                                <div class="radio-custom radio-default radio-inline">
                                    <label for="inputBasicFemale">No</label>
                                    <input type="radio" id="update_habitual" name="update_habitual" value="0" required>

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
                <button type="submit" class="btn btn-primary" onclick="actualizar_cliente();">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL ACTUALIZAR CLIENTE-->
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
        var datos = @json($clientes);
        // alert(datos);
        var arr = [];

        datos.forEach(objeto => {
            //let tmp =[] ;
            var habitual = "";

            if (objeto.cliente_habitual == 1) {
                habitual = "Cliente habitual";
            } else {
                habitual = "Cliente no habitual";
            }
            arr.push({
                "id_cliente": objeto.id_cliente,
                "fecha": objeto.fecha,
                "nombre_completo": objeto.nombre_completo,
                "telefono": objeto.telefono,
                "correo": objeto.correo,
                "sucursal": objeto.sucursal,
                "habitual": objeto.cliente_habitual,
                "habi": habitual,
                "suc": objeto.id_sucursal,
                "rfc": objeto.rfc
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
                    field: 'nombre_completo',
                    title: 'Nombre completo',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'fecha',
                    title: 'Fecha',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'telefono',
                    title: 'Telefono',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'correo',
                    title: 'Correo',
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
                    field: 'habi',
                    title: 'Cliente habitual',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'rfc',
                    title: 'RFC',
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
                    '<p style="font-size:20px;">Tabla de Clientes' + '</p>' +
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
            var eliminar = row.id_cliente;
            return '<div class="action-buttons">' +
                //<button class="text-blue mx-1" data-target="#modalLlanta_' + row.id_llanta + '" data-toggle="modal">' +
                //  '<i class="fa fa-search-plus text-105"></i>' +
                //'</button>' +
                // '<a class="text-success mx-1" href="#">\
                //<i class="fa fa-pencil-alt text-105"></i>\
                //</a>'+
                '<button class="text-blue mx-1" data-toggle="modal" data-target="#editModal" data-id="' + row.id_cliente + '" data-nombre="' + row.nombre_completo + '" data-telefono="' + row.telefono + '" data-correo="' + row.correo + '" data-sucursal="' + row.sucursal + '" data-rfc="' + row.rfc + '" data-habitual="' + row.habitual + '" data-suc="' + row.id_sucursal + '" ><i class="fa fa-pencil-alt"></i></button>' +
                '<button type="button" class="text-danger mx-1 " data-id="' + eliminar + '"  data-toggle="modal" data-target="#eliminarModal">' +
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
    function enviar_datos() {
        if ($("#agregar_cliente_form")[0].checkValidity()) {
            event.preventDefault();
            var nombre = document.getElementById("nombre").value;
            var rfc = document.getElementById("rfc").value;
            
            var telefono = document.getElementById("telefono").value;
            var correo = document.getElementById("correo").value;
            //var habitual = document.getElementById("habitual").value;

            let habitual = $('input[name="habitual"]:checked').val();

            var token = '{{csrf_token()}}';
            var data = {
                nombre: nombre,
                
                rfc: rfc,
                telefono: telefono,
                correo: correo,
                habitual: habitual,
                _token: token
            };

            $.ajax({
                type: "POST",
                url: "/agregar_cliente_sucursal",
                data: data,
                success: function(msg) {
                    location.href = "/mostrar_clientes_sucursal"
                }
            });
        } else {
            //SI HAY ERROR DE VALIDACIÓN, ENVÍA EL MENSAJE DE ERROR
            $("#agregar_cliente_form")[0].reportValidity();
        }

    }

</script>

<script type="text/javascript">
    $('#eliminarModal').on('show.bs.modal', function(event) {
        /*RECUPERAR METADATOS DEL BOTÓN*/
        var button = $(event.relatedTarget)
        var id_cliente = button.data('id')
        var modal = $(this)
        modal.find('#delete_id').val(id_cliente)
    });

</script>

<script type="text/javascript">
    function eliminar_producto() {
        var id_cliente = document.getElementById("delete_id").value;
        var token = '{{csrf_token()}}';
        var data = {
            id_cliente: id_cliente,
            _token: token
        };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "/eliminar_Cliente",
            data: data,
            success: function(msg) {
                alert(msg);
                location.href = "/mostrar_clientes_sucursal";
            }
        });
    }

</script>

<script type="text/javascript">
    $('#editModal').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_cliente = button.data('id')
        var nombre = button.data('nombre')
        var sucursal = button.data('sucursal')
        var id_sucursal = button.data('suc')
        var correo = button.data('correo')
        var habitual = button.data('habitual')
        var telefono = button.data('telefono')
        var rfc = button.data('rfc')

        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var modal = $(this)
        modal.find('#update_id_cliente').val(id_cliente)
        modal.find('#update_nombre').val(nombre)
        modal.find('#update_correo').val(correo)
        modal.find('#update_telefono').val(telefono)
        modal.find('#update_rfc').val(rfc)
        //update_habitual
        $("input[name=update_habitual][value='" + habitual + "']").prop("checked", true);
        $('#update_sucursal > option[value="' + id_sucursal + '"]').attr('selected', 'selected');
    });

</script>

<script type="text/javascript">
    function actualizar_cliente() {
        if ($("#actualizar_clientes_form")[0].checkValidity()) {
            event.preventDefault();
            var update_id_cliente = document.getElementById("update_id_cliente").value;
            var update_nombre = document.getElementById("update_nombre").value;
            var update_correo = document.getElementById("update_correo").value;
            var update_telefono = document.getElementById("update_telefono").value;
            
            var update_rfc = document.getElementById("update_rfc").value;

            let habitual = $('input[name="update_habitual"]:checked').val();
            alert(habitual);
            var formData = new FormData();
            var token = '{{csrf_token()}}';

            formData.append("update_id_cliente", update_id_cliente);
            formData.append("update_nombre", update_nombre);
            formData.append("update_correo", update_correo);
            formData.append("update_telefono", update_telefono);
            
            formData.append("update_habitual", habitual);
            formData.append("update_rfc", update_rfc);

            formData.append("_token", token);
            console.log(formData);

            alert("ESTA BIEN TODO");
            $.ajax({
                type: "POST",
                contentType: false,
                url: "/actualizar_cliente_sucursal",
                data: formData,
                processData: false,
                cache: false,
                success: function(msg) {
                    console.log(msg);
                    location.href = "/mostrar_clientes_sucursal";
                }
            });

        } else {
            $("#actualizar_clientes_form")[0].reportValidity();
        }
    }

</script>

@stop
@stop
