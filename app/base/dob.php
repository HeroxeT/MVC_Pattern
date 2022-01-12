<?php
namespace Base;

class dob

{
    /**
     * @throws \Exception
     */
    public function randomString($len){
        $bytes = random_bytes($len);
        return bin2hex($bytes);
    }

}
