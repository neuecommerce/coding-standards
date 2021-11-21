<?php

declare(strict_types = 1);

namespace NeueCommerce\CodingStandards\Config;

use PhpCsFixer\Fixer\Alias\MbStrFunctionsFixer;
use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\ArrayNotation\NoMultilineWhitespaceAroundDoubleArrowFixer;
use PhpCsFixer\Fixer\ArrayNotation\NormalizeIndexBraceFixer;
use PhpCsFixer\Fixer\ArrayNotation\NoWhitespaceBeforeCommaInArrayFixer;
use PhpCsFixer\Fixer\ArrayNotation\TrimArraySpacesFixer;
use PhpCsFixer\Fixer\ArrayNotation\WhitespaceAfterCommaInArrayFixer;
use PhpCsFixer\Fixer\Basic\NoTrailingCommaInSinglelineFixer;
use PhpCsFixer\Fixer\Casing\ConstantCaseFixer;
use PhpCsFixer\Fixer\Casing\LowercaseKeywordsFixer;
use PhpCsFixer\Fixer\Casing\LowercaseStaticReferenceFixer;
use PhpCsFixer\Fixer\Casing\MagicConstantCasingFixer;
use PhpCsFixer\Fixer\Casing\MagicMethodCasingFixer;
use PhpCsFixer\Fixer\Casing\NativeFunctionCasingFixer;
use PhpCsFixer\Fixer\Casing\NativeFunctionTypeDeclarationCasingFixer;
use PhpCsFixer\Fixer\CastNotation\CastSpacesFixer;
use PhpCsFixer\Fixer\CastNotation\LowercaseCastFixer;
use PhpCsFixer\Fixer\CastNotation\ModernizeTypesCastingFixer;
use PhpCsFixer\Fixer\CastNotation\NoShortBoolCastFixer;
use PhpCsFixer\Fixer\CastNotation\NoUnsetCastFixer;
use PhpCsFixer\Fixer\CastNotation\ShortScalarCastFixer;
use PhpCsFixer\Fixer\ClassNotation\ClassAttributesSeparationFixer;
use PhpCsFixer\Fixer\ClassNotation\NoBlankLinesAfterClassOpeningFixer;
use PhpCsFixer\Fixer\ClassNotation\NoNullPropertyInitializationFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedInterfacesFixer;
use PhpCsFixer\Fixer\ClassNotation\SingleClassElementPerStatementFixer;
use PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer;
use PhpCsFixer\Fixer\Comment\MultilineCommentOpeningClosingFixer;
use PhpCsFixer\Fixer\Comment\NoTrailingWhitespaceInCommentFixer;
use PhpCsFixer\Fixer\Comment\SingleLineCommentStyleFixer;
use PhpCsFixer\Fixer\ControlStructure\ControlStructureBracesFixer;
use PhpCsFixer\Fixer\ControlStructure\NoAlternativeSyntaxFixer;
use PhpCsFixer\Fixer\ControlStructure\NoSuperfluousElseifFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUnneededControlParenthesesFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUselessElseFixer;
use PhpCsFixer\Fixer\ControlStructure\SimplifiedIfReturnFixer;
use PhpCsFixer\Fixer\ControlStructure\SwitchCaseSemicolonToColonFixer;
use PhpCsFixer\Fixer\ControlStructure\SwitchCaseSpaceFixer;
use PhpCsFixer\Fixer\ControlStructure\SwitchContinueToBreakFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionTypehintSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\LambdaNotUsedImportFixer;
use PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\NoSpacesAfterFunctionNameFixer;
use PhpCsFixer\Fixer\FunctionNotation\NoUnreachableDefaultArgumentValueFixer;
use PhpCsFixer\Fixer\FunctionNotation\NoUselessSprintfFixer;
use PhpCsFixer\Fixer\FunctionNotation\NullableTypeDeclarationForDefaultNullValueFixer;
use PhpCsFixer\Fixer\FunctionNotation\RegularCallableCallFixer;
use PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer;
// use PhpCsFixer\Fixer\FunctionNotation\SingleLineThrowFixer;
use PhpCsFixer\Fixer\Import\FullyQualifiedStrictTypesFixer;
use PhpCsFixer\Fixer\Import\GlobalNamespaceImportFixer;
use PhpCsFixer\Fixer\Import\NoLeadingImportSlashFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Import\OrderedImportsFixer;
use PhpCsFixer\Fixer\Import\SingleLineAfterImportsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\CombineConsecutiveIssetsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\CombineConsecutiveUnsetsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\DeclareEqualNormalizeFixer;
use PhpCsFixer\Fixer\LanguageConstruct\DirConstantFixer;
use PhpCsFixer\Fixer\LanguageConstruct\ErrorSuppressionFixer;
use PhpCsFixer\Fixer\LanguageConstruct\ExplicitIndirectVariableFixer;
use PhpCsFixer\Fixer\LanguageConstruct\NoUnsetOnPropertyFixer;
use PhpCsFixer\Fixer\LanguageConstruct\SingleSpaceAroundConstructFixer;
use PhpCsFixer\Fixer\ListNotation\ListSyntaxFixer;
use PhpCsFixer\Fixer\NamespaceNotation\BlankLineAfterNamespaceFixer;
use PhpCsFixer\Fixer\NamespaceNotation\BlankLinesBeforeNamespaceFixer;
use PhpCsFixer\Fixer\NamespaceNotation\CleanNamespaceFixer;
use PhpCsFixer\Fixer\NamespaceNotation\NoLeadingNamespaceWhitespaceFixer;
use PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\ConcatSpaceFixer;
use PhpCsFixer\Fixer\Operator\IncrementStyleFixer;
use PhpCsFixer\Fixer\Operator\LogicalOperatorsFixer;
use PhpCsFixer\Fixer\Operator\NewWithBracesFixer;
use PhpCsFixer\Fixer\Operator\NotOperatorWithSuccessorSpaceFixer;
use PhpCsFixer\Fixer\Operator\ObjectOperatorWithoutWhitespaceFixer;
use PhpCsFixer\Fixer\Operator\OperatorLinebreakFixer;
use PhpCsFixer\Fixer\Operator\StandardizeIncrementFixer;
use PhpCsFixer\Fixer\Operator\StandardizeNotEqualsFixer;
use PhpCsFixer\Fixer\Operator\TernaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\TernaryToElvisOperatorFixer;
use PhpCsFixer\Fixer\Operator\TernaryToNullCoalescingFixer;
use PhpCsFixer\Fixer\Operator\UnaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Phpdoc\AlignMultilineCommentFixer;
use PhpCsFixer\Fixer\Phpdoc\GeneralPhpdocAnnotationRemoveFixer;
use PhpCsFixer\Fixer\Phpdoc\GeneralPhpdocTagRenameFixer;
use PhpCsFixer\Fixer\Phpdoc\NoBlankLinesAfterPhpdocFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAddMissingParamAnnotationFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAlignFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocIndentFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocInlineTagNormalizerFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocLineSpanFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoAccessFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoAliasTagFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoUselessInheritdocFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocOrderByValueFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocOrderFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocReturnSelfReferenceFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocScalarFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSeparationFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSingleLineVarSpacingFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSummaryFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTagCasingFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTagTypeFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocToCommentFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTrimConsecutiveBlankLineSeparationFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTrimFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTypesFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTypesOrderFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocVarAnnotationCorrectOrderFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocVarWithoutNameFixer;
use PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer;
use PhpCsFixer\Fixer\PhpTag\EchoTagSyntaxFixer;
use PhpCsFixer\Fixer\PhpTag\FullOpeningTagFixer;
use PhpCsFixer\Fixer\PhpTag\LinebreakAfterOpeningTagFixer;
use PhpCsFixer\Fixer\PhpTag\NoClosingTagFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitConstructFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertInternalTypeFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitExpectationFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitFqcnAnnotationFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitNamespacedFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitNoExpectationAnnotationFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitSetUpTearDownVisibilityFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitStrictFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitTestCaseStaticMethodCallsFixer;
use PhpCsFixer\Fixer\ReturnNotation\NoUselessReturnFixer;
use PhpCsFixer\Fixer\ReturnNotation\ReturnAssignmentFixer;
use PhpCsFixer\Fixer\ReturnNotation\SimplifiedNullReturnFixer;
use PhpCsFixer\Fixer\Semicolon\MultilineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Semicolon\NoSinglelineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Semicolon\SemicolonAfterInstructionFixer;
use PhpCsFixer\Fixer\Semicolon\SpaceAfterSemicolonFixer;
use PhpCsFixer\Fixer\Strict\StrictComparisonFixer;
use PhpCsFixer\Fixer\Strict\StrictParamFixer;
use PhpCsFixer\Fixer\StringNotation\ExplicitStringVariableFixer;
use PhpCsFixer\Fixer\StringNotation\HeredocToNowdocFixer;
use PhpCsFixer\Fixer\StringNotation\NoBinaryStringFixer;
use PhpCsFixer\Fixer\StringNotation\NoTrailingWhitespaceInStringFixer;
use PhpCsFixer\Fixer\StringNotation\SimpleToComplexStringVariableFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use PhpCsFixer\Fixer\Whitespace\BlankLineBeforeStatementFixer;
use PhpCsFixer\Fixer\Whitespace\CompactNullableTypehintFixer;
use PhpCsFixer\Fixer\Whitespace\HeredocIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\IndentationTypeFixer;
use PhpCsFixer\Fixer\Whitespace\LineEndingFixer;
use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use PhpCsFixer\Fixer\Whitespace\NoExtraBlankLinesFixer;
use PhpCsFixer\Fixer\Whitespace\NoSpacesAroundOffsetFixer;
use PhpCsFixer\Fixer\Whitespace\NoSpacesInsideParenthesisFixer;
use PhpCsFixer\Fixer\Whitespace\NoTrailingWhitespaceFixer;
use PhpCsFixer\Fixer\Whitespace\NoWhitespaceInBlankLineFixer;
use PhpCsFixer\Fixer\Whitespace\SingleBlankLineAtEofFixer;
use PhpCsFixer\Fixer\Whitespace\TypesSpacesFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

