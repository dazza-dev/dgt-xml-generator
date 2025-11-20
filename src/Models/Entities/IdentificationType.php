<?php

namespace DazzaDev\DgtXmlGenerator\Models;

class IdentificationType extends BaseModel
{
    /**
     * Get array representation
     */
    public function toArray(): array
    {
        return $this->getBaseArray();
    }
}
