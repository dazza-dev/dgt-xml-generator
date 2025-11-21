<?php

namespace DazzaDev\DgtXmlGenerator\Models;

use DazzaDev\DgtXmlGenerator\DataLoader;
use DazzaDev\DgtXmlGenerator\DateValidator;
use DazzaDev\DgtXmlGenerator\Models\Document\LineItem;
use DazzaDev\DgtXmlGenerator\Models\Entities\Issuer;
use DazzaDev\DgtXmlGenerator\Models\Entities\Receiver;
use DazzaDev\DgtXmlGenerator\Models\Payment\Payment;
use DazzaDev\DgtXmlGenerator\Models\Totals\Totals;

class Document
{
    /**
     * Sequential number
     */
    private string $sequential;

    /**
     * Date of the document
     */
    private string $date;

    /**
     * Situation
     */
    private ?Situation $situation = null;

    /**
     * SaleCondition
     */
    private ?SaleCondition $saleCondition = null;

    /**
     * Sale condition details
     */
    private ?string $saleConditionDetails = null;

    /**
     * Establishment information
     */
    public string $establishment = '';

    /**
     * Emission point information
     */
    public string $emissionPoint = '';

    /**
     * Issuer information
     */
    private Issuer $issuer;

    /**
     * Receiver information
     */
    private Receiver $receiver;

    /**
     * Line items information
     *
     * @var LineItem[]
     */
    private array $lineItems = [];

    /**
     * Payments information
     *
     * @var Payment[]
     */
    private array $payments = [];

    /**
     * Summary information
     */
    private Summary $summary;

    /**
     * Document constructor
     *
     * @param  array  $data  Document data
     */
    public function __construct(array $data)
    {
        $this->initialize($data);
    }

    /**
     * Initialize document data
     *
     * @param  array  $data  Document data
     */
    private function initialize(array $data): void
    {
        if (empty($data)) {
            return;
        }

        // Sequential
        $this->setSequential($data['sequential']);

        // Date
        $this->setDate($data['date']);

        // Situation
        $this->setSituation($data['situation']);

        // SaleCondition
        $this->setSaleCondition($data['sale_condition']);

        // Establishment
        $this->setEstablishment($data['establishment']);

        // Emission Point
        $this->setEmissionPoint($data['emission_point']);

        // Issuer
        $this->setIssuer($data['issuer']);

        // Receiver
        $this->setReceiver($data['receiver']);

        // Line items
        /*if (isset($data['line_items'])) {
            $this->setLineItems($data['line_items']);
        }

        // Payments
        if (isset($data['payments'])) {
            $this->setPayments($data['payments']);
        }

        // Totals
        if (isset($data['totals'])) {
            $this->setTotals($data['totals']);
        }*/
    }

    /**
     * Get number
     */
    public function getSequential(): string
    {
        return $this->sequential;
    }

    /**
     * Set sequential
     */
    public function setSequential(string $sequential): void
    {
        $this->sequential = $sequential;
    }

    /**
     * Get document number
     */
    public function getDocumentNumber(): string
    {
        $establishment = $this->getEstablishment()->getCode();
        $emissionPoint = $this->getEmissionPoint()->getCode();
        $sequential = $this->getSequential();

        return $establishment.'-'.$emissionPoint.'-'.$sequential;
    }

    /**
     * Set date
     */
    public function setDate(string $date): void
    {
        (new DateValidator)->validate($date);

        $this->date = $date;
    }

    /**
     * Get date
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Get situation
     */
    public function getSituation(): ?Situation
    {
        return $this->situation;
    }

    /**
     * Set situation
     */
    public function setSituation(int|string $situationCode): void
    {
        $situation = (new DataLoader('situacion-comprobantes'))->getByCode($situationCode);

        $this->situation = new Situation($situation);
    }

    /**
     * Get condition
     */
    public function getSaleCondition(): ?SaleCondition
    {
        return $this->saleCondition;
    }

