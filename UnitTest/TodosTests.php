<?php

use PHPUnit\Framework\TestCase;

class TodosTests extends TestCase
{
  public function testCanCreateTodos()
  {
    $todo =  new todos;
    $todo->workname = 'test-unit';
    $todo->startingdate = '2020-02-07';
    $todo->endingdate = '2020-02-08';
    $todo->status = '1';
    $this->assertSame($todo->Register($todo), true);
  }
}
