
export class Picker {

    constructor(console) {
        this.selectConsole(console);
    }

    selectEmulator(consoleName) {

    }

    selectConsole(consoleName) {

        document.querySelectorAll('.consoles > div').forEach(e => {
            e.style.backgroundColor = "rgba(75, 75, 200, 0.3)";
        });

        var consoleSelectors = document.querySelectorAll('#console_picker > option');
        for(var i = 0; i != consoleSelectors.length; i++) {
            var e = consoleSelectors[i];
            if(e.value == consoleName) {
                // Set value
                document.querySelector('#console_picker').value = e.value;

                var consoles = document.querySelectorAll('.consoles > div');
                for(var x=0; x!=consoles.length; x++) {
                    if(consoles[i].dataset.console == consoleName) {
                        // Change background color
                        consoles[i].style.backgroundColor = "rgba(0, 128, 0, 0.4)";
                        console.log("Green");
                        break;
                    }
                }
                break;
            }
        }
        this.chooseGames(consoleName);
    }

    chooseGames(consoleName) {
        var i = 0;
        document.querySelectorAll('.games > div').forEach(e => {
            e.style.display = "none";
            var gameConsole = document.querySelectorAll('#game_picker > option')[i].dataset.console;
            if(gameConsole == consoleName) {
                e.style.display = "flex";
                var myGame = document.querySelectorAll('.games > div')[0];
                document.querySelector('#game_picker').value = myGame.dataset.game;
                myGame.style.backgroundColor = "rgba(0, 128, 0, 0.4)";
            }
            i++;
        });
        this.selectEmulator(consoleName);
    }
}
