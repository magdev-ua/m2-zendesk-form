<?php


namespace Dynamic\Contact\Api\Data;


interface ContactformsInterface
{
    public function getSubject();
    public function getId();
    public function getCustomerName();
    public function getEmail();
    public function getOrderNumber();
    public function getImage();
    public function getDescription();
}
