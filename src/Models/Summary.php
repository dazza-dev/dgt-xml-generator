<?php

namespace DazzaDev\DgtXmlGenerator\Models;

class Summary
{
    public string $currencyCode = '';

    public float $exchangeRate = 0.0;

    public float $totalTaxedServices = 0.0;

    public float $totalExemptServices = 0.0;

    public float $totalExoneratedServices = 0.0;

    public float $totalNonSubjectServices = 0.0;

    public float $totalTaxedGoods = 0.0;

    public float $totalExemptGoods = 0.0;

    public float $totalExoneratedGoods = 0.0;

    public float $totalNonSubjectGoods = 0.0;

    public float $totalTaxed = 0.0;

    public float $totalExempt = 0.0;

    public float $totalExonerated = 0.0;

    public float $totalNonSubject = 0.0;

    public float $totalSale = 0.0;

    public float $totalNetSale = 0.0;

    public array $taxBreakdown = [];

    public float $totalTax = 0.0;

    public string $paymentMethodType = '';

    public float $paymentMethodTotal = 0.0;

    public float $totalDocument = 0.0;

    public function __construct(array $data = [])
    {
        $this->initialize($data);
    }

    protected function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        if (isset($data['currency_code'])) {
            $this->setCurrencyCode($data['currency_code']);
        }

