<!DOCTYPE html>
<html lang="en">
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
                    <h1 class="head_spacer">Emulator runner</h1>
                </div>
                <div class="content">
                    <div class="consoles"></div>
                    <div class="actions">
                        <h2 id="actions">Aktionen</h2>
                        <button class="submit_button" type="button">Play</button>
                        <button class="exitButton" type="button">Exit</button>
                    </div>

                    <h2 id="filter_head">Filter</h2>
                    <div class="filter">
                        <input id="filter_box" type="text" placeholder="Spieletitel...">
                        <ul>
                            <li>
                                <label class="filter_label" for="region_filter_all">Alle Regionen</label>
                                <input class="region_filter" type="checkbox" value="all" id="region_filter_all" checked />
                            </li>
                            <li>
                                <label class="filter_label" for="region_filter_europe">Europa</label>
                                <input class="region_filter" type="checkbox" value="europe" id="region_filter_europe" />
                            </li>
                            <li>
                                <label class="filter_label" for="region_filter_asia">Asien</label>
                                <input class="region_filter" type="checkbox" value="asia" id="region_filter_asia" />
                            </li>
                            <li>
                                <label class="filter_label" for="region_filter_usa">USA</label>
                                <input class="region_filter" type="checkbox" value="usa" id="region_filter_usa" />
                            </li>
                        </ul>
                    </div>

                    <div class="head_space_wrapper">
                        <h2 class="head_spacer">Spiele</h2>
                        <span id="count">0</span>
                    </div>
                    <div class="games"></div>
                    <form action="./php/CommandRunner.php" method="post" id="runner">
                        <div>
                            <label for="emu_picker">Wähle deinen Emulator:</label>
                            <select name="emulator" form="runner" id="emu_picker" required>
                                <option value="bgb" data-consoles='["gameboy"]'>BoyGameBoyBoyBoyBoy</option>
                                <option value="visualboyadvance" data-consoles='["gameboy_advance, gameboy_color"]'>VisualBoyAdvance</option>
                                <option value="snes9x" data-consoles='["snes"]'>SNES9X</option>
                                <option value="project64" data-consoles='["n64"]'>Project 64</option>
                                <option value="dolphin" data-consoles='["wii", "gamecube"]'>Dolphin</option>
                                <option value="desmume" data-consoles='["ds"]'>DeSmuME</option>
                                <option value="citra" data-consoles='["3ds"]'>Citra</option>
                                <option value="cemu" data-consoles='["wii-u"]'>Cemu</option>
                                <option value="yuzu" data-consoles='["switch"]'>Yuzu</option>
                                <option value="pcsx" data-consoles='["playstation-1"]'>PCSX</option>
                                <option value="pcsx2" data-consoles='["playstation-2"]' selected>PCSX2</option>
                                <option value="rpcs3" data-consoles='["playstation-3"]'>RPCS3</option>
                                <option value="ppsspp" data-consoles='["psp"]'>PPSSPP</option>
                                <option value="exit"></option>
                            </select>
                        </div>
                        <div>
                            <label for="console_picker">Wähle deine Konsole:</label>
                            <select name="console" form="runner" id="console_picker" required>
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
                                <option value="playstation-1">Playstation</option>
                                <option value="playstation-2">Playstation 2</option>
                                <option value="playstation-3">Playstation 3</option>
                                <option value="psp">Playstation Portable (PSP)</option>
                            </select>
                        </div>
                        <div>
                            <label for="game_picker">Wähle dein Spiel aus:</label>
                            <select name="game" form="runner" id="game_picker" required>
                                <?php new LocalManager("Games"); ?>
                            </select>
                        </div>
                    </form> 
                    <div class="games_content">
                        <div class="search_wrapper"></div>
                        <div class="sorting_wrapper"></div>
                        <div class="games_list"></div>
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