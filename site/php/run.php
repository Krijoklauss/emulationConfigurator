<?php


class CommandRunner {

    private bool $debug_enabled = true;
    private string $emulator_path = "C:\\Emulator\\emulator\\";
    private string $game_folder_path = "C:\\Emulator\\roms\\";

    function __construct($emu, $console, $game) {
        $this->$emu($emu, $console, $game);
    }

    private function dolphin($emu, $console, $game) {
        $executor = "start %s\\%s\\%s.exe -e %sroms\\%s\\%s > /dev/null 2>&1 &";
        exec(escapeshellcmd(sprintf($executor, $this->emulator_path, $emu, $emu, $this->game_folder_path, $console, $game)));
    }

    private function visualboyadvance($emu, $console, $game) {


        $executor = "start %s\\%s\\%s.exe %s\\%s\\%s > /dev/null 2>&1 &";
        $executor = escapeshellcmd(sprintf($executor, $this->emulator_path, $emu, $emu, $this->game_folder_path, $console, $game));
        pclose(popen("start /B ". $executor, "r"));
    }

    private function log($str) {
        if($this->debug_enabled) {
            echo $str;
        }
    }
}


if(
    isset($_POST['emulator']) && 
    isset($_POST['game']) && 
    isset($_POST['console']) &&
    gettype($_POST['emulator']) == "string" && 
    gettype($_POST['game']) == "string" &&
    gettype($_POST['console'] == "string") &&
    strlen($_POST['emulator']) > 3 && 
    strlen($_POST['game']) > 3 &&
    strlen($_POST['console'] > 3)
)
{
    new CommandRunner($_POST['emulator'], $_POST['console'], $_POST['game']);
}
