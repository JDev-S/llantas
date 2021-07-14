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
                <!----- BOTON DE AGREGAR--->
                <button class="text-blue " data-target="#modalNuevo" data-toggle="modal" type="button" style="margin-right:20px; border:0px;"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></button>
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

<!--MODAL AGREGAR BATERIA -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Ingresar batería</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <form id="agregar_bateria_form">
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Código de batería</label>
                                <input type="text" class="form-control" id="new_nombre_bateria" name="new_nombre_bateria" placeholder="Codigo de batería" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="modelo">Modelo</label>
                                <input type="text" class="form-control mb-2" id="new_modelo" name="new_modelo" placeholder="Modelo" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center md-12 ml-2">
                            <div class="form-group col-6">
                                <label for="marca">Marca</label>
                                <?php
                        $query2 = "select * from marca ";
                        $data2=DB::select($query2);      
                        ?>
                                <select id="new_marca" name="new_marca" class="form-control" required>
                                    @foreach($data2 as $item)
                                    <option value="{{ $item->id_marca }}"> {{ $item->marca }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-5 mt-3 mb-0 my-0">
                                <input type="text" disabled class="form-control" id="new_marca2" name="new_marca2" placeholder="Marca">
                            </div>
                            <div class="md-1 mt-4">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="new_check_marca" name="new_check_marca">
                                </div>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Voltaje</label>
                                <input type="text" class="form-control" id="new_voltaje" name="new_voltaje" placeholder="Voltaje" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="medida">Capacidad de arranque</label>
                                <input type="text" class="form-control" id="new_capacidad_arranque" name="new_capacidad_arranque" placeholder="Capacidad de arranque" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Capacidad de arranque en frio</label>
                                <input type="text" class="form-control" id="new_capacidad_arranque_frio" name="new_capacidad_arranque_frio" placeholder="Capacidad de arranque en frío" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="medida">Medidas</label>
                                <input type="text" class="form-control" id="new_medidas" name="new_medidas" placeholder="Medidas" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Peso</label>
                                <input type="text" class="form-control" id="new_peso" name="new_peso" placeholder="Peso" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="medida">Tamaño</label>
                                <input type="text" class="form-control" id="new_tamanio" name="new_tamanio" placeholder="Tamaño" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="precio">Precio</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" min='0' , step="any" class="form-control" id="new_precio" name="new_precio" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Imagen</label>
                                <input type="file" class="ace-file-input" id="ace-file-input1" name="ace-file-input1" accept=".jpg,.jpeg,.png,.JPG,.PNG,.JPEG" onchange="validar_input_file('ace-file-input1')" required>
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

<!--FIN MODAL AGREGAR Bateria-->
<!--MODAL ACTUALIZAR  BATERIA -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Actualizar batería</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                    <form id="actualizar_bateria_form">
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="codigo_llanta">Código de batería</label>
                                <input type="hidden" class="form-control col-sm-8 col-md-10" id="update_foto" name="update_foto">
                                <input type="hidden" class="form-control col-sm-8 col-md-10" id="update_id_bateria" name="update_id_bateria">
                                <input type="text" class="form-control" id="update_nombre_bateria" name="update_nombre_bateria" required placeholder="Codigo de batería">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="modelo">Modelo</label>
                                <input type="text" class="form-control mb-2" id="update_modelo" name="update_modelo" required placeholder="Modelo">
                            </div>
                        </div>

                        <div class="form-row align-items-center md-12 ml-2">
                            <div class="form-group col-6">
                                <label for="marca">Marca</label>
                                <?php
                        $query2 = "select * from marca ";
                        $data2=DB::select($query2);      
                        ?>
                                <select id="update_marca" name="update_marca" class="form-control" required>
                                    @foreach($data2 as $item)
                                    <option value="{{ $item->id_marca }}"> {{ $item->marca }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-5 mt-3 mb-0 my-0">
                                <input type="text" disabled class="form-control" id="update_marca2" name="update_marca2" placeholder="Marca">
                            </div>
                            <div class="md-1 mt-4">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="update_check_marca" name="update_check_marca">
                                </div>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Voltaje</label>
                                <input type="text" class="form-control" id="update_voltaje" name="update_voltaje" required placeholder="Voltaje">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="medida">Capacidad de arranque</label>
                                <input type="text" class="form-control" id="update_capacidad" name="update_capacidad" required placeholder="Cpacidad de arranque">
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Capacidad de arranque en frio</label>
                                <input type="text" class="form-control" id="update_frio" name="update_frio" placeholder="Capacidad de arranque en frío" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="medida">Medidas</label>
                                <input type="text" class="form-control" id="update_medidas" name="update_medidas" placeholder="Medidas" required>
                            </div>
                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="rin">Peso</label>
                                <input type="text" class="form-control" id="update_peso" name="update_peso" placeholder="Peso" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="medida">Tamaño</label>
                                <input type="text" class="form-control" id="update_tamanio" name="update_tamanio" placeholder="Tamaño" required>
                            </div>

                        </div>

                        <div class="form-row align-items-center col-md-12">
                            <div class="form-group col-md-6">
                                <label for="precio">Precio</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" min='0' , step="any" class="form-control" id="update_precio" name="update_precio" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Imagen</label>
                                <input type="file" class="ace-file-input" id="ace-file-input2" name="ace-file-input2" accept=".jpg,.jpeg,.png,.JPG,.PNG,.JPEG" onchange="validar_input_file('ace-file-input2')">
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
                <button type="submit" class="btn btn-primary" onclick="actualizar_bateria();">
                    Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL ACTUALIZAR BATERIA-->
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
                    <input type="hidden" class="form-control" id="delete_id" name="update_id">
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
                '<button class="text-green mx-1" data-target="#editModal" data-toggle="modal"data-id="' + row.id_productos_llantimax + '" data-nombre="' + row.nombre + '" data-marca="' + row.marca + '" data-modelo="' + row.modelo + '" data-medidas="' + row.medidas + '" data-voltaje="' + row.voltaje + '" data-capacidad="' + row.capacidad_arranque + '" data-marc="' + row.id_marca + '" data-frio="' + row.capacidad_arranque_frio + '" data-peso="' + row.peso + '" data-foto="' + row.foto + '" data-tamanio="' + row.tamanio + '" data-precio="' + row.precio + '" ><i class="fa fa-pencil-alt"></i></button>' +
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
        var id_bateria = button.data('id')

        var modal = $(this)
        modal.find('#delete_id').val(id_bateria)

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
            url: "/eliminar_Bateria",
            data: data,
            success: function(msg) {
                alert(msg);
                location.href = "/mostrar_baterias";
            }
        });
    }

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

    function enviar_datos() {
        if ($("#agregar_bateria_form")[0].checkValidity()) {
            event.preventDefault();
            var nombre_bateria = document.getElementById("new_nombre_bateria").value;
            var marca = document.getElementById("new_marca").value;
            var precio = document.getElementById("new_precio").value;
            var fotografia_miniatura = document.getElementById("ace-file-input1").files[0];
            var modelo = document.getElementById("new_modelo").value;
            var voltaje = document.getElementById("new_voltaje").value;
            var capacidad_arranque = document.getElementById("new_capacidad_arranque").value;
            var capacidad_arranque_frio = document.getElementById("new_capacidad_arranque_frio").value;
            var medidas = document.getElementById("new_medidas").value;
            var peso = document.getElementById("new_peso").value;
            var tamanio = document.getElementById("new_tamanio").value;

            var check = 0;
            var nuevo = "";
            var checado = document.getElementById('new_check_marca').checked;
            if (checado) {
                check = 1;
                nuevo = document.getElementById("new_marca2").value;
            } else {
                nuevo = "";
            }

            var formData = new FormData();
            var token = '{{csrf_token()}}';
            formData.append("fotografia_miniatura", fotografia_miniatura);
            formData.append("nombre_bateria", nombre_bateria);
            formData.append("marca", marca);
            formData.append("precio", precio);
            formData.append("modelo", modelo);
            formData.append("voltaje", voltaje);
            formData.append("capacidad_arranque", capacidad_arranque);
            formData.append("capacidad_arranque_frio", capacidad_arranque_frio);
            formData.append("medidas", medidas);
            formData.append("peso", peso);
            formData.append("tamanio", tamanio);
            formData.append("check", check);
            formData.append("nuevo", nuevo);
            formData.append("_token", token);
            $.ajax({
                type: "POST",
                contentType: false,
                url: "/agregar_baterias",
                data: formData,
                processData: false,
                cache: false,
                success: function(msg) {
                    location.href = "/mostrar_baterias";
                }
            });
        } else {
            //SI HAY ERROR DE VALIDACIÓN, ENVÍA EL MENSAJE DE ERROR
            $("#agregar_bateria_form")[0].reportValidity();
        }

    }

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

