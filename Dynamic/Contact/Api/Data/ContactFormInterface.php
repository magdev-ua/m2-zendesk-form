<?php
declare(strict_types=1);

namespace Dynamic\Contact\Api\Data;

interface ContactFormInterface
{
    public function getSubject() : string;
    public function getId();
    public function getCustomerName() : string;
    public function getEmail() : string;
    public function getOrderNumber() : string;
    public function getImage() : string;
    public function getDescription() : string;
}
