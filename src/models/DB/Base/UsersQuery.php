<?php

namespace DB\Base;

use \Exception;
use \PDO;
use DB\Users as ChildUsers;
use DB\UsersQuery as ChildUsersQuery;
use DB\Map\UsersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'users' table.
 *
 *
 *
 * @method     ChildUsersQuery orderByIdregistro($order = Criteria::ASC) Order by the idregistro column
 * @method     ChildUsersQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     ChildUsersQuery orderByISBN($order = Criteria::ASC) Order by the email column
 * @method     ChildUsersQuery orderByCiudad($order = Criteria::ASC) Order by the ciudad column
 * @method     ChildUsersQuery orderByDepartamento($order = Criteria::ASC) Order by the departamento column
 * @method     ChildUsersQuery orderByAsunto($order = Criteria::ASC) Order by the asunto column
 * @method     ChildUsersQuery orderByMensaje($order = Criteria::ASC) Order by the mensaje column
 *
 * @method     ChildUsersQuery groupByIdregistro() Group by the idregistro column
 * @method     ChildUsersQuery groupByNombre() Group by the nombre column
 * @method     ChildUsersQuery groupByISBN() Group by the email column
 * @method     ChildUsersQuery groupByCiudad() Group by the ciudad column
 * @method     ChildUsersQuery groupByDepartamento() Group by the departamento column
 * @method     ChildUsersQuery groupByAsunto() Group by the asunto column
 * @method     ChildUsersQuery groupByMensaje() Group by the mensaje column
 *
 * @method     ChildUsersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUsersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUsersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUsersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUsersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUsersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUsers|null findOne(?ConnectionInterface $con = null) Return the first ChildUsers matching the query
 * @method     ChildUsers findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildUsers matching the query, or a new ChildUsers object populated from the query conditions when no match is found
 *
 * @method     ChildUsers|null findOneByIdregistro(int $idregistro) Return the first ChildUsers filtered by the idregistro column
 * @method     ChildUsers|null findOneByNombre(string $nombre) Return the first ChildUsers filtered by the nombre column
 * @method     ChildUsers|null findOneByISBN(string $email) Return the first ChildUsers filtered by the email column
 * @method     ChildUsers|null findOneByCiudad(string $ciudad) Return the first ChildUsers filtered by the ciudad column
 * @method     ChildUsers|null findOneByDepartamento(string $departamento) Return the first ChildUsers filtered by the departamento column
 * @method     ChildUsers|null findOneByAsunto(string $asunto) Return the first ChildUsers filtered by the asunto column
 * @method     ChildUsers|null findOneByMensaje(string $mensaje) Return the first ChildUsers filtered by the mensaje column *

 * @method     ChildUsers requirePk($key, ?ConnectionInterface $con = null) Return the ChildUsers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOne(?ConnectionInterface $con = null) Return the first ChildUsers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsers requireOneByIdregistro(int $idregistro) Return the first ChildUsers filtered by the idregistro column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByNombre(string $nombre) Return the first ChildUsers filtered by the nombre column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByISBN(string $email) Return the first ChildUsers filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByCiudad(string $ciudad) Return the first ChildUsers filtered by the ciudad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByDepartamento(string $departamento) Return the first ChildUsers filtered by the departamento column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByAsunto(string $asunto) Return the first ChildUsers filtered by the asunto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUsers requireOneByMensaje(string $mensaje) Return the first ChildUsers filtered by the mensaje column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUsers[]|Collection find(?ConnectionInterface $con = null) Return ChildUsers objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildUsers> find(?ConnectionInterface $con = null) Return ChildUsers objects based on current ModelCriteria
 * @method     ChildUsers[]|Collection findByIdregistro(int $idregistro) Return ChildUsers objects filtered by the idregistro column
 * @psalm-method Collection&\Traversable<ChildUsers> findByIdregistro(int $idregistro) Return ChildUsers objects filtered by the idregistro column
 * @method     ChildUsers[]|Collection findByNombre(string $nombre) Return ChildUsers objects filtered by the nombre column
 * @psalm-method Collection&\Traversable<ChildUsers> findByNombre(string $nombre) Return ChildUsers objects filtered by the nombre column
 * @method     ChildUsers[]|Collection findByISBN(string $email) Return ChildUsers objects filtered by the email column
 * @psalm-method Collection&\Traversable<ChildUsers> findByISBN(string $email) Return ChildUsers objects filtered by the email column
 * @method     ChildUsers[]|Collection findByCiudad(string $ciudad) Return ChildUsers objects filtered by the ciudad column
 * @psalm-method Collection&\Traversable<ChildUsers> findByCiudad(string $ciudad) Return ChildUsers objects filtered by the ciudad column
 * @method     ChildUsers[]|Collection findByDepartamento(string $departamento) Return ChildUsers objects filtered by the departamento column
 * @psalm-method Collection&\Traversable<ChildUsers> findByDepartamento(string $departamento) Return ChildUsers objects filtered by the departamento column
 * @method     ChildUsers[]|Collection findByAsunto(string $asunto) Return ChildUsers objects filtered by the asunto column
 * @psalm-method Collection&\Traversable<ChildUsers> findByAsunto(string $asunto) Return ChildUsers objects filtered by the asunto column
 * @method     ChildUsers[]|Collection findByMensaje(string $mensaje) Return ChildUsers objects filtered by the mensaje column
 * @psalm-method Collection&\Traversable<ChildUsers> findByMensaje(string $mensaje) Return ChildUsers objects filtered by the mensaje column
 * @method     ChildUsers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildUsers> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UsersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \DB\Base\UsersQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DB\\Users', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUsersQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUsersQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildUsersQuery) {
            return $criteria;
        }
        $query = new ChildUsersQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildUsers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UsersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UsersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildUsers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT idregistro, nombre, email, ciudad, departamento, asunto, mensaje FROM users WHERE idregistro = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildUsers $obj */
            $obj = new ChildUsers();
            $obj->hydrate($row);
            UsersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildUsers|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(UsersTableMap::COL_IDREGISTRO, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(UsersTableMap::COL_IDREGISTRO, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the idregistro column
     *
     * Example usage:
     * <code>
     * $query->filterByIdregistro(1234); // WHERE idregistro = 1234
     * $query->filterByIdregistro(array(12, 34)); // WHERE idregistro IN (12, 34)
     * $query->filterByIdregistro(array('min' => 12)); // WHERE idregistro > 12
     * </code>
     *
     * @param mixed $idregistro The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIdregistro($idregistro = null, ?string $comparison = null)
    {
        if (is_array($idregistro)) {
            $useMinMax = false;
            if (isset($idregistro['min'])) {
                $this->addUsingAlias(UsersTableMap::COL_IDREGISTRO, $idregistro['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idregistro['max'])) {
                $this->addUsingAlias(UsersTableMap::COL_IDREGISTRO, $idregistro['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_IDREGISTRO, $idregistro, $comparison);

        return $this;
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%', Criteria::LIKE); // WHERE nombre LIKE '%fooValue%'
     * $query->filterByNombre(['foo', 'bar']); // WHERE nombre IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $nombre The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_NOMBRE, $nombre, $comparison);

        return $this;
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByISBN('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByISBN('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * $query->filterByISBN(['foo', 'bar']); // WHERE email IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $iSBN The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByISBN($iSBN = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iSBN)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_EMAIL, $iSBN, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ciudad column
     *
     * Example usage:
     * <code>
     * $query->filterByCiudad('fooValue');   // WHERE ciudad = 'fooValue'
     * $query->filterByCiudad('%fooValue%', Criteria::LIKE); // WHERE ciudad LIKE '%fooValue%'
     * $query->filterByCiudad(['foo', 'bar']); // WHERE ciudad IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ciudad The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCiudad($ciudad = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ciudad)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_CIUDAD, $ciudad, $comparison);

        return $this;
    }

    /**
     * Filter the query on the departamento column
     *
     * Example usage:
     * <code>
     * $query->filterByDepartamento('fooValue');   // WHERE departamento = 'fooValue'
     * $query->filterByDepartamento('%fooValue%', Criteria::LIKE); // WHERE departamento LIKE '%fooValue%'
     * $query->filterByDepartamento(['foo', 'bar']); // WHERE departamento IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $departamento The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDepartamento($departamento = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($departamento)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_DEPARTAMENTO, $departamento, $comparison);

        return $this;
    }

    /**
     * Filter the query on the asunto column
     *
     * Example usage:
     * <code>
     * $query->filterByAsunto('fooValue');   // WHERE asunto = 'fooValue'
     * $query->filterByAsunto('%fooValue%', Criteria::LIKE); // WHERE asunto LIKE '%fooValue%'
     * $query->filterByAsunto(['foo', 'bar']); // WHERE asunto IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $asunto The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAsunto($asunto = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($asunto)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_ASUNTO, $asunto, $comparison);

        return $this;
    }

    /**
     * Filter the query on the mensaje column
     *
     * Example usage:
     * <code>
     * $query->filterByMensaje('fooValue');   // WHERE mensaje = 'fooValue'
     * $query->filterByMensaje('%fooValue%', Criteria::LIKE); // WHERE mensaje LIKE '%fooValue%'
     * $query->filterByMensaje(['foo', 'bar']); // WHERE mensaje IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $mensaje The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByMensaje($mensaje = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mensaje)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(UsersTableMap::COL_MENSAJE, $mensaje, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildUsers $users Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($users = null)
    {
        if ($users) {
            $this->addUsingAlias(UsersTableMap::COL_IDREGISTRO, $users->getIdregistro(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UsersTableMap::clearInstancePool();
            UsersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UsersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UsersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UsersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
