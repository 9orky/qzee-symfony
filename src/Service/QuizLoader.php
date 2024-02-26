<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\Yaml\Yaml;

class QuizLoader
{
    public function readYamlFiles(string $folderPath): array
    {
        if (!is_dir($folderPath)) {
            throw new \InvalidArgumentException("Folder not found.");
        }

        $data = [];

        $files = scandir($folderPath);
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'yml') {
                $yamlContent = file_get_contents($folderPath . '/' . $file);

                $yamlData = Yaml::parse($yamlContent);

                $data[] = $yamlData;
            }
        }
        return $data;
    }
}