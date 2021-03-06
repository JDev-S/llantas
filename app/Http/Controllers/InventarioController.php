<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use DB;
class InventarioController extends Controller
{
    public function formato_moneda($valor) 
    {
        if ($valor<0) return "-".formato_moneda(-$valor);
        return '$' . number_format($valor, 2);
    }
    
     public function agregar_inventario(Request $input)
	{
        $producto = $input['producto'];
        $sucursal = $input['sucursal'];
        $cantidad = $input['cantidad'];
        $id_producto="'".$producto."'";
         
        $query=DB::select("select inventario.cantidad from inventario where inventario.id_producto=".$id_producto." and   inventario.id_sucursal=".$sucursal);
         $cantidad_anterior=$query[0]->cantidad;
         echo $producto."    ".$sucursal."   "."   ".$cantidad."   ".$cantidad_anterior;
         echo '<br>';
         $total_cantidad= intval($cantidad)+intval($cantidad_anterior);
        echo $producto."    ".$sucursal."   ".$cantidad_anterior."   ".$total_cantidad;
         
        $query2=DB::update("update  inventario set cantidad='$total_cantidad' where inventario.id_producto=? and inventario.id_sucursal=? ",[$producto,$sucursal]);
      
        
         //return redirect()->action('InventarioController@mostrar_inventarios')->withInput();
      }
    
    public function mostrar_productos_sucursal_inventario(Request $input)
    {
        $sucursal = $input['sucursal'];
        $query=DB::select('select id_productos_llantimax, categoria, nombre, marca, modelo from ((SELECT productos_llantimax.id_productos_llantimax, categoria.categoria, productos_llantimax.nombre, marca.marca, producto.modelo    FROM productos_llantimax inner join productos_servicios on productos_servicios.id_producto_servicio=productos_llantimax.id_productos_llantimax inner join producto on producto.id_producto=productos_servicios.id_producto_servicio INNER JOIN categoria on categoria.id_categoria=producto.id_categoria INNER JOIN caracteristica on categoria.id_categoria=caracteristica.id_categoria left join descripcion_categoria_caracteristica on descripcion_categoria_caracteristica.id_producto_descripcion=producto.id_producto and descripcion_categoria_caracteristica.id_categoria=caracteristica.id_categoria and descripcion_categoria_caracteristica.id_caracteristica=caracteristica.id_caracteristica inner join marca on marca.id_marca=producto.id_marca)

        UNION

        (SELECT productos_llantimax.id_productos_llantimax, (select "Refacci??n") as categoria, productos_llantimax.nombre, productos_independientes.marca, productos_independientes.modelo from productos_llantimax INNER join productos_independientes on productos_llantimax.id_productos_llantimax=productos_independientes.id_producto_independiente))as t1 left join inventario on t1.id_productos_llantimax=inventario.id_producto left join sucursal on sucursal.id_sucursal=inventario.id_sucursal where inventario.id_sucursal='.$sucursal.' ORDER BY t1.categoria');
        return response()->json($query);
    }
    
   
    public function mostrar_inventarios()
     {

         //$aProducto_refaccion = array();
         $id_sucursal=session('id_sucursal_usuario');

        $aProducto_refaccion=DB::select('SELECT productos_llantimax.id_productos_llantimax, (select "Refacci??n") as categoria, productos_llantimax.nombre, productos_independientes.marca, productos_independientes.modelo, productos_independientes.precio, productos_independientes.fotografia_miniatura, (select "Descripci??n") as caracteristica, IFNULL(productos_independientes.descripcion,"") as descripcion,inventario.cantidad,sucursal.sucursal from productos_llantimax INNER join productos_independientes on productos_llantimax.id_productos_llantimax=productos_independientes.id_producto_independiente left join inventario on productos_llantimax.id_productos_llantimax=inventario.id_producto left join sucursal on sucursal.id_sucursal=inventario.id_sucursal  ORDER BY productos_llantimax.id_productos_llantimax and sucursal.id_sucursal');
        
        $aProducto_llantas = InventarioController::mostrar_llantas();
        $aProducto_baterias=InventarioController::mostrar_baterias();
         //print_r($aProducto_llantas);
        
          //echo '<br>';
          //echo '<br>';
          //echo '<br>';
        //die();
         //$aProducto_baterias = InventarioController::agregar_sucursales_bateria($aProducto_bateria);
         $sucursal_usuario= Session::get('sucursal_usuario');

        //print_r($aProducto_baterias);
       
        return view('/Administrador/inventario/index',compact('aProducto_baterias','aProducto_llantas','aProducto_refaccion','sucursal_usuario'));  
     }
    
    
        public function mostrar_inventarios_sucursal()
     {
          $id_sucursal=Session::get('id_sucursal_usuario');
        $aProducto_refaccion=DB::select('SELECT productos_llantimax.id_productos_llantimax, (select "Refacci??n") as categoria, productos_llantimax.nombre, productos_independientes.marca, productos_independientes.modelo, productos_independientes.precio, productos_independientes.fotografia_miniatura, (select "Descripci??n") as caracteristica, IFNULL(productos_independientes.descripcion,"") as descripcion,inventario.cantidad,sucursal.sucursal from productos_llantimax INNER join productos_independientes on productos_llantimax.id_productos_llantimax=productos_independientes.id_producto_independiente left join inventario on productos_llantimax.id_productos_llantimax=inventario.id_producto left join sucursal on sucursal.id_sucursal=inventario.id_sucursal where sucursal.id_sucursal='.$id_sucursal.' ORDER BY productos_llantimax.id_productos_llantimax and sucursal.id_sucursal');


         $aProducto_llantas = InventarioController::mostrar_llantas_2();
         $aProducto_baterias=InventarioController::mostrar_baterias_2();

         $sucursal_usuario= Session::get('sucursal_usuario');

        //print_r($aProducto_baterias);
       
        return view('/Gerente/inventario/index',compact('aProducto_baterias','aProducto_llantas','aProducto_refaccion','sucursal_usuario'));  
     }
    
