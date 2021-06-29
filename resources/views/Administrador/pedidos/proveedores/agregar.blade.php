@extends('welcome')
@section('contenido')
@section('styles')
<link rel="stylesheet" type="text/css" href="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop
<div class="page-content container container-plus">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            Baterías
            <!--<small class="page-info text-secondary-d2">
                <i class="fa fa-angle-double-right text-80"></i>
                extended tables plugin
            </small>-->
        </h1>
    </div>
    <div class="ccard h-90 d-flex flex-column mx-2 px-2 py-3">
        <div class="row col-16 align-items-center mt-4">
            <div class="form-group col-6 ml-1">
                <!-- Multiple Item Picker -->
                <select class="selectpicker form-control" data-live-search="true" title="-- Selecciona un producto --" multiple="multiple" data-size="5" data-header="Selecciona un producto">
                    <optgroup label="los chidos">
                        <option data-divider="true"></option>
                        <option data-tokens="Espresso" data-subtext="jj come .|." showSubtext="true">Espresso</option>
                        <option data-tokens="Americano">Americano</option>
                        <option data-tokens="Mocha">Mocha</option>
                        <option data-tokens="Capuccino">Capuccino</option>
                        <option data-tokens="Affogato">Affogato</option>
                        <option data-tokens="Long Black">Long Black</option>
                        <option data-tokens="Macchiato">Macchiato</option>
                    </optgroup>

                    <option data-divider="true"></option>

                    <option data-tokens="Espresso">Espresso</option>
                    <option data-tokens="Americano">Americano</option>
                    <option data-tokens="Mocha">Mocha</option>
                    <option data-tokens="Capuccino">Capuccino</option>
                    <option data-tokens="Affogato">Affogato</option>
                    <option data-tokens="Long Black">Long Black</option>
                    <option data-tokens="Macchiato">Macchiato</option>

                    <option data-divider="true"></option>

                    <option data-tokens="Espresso">Espresso</option>
                    <option data-tokens="Americano">Americano</option>
                    <option data-tokens="Mocha">Mocha</option>
                    <option data-tokens="Capuccino">Capuccino</option>
                    <option data-tokens="Affogato">Affogato</option>
                    <option data-tokens="Long Black">Long Black</option>
                    <option data-tokens="Macchiato">Macchiato</option>

                    <option data-divider="true"></option>

                    <option data-tokens="Espresso">Espresso</option>
                    <option data-tokens="Americano">Americano</option>
                    <option data-tokens="Mocha">Mocha</option>
                    <option data-tokens="Capuccino">Capuccino</option>
                    <option data-tokens="Affogato">Affogato</option>
                    <option data-tokens="Long Black">Long Black</option>
                    <option data-tokens="Macchiato">Macchiato</option>

                    <option data-divider="true"></option>

                    <option data-tokens="Espresso">Espresso</option>
                    <option data-tokens="Americano">Americano</option>
                    <option data-tokens="Mocha">Mocha</option>
                    <option data-tokens="Capuccino">Capuccino</option>
                    <option data-tokens="Affogato">Affogato</option>
                    <option data-tokens="Long Black">Long Black</option>
                    <option data-tokens="Macchiato">Macchiato</option>
                </select>
            </div>
            <div class="form-group col-2">
                <input class="form-control ml-2" min="1" max="9999" step="1" type="number" placeholder="cantidad">
            </div>
            <div class="col-3">
            <button class="btn btn-primary ml-2 mb-3">Añadir</button>
        </div>
        <!--.row-->
    </div>

</div>

<!--Modal detalle del producto-->
<!--FIN MODAL DETALLE -->

