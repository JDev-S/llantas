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
<link rel="stylesheet" type="text/css" href="\npm\dropzone@5.9.2\dist\dropzone.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            <i class="fas fa-car text-dark-l3 mr-1"></i>
            Llantas
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
<!--MODAL MOSTRAR LLANTA -->
<div class="modal fade" id="modalLlanta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Detalles de la llanta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codigo_llanta">Código de llanta</label>
                                <input type="text" class="form-control" id="nombre_llanta" disabled name="nombre_llanta">
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca</label>

                                <input type="text" class="form-control" disabled id="marca" name="marca">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pos-rel d-style my-3 radius-1 shadow-sm overflow-hidden bgc-brown-m3" id="foto_llanta" name="foto_llanta">

                                <div class="v-hover position-center h-100 w-100 bgc-dark-grad" style="pointer-events: none;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="rin">Rin</label>
                            <input type="text" class="form-control" id="numero_rin" name="numero_rin" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="medida">Medida</label>
                            <input type="text" class="form-control" id="medida" name="medida" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="capacidad_carga">Capacidad de carga</label>

                        <input type="text" class="form-control" id="capacidad_carga" name="capacidad_carga" disabled>
                    </div>

                    <div class="form-group">
                        <label for="indice_velocidad">índice de velocidad</label>
                        <input type="text" class="form-control" id="indice_velocidad" name="indice_velocidad" disabled>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-6">
                            <label for="precio">Precio</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                </div>
                                <input type="text" min='0' , step="any" class="form-control" id="precio" name="precio" disabled>
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
<!--FIN MODAL MOSTRAR LLANTA-->
<!--FIN MODAL DETALLE -->

@section('scripts')

<!-- include vendor scripts used in "Bootstrap Table" page. see "/views//pages/partials/table-bootstrap/@vendor-scripts.hbs" -->
<script src="\npm\tableexport.jquery.plugin@1.10.22\tableExport.min.js"></script>

<script src="\npm\dropzone@5.9.2\dist\dropzone.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\export\bootstrap-table-export.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\print\bootstrap-table-print.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\mobile\bootstrap-table-mobile.min.js"></script>
<script src="\npm\photoswipe@4.1.3\dist\photoswipe.min.js"></script>
<script src="\npm\photoswipe@4.1.3\dist\photoswipe-ui-default.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

<script>
    jQuery(function($) {

        // set pointer-events to none for dark layers that appear on hover above dark images
        $('#gallery .h-100.w-100').css('pointer-events', 'none')
        //.pswp_button, .pswpbutton--arrow--left::before, .pswp_button--arrow--right::before {background-image: svg;}

        var pswpElement = document.querySelector('.pswp')

        var items = null // the items to be used in the lightbox

        var triggerBtns = document.querySelectorAll('.show-lightbox') // these are the buttons/images that are supposed to trigger lightbox for each image when clicked

        // and each time we click an image/button to open lightbox, it should be initialized ... this is how the plugin works
        $(triggerBtns)
            .on('click', function(e) {
                e.preventDefault()

                if (items == null) {
                    items = []
                    $('#gallery img[data-size]').each(function(index, img) {
                        var size = img.getAttribute('data-size').split(/\D/)
                        items.push({
                            src: img.src.replace('/thumb', '/'),
                            w: size[0],
                            h: size[1],
                            ref: img,
                            title: img.getAttribute('alt') || 'Image ' + (index + 1) + ' caption'
                        })
                        triggerBtns[index].setAttribute('data-index', index)
                    })
                }

                var options = {
                    index: +this.getAttribute('data-index'),

                    bgOpacity: 0.8,
                    history: false,
                    closeOnScroll: false,

                    getThumbBoundsFn: function(index) {
                        var thumbnail = items[index].ref,
                            pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                            rect = thumbnail.getBoundingClientRect()

                        return {
                            x: rect.left,
                            y: rect.top + pageYScroll,
                            w: rect.width
                        }
                    },
                    addCaptionHTMLFn: function(item, captionEl) {
                        if (!item.title) {
                            return false
                        }
                        captionEl.children[0].innerHTML = item.title
                        return true
                    }

                }

                var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options)
                gallery.init()
            }) // click

    })

