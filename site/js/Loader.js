import { Picker } from "./Picker.js";

export class Loader {
    constructor() {
        this.picker = new Picker();
        this.setEventListeners();
        this.loadContent(document.querySelectorAll('#console_picker > option'), document.querySelectorAll('#game_picker > option'));
    }

    setEventListeners() {
        var self = this;
        document.addEventListener('DOMContentLoaded', function() {
            self.picker.selectConsole('gameboy');
        });
    }

    loadContent(consoles, games) {
        let self = this;
        let consoleContainer = document.querySelector('.consoles');
        consoles.forEach(e => {
            let imageWrapper = document.createElement('div');
            imageWrapper.classList.add('consoleFlex');
            imageWrapper.dataset.console = e.value;
            imageWrapper.addEventListener('click', function(){
                self.picker.selectConsole(e.value);
            });
            
            let imageElement = document.createElement('img');
            imageElement.src = "/assets/images/" + e.value + ".png";
            imageWrapper.appendChild(imageElement);
            consoleContainer.appendChild(imageWrapper);
        });
        
        let gameContainer = document.querySelector('.games');
        games.forEach(e => {
            let imageWrapper = document.createElement('div');
            imageWrapper.classList.add('gameFlex');
            imageWrapper.dataset.game = e.value;

            let imageElement = document.createElement('img');
            imageElement.src = "assets/images/" + e.value + ".png"
            imageElement.alt = e.text;
            imageElement.dataset.game = e.value;
            imageWrapper.appendChild(imageElement);
            gameContainer.appendChild(imageWrapper);
        });
    }
}
