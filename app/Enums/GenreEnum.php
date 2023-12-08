<?php

namespace App\Enums;

enum GenreEnum: string
{
    case LOVE = "Love Story";
    case ISSEKAI = "Reincarnation";
    case HORROR = "Horror and Thriller";
    case STORY = "Story or slice of life";

    public static function getAllValues(): array
    {
        return array_column(self::cases(), "value");
    }
}
