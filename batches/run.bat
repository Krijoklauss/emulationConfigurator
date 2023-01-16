@echo off

cd C:\Emulator\site
TASKLIST | FINDSTR php.exe || start /b C:\Emulator\PHP\php.exe -S localhost:80

Rem This code kills all running msedge .exe processes
Rem This is to force fullscreen when running the program
Rem If you're using Edge as a normal browser you can comment theese lines to prevent other tabs from closing
tasklist /fi "Microsoft Edge eq msedge.exe" |find ":" > nul
if errorlevel 1 taskkill /f /im "msedge.exe"

cd "C:\Program Files (x86)\Microsoft\Edge\Application"
msedge /new-window --start-fullscreen --app=http://localhost
