@echo off

cd %~dp0
cd "..\site"
TASKLIST | FINDSTR php.exe || start /b ..\PHP\php.exe -S localhost:80

tasklist /fi "Microsoft Edge eq msedge.exe" | find ":" > nul
if errorlevel 1 taskkill /f /im "msedge.exe"

cd "C:\Program Files (x86)\Microsoft\Edge\Application"
msedge /new-window --start-fullscreen --app=http://localhost
