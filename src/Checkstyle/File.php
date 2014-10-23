<?php

namespace PhpCsUi\Checkstyle;

class File
{
    private $filename;
    
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }
    
    public function getFilename()
    {
        return $this->filename;
    }
    
    private $relativefilename;
    
    public function setRelativeFilename($relativefilename)
    {
        $this->relativefilename = $relativefilename;
    }
    
    public function getRelativeFilename()
    {
        return $this->relativefilename;
    }
    
    public function addError(Error $error)
    {
        $this->errors[] = $error;
    }
    
    public function getErrors()
    {
        return $this->errors;
    }
}