    public function mostrar_llantas_2()
     {
        $id_sucursal=session('id_sucursal_usuario');
         $aProducto_llanta = array();
        
        $productos = DB::select('select id_productos_llantimax, categoria, nombre, marca, modelo, precio, fotografia_miniatura, caracteristica, descripcion, sucursal, cantidad from ((SELECT productos_llantimax.id_productos_llantimax, categoria.categoria, productos_llantimax.nombre, marca.marca, producto.modelo, productos_servicios.precio, producto.fotografia_miniatura, caracteristica.caracteristica, IFNULL(descripcion_categoria_caracteristica.descripcion, "") as descripcion FROM productos_llantimax inner join productos_servicios on productos_servicios.id_producto_servicio=productos_llantimax.id_productos_llantimax inner join producto on producto.id_producto=productos_servicios.id_producto_servicio INNER JOIN categoria on categoria.id_categoria=producto.id_categoria INNER JOIN caracteristica on categoria.id_categoria=caracteristica.id_categoria left join descripcion_categoria_caracteristica on descripcion_categoria_caracteristica.id_producto_descripcion=producto.id_producto and descripcion_categoria_caracteristica.id_categoria=caracteristica.id_categoria and descripcion_categoria_caracteristica.id_caracteristica=caracteristica.id_caracteristica inner join marca on marca.id_marca=producto.id_marca where categoria.id_categoria=1))as t1 left join inventario on t1.id_productos_llantimax=inventario.id_producto left join sucursal on sucursal.id_sucursal=inventario.id_sucursal where inventario.id_sucursal='.$id_sucursal. ' ORDER BY  t1.id_productos_llantimax');
        
         //var_dump($productos);
         //die();
         
         $oProducto_llanta = new \stdClass();
         
         $auxId_producto = -1;
         $auxCategoria='';
         
         $oProducto_llanta->medida = '';
         $oProducto_llanta->capacidad_carga = '';
         $oProducto_llanta->indice_velocidad = '';
         $oProducto_llanta->numero_rin = '';
         
          foreach($productos as $producto)
          {
               if($producto->id_productos_llantimax!==$auxId_producto && $auxId_producto!==-1)
              {
                   if($auxCategoria=='Llantas')
                   {    
                      
                       array_push($aProducto_llanta,$oProducto_llanta);
                      $oProducto_llanta = new \stdClass();

                      $oProducto_llanta->medida = '';
                      $oProducto_llanta->capacidad_carga = '';
                      $oProducto_llanta->indice_velocidad = '';
                      $oProducto_llanta->numero_rin = '';
                   }
              }
              
              $auxId_producto = $producto->id_productos_llantimax;
              
              if($producto->categoria=='Llantas'){
                  $oProducto_llanta->id_productos_llantimax = $producto->id_productos_llantimax;
                  //$oProducto_llanta->sucursal = $producto->sucursal;
                  $oProducto_llanta->categoria = $producto->categoria;
                  $oProducto_llanta->nombre = $producto->nombre;
                  $oProducto_llanta->marca = $producto->marca;
                  $oProducto_llanta->modelo = $producto->modelo;
                  $oProducto_llanta->precio =  InventarioController::formato_moneda($producto->precio);
                  $oProducto_llanta->cantidad = $producto->cantidad;
                  $oProducto_llanta->fotografia_miniatura = $producto->fotografia_miniatura;
                  $oProducto_llanta->sucursal=$producto->sucursal;
                  $auxCategoria='Llantas';

                  if($producto->caracteristica=='Medida')
                  {
                       $oProducto_llanta->medida = $producto->descripcion;
                  }
                  else
                  {
                      if($producto->caracteristica=='Capacidad de carga')
                      {
                          $oProducto_llanta->capacidad_carga = $producto->descripcion;
                      }
                      else
                      {
                           if($producto->caracteristica=='Indice de velocidad')
                           {
                                $oProducto_llanta->indice_velocidad = $producto->descripcion;
                           }
                          else
                          {
                             if($producto->caracteristica=='Numero de rin')
                             {
                                    $oProducto_llanta->numero_rin = $producto->descripcion;
                             } 
                          }
                      }
                  }    
                  
              }
              
              if($producto === end($productos))
              {
                  if($producto->categoria=='Llantas')
                  {
                     
                       array_push($aProducto_llanta,$oProducto_llanta);
                  }
              }
          }

         //$aProducto_llantas=$aProducto_llanta;   
        // $aProducto_llantas = InventarioController::agregar_sucursales_llanta($aProducto_llanta);
         //print_r($aProducto_llantas);
           // die();
          //echo '<br>';
          //echo '<br>';
          //echo '<br>';
         //$aProducto_baterias = InventarioController::agregar_sucursales_bateria($aProducto_bateria);
        //print_r($aProducto_baterias);
       
        
        return $aProducto_llanta;
     }
    
