
export class Filter {
    constructor() {
        this.lastValue = "SomeStartingValue!";
        this.filterBox = document.querySelector('#filter_box');
        
        let self = this;
        this.filterBox.addEventListener('keydown', (event) => {
            setTimeout(function() {
                self.searchFilter(event);
            }, 1);
        });
    }

    searchFilter(e) {
        let key = e.key;
        let query = this.filterBox.value;
        let regex = new RegExp(/^[A-Za-z]$/gm);

        if (regex.test(key) || key == "Backspace") {
            let i = 0;
            let gameElements = document.querySelectorAll('.games > div');
            let gameHeader = document.querySelectorAll('.games > div > span');
            gameHeader.forEach(game => {
                let gameElement = gameElements[i];
                if(gameElement.dataset.active == "true") {
                    let gameName = game.innerHTML; 
                    if(
                        query == "" ||
                        gameName == query ||
                        gameName.includes(query) ||
                        gameName.toLowerCase() == query ||
                        gameName.toLowerCase().includes(query)
                    ) 
                    {
                        gameElement.style.display = "flex";
                    } else if(key == "Backspace") {
                        if(this.lastValue == query) {
                            gameElement.style.display = "flex";
                        } else {
                            gameElement.style.display = "none";   
                        }
                    } else {
                        gameElement.style.display = "none";
                    }
                }
                i += 1;
            });
        }
        this.lastValue = query;
    }

    regionFilter() {

    }
}
