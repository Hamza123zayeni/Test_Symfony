<?php

namespace App\tests\Entity;

use App\Entity\CompteBoncaire;
use PHPUnit\Framework\TestCase;

class CompteBoncaireTest extends TestCase
{
    
    public function testInvalideSold()
    {
        $p = new CompteBoncaire('Hamza',100.0);
        $this->expectException('Exception');
        $p->reterier(2000.0);
       
    }

    public function testDefault(){
        $p=new CompteBoncaire('Hamza',100.0);
        $this->assertSame(30.0,$p->reterier(70.0));
    }
 /**
     * @dataProvider priceBoncaire
     */
    public function testMultiBoncaire($prix, $s,$r)
    {
        $p=new CompteBoncaire('Hamza',$prix);
        $this->assertSame($r, $p->reterier($s));
    }

    public function priceBoncaire()
    {
        return [
            [100.0,30.0,70.0],   
            
               
        ];
    }

}


?>