        public function mostrar_llantas()
     {
         $aProducto_llanta = array();
        
        $productos = DB::select('select id_productos_llantimax, categoria, nombre, marca, modelo, precio, fotografia_miniatura, caracteristica, descripcion, sucursal, cantidad from ((SELECT productos_llantimax.id_productos_llantimax, categoria.categoria, productos_llantimax.nombre, marca.marca, producto.modelo, productos_servicios.precio, producto.fotografia_miniatura, caracteristica.caracteristica, IFNULL(descripcion_categoria_caracteristica.descripcion, "") as descripcion FROM productos_llantimax inner join productos_servicios on productos_servicios.id_producto_servicio=productos_llantimax.id_productos_llantimax inner join producto on producto.id_producto=productos_servicios.id_producto_servicio INNER JOIN categoria on categoria.id_categoria=producto.id_categoria INNER JOIN caracteristica on categoria.id_categoria=caracteristica.id_categoria left join descripcion_categoria_caracteristica on descripcion_categoria_caracteristica.id_producto_descripcion=producto.id_producto and descripcion_categoria_caracteristica.id_categoria=caracteristica.id_categoria and descripcion_categoria_caracteristica.id_caracteristica=caracteristica.id_caracteristica inner join marca on marca.id_marca=producto.id_marca where categoria.id_categoria=1))as t1 left join inventario on t1.id_productos_llantimax=inventario.id_producto left join sucursal on sucursal.id_sucursal=inventario.id_sucursal  ORDER BY  t1.id_productos_llantimax');
        
         //var_dump($productos);
         //die();
         
         $oProducto_llanta = new \stdClass();
         
         $auxId_producto = -1;
         $auxCategoria='';
         
         $oProducto_llanta->medida = '';
         $oProducto_llanta->capacidad_carga = '';
         $oProducto_llanta->indice_velocidad = '';
         $oProducto_llanta->numero_rin = '';
         
          foreach($productos as $producto)
          {
               if($producto->id_productos_llantimax!==$auxId_producto && $auxId_producto!==-1)
              {
                   if($auxCategoria=='Llantas')
                   {    
                      
                       array_push($aProducto_llanta,$oProducto_llanta);
                      $oProducto_llanta = new \stdClass();

                      $oProducto_llanta->medida = '';
                      $oProducto_llanta->capacidad_carga = '';
                      $oProducto_llanta->indice_velocidad = '';
                      $oProducto_llanta->numero_rin = '';
                   }
              }
              
              $auxId_producto = $producto->id_productos_llantimax;
              
              if($producto->categoria=='Llantas'){
                  $oProducto_llanta->id_productos_llantimax = $producto->id_productos_llantimax;
                  //$oProducto_llanta->sucursal = $producto->sucursal;
                  $oProducto_llanta->categoria = $producto->categoria;
                  $oProducto_llanta->nombre = $producto->nombre;
                  $oProducto_llanta->marca = $producto->marca;
                  $oProducto_llanta->modelo = $producto->modelo;
                  $oProducto_llanta->precio =  InventarioController::formato_moneda($producto->precio);
                  $oProducto_llanta->cantidad = $producto->cantidad;
                  $oProducto_llanta->fotografia_miniatura = $producto->fotografia_miniatura;
                  //$oProducto_llanta->sucursal=$producto->sucursal;
                  $auxCategoria='Llantas';

                  if($producto->caracteristica=='Medida')
                  {
                       $oProducto_llanta->medida = $producto->descripcion;
                  }
                  else
                  {
                      if($producto->caracteristica=='Capacidad de carga')
                      {
                          $oProducto_llanta->capacidad_carga = $producto->descripcion;
                      }
                      else
                      {
                           if($producto->caracteristica=='Indice de velocidad')
                           {
                                $oProducto_llanta->indice_velocidad = $producto->descripcion;
                           }
                          else
                          {
                             if($producto->caracteristica=='Numero de rin')
                             {
                                    $oProducto_llanta->numero_rin = $producto->descripcion;
                             } 
                          }
                      }
                  }    
                  
              }
              
              if($producto === end($productos))
              {
                  if($producto->categoria=='Llantas')
                  {
                     
                       array_push($aProducto_llanta,$oProducto_llanta);
                  }
              }
          }

         //$aProducto_llantas=$aProducto_llanta;   
         $aProducto_llantas = InventarioController::agregar_sucursales_llanta($aProducto_llanta);
         //print_r($aProducto_llantas);
           // die();
          //echo '<br>';
          //echo '<br>';
          //echo '<br>';
         //$aProducto_baterias = InventarioController::agregar_sucursales_bateria($aProducto_bateria);
        //print_r($aProducto_baterias);
       
        
        return $aProducto_llantas;
     }
    
