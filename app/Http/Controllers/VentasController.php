<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Connection;
use DB;
class VentasController extends Controller
{
    var $total_venta = 0;
    public function mostrar_productos_ventas(Request $input)
    {
        $id_sucursal=$input['sucursal'];
         /*$inventarios=DB::select("select inventario.id_producto as id_producto, productos_llantimax.nombre as nombre_producto, categoria.categoria as categoria, marca.marca as marca, producto.modelo as modelo,productos_servicios.precio as precio, producto.fotografia_miniatura as foto, sucursal.sucursal as sucursal, inventario.cantidad as cantidad, sucursal.id_sucursal as id_sucursal from inventario inner join productos_llantimax on productos_llantimax.id_productos_llantimax=inventario.id_producto inner join sucursal on inventario.id_sucursal=sucursal.id_sucursal inner join productos_servicios on productos_servicios.id_producto_servicio=productos_llantimax.id_productos_llantimax inner join producto on producto.id_producto=productos_servicios.id_producto_servicio inner join marca on marca.id_marca=producto.id_marca inner join categoria on categoria.id_categoria=producto.id_categoria

UNION

select inventario.id_producto as id_producto, productos_llantimax.nombre as nombre_producto, (select 'Refacciones' as refaccion), productos_independientes.marca as marca, productos_independientes.modelo as modelo,productos_independientes.precio as precio, productos_independientes.fotografia_miniatura as foto, sucursal.sucursal as sucursal, inventario.cantidad as cantidad, sucursal.id_sucursal as id_sucursal from inventario inner join productos_llantimax on productos_llantimax.id_productos_llantimax=inventario.id_producto inner join sucursal on inventario.id_sucursal=sucursal.id_sucursal inner join productos_independientes on productos_independientes.id_producto_independiente=productos_llantimax.id_productos_llantimax");*/

        $inventarios=DB::select("select inventario.id_producto as id_producto, productos_llantimax.nombre as nombre_producto, categoria.categoria as categoria, marca.marca as marca, producto.modelo as modelo,productos_servicios.precio as precio, producto.fotografia_miniatura as foto, sucursal.sucursal as sucursal, inventario.cantidad as cantidad, sucursal.id_sucursal as id_sucursal from inventario inner join productos_llantimax on productos_llantimax.id_productos_llantimax=inventario.id_producto inner join sucursal on inventario.id_sucursal=sucursal.id_sucursal inner join productos_servicios on productos_servicios.id_producto_servicio=productos_llantimax.id_productos_llantimax inner join producto on producto.id_producto=productos_servicios.id_producto_servicio inner join marca on marca.id_marca=producto.id_marca inner join categoria on categoria.id_categoria=producto.id_categoria where sucursal.id_sucursal=".$id_sucursal."

        UNION

        select inventario.id_producto as id_producto, productos_llantimax.nombre as nombre_producto, (select 'Refacciones' as refaccion), productos_independientes.marca as marca, productos_independientes.modelo as modelo,productos_independientes.precio as precio, productos_independientes.fotografia_miniatura as foto, sucursal.sucursal as sucursal, inventario.cantidad as cantidad, sucursal.id_sucursal as id_sucursal from inventario inner join productos_llantimax on productos_llantimax.id_productos_llantimax=inventario.id_producto inner join sucursal on inventario.id_sucursal=sucursal.id_sucursal inner join productos_independientes on productos_independientes.id_producto_independiente=productos_llantimax.id_productos_llantimax where sucursal.id_sucursal=".$id_sucursal."

        UNION

        SELECT productos_llantimax.id_productos_llantimax as id_producto, productos_llantimax.nombre as nombre_producto, (SELECT 'Servicio') as categoria, (SELECT 'NA') as marca, (SELECT 'NA') as modelo, productos_servicios.precio, (SELECT 'NA') as foto, (SELECT 'Global') as sucursal, (SELECT '1') as cantidad, (SELECT 'NA') as id_sucursal FROM productos_llantimax INNER JOIN productos_servicios on productos_servicios.id_producto_servicio=productos_llantimax.id_productos_llantimax INNER JOIN servicio_cliente on servicio_cliente.id_servicio=productos_servicios.id_producto_servicio");
        $json=json_encode($inventarios);
		return response()->json($json);
    }
    
    
    public function mostrar_vista()
    {
        $clientes=DB::select("select clientes.id_cliente,clientes.nombre_completo,clientes.telefono,clientes.correo_electronico,clientes.id_sucursal,sucursal.sucursal from clientes inner join sucursal on sucursal.id_sucursal=clientes.id_sucursal");
        return view('/Administrador/ventas/agregar',compact('clientes'));
    }
    
    public function mostrar_vista_sucursal()
    {
        $id_sucursal=Session::get('id_sucursal_usuario');
        $clientes=DB::select("select clientes.id_cliente,clientes.nombre_completo,clientes.telefono,clientes.correo_electronico,clientes.id_sucursal,sucursal.sucursal from clientes inner join sucursal on sucursal.id_sucursal=clientes.id_sucursal where clientes.id_sucursal=".$id_sucursal);
        return view('/Gerente/ventas/agregar',compact('clientes'));
    }
    
    
      /*MÉTODO PARA INSERTAR EN VENTA Y DETALLE DE LA VENTA*/
    public function insertar_venta(Request $input)
	{
        /*RECUPERAR DATOS PARA LA VENTA*/
        $id_usuario = session('id_usuario');//session
        $id_sucursal_usuario = session('id_sucursal_usuario');//session
        $id_sucursal =$input['id_sucursal'];
       
        $id_cliente = $input['id_cliente'][0];
        $id_metodo_pago = $input ['id_metodo_pago'];
        $total_venta = $input ['total_venta'];
        $factura = $input['factura'];
        $array_productos=$input['array_productos'];
        $comentario_credito=$input['descripcion'];
        $fecha_ultimo_dia=$input['fecha'];
        $auto=$input['auto'];
        
        $id_sucursal_cliente = VentasController::obtener_sucursal_cliente($id_cliente);
       
        /*OBTENER FECHA ACTUAL*/ 
        $fecha_venta= VentasController::obtener_fecha_actual();
       
        /*GENERAR FOLIO DE VENTA*/
        $id_venta = VentasController::generar_folio();
        
        /*INICIAR TRANSACCIÓN*/
       DB::beginTransaction();
        try{
            /*GENERAR VENTA*/
            if($id_metodo_pago==1)
            {
               // echo 'total_venta '.$total_venta;
                $total_final=intval($total_venta)*0.03;
                $total_venta=intval($total_venta)+$total_final;
            }
            //echo 'total_venta_final : '.$total_venta."    30%mas    ".$total_final;
            
            
            $ingresar = DB::insert('INSERT INTO venta(id_venta, id_usuario, id_sucursal_usuario, id_sucursal, id_cliente, id_sucursal_cliente, id_metodo_pago, total_venta, fecha_venta, factura,auto) VALUES(?,?,?,?,?,?,?,?,?,?,?)', [$id_venta, $id_usuario, $id_sucursal_usuario, $id_sucursal, $id_cliente, $id_sucursal_cliente, $id_metodo_pago, $total_venta, $fecha_venta, $factura,$auto]);
       
            //INSERTAR DETALLE DE LA VENTA
            foreach($array_productos as $propiedad){
                $ingresar = DB::insert('INSERT INTO detalle_venta (id_venta, id_usuario, id_sucursal_usuario, id_sucursal, id_producto, cantidad_producto, total, precio_unidad) VALUES (?,?,?,?,?,?,?,?)', [$id_venta, $id_usuario, $id_sucursal_usuario, $id_sucursal, $propiedad['id_producto'], $propiedad['cantidad_producto'] , $propiedad['total'] , $propiedad['precio_unidad']]);
                
                
                //VERIFICAR SI SE TRATA DE UN SERVICIO O NO Y SER DESCONTADO DEL INVENTARIO
                $contador=DB::select("select COUNT(*) as contador from servicio_cliente WHERE id_servicio='".$propiedad['id_producto']."'");
                //echo $contador[0]->contador;
                if($contador[0]->contador==0)
                {
                    //echo 'Entro al if';
                    $cantidad_inventario = DB:: select("select cantidad  from inventario where id_producto='".$propiedad['id_producto']."' and id_sucursal='".$propiedad['id_sucursal']."'");
                
                    $cantidad=$cantidad_inventario[0]->cantidad;
                    $cantidad_final =intval($cantidad)- intval($propiedad['cantidad_producto']);
                    $actualizar = DB::update('UPDATE inventario SET cantidad='.$cantidad_final.' WHERE id_producto=? AND id_sucursal=?', [$propiedad['id_producto'],$propiedad['id_sucursal']]);    
                }
                //echo 'No entro al if';
                
            }
            if($id_metodo_pago==3)
            {
                $id_credito=VentasController::generar_folio_credito();
                $ingresar=DB::insert('INSERT INTO credito(id_credito, id_venta, id_usuario, id_sucursal_usuario, id_sucursal, status_credito, comentario, fecha_ultimo_dia) 
                VALUES (?,?,?,?,?,?,?,?)', [$id_credito,$id_venta,$id_usuario,$id_sucursal_usuario,$id_sucursal,"No liquidado",$comentario_credito,$fecha_ultimo_dia]);
                
                
            }
            $sat="";
            if($factura==0){
                $sat="no";
            }
            else
            {
                $sat="si";
            }
            
		   echo $sat;
            DB::commit();
        }catch (Exception $e){
                echo 'Ha ocurrido un error!';
                DB::rollback();
        }
    }
    
    /*MÉTODO PARA GENERAR FOLIO*/
    function generar_folio()
    {
        $id_venta = VentasController::generar_cadena_aleatoria();
        
        return $id_venta;
    }
    
    
     function generar_folio_credito()
    {
        $id_credito = VentasController::generar_cadena_aleatoria_credito();
        
        return $id_credito;
    }
    
    /*MÉTODO PARA OBTENER LA FECHA ACTUAL*/
    function obtener_fecha_actual()
    {
        $dia=date("d");
        $mes=date("m");
        $anio=date("Y");
        $fecha =$anio.'-'.$mes.'-'.$dia; 
        
        return $fecha;
    }
    
    /*MÉTODO PARA GENERAR UNA CADENA ALEATORIA*/
    function generar_cadena_aleatoria($longitud = 8) 
    {
        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud_caracteres = strlen($caracteres_permitidos);
        $cadena_random = '';
        
        for($i = 0; $i < $longitud; $i++) {
            $caracter_random = $caracteres_permitidos[mt_rand(0, $longitud_caracteres - 1)];
            $cadena_random .= $caracter_random;
        }
        
        /*OBTENER EL NÚMERO DE REGISTROS ACTUAL DE VENTAS*/
        try{
            $query = DB::select('select count(*) as ventas from venta');    
        } catch(Exception $e){
            echo 'Ha ocurrido un error!';
        }
        $ventas_actuales = $query[0]->ventas;
        
        return ($ventas_actuales+1)."-".$cadena_random;
    }
    
     function generar_cadena_aleatoria_credito($longitud = 8) 
    {
        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud_caracteres = strlen($caracteres_permitidos);
        $cadena_random = '';
        
        for($i = 0; $i < $longitud; $i++) {
            $caracter_random = $caracteres_permitidos[mt_rand(0, $longitud_caracteres - 1)];
            $cadena_random .= $caracter_random;
        }
        
        /*OBTENER EL NÚMERO DE REGISTROS ACTUAL DE VENTAS*/
        try{
            $query = DB::select('select count(*) as creditos from credito');    
        } catch(Exception $e){
            echo 'Ha ocurrido un error!';
        }
        $ventas_actuales = $query[0]->creditos;
        
        return ($ventas_actuales+1)."-".$cadena_random;
    }
    
    
    function obtener_sucursal_cliente($id_cliente)
    {
        
        $query = DB::select('SELECT * FROM clientes where clientes.id_cliente='.$id_cliente);    
        return $id_sucursal_cliente = $query[0]->id_sucursal;
    }
    
    public function mostrar_ventas_realizadas()
    {
        $ventas=DB::select("select venta.id_venta,
	   usuario.nombre_completo as vendedor,
	   sucursal.sucursal,
	   clientes.nombre_completo as cliente,
       clientes.telefono,
       clientes.correo_electronico,
       venta.total_venta,
       metodo_pago.metodo_pago,
       venta.fecha_venta,
       venta.factura 
       FROM venta 
       INNER join usuario on usuario.id_usuario=venta.id_usuario and usuario.id_sucursal=venta.id_sucursal_usuario 
       INNER JOIN sucursal on sucursal.id_sucursal=venta.id_sucursal INNER JOIN clientes on venta.id_cliente=clientes.id_cliente and venta.id_sucursal_cliente=clientes.id_sucursal inner join metodo_pago on venta.id_metodo_pago=metodo_pago.id_metodo_pago order by venta.fecha_venta desc
       ");
        
         $detalles=DB::select("SELECT productos_llantimax.id_productos_llantimax, productos_llantimax.nombre, cantidad_producto, precio_unidad, total,detalle_venta.id_venta FROM detalle_venta INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=detalle_venta.id_producto");
        $sucursal_usuario= Session::get('sucursal_usuario');
		return view('/Administrador/ventas/index',compact('ventas','detalles','sucursal_usuario'));
    }
    
    
        public function mostrar_ventas_realizadas_sucursal()
        {
            $id_sucursal=Session::get('id_sucursal_usuario');
            $ventas=DB::select("select venta.id_venta,
           usuario.nombre_completo as vendedor,
           sucursal.sucursal,
           clientes.nombre_completo as cliente,
           clientes.telefono,
           clientes.correo_electronico,
           venta.total_venta,
           metodo_pago.metodo_pago,
           venta.fecha_venta,
           venta.factura 
           FROM venta 
           INNER join usuario on usuario.id_usuario=venta.id_usuario and usuario.id_sucursal=venta.id_sucursal_usuario 
           INNER JOIN sucursal on sucursal.id_sucursal=venta.id_sucursal INNER JOIN clientes on venta.id_cliente=clientes.id_cliente and venta.id_sucursal_cliente=clientes.id_sucursal inner join metodo_pago on venta.id_metodo_pago=metodo_pago.id_metodo_pago where sucursal.id_sucursal=".$id_sucursal." order by venta.fecha_venta desc
           ");

             $detalles=DB::select("SELECT productos_llantimax.id_productos_llantimax, productos_llantimax.nombre, cantidad_producto, precio_unidad, total,detalle_venta.id_venta FROM detalle_venta INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=detalle_venta.id_producto");
            $sucursal_usuario= Session::get('sucursal_usuario');
            return view('/Gerente/ventas/index',compact('ventas','detalles','sucursal_usuario'));
        }

    function mostrar_reportes()
    {
        $reportes="";
        $sucursal_usuario= Session::get('sucursal_usuario');
        return view('/Administrador/ventas/reporte_ventas',compact('reportes','sucursal_usuario'));
    }
    
    function mostrar_reportes_sucursal()
    {
        $reportes="";
        $sucursal_usuario= Session::get('sucursal_usuario');
        return view('/Gerente/ventas/reporte_ventas',compact('reportes','sucursal_usuario'));
    }
    
    function mostrar_reportes_ventas(Request $input)
    {
        $fecha_inicio=$input['fecha_inicio'];
        $fecha_fin=$input['fecha_fin'];
        
        $query=DB::select("SELECT venta.id_sucursal, sucursal.sucursal, SUM(total_venta) as venta FROM venta INNER JOIN sucursal ON sucursal.id_sucursal=venta.id_sucursal WHERE fecha_venta BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."' GROUP BY id_sucursal");
        $json=json_encode($query);
		return response()->json($json);
    }
    
    function mostrar_reportes_ventas_sucursal(Request $input)
    {
        $fecha_inicio=$input['fecha_inicio'];
        $fecha_fin=$input['fecha_fin'];
        $id_sucursal=Session::get('id_sucursal_usuario');
        $query=DB::select("SELECT venta.id_sucursal, sucursal.sucursal, SUM(total_venta) as venta FROM venta INNER JOIN sucursal ON sucursal.id_sucursal=venta.id_sucursal WHERE sucursal.id_sucursal=".$id_sucursal." and fecha_venta BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."' GROUP BY id_sucursal");
        $json=json_encode($query);
		return response()->json($json);
    }
    
    
    
    public function exportar_ticket($ticket)
    {
      $venta=DB::select('select venta.id_venta, usuario.nombre_completo as vendedor, sucursal.sucursal, clientes.nombre_completo as cliente,venta.Auto, clientes.telefono, clientes.correo_electronico, venta.total_venta, metodo_pago.metodo_pago, venta.fecha_venta, venta.factura FROM venta INNER join usuario on usuario.id_usuario=venta.id_usuario and usuario.id_sucursal=venta.id_sucursal_usuario INNER JOIN sucursal on sucursal.id_sucursal=venta.id_sucursal INNER JOIN clientes on venta.id_cliente=clientes.id_cliente and venta.id_sucursal_cliente=clientes.id_sucursal inner join metodo_pago on venta.id_metodo_pago=metodo_pago.id_metodo_pago where venta.id_venta="'.$ticket.'"');
        
       $id_venta = $venta[0]->id_venta;
       $vendedor = $venta[0]->vendedor;
       $sucursal = $venta[0]->sucursal;
       $cliente = $venta[0]->cliente;
        $telefono = $venta[0]->telefono;
        $correo = $venta[0]->correo_electronico;
        $total_venta = $venta[0]->total_venta;
        $metodo_pago = $venta[0]->metodo_pago;
        $fecha_venta = $venta[0]->fecha_venta;
        $auto=$venta[0]->Auto;
        $comentario="";
        $fecha_pago="";
        if($metodo_pago=="crédito(3%+)")
        {
            echo 'Entro';
            
            $credito=DB::select('select * from credito where credito.id_venta="'.$id_venta.'"');
            print_r($credito);
            if(count($credito)>0)
            {
            $comentario=$credito[0]->comentario;
            $fecha_pago=$credito[0]->fecha_ultimo_dia;
            }   
        }
    
      $detalles=DB::select('SELECT productos_llantimax.id_productos_llantimax, productos_llantimax.nombre, cantidad_producto, precio_unidad, total,detalle_venta.id_venta FROM detalle_venta INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=detalle_venta.id_producto where detalle_venta.id_venta="'.$ticket.'"');
        
        $pdf= \PDF::loadView('/documentos/ticket', compact('detalles','id_venta','vendedor','sucursal','cliente','telefono','correo','total_venta','metodo_pago','fecha_venta','auto','comentario','fecha_pago'));
        $pdf->setPaper('A4', 'Portrait');//Portrait  Landscape
        return $pdf->stream('ejemplo.pdf');
        //return view('/documentos/ticket', compact('detalles','id_venta','vendedor','sucursal','cliente','telefono','correo','total_venta','metodo_pago','fecha_venta'));
                
    }
    
    public function exportar_historial_abono($ticket)
    {
        $venta=DB::select('SELECT credito.id_credito, credito.id_venta, usuario.nombre_completo as nombre_usuario,sucursal.sucursal as sucursal_usuario,clientes.nombre_completo as nombre_cliente,clientes.correo_electronico,clientes.telefono,clientes.id_cliente,metodo_pago.metodo_pago, credito.status_credito, credito.comentario, credito.fecha_ultimo_dia, venta.total_venta, venta.fecha_venta, ifnull(SUM(abono_credito.monto),0.0) as monto FROM credito INNER JOIN venta on venta.id_venta=credito.id_venta LEFT JOIN abono_credito ON abono_credito.id_credito=credito.id_credito INNER JOIN usuario on usuario.id_usuario=venta.id_usuario and usuario.id_sucursal=venta.id_sucursal_usuario inner join sucursal on sucursal.id_sucursal=venta.id_sucursal_usuario inner join clientes on clientes.id_cliente=venta.id_cliente inner join metodo_pago on metodo_pago.id_metodo_pago=venta.id_metodo_pago where venta.id_venta="'.$ticket.'"GROUP BY credito.id_credito');

        $id_venta = $venta[0]->id_venta;
        $vendedor = $venta[0]->nombre_usuario;
        $sucursal = $venta[0]->sucursal_usuario;
        $cliente = $venta[0]->nombre_cliente;
        $telefono = $venta[0]->telefono;
        $correo = $venta[0]->correo_electronico;
        $total_venta = $venta[0]->total_venta;
        $metodo_pago = $venta[0]->metodo_pago;
        $fecha_venta = $venta[0]->fecha_venta;
        $credito=$venta[0]->id_credito;

        $detalles=DB::select('SELECT productos_llantimax.id_productos_llantimax, productos_llantimax.nombre, cantidad_producto, precio_unidad, total,detalle_venta.id_venta FROM detalle_venta INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=detalle_venta.id_producto where detalle_venta.id_venta="'.$ticket.'"');
        
        $abonos=DB::select('select abono_credito.id_abono_credito,abono_credito.id_credito,abono_credito.fecha,abono_credito.monto,abono_credito.comentario from credito inner join abono_credito on credito.id_credito=abono_credito.id_credito where credito.id_credito="'.$credito.'"');
        
         $pdf= \PDF::loadView('/documentos/historial_abonos', compact('abonos','detalles','id_venta','vendedor','sucursal','cliente','telefono','correo','total_venta','metodo_pago','fecha_venta','credito'));
        $pdf->setPaper('A4', 'Portrait');//Portrait  Landscape
        return $pdf->stream('ejemplo.pdf');
        //return view('/documentos/historial_abonos', compact('abonos','detalles','id_venta','vendedor','sucursal','cliente','telefono','correo','total_venta','metodo_pago','fecha_venta','credito'));
        
    }
    
    function eliminar_venta(Request $input)
    {
        $id_venta = $input['id_venta'];
        $query=DB::update("DELETE FROM venta where id_venta=?",[$id_venta]);
    }
    
    function imprimir_venta($input)
    {
        $datos=(json_decode($input));
       foreach ($datos as $dato)
       {
           /* echo $id_metodo_pago = $dato->id_metodo_pago;
            echo "<br>";
            echo( $id_cliente = $dato->id_cliente[0]);
           echo "<br>";
            echo $nombre_cliente=$dato->nombre_cliente;
           echo "<br>";
            echo $sucursal_cliente=$dato->sucursal_cliente;
           echo "<br>";
            echo $correo_cliente=$dato->correo_cliente;
           echo "<br>";
            echo $telefono=$dato->telefono;
           echo "<br>";
            print_r( $array_productos=$dato->array_productos);
           echo "<br>";
            echo $auto=$dato->auto;
           echo "<br>";
            echo $total_venta= $dato->total_venta;
           echo "<br>";*/
           
            $id_metodo_pago = $dato->id_metodo_pago;
            $id_cliente = $dato->id_cliente[0];
            $nombre_cliente=$dato->nombre_cliente;
            $sucursal_cliente=$dato->sucursal_cliente;
            $correo_cliente=$dato->correo_cliente;
            $telefono=$dato->telefono;
            $array_productos=$dato->array_productos;
            $auto=$dato->auto;
            $total_venta= $dato->total_venta;
       }
        
        $id_venta = VentasController::generar_folio();
        $fecha_venta= VentasController::obtener_fecha_actual();
        $nombre_mp=VentasController::obtener_nombre_metodo_pago($id_metodo_pago);
        $pdf= \PDF::loadView('/documentos/cotizacion', compact('id_venta','id_metodo_pago','fecha_venta','sucursal_cliente','nombre_cliente','telefono','correo_cliente','total_venta','nombre_mp','fecha_venta','array_productos','auto'));
        $pdf->setPaper('A4', 'Portrait');//Portrait  Landscape
        return $pdf->stream('ejemplo.pdf');
         //return view('/documentos/cotizacion', compact('id_venta','id_metodo_pago','fecha_venta','sucursal_cliente','nombre_cliente','telefono','correo_cliente','total_venta','nombre_mp','fecha_venta','array_productos','auto'));
    }
    
    function obtener_nombre_metodo_pago($id_metodo)
    {
        $consulta=DB::select('select * from metodo_pago where metodo_pago.id_metodo_pago='.$id_metodo);
        return $consulta[0]->metodo_pago;
    }
    
    function exportar_pedido_proveedor($ticket)
    {
        
        $pedidos_detalles=DB::select('select detalle_pedido_proveedor.id_pedido_proveedor,
	                                  usuario.nombre_completo, 
                                      s2.sucursal as sucursal_usuario,
                                      s1.sucursal as sucursal_pedido,
                                      detalle_pedido_proveedor.total,
                                      detalle_pedido_proveedor.cantidad,
                                      detalle_pedido_proveedor.precio_unidad,
                                      productos_llantimax.nombre,
                                      proveedores.nombre_contacto,
                                      proveedores.nombre_empresa,
                                      proveedores.telefono,
                                      proveedores.direccion,
                                      proveedores.correo_electronico,
                                      pedido_proveedor.fecha_venta
                                      FROM detalle_pedido_proveedor 
                                      INNER JOIN pedido_proveedor on pedido_proveedor.id_pedido=detalle_pedido_proveedor.id_pedido_proveedor and detalle_pedido_proveedor.id_usuario=pedido_proveedor.id_usuario and detalle_pedido_proveedor.id_usuario_sucursal=pedido_proveedor.id_sucursal_usuario and pedido_proveedor.id_sucursal=detalle_pedido_proveedor.id_sucursal 
                                      INNER JOIN catalogo on detalle_pedido_proveedor.id_producto=catalogo.id_producto and detalle_pedido_proveedor.id_catalogo=catalogo.id_catalogo 
                                      INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=catalogo.id_producto 
                                      INNER JOIN proveedores on proveedores.id_proveedor=catalogo.id_proveedor 
                                      INNER JOIN usuario on pedido_proveedor.id_usuario=usuario.id_usuario and pedido_proveedor.id_sucursal_usuario=usuario.id_sucursal
                                      INNER JOIN sucursal s1 on s1.id_sucursal=pedido_proveedor.id_sucursal
                                      INNER JOIN sucursal s2 on s2.id_sucursal=pedido_proveedor.id_sucursal_usuario
where pedido_proveedor.id_pedido="'.$ticket.'"');
        $nombre_usuario=$pedidos_detalles[0]->nombre_completo;
        $sucursal_usuario=$pedidos_detalles[0]->sucursal_usuario;
        $fecha_venta=$pedidos_detalles[0]->fecha_venta;
        $total_venta=0;
        foreach($pedidos_detalles as $detalle)
        {
            $total_venta+=intval($detalle->total);
        }
        
        $pdf= \PDF::loadView('/documentos/pedido_proveedor', compact('ticket','nombre_usuario','sucursal_usuario','fecha_venta','pedidos_detalles','total_venta'));
        $pdf->setPaper('A4', 'Portrait');//Portrait  Landscape
        return $pdf->stream('ejemplo.pdf');
        //return view('/documentos/pedido_proveedor', //compact('ticket','nombre_usuario','sucursal_usuario','fecha_venta','pedidos_detalles','total_venta'));
    }
    
    function exportar_pedido_sucursal($ticket)
    {   
         $pedidos_solicitados=DB::select('select pedido.id_pedido,
        suc_destino.id_sucursal as id_sucursal_destino,
        suc_destino.sucursal as sucursal_destino,pedido.fecha,
        suc_origen.id_sucursal as id_sucursal_origen,suc_origen.sucursal as sucursal_origen,status.id_status,status.status,usu_origen.id_usuario as id_usuario_origen, usu_origen.nombre_completo as nombre_usuario_origen,usu_destino.id_usuario as id_usuario_destino,usu_destino.nombre_completo as nombre_usuario_destino,sucu_usu_destino.id_sucursal as id_sucursal_usuario_destino,sucu_usu_destino.sucursal as nombre_sucursal_usuario_destino, sucu_usu_origen.id_sucursal as id_sucursal_usuario_origen, sucu_usu_origen.sucursal as nombre_sucursal_usuario_origen  from pedido inner join status on status.id_status=pedido.id_status inner join sucursal suc_origen on suc_origen.id_sucursal=pedido.id_origen inner join sucursal suc_destino on suc_destino.id_sucursal=pedido.id_destino inner join usuario usu_origen on usu_origen.id_usuario=pedido.id_usuario_distribuidor and usu_origen.id_sucursal=pedido.id_sucursal_origen inner join usuario usu_destino on usu_destino.id_usuario=pedido.id_usuario_solicitante and usu_destino.id_sucursal=pedido.id_sucursal_destino inner join sucursal sucu_usu_destino on sucu_usu_destino.id_sucursal=usu_destino.id_sucursal Inner join sucursal sucu_usu_origen on sucu_usu_origen.id_sucursal=usu_origen.id_sucursal where pedido.id_pedido="'.$ticket.'" order by pedido.fecha desc');
        $fecha_pedido=$pedidos_solicitados[0]->fecha;
        $nombre_solicitante=$pedidos_solicitados[0]->nombre_usuario_destino;
        $sucursal_solicitante=$pedidos_solicitados[0]->nombre_sucursal_usuario_destino;
        $nombre_distribuido=$pedidos_solicitados[0]->nombre_usuario_origen;
        $sucursal_distribuidor=$pedidos_solicitados[0]->nombre_sucursal_usuario_origen;
        
         $historial_pedidos=DB::select('select * from historial_pedido inner join status on status.id_status=historial_pedido.id_status where historial_pedido.id_pedido="'.$ticket.'"');
        $detalles_pedido_sucursal=DB::select('SELECT detalle_pedido.id_pedido, detalle_pedido.id_producto, productos_llantimax.nombre, detalle_pedido.cantidad, detalle_pedido.descripcion FROM detalle_pedido INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=detalle_pedido.id_producto where detalle_pedido.id_pedido="'.$ticket.'"');
        
        $pdf= \PDF::loadView('/documentos/pedido_sucursal', compact('ticket','fecha_pedido','nombre_solicitante','sucursal_solicitante','nombre_distribuido','sucursal_distribuidor','historial_pedidos','detalles_pedido_sucursal'));
        $pdf->setPaper('A4', 'Portrait');//Portrait  Landscape
        return $pdf->stream('ejemplo.pdf');
        //return view('/documentos/pedido_sucursal', compact('ticket','fecha_pedido','nombre_solicitante','sucursal_solicitante','nombre_distribuido','sucursal_distribuidor','historial_pedidos','detalles_pedido_sucursal'));
        
    }
}
