move C:\emulatorRunner\Apache24 C:\
cd C:/Apache24/bin
httpd -k uninstall
httpd -k install
httpd -k start
pause