class NeueCommerceEcsConfig
{
    public static function setup(ECSConfig $ecsConfig): void
    {
        $ecsConfig->sets([
            SetList::PSR_12,
        ]);

        $ecsConfig->skip(self::skips());

        $ecsConfig->ruleWithConfiguration(ArraySyntaxFixer::class, [
            'syntax' => 'short',
        ]);

        $ecsConfig->ruleWithConfiguration(CastSpacesFixer::class, [
            'space' => 'single',
        ]);

        $ecsConfig->ruleWithConfiguration(ClassAttributesSeparationFixer::class, [
            'elements' => [
                'const' => 'one',
                'method' => 'one',
                'property' => 'one',
                'trait_import' => 'none',
            ],
        ]);

        $ecsConfig->ruleWithConfiguration(OrderedInterfacesFixer::class, [
            'direction' => 'ascend',
            'order' => 'alpha',
        ]);

        $ecsConfig->ruleWithConfiguration(VisibilityRequiredFixer::class, [
            'elements' => ['property', 'const', 'method'],
        ]);

        $ecsConfig->ruleWithConfiguration(SingleLineCommentStyleFixer::class, [
            'comment_types' => ['hash'],
        ]);

        $ecsConfig->ruleWithConfiguration(NoUnneededControlParenthesesFixer::class, [
            'statements' => ['break', 'clone', 'continue', 'echo_print', 'return', 'switch_case', 'yield'],
        ]);

        $ecsConfig->ruleWithConfiguration(FunctionDeclarationFixer::class, [
            'closure_function_spacing' => 'one',
        ]);

        $ecsConfig->ruleWithConfiguration(MethodArgumentSpaceFixer::class,  [
            'on_multiline' => 'ignore',
        ]);

        $ecsConfig->ruleWithConfiguration(ReturnTypeDeclarationFixer::class, [
            'space_before' => 'none',
        ]);

        $ecsConfig->ruleWithConfiguration(OrderedImportsFixer::class, [
            'sort_algorithm' => 'alpha',
            'imports_order' => [
                'class',
                'function',
                'const',
            ],
        ]);

        $ecsConfig->ruleWithConfiguration(GlobalNamespaceImportFixer::class, [
            'import_constants' => true,
            'import_classes' => true,
            'import_functions' => true,
        ]);

        $ecsConfig->ruleWithConfiguration(DeclareEqualNormalizeFixer::class, [
            'space' => 'single',
        ]);

        $ecsConfig->ruleWithConfiguration(ErrorSuppressionFixer::class, [
            'noise_remaining_usages' => true,
        ]);

        $ecsConfig->ruleWithConfiguration(SingleSpaceAroundConstructFixer::class, [
            'constructs_contain_a_single_space' => ['yield_from'],
        ]);

        $ecsConfig->ruleWithConfiguration(ListSyntaxFixer::class, [
            'syntax' => 'short',
        ]);

        $ecsConfig->ruleWithConfiguration(BlankLinesBeforeNamespaceFixer::class, [
            'min_line_breaks' => 2,
            'max_line_breaks' => 2,
        ]);

        $ecsConfig->ruleWithConfiguration(BinaryOperatorSpacesFixer::class, [
            'default' => 'align_single_space_minimal',
            'operators' => [
                '+=' => 'single_space',
                '=' => 'single_space',
                '==' => 'single_space',
                '===' => 'single_space',
                '!==' => 'single_space',
                '&&' => 'single_space',
                '??' => 'single_space',
                '+' => 'single_space',
                '-' => 'single_space',
                '/' => 'single_space',
                '>' => 'single_space',
            ],
        ]);

        $ecsConfig->ruleWithConfiguration(ConcatSpaceFixer::class, [
            'spacing' => 'none',
        ]);

        $ecsConfig->ruleWithConfiguration(IncrementStyleFixer::class, [
            'style' => 'post',
        ]);

        $ecsConfig->ruleWithConfiguration(OperatorLinebreakFixer::class, [
            'position' => 'beginning',
        ]);

        $ecsConfig->ruleWithConfiguration(AlignMultilineCommentFixer::class, [
            'comment_type' => 'phpdocs_only',
        ]);

        $ecsConfig->ruleWithConfiguration(GeneralPhpdocAnnotationRemoveFixer::class, [
            'annotations' => [
                'expectedException',
                'expectedExceptionMessage',
                'expectedExceptionMessageRegExp',
            ],
        ]);

        $ecsConfig->ruleWithConfiguration(GeneralPhpdocTagRenameFixer::class, [
            'case_sensitive' => false,
            'fix_annotation' => true,
            'fix_inline' => true,
            'replacements' => [
                'inheritDoc' => 'inheritdoc',
                'inheritdocs' => 'inheritdoc',
                'inheritDocs' => 'inheritdoc',
            ],
        ]);

        $ecsConfig->ruleWithConfiguration(PhpdocAlignFixer::class, [
            'tags' => ['param'],
            'align' => 'vertical',
        ]);

        $ecsConfig->ruleWithConfiguration(PhpdocInlineTagNormalizerFixer::class, [
            'tags' => ['example', 'id', 'internal', 'inheritdoc', 'inheritdocs', 'link', 'source', 'toc', 'tutorial'],
        ]);

        $ecsConfig->ruleWithConfiguration(PhpdocLineSpanFixer::class, [
            'const' => 'multi',
            'property' => 'multi',
            'method' => 'multi',
        ]);

        $ecsConfig->ruleWithConfiguration( PhpdocNoAliasTagFixer::class, [
            'replacements' => [
                'property-read' => 'property',
                'property-write' => 'property',
                'type' => 'var',
                'link' => 'see',
            ],
        ]);

        $ecsConfig->ruleWithConfiguration(PhpdocOrderByValueFixer::class, [
            'annotations' => ['covers'],
        ]);

        $ecsConfig->ruleWithConfiguration(PhpdocReturnSelfReferenceFixer::class, [
            'replacements' => [
                'this' => '$this',
                '@this' => '$this',
                '$self' => 'self',
                '@self' => 'self',
                '$static' => 'static',
                '@static' => 'static',
            ],
        ]);

        $ecsConfig->ruleWithConfiguration(PhpdocScalarFixer::class, [
            'types' => ['boolean', 'double', 'integer', 'real', 'str'],
        ]);

        $ecsConfig->ruleWithConfiguration(PhpdocTagCasingFixer::class, [
            'tags' => ['inheritdoc'],
        ]);

        $ecsConfig->ruleWithConfiguration(PhpdocTagTypeFixer::class, [
            'tags' => [
                'inheritdoc' => 'inline',
            ],
        ]);

        $ecsConfig->ruleWithConfiguration(PhpdocToCommentFixer::class, [
            'ignored_tags' => ['var'],
        ]);

        $ecsConfig->ruleWithConfiguration(PhpdocTypesFixer::class, [
            'groups' => ['simple', 'alias', 'meta'],
        ]);

        $ecsConfig->ruleWithConfiguration(PhpdocTypesOrderFixer::class, [
            'null_adjustment' => 'always_last',
            'sort_algorithm' => 'alpha',
        ]);

        $ecsConfig->ruleWithConfiguration(MultilineWhitespaceBeforeSemicolonsFixer::class, [
            'strategy' => 'new_line_for_chained_calls',
        ]);

        $ecsConfig->ruleWithConfiguration(SpaceAfterSemicolonFixer::class, [
            'remove_in_empty_for_expressions' => true,
        ]);

        $ecsConfig->ruleWithConfiguration(BlankLineBeforeStatementFixer::class, [
            'statements' => [
                'break',
                'continue',
                'declare',
                'do',
                'for',
                'foreach',
                'if',
                'include',
                'include_once',
                'require',
                'require_once',
                'return',
                'switch',
                'throw',
                'try',
                'while',
                'yield',
            ],
        ]);

        $ecsConfig->ruleWithConfiguration(HeredocIndentationFixer::class, [
            'indentation' => 'start_plus_one',
        ]);

        $ecsConfig->ruleWithConfiguration(NoExtraBlankLinesFixer::class, [
            'tokens' => [
                'break',
                'continue',
                'curly_brace_block',
                'extra',
                'parenthesis_brace_block',
                'return',
                'square_brace_block',
                'switch',
                'throw',
                'use',
            ],
        ]);

        $ecsConfig->ruleWithConfiguration(NoSpacesAroundOffsetFixer::class, [
            'positions' => ['outside'],
        ]);

        $ecsConfig->ruleWithConfiguration(TypesSpacesFixer::class, [
            'space' => 'single',
        ]);

        $ecsConfig->ruleWithConfiguration(PhpUnitExpectationFixer::class, [
            'target' => 'newest',
        ]);

        $ecsConfig->ruleWithConfiguration(PhpUnitNamespacedFixer::class, [
            'target' => 'newest',
        ]);

        $ecsConfig->ruleWithConfiguration(PhpUnitNoExpectationAnnotationFixer::class, [
            'target' => 'newest',
            'use_class_const' => true,
        ]);

        $ecsConfig->ruleWithConfiguration(PhpUnitTestCaseStaticMethodCallsFixer::class, [
            'call_type' => 'this',
        ]);

        $ecsConfig->rules([
            BlankLineAfterNamespaceFixer::class,
            BlankLineAfterOpeningTagFixer::class,
            CleanNamespaceFixer::class,
            CombineConsecutiveIssetsFixer::class,
            CombineConsecutiveUnsetsFixer::class,
            CompactNullableTypehintFixer::class,
            ConstantCaseFixer::class,
            ControlStructureBracesFixer::class,
            DirConstantFixer::class,
            EchoTagSyntaxFixer::class,
            ExplicitIndirectVariableFixer::class,
            ExplicitStringVariableFixer::class,
            FullOpeningTagFixer::class,
            FullyQualifiedStrictTypesFixer::class,
            FunctionTypehintSpaceFixer::class,
            HeredocToNowdocFixer::class,
            IndentationTypeFixer::class,
            LambdaNotUsedImportFixer::class,
            LineEndingFixer::class,
            LinebreakAfterOpeningTagFixer::class,
            LogicalOperatorsFixer::class,
            LowercaseCastFixer::class,
            LowercaseKeywordsFixer::class,
            LowercaseStaticReferenceFixer::class,
            MagicConstantCasingFixer::class,
            MagicMethodCasingFixer::class,
            MbStrFunctionsFixer::class,
            MethodChainingIndentationFixer::class,
            ModernizeTypesCastingFixer::class,
            MultilineCommentOpeningClosingFixer::class,
            NativeFunctionCasingFixer::class,
            NativeFunctionTypeDeclarationCasingFixer::class,
            NewWithBracesFixer::class,
            NoAlternativeSyntaxFixer::class,
            NoBinaryStringFixer::class,
            NoBlankLinesAfterClassOpeningFixer::class,
            NoBlankLinesAfterPhpdocFixer::class,
            NoClosingTagFixer::class,
            NoLeadingImportSlashFixer::class,
            NoLeadingNamespaceWhitespaceFixer::class,
            NoMultilineWhitespaceAroundDoubleArrowFixer::class,
            NoNullPropertyInitializationFixer::class,
            NoShortBoolCastFixer::class,
            NoSinglelineWhitespaceBeforeSemicolonsFixer::class,
            NoSpacesAfterFunctionNameFixer::class,
            NoSpacesInsideParenthesisFixer::class,
            NoSuperfluousElseifFixer::class,
            NoTrailingCommaInSinglelineFixer::class,
            NoTrailingWhitespaceFixer::class,
            NoTrailingWhitespaceInCommentFixer::class,
            NoTrailingWhitespaceInStringFixer::class,
            NoUnreachableDefaultArgumentValueFixer::class,
            NoUnsetCastFixer::class,
            NoUnsetOnPropertyFixer::class,
            NoUnusedImportsFixer::class,
            NoUselessElseFixer::class,
            NoUselessReturnFixer::class,
            NoUselessSprintfFixer::class,
            NoWhitespaceBeforeCommaInArrayFixer::class,
            NoWhitespaceInBlankLineFixer::class,
            NormalizeIndexBraceFixer::class,
            NotOperatorWithSuccessorSpaceFixer::class,
            NullableTypeDeclarationForDefaultNullValueFixer::class,
            ObjectOperatorWithoutWhitespaceFixer::class,
            PhpUnitConstructFixer::class,
            PhpUnitDedicateAssertFixer::class,
            PhpUnitDedicateAssertInternalTypeFixer::class,
            PhpUnitFqcnAnnotationFixer::class,
            PhpUnitSetUpTearDownVisibilityFixer::class,
            PhpUnitStrictFixer::class,
            PhpdocAddMissingParamAnnotationFixer::class,
            PhpdocIndentFixer::class,
            PhpdocInlineTagNormalizerFixer::class,
            PhpdocNoAccessFixer::class,
            PhpdocNoUselessInheritdocFixer::class,
            PhpdocOrderFixer::class,
            PhpdocSeparationFixer::class,
            PhpdocSingleLineVarSpacingFixer::class,
            PhpdocSummaryFixer::class,
            PhpdocTrimConsecutiveBlankLineSeparationFixer::class,
            PhpdocTrimFixer::class,
            PhpdocVarAnnotationCorrectOrderFixer::class,
            PhpdocVarWithoutNameFixer::class,
            RegularCallableCallFixer::class,
            ReturnAssignmentFixer::class,
            SemicolonAfterInstructionFixer::class,
            ShortScalarCastFixer::class,
            SimpleToComplexStringVariableFixer::class,
            SimplifiedIfReturnFixer::class,
            SimplifiedNullReturnFixer::class,
            SingleBlankLineAtEofFixer::class,
            SingleClassElementPerStatementFixer::class,
            SingleLineAfterImportsFixer::class,
            // SingleLineThrowFixer::class,
            SingleQuoteFixer::class,
            StandardizeIncrementFixer::class,
            StandardizeNotEqualsFixer::class,
            StrictComparisonFixer::class,
            StrictParamFixer::class,
            SwitchCaseSemicolonToColonFixer::class,
            SwitchCaseSpaceFixer::class,
            SwitchContinueToBreakFixer::class,
            TernaryOperatorSpacesFixer::class,
            TernaryToElvisOperatorFixer::class,
            TernaryToNullCoalescingFixer::class,
            TrailingCommaInMultilineFixer::class,
            TrimArraySpacesFixer::class,
            UnaryOperatorSpacesFixer::class,
            WhitespaceAfterCommaInArrayFixer::class,
        ]);
    }

    public static function skips(array $additional = []): array
    {
        return [
            ...$additional,
        ];
    }
}
