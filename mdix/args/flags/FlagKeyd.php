<?php

namespace mdix\args\flags;
require_once '../../../autoloader.php';

class FlagKeyd extends StringFlag {
    protected $argKey   = 'd';
    protected $argValue = '';

    public function setArgValue($value) {
        if ($this->validateGivenValue($value)) {
            $this->argValue = $value;
        };
    }

    private function validateGivenValue($value) {
        if ($value !== '') {
            return true;
        }
        $this->setErrorMessage('Argument -' . $this->argKey . ' can not be used without a value.');
        return false;
    }
}