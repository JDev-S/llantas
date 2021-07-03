@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            Créditos
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

<!--Modal detalle General-->
<!--Modal detalle del producto-->
<?php
foreach($creditos as $credito)
{
echo'<div class="modal fade modal-lg" id="modalDetalle_'.$credito-> id_venta.'_'.$credito->id_credito.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel2" style="color:white;">
                    DETALLE DEL CRÉDITO
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

                  <div class="page-header border-0 mb-0">
                    <h1 class="page-title text-dark-l3 text-115">
                      DETALLE VENTA
                      <i class="fa fa-angle-right text-80 ml-1"></i>
                      <small class="page-info text-dark-m3">'.
                       
                      '</small>
                    </h1>

                    <div class="page-tools">
                      <div class="action-buttons">';
                        $id_ticket="'".$credito-> id_venta."'";
                        echo'<a class="btn bg-white btn-light mx-1px text-95 shadow-sm" href="javascript:mostrar_ticket(' .$id_ticket. ')" data-title="Print">
                          <i class="mr-1 fa fa-print text-primary text-120 w-2"></i>
                          Imprimir
                        </a>';
                        echo'<a class="btn bg-white btn-light mx-1px text-95 shadow-sm" href="javascript:mostrar_ticket(' .$id_ticket. ')" data-title="PDF">
                          <i class="mr-1 far fa-file-pdf text-danger text-120 w-2"></i>
                          Exportar
                        </a>
                      </div>
                    </div>
                  </div>


                  <div class="card dcard mb-4">
                    <div class="card-body px-4 px-lg-5">

                      <div class="text-center">
                        <i class="fa fa-leaf text-200 text-green-m1 mr-1 ml-n4"></i>
                        <span class="text-dark-m3 text-140">
                        Llantimax
                    </span>
                        <br>
                        <span class="text-dark-l2 text-90">
                        Sucursal: '.$credito-> sucursal_usuario.'
                    </span>
                      </div>

                      <div class="row mt-4">
                        <div class="col-sm-6">
                          <div>
                            <div class="text-100 text-grey-m1 align-middle">
                                <div class="mt-1 mb-2 text-secondary-d1 text-600 text-125">
                              Cliente
                            </div>
                            </div>

                            <div class="text-600 text-100 text-primary mt-2">
                              '.$credito-> nombre_cliente.'
                            </div>

                            <div class="text-dark-l1">
                              <div class="my-1">
                                Teléfono: '.$credito-> telefono.'
                              </div>
                              <div class="my-1">
                                Correo: '.$credito-> correo_electronico.'
                              </div>
                            </div>
                          </div>
                        </div><!-- /.col -->


                        <div class="col-sm-6 align-self-start d-sm-flex justify-content-end text-95">
                          <hr class="d-sm-none">
                          <div class="text-dark-l1">
                            <div class="mt-1 mb-2 text-secondary-d1 text-600 text-125">
                              Ticket
                            </div>

                            <div class="my-2">
                              <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                              <span class="text-600 text-90">
                                    ID:
                                </span>
                              '.$credito-> id_venta.'
                            </div>

                            <div class="my-2">
                              <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                              <span class="text-600 text-90">
                                    Fecha:
                                </span>
                              '.$credito-> fecha_venta.'
                            </div>
                          </div>
                        </div><!-- /.col -->
                      </div><!-- /.قخص -->
                      <div class="mt-4">
                        <div class="row text-600 text-95 text-secondary-d3 brc-green-l1 py-25 border-y-2">
                          <div class="col-7 col-sm-5">
                            Código
                          </div>

                          <div class="d-none d-sm-block col-4 col-sm-2">
                            Cant.
                          </div>

                          <div class="d-none d-sm-block col-sm-2">
                            Precio
                          </div>

                          <div class="col-5 col-sm-2">
                            Total
                          </div>
                        </div>

                        <div class="text-95 text-dark-m3">';
                            for($a=0;$a<count($detalles);$a++)
                        {
                            if($detalles[$a]->id_venta==$credito->id_venta)
                            {
                                 echo '<div class="row mb-2 mb-sm-0 py-25">
                                    <div class="col-7 col-sm-5">'.$detalles[$a]->nombre.'</div>
                                   <div class="d-none d-sm-block col-1">'.$detalles[$a]->cantidad_producto.'</div>
                                    <div class="d-none d-sm-block col-3 text-95">';
                                     $valor1=  $detalles[$a]->precio_unidad;
                                    if ($valor1<0) return "-".formato_moneda(-$valor1);
                                    echo '$' . number_format($valor1, 2);
                                echo'</div>
                                    <div class="col-5 col-sm-3 text-secondary-d3 text-600">';
                                    $valor2=$detalles[$a]->total; 
                                    if ($valor2<0) return "-".formato_moneda(-$valor2);
                                    echo '$' . number_format($valor2, 2);
                                echo'</div>   
                                    </div>';
                            }
                        }

                        echo'</div>   
                        <div class="row border-b-2 brc-green-l1"></div>
                        <div class="row mt-4">
                          <div class="col-10 col-sm-5 text-dark-l1 text-90 order-first order-sm-last" style="
                          padding-left: 30px; padding-right: 0px;">
                               <div class="row my-2 align-items-center bgc-green-d3 p-2 radius-1">
                              <div class="col-6 text-right text-white text-100">
                                Monto Total:
                              </div>
                              <div class="col-6">
                                <span class="text-100 text-white">';
                                $valor=$credito-> total_venta;
                                if ($valor<0) return "-".formato_moneda(-$valor);
                                    echo '$' . number_format($valor, 2);
                               echo '
                                    </span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <hr class="brc-secondary-l3 border-t-2 mb-5">';
        echo '
    <h1 class="page-title text-dark-l3 text-115">
                      HISTORIAL DE ABONOS
                      <small class="page-info text-dark-m3">'.
                       
                      '</small>
                    </h1>
    <div class="table-responsive row  text-95 text-secondary-d3 py-25 border-y-2" style=" margin-right: 0px; margin-left: 0px;">
                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                            <thead class="bg-none " style="background-color:#309b74;">
                                <tr class="text-white">
                                    <th><b>Folio del abono</b></th>
                                    <th><b>Folio de crédito</b></th>
                                    <th><b>Fecha</b></th>
                                    <th><b>Monto</b></th>
                                    <th><b>Comentario</b></th>
                                </tr>
                            </thead>
                            <tbody class="text-95 ">';

                           for($a=0;$a<count($abonos);$a++)
                            {
                                   if($abonos[$a]->id_credito==$credito->id_credito)
                                  {
                                    $valor=$abonos[$a]->monto;
                                    if ($valor<0) return "-".formato_moneda(-$valor);
                                        //echo '$' . number_format($valor1, 2);
                                echo '<tr >
                                    <td >'.$abonos[$a]->id_abono_credito.'</td>
                                    <td >'.$abonos[$a]->id_credito.'</td>
                                    <td >' .$abonos[$a]->fecha.'</td>
                                    <td > $' . number_format($valor, 2).'</td>
                                    <td >'. $abonos[$a]->comentario.'</td>
                                </tr>';
                                }
                            }
                           echo' </tbody>
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
     </div>';

            echo'<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>';
}
?>
<!--FIN MODAL DETALLE -->
<!--FIN MODAL DETALLE -->
<!--MODAL AGREGAR ABONO -->
<?php
foreach($creditos as $credito)
{
echo'
    <div class="modal fade" id="modalNuevo_'.$credito->id_credito.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#2470bd;">
                    <h5 class="modal-title" id="exampleModalLabel2" style="color:white">
                        Registrar abono
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body p-0">
                        <div class="card acard mt-2 mt-lg-3">
                            <div class="card-body px-3 pb-1">

                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                        <label for="id-form-field-1" class="mb-0">
                                            Monto a pagar
                                        </label>
                                    </div>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control col-sm-8 col-md-10" name="monto" id="monto">
                                    <input id="id_credito" name="id_credito" type="hidden" value="'.$credito->id_credito.'">
                                    <input id="id_cliente" name="id_cliente" type="hidden" value="'.$credito->id_cliente.'">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                    <label for="id-form-field-1" class="mb-0">
                                        Comentario
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea  class="form-control" id="comentario" name="comentario">
                                    </textarea>
                                </div>
                            </div>
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div style="align-content:center;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-primary" onclick="realizar_abono();">
                            Aceptar
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>';
}
?>
<!--FIN MODAL AGREGAR ABONO-->

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
    function realizar_abono() {
        //alert("Hola"); 
        //var monto = document.getElementById('monto').value;
        var id_credito = document.getElementById('id_credito').value;
        var id_cliente = document.getElementById('id_cliente').value;
        //var comentario = document.getElementById('comentario').value;
        //alert(monto+"   "+comentario+"  "+id_credito+"   "+id_cliente);
        var monto = "20";
        var comentario = "primer pago";
        alert("Realizando pago");
        var token = '{{csrf_token()}}';
        var data = {
            monto: monto,
            id_credito: id_credito,
            id_cliente: id_cliente,
            comentario: comentario,
            _token: token
        };
        console.log(data);
        $.ajax({
            type: "POST",
            url: "/insertar_abono",
            data: data,
            success: function(msg) {

                alert(msg);
                location.href = "/mostrar_creditos";
            }
        });

    }

</script>
<script type="text/javascript">
    function mostrar_ticket(ticket) {
        //location.href="/imprimir","_blank";
        var url = '/exportar_historial_abono/' + ticket;
        window.open(
            url,
            '_blank' // <- This is what makes it open in a new window.
        );
    }

</script>
@stop
@stop