<?php
require_once 'model/todos.php';
require_once 'common/constant.php';

class TodosController
{

  private $model;
  private $constant;

  public function __CONSTRUCT()
  {
    $this->model = new todos();
    $this->constant = new constant();
  }

  // Called main template
  public function Index()
  {
    require_once 'view/header.php';
    require_once 'view/todo/todo.php';
    require_once 'view/footer.php';
  }

  public function Edit()
  {
    $todo = new todos();

    if (isset($_REQUEST['id'])) {
      $todo = $this->model->Get($_REQUEST['id']);
    }
    if ($todo == false) {
      header('Location: index.php?c=todos');
    }
    require_once 'view/header.php';
    require_once 'view/todo/todo-edit.php';
    require_once 'view/footer.php';
  }

  public function New()
  {
    $todo = new todos();

    require_once 'view/header.php';
    require_once 'view/todo/todo-new.php';
    require_once 'view/footer.php';
  }

  public function Save()
  {
    $todo = new todos();

    $todo->workname = $_REQUEST['workname'];
    $todo->startingdate = $_REQUEST['startingdate'];
    $todo->endingdate = $_REQUEST['endingdate'];
    $todo->status = $_REQUEST['status'];

    $this->model->Register($todo);

    header('Location: index.php?c=todos');
  }

  public function Update()
  {
    $todo = new todos();

    $todo->id = $_REQUEST['id'];
    $todo->workname = $_REQUEST['workname'];
    $todo->startingdate = $_REQUEST['startingdate'];
    $todo->endingdate = $_REQUEST['endingdate'];
    $todo->status = $_REQUEST['status'];

    $this->model->Update($todo);

    header('Location: index.php?c=todos');
  }

  public function Delete()
  {
    $this->model->Delete($_REQUEST['id']);
    header('Location: index.php');
  }
}