</script>


<!-- "Bootstrap Table" page script to enable its demo functionality -->
<script>
    jQuery(function($) {
        var datos = @json($aProducto_llantas);
        //alert(datos);
        var arr = [];
        datos.forEach(objeto => {
            var a = numeral(objeto.precio);
            var b = a.format('$0,0.00');
            //let tmp =[] ;
            arr.push({
                //"id_productos_llantimax": '<button class="btn px-4 btn-info mb-1" data-target="#modalLlanta_' + objeto.id_productos_llantimax + '_' + objeto.sucursal + '" data-toggle="modal" type="button">' + objeto.id_productos_llantimax + '</button>',
                "id_llanta": objeto.id_productos_llantimax,
                "id_productos_llantimax": '<button class="btn px-4 btn-info mb-1" data-target="#modalLlanta_' + objeto.id_productos_llantimax + '" data-toggle="modal" type="button">Ver detalles </button>',
                "nombre": objeto.nombre,
                //"categoria": objeto.categoria,
                "marca": objeto.marca,
                "id_marca": objeto.id_marca,
                "numero_rin": objeto.numero_rin,
                "indice_velocidad": objeto.indice_velocidad,
                "medida": objeto.medida,
                "capacidad_carga": objeto.capacidad_carga,
                "modelo": objeto.modelo,
                "precio": objeto.precio,
                "precio_limpio":b,
                "foto": objeto.fotografia_miniatura,
                "fotografia_miniatura": '<img src="/img/' + objeto.fotografia_miniatura + '" width="80px" height="80px" alt="' + objeto.nombre + '">'
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
                    field: 'nombre',
                    title: 'Código de la llanta',
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
                    field: 'marca',
                    title: 'Marca',
                    align: 'center',
                    sortable: true
                },
                 {
                    field: 'medida',
                    title: 'Medida',
                    align: 'center',
                    sortable: true
                },
                 {
                    field: 'numero_rin',
                    title: 'Rin',
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
                    field: 'precio_limpio',
                    title: 'Precio',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'fotografia_miniatura',
                    title: 'Foto',
                    align: 'center',
                    printIgnore: true,
                    sortable: true
                },
                /*{
                    field: 'sucursal',
                    title: 'Sucursal',
                    align: 'center',
                    sortable: true
                },*/

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
                    '<p style="font-size:20px;">Tabla de Llantas' + '</p>' +
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
            var eliminar = row.id_llanta;
            return '<div class="action-buttons">\
            <button class="text-blue mx-1 " data-target="#modalLlanta" data-toggle="modal"data-id="' + row.id_llanta + '" data-nombre="' + row.nombre + '" data-medida="' + row.medida + '" data-foto="' + row.foto + '" data-marca="' + row.marca + '" data-modelo="' + row.modelo + '" data-precio="' + row.precio + '" data-marc="' + row.id_marca + '" data-capacidad="' + row.capacidad_carga + '" data-indice="' + row.indice_velocidad + '" data-rin="' + row.numero_rin + '" ><i class="fa fa-search-plus text-105"></i></button>' +
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
        var id_llanta = button.data('id')

        var modal = $(this)
        modal.find('#delete_id_llanta').val(id_llanta)

    });

</script>
<script type="text/javascript">
    function eliminar_producto() {
        var id_producto = document.getElementById("delete_id_llanta").value;
        console.log(id_producto);
        var token = '{{csrf_token()}}';
        var data = {
            id_producto: id_producto,
            _token: token
        };
        console.log(data);

        $.ajax({
            type: "POST",
            url: "/eliminar_Llanta",
            data: data,
            success: function(msg) {
                alert(msg);
                location.href = "/mostrar_llantas";
            }
        });
    }

</script>

<script>
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
    $('#new_check_marca').on('change', function() {
        if ($(this).is(':checked')) {
            $("#new_marca2").prop("disabled", false);
            $("#new_marca").prop("disabled", true);
            $("#new_marca2").attr("required", true);
            $("#new_marca").attr("required", false);
        } else {
            $("#new_marca2").prop("disabled", true);
            $("#new_marca").prop("disabled", false);
            $("#new_marca").attr("required", true);
            $("#new_marca2").attr("required", false);

        }
    });

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
                            <span class='text-dark-tp3 text-110'>Archivo inválido. No se permite la extensión"+extension+"</span>\
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

    function enviar_datos() {
        if ($("#agregar_llanta_form")[0].checkValidity()) {
            event.preventDefault();
            var nombre_llanta = document.getElementById("new_nombre_llanta").value;
            var marca = document.getElementById("new_marca").value;
            var precio = document.getElementById("new_precio").value;
            var fotografia_miniatura = document.getElementById("ace-file-input1").files[0];
            var modelo = document.getElementById("new_modelo").value;
            var medida = document.getElementById("new_medida").value;
            var capacidad_carga = document.getElementById("new_capacidad_carga").value;
            var indice_velocidad = document.getElementById("new_indice_velocidad").value;
            var numero_rin = document.getElementById("new_numero_rin").value;

            var check = 0;
            var nuevo = "";
            var checado = document.getElementById('new_check_marca').checked;
            if (checado) {
                check = 1;
                nuevo = document.getElementById("new_marca2").value;
            } else {
                nuevo = "";
            }

            //console.log(nombre_llanta+", "+marca+", "+precio+", "+modelo+", "+medida+", "+capacidad_carga+", "+indice_velocidad+", "+numero_rin+", "+fotografia_miniatura+", "+nuevo);

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
            formData.append("check", check);
            formData.append("nuevo", nuevo);
            formData.append("_token", token);

            console.log(formData);

            $.ajax({
                type: "POST",
                contentType: false,
                url: "/agregar_llantas",
                data: formData,
                processData: false,
                cache: false,
                success: function(msg) {
                    console.log(msg);
                    location.href = "/mostrar_llantas";
                }
            });
        } else {
            $("#agregar_llanta_form")[0].reportValidity();
        }

    }

</script>
<script type="text/javascript">
    $('#editModal').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_llanta = button.data('id')
        var nombre_llanta = button.data('nombre')
        var marca = button.data('marca')
        var id_marca = button.data('marc')
        var precio = button.data('precio')
        var modelo = button.data('modelo')
        var medida = button.data('medida')
        var fotovieja = button.data('foto');
        var capacidad_carga = button.data('capacidad')
        var indice_velocidad = button.data('indice')
        var numero_rin = button.data('rin')
        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var modal = $(this)
        modal.find('#update_id_llanta').val(id_llanta)
        modal.find('#update_nombre_llanta').val(nombre_llanta)
        //modal.find('#marca').val(marca)
        //modal.find('#update_precio').val(precio)
        modal.find('#update_modelo').val(modelo)
        modal.find('#update_medida').val(medida)
        modal.find('#update_foto').val(fotovieja)
        //modal.find('#capacidad_carga').val(capacidad_carga)
        //modal.find('#indice_velocidad').val(indice_velocidad)
        modal.find('#update_numero_rin').val(numero_rin)
        // document.getElementById("update_precio").value=precio;
        $('#update_marca > option[value="' + id_marca + '"]').attr('selected', 'selected');
        $('#update_capacidad_carga > option[value="' + capacidad_carga + '"]').attr('selected', 'selected');
        $('#update_indice_velocidad > option[value="' + indice_velocidad + '"]').attr('selected', 'selected');
        document.getElementById('update_precio').value = precio;
        //var texto = document.getElementById('update_precio');
        //texto.value =precio;
        //$("#update_precio").val(precio);
    });

</script>

<script type="text/javascript">
    $('#modalLlanta').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_llanta = button.data('id')
        var nombre_llanta = button.data('nombre')
        var marca = button.data('marca')
        var id_marca = button.data('marc')
        var precio = button.data('precio')
        var modelo = button.data('modelo')
        var medida = button.data('medida')
        var capacidad_carga = button.data('capacidad')
        var indice_velocidad = button.data('indice')
        var numero_rin = button.data('rin')
        var foto = button.data('foto')
        /*ASIGNAR VALOR A LOS METADATOS DEL MODAL*/
        var modal = $(this)
        modal.find('#nombre_llanta').val(nombre_llanta)
        modal.find('#modelo').val(modelo)
        modal.find('#medida').val(medida)
        modal.find('#numero_rin').val(numero_rin)
        modal.find('#marca').val(marca)
        modal.find('#capacidad_carga').val(capacidad_carga)
        modal.find('#indice_velocidad').val(indice_velocidad)
        modal.find('#precio').val(precio)
        var llenado = '<a href="#" class="show-lightbox">' +
            '<img alt="Gallery Image 1" src="/img/' + foto + '" class="w-100 d-zoom-2 " data-size="1200x800">' +
            '</a>';
        document.getElementById('foto_llanta').innerHTML = llenado;

    });

