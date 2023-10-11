<?php

namespace App\Enums;

enum ProductType: int {
/**
 * @Message("服飾")
 */
    case CLOTHING = 1;

/**
 * @Message("用品")
 */
    case ESSENTIAL = 2;

/**
 * @Message('3C產品')
 */
    case ELECTRONIC = 3;
}
