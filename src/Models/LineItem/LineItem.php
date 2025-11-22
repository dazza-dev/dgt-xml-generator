<?php

namespace DazzaDev\DgtXmlGenerator\Models\LineItem;

class LineItem
{
    /**
     * CABYS Code
     */
    protected string $cabysCode;

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
     * Convert to array for XML generation
     */
    public function toArray(): array
    {
        return [
            'cabys_code' => $this->getCabysCode(),
            'customs_tariff_code' => $this->getCustomsTariffCode(),
            'description' => $this->getDescription(),
            'quantity' => $this->getQuantity(),
            'unit_price' => $this->getUnitPrice(),
        ];
    }
}
