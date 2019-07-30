<?php
class Validation extends Module
{
    private $errors = array();

    public function validate($name, $field, $rules=array())
    {
        foreach($rules as $key => $value)
        {
            switch($key)
            {
                case 'notempty':
                    if(!$field || trim(strlen($field))<1)
                    {
                        $this->setError($name,sprintf($this->l("%s - can not be empty."),$name));
                    }
                break;

                case 'maxlength':
                    if(strlen($field)>$value)
                    {
                        $this->setError($name,sprintf($this->l("%s - value '%s' is too long. Maximum is %s characters."),$name,$field,$value));
                    }
                break;

                case 'minlength':
                    if(strlen($field)<$value)
                    {
                        $this->setError($name,sprintf($this->l("%s - value '%s' is too short. Minimum is %s characters."),$name,$field,$value));
                    }
                break;

                case 'isnumber':
                    if(!is_numeric($field))
                    {
                        $this->setError($name,sprintf($this->l("%s - value '%s' is not a number."),$name,$field));
                    }
                break;

                case 'ishex':
                    if((strlen($field)!=4 || strlen($field)!=7) && substr($field,0,1)!="#")
                    {
                        $this->setError($name,sprintf($this->l("%s - value '%s' is not valid HEX color."),$name,$field));
                    }
                    break;
            }
        }
    }

    private function setError($name,$msg)
    {
        $this->errors[$name][] = $msg;
    }


    public function getError($name)
    {
        return @$this->errors[$name];
    }

    public function getAllErrors()
    {
        return $this->errors;
    }

}