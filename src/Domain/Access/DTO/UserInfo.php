<?php

namespace Dark\Sdk\CoreAuth\Domain\Access\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class UserInfo extends DataTransferObject
{
    public ?string $name;
    public ?string $surname;
    public ?string $phone;
    public ?string $address;
    public ?string $city;
    public ?string $country;
    public ?string $avatar;

    public static function fromResponse(array $response = []): self
    {
        $data = [
            "name" => $response[ 'name' ],
            "surname" => $response[ 'surname' ],
            "phone" => $response[ 'phone' ],
            "address" => $response[ 'address' ],
            "city" => $response[ 'city' ],
            "avatar" => $response[ 'avatar' ],
        ];

        return new self($data);
    }
}
