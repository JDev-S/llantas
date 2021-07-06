<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Connection;
use DB;
class CatalogoController extends Controller
{
    public function mostrar_formulario()
    {
            return view('/Administrador/proveedor/catalogo/agregar');
    }
    
    public function mostrar_productos_sucursal_catalogo(Request $input)
    {
        $sucursal = $input['sucursal'];
        $aProducto_proveedor = array();
        if(intval($sucursal)!=0)
        {
            $query=DB::select('select id_productos_llantimax, categoria, nombre, marca, modelo from ((SELECT productos_llantimax.id_productos_llantimax, categoria.categoria, productos_llantimax.nombre, marca.marca, producto.modelo    FROM productos_llantimax inner join productos_servicios on productos_servicios.id_producto_servicio=productos_llantimax.id_productos_llantimax inner join producto on producto.id_producto=productos_servicios.id_producto_servicio INNER JOIN categoria on categoria.id_categoria=producto.id_categoria INNER JOIN caracteristica on categoria.id_categoria=caracteristica.id_categoria left join descripcion_categoria_caracteristica on descripcion_categoria_caracteristica.id_producto_descripcion=producto.id_producto and descripcion_categoria_caracteristica.id_categoria=caracteristica.id_categoria and descripcion_categoria_caracteristica.id_caracteristica=caracteristica.id_caracteristica inner join marca on marca.id_marca=producto.id_marca)

        UNION

        (SELECT productos_llantimax.id_productos_llantimax, (select "Refacción") as categoria, productos_llantimax.nombre, productos_independientes.marca, productos_independientes.modelo from productos_llantimax INNER join productos_independientes on productos_llantimax.id_productos_llantimax=productos_independientes.id_producto_independiente))as t1 left join inventario on t1.id_productos_llantimax=inventario.id_producto left join sucursal on sucursal.id_sucursal=inventario.id_sucursal where inventario.id_sucursal='.$sucursal.' ORDER BY t1.id_productos_llantimax');
            
        $query2=DB::select('SELECT * FROM proveedores where id_sucursal='.$sucursal);
        array_push($aProducto_proveedor,$query);
        array_push($aProducto_proveedor,$query2);
        }
        else
        {
            $query=DB::select('select id_productos_llantimax, categoria, nombre, marca, modelo from ((SELECT productos_llantimax.id_productos_llantimax, categoria.categoria, productos_llantimax.nombre, marca.marca, producto.modelo    FROM productos_llantimax inner join productos_servicios on productos_servicios.id_producto_servicio=productos_llantimax.id_productos_llantimax inner join producto on producto.id_producto=productos_servicios.id_producto_servicio INNER JOIN categoria on categoria.id_categoria=producto.id_categoria INNER JOIN caracteristica on categoria.id_categoria=caracteristica.id_categoria left join descripcion_categoria_caracteristica on descripcion_categoria_caracteristica.id_producto_descripcion=producto.id_producto and descripcion_categoria_caracteristica.id_categoria=caracteristica.id_categoria and descripcion_categoria_caracteristica.id_caracteristica=caracteristica.id_caracteristica inner join marca on marca.id_marca=producto.id_marca)

        UNION

        (SELECT productos_llantimax.id_productos_llantimax, (select "Refacción") as categoria, productos_llantimax.nombre, productos_independientes.marca, productos_independientes.modelo from productos_llantimax INNER join productos_independientes on productos_llantimax.id_productos_llantimax=productos_independientes.id_producto_independiente))as t1 left join inventario on t1.id_productos_llantimax=inventario.id_producto left join sucursal on sucursal.id_sucursal=inventario.id_sucursal  ORDER BY t1.id_productos_llantimax');
        $query2=DB::select('SELECT * FROM proveedores where id_sucursal is null');
        array_push($aProducto_proveedor,$query);
        array_push($aProducto_proveedor,$query2);
        }     
        return response()->json($aProducto_proveedor);
    }
    
    
    public function agregar_producto_catalogo(Request $input){
        //$id_producto = $input['id_producto'];
        //$id_proveedor = $input['id_proveedor'];
        //$precio_compra = $input['precio_compra'];
        $array_productos=$input['array_productos'];
        $id_catalogo=CatalogoController::generar_cadena_aleatoria();
        
         try{
             foreach($array_productos as $propiedad){
                $query = DB::insert('INSERT INTO catalogo(id_catalogo, id_producto, id_proveedor, precio_compra) VALUES(?, ?, ?, ?)',[$id_catalogo, $propiedad['id_producto'], $propiedad['id_proveedor'] ,$propiedad['precio']]);   
            }
           
         } catch(Exception $e){
             echo 'Ha ocurrido un error!';
         }
        //return redirect()->action()->('CatalogoController@insertar_catalogo')withInput();
    }
    
    function  generar_cadena_aleatoria($longitud = 8) {
        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud_caracteres = strlen($caracteres_permitidos);
        $cadena_random = '';
        
        for($i = 0; $i < $longitud; $i++) {
            $caracter_random = $caracteres_permitidos[mt_rand(0, $longitud_caracteres - 1)];
            $cadena_random .= $caracter_random;
        }
        
        /*OBTENER EL NÚMERO DE REGISTROS ACTUAL*/
        try{
            $query = DB::select('select count(*) as catalogos from catalogo');    
        } catch(Exception $e){
            echo 'Ha ocurrido un error!';
        }
        $catalogos_actuales = $query[0]->catalogos;
        return ($catalogos_actuales+1).'-'.$cadena_random;
    }
    
    public function mostrar_catalogo ()
    {
        $catalogos=DB::select('SELECT catalogo.id_catalogo, catalogo.id_producto, productos_llantimax.nombre, catalogo.id_proveedor, proveedores.nombre_empresa, catalogo.precio_compra FROM catalogo INNER JOIN productos_llantimax on productos_llantimax.id_productos_llantimax=catalogo.id_producto INNER JOIN proveedores on proveedores.id_proveedor=catalogo.id_proveedor');
        $sucursal_usuario= Session::get('sucursal_usuario');
		//return view('/Administrador/catalogo/index',compact('catalogos','sucursal_usuario'));
    }
    
}
