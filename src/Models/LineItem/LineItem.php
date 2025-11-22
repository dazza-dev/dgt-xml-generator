<?php

namespace DazzaDev\DgtXmlGenerator\Models\LineItem;

use DazzaDev\DgtXmlGenerator\DataLoader;

class LineItem
{
    /**
     * CABYS Code
     */
    protected string $cabysCode;

    /**
     * Commercial Codes
     */
    protected array $commercialCodes = [];

    /**
     * Description
     */
    protected string $description;

    /**
     * Quantity
     */
    protected float $quantity = 0.0;

    /**
     * Unit Price
     */
    protected float $unitPrice = 0.0;

    /**
     * Customs Tariff Code
     */
    protected ?string $customsTariffCode = null;

    /**
     * Unit of Measure
     */
    protected ?UnitMeasure $unitMeasure = null;

    /**
     * Commercial Unit of Measure
     */
    protected ?string $commercialUnitMeasure = null;

    /**
     * LineItem constructor
     *
     * @param  array  $data  LineItem data
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize model data
     */
    protected function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['customs_tariff_code'])) {
            $this->setCustomsTariffCode($data['customs_tariff_code']);
        }

        if (isset($data['cabys_code'])) {
            $this->setCabysCode($data['cabys_code']);
        }

        if (isset($data['commercial_codes'])) {
            $this->setCommercialCodes($data['commercial_codes']);
        }

        if (isset($data['commercial_unit_measure'])) {
            $this->setCommercialUnitMeasure($data['commercial_unit_measure']);
        }

        if (isset($data['unit_measure'])) {
            $this->setUnitMeasure($data['unit_measure']);
        }

        if (isset($data['description'])) {
            $this->setDescription($data['description']);
        }

        if (isset($data['quantity'])) {
            $this->setQuantity($data['quantity']);
        }

        if (isset($data['unit_price'])) {
            $this->setUnitPrice($data['unit_price']);
        }
    }

    /**
     * Get CABYS Code
     */
    public function getCabysCode(): string
    {
        return $this->cabysCode;
    }

    /**
     * Set CABYS Code
     */
    public function setCabysCode(string $cabysCode): void
    {
        $this->cabysCode = $cabysCode;
    }

    /**
     * Get Description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set Description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Get Quantity
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * Set Quantity
     */
    public function setQuantity(float $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * Get Unit Price
     */
    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    /**
     * Set Unit Price
     */
    public function setUnitPrice(float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * Get Customs Tariff Code
     */
    public function getCustomsTariffCode(): ?string
    {
        return $this->customsTariffCode;
    }

    /**
     * Set Customs Tariff Code
     */
    public function setCustomsTariffCode(string $customsTariffCode): void
    {
        $this->customsTariffCode = $customsTariffCode;
    }

    /**
     * Get Commercial Codes
     */
    public function getCommercialCodes(): array
    {
        return $this->commercialCodes;
    }

    /**
     * Set Commercial Codes
     */
    public function setCommercialCodes(array $commercialCodes): void
    {
        $this->commercialCodes = [];
        foreach ($commercialCodes as $commercialCode) {
            $this->addCommercialCode($commercialCode);
        }
    }

    /**
     * Add Commercial Code
     */
    public function addCommercialCode(array|CommercialCode $commercialCode): void
    {
        $this->commercialCodes[] = $commercialCode instanceof CommercialCode ? $commercialCode : new CommercialCode($commercialCode);
    }

    /**
     * Get Unit of Measure
     */
    public function getUnitMeasure(): ?UnitMeasure
    {
        return $this->unitMeasure;
    }

    /**
     * Set Unit of Measure
     */
    public function setUnitMeasure(UnitMeasure|array|string $unitMeasure): void
    {
        if (is_array($unitMeasure)) {
            $this->unitMeasure = new UnitMeasure($unitMeasure);
        } elseif (is_string($unitMeasure)) {
            $data = (new DataLoader('unidades-medida'))->getByCode($unitMeasure);
            $this->unitMeasure = new UnitMeasure($data);
        } else {
            $this->unitMeasure = $unitMeasure;
        }
    }

    /**
     * Get Commercial Unit of Measure
     */
    public function getCommercialUnitMeasure(): ?string
    {
        return $this->commercialUnitMeasure;
    }

    /**
     * Set Commercial Unit of Measure
     */
    public function setCommercialUnitMeasure(string $commercialUnitMeasure): void
    {
        $this->commercialUnitMeasure = $commercialUnitMeasure;
    }

    /**
     * Convert to array for XML generation
     */
    public function toArray(): array
    {
        return [
            'customs_tariff_code' => $this->getCustomsTariffCode(),
            'cabys_code' => $this->getCabysCode(),
            'commercial_codes' => array_map(fn (CommercialCode $c) => $c->toArray(), $this->getCommercialCodes()),
            'unit_measure' => $this->getUnitMeasure()?->toArray(),
            'commercial_unit_measure' => $this->getCommercialUnitMeasure(),
            'description' => $this->getDescription(),
            'quantity' => $this->getQuantity(),
            'unit_price' => $this->getUnitPrice(),
        ];
    }
}
