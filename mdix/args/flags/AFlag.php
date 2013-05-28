<?php

namespace mdix\args\flags;
require_once '../../../autoloader.php';

abstract class AFlag implements IFlag {
    protected $errorMessage = '';

    public function getArgKey() {
        return $this->argKey;
    }
    public function getArgValue() {
        return $this->argValue;
    }
    public function setArgValue($value) {
        $this->argValue = $value;
    }
    public function getErrorMessage() {
        return $this->errorMessage;
    }
    protected function setErrorMessage($message) {
        $this->errorMessage = $message;
    }
}