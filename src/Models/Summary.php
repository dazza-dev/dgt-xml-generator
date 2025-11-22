<?php

namespace DazzaDev\DgtXmlGenerator\Models;

class Summary
{
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
    }

    /**
     * Convert model to array
     */
    public function toArray(): array
    {
        return [];
    }
}
