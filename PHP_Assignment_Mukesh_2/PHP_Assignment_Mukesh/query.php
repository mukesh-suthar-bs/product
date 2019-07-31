<?php 

/**
 * 
 */
class TableData
{
	protected $_name;
	protected $_connection;
	function __construct($name,$connection)
	{
		$this->_name = $name;
		$this->_connection = $connection;
	}
	public function select($params)
	{
		$sql = 'SELECT * FROM ' . $this->_name;

		$where = $params['where'];

		if (!empty($where)) {
			$queryStrings = array();
			foreach ($where as $key => $value) {
				$queryStrings[] = " $key = '$value'";
			}
			$sql .= " where " . implode(' and', $queryStrings);
		}

		if (!empty($params['limit'])) {
			$sql .= ' LIMIT ' . $params['limit'];
		}

		if (!empty($params['offset'])) {
			$sql .= ' OFFSET ' . $params['offset'];
		}
		$result = mysqli_query($this->_connection, $sql);

		return $result;
		
		
	}
	public function rowCount($params)
	{
		$sql = 'SELECT COUNT(*) FROM ' . $this->_name;

		

		if (!empty($params['where'])) {
			$queryStrings = array();
			$where = $params['where'];
			foreach ($where as $key => $value) {
				$queryStrings[] = " $key = $value";
			}
			$sql .= " where " . implode(' and', $queryStrings);
		}
		$result = mysqli_query($this->_connection, $sql);

		return $result;
		
	}
	public function insertData($params)
	{
		$sql = 'INSERT INTO ' . $this->_name ;

		if (!empty($params)) {
			$keyStrings = array();
			$valueStrings = array();
			foreach ($params as $key => $value) {
				$keyStrings[] = "$key";
				$valueStrings[] = " '$value'";
			}
			$sql .= " (" . implode(', ', $keyStrings);
			$sql .= " ) VALUE ( " . implode(', ', $valueStrings);
			$sql .= " )";

		}
		
		$result = mysqli_query($this->_connection, $sql);

		return $result;
	}
	public function rowUpdate($params, $where)
	{
		$sql = 'UPDATE ' . $this->_name;

		

		if (!empty($params)) {
			$keyStrings = array();
			$valueStrings = array();
			foreach ($params as $key => $value) {
				$queryStrings[] = " $key = '$value'";
			}
			$sql .= " SET " . implode(' ,', $queryStrings);
		}
		if (!empty($where)){
			$queryStrings = array();
			foreach ($where as $key => $value) {
				$queryStrings[] = " $key = $value";
			}
			$sql .= " where " . implode(' and', $queryStrings);
		}
		$results = mysqli_query($this->_connection, $sql);

		return $results;
		
	}

}




?>