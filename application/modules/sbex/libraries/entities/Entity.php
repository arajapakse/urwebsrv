<?php 

/**
 * Entity Base class for all other entities
 */
abstract class Entity {
	private static $preDefRedisKeys = array();
	private $ea;
	private $ci;
	
	// Consultant Entity Fields
	protected $data = array();
	
/**
 * $oirapDB = $this->load->database("oirap",TRUE);
		$sbexDb = $this->load->database('sbex', TRUE);
 */
	protected static $sbexDB = null;
	protected static $oirapDB = null;
	
	public function __construct(EntityAttributes $ep) {
		$this->ea = $ep;
		$this->ci =& get_instance();
		self::loadDatabases();
	}

	protected static function loadDatabases( $ci = null){
		if(!$ci){
			$ci = &get_instance();
		}
		log_message("debug","Loading Databases");	
		if(Entity::$sbexDB == null){
			Entity::$sbexDB = $ci->load->database("sbex",TRUE);
		}
	}
	
	/**
	 * Return codeignite to subclasses
	 */
	protected function getCI() {
		return $this->ci;
	}
	
	/**
	 * Return a value based on the passed in key
	 * @param String $key
	 */
	public function __get($key) {
		if (array_key_exists($key, $this->data)) {
			return $this->data[$key];
		}
		return null;
	}
	
	/**
	 * Set $data values
	 * @param String $var
	 * @param $value
	 */
	public function __set($var, $value) {
		$this->data[$var] = $value;
	}
	
	public function __unset($var){
		unset($this->data[$var]);
	}
	
	/**
	 * Return the Entity Table Name
	 * @return String table Name
	 * @throws APIException
	 */
	public function getTableName() {
		$tableName = $this->ea->getTableName();
		
		if (!empty($tableName)) {
			return $tableName;
		}
		
		throw Exception('Undefined Database Table Name');
	}
	
	/**
	 *  Return the key fields
	 *  @throws APIException
	 */
	public function getKeyFields() {
		$pkFields = $this->ea->getKeys();
		
		if (!empty($pkFields)) {
			ksort($pkFields);
			return $pkFields;
		}
		throw Exception('No Primary Keys defined');
	}	
	
	/**
	 * Return a value of key values assos array
	 * @return Array($key, $value)
	 */
	public function getKeyValues() {
		$pkFields = $this->getKeyFields();
		
		$result = array();
		foreach ($pkFields as $field) {
			if (isset($this->data[$field])) {
				$result[$field] = $this->data[$field];
			}
			else {
				$result[$field] = '';
			}
		}
		
		return $result;
	}
	
	/**
	 * return all object propertes as an array
	 */
	public function getData() {
		return $this->data;
	}
	
	/**
	 * Set static redis keys
	 
	public static function setRedisKey($key) {
		self::$preDefRedisKeys[] = $key;
	}
	
	/**
	 * Reset Redis Keys
	 
	public static function expirePreDefRedisKeys() {

		if (!empty(self::$preDefRedisKeys)) {
			$redis = new \Redis();

			foreach (self::$preDefRedisKeys as $redisKey) {
				$redis->set($redisKey, '', -1);
			}
		}
	}
	
	/**
	 * This should be used override by subclasses to insert redis clean up code
	 
	public function redisCleanUp() { }
	
	/**
	 * Insert
	 */
	public function insert() {		
		$ret = false;
		$tableName = $this->getTableName();
		
		if (!empty($this->data)) {
			$mysqlFunctions = array('NOW()');
			
			foreach ($this->data as $key=>$d) {
				if (in_array($d, $mysqlFunctions)) {
					Entity::$sbexDB->set($key, $d, FALSE);
					unset($this->data[$key]);
				}		
			}

			if (Entity::$sbexDB->insert($tableName, $this->data)) {
				$keyFields = $this->getKeyFields();
				
				if (!empty($keyFields) && (count($keyFields) == 1)) {
					$key = array_shift($keyFields);

					if (empty($this->data[$key])) {

						$tempId = Entity::$sbexDB->insert_id();
						if ($tempId != 0) {
							$this->data[$key] = Entity::$sbexDB->insert_id();
						}
					}
					//$keyFieldValues = $this->getKeyValues();
					
					//$redisKey = $this->getRedisObjKey($keyFieldValues);
					
					// Load data into Redis
					//$redis = new \Redis();
					//$expire_time =  $this->ci->config->item('redis_expire_time');
					//$redis->set($redisKey, serialize($this->data), $expire_time);
					//$this->redisCleanUp();
				}
				
				$ret = true;
			}
			else {
				throw \APIException(\APIError::getError(\APIError::DB_INSERT_ERROR), \APIError::DB_INSERT_ERROR);
			}				
		}
		else {
			throw new \APIException('Action is not permitted by this class');
		}
		
		return $ret;
	}
	
	/**
	 * Update
	 *
	 * Example how the parameter gets interpreted:
	 */
	public function update() {
		$ret = false;
		$tableName = $this->getTableName();
		$keys = $this->getKeyValues();

		if (!empty($keys)) {
			//$redisKey = $this->getRedisObjKey($keys);
			$params = $keys;
			
			if (!empty($params)) {
				$mysqlFunctions = array('NOW()');
					
				foreach ($this->data as $key=>$d) {
					if (in_array($d, $mysqlFunctions)) {
						Entity::$sbexDB->set($key, $d, FALSE);
						unset($this->data[$key]);
					}
				}
				
				Entity::$sbexDB->where($params);
				Entity::$sbexDB->update($tableName,  $this->data);
				Entity::$sbexDB->limit(1);
		
				// Load data into Redis
				//$redis = new \Redis();
				//$expire_time =  $this->ci->config->item('redis_expire_time');
				//$redis->set($redisKey, serialize($this->getData()), $expire_time);
				//$this->redisCleanUp();
				$ret = true;
			}
			else {
				throw new \APIException('Update method is not permitted by this class');
			}
		}
		
		return $ret;
	}

