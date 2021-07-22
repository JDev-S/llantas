<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*RUTA PARA MOSTRAR LA VENTANA DE LOGIN*/
Route::get('/','LoginController@mostrar_login');
/*Mandar credenciales*/
Route::post('/iniciar_sesion','LoginController@Login')->name('iniciar_sesion');
/*Cerrar sesion*/
Route::get('/cerrar_sesion','LoginController@Logout');
/*ACTUALIZAR USUARIO*/
Route::post('/actualizar_usuario','LoginController@actualizar_usuario')->name('actualizar_usuario');

/*Mandar a la principal*/
Route::get('/principal','LoginController@mostrar_principal')->middleware('admin:1')->name('principal');
/*MANDAR A LA PRINCIPAL DEL GERENTE SUCURSAL  principal_sucursal*/
Route::get('/principal_sucursal','LoginController@mostrar_principal_sucursal')->middleware('gerente:2')->name('principal_sucursal');
/*RECUPERAR LA CONTRASEÑA*/
Route::post('/obtener_contrasenia','LoginController@obtener_contraseña')->name('obtener_contrasenia');

/*Mostrar clientes*/
Route::get('/mostrar_clientes','ClientesController@mostrar_clientes')->middleware('admin:1')->name('mostrar_clientes');
/*Mostrar clientes sucursal*/
Route::get('/mostrar_clientes_sucursal','ClientesController@mostrar_clientes_sucursal')->middleware('gerente:2')->name('mostrar_clientes_sucursal');
/*Agregar un cliente*/
Route::post('/agregar_clientes', 'ClientesController@agregar_cliente')->name('agregar_clientes');
/*Agregar un cliente sucursal*/
Route::post('/agregar_cliente_sucursal', 'ClientesController@agregar_cliente_sucursal')->name('agregar_cliente_sucursal');
/*ELIMINAR CLIENTE*/
Route::post('/eliminar_Cliente', 'ClientesController@eliminar_Cliente')->name('eliminar_Cliente');
/*ACTUALIZAR CLIENTES*/
Route::post('/actualizar_cliente', 'ClientesController@actualizar_cliente')->name('actualizar_cliente');
/*ACTUALIZAR CLIENTE sucursal*/
Route::post('/actualizar_cliente_sucursal', 'ClientesController@actualizar_cliente_sucursal')->name('actualizar_cliente_sucursal');

/*Llantas*/
/*Mostrar Llantas*/
Route::get('/mostrar_llantas','LlantasController@mostrar_llantas')->middleware('admin:1')->name('mostrar_llantas');
/*Mostrar Llantas sucursales*/
Route::get('/mostrar_llantas_sucursales','LlantasController@mostrar_llantas_sucursales')->middleware('gerente:2')->name('mostrar_llantas_sucursales');
/*Agregar una llanta*/
Route::post('/agregar_llantas', 'LlantasController@agregar_llanta')->name('agregar_llantas');
/*ELIMINAR LLANTA*/
Route::post('/eliminar_Llanta', 'LlantasController@eliminar_Llanta')->name('eliminar_Llanta');
/*ACTUALIZAR LLANTA*/
Route::post('/actualizar_Llanta', 'LlantasController@actualizar_Llanta')->name('actualizar_Llanta');

/*SERVICIOS*/
/*Mostrar servicios*/
Route::get('/mostrar_servicios','ServicioController@mostrar_servicios')->middleware('admin:1')->name('mostrar_servicios');
/*Mostrar sercicios sucursales*/
Route::get('/mostrar_servicios_sucursales','ServicioController@mostrar_servicios_sucursales')->middleware('gerente:2')->name('mostrar_servicios_sucursales');
/*Agregar un servicio*/
Route::post('/agregar_servicios', 'ServicioController@agregar_servicio')->name('agregar_servicios');
/*ELIMINAR SERVICIO*/
Route::post('/eliminar_Servicio', 'ServicioController@eliminar_Servicio')->name('eliminar_Servicio');
/*Actualizar_servicio*/
Route::post('/actualizar_Servicio', 'ServicioController@actualizar_Servicio')->name('actualizar_Servicio');

