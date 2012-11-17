<?php
class Build extends MX_Controller {
	private $oirapReader;
	
	public function __construct() {
		parent::__construct();
		$this->sbexDb = $this->load->database("sbex",TRUE);
	}


	private $tables = array(
			//'OIRAPSurveys' => 'OIRAPSurvey',
			//'OIRAPSpeakers' => 'OIRAPSpeaker',
			'OIRAPExperts' => 'OIRAPExpert'
	);



	public function build_entities() {
		$functionNameOverride = array ('ConsultId' => 'ConsultantId',
									   'Fname' => 'FirstName',
									   'Lname' => 'LastName'
									);

		foreach ($this->tables as $table=>$className) {
			$sql = "describe " . $table;
			$query = $this->sbexDb->query($sql);
// 
			echo '<pre>';
			echo 'class ' . $className . " extends Entity {\n";
			if ($query->num_rows() > 0) {
			   foreach ($query->result() as $row) {
			   		$functionName = ucfirst($row->Field);
			   		$funName = explode('_', $functionName);
			   		foreach ($funName as $k => $v) {
			   			$v = ucfirst($v);

			   			if ( substr($v, -2) == 'ID') {
			   				$i = strlen($v) - 2;
			   				if (substr($v, -2) == 'ID') {
			   					$v = substr_replace($v, "Id", $i, strlen($v));
			   				}

			   			}

			   			$funName[$k] = $v;
			   		}

			   		$functionName = implode('', $funName);
			   		if (array_key_exists($functionName, $functionNameOverride)) {
			   			$functionName = $functionNameOverride[$functionName];
			   		}

			   		$getter = 'get'. $functionName . '()';
			   		$setter = 'set'. $functionName . '($'. strtolower($row->Field) .')';


					echo "\t/**\n";
					echo "\t * {$getter} \n";
					if ($row->Key == 'PRI') {
						echo "\t * Primary Key\n";
					}
					echo "\t *\n";
					echo "\t * @return " . $row->Type . " $" . $row->Field . "\n";
					echo "\t */\n";
					echo "\tpublic function {$getter} {\n";
					echo "\t\treturn " . '$this->' . $row->Field . ";\n";
					echo "\t}\n\n";


					echo "\t/**\n";
					echo "\t * {$setter} \n";
					if ($row->Key == 'PRI') {
					echo "\t * Primary Key\n";
					}
					echo "\t *\n";
					echo "\t * @param " . $row->Type . " $" . $row->Field . "\n";
					echo "\t */\n";
					echo "\tpublic function {$setter} {\n";
					echo "\t\t". '$this->'.$row->Field . ' = '. '$'.strtolower($row->Field) .";\n";
					echo "\t}\n\n";
			   }
			}
			echo "} // end class {$className}\n\n\n\n";
		}

	}


