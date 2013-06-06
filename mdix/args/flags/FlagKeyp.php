<?php

namespace mdix\args\flags;
require_once '../../../autoloader.php';

class FlagKeyp extends StringFlag {
    protected $argKey = 'p';
    protected $argValue = 8080;

    public function setArgValue($value) {
        if ($this->validateGivenValue($value)) {
            $this->argValue = intval($value);
        }
    }

    private function validateGivenValue($value) {
        if (intval($value) !== 0) {
            return true;
        }

        $this->setErrorMessage('Argument -' . $this->argKey . ' can only be used with digits.');
        return false;
    }
}