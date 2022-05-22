<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/api/usuarios/usuarios', function(Request $request, Response $response){
  $users = \DB\UsersQuery::create()->find();
//   $users = \DB\UsersQuery::create()
//   ->join('Users.Ciudades')
// ->where('Users.ciudad = Ciudades.id')
// ->find();
  echo $users->toJSON();

  return $response;
});

//obtener todos los usuarios
// $app->get('/api/usuarios', function(Request $request, Response $response){
//   $sql="SELECT * FROM users";
//   try {
//     $BD = new BD();
//     $BD = $BD->conexion();
//     $res= $BD->query($sql);
//     if ($res->rowCount() > 0) {
//       $users = $res->fetchAll(PDO::FETCH_ASSOC);
//       echo json_encode($users);
//     }else{
//       echo json_encode("{\"filas\":0}");
//     }
//     $res=null;
//     $BD=null;
//   } catch (\Exception $e) {
//     echo '{"Error! : {"Text": '.$e->getMessage().'}"}';
//   }
//   return $response;
// });

//crear un nuevo usuario
$app->post('/api/usuarios/nuevo', function(Request $request, Response $response, array $args){
  $nombre = $request->getParsedBody()['nombre'];
  $email = $request->getParsedBody()['email'];
  $departamento = $request->getParsedBody()['departamento'];
  $ciudad = $request->getParsedBody()['ciudad'];
  $asunto = $request->getParsedBody()['asunto'];
  $mensaje = $request->getParsedBody()['mensaje'];

  $users = new \DB\Users();

  $users->setNombre($nombre);
  $users->setISBN($email);
  $users->setDepartamento($departamento);
  $users->setCiudad($ciudad);
  $users->setAsunto($asunto);
  $users->setMensaje($mensaje);
  $users->save();

  // $sql="INSERT INTO users(nombre,email,ciudad,departamento,asunto,mensaje)
  // VALUES('$nombre','$email','$ciudad','$departamento','$asunto','$mensaje')";
  // try {
  //   $BD = new BD();
  //   $BD = $BD->conexion();
  //   $res= $BD->prepare($sql);
  //   $res->execute();
  //
    echo "Nuevo usuario creado";
  //
  //   $res=null;
  //   $BD=null;
  // } catch (\Exception $e) {
  //   echo '{"Error! : {"Text": '.$e->getMessage().'}"}';
  // }
  return $response;
});

//obtener departamentos
$app->get('/api/usuarios/dptos', function(Request $request, Response $response){

  $dptos = \DB\DepartamentosQuery::create()->find();
  echo $dptos->toJSON();

  return $response;


  // $sql="SELECT * FROM departamentos";
  // try {
  //   $BD = new BD();
  //   $BD = $BD->conexion();
  //   $res= $BD->query($sql);
  //   if ($res->rowCount() > 0) {
  //     $dptos = $res->fetchAll(PDO::FETCH_ASSOC);
  //     echo json_encode($dptos);
  //   }else{
  //     echo json_encode("No hay departamentos");
  //   }
  //   $res=null;
  //   $BD=null;
  // } catch (\Exception $e) {
  //   echo '{"Error! : {"Text": '.$e->getMessage().'}"}';
  // }
  // return $response;
});

//obtener ciudades
$app->post('/api/usuarios/ciudades', function(Request $request, Response $response, array $args){

  $dpto = $request->getParsedBody()['dpto'];

  // $ciudades = \DB\DepartamentosQuery::create()->findPKs($dpto);
  // $ciudades = \DB\DepartamentosQuery::findPK($dpto);
  // echo $ciudades->toJSON();

  $sql="SELECT * FROM ciudades where iddpto ='$dpto'";
  try {
    $BD = new BD();
    $BD = $BD->conexion();
    $res= $BD->query($sql);
    if ($res->rowCount() > 0) {
      $ciudades = $res->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($ciudades);
    }else{
      echo json_encode("No hay ciudades");
    }
    $res=null;
    $BD=null;
  } catch (\Exception $e) {
    echo '{"Error! : {"Text": '.$e->getMessage().'}"}';
  }
  return $response;
});

// obtener el nombre de la ciudad
$app->post('/api/usuarios/nomciudad', function(Request $request, Response $response, array $args){

  $ciud = $request->getParsedBody()['idciudad'];

  $ciudades = \DB\CiudadesQuery::create()->findPK($ciud);
  // $ciudades = \DB\DepartamentosQuery::findPK($dpto);
  echo $ciudades->toJSON();

  return $response;
});
 ?>
