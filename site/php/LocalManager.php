<?php

class LocalManager {
    private const assets_path = __DIR__ . "\\..\\assets\\";
    private const game_path = __DIR__ . "\\..\\..\\games\\";
    function __construct($function) {
        $function = "load" . $function;
        $this->$function();
    }

    function cleanString($str): string {
        $str = str_replace("_", " ", $str);
        $position = strpos($str, ".", strlen($str) - 5);
        $str = substr_replace($str, "", $position);
        return $str;
    }

    function filterKeywords($keywords): array {
        $returner = [];
        foreach($keywords as $keyword) {
            if(str_contains($keyword, "(")) {
                break;
            }
            array_push($returner, $keyword);
        }
        return $returner;
    }

    function getImageURL($console, $game): string {
        $directory = LocalManager::assets_path . "images\\games\\" . $console . "\\";
        $gameAssets = scandir($directory);
        $gameKeywords = $this->filterKeywords(explode(" ", $game));
        $maxLength = count($gameKeywords);
        $multiplier = 100 / $maxLength;
        $overlapCount = 0;
        $percentage = 0;

        foreach($gameAssets as $file) {
            foreach($gameKeywords as $keyword) {
                if(str_contains($file, $keyword)) {
                    $overlapCount += 1;
                    $percentage = $multiplier * $overlapCount;
                }

                if($percentage > 66) {
                    return $file;
                }
            }
        }
        return "..\\..\\placeholder.png";
    }

    function loadGames(): void {
        $consoles = scandir(LocalManager::game_path);
        foreach($consoles as $console) {
            if($console != "." && $console != ".." && $console != ".gitignore") {
                $console_path = LocalManager::game_path . $console . "\\";
                $games = scandir($console_path);
                foreach($games as $game) {
                    if($game != "." && $game != ".." && $game != ".gitignore" && !str_ends_with($game, '.sav')) {
                        $cleanGame = $this->cleanString($game);
                        $imageUrl = $this->getImageURL($console, $game);
                        $optionPattern = '<option value="%s" data-console="%s" data-image="%s">%s</option>';
                        echo sprintf($optionPattern, $game, $console, $imageUrl, $cleanGame);
                    }
                }
            }
        }
    }
}
