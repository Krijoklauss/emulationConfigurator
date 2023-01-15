@echo off


cd C:\Emulator\site
TASKLIST | FINDSTR php.exe || start /b C:\Emulator\PHP\php.exe -S localhost:80

cd C:\Program Files\Google\Chrome\Application\
chrome /new-window --start-fullscreen --app=http://localhost
