<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMaps(array (
  'default' => 
  array (
    0 => '\\DB\\Map\\CiudadesTableMap',
    1 => '\\DB\\Map\\DepartamentosTableMap',
    2 => '\\DB\\Map\\UsersTableMap',
  ),
));
