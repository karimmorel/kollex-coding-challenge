<?php

/**
 * Following the representation described in the swagger.yaml file, I list only getters and setters for the required properties
 */

namespace kollex\Dataprovider\Assortment;


interface Product extends \JsonSerializable
{
    public function getId();
    public function setId(string $id);
    public function getManufacturer();
    public function setManufacturer(string $manufacturer);
    public function getName();
    public function setName(string $name);
    public function getBaseProductPackaging();
    public function setBaseProductPackaging(string $baseProductPackaging);
    public function getBaseProductAmount();
    public function setBaseProductAmount(float $baseProductAmount);
    public function getBaseProductUnit();
    public function setBaseProductUnit(string $baseProductUnit);
    public function getPackaging();
    public function setPackaging(string $packaging);
    public function getBaseProductQuantity();
    public function setBaseProductQuantity(int $baseProductQuantity);

    public function isValid();
}