    function agregar_sucursales_llanta($aLlanta)
    {
         $allantas = array();
         $oLlanta = new \stdClass();
         
         $oLlanta->medida = '';
         $oLlanta->capacidad_carga = '';
         $oLlanta->indice_velocidad = '';
         $oLlanta->numero_rin = '';
         $oLlanta->id_productos_llantimax =''; 
         $oLlanta->categoria = '';
         $oLlanta->nombre ='';
         $oLlanta->marca = '';
         $oLlanta->modelo = '';
         $oLlanta->precio = '';
         $oLlanta->cantidad = '';
         $oLlanta->fotografia_miniatura = '';
         $oLlanta->sucursal = '';
         $sucursales=DB::select('select * from sucursal');
         $id_sucu="";
         
         for($a=0;$a<count($aLlanta);$a++)
         {
                 if(empty($allantas))
                 {
                     foreach($sucursales as $sucursal)
                     {
                         $id_producto="'".$aLlanta[$a]->id_productos_llantimax."'";
                            $query2=DB::select("select inventario.cantidad from inventario where inventario.id_producto=".$id_producto." and   inventario.id_sucursal=".$sucursal->id_sucursal);
                         
                         $oLlanta->medida = $aLlanta[$a]->medida;
                         $oLlanta->capacidad_carga = $aLlanta[$a]->capacidad_carga;
                         $oLlanta->indice_velocidad = $aLlanta[$a]->indice_velocidad;
                         $oLlanta->numero_rin = $aLlanta[$a]->numero_rin;
                         $oLlanta->id_productos_llantimax =$aLlanta[$a]->id_productos_llantimax;    
                         $oLlanta->categoria = $aLlanta[$a]->categoria;
                         $oLlanta->nombre =$aLlanta[$a]->nombre;
                         $oLlanta->marca = $aLlanta[$a]->marca;
                         $oLlanta->modelo = $aLlanta[$a]->modelo;
                         $oLlanta->precio = $aLlanta[$a]->precio;
                         $oLlanta->cantidad = $query2[0]->cantidad;
                         $oLlanta->fotografia_miniatura = $aLlanta[$a]->fotografia_miniatura; 
                         $oLlanta->sucursal = $sucursal->sucursal; 
                         array_push($allantas,$oLlanta);
                         $oLlanta = new \stdClass();
                         $oLlanta->sucursal = '';
                     }
                     
                 }
                 else
                 {
                     $b=0;
                     $bandera=0;
                     while($b<count($allantas))
                     {
                         //echo $aLlanta[$a]->id_productos_llantimax. '=='. $allantas[$b]->id_productos_llantimax;
                         
                         if($aLlanta[$a]->id_productos_llantimax == $allantas[$b]->id_productos_llantimax)
                         {
                            $bandera=1;
                              //echo '<br>';
                             //echo 'sali del ciclo porque lo rompi';
                            //echo '<br>';
                         break; 
                         }
                         else
                         {
                        //      echo '<br>';
                        //     echo 'No esta repetido';
                        //    echo '<br>';
                             $bandera=0;
                             $b=$b+1;
                         }
                         
                     }
                     if($bandera==0)
                     {
                             foreach($sucursales as $sucursal)
                         {
                            $id_producto="'".$aLlanta[$a]->id_productos_llantimax."'";
                            $query2=DB::select("select inventario.cantidad from inventario where inventario.id_producto=".$id_producto." and   inventario.id_sucursal=".$sucursal->id_sucursal);
                             $oLlanta->medida = $aLlanta[$a]->medida;
                             $oLlanta->capacidad_carga = $aLlanta[$a]->capacidad_carga;
                             $oLlanta->indice_velocidad = $aLlanta[$a]->indice_velocidad;
                             $oLlanta->numero_rin = $aLlanta[$a]->numero_rin;
                             $oLlanta->id_productos_llantimax =$aLlanta[$a]->id_productos_llantimax;    
                             $oLlanta->categoria = $aLlanta[$a]->categoria;
                             $oLlanta->nombre =$aLlanta[$a]->nombre;
                             $oLlanta->marca = $aLlanta[$a]->marca;
                             $oLlanta->modelo = $aLlanta[$a]->modelo;
                             $oLlanta->precio = $aLlanta[$a]->precio;
                             $oLlanta->cantidad=$query2[0]->cantidad;
                                 
                             $oLlanta->fotografia_miniatura = $aLlanta[$a]->fotografia_miniatura; 
                             $oLlanta->sucursal = $sucursal->sucursal; 
                             array_push($allantas,$oLlanta);
                             $oLlanta = new \stdClass();
                             $oLlanta->sucursal = '';
                         }
                     
                         
                     }
                     else
                     {
                        // echo '<br>';
                          //   echo 'Si esta repetido no se mete';
                        //    echo '<br>';
                         
                     }
                     
                 }
         } 
         
        return $allantas;
    }
    
    
         function agregar_sucursales_bateria($aBateria)
    {
        $abaterias = array();
         $oBateria = new \stdClass();
      
         $oBateria->voltaje='';
         $oBateria->capacidad_arranque='';
         $oBateria->capacidad_arranque_frio='';
         $oBateria->medidas='';
         $oBateria->peso='';
         $oBateria->tamanio='';
         $oBateria->id_productos_llantimax =''; 
         $oBateria->categoria = '';
         $oBateria->nombre ='';
         $oBateria->marca = '';
         $oBateria->modelo = '';
         $oBateria->precio = '';
         $oBateria->cantidad = '';
         $oBateria->fotografia_miniatura = '';
         $oBateria->sucursal = '';
         $sucursales=DB::select('select * from sucursal');
         $id_sucu="";
         
         for($a=0;$a<count($aBateria);$a++)
         {
                 if(empty($abaterias))
                 {
                     foreach($sucursales as $sucursal)
                     {
                         $id_producto="'".$aBateria[$a]->id_productos_llantimax."'";
                            $query2=DB::select("select inventario.cantidad from inventario where inventario.id_producto=".$id_producto." and   inventario.id_sucursal=".$sucursal->id_sucursal);
                         
                     $oBateria->voltaje=$aBateria[$a]->voltaje;
                     $oBateria->capacidad_arranque=$aBateria[$a]->capacidad_arranque;
                     $oBateria->capacidad_arranque_frio=$aBateria[$a]->capacidad_arranque_frio;
                     $oBateria->medidas=$aBateria[$a]->medidas;
                     $oBateria->peso=$aBateria[$a]->peso;
                     $oBateria->tamanio=$aBateria[$a]->tamanio;
                     $oBateria->id_productos_llantimax =$aBateria[$a]->id_productos_llantimax; 
                     $oBateria->categoria = $aBateria[$a]->categoria;
                     $oBateria->nombre =$aBateria[$a]->nombre;
                     $oBateria->marca = $aBateria[$a]->marca;
                     $oBateria->modelo = $aBateria[$a]->modelo;
                     $oBateria->precio = $aBateria[$a]->precio;
                     $oBateria->cantidad = $query2[0]->cantidad;
                     $oBateria->fotografia_miniatura = $aBateria[$a]->fotografia_miniatura;
                     $oBateria->sucursal = $sucursal->sucursal;
                     array_push($abaterias,$oBateria);
                     $oBateria = new \stdClass();
                     $oBateria->sucursal = '';
                     }
                     
                 }
                 else
                 {
                     $b=0;
                     $bandera=0;
                     while($b<count($abaterias))
                     {
                         //echo $aLlanta[$a]->id_productos_llantimax. '=='. $allantas[$b]->id_productos_llantimax;
                         
                         if($aBateria[$a]->id_productos_llantimax == $abaterias[$b]->id_productos_llantimax)
                         {
                            $bandera=1;
                              //echo '<br>';
                             //echo 'sali del ciclo porque lo rompi';
                            //echo '<br>';
                         break; 
                         }
                         else
                         {
                        //      echo '<br>';
                        //     echo 'No esta repetido';
                        //    echo '<br>';
                             $bandera=0;
                             $b=$b+1;
                         }
                         
                     }
                     if($bandera==0)
                     {
                             foreach($sucursales as $sucursal)
                         {
                            $id_producto="'".$aBateria[$a]->id_productos_llantimax."'";
                            $query2=DB::select("select inventario.cantidad from inventario where inventario.id_producto=".$id_producto." and   inventario.id_sucursal=".$sucursal->id_sucursal);
                              $oBateria->voltaje=$aBateria[$a]->voltaje;
                     $oBateria->capacidad_arranque=$aBateria[$a]->capacidad_arranque;
                     $oBateria->capacidad_arranque_frio=$aBateria[$a]->capacidad_arranque_frio;
                     $oBateria->medidas=$aBateria[$a]->medidas;
                     $oBateria->peso=$aBateria[$a]->peso;
                     $oBateria->tamanio=$aBateria[$a]->tamanio;
                     $oBateria->id_productos_llantimax =$aBateria[$a]->id_productos_llantimax; 
                     $oBateria->categoria = $aBateria[$a]->categoria;
                     $oBateria->nombre =$aBateria[$a]->nombre;
                     $oBateria->marca = $aBateria[$a]->marca;
                     $oBateria->modelo = $aBateria[$a]->modelo;
                     $oBateria->precio = $aBateria[$a]->precio;
                     $oBateria->cantidad = $query2[0]->cantidad;
                     $oBateria->fotografia_miniatura = $aBateria[$a]->fotografia_miniatura;
                     $oBateria->sucursal = $sucursal->sucursal;
                     array_push($abaterias,$oBateria);
                     $oBateria = new \stdClass();
                     $oBateria->sucursal = '';
                            /*  
                            */
                         } 
                     }
                     else
                     {
                        // echo '<br>';
                          //   echo 'Si esta repetido no se mete';
                        //    echo '<br>';
                         
                     }          
                 }
         } 
        return $abaterias;
    }
    
