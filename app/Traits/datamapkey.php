<?php
namespace App\Traits;
trait datamapkey{
    /**
     * Function rearrange key for data array of master table.It may be reusable.
     */
    public function CreateDataMapKey($datas,$requredDataMap)
    {
        $array=array();    
        # code...
        //Typecasting data object to array and combining with requried predefine key
        foreach($datas as $data){
            $array[]=(object)array_combine($requredDataMap,(array)$data);
        }
       return $array;
    }
}