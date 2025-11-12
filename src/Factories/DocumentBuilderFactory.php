<?php

namespace DazzaDev\DgtXmlGenerator\Factories;

use DazzaDev\DgtXmlGenerator\Builders\BaseDocumentBuilder;
use DazzaDev\DgtXmlGenerator\Builders\CreditNoteBuilder;
use DazzaDev\DgtXmlGenerator\Builders\DebitNoteBuilder;
use DazzaDev\DgtXmlGenerator\Builders\DeliveryGuideBuilder;
use DazzaDev\DgtXmlGenerator\Builders\InvoiceBuilder;
use DazzaDev\DgtXmlGenerator\Builders\WithholdingReceiptBuilder;
use InvalidArgumentException;

class DocumentBuilderFactory
{
    public const INVOICE = 'invoice';

    public const CREDIT_NOTE = 'credit-note';

    public const DEBIT_NOTE = 'debit-note';

    public const DELIVERY_GUIDE = 'delivery-guide';

    public const WITHHOLDING_RECEIPT = 'withholding-receipt';

    /**
     * Create a document builder based on document type name
     */
    public static function create(int $environmentCode, string $documentType, string $accessKey, array $documentData): BaseDocumentBuilder
    {
        return match ($documentType) {
            self::INVOICE => new InvoiceBuilder($environmentCode, $accessKey, $documentData),
            self::CREDIT_NOTE => new CreditNoteBuilder($environmentCode, $accessKey, $documentData),
            self::DEBIT_NOTE => new DebitNoteBuilder($environmentCode, $accessKey, $documentData),
            self::DELIVERY_GUIDE => new DeliveryGuideBuilder($environmentCode, $accessKey, $documentData),
            self::WITHHOLDING_RECEIPT => new WithholdingReceiptBuilder($environmentCode, $accessKey, $documentData),
            default => throw new InvalidArgumentException("Unsupported document type: {$documentType}")
        };
    }

    /**
     * Create an invoice builder
     */
    public static function createInvoice(int $environmentCode, string $accessKey, array $documentData): InvoiceBuilder
    {
        return new InvoiceBuilder($environmentCode, $accessKey, $documentData);
    }

    /**
     * Create a credit note builder
     */
    public static function createCreditNote(int $environmentCode, string $accessKey, array $documentData): CreditNoteBuilder
    {
        return new CreditNoteBuilder($environmentCode, $accessKey, $documentData);
    }

    /**
     * Create a debit note builder
     */
    public static function createDebitNote(int $environmentCode, string $accessKey, array $documentData): DebitNoteBuilder
    {
        return new DebitNoteBuilder($environmentCode, $accessKey, $documentData);
    }

    /**
     * Create a delivery guide builder
     */
    public static function createDeliveryGuide(int $environmentCode, string $accessKey, array $documentData): DeliveryGuideBuilder
    {
        return new DeliveryGuideBuilder($environmentCode, $accessKey, $documentData);
    }

    /**
     * Create a withholding receipt builder
     */
    public static function createWithholdingReceipt(int $environmentCode, string $accessKey, array $documentData): WithholdingReceiptBuilder
    {
        return new WithholdingReceiptBuilder($environmentCode, $accessKey, $documentData);
    }
}
