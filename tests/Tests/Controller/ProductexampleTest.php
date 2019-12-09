<?php

namespace Tests\Entity;


use App\Entity\Productexample;
use PHPUnit\Framework\TestCase;

class ProductexampleTest extends TestCase
{
     /**
     * @dataProvider pricesForFoodProduct
     */
    public function testcomputeTVAFoodProduct($price, $expectedTva)
    {
        $product = new Productexample('Un produit', Productexample::FOOD_PRODUCT, $price);

        $this->assertSame($expectedTva, $product->computeTVA());
    }


    public function testComputeTVAOtherProduct()
    {
        $product = new Productexample('Un autre produit', 'Un autre type de produit', 20);

        $this->assertSame(3.92, $product->computeTVA());
    }

    public function testNegativePriceComputeTVA()
    {
        $product = new Productexample('Un produit', Productexample::FOOD_PRODUCT, -20);

        $this->expectException('LogicException');

        $product->computeTVA();
    }

    
    public function pricesForFoodProduct()
    {
        return [
            [0, 0.0],
            [20, 1.1],
            [100, 5.5]
        ];
    }
    


}
