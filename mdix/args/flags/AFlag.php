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
    public function getErrorMessage() {
        return $this->errorMessage;
    }

    public function setArgValue($value) {
        $this->argValue = $value;
    }
    protected function setErrorMessage($message) {
        $this->errorMessage = $message;
    }
}