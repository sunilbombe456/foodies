<?php

class Database{

var $HOST;
var $USER;
var $PASS;
var $DBNAME;

var $conn="";

						function Database($host,$user,$pass,$dbname)
						{
							$this->HOST=$host;
							$this->USER=$user;
							$this->PASS=$pass;
							$this->DBNAME=$dbname;
						}

						function connect()
						{

							if(!$this->conn=@mysqli_connect($this->HOST,$this->USER,$this->PASS,$this->DBNAME))
							{
								echo"connection is not done";
							}
							
							if(!@mysqli_select_db($this->conn,$this->DBNAME))
							{
								echo"database is not connected";
							}
							
							return $this->conn;
						}
						
						function insert_query($table,$data)
						{

							$key =array_keys($data);
							$val =array_values($data);
							$sql="INSERT INTO $table (".implode(', ',$key).") VALUES ('".implode("', '",$val)."')";
							if(mysqli_query($this->conn,$sql))
							{
								return true;
							}
							else
							{
								return false;
							}

						}

						function insert_where_query($table,$data,$where)
						{

							$cKey=array_keys($data);
							$cVal=array_values($data);
							$wKey=array_keys($where);
							$wVal=array_values($where);
							$sql="INSERT INTO ".$table." ('".implode('\',\'',$cKey)."') VALUES ('".implode('\',\'',$cVal)."') WHERE ".implode('',$wKey)."=".implode('',$wVal);
							if(mysqli_query($this->conn,$sql))
							{
								return true;
							}
							else
							{
								return false;
							}


						}

						function delete_query_where($table,$where)
						{
							$key=array_keys($where);
							$val=array_values($where);
							$sql="DELETE FROM $table WHERE ".implode('',$key)."=".implode('',$val);
							if(mysqli_query($this->conn,$sql))
							{
								return true;

							}
							else
							{
								return false;
							}
						}


						function select_query($table)
						{
							$sql="SELECT * FROM $table ";
							if($result=mysqli_query($this->conn,$sql)){
								return $result;

							}
							else
							{
								echo"$sql";
							}

						}


						function select_query_where_two($table,$where1,$where2)
						{
							$wkey1=array_keys($where1);
							$wval1=array_values($where1);
							$wkey2=array_keys($where2);
							$wval2=array_values($where2);
							$sql="SELECT * FROM $table WHERE ".implode('',$wkey1)."='".implode('',$wval1)."' AND ".implode('',$wkey2)."='".implode('',$wval2)."'";
							if($result=mysqli_query($this->conn,$sql)){
								$data=mysqli_fetch_array($result);
								return $data;

							}
							else
							{
								echo"$sql";
							}

						}

						function select_query_where($table,$where1)
						{
							$wkey1=array_keys($where1);
							$wval1=array_values($where1);
							$sql="SELECT * FROM $table WHERE ".implode('',$wkey1)."='".implode('',$wval1)."'";
							if($result=mysqli_query($this->conn,$sql)){
								$data=mysqli_fetch_array($result);
								return $data;

							}
							else
							{
								echo"$sql";
							}

						}

						function update_query_where($table,$data,$where)
						{
							$wher_key = array_keys($where);
							$wher_val = array_values($where);

							$user_data;

							foreach($data as $key=>$val)
							{
								$user_data .=" $key ='".$val."'";
							}

							$sql=" UPDATE $table SET $user_data WHERE ".implode('',$wher_key)."='".implode('',$wher_val)."'";

							if(mysqli_query($this->conn,$sql))
							{
							 

							}
							else
							{
								echo"$sql";
							}
						}


						function select_where_query($table,$where1)
						{
							$wkey1=array_keys($where1);
							$wval1=array_values($where1);
							$sql="SELECT * FROM $table WHERE ".implode('',$wkey1)."='".implode('',$wval1)."'";
							if($result=mysqli_query($this->conn,$sql)){
								return $result;

							}
							else
							{
								echo"$sql";
							}

						}

						function upload_image($fileName,$fileTempName,$targetPath)
						{
								$targetPath=$targetPath."/";
								$targetPath=$targetPath.basename($fileName);
								if(move_uploaded_file($fileTempName,$targetPath))
								{
									return true;
								}
								else
								{
									return false;
								}
						}






}





?>