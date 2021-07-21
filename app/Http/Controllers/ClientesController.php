<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Database\Connection;
use DB;
class ClientesController extends Controller
{
  
     public function mostrar_clientes ()
    {
         
        $clientes=DB::select('select clientes.id_cliente as id_cliente, clientes.fecha_registro as fecha, clientes.nombre_completo as nombre_completo, clientes.telefono as telefono,clientes.correo_electronico as correo,sucursal.sucursal as sucursal,clientes.cliente_habitual  from clientes inner join sucursal on sucursal.id_sucursal=clientes.id_sucursal');
        $sucursal_usuario= Session::get('sucursal_usuario');
         
		return view('/Administrador/clientes/index',compact('clientes','sucursal_usuario'));
    }
    
    public function mostrar_clientes_sucursal ()
    {
        $id_sucursal=Session::get('id_sucursal_usuario');
        $clientes=DB::select('select clientes.id_cliente as id_cliente, clientes.fecha_registro as fecha, clientes.nombre_completo as nombre_completo, clientes.telefono as telefono,clientes.correo_electronico as correo,sucursal.sucursal as sucursal,clientes.cliente_habitual  from clientes inner join sucursal on sucursal.id_sucursal=clientes.id_sucursal where sucursal.id_sucursal='.$id_sucursal);
        $sucursal_usuario= Session::get('sucursal_usuario');
         
		return view('/Gerente/clientes/index',compact('clientes','sucursal_usuario'));
    }
    
    // $query3=DB::insert('insert into imagenes_color (id_imagen_color, id_alimento, imagen_color) values( ?, ?, ?)', [null, $id_alimento, $imagen2]);
    
    
    public function agregar_cliente(Request $input)
	{
        $nombre_cliente = $input['nombre'];
        $telefono = $input['telefono'];
        $correo = $input['correo'];
        $sucursal = $input['sucursal'];
        $cliente_habitual=$input['habitual'];
        
        $dia=date("d");
        $mes=date("m");
        $anio=date("Y");
        $fecha=$anio.'-'.$mes.'-'.$dia;
            
   //echo $fecha.' '.$nombre_cliente.' '.$telefono.' '.$correo.' '.$sucursal.' '.$cliente_habitual;
        
        $ingresar=DB::insert('insert into clientes (id_cliente, fecha_registro, nombre_completo, telefono,correo_electronico, id_sucursal, cliente_habitual) values( ?, ?, ?, ?, ?, ?, ?)', [null,$fecha,$nombre_cliente, $telefono, $correo, $sucursal, $cliente_habitual]);
        
        //INSERT INTO clientes(id_cliente, fecha_registro, nombre_completo, telefono,correo_electronico, id_sucursal, cliente_habitual) VALUES (1, '12/04/2021', 'Maximiliano Gabriel', '123456','max@gmail.com',2,1);

        $clientes=DB::select("SELECT clientes.id_cliente,clientes.nombre_completo,clientes.telefono,clientes.correo_electronico,clientes.id_sucursal,sucursal.sucursal from clientes inner join sucursal on sucursal.id_sucursal=clientes.id_sucursal WHERE clientes.nombre_completo='".$nombre_cliente."' or clientes.correo_electronico='".$correo."' or clientes.telefono='".$telefono."'");
        $json=json_encode($clientes);
		return response()->json($json);
      }
    
        public function agregar_cliente_sucursal(Request $input)
	   {
        $nombre_cliente = $input['nombre'];
        $telefono = $input['telefono'];
        $correo = $input['correo'];
        $sucursal = Session::get('id_sucursal_usuario');
        $cliente_habitual=$input['habitual'];
        
        $dia=date("d");
        $mes=date("m");
        $anio=date("Y");
        $fecha=$anio.'-'.$mes.'-'.$dia;
            
   //echo $fecha.' '.$nombre_cliente.' '.$telefono.' '.$correo.' '.$sucursal.' '.$cliente_habitual;
        
        $ingresar=DB::insert('insert into clientes (id_cliente, fecha_registro, nombre_completo, telefono,correo_electronico, id_sucursal, cliente_habitual) values( ?, ?, ?, ?, ?, ?, ?)', [null,$fecha,$nombre_cliente, $telefono, $correo, $sucursal, $cliente_habitual]);
        
        //INSERT INTO clientes(id_cliente, fecha_registro, nombre_completo, telefono,correo_electronico, id_sucursal, cliente_habitual) VALUES (1, '12/04/2021', 'Maximiliano Gabriel', '123456','max@gmail.com',2,1);

        $clientes=DB::select("SELECT clientes.id_cliente,clientes.nombre_completo,clientes.telefono,clientes.correo_electronico,clientes.id_sucursal,sucursal.sucursal from clientes inner join sucursal on sucursal.id_sucursal=clientes.id_sucursal WHERE clientes.nombre_completo='".$nombre_cliente."' or clientes.correo_electronico='".$correo."' or clientes.telefono='".$telefono."'");
        $json=json_encode($clientes);
		return response()->json($json);
      }
    
    public function eliminar_Cliente(Request $input)
	{
        $id_cliente = $input['id_cliente'];
        $query=DB::update("DELETE FROM clientes where id_cliente=?",[$id_cliente]);
        
    }
    
    public function actualizar_cliente(Request $input)
	{
        $nombre_cliente = $input['update_nombre'];
        $telefono = $input['update_telefono'];
        $correo = $input['update_correo'];
        $sucursal = $input['update_sucursal'];
        $cliente_habitual=$input['update_habitual'];
        $id_cliente=$input['update_id_cliente'];
        
        //$query=DB::update("update categoria set nombre_categoria='$nombre_categoria', eliminado='$eliminado' where id_categoria=?",[$id_categoria]);
        
        $ingresar=DB::update('update clientes set nombre_completo="'.$nombre_cliente.'", telefono="'.$telefono.'", correo_electronico="'.$correo.'", id_sucursal="'.$sucursal.'", cliente_habitual="'.$cliente_habitual.'" where clientes.id_cliente=?',[$id_cliente]);
                
      }
    
     public function actualizar_cliente_sucursal(Request $input)
	{
        $nombre_cliente = $input['update_nombre'];
        $telefono = $input['update_telefono'];
        $correo = $input['update_correo'];
        $sucursal = Session::get('id_sucursal_usuario');
        $cliente_habitual=$input['update_habitual'];
        $id_cliente=$input['update_id_cliente'];
        
        //$query=DB::update("update categoria set nombre_categoria='$nombre_categoria', eliminado='$eliminado' where id_categoria=?",[$id_categoria]);
        
        $ingresar=DB::update('update clientes set nombre_completo="'.$nombre_cliente.'", telefono="'.$telefono.'", correo_electronico="'.$correo.'", id_sucursal="'.$sucursal.'", cliente_habitual="'.$cliente_habitual.'" where clientes.id_cliente=?',[$id_cliente]);
                
      }
    
    
    
}
