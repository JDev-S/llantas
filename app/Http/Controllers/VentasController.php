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
        $fecha_venta= VentasController::obtener_fecha_actual();
        
        return view('/Administrador/ventas/agregar');
    }
    
    
      /*MÉTODO PARA INSERTAR EN VENTA Y DETALLE DE LA VENTA*/
    public function insertar_venta(Request $input)
	{
        /*RECUPERAR DATOS PARA LA VENTA*/
        $id_usuario = session('id_usuario');//session
        $id_sucursal_usuario = session('id_sucursal_usuario');//session
        $id_sucursal =$input['id_sucursal'];
       
        $id_cliente = $input ['id_cliente'];
        $id_metodo_pago = $input ['id_metodo_pago'];
        $total_venta = $input ['total_venta'];
        $factura = $input['factura'];
        $array_productos=$input['array_productos'];
        $comentario_credito=$input['descripcion'];
        $fecha_ultimo_dia=$input['fecha'];
       $auto=$input['auto'];
     
        //$array_lista_productos = VentasController::array_productos($array_productos);
       
       //foreach($array_productos as $producto){
           
         //  echo $producto['id_producto'];
           //var_dump ($producto);
    //   }
        $id_sucursal_cliente = VentasController::obtener_sucursal_cliente($id_cliente);
                
        /*DATOS DE LOS PRODUCTOS*/
        /*$array_productos = array(
           array(
               "id_producto" => 1,
                "cantidad_producto" => 5,
                "total" => 500,
                "precio_unidad" => 50,
           ),
           array(
               "id_producto" => 2,
                "cantidad_producto" => 5,
                "total" => 500,
                "precio_unidad" => 50,
           ),
           array(
               "id_producto" => 3,
                "cantidad_producto" => 5,
                "total" => 500,
                "precio_unidad" => 50,
           ),
           array(
               "id_producto" => 4,
                "cantidad_producto" => 5,
                "total" => 500,
                "precio_unidad" => 50,
           )
       ); */
       
        /*OBTENER FECHA ACTUAL*/ 
        $fecha_venta= VentasController::obtener_fecha_actual();
       
        /*GENERAR FOLIO DE VENTA*/
        $id_venta = VentasController::generar_folio();
        
        /*INICIAR TRANSACCIÓN*/
       DB::beginTransaction();
        try{
            /*GENERAR VENTA*/
            if($id_metodo_pago==3)
            {
                echo 'total_venta '.$total_venta;
                $total_final=intval($total_venta)*0.03;
                $total_venta=intval($total_venta)+$total_final;
            }
            //echo 'total_venta_final : '.$total_venta."    30%mas    ".$total_final;
            
            
            $ingresar = DB::insert('INSERT INTO venta(id_venta, id_usuario, id_sucursal_usuario, id_sucursal, id_cliente, id_sucursal_cliente, id_metodo_pago, total_venta, fecha_venta, factura,auto) VALUES(?,?,?,?,?,?,?,?,?,?,?)', [$id_venta, $id_usuario, $id_sucursal_usuario, $id_sucursal, $id_cliente, $id_sucursal_cliente, $id_metodo_pago, $total_venta, $fecha_venta, $factura,$auto]);
       
            /*INSERTAR DETALLE DE LA VENTA*/
            foreach($array_productos as $propiedad){
                $ingresar = DB::insert('INSERT INTO detalle_venta (id_venta, id_usuario, id_sucursal_usuario, id_sucursal, id_producto, cantidad_producto, total, precio_unidad) VALUES (?,?,?,?,?,?,?,?)', [$id_venta, $id_usuario, $id_sucursal_usuario, $id_sucursal, $propiedad['id_producto'], $propiedad['cantidad_producto'] , $propiedad['total'] , $propiedad['precio_unidad']]);
                
                
                /*VERIFICAR SI SE TRATA DE UN SERVICIO O NO Y SER DESCONTADO DEL INVENTARIO*/
                $contador=DB::select("select COUNT(*) as contador from servicio_cliente WHERE id_servicio='".$propiedad['id_producto']."'");
                echo $contador[0]->contador;
                if($contador[0]->contador==0)
                {
                    echo 'Entro al if';
                    $cantidad_inventario = DB:: select("select cantidad  from inventario where id_producto='".$propiedad['id_producto']."' and id_sucursal='".$propiedad['id_sucursal']."'");
                
                    $cantidad=$cantidad_inventario[0]->cantidad;
                    $cantidad_final =intval($cantidad)- intval($propiedad['cantidad_producto']);
                    $actualizar = DB::update('UPDATE inventario SET cantidad='.$cantidad_final.' WHERE id_producto=? AND id_sucursal=?', [$propiedad['id_producto'],$propiedad['id_sucursal']]);    
                }
                echo 'No entro al if';
                
            }
            if($id_metodo_pago==3)
            {
                $id_credito=VentasController::generar_folio_credito();
                $ingresar=DB::insert('INSERT INTO credito(id_credito, id_venta, id_usuario, id_sucursal_usuario, id_sucursal, status_credito, comentario, fecha_ultimo_dia) 
                VALUES (?,?,?,?,?,?,?,?)', [$id_credito,$id_venta,$id_usuario,$id_sucursal_usuario,$id_sucursal,"No liquidado",$comentario_credito,$fecha_ultimo_dia]);
                
                
            }
            echo 'Venta realizada';
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
        $id_credito = $id_usuario."".$id_usuario."".$id_venta."".VentasController::generar_cadena_aleatoria_credito();
        
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
        $consulta = DB::select('SELECT * FROM clientes where clientes.id_cliente='.$id_cliente);    
        return $id_sucursal_cliente = $consulta[0]->id_sucursal;
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
       INNER JOIN sucursal on sucursal.id_sucursal=venta.id_sucursal INNER JOIN clientes on venta.id_cliente=clientes.id_cliente and venta.id_sucursal_cliente=clientes.id_sucursal inner join metodo_pago on venta.id_metodo_pago=metodo_pago.id_metodo_pago
       ");
        
         $detalles=DB::select("SELECT productos_llantimax.id_productos_llantimax, productos_llantimax.nombre, cantidad_producto, precio_unidad, total,detalle_venta.id_venta FROM detalle_venta INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=detalle_venta.id_producto");
        $sucursal_usuario= Session::get('sucursal_usuario');
		return view('/Administrador/ventas/index',compact('ventas','detalles','sucursal_usuario'));
    }
    
   /* function array_productos($array_productos)
    {
        $array_lista_productos = array();
        foreach($array_productos as $producto){
            $id_producto = $producto['id_producto'];
            $consulta = DB::select('select productos_servicios.precio as precio from productos_llantimax inner join productos_servicios on productos_llantimax.id_productos_llantimax=productos_servicios.id_producto_servicio where productos_llantimax.id_productos_llantimax='.$id_producto.
            ' union select productos_independientes.precio as precio from productos_llantimax inner join productos_independientes on productos_llantimax.id_productos_llantimax=productos_independientes.id_producto_independiente where productos_llantimax.id_productos_llantimax='.$id_producto
            );
            
            $id_producto = $producto['id_producto'];
            $cantidad = $producto['cantidad_producto'];
            $precio = $consulta[0]->precio;
            $this->total_venta=$this->total_venta+$precio;
            $totalin=(int)$precio* (int)$cantidad;
            
            echo ' '.$totalin.' ';
           
            $array_lista_productos.array_push(array("id_producto" => $producto['id_producto'],
                                              "cantidad_producto" => $producto['cantidad_producto'],
                                              "precio_unidad" => $consulta[0]->precio,
                                              "total" => $totalin
                                             ));
        }
         die();
        //return $array_lista_productos;
    }*/
    
    function mostrar_reportes()
    {
        $reportes="";
        $sucursal_usuario= Session::get('sucursal_usuario');
        return view('/Administrador/ventas/reporte_ventas',compact('reportes','sucursal_usuario'));
    }
    
    function mostrar_reportes_ventas(Request $input)
    {
        $fecha_inicio=$input['fecha_inicio'];
        $fecha_fin=$input['fecha_fin'];
        
        $query=DB::select("SELECT venta.id_sucursal, sucursal.sucursal, SUM(total_venta) as venta FROM venta INNER JOIN sucursal ON sucursal.id_sucursal=venta.id_sucursal WHERE fecha_venta BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."' GROUP BY id_sucursal");
        $json=json_encode($query);
		return response()->json($json);
    }
    

    
    public function exportar_ticket($ticket)
    {
      $venta=DB::select('select venta.id_venta, usuario.nombre_completo as vendedor, sucursal.sucursal, clientes.nombre_completo as cliente, clientes.telefono, clientes.correo_electronico, venta.total_venta, metodo_pago.metodo_pago, venta.fecha_venta, venta.factura FROM venta INNER join usuario on usuario.id_usuario=venta.id_usuario and usuario.id_sucursal=venta.id_sucursal_usuario INNER JOIN sucursal on sucursal.id_sucursal=venta.id_sucursal INNER JOIN clientes on venta.id_cliente=clientes.id_cliente and venta.id_sucursal_cliente=clientes.id_sucursal inner join metodo_pago on venta.id_metodo_pago=metodo_pago.id_metodo_pago where venta.id_venta="'.$ticket.'"');
        
       $id_venta = $venta[0]->id_venta;
       $vendedor = $venta[0]->vendedor;
       $sucursal = $venta[0]->sucursal;
       $cliente = $venta[0]->cliente;
        $telefono = $venta[0]->telefono;
        $correo = $venta[0]->correo_electronico;
        $total_venta = $venta[0]->total_venta;
        $metodo_pago = $venta[0]->metodo_pago;
        $fecha_venta = $venta[0]->fecha_venta;
        
      $detalles=DB::select('SELECT productos_llantimax.id_productos_llantimax, productos_llantimax.nombre, cantidad_producto, precio_unidad, total,detalle_venta.id_venta FROM detalle_venta INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=detalle_venta.id_producto where detalle_venta.id_venta="'.$ticket.'"');
        
        $pdf= \PDF::loadView('/documentos/ticket', compact('detalles','id_venta','vendedor','sucursal','cliente','telefono','correo','total_venta','metodo_pago','fecha_venta'));
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
}
