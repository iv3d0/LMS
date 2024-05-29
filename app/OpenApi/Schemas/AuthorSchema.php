<?php

namespace App\OpenApi\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Author",
 *     type="object",
 *     title="Author",
 *     properties={
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="name", type="string", example="John Doe"),
 *         @OA\Property(property="email", type="string", example="johndoe@example.com"),
 *         @OA\Property(property="created_at", type="string", format="date-time", example="2021-01-01T00:00:00Z"),
 *         @OA\Property(property="updated_at", type="string", format="date-time", example="2021-01-01T00:00:00Z")
 *     }
 * )
 */
class AuthorSchema
{
}

/**
 * @OA\Schema(
 *     schema="StoreAuthorRequest",
 *     type="object",
 *     required={"name", "email"},
 *     properties={
 *         @OA\Property(property="name", type="string", example="John Doe"),
 *         @OA\Property(property="email", type="string", example="johndoe@example.com")
 *     }
 * )
 */
class StoreAuthorRequest
{
}

/**
 * @OA\Schema(
 *     schema="UpdateAuthorRequest",
 *     type="object",
 *     properties={
 *         @OA\Property(property="name", type="string", example="John Doe"),
 *         @OA\Property(property="email", type="string", example="johndoe@example.com")
 *     }
 * )
 */
class UpdateAuthorRequest
{
}
