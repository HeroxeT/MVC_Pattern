<?php
namespace Base;

class Model
{
    public function attributes(): array
    {
        $values = array();
        foreach ($this as $key => $value) {
            array_push($values, $key);
        }
        return $values;
    }

    public function className(): string
    {
        return get_class($this);
    }
    //TODO СОЗДАТЬ ОПТИМАЛЬНУЮ ФУНКЦИЮ SAVE в базу данных
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
    public function validDB(): array
    {
        $res = array();
        foreach ($this as $key=>$value){
            if (!is_null($value))
                $res[':'.$key] = $this->$key;
        }
        return $res;
    }

    public function findByQuery(array $search, array $value){
        $strparam ='';
        $mass = array();
        for($i = 0; $i<count($search); $i++) {
            $plus = $i+1 != count($search) ? 'AND ' : '';
            $mass[':'.$search[$i]] = $value[$i];
            $strparam .="`".$search[$i]."` = :".$search[$i].' '.$plus;
        }
        $query = "SELECT * FROM `users` WHERE ".$strparam;
        $res =\App::$db->execute($query, $mass);
        return count($res) > 0 ? $res : false;
    }
}
