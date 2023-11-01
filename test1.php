<?php

interface UserEntityInterface
{
    public function __construct(public readonly int $id);

    public function getName(): string;

    public function sendEmail(string $message): void;

    public function getClientCompany(): string;

    protected function setName(string $name): void;
}

abstract class AbstractClient implements UserEntityInterface
{
    public array $userData;

    public function __construct(public readonly int $id)
    {
        $this->userData = $this->prepareUser($id);
    }

    public function getName() :string
    {
        return $this->userData['name'];
    }

    private function prepareUser(int $id): array
    {
        // some code
        return [];
    }
}

class Client extends AbstractClient
{
    public function getName(string $mode): string
    {
        if ($mode = null) {
            return parent::getName();
        }
        switch ($mode) {
            case 'var1':
                return translate('Mr', 'en') . ': ' . $this->userData['name'];
            case 'var2':
                $result = translate('Mr', 'de') . ': ' . $this->userData['name'];
            case 'var3':
                $result = translate('Mr', 'no') . ': ' . $this->userData['name'];
            default:
                $result = $this->userData['name'];
        }

        return $result;
    }

    protected function setName(string $name): void
    {
        $this->userData['name'] = $name;
    }
}