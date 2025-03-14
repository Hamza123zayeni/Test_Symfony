<?php
namespace App\tests\Entity;
use App\Entity\Projet;
use PHPUnit\Framework\TestCase;

class ProjetTest extends TestCase{
    public function testInvalidePrice(){
        $p=new Projet('pomme','fruit',-1);
        $this->expectException('Exception');
        $p->computeTVA();
    }
    public function testDefault(){
        $projet=new projet('pomme','food',1);
        $this->assertSame(0.055,$projet->computeTVA());
    }

     /**
     * @dataProvider priceFood
     */
    public function testMultiFood($prix, $tva)
    {
        $p = new Projet("produit", "food", $prix);
        $this->assertSame($tva, $p->computeTVA());
    }

    public function priceFood()
    {
        return [
            [0.00, 0.0],   
            [1, 0.055],    
            [10, 0.55],    
            [20, 1.1],     
        ];
    }
}
?>