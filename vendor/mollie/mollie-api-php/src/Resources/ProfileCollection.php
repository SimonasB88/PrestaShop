<?php

namespace _PhpScoper5ea00cc67502b\Mollie\Api\Resources;

class ProfileCollection extends \_PhpScoper5ea00cc67502b\Mollie\Api\Resources\CursorCollection
{
    /**
     * @return string
     */
    public function getCollectionResourceName()
    {
        return "profiles";
    }
    /**
     * @return BaseResource
     */
    protected function createResourceObject()
    {
        return new \_PhpScoper5ea00cc67502b\Mollie\Api\Resources\Profile($this->client);
    }
}