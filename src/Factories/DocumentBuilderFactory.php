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
    public static function create(string $documentType, array $documentData): BaseDocumentBuilder
    {
        return match ($documentType) {
            self::INVOICE => new InvoiceBuilder($documentData),
            self::CREDIT_NOTE => new CreditNoteBuilder($documentData),
            self::DEBIT_NOTE => new DebitNoteBuilder($documentData),
            default => throw new InvalidArgumentException("Unsupported document type: {$documentType}")
        };
    }

    /**
     * Create an invoice builder
     */
    public static function createInvoice(array $documentData): InvoiceBuilder
    {
        return new InvoiceBuilder($documentData);
    }

    /**
     * Create a credit note builder
     */
    public static function createCreditNote(array $documentData): CreditNoteBuilder
    {
        return new CreditNoteBuilder($documentData);
    }

    /**
     * Create a debit note builder
     */
    public static function createDebitNote(array $documentData): DebitNoteBuilder
    {
        return new DebitNoteBuilder($documentData);
    }
}
