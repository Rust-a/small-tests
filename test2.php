<?php

trait HashTrait
{
    private function hash(string $a): string
    {
        return md5($a);
    }
}

class Converter
{
    use HashTrait;

    public function __construct(public readonly mixed $value)
    {
    }

    private function hash(string $a): string
    {
        return hash('sha256', $a);
    }
    public function getHash(): string
    {
        return parent::hash($this->value);
    }
}