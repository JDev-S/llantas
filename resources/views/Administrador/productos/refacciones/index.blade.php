@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            Refacciones
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
<!--MODAL AGREGAR REFACCION -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Ingresar refacción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <form id="agregar_refaccion_form">
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Código de refacción</label>
                                <input type="text" class="form-control" id="nombre_refaccion" name="nombre_refaccion" placeholder="Codigo de refacción" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="modelo">Marca</label>
                                <input type="text" class="form-control mb-2" id="marca" name="marca" placeholder="Marca" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Modelo</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo" required>
                            </div>

                        </div>

                        <div class="form-group col-md-12">
                            <label for="indice_velocidad">Sucursal</label>
                            <?php
                            $query2 = "select * from sucursal ";
                            $data2=DB::select($query2);      
                        ?>
                            <select id="sucursal" name="sucursal" class="form-control" required>
                                @foreach($data2 as $item)
                                <option value="{{ $item->id_sucursal }}"> {{ $item->sucursal }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-12">
                                <label for="rin">Descripcion</label>
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
                            <div class="form-group col-md-6">
                                <label>Imagen</label>
                                <input type="file" class="ace-file-input" id="ace-file-input1" name="ace-file-input1" accept=".jpg,.jpeg,.png,.JPG,.PNG,.JPEG" name="ace-file-input1" onchange="validar_input_file('ace-file-input1')" required>
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
<!--FIN MODAL AGREGAR REFACCION-->
<!--MODAL ACTUALIZAR REFACCION -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Actualizar refacción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <form id="actualizar_refaccion_form">
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Código de refacción</label>
                                <input type="hidden" class="form-control col-sm-8 col-md-10" id="update_id_refaccion" name="update_id_refaccion">
                                <input type="hidden" class="form-control col-sm-8 col-md-10" id="update_foto" name="update_foto">
                                <input type="text" class="form-control" id="update_nombre_refaccion" name="update_nombre_refaccion" placeholder="Codigo de refacción" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="modelo">Marca</label>
                                <input type="text" class="form-control mb-2" id="update_marca" name="update_marca" placeholder="Marca" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Modelo</label>
                                <input type="text" class="form-control" id="update_modelo" name="update_modelo" placeholder="Modelo" required>
                            </div>

                        </div>

                        <div class="form-group col-md-12">
                            <label for="indice_velocidad">Sucursal</label>
                            <?php
                            $query2 = "select * from sucursal ";
                            $data2=DB::select($query2);      
                        ?>
                            <select id="update_sucursal" name="update_sucursal" class="form-control" required>
                                @foreach($data2 as $item)
                                <option value="{{ $item->id_sucursal }}"> {{ $item->sucursal }} </option>
                                @endforeach
                            </select>
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
                                    <input type="numbrer" min='0' , step="any" class="form-control" id="update_precio" name="update_precio" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Imagen</label>
                                <input type="file" class="ace-file-input2" id="ace-file-input2" name="ace-file-input2" accept=".jpg,.jpeg,.png,.JPG,.PNG,.JPEG" onchange="validar_input_file('ace-file-input2')">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
                <button type="submit" class="btn btn-primary" onclick="actualizar_refaccion();">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL ACTUALIZAR REFACCION-->
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
<!--FIN DEL MODAL-->
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
        var datos = @json($refacciones);
        // alert(datos);
        var arr = [];

        datos.forEach(objeto => {
            //let tmp =[] ;
            var a = numeral(objeto.precio);
            var b = a.format('$0,0.00');
            arr.push({
                "id_refacciones": objeto.id_refacciones,
                "nombre_refacciones": objeto.nombre_refacciones,
                "sucursal": objeto.sucursal,
                "id_sucursal": objeto.id_sucursal,
                "precio": objeto.precio,
                "precio_total": b,
                "foto": '<img src="/img/' + objeto.foto + '" width="80px" height="80px" alt="' + objeto.nombre_refacciones + '">',
                "photo": objeto.foto,
                "marca": objeto.marca,
                "modelo": objeto.modelo,
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
                    field: 'nombre_refacciones',
                    title: 'Código de la refacción',
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
                    field: 'marca',
                    title: 'Marca',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'modelo',
                    title: 'Modelo',
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
                },
                {
                    field: 'foto',
                    title: 'Foto',
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
                    '<p style="font-size:20px;">Tabla de refacciones' + '</p>' +
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
                return 'Mostrando: ' + totalRows + ' Productos';
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + ' Filas por página';
            },
            formatNoMatches: function() {
                return 'Producto no encontrado';
            },
        })

        function formatTableCellActions(value, row, index, field) {
            var eliminar = row.id_refacciones;
            return '<div class="action-buttons">' +
                '<button class="text-blue mx-1" data-toggle="modal" data-target="#editModal" data-id="' + row.id_refacciones + '" data-nombre="' + row.nombre_refacciones + '" data-sucursal="' + row.sucursal + '" data-suc="' + row.id_sucursal + '" data-precio="' + row.precio + '" data-foto="' + row.photo + '" data-marca="' + row.marca + '" data-modelo="' + row.modelo + '" data-descripcion="' + row.descripcion + '" ><i class="fa fa-pencil-alt"></i></button>' +
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

    $('#ace-file-input1').aceFileInput({
        btnChooseText: 'Seleccionar',
        placeholderText: 'Imagen no seleccionada',
        /**
        btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
        btnChooseText: 'SELECT FILE',
        placeholderText: 'NO FILE YET',
        placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
        */
    })

    $('#ace-file-input2').aceFileInput({
        btnChooseText: 'Seleccionar',
        placeholderText: 'Imagen no seleccionada',
        /**
        btnChooseClass: 'bgc-grey-l2 pt-15 px-2 my-1px mr-1px',
        btnChooseText: 'SELECT FILE',
        placeholderText: 'NO FILE YET',
        placeholderIcon: '<i class="fa fa-file bgc-warning-m1 text-white w-4 py-2 text-center"></i>'
        */
    })

</script>

<script type="text/javascript">
    $('#eliminarModal').on('show.bs.modal', function(event) {
        /*RECUPERAR METADATOS DEL BOTÓN*/
        var button = $(event.relatedTarget)
        var id_refaccion = button.data('id')
        var modal = $(this)
        modal.find('#delete_id').val(id_refaccion)
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
            url: "/eliminar_Refaccion",
            data: data,
            success: function(msg) {
                alert(msg);
                location.href = "/mostrar_refacciones";
            }
        });
    }

</script>

<script type="text/javascript">
    function enviar_datos() {
        if ($("#agregar_refaccion_form")[0].checkValidity()) {
            event.preventDefault();
            var nombre_refaccion = document.getElementById("nombre_refaccion").value;
            var sucursal = document.getElementById("sucursal").value;
            var precio = document.getElementById("precio").value;
            var fotografia_miniatura = document.getElementById("ace-file-input1").files[0];
            //var file = this.files[0];
            var marca = document.getElementById("marca").value;
            var modelo = document.getElementById("modelo").value;
            var descripcion = document.getElementById("descripcion").value;


            var formData = new FormData();
            //var filesLength = document.getElementById('fotografia_miniatura').files.length;
            /*for (var i = 0; i < filesLength; i++) {
                formData.append("file[]", document.getElementById('fotografia_miniatura').files[i]);
            }*/
            var token = '{{csrf_token()}}';
            formData.append("fotografia_miniatura", fotografia_miniatura);
            formData.append("nombre_refaccion", nombre_refaccion);
            formData.append("sucursal", sucursal);
            formData.append("precio", precio);
            formData.append("marca", marca);
            formData.append("modelo", modelo);
            formData.append("descripcion", descripcion);
            formData.append("_token", token);
            $.ajax({
                type: "POST",
                contentType: false,
                url: "/agregar_refacciones",
                data: formData,
                processData: false,
                cache: false,
                success: function(msg) {
                    location.href = "/mostrar_refacciones";
                }
            });
        } else {
            $("#agregar_refaccion_form")[0].reportValidity();
        }

    }

</script>
<script type="text/javascript">
    $('#editModal').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_refacciones = button.data('id')
        var nombre_refacciones = button.data('nombre')
        var sucursal = button.data('sucursal')
        var id_sucursal = button.data('suc')
        var precio = button.data('precio')
        var marca = button.data('marca')
        var foto = button.data('foto')
        var modelo = button.data('modelo')
        var descripcion = button.data('descripcion')
        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var modal = $(this)
        modal.find('#update_id_refaccion').val(id_refacciones)
        modal.find('#update_nombre_refaccion').val(nombre_refacciones)
        modal.find('#update_precio').val(precio)
        modal.find('#update_marca').val(marca)
        modal.find('#update_modelo').val(modelo)
        modal.find('#update_descripcion').val(descripcion)
        modal.find('#update_foto').val(foto)
        $('#update_sucursal > option[value="' + id_sucursal + '"]').attr('selected', 'selected');
    });

