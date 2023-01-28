@echo off

:: Checking if php exists already
IF EXIST ../PHP/PHP.exe (
    echo "PHP is already installed!"
) ELSE (
    :: Check if Zip is already present!
    IF EXIST ../PHP/PHP.zip (
        echo "Already Downloaded!"
    ) ELSE (
        echo "Downloading First!"
        powershell -Command "Invoke-WebRequest https://windows.php.net/downloads/releases/php-8.2.1-nts-Win32-vs16-x64.zip -OutFile ../PHP/PHP.zip"
    )
    powershell -Command "Expand-Archive -Force ../PHP/PHP.zip ../PHP/"
)

echo "Php is installed!"
exit
