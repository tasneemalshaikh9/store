<?php

namespace Core\Model;

use Core\Base\Model;

class Item extends Model
{
public function top(): array  {
    $order=$this->connection->prepare("SELECT * FROM items ORDER BY price DESC LIMIT 5");
    $order->execute();
        $result = $order->get_result();
        $order->close();
        $data = array();

        if ($result->num_rows > 0){

            while($row=$result->fetch_object()){
                $data[] = $row;
            }
          
        }
        return $data;
}
}
