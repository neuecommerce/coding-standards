<?php

declare(strict_types = 1);

namespace NeueCommerce\CodingStandards\Config;

use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\DeadCode\Rector\Node\RemoveNonExistingVarAnnotationRector;
use Rector\DeadCode\Rector\Stmt\RemoveUnreachableStatementRector;
use Rector\Php80\Rector\Catch_\RemoveUnusedVariableInCatchRector;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Php80\Rector\FuncCall\ClassOnObjectRector;
use Rector\Php80\Rector\Identical\StrEndsWithRector;
use Rector\Php80\Rector\Identical\StrStartsWithRector;
use Rector\Php80\Rector\NotIdentical\StrContainsRector;
use Rector\Php81\Rector\Property\ReadOnlyPropertyRector;

class NeueCommerceRectorConfig
{
    public static function setup(RectorConfig $rectorConfig): void
    {
        $rectorConfig->bootstrapFiles([
            getcwd() . '/vendor/nunomaduro/larastan/bootstrap.php',
        ]);

        $rectorConfig->phpstanConfig(getcwd() . '/phpstan.neon');

        $rectorConfig->rule(ClassOnObjectRector::class);
        $rectorConfig->rule(StrContainsRector::class);
        $rectorConfig->rule(StrStartsWithRector::class);
        $rectorConfig->rule(StrEndsWithRector::class);
        $rectorConfig->rule(RemoveUnusedVariableInCatchRector::class);

        $rectorConfig->rule(RemoveUnreachableStatementRector::class);
        $rectorConfig->rule(RemoveUselessParamTagRector::class);
        $rectorConfig->rule(RemoveUselessReturnTagRector::class);
        $rectorConfig->rule(RemoveNonExistingVarAnnotationRector::class);

        $rectorConfig->rule(ClassPropertyAssignToConstructorPromotionRector::class);

        $rectorConfig->rule(ReadOnlyPropertyRector::class);
    }
}
