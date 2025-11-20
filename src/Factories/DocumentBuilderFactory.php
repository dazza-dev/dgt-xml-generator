<?php

namespace DazzaDev\DgtXmlGenerator\Factories;

use DazzaDev\DgtXmlGenerator\Builders\BaseDocumentBuilder;
use DazzaDev\DgtXmlGenerator\Builders\CreditNoteBuilder;
use DazzaDev\DgtXmlGenerator\Builders\DebitNoteBuilder;
use DazzaDev\DgtXmlGenerator\Builders\InvoiceBuilder;
use InvalidArgumentException;

class DocumentBuilderFactory
{
    public const INVOICE = 'invoice';

    public const CREDIT_NOTE = 'credit-note';

    public const DEBIT_NOTE = 'debit-note';

    /**
     * Create a document builder based on document type name
     */
    public static function create(int $environmentCode, string $documentType, string $accessKey, array $documentData): BaseDocumentBuilder
    {
        return match ($documentType) {
            self::INVOICE => new InvoiceBuilder($environmentCode, $accessKey, $documentData),
            self::CREDIT_NOTE => new CreditNoteBuilder($environmentCode, $accessKey, $documentData),
            self::DEBIT_NOTE => new DebitNoteBuilder($environmentCode, $accessKey, $documentData),
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
}
