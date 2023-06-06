<?php

namespace model\interfaceClass;

use PDO;

interface ManagerInterface
{
    public function __construct(PDO $connection);
    public function getOneById(int $id);
    public function getAll();
}