/*Refacciones*/
/*Mostrar refacciones*/
Route::get('/mostrar_refacciones','RefaccionesController@mostrar_refacciones')->middleware('admin:1')->name('mostrar_refacciones');
/*Mostrar refacciones sucursales*/
Route::get('/mostrar_refacciones_sucursales','RefaccionesController@mostrar_refacciones_sucursales')->middleware('gerente:2')->name('mostrar_refacciones_sucursales');
/*Agregar una refaccion*/
Route::post('/agregar_refacciones', 'RefaccionesController@agregar_refaccion')->name('agregar_refacciones');
/*Agregar una refaccion a sucursal*/
Route::post('/agregar_refacciones_sucursal', 'RefaccionesController@agregar_refacciones_sucursal')->name('agregar_refacciones_sucursal');
/*ELIMINAR REFACCION*/
Route::post('/eliminar_Refaccion', 'RefaccionesController@eliminar_Refaccion')->name('eliminar_Refaccion');
/*ACTUALIZAR REFACCION*/
Route::post('/actualizar_refaccion', 'RefaccionesController@actualizar_refaccion')->name('actualizar_refaccion');
/*Actualizar refaccion sucursal*/
Route::post('/actualizar_refaccion_sucursal', 'RefaccionesController@actualizar_refaccion_sucursal')->name('actualizar_refaccion_sucursal');

/*Baterias*/
/*Mostrar Baterias*/
Route::get('/mostrar_baterias','BateriasController@mostrar_baterias')->middleware('admin:1')->name('mostrar_baterias');
/*Mostrar Baterias sucursales*/
Route::get('/mostrar_baterias_sucursales','BateriasController@mostrar_baterias_sucursales')->middleware('gerente:2')->name('mostrar_baterias_sucursales');
/*Agregar una bateria*/
Route::post('/agregar_baterias', 'BateriasController@agregar_bateria')->name('agregar_baterias');
/*ELIMINAR BATERIA*/
Route::post('/eliminar_Bateria', 'BateriasController@eliminar_Bateria')->name('eliminar_Bateria');
/*actualizar_Bateria*/
Route::post('/actualizar_Bateria', 'BateriasController@actualizar_Bateria')->name('actualizar_Bateria');

/*INVENTARIO*/
/*Mostrar inventario*/
Route::get('/mostrar_inventario','InventarioController@mostrar_inventarios')->middleware('admin:1')->name('mostrar_inventario');
/*Mostrar inventario por sucursal*/
Route::get('/mostrar_inventarios_sucursal','InventarioController@mostrar_inventarios_sucursal')->middleware('gerente:2')->name('mostrar_inventarios_sucursal');
/*Mostrar formulario de inventario*/
Route::get('/agregar_inventario','InventarioController@mostrar_formulario')->middleware('admin:1')->name('agregar_inventario');
/*Agregar un producto en inventario*/
Route::post('/agregar_inventarios', 'InventarioController@agregar_inventario')->name('agregar_inventarios');
/*Mostrar productos en el formulario de inventario*/
Route::post('/mostrar_productos','InventarioController@mostrar_productos_sucursal_inventario')->name('mostrar_productos');
/*Eliminar producto del inventario*/
Route::post('/eliminar_producto_inventario','InventarioController@eliminar_producto_inventario')->name('eliminar_producto_inventario');

/*  Ventas*/
/* Vista para hacer la venta */
/*Mostrar ventas*/
Route::get('/mostrar_venta','VentasController@mostrar_ventas_realizadas')->middleware('admin:1')->name('mostrar_venta');
/*Mostrar ventas sucursal*/
Route::get('/mostrar_ventas_realizadas_sucursal','VentasController@mostrar_ventas_realizadas_sucursal')->middleware('gerente:2')->name('mostrar_ventas_realizadas_sucursal');
/*Mostrar Formulario de generar venta*/
Route::get('/agregar_venta','VentasController@mostrar_vista')->middleware('admin:1')->name('agregar_venta');
/*Mostrar Formulario de generar venta sucursal*/
Route::get('/agregar_venta_sucursal','VentasController@mostrar_vista_sucursal')->middleware('gerente:2')->name('agregar_venta_sucursal');
/*MOSTRAR PRODUCTOS PARA VENDER*/
Route::post('/mostrar_productos_ventas','VentasController@mostrar_productos_ventas')->name('mostrar_productos_ventas');
/*INSERTR VENTA*/
Route::post('/insertar_venta', 'VentasController@insertar_venta')->name('insertar_venta');
/*ELIMINAR VENTA*/
Route::post('/eliminar_venta','VentasController@eliminar_venta')->name('eliminar_venta');
/*ACTUALIZAR VENTA TEMPORAL*/
Route::post('/actualizar_venta', 'VentasController@actualizar_venta')->name('actualizar_venta');

