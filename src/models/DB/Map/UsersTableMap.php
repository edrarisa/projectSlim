<?php

namespace DB\Map;

use DB\Users;
use DB\UsersQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'users' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class UsersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'DB.Map.UsersTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'users';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\DB\\Users';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'DB.Users';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the idregistro field
     */
    public const COL_IDREGISTRO = 'users.idregistro';

    /**
     * the column name for the nombre field
     */
    public const COL_NOMBRE = 'users.nombre';

    /**
     * the column name for the email field
     */
    public const COL_EMAIL = 'users.email';

    /**
     * the column name for the ciudad field
     */
    public const COL_CIUDAD = 'users.ciudad';

    /**
     * the column name for the departamento field
     */
    public const COL_DEPARTAMENTO = 'users.departamento';

    /**
     * the column name for the asunto field
     */
    public const COL_ASUNTO = 'users.asunto';

    /**
     * the column name for the mensaje field
     */
    public const COL_MENSAJE = 'users.mensaje';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Idregistro', 'Nombre', 'ISBN', 'Ciudad', 'Departamento', 'Asunto', 'Mensaje', ],
        self::TYPE_CAMELNAME     => ['idregistro', 'nombre', 'iSBN', 'ciudad', 'departamento', 'asunto', 'mensaje', ],
        self::TYPE_COLNAME       => [UsersTableMap::COL_IDREGISTRO, UsersTableMap::COL_NOMBRE, UsersTableMap::COL_EMAIL, UsersTableMap::COL_CIUDAD, UsersTableMap::COL_DEPARTAMENTO, UsersTableMap::COL_ASUNTO, UsersTableMap::COL_MENSAJE, ],
        self::TYPE_FIELDNAME     => ['idregistro', 'nombre', 'email', 'ciudad', 'departamento', 'asunto', 'mensaje', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Idregistro' => 0, 'Nombre' => 1, 'ISBN' => 2, 'Ciudad' => 3, 'Departamento' => 4, 'Asunto' => 5, 'Mensaje' => 6, ],
        self::TYPE_CAMELNAME     => ['idregistro' => 0, 'nombre' => 1, 'iSBN' => 2, 'ciudad' => 3, 'departamento' => 4, 'asunto' => 5, 'mensaje' => 6, ],
        self::TYPE_COLNAME       => [UsersTableMap::COL_IDREGISTRO => 0, UsersTableMap::COL_NOMBRE => 1, UsersTableMap::COL_EMAIL => 2, UsersTableMap::COL_CIUDAD => 3, UsersTableMap::COL_DEPARTAMENTO => 4, UsersTableMap::COL_ASUNTO => 5, UsersTableMap::COL_MENSAJE => 6, ],
        self::TYPE_FIELDNAME     => ['idregistro' => 0, 'nombre' => 1, 'email' => 2, 'ciudad' => 3, 'departamento' => 4, 'asunto' => 5, 'mensaje' => 6, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Idregistro' => 'IDREGISTRO',
        'Users.Idregistro' => 'IDREGISTRO',
        'idregistro' => 'IDREGISTRO',
        'users.idregistro' => 'IDREGISTRO',
        'UsersTableMap::COL_IDREGISTRO' => 'IDREGISTRO',
        'COL_IDREGISTRO' => 'IDREGISTRO',
        'Nombre' => 'NOMBRE',
        'Users.Nombre' => 'NOMBRE',
        'nombre' => 'NOMBRE',
        'users.nombre' => 'NOMBRE',
        'UsersTableMap::COL_NOMBRE' => 'NOMBRE',
        'COL_NOMBRE' => 'NOMBRE',
        'ISBN' => 'EMAIL',
        'Users.ISBN' => 'EMAIL',
        'iSBN' => 'EMAIL',
        'users.iSBN' => 'EMAIL',
        'UsersTableMap::COL_EMAIL' => 'EMAIL',
        'COL_EMAIL' => 'EMAIL',
        'email' => 'EMAIL',
        'users.email' => 'EMAIL',
        'Ciudad' => 'CIUDAD',
        'Users.Ciudad' => 'CIUDAD',
        'ciudad' => 'CIUDAD',
        'users.ciudad' => 'CIUDAD',
        'UsersTableMap::COL_CIUDAD' => 'CIUDAD',
        'COL_CIUDAD' => 'CIUDAD',
        'Departamento' => 'DEPARTAMENTO',
        'Users.Departamento' => 'DEPARTAMENTO',
        'departamento' => 'DEPARTAMENTO',
        'users.departamento' => 'DEPARTAMENTO',
        'UsersTableMap::COL_DEPARTAMENTO' => 'DEPARTAMENTO',
        'COL_DEPARTAMENTO' => 'DEPARTAMENTO',
        'Asunto' => 'ASUNTO',
        'Users.Asunto' => 'ASUNTO',
        'asunto' => 'ASUNTO',
        'users.asunto' => 'ASUNTO',
        'UsersTableMap::COL_ASUNTO' => 'ASUNTO',
        'COL_ASUNTO' => 'ASUNTO',
        'Mensaje' => 'MENSAJE',
        'Users.Mensaje' => 'MENSAJE',
        'mensaje' => 'MENSAJE',
        'users.mensaje' => 'MENSAJE',
        'UsersTableMap::COL_MENSAJE' => 'MENSAJE',
        'COL_MENSAJE' => 'MENSAJE',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('users');
        $this->setPhpName('Users');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\DB\\Users');
        $this->setPackage('DB');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('idregistro', 'Idregistro', 'INTEGER', true, null, null);
        $this->addColumn('nombre', 'Nombre', 'VARCHAR', true, 50, null);
        $this->addColumn('email', 'ISBN', 'VARCHAR', true, 100, null);
        $this->addColumn('ciudad', 'Ciudad', 'VARCHAR', true, 50, null);
        $this->addColumn('departamento', 'Departamento', 'VARCHAR', true, 50, null);
        $this->addColumn('asunto', 'Asunto', 'VARCHAR', true, 100, null);
        $this->addColumn('mensaje', 'Mensaje', 'VARCHAR', true, 300, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idregistro', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idregistro', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idregistro', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idregistro', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idregistro', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Idregistro', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Idregistro', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? UsersTableMap::CLASS_DEFAULT : UsersTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (Users object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = UsersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UsersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UsersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UsersTableMap::OM_CLASS;
            /** @var Users $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UsersTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = UsersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UsersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Users $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UsersTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(UsersTableMap::COL_IDREGISTRO);
            $criteria->addSelectColumn(UsersTableMap::COL_NOMBRE);
            $criteria->addSelectColumn(UsersTableMap::COL_EMAIL);
            $criteria->addSelectColumn(UsersTableMap::COL_CIUDAD);
            $criteria->addSelectColumn(UsersTableMap::COL_DEPARTAMENTO);
            $criteria->addSelectColumn(UsersTableMap::COL_ASUNTO);
            $criteria->addSelectColumn(UsersTableMap::COL_MENSAJE);
        } else {
            $criteria->addSelectColumn($alias . '.idregistro');
            $criteria->addSelectColumn($alias . '.nombre');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.ciudad');
            $criteria->addSelectColumn($alias . '.departamento');
            $criteria->addSelectColumn($alias . '.asunto');
            $criteria->addSelectColumn($alias . '.mensaje');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(UsersTableMap::COL_IDREGISTRO);
            $criteria->removeSelectColumn(UsersTableMap::COL_NOMBRE);
            $criteria->removeSelectColumn(UsersTableMap::COL_EMAIL);
            $criteria->removeSelectColumn(UsersTableMap::COL_CIUDAD);
            $criteria->removeSelectColumn(UsersTableMap::COL_DEPARTAMENTO);
            $criteria->removeSelectColumn(UsersTableMap::COL_ASUNTO);
            $criteria->removeSelectColumn(UsersTableMap::COL_MENSAJE);
        } else {
            $criteria->removeSelectColumn($alias . '.idregistro');
            $criteria->removeSelectColumn($alias . '.nombre');
            $criteria->removeSelectColumn($alias . '.email');
            $criteria->removeSelectColumn($alias . '.ciudad');
            $criteria->removeSelectColumn($alias . '.departamento');
            $criteria->removeSelectColumn($alias . '.asunto');
            $criteria->removeSelectColumn($alias . '.mensaje');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(UsersTableMap::DATABASE_NAME)->getTable(UsersTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Users or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Users object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \DB\Users) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UsersTableMap::DATABASE_NAME);
            $criteria->add(UsersTableMap::COL_IDREGISTRO, (array) $values, Criteria::IN);
        }

        $query = UsersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UsersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UsersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return UsersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Users or Criteria object.
     *
     * @param mixed $criteria Criteria or Users object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Users object
        }

        if ($criteria->containsKey(UsersTableMap::COL_IDREGISTRO) && $criteria->keyContainsValue(UsersTableMap::COL_IDREGISTRO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UsersTableMap::COL_IDREGISTRO.')');
        }


        // Set the correct dbName
        $query = UsersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
