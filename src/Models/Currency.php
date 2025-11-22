<?php

namespace DazzaDev\DgtXmlGenerator\Models;

class Currency
{
    /**
     * Codigo Moneda
     */
    private string $currency = 'CRC';

    /**
     * Tipo de cambio
     */
    private ?float $exchangeRate = 1;

    /**
     * Currency constructor
     *
     * @param  array  $data  Currency data
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

        if (isset($data['currency'])) {
            $this->setCurrency($data['currency']);
        }

        if (isset($data['exchange_rate'])) {
            $this->setExchangeRate($data['exchange_rate']);
        }
    }

    /**
     * Get currency
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * Set currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * Get exchange rate
     */
    public function getExchangeRate(): float
    {
        return $this->exchangeRate;
    }

    /**
     * Set exchange rate
     */
    public function setExchangeRate(float $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }

    /**
     * Convert model to array
     */
    public function toArray(): array
    {
        return [
            'currency' => $this->getCurrency(),
            'exchange_rate' => $this->getExchangeRate(),
        ];
    }
}
