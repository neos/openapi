<?php

declare(strict_types=1);

namespace Neos\OpenApi\Tests\Schematic\Fixtures;

use Neos\JsonSchema\ProvidesSchema;
use Neos\JsonSchema\Schema;
use Neos\Schematic\Discovery\AutoDiscoveringSchema;

/**
 * An object read from the query string, `?filter[status]=draft&filter[minPosts]=2`
 */
final readonly class AuthorFilter implements ProvidesSchema
{
    public function __construct(
        public PostStatus|null $status = null,
        public PostCount|null $minPosts = null,
    ) {}

    public static function schema(): Schema
    {
        static $schema = null;
        return $schema ??= AutoDiscoveringSchema::analyze(self::class);
    }
}
