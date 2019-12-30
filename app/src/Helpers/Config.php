<?php

namespace App\Helpers;

class Config
{
    public static function get(string $filename, string $key = null): array
    {
        $fileContent = self::getFileContent($filename);

        if ($key === null) {
            return $fileContent;
        }

        return isset($fileContent[$key]) ? $fileContent[$key] : [];
    }

    public static function getFileContent(string $filename): array
    {
        $fileContent = [];

        try {
            $path = realpath(__DIR__ . '/../Resources' . $filename . '.php');

            if (file_exists($path)) {
                $fileContent = require $path;
            }
        } catch (\Throwable $exception) {
            throw new \RuntimeException(
                sprintf('The specified file: %s was not found', $filename)
            );
        }

        return $fileContent;
    }
}
