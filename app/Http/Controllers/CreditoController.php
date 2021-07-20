<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Connection;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
class CreditoController extends Controller
{
    
    public function mostrar_creditos()
    {
        $creditos=DB::select("SELECT credito.id_credito, credito.id_venta, usuario.nombre_completo as nombre_usuario,sucursal.sucursal as sucursal_usuario,clientes.nombre_completo as nombre_cliente,clientes.correo_electronico,clientes.telefono,clientes.id_cliente,metodo_pago.metodo_pago, credito.status_credito, credito.comentario, credito.fecha_ultimo_dia, venta.total_venta, venta.fecha_venta, ifnull(SUM(abono_credito.monto),0.0) as monto FROM credito INNER JOIN venta on venta.id_venta=credito.id_venta LEFT JOIN abono_credito ON abono_credito.id_credito=credito.id_credito INNER JOIN usuario on usuario.id_usuario=venta.id_usuario and usuario.id_sucursal=venta.id_sucursal_usuario inner join sucursal on sucursal.id_sucursal=venta.id_sucursal_usuario inner join clientes on clientes.id_cliente=venta.id_cliente inner join metodo_pago on metodo_pago.id_metodo_pago=venta.id_metodo_pago GROUP BY credito.id_credito order by venta.fecha_venta desc");
        
         $detalles=DB::select("SELECT productos_llantimax.id_productos_llantimax, productos_llantimax.nombre, cantidad_producto, precio_unidad, total,detalle_venta.id_venta FROM detalle_venta INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=detalle_venta.id_producto");
        
        $abonos=DB::select("select abono_credito.id_abono_credito,abono_credito.id_credito,abono_credito.fecha,abono_credito.monto,abono_credito.comentario from credito inner join abono_credito on credito.id_credito=abono_credito.id_credito order by abono_credito.fecha desc");
        $sucursal_usuario= Session::get('sucursal_usuario');
		return view('/Administrador/credito/index',compact('creditos','detalles','abonos','sucursal_usuario'));
    }
    
    public function agregar_abono(Request $input)
    {
        $id_credito = $input ['id_credito'];
        $id_cliente=$input['id_cliente'];
        $monto = $input ['monto'];
        $comentario = $input ['comentario'];
        
        $fecha_venta= CreditoController::obtener_fecha_actual();
        $id_abono_credito = CreditoController::generar_folio();
        $suma_abonado=CreditoController::obtener_suma_montos($id_credito);
        $total_venta=CreditoController::obtener_total_venta($id_credito);
        $status="";
        /*
        
        SI MONTO A DEBER ES CERO
         SI
            YA LO PAGASTE NO MAMES
         NO{
        1.- VERIFICAR SI EL MONTO INGRESADO ES MAYOR AL MONTO A DEBER
            1.1 SUMAR MONTO A DEBER
            1.2 RECUPERAR MONTO INGRESA
            1.3 SI EL MONTO INGRESADO ES MAYOR AL MONTO A DEBER
                SI
                    LO MANDAS AL CHORI
                NO
                    POS LO INSERTAS
        }
        
        */
        $monto_deber=floatval($total_venta)-floatval($suma_abonado);
         if($monto>$monto_deber)
         {
             $status="Monto ingresado excede el monto a deber";
         }
        else
        {
            $ingresar = DB::insert('INSERT INTO abono_credito(id_abono_credito, id_credito, fecha, monto, comentario) VALUES (?,?,?,?,?)', [$id_abono_credito,$id_credito,$fecha_venta,$monto,$comentario]);   
            $status="Abono realizado";
            $suma_abonado_nuevo=CreditoController::obtener_suma_montos($id_credito);
            $monto_deber_nuevo=floatval($total_venta)-floatval($suma_abonado_nuevo);
            if($monto_deber_nuevo==0)
            {
                $query=DB::select("select id_venta from credito where id_credito='".$id_credito."'");
                $id_venta=$query[0]->id_venta;
                $actualizar = DB::update("UPDATE credito SET status_credito='Liquidado' WHERE id_credito=? AND id_venta=?", [$id_credito,$id_venta]);
            }
            else
            {
                $status=$status." Debe :".$monto_deber_nuevo;
            }
        }
         /*
        
       
        if(intval($suma_abonado)==intval($total_venta))
        {
            
        }
         echo 'Abono realizado';*/
        echo $status;
    }
    
    public function obtener_monto_credito($id_credito)
    {
        
    }
    
    function obtener_fecha_actual()
    {
        $dia=date("d");
        $mes=date("m");
        $anio=date("Y");
        $fecha =$anio.'-'.$mes.'-'.$dia; 
        
        return $fecha;
    }
    
    
     function generar_folio()
    {
        $id_venta = CreditoController::generar_cadena_aleatoria();
        
        return $id_venta;
    }
    
    
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
            $query = DB::select('select count(*) as abonos from abono_credito');    
        } catch(Exception $e){
            echo 'Ha ocurrido un error!';
        }
        $creditos_actuales = $query[0]->abonos;
        
        return ($creditos_actuales+1)."-".$cadena_random;
    }
    
    function obtener_suma_montos($id_credito)
    {
        try{
            $query=DB::select("select sum(monto) as sumado from abono_credito where id_credito='".$id_credito."'");
        }catch(Exception $e){
            echo 'Ha ocurrido un error!';
        }
        $montos=$query[0]->sumado;
        return $montos;
            
    }
    
     function obtener_total_venta($id_credito)
    {
        
        $query=DB::select("select id_venta from credito where id_credito='".$id_credito."'");
        $id_venta=$query[0]->id_venta;
        $query2=DB::select("select total_venta from venta where id_venta='".$id_venta."'");
        $total=$query2[0]->total_venta;
        return $total;
            
    }
    
     public function eliminar_Credito(Request $input)
	{
        $id_credito = $input['id_credito'];
        $query=DB::update("DELETE FROM credito where credito.id_credito=?",[$id_credito]);
        
    }

    public function actualizar_abono(Request $input)
    {
        $comentario=$input['comentario'];
        $id_abono=$input['id_abono'];
        $id_credito=$input['id_credito'];
        $monto=$input['monto'];
        
        
        $ingresar=DB::update('update abono_credito set monto="'.$monto.'", comentario="'.$comentario.'" where abono_credito.id_abono_credito=? and abono_credito.id_credito=? ',[$id_abono,$id_credito]);
        
        $suma_abonado=CreditoController::obtener_suma_montos($id_credito);
        $total_venta=CreditoController::obtener_total_venta($id_credito);
        $monto_deber_nuevo=floatval($total_venta)-floatval($suma_abonado);
            if($monto_deber_nuevo==0)
            {
                $query=DB::select("select id_venta from credito where id_credito='".$id_credito."'");
                $id_venta=$query[0]->id_venta;
                $actualizar = DB::update("UPDATE credito SET status_credito='Liquidado' WHERE id_credito=? AND id_venta=?", [$id_credito,$id_venta]);
            }
            else
            {
                $query=DB::select("select id_venta from credito where id_credito='".$id_credito."'");
                $id_venta=$query[0]->id_venta;
                $actualizar = DB::update("UPDATE credito SET status_credito='No liquidado' WHERE id_credito=? AND id_venta=?", [$id_credito,$id_venta]);
            }
        
        echo "se actualizo monto, Debe:".$monto_deber_nuevo;
    }
}
