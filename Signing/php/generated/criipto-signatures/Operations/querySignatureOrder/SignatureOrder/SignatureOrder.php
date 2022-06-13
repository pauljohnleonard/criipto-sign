<?php

declare(strict_types=1);

namespace Criipto\SignaturesApi\Operations\querySignatureOrder\SignatureOrder;

/**
 * @property string $status
 * @property array<int, \Criipto\SignaturesApi\Operations\querySignatureOrder\SignatureOrder\Signatories\Signatory> $signatories
 * @property array<int, \Criipto\SignaturesApi\Operations\querySignatureOrder\SignatureOrder\Documents\PdfDocument> $documents
 * @property string $__typename
 */
class SignatureOrder extends \Spawnia\Sailor\ObjectLike
{
    /**
     * @param string $status
     * @param array<int, \Criipto\SignaturesApi\Operations\querySignatureOrder\SignatureOrder\Signatories\Signatory> $signatories
     * @param array<int, \Criipto\SignaturesApi\Operations\querySignatureOrder\SignatureOrder\Documents\PdfDocument> $documents
     */
    public static function make($status, $signatories, $documents): self
    {
        $instance = new self;

        if ($status !== self::UNDEFINED) {
            $instance->status = $status;
        }
        if ($signatories !== self::UNDEFINED) {
            $instance->signatories = $signatories;
        }
        if ($documents !== self::UNDEFINED) {
            $instance->documents = $documents;
        }
        $instance->__typename = 'SignatureOrder';

        return $instance;
    }

    protected function converters(): array
    {
        static $converters;

        return $converters ??= [
            'status' => new \Spawnia\Sailor\Convert\NonNullConverter(new \Spawnia\Sailor\Convert\EnumConverter),
            'signatories' => new \Spawnia\Sailor\Convert\NonNullConverter(new \Spawnia\Sailor\Convert\ListConverter(new \Spawnia\Sailor\Convert\NonNullConverter(new \Criipto\SignaturesApi\Operations\querySignatureOrder\SignatureOrder\Signatories\Signatory))),
            'documents' => new \Spawnia\Sailor\Convert\NonNullConverter(new \Spawnia\Sailor\Convert\ListConverter(new \Spawnia\Sailor\Convert\NonNullConverter(new \Spawnia\Sailor\Convert\PolymorphicConverter([
            'PdfDocument' => '\\Criipto\\SignaturesApi\\Operations\\querySignatureOrder\\SignatureOrder\\Documents\\PdfDocument',
        ])))),
            '__typename' => new \Spawnia\Sailor\Convert\NonNullConverter(new \Spawnia\Sailor\Convert\StringConverter),
        ];
    }

    public static function endpoint(): string
    {
        return 'criipto-signatures';
    }

    public static function config(): string
    {
        return __DIR__ . '/../../../../../sailor.php';
    }
}
