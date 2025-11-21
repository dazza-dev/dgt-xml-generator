<?php

namespace DazzaDev\DgtXmlGenerator\Builders;

use DazzaDev\DgtXmlGenerator\Enums\Environments;
use DazzaDev\DgtXmlGenerator\Models\Company;
use DazzaDev\DgtXmlGenerator\Models\CreditNote\CreditNote;
use DazzaDev\DgtXmlGenerator\Models\Customer;
use DazzaDev\DgtXmlGenerator\Models\DebitNote\DebitNote;
use DazzaDev\DgtXmlGenerator\Models\Document;
use DazzaDev\DgtXmlGenerator\Models\EmissionPoint;
use DazzaDev\DgtXmlGenerator\Models\Establishment;
use DazzaDev\DgtXmlGenerator\Models\Invoice\Invoice;
use DazzaDev\DgtXmlGenerator\XmlHelper;
use DOMDocument;
use InvalidArgumentException;

abstract class BaseDocumentBuilder
{
    protected int $environmentCode;

    protected array $documentData;

    protected string $accessKey;

    protected Document $document;

    public function __construct(int $environmentCode, string $accessKey, array $documentData)
    {
        $this->environmentCode = $environmentCode;
        $this->accessKey = $accessKey;
        $this->documentData = $documentData;

        // Validate required data
        $this->validateRequiredData();

        // Initialize document (implemented by child classes)
        $this->document = $this->createDocument();

        // Set document properties
        $this->setDocumentProperties();

        // Set customer
        $this->setCustomer();

        // Set company
        $this->setCompany();
    }

    /**
     * Create document instance (must be implemented by child classes)
     */
    abstract protected function createDocument(): Invoice|CreditNote|DebitNote;

    /**
     * Get document type for XML generation (must be implemented by child classes)
     */
    abstract protected function getDocumentType(): string;

    /**
     * Get additional required fields specific to document type
     */
    protected function getAdditionalRequiredFields(): array
    {
        return [];
    }

    /**
     * Get document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * Get document number
     */
    public function getDocumentNumber(): string
    {
        return $this->document->getDocumentNumber();
    }

    /**
     * Get document XML
     */
    public function getXml(): DOMDocument
    {
        return (new XmlHelper)->getXml(
            $this->getDocumentType(),
            $this->document->toArray()
        );
    }

    /**
     * Validate required data
     */
    protected function validateRequiredData(): void
    {
        $baseRequiredFields = [
            'date',
            'sequential',
            'company',
            'customer',
        ];

        // Merge with document-specific required fields
        $requiredFields = array_merge($baseRequiredFields, $this->getAdditionalRequiredFields());

        foreach ($requiredFields as $field) {
            if (! isset($this->documentData[$field])) {
                throw new InvalidArgumentException("Missing required field: {$field}");
            }
        }
    }

    /**
     * Set document properties
     */
    protected function setDocumentProperties(): void
    {
        // Set access key
        $this->document->setAccessKey($this->accessKey);

        // Set date
        $this->document->setDate($this->documentData['date']);

        // Set environment
        $this->document->setEnvironment(Environments::from($this->environmentCode));

        // Set sequential
        $this->document->setSequential($this->documentData['sequential']);

        // Establishment
        $establishment = new Establishment($this->documentData['establishment']);
        $this->document->setEstablishment($establishment);

        // Emission Point
        $emissionPoint = new EmissionPoint($this->documentData['emission_point']);
        $this->document->setEmissionPoint($emissionPoint);
    }

    /**
     * Set company
     */
    protected function setCompany(): void
    {
        $companyData = $this->documentData['company'];
        $company = new Company;

        // Required fields
        $company->setRuc($companyData['ruc']);
        $company->setLegalName($companyData['legal_name']);
        $company->setHeadOfficeAddress($companyData['head_office_address']);

        // Optional fields
        if (isset($companyData['trade_name'])) {
            $company->setTradeName($companyData['trade_name']);
        }

        // RIMPE Regime Taxpayer
        if (isset($companyData['rimpe_regime_taxpayer'])) {
            $company->setRimpeRegimeTaxpayer($companyData['rimpe_regime_taxpayer']);
        }

        // Special Taxpayer Number
        if (isset($companyData['special_taxpayer_number'])) {
            $company->setSpecialTaxpayerNumber($companyData['special_taxpayer_number']);
        }

        // Withholding Agent
        if (isset($companyData['withholding_agent'])) {
            $company->setWithholdingAgent($companyData['withholding_agent']);
        }

        // Requires Accounting
        if (isset($companyData['requires_accounting'])) {
            $company->setRequiresAccounting($companyData['requires_accounting']);
        }

        $this->document->setCompany($company);
    }

    /**
     * Set customer
     */
    protected function setCustomer(): void
    {
        $customerData = $this->documentData['customer'];
        $customer = new Customer;

        // Required fields
        $customer->setIdentificationType($customerData['identification_type']);
        $customer->setIdentificationNumber($customerData['identification_number']);
        $customer->setName($customerData['name']);

        // Optional address
        if (isset($customerData['address'])) {
            $customer->setAddress($customerData['address']);
        }

        $this->document->setCustomer($customer);
    }
}
