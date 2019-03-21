<?php

interface IDao
{
  public function getById($id);
  public function getAll();
  public function save($obj);
  public function update($obj, $params);
  public function delete($obj);
}

