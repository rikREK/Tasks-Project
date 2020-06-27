<?php
namespace App\Queries;
include("helpers/database.php");
use App\helpers\Database;

class UserQueries extends Database{
  public function getUser(string $user){
    $sql = 'SELECT * FROM users WHERE username= :username';
    $query = $this->pdo->prepare($sql);
    $query->execute([
      'username' => $user
    ]);
    $result = $query->fetch(\PDO::FETCH_ASSOC);
    return $result;
  }
  
  public function createUser($username, $password){
    $sql = 'INSERT INTO users (username, password) VALUES (:username, :password)';
    $query = $this->pdo->prepare($sql);
    $result = $query->execute([
      'username' => $username,
      'password' => $password
    ]);
    return $result;
  }
  public function updateLogin($username, $token)
	{
		$sql = 'UPDATE users SET token = :token WHERE username = :username';
		$query = $this->pdo->prepare($sql);
		$result = $query->execute([
			'username' => $username,
			'token' => $token
		]);

		return $result;
  }
  public function getToken(string $token){
    $sql = 'SELECT * FROM users WHERE token= :token';
    $query = $this->pdo->prepare($sql);
    $query->execute([
      'token' => $token
    ]);
    $result = $query->fetch(\PDO::FETCH_ASSOC);
    return $result;
  }
}
