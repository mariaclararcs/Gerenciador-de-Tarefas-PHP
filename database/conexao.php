<?php
class Database{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "gerenciador";
    private $conn;

    public function __construct(){
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if($this->conn->connect_error) die("Falha ao conectar com o banco de dados");
        $this->TableTasks();
    }

    public function TableTasks(){
        $sql = "CREATE TABLE IF NOT EXISTS task (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            task_name VARCHAR(50) NOT NULL,
            completed INT NOT NULL
        )";
        if($this->conn->query($sql) === false) die("Falha ao criar a tabela task");
    }

    public function GetConexao(){
        return $this->conn;
    }

    public function CloseConexao(){
        $this->conn->close();
    }
}
?>