    public function mostrar_baterias()
     {
         $aProducto_bateria = array();
        
        $productos = DB::select('select id_productos_llantimax, categoria, nombre, marca,id_marca, modelo, precio, fotografia_miniatura, caracteristica, descripcion, sucursal, cantidad from ((SELECT productos_llantimax.id_productos_llantimax, categoria.categoria, productos_llantimax.nombre, marca.marca, marca.id_marca, producto.modelo, productos_servicios.precio, producto.fotografia_miniatura, caracteristica.caracteristica, IFNULL(descripcion_categoria_caracteristica.descripcion, "") as descripcion FROM productos_llantimax inner join productos_servicios on productos_servicios.id_producto_servicio=productos_llantimax.id_productos_llantimax inner join producto on producto.id_producto=productos_servicios.id_producto_servicio INNER JOIN categoria on categoria.id_categoria=producto.id_categoria INNER JOIN caracteristica on categoria.id_categoria=caracteristica.id_categoria left join descripcion_categoria_caracteristica on descripcion_categoria_caracteristica.id_producto_descripcion=producto.id_producto and descripcion_categoria_caracteristica.id_categoria=caracteristica.id_categoria and descripcion_categoria_caracteristica.id_caracteristica=caracteristica.id_caracteristica inner join marca on marca.id_marca=producto.id_marca where categoria.id_categoria=2))as t1 left join inventario on t1.id_productos_llantimax=inventario.id_producto left join sucursal on sucursal.id_sucursal=inventario.id_sucursal  ORDER BY  t1.id_productos_llantimax');
        
         //var_dump($productos);
         //die();
         $oProducto_bateria = new \stdClass();
         
         $auxId_producto = -1;
         $auxCategoria='';
         
         $oProducto_bateria->voltaje='';
         $oProducto_bateria->capacidad_arranque='';
         $oProducto_bateria->capacidad_arranque_frio='';
         $oProducto_bateria->medidas='';
         $oProducto_bateria->peso='';
         $oProducto_bateria->tamanio='';
         
          foreach($productos as $producto)
          {
               if($producto->id_productos_llantimax!==$auxId_producto && $auxId_producto!==-1)
              {
                       if($auxCategoria=='Bateria')
                       {
                            array_push($aProducto_bateria,$oProducto_bateria);
                            $oProducto_bateria = new \stdClass();
                           
                            $oProducto_bateria->voltaje='';
                            $oProducto_bateria->capacidad_arranque='';
                            $oProducto_bateria->capacidad_arranque_frio='';
                            $oProducto_bateria->medidas='';
                            $oProducto_bateria->peso='';
                            $oProducto_bateria->tamanio='';
                       }
              }
              
              $auxId_producto = $producto->id_productos_llantimax;
              
              if($producto->categoria=='Bateria'){
                  
                  $oProducto_bateria->id_productos_llantimax = $producto->id_productos_llantimax;
                  //$oProducto_bateria->sucursal = $producto->sucursal;
                  $oProducto_bateria->categoria = $producto->categoria;
                  $oProducto_bateria->nombre = $producto->nombre;
                  $oProducto_bateria->marca = $producto->marca;
                  $oProducto_bateria->id_marca = $producto->id_marca;
                  $oProducto_bateria->modelo = $producto->modelo;
                  $oProducto_bateria->precio = InventarioController::formato_moneda($producto->precio);
                  $oProducto_bateria->cantidad = $producto->cantidad;
                  $oProducto_bateria->fotografia_miniatura = $producto->fotografia_miniatura;
                  $oProducto_bateria->sucursal=$producto->sucursal;
                  $auxCategoria='Bateria';

                  if($producto->caracteristica=='Voltaje')
                  {
                       $oProducto_bateria->voltaje = $producto->descripcion;
                  }
                  else
                  {
                      if($producto->caracteristica=='Capacidad de arranque')
                      {
                          $oProducto_bateria->capacidad_arranque = $producto->descripcion;
                      }
                      else
                      {
                           if($producto->caracteristica=='Capacidad de arranque en frio')
                           {
                                $oProducto_bateria->capacidad_arranque_frio = $producto->descripcion;
                           }
                           else
                           {
                              if($producto->caracteristica=='Medidas')
                              {
                                    $oProducto_bateria->medidas = $producto->descripcion;
                              }
                               else
                               {
                                   if($producto->caracteristica=='Peso')
                                   {
                                       $oProducto_bateria->peso = $producto->descripcion;
                                   }
                                   else
                                   {
                                       if($producto->caracteristica=='Tama??o')
                                       {
                                           $oProducto_bateria->tamanio = $producto->descripcion;
                                       }
                                   }
                               }
                           }
                      }
                  }
              }
              
              if($producto === end($productos))
              {
                      if($producto->categoria=='Bateria')
                      {
                           array_push($aProducto_bateria,$oProducto_bateria);
                      } 
              }
          }

         $aProducto_baterias = InventarioController::agregar_sucursales_bateria($aProducto_bateria);

        return $aProducto_baterias;
     }
    
