<?php

class LocalManager {
    private const game_path = "C:\\Emulator\\games\\";
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

    function loadGames(): void {
        $consoles = scandir(LocalManager::game_path);
        foreach($consoles as $console) {
            if($console != "." && $console != ".." && $console != ".gitignore") {
                $console_path = LocalManager::game_path . $console . "\\";
                $games = scandir($console_path);
                foreach($games as $game) {
                    if($game != "." && $game != ".." && $game != ".gitignore") {
                        $cleanGame = $this->cleanString($game);
                        echo "<option value='{$game}' data-console='{$console}'>{$cleanGame}</option>";
                    }
                }
            }
        }
    }
}
