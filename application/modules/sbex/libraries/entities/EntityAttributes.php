<?php 
class EntityAttributes {
	private $tableName;
	private $keys = array();
	
	/**
	 *
	 * @param unknown_type $tableName
	*/
	public function __construct($tableName) {
		$this->tableName = $tableName;
	}
	
	/**
	 *
	 */
	public function getTableName() {
		return $this->tableName;
	}
	
	/**
	 *
	 * @param unknown_type $fieldName
	 */
	public function addKey($fieldName) {
		$this->keys[$fieldName] = $fieldName;
	}
	
	/**
	 *
	 */
	public function getKeys() {
		return $this->keys;
	}
}