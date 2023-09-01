<?php

namespace App\Traits;

use Illuminate\Support\Str;/**
 * Undocumented trait
 */
trait FileManipulationTrait
{
    /**
     * @param  string $path Path to Load
     * @param  string $namespace Relative Namespace folder
     * @return array
     */
    private function loadRulesFromPath(string $path, string $namespace): array
    {
        $path = $path.DIRECTORY_SEPARATOR;
        $rules = [];

        if (!file_exists($path) && !is_dir($path)) {
            return false;
        }

        collect(scandir($path))
            ->each(
                function ($item) use ($path, $namespace, &$rules) {
                    if (in_array($item, ['.', '..'])) {
                        return;
                    }

                    if (is_dir($path.$item)) {
                        $rules = array_merge(
                            $rules,
                            $this->loadRulesFromPath($path.$item, $namespace.'\\'.ucfirst($item))
                        );
                    }

                    if (is_file($path.$item)) {
                        $item = str_replace('.php', '', $item);
                        $classNamespace = $namespace.'\\'.ucfirst($item);
                        if (class_exists($classNamespace)) {
                            $rules[Str::snake($item)] = $classNamespace;
                        }
                    }
                }
            );
        return $rules;
    }
}