<script type="text/javascript">
    $('#editModal').on('show.bs.modal', function(event) {
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
        var id_marca = button.data('marc')
        var modal = $(this)


        modal.find('#update_id_bateria').val(id_bateria)
        modal.find('#update_nombre_bateria').val(nombre_bateria)
        modal.find('#update_modelo').val(modelo)
        modal.find('#update_medidas').val(medidas)
        modal.find('#update_voltaje').val(voltaje)
        modal.find('#update_capacidad').val(capacidad)
        modal.find('#update_frio').val(frio)
        modal.find('#update_peso').val(peso)
        modal.find('#update_tamanio').val(tamanio)
        modal.find('#update_precio').val(precio)
        modal.find('#update_foto').val(foto)
        $('#update_marca > option[value="' + id_marca + '"]').attr('selected', 'selected');

    });

</script>

<script type="text/javascript">
    $('#update_check_marca').on('change', function() {
        if ($(this).is(':checked')) {
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

    function actualizar_bateria() {
        if ($("#actualizar_bateria_form")[0].checkValidity()) {
            event.preventDefault();
            var update_id_bateria = document.getElementById("update_id_bateria").value;
            var update_nombre_bateria = document.getElementById("update_nombre_bateria").value;
            var update_precio = document.getElementById("update_precio").value;
            //var update_precio = precio.replace(/[$.,]/g, '');
            var update_marca = document.getElementById("update_marca").value;
            var fotografia_miniatura = document.getElementById("ace-file-input2").files[0];
            var update_modelo = document.getElementById("update_modelo").value;
            var update_medidas = document.getElementById("update_medidas").value;
            var update_capacidad = document.getElementById("update_capacidad").value;
            var update_voltaje = document.getElementById("update_voltaje").value;
            var update_frio = document.getElementById("update_frio").value;
            var update_peso = document.getElementById("update_peso").value;
            var update_tamanio = document.getElementById("update_tamanio").value;
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
            formData.append("update_id_bateria", update_id_bateria);
            formData.append("update_nombre_bateria", update_nombre_bateria);
            formData.append("update_precio", update_precio);
            formData.append("update_foto", update_foto);
            formData.append("update_marca", update_marca);
            formData.append("update_modelo", update_modelo);
            formData.append("update_medidas", update_medidas);
            formData.append("update_capacidad", update_capacidad);
            formData.append("update_voltaje", update_voltaje);
            formData.append("update_frio", update_frio);
            formData.append("update_peso", update_peso);
            formData.append("update_tamanio", update_tamanio);
            formData.append("check2", check2);
            formData.append("nuevo2", nuevo2);
            formData.append("_token", token);
            console.log(formData);
            console.log(update_id_bateria);
            console.log(update_nombre_bateria);
            alert("Esta todo bien");
            $.ajax({
                type: "POST",
                contentType: false,
                url: "/actualizar_Bateria",
                data: formData,
                processData: false,
                cache: false,
                success: function(msg) {
                    console.log(msg);
                    location.href = "/mostrar_baterias";
                }
            });
        } else {
            $("#actualizar_bateria_form")[0].reportValidity();
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
