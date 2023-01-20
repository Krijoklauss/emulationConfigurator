import { Loader } from "./js/Loader.js";

function exit() {
    document.querySelector('#emu_picker').value = "exit";
    document.querySelector('#runner').submit();
}

// This function alerts the user if an error occured while interacting with PHP (also replaces url parameter)
function checkError() {
    const queryString = window.location.search;
    const urlParameter = new URLSearchParams(queryString);
    const error = urlParameter.get('error');
    if(error != null) {
        alert(error);
    }
    window.history.replaceState('', '', 'tool');
}

function main() {

    // Add submit clickListener to submit button
    let submitButton = document.querySelector('.submit_button');
    let form = document.querySelector('form');
    submitButton.addEventListener('click', function() {
        form.submit();
    });

    // Add ClickListener to exitButton
    document.querySelector('.exitButton').addEventListener('click', exit);

    // Check Error after DOMContentLoaded
    document.addEventListener('DOMContentLoaded', checkError);

    // Creates new Loader instance to load content
    new Loader();
}

main();