/*PEDIDOS A PROVEEDORES*/
/*Mostrar pedidos a proveedores*/
Route::get('/mostrar_pedido_proveedor','PedidoController@mostrar_pedidos_proveedor')->middleware('admin:1')
->name('mostrar_pedido_proveedor');
/*Mostrar pedidos a proveedores sucursales*/
Route::get('/mostrar_pedido_proveedor_sucursal','PedidoController@mostrar_pedido_proveedor_sucursal')->middleware('gerente:2')
->name('mostrar_pedido_proveedor_sucursal');
/*Mostrar pedidos en proveedores*/
Route::get('/pedido_proveedor','PedidoController@mostrar_catalogo_proveedores')->middleware('admin:1')->name('pedido_proveedor');
/**/
Route::get('/mostrar_catalogo_proveedores_sucursal','PedidoController@mostrar_catalogo_proveedores_sucursal')->middleware('gerente:2')->name('mostrar_catalogo_proveedores_sucursal');
/*MANDAR PRODUCTOS POR SUCURSAL*/
Route::post('/mostrar_catalogo_sucursal','PedidoController@mostrar_catalogo_sucursal')->name('mostrar_catalogo_sucursal');
/*Agregar un pedido en el proveedor*/
Route::post('/insertar_pedido_proveedor','PedidoController@generar_pedido_proveedor')->name('insertar_pedido_proveedor');
/*ELIMINAR CLIENTE*/
Route::post('/eliminar_compra', 'PedidoController@eliminar_compra')->name('eliminar_compra');


/*PEDIDOS A SUCURSALES*/
/*MOSTRAR PEDIDOS A SUCURSALES*/
Route::get('/mostrar_pedido_sucursal','PedidoController@mostrar_pedidos_sucursales')->middleware('admin:1')
->name('mostrar_pedido_sucursal');
/*MOSTRAR PEDIDOS A SUCURSALES A SUCURSAL*/
Route::get('/mostrar_pedidos_sucursales_sucursal','PedidoController@mostrar_pedidos_sucursales_sucursal')->middleware('gerente:2')->name('mostrar_pedidos_sucursales_sucursal');
/*VENTANA PARA HACER UN PEDIDO*/
Route::get('/pedido_sucursal','PedidoController@pedido_sucursal')->middleware('admin:1')
->name('pedido_sucursal');
/*VENTANA PARA HACER UN PEDIDO SUCURSAL*/
Route::get('/pedido_sucursal_sucursal','PedidoController@pedido_sucursal_sucursal')->middleware('gerente:2')
->name('pedido_sucursal_sucursal');
/*Mostrar_productos_sucursal_pedido*/
Route::post('/mostrar_productos_pedidos', 'PedidoController@obtener_productos_sucursales')->name('mostrar_productos_pedidos');
/*PETICION DE HACER PEDIDOS SUCURSALES*/
Route::post('/insertar_pedido_sucursal','PedidoController@agregar_pedidos_sucursales')->name('insertar_pedido_sucursal');
/*MANDAR HISTORIAL DEL PEDIDO*/
Route::post('/obtener_historiales','PedidoController@obtener_historiales')->name('obtener_historiales');
/*MOSTRAR PEDIDOS SOLICITADOS*/
Route::get('/mostrar_pedido_solicitado','PedidoController@mostrar_pedidos_solicitados')->middleware('admin:1')
->name('mostrar_pedido_solicitado');
/*MOSTRAR PEDIDOS SOLICITADOS SUCURSALES*/
Route::get('/mostrar_pedidos_solicitados_sucursal','PedidoController@mostrar_pedidos_solicitados_sucursal')->middleware('gerente:2')
->name('mostrar_pedidos_solicitados_sucursal');
/*ACTUALIZAR STATUS DEL PEDIDO*/
Route::post('/actualizar_status_pedido','PedidoController@actualizar_status_pedido')->name('actualizar_status_pedido');
/*ELIMINAR PEDIDO A SUCURSAL*/
Route::post('/eliminar_pedido_sucursal','PedidoController@eliminar_pedido_sucursal')->name('eliminar_pedido_sucursal');

