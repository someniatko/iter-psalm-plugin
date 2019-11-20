<?php
declare(strict_types=1);

namespace AlexS\iter;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SimpleXMLElement;
use Psalm\Plugin\PluginEntryPointInterface;
use Psalm\Plugin\RegistrationInterface;
use SplFileInfo;

final class PsalmPlugin implements PluginEntryPointInterface
{
    public function __invoke(RegistrationInterface $psalm, SimpleXMLElement $config = null): void
    {
        foreach ($this->getStubFilenames() as $file) {
            $psalm->addStubFile($file);
        }
    }

    /** @return iterable<int, string> */
    private function getStubFilenames(): iterable
    {
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(__DIR__ . DIRECTORY_SEPARATOR . 'stubs')
        );

        foreach ($files as $file) {
            if (!$file->isDir()) {
                yield $file->getPathname();
            }
        }
    }
}
