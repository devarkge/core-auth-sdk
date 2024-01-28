<?php

namespace DevArk\Sdk\Auth\Domain\Access\DTO;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class AuthUserData extends DataTransferObject
{
    public ?string $token;
    public ?int $id;
    public ?string $username;
    public ?string $email;
    public ?UserInfo $user_info;
    public ?string $name;

    /**
     * @throws UnknownProperties
     */
    public static function fromResponse(array $response = []): self
    {
        $data = [
            "email" => $response[ 'email' ] ?? null,
            "id" => $response[ 'id' ] ?? null,
            "username" => $response[ 'username' ] ?? null,
            "token" => $response[ 'token' ] ?? null,
            "user_info" => UserInfo::fromResponse(
                [
                    "name" => $response[ 'user_info' ][ 'first_name' ]??null,
                    "surname" => $response[ 'user_info' ][ 'last_name' ]??null,
                    "phone" => $response[ 'user_info' ][ 'phone_number' ]??null,
                    "address" => $response[ 'user_info' ][ 'address' ]??null,
                    "city" => $response[ 'user_info' ][ 'city' ]??null,
                    "avatar" => $response[ 'user_info' ][ 'avatar' ]??null,
                ]
            ),
        ];

        return new self($data);
    }
}
