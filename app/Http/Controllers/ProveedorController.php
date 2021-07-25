<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Database\Connection;
use App\Http\Controllers\BateriasController;
use DB;
class ProveedorController extends Controller
{
    public function mostrar_proveedor ()
    {
        $proveedores=DB::select('select proveedores.id_proveedor, rol_proveedor.rol_proveedor, proveedores.nombre_empresa,proveedores.telefono,proveedores.direccion,proveedores.nombre_contacto,proveedores.correo_electronico,IFNULL(sucursal.sucursal, "Proveedor general") as sucursal, ifnull(proveedores.id_sucursal,"0") as id_sucursal from proveedores inner join rol_proveedor on proveedores.id_rol_proveedor=rol_proveedor.id_rol_proveedor left join sucursal on sucursal.id_sucursal=proveedores.id_sucursal');
        $sucursal_usuario= Session::get('sucursal_usuario');
        $catalogos=DB::select('SELECT catalogo.id_catalogo, catalogo.id_producto, productos_llantimax.nombre, catalogo.id_proveedor,proveedores.nombre_contacto, proveedores.nombre_empresa,proveedores.telefono, catalogo.precio_compra from catalogo INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=catalogo.id_producto INNER JOIN proveedores on proveedores.id_proveedor=catalogo.id_proveedor ORDER BY catalogo.id_catalogo');
		return view('/Administrador/proveedor/index',compact('proveedores','sucursal_usuario','catalogos'));
    }
    
    public function mostrar_pedido_proveedor_sucursal()
    {
        $id_sucursal=Session::get('id_sucursal_usuario');
        $proveedores=DB::select('select proveedores.id_proveedor, rol_proveedor.rol_proveedor, proveedores.nombre_empresa,proveedores.telefono,proveedores.direccion,proveedores.nombre_contacto,proveedores.correo_electronico,IFNULL(sucursal.sucursal, "Proveedor general") as sucursal, ifnull(proveedores.id_sucursal,"0") as id_sucursal from proveedores inner join rol_proveedor on proveedores.id_rol_proveedor=rol_proveedor.id_rol_proveedor left join sucursal on sucursal.id_sucursal=proveedores.id_sucursal where proveedores.id_sucursal IS null or proveedores.id_sucursal='.$id_sucursal);
        $sucursal_usuario= Session::get('sucursal_usuario');
        $catalogos=DB::select('SELECT catalogo.id_catalogo, catalogo.id_producto, productos_llantimax.nombre, catalogo.id_proveedor,proveedores.nombre_contacto, proveedores.nombre_empresa,proveedores.telefono, catalogo.precio_compra from catalogo INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=catalogo.id_producto INNER JOIN proveedores on proveedores.id_proveedor=catalogo.id_proveedor ORDER BY catalogo.id_catalogo');
		return view('/Gerente/proveedor/index',compact('proveedores','sucursal_usuario','catalogos'));
    }
    
    
    public function agregar_proveedor(Request $input)
	{
        $nombre_contacto = $input['nombre_contacto'];
        $sucursal = $input['sucursal'];
        $nombre_empresa = $input['nombre_empresa'];
        $telefono = $input['telefono'];
        $direccion=$input['direccion'];
        $correo=$input['correo'];
        
        if(intval($sucursal)==0)
        {
            $id_rol_proveedor=1;
             $query3=DB::insert('insert into proveedores(id_proveedor, id_sucursal, id_rol_proveedor, nombre_empresa, telefono, direccion, nombre_contacto, correo_electronico) values( ?, ?, ?, ?, ?, ?, ?, ?)', [null, null, $id_rol_proveedor,$nombre_empresa,$telefono,$direccion,$nombre_contacto,$correo]);
            
        }
        else
        {
            $id_rol_proveedor=2;
            $query3=DB::insert('insert into proveedores(id_proveedor, id_sucursal, id_rol_proveedor, nombre_empresa, telefono, direccion, nombre_contacto, correo_electronico) values( ?, ?, ?, ?, ?, ?, ?, ?)', [null, $sucursal, $id_rol_proveedor,$nombre_empresa,$telefono,$direccion,$nombre_contacto,$correo]);
        }
         return redirect()->action('ProveedorController@mostrar_proveedor')->withInput();
    }
    
    
     public function agregar_proveedores_sucursal(Request $input)
	{
        $nombre_contacto = $input['nombre_contacto'];
        $sucursal = Session::get('id_sucursal_usuario');
        $nombre_empresa = $input['nombre_empresa'];
        $telefono = $input['telefono'];
        $direccion=$input['direccion'];
        $correo=$input['correo'];
        

            $id_rol_proveedor=2;
            $query3=DB::insert('insert into proveedores(id_proveedor, id_sucursal, id_rol_proveedor, nombre_empresa, telefono, direccion, nombre_contacto, correo_electronico) values( ?, ?, ?, ?, ?, ?, ?, ?)', [null, $sucursal, $id_rol_proveedor,$nombre_empresa,$telefono,$direccion,$nombre_contacto,$correo]);
        
         return redirect()->action('ProveedorController@mostrar_proveedor')->withInput();
    }
    
    
    public function actualizar_proveedor(Request $input)
    {
        $nombre_contacto = $input['update_nombre'];
        $sucursal = $input['update_sucursal'];
        $nombre_empresa = $input['update_empresa'];
        $telefono = $input['update_telefono'];
        $direccion=$input['update_direccion'];
        $correo=$input['update_correo'];
        $id_proveedor=$input['update_id_proveedor'];
                
        if(intval($sucursal)==0)
        {
            $id_rol_proveedor=1;
             //$query3=DB::insert('insert into proveedores(id_proveedor, id_sucursal, id_rol_proveedor, nombre_empresa, telefono, direccion, nombre_contacto, correo_electronico) values( ?, ?, ?, ?, ?, ?, ?, ?)', [null, null, $id_rol_proveedor,$nombre_empresa,$telefono,$direccion,$nombre_contacto,$correo]);
            //UPDATE `proveedores` SET `id_proveedor`=[value-1],`id_sucursal`=[value-2],`id_rol_proveedor`=[value-3],`nombre_empresa`=[value-4],`telefono`=[value-5],`direccion`=[value-6],`nombre_contacto`=[value-7],`correo_electronico`=[value-8] WHERE 1
            
             $ingresar=DB::update('update proveedores set nombre_contacto="'.$nombre_contacto.'", id_sucursal="'.$sucursal.'", id_rol_proveedor="'.$id_rol_proveedor.'",nombre_empresa="'.$nombre_empresa.'", telefono="'.$telefono.'", correo_electronico="'.$correo.'", direccion="'.$direccion.'" where proveedores.id_proveedor=?',[$id_proveedor]);
        }
        else
        {
            $id_rol_proveedor=2;
            //$query3=DB::insert('insert into proveedores(id_proveedor, id_sucursal, id_rol_proveedor, nombre_empresa, telefono, direccion, nombre_contacto, correo_electronico) values( ?, ?, ?, ?, ?, ?, ?, ?)', [null, $sucursal, $id_rol_proveedor,$nombre_empresa,$telefono,$direccion,$nombre_contacto,$correo]);
            $ingresar=DB::update('update proveedores set nombre_contacto="'.$nombre_contacto.'", id_sucursal="'.$sucursal.'", id_rol_proveedor="'.$id_rol_proveedor.'",nombre_empresa="'.$nombre_empresa.'", telefono="'.$telefono.'", correo_electronico="'.$correo.'", direccion="'.$direccion.'" where proveedores.id_proveedor=?',[$id_proveedor]);
        }
         return redirect()->action('ProveedorController@mostrar_proveedor')->withInput();
        
    }
    
