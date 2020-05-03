<?php
namespace models;

public function hydrate(array $data)
{
    foreach ( $data as $key => $value) {
    $getData = 'set'.$key;
    echo $key.$data;
    if (method_exists($this, $getData)) {$this->$getData($value);}
}
}
 ?>
