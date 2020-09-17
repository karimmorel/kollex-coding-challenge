<?php

namespace kollex\Dataprovider\Assortment;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use \kollex\Dataprovider\Assortment\ProductInterface;

class Product implements ProductInterface {

    private $id;
    private $gtin;
    private $manufacturer;
    private $name;
    private $baseProductPackaging;
    private $baseProductAmount;
    private $baseProductUnit;
    private $packaging;
    private $baseProductQuantity;

    public function __construct(?iterable $data)
    {
        if ($data)
        {
            $data['id'] ? $this->setId($data['id']) : false;
            $data['gtin'] ? $this->setGtin($data['gtin']) : false;
            $data['manufacturer'] ? $this->setManufacturer($data['manufacturer']) : false;
            $data['name'] ? $this->setName($data['name']) : false;
            $data['baseProductPackaging'] ? $this->setBaseProductPackaging($data['baseProductPackaging']) : false;
            $data['baseProductAmount'] ? $this->setBaseProductAmount($data['baseProductAmount']) : false;
            $data['baseProductUnit'] ? $this->setBaseProductUnit($data['baseProductUnit']) : false;
            $data['packaging'] ? $this->setPackaging($data['packaging']) : false;
            $data['baseProductQuantity'] ? $this->setBaseProductQuantity($data['baseProductQuantity']) : false;
        }
    }

    /**
     * @String
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @String
     */
    public function getGtin()
    {
        return $this->gtin;
    }

    public function setGtin(string $gtin)
    {
        $this->gtin = $gtin;
        return $this;
    }

    /**
     * @String
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer)
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    /**
     * @String
     */
    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @String
     */
    public function getBaseProductPackaging()
    {
        return $this->baseProductPackaging;
    }

    public function setBaseProductPackaging(string $baseProductPackaging)
    {
        $this->baseProductPackaging = $baseProductPackaging;
        return $this;
    }

    /**
     * @Float
     */
    public function getBaseProductAmount()
    {
        return $this->baseProductAmount;
    }

    public function setBaseProductAmount(float $baseProductAmount)
    {
        $this->baseProductAmount = $baseProductAmount;
        return $this;
    }

    /**
     * @String
     */
    public function getBaseProductUnit()
    {
        return $this->baseProductUnit;
    }

    public function setBaseProductUnit(string $baseProductUnit)
    {
        $this->baseProductUnit = $baseProductUnit;
        return $this;
    }

    /**
     * @String
     */
    public function getPackaging()
    {
        return $this->packaging;
    }

    public function setPackaging(string $packaging)
    {
        $this->packaging = $packaging;
        return $this;
    }

    /**
     * @Integer
     */
    public function getBaseProductQuantity()
    {
        return $this->baseProductQuantity;
    }

    public function setBaseProductQuantity(int $baseProductQuantity)
    {
        $this->baseProductQuantity = $baseProductQuantity;
        return $this;
    }

    // -- -- -- -- 

    public function isValid() {
        $errors = $this->validate();
        return ! count($errors) > 0;
    }

    public function validate()
    {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('getValidationMetadata')
            ->getValidator();

        return $validator->validate($this);
    }

    public static function getValidationMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint('id', new Assert\Type("string"));
        $metadata->addPropertyConstraint('manufacturer', new Assert\NotBlank());
        $metadata->addPropertyConstraint('manufacturer', new Assert\Type("string"));
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('name', new Assert\Type("string"));
        $metadata->addPropertyConstraint('packaging', new Assert\NotBlank());
        $metadata->addPropertyConstraint('packaging', new Assert\Type("string"));
        $metadata->addPropertyConstraint('baseProductPackaging', new Assert\NotBlank());
        $metadata->addPropertyConstraint('baseProductPackaging', new Assert\Type("string"));
        $metadata->addPropertyConstraint('baseProductUnit', new Assert\NotBlank());
        $metadata->addPropertyConstraint('baseProductUnit', new Assert\Type("string"));
        $metadata->addPropertyConstraint('baseProductAmount', new Assert\NotBlank());
        $metadata->addPropertyConstraint('baseProductAmount', new Assert\Type("float"));
        $metadata->addPropertyConstraint('baseProductQuantity', new Assert\NotBlank());
        $metadata->addPropertyConstraint('baseProductQuantity', new Assert\Type("integer"));
    }

    public function jsonSerialize()
    {
        $data = get_object_vars($this);

        return $data;
    }


}