<?php

include('conectar.php');

if(!isset($_GET['accion']))
{
 header('../admin');
} else {
  switch($_GET['accion'])
  {
    /* ---------------------- CREAR ITEM ---------------------- */
    case 'crear':
       
      $titulo = $_POST['titulo'];
      $video = $_POST['vid'];
      $anchors = array('<p>','</p>');
      $replace = array('','<br>');
      $descripcion = str_replace($anchors,$replace,$_POST['descripcion']);
      $foto_ext = $_FILES['foto']['type']; // Extensión de la imágen.
      $foto_temp = $_FILES['foto']['tmp_name']; // Archivo temporal.
      $foto_loc = '../images/fotos'.str_replace('/php','',$foto_temp).'.'.str_replace('image/','',$foto_ext); // Directorio en donde será guardada como "Título.formato".
      
      foreach($_FILES as $key => $value)  // Revisa el formato de todas las imágenes.
      {
        if (($value['type'] != 'image/png') && ($value['type'] != 'image/jpg') && ($value['type'] != 'image/jpeg') && ($value['type'] != 'image/gif'))
        {
          $error = 1;
        }
      }
 
      if( (strlen($titulo) == 0) || (strlen($video) == 0) || (strlen($descripcion) == 0) ) // Revisa que hayan título, descripción y url.
      {
        header('Location: admin-videos.php?error=4');
      } else {
        if ($error == 1) // Confirmación de extensión correcta.
        {
          header('Location: admin-videos.php?&error=1'); 
        } else {
        
          // Le otorga su orden (Al final por default).
          $qry=mysql_query("SELECT ID, orden FROM media"); 
          while($filas = mysql_fetch_assoc($qry))
          {
            $orden_array[$filas['ID']] = $filas['orden'];
          }
          $orden = count($orden_array);
        
          /* PROCESO DE GUARDADO */
          
        	copy($foto_temp, $foto_loc);
          mysql_query("INSERT INTO media (orden, titulo, descripcion, foto, url)
          VALUES('$orden', '$titulo', '$descripcion', '$foto_loc', '$video')");
        
        	header('Location: admin-videos.php?error=0');  
        }
      }
      
      break;
    
    /* ---------------------- EDITAR ITEM ---------------------- */  
    case 'editar':
      
      $qry= mysql_query("SELECT * FROM media WHERE id='{$_GET['id']}'");
      while($filas = mysql_fetch_assoc($qry)) // Guarda toda la info de la base de datos en una variable para evitar llamados extra.
      {
        $item['id'] = $filas['ID'];
        $item['orden'] = $filas['orden'];
        $item['titulo'] = $filas['titulo'];
        $item['descripcion'] = str_replace($anchors,'<br>',$_POST['descripcion']);
        $item['foto'] = $filas['foto'];
      }

        $titulo = $_POST['titulo'];
        $video = $_POST['video'];
        $anchors = array('<p>','</p>');
        $replace = array('','<br>');
        $descripcion = str_replace($anchors,$replace,$_POST['descripcion']);
        $foto_ext = $_FILES['foto']['type']; // Extensión de la imágen.
        $foto_temp = $_FILES['foto']['tmp_name']; // Archivo temporal.
        $foto_loc = '../images/fotos/'.str_replace(' ','_',strtolower($item['titulo'])).'.'.str_replace('image/','',$foto_ext); // Directorio imagen.

        
        /* Edita campos sólo si están llenos. */
        
        if(strlen($titulo) != 0) // Título.
        {
          $qry = mysql_query("UPDATE media SET titulo = '$titulo' WHERE ID={$_GET['id']}");
        }
        
        if(strlen($video) != 0) // URL video.
        {
          $qry = mysql_query("UPDATE media SET url = '$video' WHERE ID={$_GET['id']}");
        }
        
        if(strlen($descripcion) != 0) // Descripción.
        {
          $qry = mysql_query("UPDATE media SET descripcion = '$descripcion' WHERE ID={$_GET['id']}");
        }
        
        if($_FILES['foto']['error'] == 0) // Foto.
        {
          if (($foto_ext != 'image/png') && ($foto_ext != 'image/jpg') && ($foto_ext != 'image/jpeg') && ($foto_ext != 'image/gif'))
          {
            header('Location: editar-vid.php?id='.$_GET['id'].'&error=1'); 
          } else {
            unlink($item['foto']); // Elimina foto para evitar duplicados por formato distinto.
            copy($foto_temp, $foto_loc);
            $qry = mysql_query("UPDATE media SET foto = '$foto_loc' WHERE ID={$_GET['id']}");  
          }
        }
      
        header('Location: editar-vid.php?id='.$_GET['id'].'&error=2'); //Reenvia con mensaje de edición realizada.
        
      break;
      
    /* ---------------------- ELIMINAR ITEM ---------------------- */
    case 'eliminar':
      
      $qry= mysql_query("SELECT foto FROM media WHERE ID = '{$_GET['id']}' ");
      while($filas = mysql_fetch_assoc($qry))
      {
        $foto_url = $filas['foto'];
      }
      
      $qry= mysql_query("SELECT ID,orden FROM media ORDER BY orden"); // Reordenamiento.
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
      
      mysql_query("DELETE FROM media WHERE ID = {$_GET['id']}");
      unlink($foto_url);
      foreach($orden as $key => $value)
      {
        $qry = mysql_query("UPDATE $modulo SET orden = '$value' WHERE ID='$key'");
      }
      header('Location: admin-videos.php?error=3');
      break;  
      
    default:
      header('../admin');
      break;
  }
}

?>