    public function actualizar_proveedor_sucursal(Request $input)
    {
         $nombre_contacto = $input['update_nombre'];
        $sucursal = Session::get('id_sucursal_usuario');
        $nombre_empresa = $input['update_empresa'];
        $telefono = $input['update_telefono'];
        $direccion=$input['update_direccion'];
        $correo=$input['update_correo'];
        $id_proveedor=$input['update_id_proveedor'];
                

            $id_rol_proveedor=2;
            //$query3=DB::insert('insert into proveedores(id_proveedor, id_sucursal, id_rol_proveedor, nombre_empresa, telefono, direccion, nombre_contacto, correo_electronico) values( ?, ?, ?, ?, ?, ?, ?, ?)', [null, $sucursal, $id_rol_proveedor,$nombre_empresa,$telefono,$direccion,$nombre_contacto,$correo]);
            $ingresar=DB::update('update proveedores set nombre_contacto="'.$nombre_contacto.'", id_sucursal="'.$sucursal.'", id_rol_proveedor="'.$id_rol_proveedor.'",nombre_empresa="'.$nombre_empresa.'", telefono="'.$telefono.'", correo_electronico="'.$correo.'", direccion="'.$direccion.'" where proveedores.id_proveedor=?',[$id_proveedor]);
        
         return redirect()->action('ProveedorController@mostrar_proveedor')->withInput();
    }
    
    
    public function eliminar_Proveedor(Request $input)
	{
        $id_proveedor = $input['id_proveedor'];
        $query=DB::update("DELETE FROM proveedores where id_proveedor=?",[$id_proveedor]);
        
    }
    
    public function eliminar_catalogo(Request $input)
    {
        $id_proveedor = $input['id_proveedor'];
        $id_catalogo = $input['id_catalogo'];
        $id_producto = $input['id_producto'];
        
        $query=DB::update("DELETE FROM catalogo WHERE catalogo.id_catalogo = ? and catalogo.id_producto = ? and catalogo.id_proveedor = ?",[$id_catalogo,$id_producto,$id_proveedor]);
        
    }

}
