<?php

namespace App\OpenApi\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Book",
 *     type="object",
 *     title="Book",
 *     properties={
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="title", type="string", example="The Great Gatsby"),
 *         @OA\Property(property="isbn", type="string", example="978-3-16-148410-0"),
 *         @OA\Property(property="published_date", type="string", format="date", example="1925-04-10"),
 *         @OA\Property(property="author_id", type="integer", example=1),
 *         @OA\Property(property="created_at", type="string", format="date-time", example="2021-01-01T00:00:00Z"),
 *         @OA\Property(property="updated_at", type="string", format="date-time", example="2021-01-01T00:00:00Z")
 *     }
 * )
 */
class BookSchema
{
}

/**
 * @OA\Schema(
 *     schema="StoreBookRequest",
 *     type="object",
 *     required={"title", "isbn", "published_date", "author_id"},
 *     properties={
 *         @OA\Property(property="title", type="string", example="The Great Gatsby"),
 *         @OA\Property(property="isbn", type="string", example="978-3-16-148410-0"),
 *         @OA\Property(property="published_date", type="string", format="date", example="1925-04-10"),
 *         @OA\Property(property="author_id", type="integer", example=1)
 *     }
 * )
 */
class StoreBookRequest
{
}

/**
 * @OA\Schema(
 *     schema="UpdateBookRequest",
 *     type="object",
 *     properties={
 *         @OA\Property(property="title", type="string", example="The Great Gatsby"),
 *         @OA\Property(property="isbn", type="string", example="978-3-16-148410-0"),
 *         @OA\Property(property="published_date", type="string", format="date", example="1925-04-10"),
 *         @OA\Property(property="author_id", type="integer", example=1)
 *     }
 * )
 */
class UpdateBookRequest
{
}