    public function mostrar_baterias_2()
     {
         $aProducto_bateria = array();
        $id_sucursal=Session::get('id_sucursal_usuario');
        $productos = DB::select('select id_productos_llantimax, categoria, nombre, marca,id_marca, modelo, precio, fotografia_miniatura, caracteristica, descripcion, sucursal, cantidad from ((SELECT productos_llantimax.id_productos_llantimax, categoria.categoria, productos_llantimax.nombre, marca.marca, marca.id_marca, producto.modelo, productos_servicios.precio, producto.fotografia_miniatura, caracteristica.caracteristica, IFNULL(descripcion_categoria_caracteristica.descripcion, "") as descripcion FROM productos_llantimax inner join productos_servicios on productos_servicios.id_producto_servicio=productos_llantimax.id_productos_llantimax inner join producto on producto.id_producto=productos_servicios.id_producto_servicio INNER JOIN categoria on categoria.id_categoria=producto.id_categoria INNER JOIN caracteristica on categoria.id_categoria=caracteristica.id_categoria left join descripcion_categoria_caracteristica on descripcion_categoria_caracteristica.id_producto_descripcion=producto.id_producto and descripcion_categoria_caracteristica.id_categoria=caracteristica.id_categoria and descripcion_categoria_caracteristica.id_caracteristica=caracteristica.id_caracteristica inner join marca on marca.id_marca=producto.id_marca where categoria.id_categoria=2))as t1 left join inventario on t1.id_productos_llantimax=inventario.id_producto left join sucursal on sucursal.id_sucursal=inventario.id_sucursal where inventario.id_sucursal='.$id_sucursal. ' ORDER BY  t1.id_productos_llantimax');
        
         //var_dump($productos);
         //die();
         $oProducto_bateria = new \stdClass();
         
         $auxId_producto = -1;
         $auxCategoria='';
         
         $oProducto_bateria->voltaje='';
         $oProducto_bateria->capacidad_arranque='';
         $oProducto_bateria->capacidad_arranque_frio='';
         $oProducto_bateria->medidas='';
         $oProducto_bateria->peso='';
         $oProducto_bateria->tamanio='';
         
          foreach($productos as $producto)
          {
               if($producto->id_productos_llantimax!==$auxId_producto && $auxId_producto!==-1)
              {
                       if($auxCategoria=='Bateria')
                       {
                            array_push($aProducto_bateria,$oProducto_bateria);
                            $oProducto_bateria = new \stdClass();
                           
                            $oProducto_bateria->voltaje='';
                            $oProducto_bateria->capacidad_arranque='';
                            $oProducto_bateria->capacidad_arranque_frio='';
                            $oProducto_bateria->medidas='';
                            $oProducto_bateria->peso='';
                            $oProducto_bateria->tamanio='';
                       }
              }
              
              $auxId_producto = $producto->id_productos_llantimax;
              
              if($producto->categoria=='Bateria'){
                  
                  $oProducto_bateria->id_productos_llantimax = $producto->id_productos_llantimax;
                  //$oProducto_bateria->sucursal = $producto->sucursal;
                  $oProducto_bateria->categoria = $producto->categoria;
                  $oProducto_bateria->nombre = $producto->nombre;
                  $oProducto_bateria->marca = $producto->marca;
                  $oProducto_bateria->id_marca = $producto->id_marca;
                  $oProducto_bateria->modelo = $producto->modelo;
                  $oProducto_bateria->precio = InventarioController::formato_moneda($producto->precio);
                  $oProducto_bateria->cantidad = $producto->cantidad;
                  $oProducto_bateria->fotografia_miniatura = $producto->fotografia_miniatura;
                  $oProducto_bateria->sucursal=$producto->sucursal;
                  $auxCategoria='Bateria';

                  if($producto->caracteristica=='Voltaje')
                  {
                       $oProducto_bateria->voltaje = $producto->descripcion;
                  }
                  else
                  {
                      if($producto->caracteristica=='Capacidad de arranque')
                      {
                          $oProducto_bateria->capacidad_arranque = $producto->descripcion;
                      }
                      else
                      {
                           if($producto->caracteristica=='Capacidad de arranque en frio')
                           {
                                $oProducto_bateria->capacidad_arranque_frio = $producto->descripcion;
                           }
                           else
                           {
                              if($producto->caracteristica=='Medidas')
                              {
                                    $oProducto_bateria->medidas = $producto->descripcion;
                              }
                               else
                               {
                                   if($producto->caracteristica=='Peso')
                                   {
                                       $oProducto_bateria->peso = $producto->descripcion;
                                   }
                                   else
                                   {
                                       if($producto->caracteristica=='Tama??o')
                                       {
                                           $oProducto_bateria->tamanio = $producto->descripcion;
                                       }
                                   }
                               }
                           }
                      }
                  }
              }
              
              if($producto === end($productos))
              {
                      if($producto->categoria=='Bateria')
                      {
                           array_push($aProducto_bateria,$oProducto_bateria);
                      } 
              }
          }

         //$aProducto_baterias = InventarioController::agregar_sucursales_bateria($aProducto_bateria);

        return $aProducto_bateria;
     }
    
    function eliminar_producto_inventario(Request $input)
    {
        $sucursal=$input['sucursal'];
        $id_producto=$input['id_producto'];
        $cantidad_vieja=$input['cantidad_anterior'];
        $cantidad_nueva=$input['cantidad_nueva'];
        
        $query=DB::select('select id_sucursal from sucursal where sucursal.sucursal="'.$sucursal.'"');
        $id_sucursal=$query[0]->id_sucursal; 
        
        $cantidad_restante=intval($cantidad_vieja)-intval($cantidad_nueva);
        
         $query2=DB::update("update  inventario set cantidad='$cantidad_restante' where inventario.id_producto=? and inventario.id_sucursal=? ",[$id_producto,$id_sucursal]);
    }
}
