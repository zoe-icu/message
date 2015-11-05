<?php
class pdos
{
	private $config = array(
			'dbtype' => "",
			'host' => "",
			'db' => '',
			'user' => '',
			'password' => '',
			'charset' => '',
			'port' => '',
		);
	private static $_pdo;

	public function __construct($config=array())
	{
		if(is_array($config))
		{
			$this->config = array_merge($this->config,$config);
		}
	}

	public function __set($name,$value)
	{
		if(isset($this->config[$name]))
		{
			$this->config[$name] = $value;
		}
	}

	public function __get($name)
	{
		if(isset($this->config[$name]))
		{
			return $this->config[$name];
		}
	}

	public function run()
	{
		$dsn = $this->dbtype . ':host=' . $this->host . ';' . 'dbname=' . $this->db . ';' . 'charset=' . $this->charset . ';' . 'port=' . $this->port;
		try
		{
			self::$_pdo = new PDO($dsn,$this->user,$this->password,array(PDO::ATTR_PERSISTENT=>true));
			//echo 'success<br>';
		}
		catch(Exception $e)
		{
			die('message:'.$e->getMessage());
		}
		self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function fitch($sql)
	{
		$query = self::$_pdo->prepare($sql);
		// $query->bindparam(1,$id);
		// $id = 1;	
		$query->execute();
		$rs = $query->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}

	public function insert($sql)
	{
		$query = self::$_pdo->prepare($sql);
		$query->execute();
		return self::$_pdo->lastInsertId();
	}

	public function delete($sql)
	{
		$query = self::$_pdo->prepare($sql);
		$rs = $query->execute();
		return $rs;
	}
        public function update($sql)
	{
		$query = self::$_pdo->prepare($sql);
		$rs = $query->execute();
		return $rs;
	}
}

