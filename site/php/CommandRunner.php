<?php

class CommandRunner {

    // Instanzvariablen
    private const debug_enabled = false;
    private const emulator_path = "C:\\Emulator\\emulator\\";
    private const game_folder_path = "C:\\Emulator\\games\\";

    // Konstruktor
    function __construct($emu, $console, $game) {
        $executor = $this->$emu($emu, $console, $game);
        $this->runGame($executor);
    }

    private function dolphin($emu, $console, $game): string {
        $executor = "%s%s\\%s.exe %s%s\\%s";
        return escapeshellcmd(sprintf($executor, CommandRunner::emulator_path, $emu, $emu, CommandRunner::game_folder_path, $console, $game));
    }

    private function visualboyadvance($emu, $console, $game): string {
        $executor = "%s%s\\%s.exe %s%s\\%s";
        return escapeshellcmd(sprintf($executor, CommandRunner::emulator_path, $emu, $emu, CommandRunner::game_folder_path, $console, $game));
    }

    private function runGame($cmd) {
        // Executes command on windows System to run the emulator
        exec($cmd);

        // Redirects back to landingpage (Dont to see debugger output)
        if(CommandRunner::debug_enabled) {
            echo $cmd;
        }
        else {
            header("Location: http://localhost");
        }
    }

    // Basic logs (Only visible in debug mode)
    private function log($str) {
        if(CommandRunner::debug_enabled) {
            echo $str;
        }
    }
}

// Check 
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
