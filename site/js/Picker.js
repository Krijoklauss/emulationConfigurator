
export class Picker {

    constructor() {}

    selectGame(gameValue) {
        var games = document.querySelectorAll('.gameFlex');
        for(var i = 0; i != games.length ; i++) {
            if(games[i].dataset.game == gameValue) {
                games[i].style.backgroundColor = "rgba(75, 75, 200, 1)";
                games[i].style.filter = 'brightness(100%)';
            } else {
                games[i].style.backgroundColor = "rgba(75, 75, 200, 0.3)";
                games[i].style.filter = 'brightness(60%)';
            }
        }
        document.getElementById('game_picker').value = gameValue;
    }

    selectEmulator(consoleName) {
        var picker = document.getElementById('emu_picker');
        var options = document.querySelectorAll('#emu_picker > option');
        for(var i = 0; i != options.length ; i++) {
            var consoles = options[i].dataset.consoles;
            if(consoles.includes(consoleName)) {
                picker.value = options[i].value;
                break;
            }
        }
    }

    chooseGames(consoleName) {
        var i = 0;
        var self = this;
        var gameValue = "";
        document.querySelectorAll('.games > div').forEach(e => {
            e.addEventListener('click', function() {
                self.selectGame(e.dataset.game);
            });

            e.dataset.active = "false";
            e.style.display = "none";
            var gameConsole = document.querySelectorAll('#game_picker > option')[i].dataset.console;
            if(gameConsole == consoleName) {
                e.style.display = "flex";
                e.dataset.active = "true";
                if(gameValue == "") {
                    gameValue = e.dataset.game;
                }
            }
            i++;
        });
        this.selectEmulator(consoleName);
        this.selectGame(gameValue);
    }

    selectConsole(consoleName) {
        document.querySelector('.spinner').classList.remove('hide');

        var allConsoleElements = Array.from(document.getElementsByClassName('consoleFlex'));
        allConsoleElements.forEach(e => {
            e.style.backgroundColor = "rgba(75, 75, 200, 0.3)";
            e.style.filter = 'brightness(60%)';
        });

        var consoleSelectors = document.querySelectorAll('#console_picker > option');
        for(var i = 0; i != consoleSelectors.length; i++) {
            var e = consoleSelectors[i];
            if(e.value == consoleName) {
                // Set value
                document.querySelector('#console_picker').value = e.value;

                for(var x=0; x!=allConsoleElements.length; x++) {
                    if(allConsoleElements[i].dataset.console == consoleName) {
                        // Change background color
                        allConsoleElements[i].style.backgroundColor = "rgba(75, 75, 200, 1)";
                        allConsoleElements[i].style.filter = 'brightness(100%)';
                        break;
                    }
                }
                break;
            }
        }
        this.chooseGames(consoleName);
        document.querySelector('.spinner').classList.add('hide');
    }
}
