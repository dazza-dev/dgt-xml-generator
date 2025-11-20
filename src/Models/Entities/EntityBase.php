<?php

namespace DazzaDev\DgtXmlGenerator\Models\Entities;

use DazzaDev\DgtXmlGenerator\DataLoader;
use DazzaDev\DgtXmlGenerator\Models\Location\Location;

abstract class EntityBase
{
    /**
     * Identification type
     */
    private IdentificationType $identificationType;

    /**
     * Identification number
     */
    private string $identificationNumber;

    /**
     * Name
     */
    public string $name;

    /**
     * Trade name
     */
    public ?string $tradeName = null;

    /**
     * Location
     */
    private ?Location $location = null;

    /**
     * Phone number with country code
     */
    public ?Phone $phone = null;

    /**
     * Email
     */
    public ?string $email = null;

    /**
     * Constructor to initialize the Company model
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize data
     */
    private function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        $this->setName($data['name']);

        if (isset($data['trade_name'])) {
            $this->setTradeName($data['trade_name']);
        }
    }

    /**
     * Get identification type
     */
    public function getIdentificationType(): IdentificationType
    {
        return $this->identificationType;
    }

    /**
     * Set identification type
     */
    public function setIdentificationType(int|string $identificationTypeCode): void
    {
        $identificationType = (new DataLoader('tipos-identificacion'))->getByCode($identificationTypeCode);

        $this->identificationType = new IdentificationType($identificationType);
    }

    /**
     * Get identification number
     */
    public function getIdentificationNumber(): string
    {
        return $this->identificationNumber;
    }

    /**
     * Set identification number
     */
    public function setIdentificationNumber(string $identificationNumber): void
    {
        $this->identificationNumber = $identificationNumber;
    }

    /**
     * Get name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get trade name
     */
    public function getTradeName(): ?string
    {
        return $this->tradeName;
    }

    /**
     * Set trade name
     */
    public function setTradeName(string $tradeName): void
    {
        $this->tradeName = $tradeName;
    }

    /**
     * Get base array representation
     */
    protected function getBaseArray(): array
    {
        return [
            'identification_type' => $this->getIdentificationType()->toArray(),
            'identification_number' => $this->getIdentificationNumber(),
            'name' => $this->getName(),
            'trade_name' => $this->getTradeName(),
        ];
    }

    /**
     * Get array representation
     */
    abstract public function toArray(): array;
}