	public function build_models() {
		$primaryKeys = array();
		$primaryKeyGetters = array();
		foreach ($this->tables as $table=>$className) {
			$sql = "describe " . $table;
			$query = $this->db->query($sql);

			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) {
					if ($row->Key == 'PRI') {
						$primaryKeys[$className] = $row->Field;

						$functionName = ucfirst($row->Field);
						$funName = explode('_', $functionName);
						foreach ($funName as $k => $v) {
							$v = ucfirst($v);

							if ( substr($v, -2) == 'ID') {
								$i = strlen($v) - 2;
								if (substr($v, -2) == 'ID') {
									$v = substr_replace($v, "Id", $i, strlen($v));
								}

							}

							$funName[$k] = $v;
						}

						$functionName = implode('', $funName);
						$getter = 'get'. $functionName . '()';
					}
					if (empty($getter)) {
						$getter = "id";
					}

					$primaryKeyGetters[$className] = $getter;
				}
			}
		}
		foreach ($this->tables as $table=>$className) {
			$pk = false;
			if (!empty( $primaryKeys[$className] )) {
				$pk =  $primaryKeys[$className];
			}

			echo "/**\n";
			echo " * Codeignite documentation: \n";
			echo " * @see http://codeigniter.com/user_guide/database/active_record.html \n";
			echo " */\n\n";

			echo "/**\n";
			echo " * $className  Model \n";
			echo " */\n";
			echo "class {$className}_Model extends CI_Model {\n";

			echo "\t/**\n";
			echo "\t * {$className}\n";
			echo "\t */\n";
			echo "\tpublic function __construct() {\n";
			echo "\t\tparent::__construct();\n";
			echo "\t\t".'$this->load->database();'. "\n";
			echo "\t}\n\n";



			echo "\t/**\n";
			echo "\t * {$className} Insert \n";
			echo "\t *\n";
			echo "\t * @param {$className} ". '$'. strtolower($className) . "\n";
			echo "\t */\n";
			echo "\tpublic function insert({$className} $". strtolower($className) .") {\n";
			if (!empty($pk)) {
				echo "\t\t".'return $'. strtolower($className) .'->insert();'."\n";
			}
			echo "\t}\n\n";



			echo "\t/**\n";
			echo "\t * {$className} Update\n";
			echo "\t *\n";
			echo "\t * @param {$className} ". '$'. strtolower($className) . "\n";
			echo "\t */\n";
			echo "\tpublic function update({$className} $". strtolower($className) .") {\n";
			if (!empty($pk)) {
				echo "\t\t".'return $'. strtolower($className) .'->update();'."\n";
			}
			echo "\t}\n\n";



			echo "\t/**\n";
			echo "\t * {$className} Delete\n";
			echo "\t *\n";
			echo "\t * @param {$className} ". '$'. strtolower($className) . "\n";
			echo "\t */\n";
			echo "\tpublic function delete({$className} $". strtolower($className) .") {\n";
			if (!empty($pk)) {
				echo "\t\t".'return $'. strtolower($className) .'->delete();'."\n";
			}
			echo "\t}\n\n";

			if (!empty($pk)) {
				echo "\t/**\n";
				echo "\t * Delete by Consultant Id\n";
				echo "\t *\n";
				echo "\t".' * @param int $id'. "\n";
				echo "\t */\n";
				echo "\tpublic function deleteById(". '$id) {'. "\n";
					echo "\t\t".'$ci->load->library(\'entities/'. $className ."');\n";
					echo "\t\t".'$ci->'. strtolower($className) .'->load($id);'. "\n";
					echo "\t\t".'return $this->delete($ci->'.strtolower($className).');'. "\n";
				echo "\t}\n\n";
			}

			echo "\t/**\n";
			echo "\t * If the ". strtolower($className) . " Exists return true else false;\n";
			echo "\t *\n";
			echo "\t * @param int ". '$id' . "\n";
			echo "\t * @return (bool) true | false;\n";
			echo "\t */\n";
			echo "\tpublic function ". strtolower($className) .'Exists($id) {'. "\n";
			if (!empty($pk)) {
				echo "\t\t".'$obj = self::load($id);'. "\n\n";
				echo "\t\t".'if (!empty($obj)) {'. "\n";
				echo "\t\t\treturn true;\n";
				echo "\t\t}\n\n";
				echo "\t\treturn false;\n";
			}
			echo "\t}\n\n";


			if (!empty($pk)) {
				echo "\t/**\n";
				echo "\t * Query for a record and return an object of it's type\n";
				echo "\t *\n";
				echo "\t * @param Primary Key ". '$id'. "\n";
				echo "\t */\n";
				echo "\tpublic static function load(". '$id'. ") {\n";
				echo "\t\t".'if (!empty($id) && is_numeric($id)) {'. "\n";
				echo "\t\t\t".'$ci =& get_instance();' . "\n";
				echo "\t\t\t".'$ci->load->library(\'entities/'. $className ."');\n";
				echo "\t\t\t". 'if ($ci->'.  strtolower($className) .'->load($id)) {'. "\n";
				echo "\t\t\t\t". 'return $ci->'. strtolower($className) .";\n";
				echo "\t\t\t}\n";
				echo "\t\t}\n\n";
				echo "\t\treturn null;\n";

				echo "\t". '}' . "\n";
				echo "} // end class {$className} Model\n\n\n\n";
			}
			else {
				echo "\t/**\n";
				echo "\t * Query for a record and return an object of it's type\n";
				echo "\t *\n";
				echo "\t * @param  ". '$id'. "\n";
				echo "\t */\n";
				echo "\tpublic static function load() {\n";
				echo "\t}\n\n";
				echo "} // end class {$className} Model\n\n\n\n";
			}
		}

	}
}