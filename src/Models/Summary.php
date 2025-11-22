<?php

namespace DazzaDev\DgtXmlGenerator\Models;

class Summary
{
    /**
     * Total servicios gravados con IVA
     */
    private ?float $totalTaxedServices = null;

    /**
     * Total servicios exentos de IVA
     */
    private ?float $totalExemptServices = null;

    /**
     * Total servicios exonerados del IVA
     */
    private ?float $totalExoneratedServices = null;

    /**
     * Total servicios No Sujetos de IVA
     */
    private ?float $totalNonTaxableServices = null;

    /**
     * Total mercancías gravadas con IVA
     */
    private ?float $totalTaxedGoods = null;

    /**
     * Summary constructor
     *
     * @param  array  $data  Summary data
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

        if (isset($data['total_taxed_services'])) {
            $this->setTotalTaxedServices($data['total_taxed_services']);
        }

        if (isset($data['total_exempt_services'])) {
            $this->setTotalExemptServices($data['total_exempt_services']);
        }

        if (isset($data['total_exonerated_services'])) {
            $this->setTotalExoneratedServices($data['total_exonerated_services']);
        }

        if (isset($data['total_non_taxable_services'])) {
            $this->setTotalNonTaxableServices($data['total_non_taxable_services']);
        }

        if (isset($data['total_taxed_goods'])) {
            $this->setTotalTaxedGoods($data['total_taxed_goods']);
        }
    }

    /**
     * Get total taxed services
     */
    public function getTotalTaxedServices(): ?float
    {
        return $this->totalTaxedServices;
    }

    /**
     * Set total taxed services
     */
    public function setTotalTaxedServices(float $totalTaxedServices): void
    {
        $this->totalTaxedServices = $totalTaxedServices;
    }

    /**
     * Get total exempt services
     */
    public function getTotalExemptServices(): ?float
    {
        return $this->totalExemptServices;
    }

    /**
     * Set total exempt services
     */
    public function setTotalExemptServices(float $totalExemptServices): void
    {
        $this->totalExemptServices = $totalExemptServices;
    }

    /**
     * Get total exonerated services
     */
    public function getTotalExoneratedServices(): ?float
    {
        return $this->totalExoneratedServices;
    }

    /**
     * Set total exonerated services
     */
    public function setTotalExoneratedServices(float $totalExoneratedServices): void
    {
        $this->totalExoneratedServices = $totalExoneratedServices;
    }

    /**
     * Get total non taxable services
     */
    public function getTotalNonTaxableServices(): ?float
    {
        return $this->totalNonTaxableServices;
    }

    /**
     * Set total non taxable services
     */
    public function setTotalNonTaxableServices(float $totalNonTaxableServices): void
    {
        $this->totalNonTaxableServices = $totalNonTaxableServices;
    }

    /**
     * Get total taxed goods
     */
    public function getTotalTaxedGoods(): ?float
    {
        return $this->totalTaxedGoods;
    }

    /**
     * Set total taxed goods
     */
    public function setTotalTaxedGoods(float $totalTaxedGoods): void
    {
        $this->totalTaxedGoods = $totalTaxedGoods;
    }

    /**
     * Convert model to array
     */
    public function toArray(): array
    {
        return [
            'total_taxed_services' => $this->getTotalTaxedServices(),
            'total_exempt_services' => $this->getTotalExemptServices(),
            'total_exonerated_services' => $this->getTotalExoneratedServices(),
            'total_non_taxable_services' => $this->getTotalNonTaxableServices(),
            'total_taxed_goods' => $this->getTotalTaxedGoods(),
        ];
    }
}
