<?php
require_once "conexao.php";

class Query{
    private $conexao;
    
    public function __construct(){
        $this->conexao = new Database();
    }

    public function AddTask($name){
        $sql = $this->conexao->GetConexao()->prepare("INSERT INTO task(task_name, completed) VALUES(?, 0)");
        $sql->bind_param('s', $name);
        $sql->execute();
    }

    public function FinishTask($id){
        $sql = $this->conexao->GetConexao()->prepare("UPDATE task SET completed=1 WHERE id=?");
        $sql->bind_param('i', $id);
        $sql->execute();
    }

    public function GetAllTasks(){
        $sql = $this->conexao->GetConexao()->query("SELECT * FROM task ORDER BY id DESC");
        return $sql->fetch_all(MYSQLI_ASSOC);
    }
}
?>