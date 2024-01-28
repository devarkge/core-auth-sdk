<?php

namespace DevArk\Sdk\Auth\Domain\Auth;


use DevArk\Sdk\Auth\Domain\Access\AuthUser;
use DevArk\Sdk\Auth\Domain\Access\DTO\AuthUserData;
use DevArk\Sdk\Auth\Domain\DarkCoreClientService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Log;

class DarkCoreAuthService implements UserProvider
{
    public function __construct(
        private DarkCoreClientService $darkCoreClientService
    ) {
    }

    public function login(string $email, string $password): array
    {
        return $this->darkCoreClientService->apiCall(
            '/api/login',
            [
                'email' => $email,
                'password' => $password,
            ]
        );
    }

    public function register(string $username, string $email, string $password): array
    {
        return $this->darkCoreClientService->apiCall(
            '/register',
            [
                'username' => $username,
                'email' => $email,
                'password' => $password,
            ]
        );
    }

    public function retrieveByCredentials(array $credentials)
    {
        $url = "/api/login";
        $user = $this->darkCoreClientService->apiCall($url, $credentials);

        return new AuthUser(AuthUserData::fromResponse($user));
    }
    public function retrieveById($identifier)
    {
        $url = "/api/users/{$identifier}";
        $user = $this->darkCoreClientService->apiCall($url, [false]);

        return new AuthUser(AuthUserData::fromResponse($user));
    }

    public function retrieveByToken($identifier, $token)
    {
        // TODO: Implement retrieveByToken() method.
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // TODO: Implement updateRememberToken() method.
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return true;
//        return strtolower($user->email) === strtolower($credentials['email']);
    }
}
