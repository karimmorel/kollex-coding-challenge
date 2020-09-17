<?php

/**
 * Here is my representation of a Product
 * 
 * I hesitated between sending my array of data in the constructor of this class
 * or creating a builder class which would add a specific method to create a Product with my array of data
 * To keep it simple I thought it was better to do it in the constructor
 * 
 * Also I hesitated to use a framework for this project (Symfony or Laravel), but I thought I would only need a Validation object
 * So I just used the Symfony/Validation object I implemented with composer, I think it make the project lighter and more simple
 * 
 */

namespace kollex\Dataprovider\Assortment;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use \kollex\Dataprovider\Assortment\Product;
use \kollex\Mapper\AbstractMapper;

class BaseProduct implements Product {

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

    // Validating data (The isValid() method is automatically called by the DataProvider)

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

    // Following the Swagger.yaml representation, I hope I forgot nothing :)

    public static function getValidationMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('id', new Assert\NotBlank());
        $metadata->addPropertyConstraint('id', new Assert\Type("string"));

        $metadata->addPropertyConstraint('gtin', new Assert\Type("string"));

        $metadata->addPropertyConstraint('manufacturer', new Assert\NotBlank());
        $metadata->addPropertyConstraint('manufacturer', new Assert\Type("string"));

        $metadata->addPropertyConstraint('name', new Assert\NotBlank());
        $metadata->addPropertyConstraint('name', new Assert\Type("string"));

        $metadata->addPropertyConstraint('packaging', new Assert\NotBlank());
        $metadata->addPropertyConstraint('packaging', new Assert\Type("string"));
        $metadata->addPropertyConstraint('packaging', new Assert\Choice(array_values(AbstractMapper::$productPackaging)));

        $metadata->addPropertyConstraint('baseProductPackaging', new Assert\NotBlank());
        $metadata->addPropertyConstraint('baseProductPackaging', new Assert\Type("string"));
        $metadata->addPropertyConstraint('baseProductPackaging', new Assert\Choice(array_values(AbstractMapper::$baseProductPackaging)));

        $metadata->addPropertyConstraint('baseProductUnit', new Assert\NotBlank());
        $metadata->addPropertyConstraint('baseProductUnit', new Assert\Type("string"));
        $metadata->addPropertyConstraint('baseProductUnit', new Assert\Choice(array_values(AbstractMapper::$productUnits)));

        $metadata->addPropertyConstraint('baseProductAmount', new Assert\NotBlank());
        $metadata->addPropertyConstraint('baseProductAmount', new Assert\Type("float"));
        
        $metadata->addPropertyConstraint('baseProductQuantity', new Assert\NotBlank());
        $metadata->addPropertyConstraint('baseProductQuantity', new Assert\Type("integer"));
    }

    // I implement the JsonSerializable interface in order to use json_encode directly on a product object
    public function jsonSerialize()
    {
        $data = get_object_vars($this);

        return $data;
    }
}