<!--MODAL AGREGAR BATERIA -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#2470bd;">
                <h5 class="modal-title" id="exampleModalLabel2" style="color:white">
                    Registrar batería
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
                                        Código de batería
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control col-sm-8 col-md-10" id="nombre_bateria" name="nombre_bateria">
                                </div>
                            </div>
                            <div class="form-group row">
                                <?php
                        $query2 = "select * from marca ";
                        $data2=DB::select($query2);      
                        ?>
                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                    <label for="id-form-field-1" class="mb-0">
                                        Marca
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-control col-sm-8 col-md-10" id="marca" name="marca">
                                        @foreach($data2 as $item)
                                        <option value="{{ $item->id_marca }}"> {{ $item->marca }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                    <label for="id-form-field-1" class="mb-0">
                                        Modelo
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control col-sm-8 col-md-10" id="modelo" name="modelo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                    <label for="id-form-field-1" class="mb-0">
                                        Voltaje
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control col-sm-8 col-md-10" id="voltaje" name="voltaje">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                    <label for="id-form-field-1" class="mb-0">
                                        Capacidad de arranque
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control col-sm-8 col-md-10" id="capacidad_arranque" name="capacidad_arranque">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                    <label for="id-form-field-1" class="mb-0">
                                        Capacidad de arranque en frio
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control col-sm-8 col-md-10" id="capacidad_arranque_frio" name="capacidad_arranque_frio">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                    <label for="id-form-field-1" class="mb-0">
                                        Medidas
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control col-sm-8 col-md-10" id="medidas" name="medidas">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                    <label for="id-form-field-1" class="mb-0">
                                        Peso
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control col-sm-8 col-md-10" id="peso" name="peso">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                    <label for="id-form-field-1" class="mb-0">
                                        Tamaño
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control col-sm-8 col-md-10" id="tamanio" name="tamanio">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                    <label for="id-form-field-1" class="mb-0">
                                        Precio
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control col-sm-8 col-md-10" id="precio" name="precio">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label text-sm-right pr-0">
                                    <label for="id-form-field-1" class="mb-0">
                                        Imagen
                                    </label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="file" class="ace-file-input" id="ace-file-input1" name="ace-file-input1">
                                </div>

                                <!--<div class="col-sm-9">
                      <div id="dropzone" name="dropzone" action="/upload" class="dropzone bgc-white brc-dark-l3 brc-h-primary-m4 bgc-h-primary-l4 radius-1 mt-3 dz-clickable col-sm-8 col-md-10">
                          <div class="dz-default dz-message">
                            <span class="text-150  text-grey-d2">
                            <span class="text-130 font-bolder"><i class="fa fa-caret-right text-danger-m1"></i> Drop files</span>
                            to upload
                            <span class="text-90 text-grey-m1">(or click)</span>
                            <br>
                            <i class="upload-icon fas fa-cloud-upload-alt text-blue-m1 fa-3x mt-4"></i>
                            </span>
                          </div>
                      </div>
                    <!-- the `html` of this element will be used by dropzone instance for previewing files/images 
                    <div id="preview-template" class="d-none">
                      <div class="dz-preview dz-file-preview">
                        <div class="dz-image">
                          <img alt="Dropzone placeholder" data-dz-thumbnail="">
                        </div>

                        <div class="dz-details">
                          <div class="dz-size">
                            <span data-dz-size=""></span>
                          </div>

                          <div class="dz-filename">
                            <span data-dz-name=""></span>
                          </div>
                        </div>

                        <div class="dz-progress progress border-1 brc-yellow-tp2" style="height: 0.75rem;">
                          <div class="progress-bar bgc-success dz-upload " role="progressbar" data-dz-uploadprogress=""></div>
                        </div>

                        <div class="dz-error-message">
                          <span data-dz-errormessage=""></span>
                        </div>

                        <div class="dz-success-mark">
                          <span class="fa-stack fa-lg text-150">
                            <i class="fa fa-circle fa-stack-2x text-white"></i>
                            <i class="fa fa-check fa-stack-1x fa-inverse text-success-m1"></i>
                        </span>
                        </div>

                        <div class="dz-error-mark">
                          <span class="fa-stack fa-lg text-150">
                            <i class="fa fa-circle fa-stack-2x text-danger-m3"></i>
                            <i class="fas fa-exclamation fa-stack-1x fa-inverse text-white"></i>
                        </span>
                        </div>
                      </div>
                    </div>
                    </div>-->
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
                    <button type="submit" class="btn btn-primary" onclick="enviar_datos();">
                        Aceptar
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
<!--FIN MODAL AGREGAR LLANTA-->
@section('scripts')

<!-- include vendor scripts used in "Bootstrap Table" page. see "/views//pages/partials/table-bootstrap/@vendor-scripts.hbs" -->
<script src="\npm\tableexport.jquery.plugin@1.10.22\tableExport.min.js"></script>


<script src="\npm\bootstrap-table@1.18.3\dist\bootstrap-table.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\export\bootstrap-table-export.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\print\bootstrap-table-print.min.js"></script>
<script src="\npm\bootstrap-table@1.18.3\dist\extensions\mobile\bootstrap-table-mobile.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
@stop
@stop
