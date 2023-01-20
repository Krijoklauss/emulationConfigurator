
export class Filter {
    constructor() {
        let self = this;
        this.lastValue = "SomeStartingValue!";
        this.filterBox = document.querySelector('#filter_box');
        this.filterBox.addEventListener('keydown', (event) => {
            setTimeout(function() {
                self.searchFilter(event);
            }, 1);
        });

        this.regionFilters = document.querySelectorAll('.region_filter');
        this.regionFilters.forEach(regionFilter => {
            regionFilter.addEventListener('click', (event) => {
                self.changeSelector(event);
            });
        });
    }

    searchFilter(e) {
        let key = e.key;
        let query = this.filterBox.value;
        let regex = new RegExp(/^[A-Za-z ]$/gm);

        if (regex.test(key) || key == "Backspace") {
            let i = 0;
            let gameElements = document.querySelectorAll('.games > div');
            let gameHeader = document.querySelectorAll('.games > div > span');
            gameHeader.forEach(game => {
                let gameElement = gameElements[i];
                gameElement.dataset.filtered = "false";
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
                        gameElement.dataset.filtered = "true";
                    } else if(key == "Backspace") {
                        if(this.lastValue == query) {
                            gameElement.style.display = "flex";
                            gameElement.dataset.filtered = "true";
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
        this.filterRegions(this.getRegions());
    }

    filterRegions(regions) {
        let i = 0;
        let currentQuery = this.filterBox.value;
        let headElements = document.querySelectorAll('.games > div > span');
        document.querySelectorAll('.games > div').forEach(gameElement => {
            let isFiltered = gameElement.dataset.filtered;
            let activator = gameElement.dataset.active;
            let gameName = headElements[i].innerHTML;

            if(regions.includes("all") && activator == "true") {
                if(currentQuery == "") {
                    gameElement.style.display = "flex";
                } else if(isFiltered == "true") {
                    gameElement.style.display = "flex";
                } 
            } else if(activator == "true") {
                let x = 0;
                regions.forEach(region => {
                    if(gameName.toLowerCase().includes(region.toLowerCase())) {
                        x += 1;
                    }
                });

                if(x == regions.length) {
                    if(currentQuery == "") {
                        gameElement.style.display = "flex";
                    } else if(isFiltered == "true") {
                        gameElement.style.display = "flex";
                    } 
                } else {
                    gameElement.style.display = "none";
                }
            }
            i += 1;
        });
        this.countGames();
    }

    changeSelector(event) {
        let checkbox = event.target || event.srcElement;
        let usaFilter = document.querySelector('#region_filter_usa');
        let asiaFilter = document.querySelector('#region_filter_asia');
        let europeFilter = document.querySelector('#region_filter_europe'); 
        let allRegionsFilter = document.querySelector('#region_filter_all');

        if(allRegionsFilter.checked && checkbox != allRegionsFilter) {
            allRegionsFilter.checked = false;
        }

        if(checkbox == allRegionsFilter && checkbox.checked) {
            this.regionFilters.forEach(filter => {
                filter.checked = false;
            });
            checkbox.checked = true;
        }

        if(!usaFilter.checked && !europeFilter.checked && !asiaFilter.checked && !allRegionsFilter.checked) {
            allRegionsFilter.checked = true;
        }

        if(usaFilter.checked && europeFilter.checked && asiaFilter.checked) {
            usaFilter.checked = false;
            europeFilter.checked = false;
            asiaFilter.checked = false;
            allRegionsFilter.checked = true;
        }

        this.filterRegions(this.getRegions());
    }

    getRegions() {
        let regions = [];
        let usaFilter = document.querySelector('#region_filter_usa');
        let asiaFilter = document.querySelector('#region_filter_asia');
        let europeFilter = document.querySelector('#region_filter_europe'); 
        let allRegionsFilter = document.querySelector('#region_filter_all');

        if(allRegionsFilter.checked) {
            regions.push("all");
        }

        if(usaFilter.checked) {
            regions.push("usa");
        }

        if(europeFilter.checked) {
            regions.push("europe");
        }

        if(asiaFilter.checked) {
            regions.push("japan");
        }
        return regions;
    }

    countGames() {
        let counter = 0;
        const gameCount = document.querySelector('#count');
        document.querySelectorAll('.games > div').forEach(gameElement => {
            if(gameElement.style.display == "flex") {
                counter += 1;
            }
        });
        gameCount.textContent = counter;
    }
}
