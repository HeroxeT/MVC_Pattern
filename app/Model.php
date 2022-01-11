<?php


class Model
{
    public function attributes()
    {
        $values = array();
        foreach ($this as $key => $value) {
            array_push($values, $key);
        }
        return $values;
    }

    public function className()
    {
        return get_class($this);
    }

    public function enterValues($values)
    {
        foreach ($this as $key=>$value){
            foreach ($values as $info=>$enter){
                if ($key === $info){
                    $this->$key = $enter;
                }
            }
        }
        return $this;
    }
}