</script>
<script type="text/javascript">
    $('#update_check_marca').on('change', function() {
        if ($(this).is(':checked')) 
        {
            $("#update_marca2").prop("disabled", false);
            $("#update_marca").prop("disabled", true);
            $("#update_marca2").attr("required", true);
            $("#update_marca").attr("required", false);
        } else {
            $("#update_marca2").prop("disabled", true);
            $("#update_marca").prop("disabled", false);
            $("#update_marca").attr("required", true);
            $("#update_marca2").attr("required", false);
        }
    });
    
    function actualizar_Llanta() {
        if ($("#actualizar_llanta_form")[0].checkValidity()) 
        {
        event.preventDefault();
        var update_id_llanta = document.getElementById("update_id_llanta").value;
        var update_nombre_llanta = document.getElementById("update_nombre_llanta").value;
        var update_precio = document.getElementById("update_precio").value;
        //var update_precio = precio.replace(/[$.,]/g, '');
        var update_marca = document.getElementById("update_marca").value;
        var fotografia_miniatura = document.getElementById("ace-file-input2").files[0];
        var update_modelo = document.getElementById("update_modelo").value;
        var update_medida = document.getElementById("update_medida").value;
        var update_capacidad_carga = document.getElementById("update_capacidad_carga").value;
        var update_indice_velocidad = document.getElementById("update_indice_velocidad").value;
        var update_numero_rin = document.getElementById("update_numero_rin").value;
        var update_foto = document.getElementById("update_foto").value;

        var check2 = 0;
        var nuevo2 = "";
        var checado = document.getElementById('update_check_marca').checked;
        if (checado) {
            check2 = 1;
            nuevo2 = document.getElementById("update_marca2").value;
        } else {
            nuevo2 = "";
        }

        var formData = new FormData();
        var token = '{{csrf_token()}}';
        formData.append("fotografia_miniatura", fotografia_miniatura);
        formData.append("update_id_llanta", update_id_llanta);
        formData.append("update_nombre_llanta", update_nombre_llanta);
        formData.append("update_precio", update_precio);
        formData.append("update_foto", update_foto);
        formData.append("update_marca", update_marca);
        formData.append("update_modelo", update_modelo);
        formData.append("update_medida", update_medida);
        formData.append("update_capacidad_carga", update_capacidad_carga);
        formData.append("update_indice_velocidad", update_indice_velocidad);
        formData.append("update_numero_rin", update_numero_rin);
        formData.append("check2", check2);
        formData.append("nuevo2", nuevo2);
        formData.append("_token", token);
        console.log(formData);
        console.log(update_id_llanta);
            alert("esta lleno completamente");
        $.ajax({
            type: "POST",
            contentType: false,
            url: "/actualizar_Llanta",
            data: formData,
            processData: false,
            cache: false,
            success: function(msg) {
                //console.log(msg);
                location.href = "/mostrar_llantas";
            }
        });
           
        }
        else
        {
             $("#actualizar_llanta_form")[0].reportValidity();       
        }
        
    }

</script>

@stop
@stop
