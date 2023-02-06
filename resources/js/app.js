import 'regenerator-runtime/runtime'
import './bootstrap';

import "core-js/stable";
import "babel-polyfill";
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const options = {
    idleTimePress: 100,
    minNumberOfCharacters: 0,
    searchOptions: {
        key: 'mjOVKpgWnl7gsw0eNKkVguzisLjLZGIh',
        language: 'it-IT',
        limit: 5
    },
    autocompleteOptions: {
        key: 'mjOVKpgWnl7gsw0eNKkVguzisLjLZGIh',
        language: 'it-IT'
    },
    noResultsMessage: 'No results found.'
}

//delete modal
const deleteSubmitButtons = document.querySelectorAll('.delete-button');
deleteSubmitButtons.forEach((button) => {
    button.addEventListener('click', (event) => {
        event.preventDefault();

        const dataTitle = button.getAttribute('data-item-title');

        const modal = document.getElementById('deleteModal');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalItemTitle = modal.querySelector('#modal-item-title');
        modalItemTitle.textContent = dataTitle;

        const buttonDelete = modal.querySelector('button.btn-primary');

        buttonDelete.addEventListener('click', () => {
            button.parentElement.submit();
        })
    })
});

//Image preview
if(document.getElementById('cover_image')){
    const previewImage = document.getElementById('cover_image');
    previewImage.addEventListener('change', (event) => {
    var oFReader = new FileReader();
    // var image  =  previewImage.files[0];
    // console.log(image);
    oFReader.readAsDataURL(previewImage.files[0]);

    oFReader.onload = function (oFREvent) {
        //console.log(oFREvent);
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
});
}

if(document.getElementById('searchBox')){
    let ttSearchBox = new tt.plugins.SearchBox(tt.services, options);

    let searchBoxHTML = ttSearchBox.getSearchBoxHTML();
    const searchBox = document.getElementById('searchBox');
    searchBox.appendChild(searchBoxHTML);

    ttSearchBox.on('tomtom.searchbox.resultsfound', function(data) {
        console.log(data);
    })

    ttSearchBox.on('tomtom.searchbox.resultselected', function(data) {
        console.log(data);
    })
}
