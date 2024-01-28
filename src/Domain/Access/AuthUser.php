<?php

namespace DevArk\Sdk\Auth\Domain\Access;

use Illuminate\Contracts\Auth\Authenticatable;
use DevArk\Sdk\Auth\Domain\Access\DTO\AuthUserData;
use Illuminate\Support\Facades\Log;

class AuthUser implements Authenticatable
{
    public AuthUserData $authUserData;
    public string $name;
    public function __construct(AuthUserData $authUserData) {
        $this->authUserData = $authUserData;
        $this->name = $authUserData->username??"";
    }

    public function getAuthIdentifierName(): string
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
        return $this->authUserData->id;
    }

    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    public function toArray(): array
    {
        return $this->authUserData->toArray();
    }
}
