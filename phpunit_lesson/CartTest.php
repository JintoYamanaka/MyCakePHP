<?php
require_once('Cart.php');

class CartTest extends PHPUnit\Framework\TestCase
{
    public function testInitCart() {
        $cart = new Cart();
        $this->assertTrue(is_array($cart->getItems()));
        $this->assertEquals(0, count($cart->getItems()));
    }

    public function testAdd() {
        $cart = new Cart();
        $this->assertTrue($cart->add('001', 1));
        $this->assertTrue($cart->add('001', 0));
        $this->assertTrue($cart->add('001', -1));
    }

    public function testAddNotNumeric() {
        $cart = new Cart();
        try {
            $cart->add('001', 'string');
        } catch (UnexpectedValueException $e) {
            return;
        }
        $this->fail();
    }

    public function testAddFloat() {
        $cart = new Cart();
        try {
            $cart->add('001', 1.5);
        } catch (UnexpectedValueException $e) {
            return;
        }
        $this->fail();
    }
}

 ?>
