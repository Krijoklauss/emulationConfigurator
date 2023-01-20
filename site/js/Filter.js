
export class Filter {
    constructor() {
        this.lastValue = "SomeStartingValue!";
        this.filterBox = document.querySelector('#filter_box');
        this.filterBox.addEventListener('keydown', (event) => {
            this.searchFilter(event);
        });
    }

    searchFilter(e) {
        let key = e.key;
        let query = this.filterBox.value;
        let regex = new RegExp(/^[A-Za-z]$/gm);

        console.log("Current: ", query);
        console.log("Last value: " + this.lastValue);

        if (regex.test(key) || key == "Backspace") {
            let i = 0;
            let gameElements = document.querySelectorAll('.games > div');
            let gameHeader = document.querySelectorAll('.games > div > span');
            gameHeader.forEach(game => {
                let gameName = game.innerHTML; 
                if(
                    query == "" ||
                    gameName == query ||
                    gameName.includes(query) ||
                    gameName.toLowerCase() == query ||
                    gameName.toLowerCase().includes(query)
                ) 
                {
                    gameElements[i].style.display = "flex";
                } else if(key == "Backspace") {
                    if(this.lastValue == query) {
                        gameElements[i].style.display = "flex";
                    } else {
                        gameElements[i].style.display = "none";   
                    }
                } else {
                    gameElements[i].style.display = "none";
                }
                i += 1;
            });
        }
        this.lastValue = query;
    }

    regionFilter() {

    }
}
