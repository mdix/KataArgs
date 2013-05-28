<?php

namespace mdix\args\flags;
require_once '../../../autoloader.php';

interface IFlag {
    public function getArgKey();
    public function getArgValue();
    public function setArgValue($value);

    public function getErrorMessage();
}