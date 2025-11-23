<?php

namespace DazzaDev\DgtXmlGenerator\Models\Tax;

use DazzaDev\DgtXmlGenerator\DataLoader;

class Tax
{
    /**
     * Tax type
     */
    public TaxType $taxType;

    /**
     * Tax rate
     */
    public ?float $rate = null;

    /**
     * Tax amount
     */
    public float $amount;

    /**
     * Tax constructor
     */
    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    /**
     * Initialize tax data
     */
    protected function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['type'])) {
            $this->setTaxType($data['type']);
        }

        if (isset($data['rate'])) {
            $this->setRate($data['rate']);
        }

        if (isset($data['amount'])) {
            $this->setAmount($data['amount']);
        }
    }

    /**
     * Get tax type
     */
    public function getTaxType(): TaxType
    {
        return $this->taxType;
    }

    /**
     * Set tax type
     */
    public function setTaxType(int|string $taxTypeCode): void
    {
        $taxType = (new DataLoader('tax-types'))->getByCode($taxTypeCode);

        $this->taxType = new TaxType($taxType);
    }

    /**
     * Get tax rate
     */
    public function getRate(): ?float
    {
        return $this->rate;
    }

    /**
     * Set tax rate
     */
    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }

    /**
     * Get tax amount
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * Set tax amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'tax_type' => $this->getTaxType()->toArray(),
            'rate' => $this->getRate(),
            'amount' => $this->getAmount(),
        ];
    }
}
