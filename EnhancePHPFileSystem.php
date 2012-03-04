<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPFileSystem
 *
 * @author User
 */
class EnhancePHPFileSystem {

    public function getFilesFromDirectory($directory, $isRecursive, $excludeRules) {
        $files = array();
        if ($handle = opendir($directory)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != '.' && $file != '..' && strpos($file, '.') !== 0) {
                    if ($this->isFolderExcluded($file, $excludeRules)) {
                        continue;
                    }

                    if (is_dir($directory . '/' . $file)) {
                        if ($isRecursive) {
                            $dir2 = $directory . '/' . $file;
                            $files[] = $this->getFilesFromDirectory($dir2, $isRecursive, $excludeRules);
                        }
                    } else {
                        $files[] = $directory . '/' . $file;
                    }
                }
            }
            closedir($handle);
        }
        return $this->flattenArray($files);
    }

    private function isFolderExcluded($folder, $excludeRules) {
        $folder = substr($folder, strrpos($folder, '/'));

        foreach ($excludeRules as $excluded) {
            if ($folder === $excluded) {
                return true;
            }
        }
        return false;
    }

    public function flattenArray($array) {
        $merged = array();
        foreach ($array as $a) {
            if (is_array($a)) {
                $merged = array_merge($merged, $this->flattenArray($a));
            } else {
                $merged[] = $a;
            }
        }
        return $merged;
    }

}

?>
