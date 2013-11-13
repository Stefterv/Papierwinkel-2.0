<?php
	class databaseObject{
		public $id = 0;
		public static function find($query=""){
			global $connection;
			$result = $connection->query($query);
			$objectArray = array();
			if($result){
				while($row = $result->fetch_assoc()){
					$objectArray[] = static::instance($row);
				}
				return $objectArray;
			}else{
				return false;
			}
		}
		public static function findByID($id){
			return static::findSingle("SELECT * FROM ".static::$dbName." WHERE id={$id} LIMIT 1");
		}
		public static function findAll(){
			return static::find("SELECT * FROM ".static::$dbName);
		}
		public static function findSingle($query=""){
			$result = static::find($query); 
			return !empty($result) ? array_shift($result) : false;
		}
		private static function instance($record){
			$className = get_called_class();
			$object = new $className;
			foreach($record as $attribute=>$value){
				if($object->hasAttr($attribute)){
					$object->$attribute = $value;
				}
			}
			return $object;
		}
		private function hasAttr($attribute){
			$objectVars = get_object_vars($this);
			return array_key_exists($attribute, $objectVars);
		}
		public function submit($echo = false){
			//Check if ID exists
			global $connection;
			$query = "SHOW COLUMNS FROM ".static::$dbName;
			$columns = $connection->query($query);
			$set = "SET ";
			$added = false;
			while($column = $columns->fetch_assoc()){
				$variableName = $column['Field'];
				
				if(isset($this->$variableName)){
					if($added){
						$set .=", ";
					}
					$set .= $variableName."='".$this->$variableName."'";
					$added = true;
				}
				
			}
			
			$result = $connection->query("SELECT * FROM ".static::$dbName." WHERE id={$this->id}");
			if($result->num_rows >0){
				//Update the item in the database
				$query = "UPDATE ".static::$dbName." ".$set. " WHERE id={$this->id}";
				echo $echo?$query:"";
				$result = $connection->query($query);
				
			}else{
				//Create the item in the database
				$query = "INSERT INTO ".static::$dbName." ".$set;
				echo $echo?$query:"";
				$result = $connection->query($query);
				$this->id = $connection->insert_id;
			}
		}
		public function delete(){
			global $connection;
			$query = "DELETE FROM ".static::$dbName."
					WHERE id={$this->id}";
			$connection->query($query);
		}
		public function update($record){
			global $connection;
			foreach($record as $attribute=>$value){
				if($this->hasAttr($attribute)){
					$this->$attribute = $connection->real_escape_string($value);
				}
			}
		}
		public function input($valuename,$attr=""){
			?><input <?php echo $attr?> name="<?php echo $valuename?>" value="<?php echo $this->$valuename?>" ><?php
		}
		public function selected($valuename,$equals,$expr="selected"){
			if($this->$valuename == $equals){
				echo $expr;
			}
		}
		public function inputBool($valuename){
			?>
			<input type="radio" <?php $this->selected($valuename,1,"checked")?> value="1" name="<?php echo $valuename?>"><label>Yes</label>
			<input type="radio" <?php $this->selected($valuename,0,"checked")?> value="0" name="<?php echo $valuename?>"><label>No</label>
			<?php
		}
		public function itemData($value,$prefix){
			?><p prefix="<?php echo $prefix ?>"><?php echo $value ?></p><?php
		}
	}
?>