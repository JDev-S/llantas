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
            <i class="fas fa-car-battery text-dark-l3 mr-1"></i>
            Baterías
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
<div class="modal fade" id="modalLlanta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Detalles de la batería</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codigo_llanta">Código de Bateria</label>
                                <input type="text" class="form-control" id="nombre_bateria" disabled name="nombre_bateria">
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
                            <label for="rin">Voltaje</label>
                            <input type="text" class="form-control" id="voltaje" name="voltaje" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="medida">Medidas</label>
                            <input type="text" class="form-control" id="medidas" name="medidas" disabled>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="modelo">Capacidad de arranque</label>
                            <input type="text" class="form-control" id="capacidad" name="capacidad" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="medida">Capacidad de arranque frio</label>
                            <input type="text" class="form-control" id="frio" name="frio" disabled>
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="form-group col-md-5">
                            <label for="modelo">Peso</label>
                            <input type="text" class="form-control" id="peso" name="peso" disabled>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="medida">Tamaño</label>
                            <input type="text" class="form-control" id="tamanio" name="tamanio" disabled>
                        </div>
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

<!--FIN MODAL DETALLE -->


@section('scripts')

<!-- include vendor scripts used in "Bootstrap Table" page. see "/views//pages/partials/table-bootstrap/@vendor-scripts.hbs" -->
<script src="\npm\tableexport.jquery.plugin@1.10.22\tableExport.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\export\bootstrap-table-export.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\print\bootstrap-table-print.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\mobile\bootstrap-table-mobile.min.js"></script>
<script src="\npm\photoswipe@4.1.3\dist\photoswipe.min.js"></script>
<script src="\npm\photoswipe@4.1.3\dist\photoswipe-ui-default.min.js"></script>

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
        var datos = @json($aProducto_baterias);
        // alert(datos);
        var arr = [];

        datos.forEach(objeto => {
            //let tmp =[] ;
            arr.push({
                "id_productos_llantimax": objeto.id_productos_llantimax,
                "nombre": objeto.nombre,
                "categoria": objeto.categoria,
                "marca": objeto.marca,
                "id_marca": objeto.id_marca,
                "modelo": objeto.modelo,
                "precio": objeto.precio,
                "medidas": objeto.medidas,
                "voltaje": objeto.voltaje,
                "capacidad_arranque": objeto.capacidad_arranque,
                "capacidad_arranque_frio": objeto.capacidad_arranque_frio,
                "peso": objeto.peso,
                "tamanio": objeto.tamanio,
                "foto": objeto.fotografia_miniatura,
                "fotografia_miniatura": '<img src="/img/' + objeto.fotografia_miniatura + '" width="80px" height="80px" alt="' + objeto.nombre + '">',

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
                    title: 'Código de la batería',
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
                    field: 'precio',
                    title: 'Precio',
                    align: 'center',
                    sortable: true
                },
                {
                    field: 'fotografia_miniatura',
                    title: 'Foto',
                    printIgnore: true,
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
                    '<p style="font-size:20px;">Tabla de Baterias' + '</p>' +
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
            var eliminar = row.id_productos_llantimax;
            return '<div class="action-buttons">' +
                '<button class="text-blue mx-1" data-target="#modalLlanta" data-toggle="modal"data-id="' + row.id_productos_llantimax + '" data-nombre="' + row.nombre + '" data-marca="' + row.marca + '" data-modelo="' + row.modelo + '" data-medidas="' + row.medidas + '" data-voltaje="' + row.voltaje + '" data-capacidad="' + row.capacidad_arranque + '" data-frio="' + row.capacidad_arranque_frio + '" data-peso="' + row.peso + '" data-foto="' + row.foto + '" data-tamanio="' + row.tamanio + '" data-precio="' + row.precio + '" ><i class="fa fa-search-plus text-105"></i></button>' +
              

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
    $('#modalLlanta').on('show.bs.modal', function(event) {
        /RECUPERAR METADATOS DEL BOTÓN/
        var button = $(event.relatedTarget)
        var id_bateria = button.data('id')
        var nombre_bateria = button.data('nombre')
        var marca = button.data('marca')
        var modelo = button.data('modelo')
        var medidas = button.data('medidas')
        var voltaje = button.data('voltaje')
        var capacidad = button.data('capacidad')
        var frio = button.data('frio')
        var peso = button.data('peso')
        var foto = button.data('foto')
        var tamanio = button.data('tamanio')
        var precio = button.data('precio')

        var modal = $(this)
        var llenado = '<a href="#" class="show-lightbox">' +
            '<img alt="Gallery Image 1" src="/img/' + foto + '" class="w-100 d-zoom-2 " data-size="1200x800">' +
            '</a>';
        document.getElementById('foto_llanta').innerHTML = llenado;
        modal.find('#nombre_bateria').val(nombre_bateria)
        modal.find('#marca').val(marca)
        modal.find('#modelo').val(modelo)
        modal.find('#medidas').val(medidas)
        modal.find('#voltaje').val(voltaje)
        modal.find('#capacidad').val(capacidad)
        modal.find('#frio').val(frio)
        modal.find('#peso').val(peso)
        modal.find('#tamanio').val(tamanio)
        modal.find('#precio').val(precio)

    });

</script>




@stop
@stop
