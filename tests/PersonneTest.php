<?php

namespace App\tests\Entity;

use App\Entity\Personne;
use PHPUnit\Framework\TestCase;

class PersonneTest extends TestCase
{
    
    public function testInvalideAge()
    {
        $p = new Personne('Hamza', 'Zayeni', -9);
        $this->expectException('Exception');
        $p->categorie();
       
    }

    public function testPersonneMajeure()
    {
        $p = new Personne('Hamza', 'Zayeni', 21);
        $this->assertSame('majeur', $p->categorie());
    }

    public function testPersonneMineure()
    {
        $m = new Personne('Hamza', 'Zayeni', 5);
        $this->assertSame('mineur', $m->categorie());
    }

    public function testPersonneAgeLimite()
    {
        $p = new Personne('Hamza', 'Zayeni', 18);
        $this->assertSame('majeur', $p->categorie());

        $m = new Personne('Hamza', 'Zayeni', 17);
        $this->assertSame('mineur', $m->categorie());
    }

     /**
     * @dataProvider testpersone
     */
    public function testMultiPersone($age,$c)
    {
        $p = new Personne('Hamza', 'Zayeni', $age);
        $this->assertSame($c, $p->categorie());
    }

    public function testpersone()
    {
        return [
            [18, "majeur"],   
            [17, "mineur"],    
            [5, "mineur"],    
               
        ];
    }
}