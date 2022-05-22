<?php

namespace DB\Base;

use \Exception;
use \PDO;
use DB\Ciudades as ChildCiudades;
use DB\CiudadesQuery as ChildCiudadesQuery;
use DB\Map\CiudadesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'ciudades' table.
 *
 *
 *
 * @method     ChildCiudadesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildCiudadesQuery orderByCiudad($order = Criteria::ASC) Order by the ciudad column
 * @method     ChildCiudadesQuery orderByIddpto($order = Criteria::ASC) Order by the iddpto column
 *
 * @method     ChildCiudadesQuery groupById() Group by the id column
 * @method     ChildCiudadesQuery groupByCiudad() Group by the ciudad column
 * @method     ChildCiudadesQuery groupByIddpto() Group by the iddpto column
 *
 * @method     ChildCiudadesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCiudadesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCiudadesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCiudadesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCiudadesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCiudadesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCiudades|null findOne(?ConnectionInterface $con = null) Return the first ChildCiudades matching the query
 * @method     ChildCiudades findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildCiudades matching the query, or a new ChildCiudades object populated from the query conditions when no match is found
 *
 * @method     ChildCiudades|null findOneById(int $id) Return the first ChildCiudades filtered by the id column
 * @method     ChildCiudades|null findOneByCiudad(string $ciudad) Return the first ChildCiudades filtered by the ciudad column
 * @method     ChildCiudades|null findOneByIddpto(int $iddpto) Return the first ChildCiudades filtered by the iddpto column *

 * @method     ChildCiudades requirePk($key, ?ConnectionInterface $con = null) Return the ChildCiudades by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiudades requireOne(?ConnectionInterface $con = null) Return the first ChildCiudades matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiudades requireOneById(int $id) Return the first ChildCiudades filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiudades requireOneByCiudad(string $ciudad) Return the first ChildCiudades filtered by the ciudad column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCiudades requireOneByIddpto(int $iddpto) Return the first ChildCiudades filtered by the iddpto column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCiudades[]|Collection find(?ConnectionInterface $con = null) Return ChildCiudades objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildCiudades> find(?ConnectionInterface $con = null) Return ChildCiudades objects based on current ModelCriteria
 * @method     ChildCiudades[]|Collection findById(int $id) Return ChildCiudades objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildCiudades> findById(int $id) Return ChildCiudades objects filtered by the id column
 * @method     ChildCiudades[]|Collection findByCiudad(string $ciudad) Return ChildCiudades objects filtered by the ciudad column
 * @psalm-method Collection&\Traversable<ChildCiudades> findByCiudad(string $ciudad) Return ChildCiudades objects filtered by the ciudad column
 * @method     ChildCiudades[]|Collection findByIddpto(int $iddpto) Return ChildCiudades objects filtered by the iddpto column
 * @psalm-method Collection&\Traversable<ChildCiudades> findByIddpto(int $iddpto) Return ChildCiudades objects filtered by the iddpto column
 * @method     ChildCiudades[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildCiudades> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CiudadesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \DB\Base\CiudadesQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DB\\Ciudades', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCiudadesQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCiudadesQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildCiudadesQuery) {
            return $criteria;
        }
        $query = new ChildCiudadesQuery();
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
     * @return ChildCiudades|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CiudadesTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = CiudadesTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildCiudades A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, ciudad, iddpto FROM ciudades WHERE id = :p0';
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
            /** @var ChildCiudades $obj */
            $obj = new ChildCiudades();
            $obj->hydrate($row);
            CiudadesTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildCiudades|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(CiudadesTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(CiudadesTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(CiudadesTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(CiudadesTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CiudadesTableMap::COL_ID, $id, $comparison);

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

        $this->addUsingAlias(CiudadesTableMap::COL_CIUDAD, $ciudad, $comparison);

        return $this;
    }

    /**
     * Filter the query on the iddpto column
     *
     * Example usage:
     * <code>
     * $query->filterByIddpto(1234); // WHERE iddpto = 1234
     * $query->filterByIddpto(array(12, 34)); // WHERE iddpto IN (12, 34)
     * $query->filterByIddpto(array('min' => 12)); // WHERE iddpto > 12
     * </code>
     *
     * @param mixed $iddpto The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIddpto($iddpto = null, ?string $comparison = null)
    {
        if (is_array($iddpto)) {
            $useMinMax = false;
            if (isset($iddpto['min'])) {
                $this->addUsingAlias(CiudadesTableMap::COL_IDDPTO, $iddpto['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($iddpto['max'])) {
                $this->addUsingAlias(CiudadesTableMap::COL_IDDPTO, $iddpto['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(CiudadesTableMap::COL_IDDPTO, $iddpto, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildCiudades $ciudades Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($ciudades = null)
    {
        if ($ciudades) {
            $this->addUsingAlias(CiudadesTableMap::COL_ID, $ciudades->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the ciudades table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CiudadesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CiudadesTableMap::clearInstancePool();
            CiudadesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CiudadesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CiudadesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CiudadesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CiudadesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
