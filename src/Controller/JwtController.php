<?php

// src/Controller/JwtController.php
namespace App\Controller;

use Lcobucci\JWT\Configuration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class JwtController extends AbstractController
{
    #[Route('/generate-jwt', name: 'generate_jwt')]
    public function generateJwt(): JsonResponse
    {
        $config = Configuration::forSymmetricSigner(
            new \Lcobucci\JWT\Signer\Hmac\Sha256(),
            \Lcobucci\JWT\Signer\Key\InMemory::plainText('s3cureR@nd0mStringForJWT12345!') // Remplacez par votre secret
        );

        $token = $config->builder()
            ->issuedBy('http://localhost:3000') // Émetteur
            ->expiresAt(new \DateTimeImmutable('+1 hour')) // Date d'expiration
            ->getToken($config->signer(), $config->signingKey());

        return new JsonResponse(['token' => $token->toString()]);
    }
}
