<?php
class todos
{
  private $pdo;

  public $id;
  public $workname;
  public $startingdate;
  public $endingdate;
  public $status;

  public function __CONSTRUCT()
  {
    try {
      $this->pdo = Database::Connect();
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Lists()
  {
    try {
      $result = array();
      $stm = $this->pdo->prepare("SELECT *, DATE_FORMAT(startingdate,'%m/%d/%Y') as startingDateFormat, DATE_FORMAT(endingdate,'%m/%d/%Y') as endingDateFormat FROM todos");
      $stm->execute();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Get($id)
  {
    try {
      $stm = $this->pdo->prepare("SELECT * FROM todos WHERE id = ?");
      $stm->execute(array($id));
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Delete($id)
  {
    try {
      $stm = $this->pdo
        ->prepare("DELETE FROM todos WHERE id = ?");

      $stm->execute(array($id));
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Update($data)
  {
    try {
      $sql = "UPDATE todos SET
						workname      = ?,
						startingdate  = ?,
            endingdate    = ?,
            status        = ?
				    WHERE id = ?";

      $this->pdo->prepare($sql)
        ->execute(
          array(
            $data->workname,
            $data->startingdate,
            $data->endingdate,
            $data->status,
            $data->id
          )
        );
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function Register(todos $data)
  {
    try {
      $sql = "INSERT INTO todos (workname,startingdate,endingdate,status)
		        VALUES (?, ?, ?, ?)";

      return $this->pdo->prepare($sql)
        ->execute(
          array(
            $data->workname,
            $data->startingdate,
            $data->endingdate,
            $data->status
          )
        );
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