        if (isset($data['exchange_rate'])) {
            $this->setExchangeRate($data['exchange_rate']);
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

        if (isset($data['total_non_subject_services'])) {
            $this->setTotalNonSubjectServices($data['total_non_subject_services']);
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

        if (isset($data['total_non_subject_goods'])) {
            $this->setTotalNonSubjectGoods($data['total_non_subject_goods']);
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

        if (isset($data['total_non_subject'])) {
            $this->setTotalNonSubject($data['total_non_subject']);
        }

        if (isset($data['total_sale'])) {
            $this->setTotalSale($data['total_sale']);
        }

        if (isset($data['total_net_sale'])) {
            $this->setTotalNetSale($data['total_net_sale']);
        }

        if (isset($data['tax_breakdown']) && is_array($data['tax_breakdown'])) {
            $this->setTaxBreakdown($data['tax_breakdown']);
        }

        if (isset($data['total_tax'])) {
            $this->setTotalTax($data['total_tax']);
        }

        if (isset($data['payment_method_type'])) {
            $this->setPaymentMethodType($data['payment_method_type']);
        }

        if (isset($data['payment_method_total'])) {
            $this->setPaymentMethodTotal($data['payment_method_total']);
        }

        if (isset($data['total_document'])) {
            $this->setTotalDocument($data['total_document']);
        }
    }

    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    public function setCurrencyCode(string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    public function getExchangeRate(): float
    {
        return $this->exchangeRate;
    }

    public function setExchangeRate(float $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate;
    }

    public function getTotalTaxedServices(): float
    {
        return $this->totalTaxedServices;
    }

    public function setTotalTaxedServices(float $value): void
    {
        $this->totalTaxedServices = $value;
    }

    public function getTotalExemptServices(): float
    {
        return $this->totalExemptServices;
    }

    public function setTotalExemptServices(float $value): void
    {
        $this->totalExemptServices = $value;
    }

    public function getTotalExoneratedServices(): float
    {
        return $this->totalExoneratedServices;
    }

    public function setTotalExoneratedServices(float $value): void
    {
        $this->totalExoneratedServices = $value;
    }

    public function getTotalNonSubjectServices(): float
    {
        return $this->totalNonSubjectServices;
    }

    public function setTotalNonSubjectServices(float $value): void
    {
        $this->totalNonSubjectServices = $value;
    }

    public function getTotalTaxedGoods(): float
    {
        return $this->totalTaxedGoods;
    }

    public function setTotalTaxedGoods(float $value): void
    {
        $this->totalTaxedGoods = $value;
    }

    public function getTotalExemptGoods(): float
    {
        return $this->totalExemptGoods;
    }

    public function setTotalExemptGoods(float $value): void
    {
        $this->totalExemptGoods = $value;
    }

    public function getTotalExoneratedGoods(): float
    {
        return $this->totalExoneratedGoods;
    }

    public function setTotalExoneratedGoods(float $value): void
    {
        $this->totalExoneratedGoods = $value;
    }

    public function getTotalNonSubjectGoods(): float
    {
        return $this->totalNonSubjectGoods;
    }

    public function setTotalNonSubjectGoods(float $value): void
    {
        $this->totalNonSubjectGoods = $value;
    }

    public function getTotalTaxed(): float
    {
        return $this->totalTaxed;
    }

    public function setTotalTaxed(float $value): void
    {
        $this->totalTaxed = $value;
    }

    public function getTotalExempt(): float
    {
        return $this->totalExempt;
    }

    public function setTotalExempt(float $value): void
    {
        $this->totalExempt = $value;
    }

    public function getTotalExonerated(): float
    {
        return $this->totalExonerated;
    }

    public function setTotalExonerated(float $value): void
    {
        $this->totalExonerated = $value;
    }

    public function getTotalNonSubject(): float
    {
        return $this->totalNonSubject;
    }

    public function setTotalNonSubject(float $value): void
    {
        $this->totalNonSubject = $value;
    }

    public function getTotalSale(): float
    {
        return $this->totalSale;
    }

    public function setTotalSale(float $value): void
    {
        $this->totalSale = $value;
    }

    public function getTotalNetSale(): float
    {
        return $this->totalNetSale;
    }

    public function setTotalNetSale(float $value): void
    {
        $this->totalNetSale = $value;
    }

    public function getTaxBreakdown(): array
    {
        return $this->taxBreakdown;
    }

    public function setTaxBreakdown(array $items): void
    {
        $this->taxBreakdown = [];
        foreach ($items as $item) {
            $this->addTaxBreakdown($item);
        }
    }

    public function addTaxBreakdown(array $item): void
    {
        $this->taxBreakdown[] = [
            'code' => (string) ($item['code'] ?? ''),
            'iva_rate_code' => (string) ($item['iva_rate_code'] ?? ''),
            'total_tax_amount' => (float) ($item['total_tax_amount'] ?? 0.0),
        ];
    }

    public function getTotalTax(): float
    {
        return $this->totalTax;
    }

    public function setTotalTax(float $value): void
    {
        $this->totalTax = $value;
    }

    public function getPaymentMethodType(): string
    {
        return $this->paymentMethodType;
    }

    public function setPaymentMethodType(string $value): void
    {
        $this->paymentMethodType = $value;
    }

    public function getPaymentMethodTotal(): float
    {
        return $this->paymentMethodTotal;
    }

    public function setPaymentMethodTotal(float $value): void
    {
        $this->paymentMethodTotal = $value;
    }

    public function getTotalDocument(): float
    {
        return $this->totalDocument;
    }

    public function setTotalDocument(float $value): void
    {
        $this->totalDocument = $value;
    }

    public function toArray(): array
    {
        return [
            'currency_code' => $this->getCurrencyCode(),
            'exchange_rate' => $this->getExchangeRate(),

            'total_taxed_services' => $this->getTotalTaxedServices(),
            'total_exempt_services' => $this->getTotalExemptServices(),
            'total_exonerated_services' => $this->getTotalExoneratedServices(),
            'total_non_subject_services' => $this->getTotalNonSubjectServices(),

            'total_taxed_goods' => $this->getTotalTaxedGoods(),
            'total_exempt_goods' => $this->getTotalExemptGoods(),
            'total_exonerated_goods' => $this->getTotalExoneratedGoods(),
            'total_non_subject_goods' => $this->getTotalNonSubjectGoods(),

            'total_taxed' => $this->getTotalTaxed(),
            'total_exempt' => $this->getTotalExempt(),
            'total_exonerated' => $this->getTotalExonerated(),
            'total_non_subject' => $this->getTotalNonSubject(),

            'total_sale' => $this->getTotalSale(),
            'total_net_sale' => $this->getTotalNetSale(),

            'tax_breakdown' => $this->getTaxBreakdown(),
            'total_tax' => $this->getTotalTax(),

            'payment_method_type' => $this->getPaymentMethodType(),
            'payment_method_total' => $this->getPaymentMethodTotal(),

            'total_document' => $this->getTotalDocument(),
        ];
    }
}