/*Creditos a clientes*/
/*Mostrar creditos a clientes*/
Route::get('/mostrar_creditos','CreditoController@mostrar_creditos')->middleware('admin:1')->name('mostrar_creditos');
/*Mostrar creditos a sucursales*/
Route::get('/mostrar_creditos_sucursal','CreditoController@mostrar_creditos_sucursal')->middleware('gerente:2')->name('mostrar_creditos_sucursal');
/*Hacer un abono credito*/
Route::post('/insertar_abono', 'CreditoController@agregar_abono')->name('insertar_abono');
/*ELIMINAR CREDITO*/
Route::post('/eliminar_Credito', 'CreditoController@eliminar_Credito')->name('eliminar_Credito');
/*ACTUALIZAR ABONO DE UN CREDITO*/
Route::post('/actualizar_abono', 'CreditoController@actualizar_abono')->name('actualizar_abono');

/*Reporte de ventas*/
Route::get('/mostrar_reportes','VentasController@mostrar_reportes')->middleware('admin:1')->name('mostrar_reportes');
/*Mostrar reportes sucursal*/
Route::get('/mostrar_reportes_sucursal','VentasController@mostrar_reportes_sucursal')->middleware('gerente:2')->name('mostrar_reportes_sucursal');
/*MOSTRAR REPORTE DE VENTAS*/
Route::post('/mostrar_reportes_ventas', 'VentasController@mostrar_reportes_ventas')->name('mostrar_reportes_ventas');
/*MOSTRAR REPORTE DE VENTAS SUCURSAL*/
Route::post('/mostrar_reportes_ventas_sucursal', 'VentasController@mostrar_reportes_ventas_sucursal')->name('mostrar_reportes_ventas_sucursal');

/*Proovedores*/
/*Mostrar proveedores*/
Route::get('/mostrar_proveedores','ProveedorController@mostrar_proveedor')->middleware('admin:1')->name('mostrar_proveedores');
/*Mostrar proveedores sucursal*/
Route::get('/mostrar_proveedor_sucursal','ProveedorController@mostrar_proveedor_sucursal')->middleware('gerente:2')->name('mostrar_proveedor_sucursal');
/*Agregar un proveedor*/
Route::post('/agregar_proveedores', 'ProveedorController@agregar_proveedor')->name('agregar_proveedores');
/*Agregar un proveedor_sucursal*/
Route::post('/agregar_proveedores_sucursal', 'ProveedorController@agregar_proveedores_sucursal')->name('agregar_proveedores_sucursal');
/*ELIMINAR PROVEEDOR*/
Route::post('/eliminar_Proveedor', 'ProveedorController@eliminar_Proveedor')->name('eliminar_Proveedor');
/*ACTUALIZAR PROVEEDOR*/
Route::post('/actualizar_proveedor', 'ProveedorController@actualizar_proveedor')->name('actualizar_proveedor');
/*ACTUALIZAR proveedor sucursal*/
Route::post('/actualizar_proveedor_sucursal', 'ProveedorController@actualizar_proveedor_sucursal')->name('actualizar_proveedor_sucursal');

/*Catalogo*/
/*mostrar formulario para agregar catalogo*/
Route::get('/agregar_catalogo','CatalogoController@mostrar_formulario')->middleware('admin:1')->name('agregar_catalogo');
/*Mostrar productos en el formulario de catalogo sucursales*/
Route::get('/agregar_catalogo_sucursales','CatalogoController@agregar_catalogo_sucursales')->middleware('gerente:2')->name('agregar_catalogo_sucursales');
/*Mostrar productos en el formulario de catalogo*/
Route::post('/mostrar_productos_catalogo','CatalogoController@mostrar_productos_sucursal_catalogo')-> name('mostrar_productos_catalogo');
Route::post('/agregar_producto_catalogo','CatalogoController@agregar_producto_catalogo')->name('agregar_producto_catalogo');

/*TICKETS*/
/*Mostrar ticket*/
Route::get('/exportar_ticket/{ticket?}','VentasController@exportar_ticket')->name('exportar_ticket');
/*MOSTRAR HISTORIAL ABONOS*/
Route::get('/exportar_historial_abono/{ticket?}','VentasController@exportar_historial_abono')->name('exportar_historial_abono');
/*IMPRIMIR VENTA*/
Route::get('/imprimir_venta/{input?}','VentasController@imprimir_venta')->name('imprimir_venta');
/*IMPRIMIR PEDIDO PROVEEDOR*/
Route::get('/exportar_pedido_proveedor/{ticket?}','VentasController@exportar_pedido_proveedor')->name('exportar_pedido_proveedor');
/*IMPRIMIR PEDIDO SUCURSAL*/
Route::get('/exportar_pedido_sucursal/{ticket?}','VentasController@exportar_pedido_sucursal')->name('exportar_pedido_sucursal');