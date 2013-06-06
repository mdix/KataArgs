<?php

namespace mdix\args\flags;
require_once '../../../autoloader.php';

class FlagKeyl extends BoolFlag {
    protected $argKey = 'l';

    public function setArgValue($value) {
        if ($this->validateGivenValue($value)) {
            $this->argValue = true;
        }
    }

    private function validateGivenValue($value) {
        if ($value === '') {
            return true;
        }
        $this->setErrorMessage('Argument -' . $this->argKey . ' is a boolean argument and therefor can not have a value.');
        return false;
    }
}