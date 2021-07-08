@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            Creditos
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
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="codigo_llanta">Nombre completo del cliente</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo del cliente">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modelo">Telefono</label>
                            <input type="text" class="form-control mb-2" id="telefono" name="telefono" placeholder="Telefono">
                        </div>
                    </div>

                    <div class="form-row align-items-center col-md-12">
                        <div class="form-group col-md-6">
                            <label for="rin">Correo eléctronico</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Email">
                        </div>

                    </div>

                    <div class="form-group col-md-12">
                        <label for="indice_velocidad">Sucursal</label>
                        <?php
                            $query2 = "select * from sucursal ";
                            $data2=DB::select($query2);      
                        ?>
                        <select id="sucursal" name="sucursal" class="form-control">
                            @foreach($data2 as $item)
                            <option value="{{ $item->id_sucursal }}"> {{ $item->sucursal }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-row align-items-center col-md-12">
                        <div class="form-group col-md-6">
                            <label for="id-form-field-1" class="mb-0">
                                Cliente habitual
                            </label>

                            <div class="radio-custom radio-default radio-inline">
                                <label for="inputBasicMale">Sí</label>
                                <input type="radio" id="habitual" name="habitual" value="1">

                            </div>
                            <div class="radio-custom radio-default radio-inline">
                                <label for="inputBasicFemale">No</label>
                                <input type="radio" id="habitual" name="habitual" value="0">

                            </div>
                        </div>

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
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="codigo_llanta">Nombre del cliente</label>
                             <input type="hidden" class="form-control col-sm-8 col-md-10" id="update_id_cliente" name="update_id_cliente">
                                   
                            <input type="text" class="form-control" id="update_nombre" name="update_nombre" placeholder="Nombre del cliente">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modelo">Teléfono</label>
                            <input type="text" class="form-control mb-2" id="update_telefono" name="update_telefono" placeholder="Marca">
                        </div>
                    </div>

                    <div class="form-row align-items-center col-md-12">
                        <div class="form-group col-md-6">
                            <label for="rin">Correo</label>
                            <input type="text" class="form-control" id="update_correo" name="update_correo" placeholder="Correo">
                        </div>

                    </div>

                    <div class="form-group col-md-12">
                        <label for="indice_velocidad">Sucursal</label>
                        <?php
                            $query2 = "select * from sucursal ";
                            $data2=DB::select($query2);      
                        ?>
                        <select id="update_sucursal" name="update_sucursal" class="form-control">
                            @foreach($data2 as $item)
                            <option value="{{ $item->id_sucursal }}"> {{ $item->sucursal }} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-row align-items-center col-md-12">
                        <div class="form-group col-md-6">
                            <label for="id-form-field-1" class="mb-0">
                                Cliente habitual
                            </label>
                            <div class="radio-custom radio-default radio-inline">
                                <label for="inputBasicMale">Sí</label>
                                <input type="radio" id="update_habitual" name="update_habitual" value="1">

                            </div>
                            <div class="radio-custom radio-default radio-inline">
                                <label for="inputBasicFemale">No</label>
                                <input type="radio" id="update_habitual" name="update_habitual" value="0">

                            </div>
                        </div>
                    </div>

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
        var datos = @json($creditos);
        alert(datos);
        var arr = [];

        datos.forEach(objeto => {
            //let tmp =[] ;
            // var c = numeral (objeto.total_venta);
            //var d = myNumeral.format('$0,0.00');
            var boton_comprar = "";

            if (objeto.monto == objeto.total_venta) {
                boton_comprar = '<i class="fas fa-times fa-2x"></i>';
            } else {
                boton_comprar = '<button class="btn" data-target="#modalNuevo_' + objeto.id_credito + '" data-toggle="modal" type="button"><i class="fas fa-money-bill-alt fa-2x" style="color:green"></i></button>'
            }
            var liquidado="";
            if(objeto.status_credito=="No liquidado")
                {
                    liquidado='<span class="badge badge-sm bgc-red-d1 text-white pb-1 px-25">No liquidado</span>';
                }
            else{
                liquidado='<span class="badge badge-sm bgc-green-d1 text-white pb-1 px-25">Liquidado</span>';
            }

            var monto_deber = parseInt(objeto.total_venta) - parseInt(objeto.monto);

            var a = numeral(objeto.monto);
            var b = a.format('$0,0.00');
            var c = numeral(objeto.total_venta);
            var d = c.format('$0,0.00');
            var e = numeral(monto_deber);
            var f = e.format('$0,0.00');

            arr.push({
                "id_venta": objeto.id_venta,
                "id_credito": objeto.id_credito,
                "nombre_usuario": objeto.nombre_usuario,
                "sucursal_usuario": objeto.sucursal_usuario,
                "nombre_cliente": objeto.nombre_cliente,
                "status_credito": liquidado,
                "fecha_ultimo_dia": objeto.fecha_ultimo_dia,
                "monto": b,
                "monto_deber": f,
                "total_venta": d,
                "abonar": boton_comprar
            }, );
            //arr.push(tmp);
            //console.log(arr);
        });
        console.log(arr)
        alert(arr);
        // initiate the plugin
        var $_bsTable = $('#table')
        $_bsTable.bootstrapTable({
            data: arr,
            columns: [{
                    field: 'id_credito',
                    title: 'Folio de crédito',
                    align: 'center',
                    sortable: true
                },
                /*{
                    field: 'nombre_usuario',
                    title: 'Nombre del usuario',
                    sortable: true
                },*/
                /* {
                     field: 'sucursal_usuario',
                     title: 'Sucursal del usuario',
                     align: 'center',
                     sortable: true
                 },*/
                {
                    field: 'nombre_cliente',
                    title: 'Nombre del cliente',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'total_venta',
                    title: 'Total de venta',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'monto',
                    title: 'Monto pagado',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'monto_deber',
                    title: 'Monto a deber',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'status_credito',
                    title: 'Status',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'fecha_ultimo_dia',
                    title: 'Fecha último día',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'abonar',
                    title: 'Abonar',
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
                    '<p style="font-size:20px;">Tabla de Créditos' + '</p>' +
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
                return 'Mostrando: ' + totalRows + ' Créditos';
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + ' Filas por página';
            },
            formatNoMatches: function() {
                return 'Crédito no encontrado';
            },
        })

        function formatTableCellActions(value, row, index, field) {
            //var eliminar = "'" + row.id_llanta + "'";
            //modalDetalle_'.$credito-> id_venta.'_'.$credito->id_credito.
            return '<div class="action-buttons">\
            <button class="text-blue mx-1" data-target="#modalDetalle_' + row.id_venta + '_' + row.id_credito + '" data-toggle="modal">' +
                '<i class="fa fa-search-plus text-105"></i>' +
                '</button>' +
                // '<a class="text-success mx-1" href="#">\
                //<i class="fa fa-pencil-alt text-105"></i>\
                //</a>'+
                //'<a class="text-danger-m1 mx-1"  href="javascript:eliminar_producto(' + eliminar + ')">' +
                //'<i class="fa fa-trash-alt text-105"></i>' +
                //'</a>' +
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
        var nombre = document.getElementById("nombre").value;
        var sucursal = document.getElementById("sucursal").value;
        var telefono = document.getElementById("telefono").value;
        var correo = document.getElementById("correo").value;
        //var habitual = document.getElementById("habitual").value;
        
        let habitual = $('input[name="habitual"]:checked').val();

        var token = '{{csrf_token()}}';
        var data = {
            nombre: nombre,
            sucursal: sucursal,
            telefono: telefono,
            correo: correo,
            habitual: habitual,
            _token: token
        };

        $.ajax({
            type: "POST",
            url: "/agregar_clientes",
            data: data,
            success: function(msg) {
                location.href = "/mostrar_clientes"
            }
        });
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
        var id_cliente =  document.getElementById("delete_id").value;
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
                location.href = "/mostrar_clientes";
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
       
        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var modal = $(this)
        modal.find('#update_id_cliente').val(id_cliente)
        modal.find('#update_nombre').val(nombre)
        modal.find('#update_correo').val(correo)
        modal.find('#update_telefono').val(telefono)
        //update_habitual
        $("input[name=update_habitual][value='"+habitual+"']").prop("checked",true);
        $('#update_sucursal > option[value="' + id_sucursal + '"]').attr('selected', 'selected');
    });

</script>

<script type="text/javascript">
    function actualizar_cliente() {
        var update_id_cliente = document.getElementById("update_id_cliente").value;
        var update_nombre = document.getElementById("update_nombre").value;
        var update_correo = document.getElementById("update_correo").value;
        var update_telefono = document.getElementById("update_telefono").value;
        var update_sucursal = document.getElementById("update_sucursal").value;
        
        let habitual = $('input[name="update_habitual"]:checked').val();
        alert(habitual);
        var formData = new FormData();
        var token = '{{csrf_token()}}';
       
        formData.append("update_id_cliente", update_id_cliente);
        formData.append("update_nombre", update_nombre);
        formData.append("update_correo", update_correo);
        formData.append("update_telefono", update_telefono);
        formData.append("update_sucursal", update_sucursal);
        formData.append("update_habitual", habitual);
    
        formData.append("_token", token);
        console.log(formData);
        

        $.ajax({
            type: "POST",
            contentType: false,
            url: "/actualizar_cliente",
            data: formData,
            processData: false,
            cache: false,
            success: function(msg) {
                console.log(msg);
                location.href = "/mostrar_clientes";
            }
        });
    }

</script>

@stop
@stop
