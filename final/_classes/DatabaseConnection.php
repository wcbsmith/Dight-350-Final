<?php
  class DatabaseConnection {
		public static function getConnection() {
			$host = 'localhost';
			$database = 'tardissh_smith';
			$user = 'tardissh_CalSmi';
			$pass = 'Dight350_1907!';
			$dsn = "mysql:host={$host};dbname={$database}";
			$options= [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			];
			$connection = null;

			$connection = new PDO($dsn, $user, $pass, $options);

			return $connection;
		}
  }
?>