	/**
	 * Delete
	 * 
	 * Delete the current loaded record. 
	 * Primary Field & key is required to use this function
	 */
	public function delete() {
		$ret = false;
		$tableName = $this->getTableName();
		$keys = $this->getKeyValues();

		if (!empty($keys)) {
			Entity::$sbexDB->where($keys);			
			Entity::$sbexDB->limit(1);
			
			//$redis = new \Redis();
			//$redisKey = $this->getRedisObjKey($keys);
			//$redis->set($redisKey, '', -1);
			//$this->redisCleanUp();
			
			if (Entity::$sbexDB->delete($tableName)) {
				$this->data = array();
				return true;
			}			
		}
		
		return false;
	}
	
	/**
	 * Return the last query 
	 */
	public function last_query() {
		
		return Entity::$sbexDB->last_query();
	}

	/**
	 * If empty return true else it returns false;
	 *
	 * @return boolean (true | false)
	 */
	public function isEmpty() {
		foreach ($this->data as $key=>$value) {
			$value = trim($value);
			if (!empty($value)) {
				return false;
			}
		}	
		return true;
	}
	
	/**
	 * attributeExists
	 * @param String $var
	 * @return true if the instance member is set else false
	 */
	public function attributeExists($var) {
		if (isset($this->data[$var])) {
			return true;
		}
		return false;
	}
	
	/**
	 * recast stdClass object to an object with type
	 *
	 * @param string $className
	 * @param stdClass $object
	 * @throws InvalidArgumentException
	 * @return mixed new, typed object
	 */
	function copyStdClass(\stdClass &$object) {
		foreach($object as $property => $value) {
			$this->data[$property] = $value;
			unset($object->$property);
		}
		unset($value);
		$object = (unset) $object;
	}
	
	public function setData(array $data) {
		$this->data = $data;
	}
	
	/**
	 * Return true | false if the passed in conditions return a value
	 * e.g. 
	 * $params = array('Name' => "Bob", 'Age' => '20')
	 * select count(*) from TableName where Name="Bob" and Age = 20 limit 1
	 * 
	 * @param Array $params
	 * @return boolean
	 */
	public function exists($params) {	
		if (!empty($params)) {
			Entity::$sbexDB->where($params);
			Entity::$sbexDB->limit(1);
			$records = Entity::$sbexDB->count_all_results($this->getTableName());
			
			if ($records > 0) {
				return true;
			}
		}
		
		return false;
	}
	/*
	public function getRedisObjKey(array $params) {
		$keyParts = '';
		foreach ($params as $key=>$value) {
			$keyParts .= $key .'@' . $value . ',';
		}
		
		$keyParts = rtrim($keyParts, ',');
		
		return $this->getTableName(). ':'. $keyParts;
	}  
	*/
	
	/**
	 * Load an Entry
	 * 
	 * Example how the parameter gets interpreted:
	 * $params = Array('User_ID', 5, 'Email' => 'test@g.com');
	 * TO
	 * select * from TableName where User_ID = 5 and Email = 'test@g.com'
	 * 
	 * @param Entity $entity
	 * @param Array $params a list of where condindtions (Filter)
	 */
	protected static function loadEntity($tableName, $className ,$params) {
		$obj = new $className;

		static $ci = null;
		if (empty($ci)) {
			$ci =& get_instance();
		}
		
		$keyFields = $obj->getKeyFields();

		
		$redisKey = null;
		if (!is_array($params) && (count($keyFields) == 1)) {
			$keyField = array_shift($keyFields);
			$params = array (
						$keyField => $params
					);
			
			//$redisKey = $obj->getRedisObjKey($params);
		}
		else if (is_array($keyFields) &&  (count($params) == count($keyFields))) {
			$curKeyArray = array_keys($keyFields);
			$paramKeyArray = array_keys($params);
			
			//if ($curKeyArray == $paramKeyArray) {
				//$redisKey = $obj->getRedisObjKey($params);
			//}
		}
		/*
		if (!empty($redisKey)) {
			$redis = new \Redis();
			$data = $redis->get($redisKey);
						
			if (!empty($data)) {				
				$obj->setData(unserialize($data));
				return $obj;
			}
		}
		*/
		Entity::loadDatabases( $ci );
		$query = Entity::$sbexDB->get_where($tableName, $params, 1);

		if ($query->num_rows() > 0) {			
			$std = $query->row();
			$obj->copyStdClass($std);
			$data = $obj->getData();
			
			$keyValue = $obj->getKeyValues();			
			
			if (!empty($keyValue) && is_array($keyValue)) {	
				//$redis = new \Redis();
				
				//$redisKey = $obj->getRedisObjKey($keyValue);
				//$expire_time =  $ci->config->item('redis_expire_time');
				//$redis->set($redisKey, serialize($obj->getData()), $expire_time);
					
				return $obj;				
			}
		}

		return $obj;
	}
}