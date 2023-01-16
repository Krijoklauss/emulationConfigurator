<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Emulator tool</title>
        <link rel="icon" type="image/x-icon" href="/assets/images/ico.png">
        <link rel="stylesheet" href="./css/stylesheet.css"></link>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Share+Tech&display=swap" rel="stylesheet">
        <script type="module" src="global.js" defer></script>
        <?php include "./php/LocalManager.php"; ?>
    </head>
    <body>
        <div class="backgroundLayer"></div>
        <div class="background_overlay">
            <div class="content_wrapper">
                <div class="header">
                    <h1>Emulator runner</h1>
                </div>
                <div class="content">
                    <div class="filter">
                        <form action="./php/CommandRunner.php" method="post" id="runner">

                            <div>
                                <label for="emu_picker">Wähle deinen Emulator:</label>
                                <select name="emulator" form="runner" id="emu_picker">
                                    <option disabled>Nintendo</option>
                                    <option value="sameboy">SameBoy</option>
                                    <option value="visualboyadvance">VisualBoyAdvance</option>
                                    <option value="snes9x">SNES9X</option>
                                    <option value="project64">Project 64</option>
                                    <option value="dolphin">Dolphin</option>
                                    <option value="desmume">DeSmuME</option>
                                    <option value="citra">Citra</option>
                                    <option value="cemu">Cemu</option>
                                    <option value="yuzu">Yuzu</option>
                                    <option disabled>Playstation</option>
                                    <option value="pcsx">PCSX</option>
                                    <option value="pcsx2">PCSX2</option>
                                    <option value="rpcs3">RPCS3</option>
                                    <option value="ppsspp">PPSSPP</option>
                                </select>
                            </div>

                            <div>
                                <label for="console_picker">Wähle deine Konsole:</label>
                                <select name="console" form="runner" id="console_picker">
                                    <option disabled>Nintendo</option>
                                    <option value="gameboy">Gameboy</option>
                                    <option value="gameboy_advance">Gameboy Advance</option>
                                    <option value="gameboy_color">Gameboy Color</option> 
                                    <option value="snes">SNES</option>
                                    <option value="n64">Nintendo 64</option>
                                    <option value="wii">Nintendo Wii</option>
                                    <option value="ds">Nintendo DS</option>
                                    <option value="3ds">Nintendo 3DS</option>
                                    <option value="gamecube">Nintendo Gamecube</option>
                                    <option value="wii-u">Nintendo Wii U</option>
                                    <option value="switch">Nintendo Switch</option>
                                    <option disabled>Playstation</option>
                                    <option value="playstation-1">Playstation</option>
                                    <option value="playstation-2">Playstation 2</option>
                                    <option value="playstation-3">Playstation 3</option>
                                    <option value="psp">Playstation Portable (PSP)</option>
                                </select>
                            </div>

                            <div>
                                <label for="game_picker">Wähle dein Spiel aus:</label>
                                <select name="game" form="runner" id="game_picker">
                                    <?php new LocalManager("Games"); ?>
                                </select>
                            </div>

                            <div>
                                <button type="submit">Play</button>
                            </div>
                        </form> 
                    </div>
                    <div class="games_content">
                        <div class="search_wrapper">
                        </div>
                        <div class="sorting_wrapper">
                        </div>
                        <div class="games_list">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="spinner hide">
            <div class="position_wrapper">
                <img src="/assets/animations/spinner.gif" alt="Spinner">
            </div>
        </div>
    </body>
</html>