    /**
     * Set condition
     */
    public function setSaleCondition(int|string $conditionCode): void
    {
        $condition = (new DataLoader('condiciones-venta'))->getByCode($conditionCode);

        $this->saleCondition = new SaleCondition($condition);
    }

    /**
     * Get sale condition details
     */
    public function getSaleConditionDetails(): ?string
    {
        return $this->saleConditionDetails;
    }

    /**
     * Set sale condition details
     */
    public function setSaleConditionDetails(string $saleConditionDetails): void
    {
        $this->saleConditionDetails = $saleConditionDetails;
    }

    /**
     * Get establishment
     */
    public function getEstablishment(): string
    {
        return $this->establishment;
    }

    /**
     * Set establishment
     */
    public function setEstablishment(string $establishment): void
    {
        $this->establishment = $establishment;
    }

    /**
     * Get emission point
     */
    public function getEmissionPoint(): string
    {
        return $this->emissionPoint;
    }

    /**
     * Set emission point
     */
    public function setEmissionPoint(string $emissionPoint): void
    {
        $this->emissionPoint = $emissionPoint;
    }

    /**
     * Get issuer
     */
    public function getIssuer(): Issuer
    {
        return $this->issuer;
    }

    /**
     * Set issuer
     */
    public function setIssuer(array|Issuer $issuer): void
    {
        $this->issuer = $issuer instanceof Issuer ? $issuer : new Issuer($issuer);
    }

    /**
     * Get receiver
     */
    public function getReceiver(): Receiver
    {
        return $this->receiver;
    }

    /**
     * Set receiver
     */
    public function setReceiver(array|Receiver $receiver): void
    {
        $this->receiver = $receiver instanceof Receiver ? $receiver : new Receiver($receiver);
    }

    /**
     * Get line items
     *
     * @return LineItem[]
     */
    public function getLineItems(): array
    {
        return $this->lineItems;
    }

    /**
     * Set line items
     */
    public function setLineItems(array $lineItems): void
    {
        $this->lineItems = [];
        foreach ($lineItems as $lineItem) {
            $this->addLineItem($lineItem);
        }
    }

    /**
     * Add line item
     */
    public function addLineItem(array|LineItem $lineItem): void
    {
        $this->lineItems[] = $lineItem instanceof LineItem ? $lineItem : new LineItem($lineItem);
    }

    /**
     * Get payments
     *
     * @return Payment[]
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * Set payments
     */
    public function setPayments(array $payments): void
    {
        $this->payments = [];
        foreach ($payments as $payment) {
            $this->addPayment($payment);
        }
    }

    /**
     * Add payment item
     */
    public function addPayment(array|Payment $payment): void
    {
        $this->payments[] = $payment instanceof Payment ? $payment : new Payment($payment);
    }

    /**
     * Get totals
     */
    public function getSummary(): Summary
    {
        return $this->summary;
    }

    /**
     * Set summary
     */
    public function setSummary(array|Summary $summary): void
    {
        $this->summary = $summary instanceof Summary ? $summary : new Summary($summary);
    }

    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return [
            'sequential' => $this->getSequential(),
            'date' => $this->getDate(),
            'situation' => $this->getSituation()?->toArray(),
            'sale_condition' => $this->getSaleCondition()?->toArray(),
            'sale_condition_details' => $this->getSaleConditionDetails(),
            'establishment' => $this->getEstablishment(),
            'emission_point' => $this->getEmissionPoint(),
            'issuer' => $this->getIssuer()->toArray(),
            'receiver' => $this->getReceiver()->toArray(),
            // 'line_items' => array_map(fn (LineItem $lineItem) => $lineItem->toArray(), $this->getLineItems()),
            // 'payments' => array_map(fn (Payment $payment) => $payment->toArray(), $this->getPayments()),
            // 'summary' => $this->getSummary()->toArray(),
        ];
    }
}
