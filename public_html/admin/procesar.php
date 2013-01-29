<?php

include('conectar.php');

$modulo = $_GET['mod'];

if(!isset($_GET['accion']))
{
 header('../admin');
} else {
  switch($_GET['accion'])
  {
    /* ---------------------- CREAR ITEM ---------------------- */
    case 'crear':   
      $titulo = $_POST['titulo'];
      $anchors = array('<p>','</p>');
      $replace = array('','<br>');
      $descripcion = str_replace($anchors,$replace,$_POST['descripcion']);
      $foto_ext = $_FILES['foto']['type']; // Extensión de la imágen.
      $foto_temp = $_FILES['foto']['tmp_name']; // Archivo temporal.
      $foto_loc = '../images/fotos'.str_replace('/php','',$foto_temp).'.'.str_replace('image/','',$foto_ext); // Directorio en donde será guardada como "Título.formato".
      $foto2_ext = $_FILES['foto2']['type'];
      $foto2_temp = $_FILES['foto2']['tmp_name'];
      $foto2_loc = '../images/fotos'.str_replace('/php','',$foto2_temp).'.'.str_replace('image/','',$foto2_ext);
      foreach($_FILES as $key => $value)  // Guarda imágenes de la galería en un array y descripciones en otro array.
      {
        if(($key != 'foto') && ($key != 'foto2'))
        {
          $pic[$i] = $value;
          $picDesc[$i] = $_POST['galDesc'. $i];
          $i++; 
        }
      }
      
      foreach($_FILES as $key => $value)  // Revisa el formato de todas las imágenes.
      {
        if (($value['type'] != 'image/png') && ($value['type'] != 'image/jpg') && ($value['type'] != 'image/jpeg') && ($value['type'] != 'image/gif'))
        {
          $error = 1;
        }
      }
 
      if((strlen($titulo) == 0) || (strlen($descripcion)) == 0) // Revisa que hayan título y descripción.
      {
        header('Location: admin.php?mod='.$modulo.'&error=4');
      } else {
        if ($error == 1) // Confirmación de extensión correcta.
        {
          header('Location: admin.php?mod='.$modulo.'&error=1'); 
        } else {
        
          /* PROCESO DE GUARDADO */
          
          foreach($pic as $key => $value) // Proceso de guardado de imágenes de galería en ftp
          {
            $pic_temp = $value['tmp_name'];
            $pic_loc = '../images/fotos'.str_replace('/php','',$pic_temp).'.'.str_replace('image/','',$foto_ext);
            
            if($key == 0) // Localización de fotos es guardada en un array, para subir todo a la base de datos dentro de un solo campo.
            {
              $pic_array = $pic_loc;
              $desc_array = $picDesc[$key];
            } else {
        		  $pic_array = $pic_array.'^'.$pic_loc;
        		  $desc_array = $desc_array.'^'.$picDesc[$key];
        		}
        		copy($pic_temp, $pic_loc);
          }
          
          include('conectar.php');
          
          // Le otorga su orden (Al final por default).
          $qry=mysql_query("SELECT ID,orden FROM $modulo"); 
          while($filas = mysql_fetch_assoc($qry))
          {
            $orden_array[$filas['ID']] = $filas['orden'];
          }
          $orden = count($orden_array);
        
        	copy($foto_temp, $foto_loc);
        	copy($foto2_temp, $foto2_loc);
          mysql_query("INSERT INTO $modulo(orden,titulo,descripcion,foto,foto2,galeria,descripciones)
        					     VALUES ('$orden','$titulo','$descripcion','$foto_loc','$foto2_loc','$pic_array','$desc_array')"); 
        
        	header('Location: admin.php?mod='.$modulo.'&error=0');  
        }
      }
      
      break;
      
    /* ---------------------- EDITAR ITEM ---------------------- */  
    case 'editar':
      
      $qry= mysql_query("SELECT * FROM $modulo WHERE id='{$_GET['id']}'");
      while($filas = mysql_fetch_assoc($qry)) // Guarda toda la info de la base de datos en una variable para evitar llamados extra.
      {
        $item['id'] = $filas['ID'];
        $item['orden'] = $filas['orden'];
        $item['titulo'] = $filas['titulo'];
        $item['descripcion'] = str_replace($anchors,'<br>',$_POST['descripcion']);
        $item['foto'] = $filas['foto'];
        $item['foto2'] = $filas['foto2'];
        $item['galeria'] = explode('^',$filas['galeria']);
        $item['descripciones'] = explode('^',$filas['descripciones']);
        $item['desc_raw'] = $filas['descripciones'];
      }

      $desc =  $_POST['desc']; // Descripción -- GALERIA.
      $order = $_POST['order']; // Orden en array -- GALERIA.
      
      /* EDITAR ITEM */
      if(isset($_POST['general']))
      {
        $titulo = $_POST['titulo'];
        $anchors = array('<p>','</p>');
        $replace = array('','<br>');
        $descripcion = str_replace($anchors,$replace,$_POST['descripcion']);
        $foto_ext = $_FILES['foto']['type']; // Extensión de la imágen.
        $foto_temp = $_FILES['foto']['tmp_name']; // Archivo temporal.
        $foto_loc = '../images/fotos'.str_replace('/php','',$foto_temp).'.'.str_replace('image/','',$foto_ext); // Directorio imagen.
        $foto2_ext = $_FILES['foto2']['type']; // Extensión de la imágen.
        $foto2_temp = $_FILES['foto2']['tmp_name']; // Archivo temporal.
        $foto2_loc = '../images/fotos'.str_replace('/php','',$foto2_temp).'.'.str_replace('image/','',$foto2_ext);
        $i = 0;
        foreach($_FILES as $key => $value)  // Guarda imágenes de la galería en un array y descripciones en otro array.
        {
          if(($key != 'foto') && ($key != 'foto2'))
          {
            $pic[$i] = $value;
            $picDesc[$i] = $_POST['galDesc'. $i];
            $i++;
          }
        }
        
        /* Edita campos sólo si están llenos. */
        
        if(strlen($titulo) != 0) // Título.
        {
          $qry = mysql_query("UPDATE $modulo SET titulo = '$titulo' WHERE ID={$_GET['id']}");
        }
        
        if(strlen($descripcion) != 0) // Descripción.
        {
          $qry = mysql_query("UPDATE $modulo SET descripcion = '$descripcion' WHERE ID={$_GET['id']}");
        }
        
        if($_FILES['foto']['error'] == 0) // Foto de fondo.
        {
          if (($foto_ext != 'image/png') && ($foto_ext != 'image/jpg') && ($foto_ext != 'image/jpeg') && ($foto_ext != 'image/gif'))
          {
            header('Location: editar.php?mod='.$modulo.'&accion=editar&id='.$_GET['id'].'&error=1'); 
          } else {
            unlink($item['foto']); // Elimina foto para evitar duplicados por formato distinto.
            copy($foto_temp, $foto_loc);
            $qry = mysql_query("UPDATE $modulo SET foto = '$foto_loc' WHERE ID={$_GET['id']}");  
          }
        }
        
        if($_FILES['foto2']['error'] == 0) // Foto retrato.
        {
          if (($foto2_ext != 'image/png') && ($foto2_ext != 'image/jpg') && ($foto2_ext != 'image/jpeg') && ($foto2_ext != 'image/gif'))
          {
            header('Location: editar.php?mod='.$modulo.'&accion=editar&id='.$_GET['id'].'&error=1'); 
          } else {
            unlink($item['foto2']); // Elimina foto para evitar duplicados por formato distinto.
            copy($foto2_temp, $foto2_loc);
            $qry = mysql_query("UPDATE $modulo SET foto2 = '$foto2_loc' WHERE ID={$_GET['id']}");  
          }
        }
      
        if($pic[0]['error'] == 0) // Galería de imágenes.
        {
        
          foreach($pic as $key => $value)
          {
             if (($value['type'] != 'image/png') && ($value['type'] != 'image/jpg') && ($value['type'] != 'image/jpeg') && ($value['type'] != 'image/gif'))
            {
              header('Location: editar.php?mod='.$modulo.'&accion=editar&id='.$_GET['id'].'&error=1'); 
            } else {
              $hasGalPics = true;
              $countPic = count($item['galeria']);
              $countDesc = count($item['descripciones']);
              $pic_loc = '../images/fotos'.str_replace('/php','',$value['tmp_name']).'.'.str_replace('image/','',$value['type']);
              $item['galeria'][$countPic] = $pic_loc;
              $item['descripciones'][count($item['descripciones'])] = $_POST['galDesc'. $key];
              copy($value['tmp_name'], $pic_loc);
            }
          }
          
          if(isset($hasGalPics))
          {
          $pic_array = implode('^',$item['galeria']);
          $desc_array = implode('^',$item['descripciones']);
          $qry = mysql_query("UPDATE $modulo SET galeria = '{$pic_array}', descripciones = '{$desc_array}' WHERE ID={$_GET['id']}");
          }
          
        }
      
        header('Location: editar.php?mod='.$modulo.'&accion=editar&id='.$_GET['id'].'&error=2'); //Reenvia con mensaje de edición realizada.
         
      }
      
      /* EDITAR ORDEN */
      if(isset($_POST['editarOrden']))
      {
        $orden = $_POST['orden'] - 1;
        if($orden < 0)
        {
          $orden = 0;
        }
        
        $qry= mysql_query("SELECT ID, orden FROM $modulo ORDER BY orden"); // Recoge orden de todos los items.
        while($filas = mysql_fetch_assoc($qry))
        {
          $item2[$filas['ID']] = $filas['orden'];
        }
        
        foreach($item2 as $key => $value) // Reemplaza valores de orden.
        {
          if($value == $orden)
          {
            $nuevoOrden[$key] = $item2[$_GET['id']]['orden'];         
          }elseif($orden > (count($item2) - 1))
          {
            $ordenOverflow = true; 
          }
        }
        if(isset($ordenOverflow)) // Si otorga un orden mayor al maximo existente, inserta el valor al final.
        {
         $nuevoOrden[$_GET['id']] = end($item2) + 1;
        } else {
          $nuevoOrden[$_GET['id']] = $orden;
        }
        
        foreach($nuevoOrden as $key => $value) //Inserta en la base de datos.
        {
          $qry = mysql_query("UPDATE $modulo SET orden = '$value' WHERE ID='$key'");
        }
        
        header('Location: editar.php?mod='.$modulo.'&accion=editar&id='.$_GET['id']); 
      }
      
      /* EDITAR DESCRIPCIONES ESPECÍFICAS */
      if(isset($_POST['editar']))
      {
        foreach($item['descripciones'] as $key => $value) 
        {
          if($key == $order)
          {
            $item['descripciones'][$key] = $desc; // Elimina el key contenedor de la descripción.
          }
        }
        
        $desc_array = implode('^',$item['descripciones']);
        $qry = mysql_query("UPDATE $modulo SET descripciones = '$desc_array' WHERE ID={$_GET['id']}");
        header('Location: editar.php?mod='.$modulo.'&accion=editar&id='.$_GET['id']); 
      } 
         
      
      /* ELIMINAR IMAGEN DE GALERÍA ESPECÍFICA */
      if(isset($_POST['Eliminar']))
      {
        if(count($item['galeria']) > 1)
        {
          foreach($item['galeria'] as $key => $value) 
          {
            if($key == $order)
            {
            unlink($item['galeria'][$key]); // Elimina la imágen del servidor.
            unset($item['galeria'][$key]); // Elimina el key contenedor de la imágen.
            unset($item['descripciones'][$key]); // Elimina el key contenedor de la descripción.
            }
          }
        
        
          $pic_array = implode('^',$item['galeria']); // Convierte arrays de vuelta a strings
          $desc_array = implode('^',$item['descripciones']);
          
          $qry = mysql_query("UPDATE $modulo SET galeria = '$pic_array', descripciones = '$desc_array' WHERE ID={$_GET['id']}");
          header('Location: editar.php?mod='.$modulo.'&accion=editar&id='.$_GET['id']);
        } else {
          header('Location: editar.php?mod='.$modulo.'&accion=editar&id='.$_GET['id'].'&error=5');
        } 
      }

      break;
    
    /* ---------------------- ELIMINAR ITEM ---------------------- */
    case 'eliminar':
      include('conectar.php');
      
      $qry= mysql_query("SELECT foto,foto2,galeria FROM $modulo WHERE ID = '{$_GET['id']}' ");
      while($filas = mysql_fetch_assoc($qry))
      {
        $foto_url = $filas['foto'];
        $foto2_url = $filas['foto2'];
        $galeria = explode('^',$filas['galeria']);
        $descs = explode('^',$filas['descripciones']);
      }
      
      $qry= mysql_query("SELECT ID,orden FROM $modulo ORDER BY orden"); // Reordenamiento.
      while($filas = mysql_fetch_assoc($qry))
      {
        $orden[$filas['ID']] = $filas['orden'];
      }
      
      foreach($orden as $key => $value)
      {
        if($key == $_GET['id'])
        {
          unset($orden[$key]);
        }
        else if ($value > $orden[$_GET['id']])
        {
          $orden[$key] -= 1;
        }
      }
      
      mysql_query("DELETE FROM $modulo WHERE ID = {$_GET['id']}");
      unlink($foto_url);
      unlink($foto2_url);
      foreach ($galeria as $key => $value)
      {
        unlink($value);
      }
      foreach($orden as $key => $value)
      {
        $qry = mysql_query("UPDATE $modulo SET orden = '$value' WHERE ID='$key'");
      }
      header('Location: admin.php?mod='.$modulo.'&error=3');
      break;
      
    default:
      header('../admin');
      break;
  }
}

?>