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
     * Total mercancías exentas de IVA
     */
    private ?float $totalExemptGoods = null;

    /**
     * Total mercancías exoneradas del IVA
     */
    private ?float $totalExoneratedGoods = null;

    /**
     * Total mercancías No Sujetas de IVA
     */
    private ?float $totalNonTaxableGoods = null;

    /**
     * Total gravado
     */
    private ?float $totalTaxed = null;

    /**
     * Total exento
     */
    private ?float $totalExempt = null;

    /**
     * Total exonerado
     */
    private ?float $totalExonerated = null;

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

        if (isset($data['total_exempt_goods'])) {
            $this->setTotalExemptGoods($data['total_exempt_goods']);
        }

        if (isset($data['total_exonerated_goods'])) {
            $this->setTotalExoneratedGoods($data['total_exonerated_goods']);
        }

        if (isset($data['total_non_taxable_goods'])) {
            $this->setTotalNonTaxableGoods($data['total_non_taxable_goods']);
        }

        if (isset($data['total_taxed'])) {
            $this->setTotalTaxed($data['total_taxed']);
        }

        if (isset($data['total_exempt'])) {
            $this->setTotalExempt($data['total_exempt']);
        }

        if (isset($data['total_exonerated'])) {
            $this->setTotalExonerated($data['total_exonerated']);
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
     * Get total goods exempt from VAT
     */
    public function getTotalExemptGoods(): ?float
    {
        return $this->totalExemptGoods;
    }

    /**
     * Set total goods exempt from VAT
     */
    public function setTotalExemptGoods(float $totalExemptGoods): void
    {
        $this->totalExemptGoods = $totalExemptGoods;
    }

    /**
     * Get total goods exonerated from VAT
     */
    public function getTotalExoneratedGoods(): ?float
    {
        return $this->totalExoneratedGoods;
    }

    /**
     * Set total goods exonerated from VAT
     */
    public function setTotalExoneratedGoods(float $totalExoneratedGoods): void
    {
        $this->totalExoneratedGoods = $totalExoneratedGoods;
    }

    /**
     * Get total goods not subject to VAT
     */
    public function getTotalNonTaxableGoods(): ?float
    {
        return $this->totalNonTaxableGoods;
    }

    /**
     * Set total goods not subject to VAT
     */
    public function setTotalNonTaxableGoods(float $totalNonTaxableGoods): void
    {
        $this->totalNonTaxableGoods = $totalNonTaxableGoods;
    }

    /**
     * Get total taxed
     */
    public function getTotalTaxed(): ?float
    {
        return $this->totalTaxed;
    }

    /**
     * Set total taxed
     */
    public function setTotalTaxed(float $totalTaxed): void
    {
        $this->totalTaxed = $totalTaxed;
    }

    /**
     * Get total exempt
     */
    public function getTotalExempt(): ?float
    {
        return $this->totalExempt;
    }

    /**
     * Set total exempt
     */
    public function setTotalExempt(float $totalExempt): void
    {
        $this->totalExempt = $totalExempt;
    }

    /**
     * Get total exonerated
     */
    public function getTotalExonerated(): ?float
    {
        return $this->totalExonerated;
    }

    /**
     * Set total exonerated
     */
    public function setTotalExonerated(float $totalExonerated): void
    {
        $this->totalExonerated = $totalExonerated;
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
            'total_exempt_goods' => $this->getTotalExemptGoods(),
            'total_exonerated_goods' => $this->getTotalExoneratedGoods(),
            'total_non_taxable_goods' => $this->getTotalNonTaxableGoods(),
            'total_taxed' => $this->getTotalTaxed(),
            'total_exempt' => $this->getTotalExempt(),
            'total_exonerated' => $this->getTotalExonerated(),
        ];
    }
}
