<?php

namespace PhpCsUi\Checkstyle;

class Error
{
    private $line;
    
    public function setLine($line)
    {
        $this->line = $line;
    }
    
    public function getLine()
    {
        return $this->line;
    }


    private $message;
    
    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
    
}
