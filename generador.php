<?php
if (isset($_POST['btngenerar'])) {
  $o = $_POST["o"];
  $n = $_POST["n"];
  function get_random_string($longitud)
  {
    $m = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    srand((float)microtime() * 1000000);
    $password = '';
    for ($i = 0; $i < $longitud; $i++) {
      $password .= $m[rand(0, count($m) - 1)];

    }
    return $password;
  }

  function print_quantity($cantidad)
  {
    $numero_elementos = 0;
    $cadenas = array("");
    $aleatorio = "";
    $rango = pow(36,$GLOBALS['n']);
    $rango2 = pow(36,$GLOBALS['n']+1);
    $residuo = $cantidad - $rango;   
    
    while($numero_elementos < $cantidad){
      if($numero_elementos < $rango){
        $existe = FALSE;
        $aleatorio = $numero_elementos+1 . ".- " . get_random_string($GLOBALS['n']) . "\n";
        for($i=0;$i<count($cadenas) && !$existe;$i++){
          if($aleatorio == $cadenas[$i]){
            $existe = TRUE;
          }
        }
        if($existe == FALSE){
          $cadenas[$numero_elementos++] = $aleatorio;
        }
      }elseif($numero_elementos < $rango2){
        $existe = FALSE;
        $aleatorio = $numero_elementos+1 . ".- " . get_random_string($GLOBALS['n']+1) . "\n";
        for($i=0;$i<count($cadenas) && !$existe;$i++){
          if($aleatorio == $cadenas[$i]){
            $existe = TRUE;
          }
        }
        if($existe == FALSE){
          $cadenas[$numero_elementos++] = $aleatorio;
        }

      }else{
        $existe = FALSE;
        $aleatorio = $numero_elementos+1 . ".- " . get_random_string($GLOBALS['n']+2) . "\n";
        for($i=0;$i<count($cadenas) && !$existe;$i++){
          if($aleatorio == $cadenas[$i]){
            $existe = TRUE;
          }
        }
        if($existe == FALSE){
          $cadenas[$numero_elementos++] = $aleatorio;
        }

      }
    }
    //asort($cadenas);
    $cantidad_original = count($cadenas);
    $unico = array_unique($cadenas);
    $cantidad_unico = count($unico);
    $cad = implode("  ", $cadenas);
    $cad .= "\n cantidad original = " . $cantidad_original . "\n cantidad unico = " .$cantidad_unico;  
    return $cad;
  }
  $res = print_quantity($o);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />


</head>

<body>
  <section class="d-flex justify-content-center">
    <div class="card col-sm-6 p-3 shadow p-3 mb-5 bg-body rounded">

      <div class="card-body p-5">
        <div class=" mb-3 text-center">
          <h2 class="card-header">Generador de cadenas aleatorias</h2>
        </div>
        <div class="container-fluid mb-2">
          <form id="generar" action="generador.php" method="post">
            <div class="form-floating mb-2">
              <input class="form-control" type="number" name="o" id="cantidad_cadena" placeholder="ej: 5" required>
              <label class="mb-2" for="cantidad_cadena">Cantidad de cadenas</label>
            </div>
            <div class="form-floating mb-2">
              <input class="form-control" type="number" name="n" id="longitud_cadena" placeholder="ej: 23" required>
              <label class="mb-2" for="longitud_cadena">Longitud de cadena</label>
            </div>
            <div class="mb-2 text-center">
              <button type="submit" class="btn btn-success " name="btngenerar" id="btngenerar">Generar</button>
            </div>
            <div class="form-floating mb-2">

              <textarea readonly class="form-control p-5" placeholder="Resultado" id="txt_resultado" style="height: 300px;">  <?php echo $res; ?>  </textarea> </textarea>
              <label for="txt_resultado">Resultado</label>
            </div>
          </form>
        </div>
      </div>

    </div>

  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>