</script>
<script type="text/javascript">
    function actualizar_refaccion() {
        if ($("#actualizar_refaccion_form")[0].checkValidity()) {
            event.preventDefault();
            var update_id_refaccion = document.getElementById("update_id_refaccion").value;
            var update_nombre_refaccion = document.getElementById("update_nombre_refaccion").value;
            var update_precio = document.getElementById("update_precio").value;
            //var update_precio = precio.replace(/[$.,]/g, '');
            var update_marca = document.getElementById("update_marca").value;
            var fotografia_miniatura = document.getElementById("ace-file-input2").files[0];
            var update_modelo = document.getElementById("update_modelo").value;
            var update_descripcion = document.getElementById("update_descripcion").value;
            var update_foto = document.getElementById("update_foto").value;
            var update_sucursal = document.getElementById("update_sucursal").value;

            var formData = new FormData();
            var token = '{{csrf_token()}}';
            formData.append("fotografia_miniatura", fotografia_miniatura);
            formData.append("update_id_refaccion", update_id_refaccion);
            formData.append("update_nombre_refaccion", update_nombre_refaccion);
            formData.append("update_precio", update_precio);
            formData.append("update_foto", update_foto);
            formData.append("update_sucursal", update_sucursal);
            formData.append("update_marca", update_marca);
            formData.append("update_modelo", update_modelo);
            formData.append("update_descripcion", update_descripcion);
            formData.append("_token", token);
            console.log(formData);
            console.log(update_id_refaccion);
            alert(" ESTA TODO BIEN");
            $.ajax({
                type: "POST",
                contentType: false,
                url: "/actualizar_refaccion",
                data: formData,
                processData: false,
                cache: false,
                success: function(msg) {
                    console.log(msg);
                    location.href = "/mostrar_refacciones";
                }
            });
        } else {
            $("#actualizar_refaccion_form")[0].reportValidity();
        }

    }

    function validar_input_file(input) {
        // Obtener nombre de archivo    
        let archivo = document.getElementById(input).value;
        // Obtener extensión del archivo
        extension = archivo.substring(archivo.lastIndexOf('.'), archivo.length);
        // Si la extensión obtenida no está incluida en la lista de valores
        // del atributo "accept", mostrar un error.
        //alert(document.getElementById('ace-file-input1').getAttribute('accept').split(','));
        if (document.getElementById(input).getAttribute('accept').split(',').indexOf(extension) < 0) {
            //alert('Archivo inválido. No se permite la extensión ' + extension);
            $.aceToaster.add({
                placement: 'br',
                body: "<div class='p-3 m-2 d-flex'>\
                         <span class='align-self-center text-center mr-3 py-2 px-1 border-1 bgc-danger radius-round'>\
                            <i class='fa fa-times text-180 w-4 text-white mx-2px'></i>\
                         </span>\
                         <div>\
                            <h4 class='text-dark-tp3'>Error</h4>\
                            <span class='text-dark-tp3 text-110'>Archivo inválido. No se permite la extensión" + extension + "</span>\
                         </div>\
                        </div>\
                        <button data-dismiss='toast' class='btn text-grey btn-h-light-danger position-tr mr-1 mt-1'><i class='fa fa-times'></i></button>",

                width: 480,
                delay: 5000,

                close: false,

                className: 'shadow border-none radius-0 border-l-4 brc-danger',

                bodyClass: 'border-0 p-0',
                headerClass: 'd-none'
            })
            document.getElementById(input).value = "";
        }
    }

</script>
@stop
@stop
