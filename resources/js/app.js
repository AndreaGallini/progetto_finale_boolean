import 'regenerator-runtime/runtime'
import './bootstrap';

import "core-js/stable";
import "babel-polyfill";
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import axios from 'axios';
import { forEach } from 'lodash';
import.meta.glob([
    '../img/**'
])

const options = {
    idleTimePress: 100,
    minNumberOfCharacters: 0,
    searchOptions: {
        key: 'h7cAdo65F2uuetiST0o1pnUygRaWDuuX',
        language: 'it-IT',
        limit: 5
    },
    autocompleteOptions: {
        key: 'h7cAdo65F2uuetiST0o1pnUygRaWDuuX',
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
    let key = 'h7cAdo65F2uuetiST0o1pnUygRaWDuuX';


    let searchBoxHTML = ttSearchBox.getSearchBoxHTML();
    const searchBox = document.getElementById('searchBox');
    searchBox.appendChild(searchBoxHTML);

    // ttSearchBox.on('tomtom.searchbox.resultsfound', function(event) {
    //     console.log(event);
    // })

    ttSearchBox.on('tomtom.searchbox.resultselected', function(data) {
       console.log(data.data.result.position.lat);
        console.log(data.data.result.position.lng);
        console.log(data.data.result.address.freeformAddress)
        let address = document.getElementById('address');

       let latitude = document.getElementById('lat');
        let longitude = document.getElementById('long');
        address.value = data.data.result.address.freeformAddress;

       latitude.value = data.data.result.position.lat;

       longitude.value = data.data.result.position.lng;
        console.log(address)

        // let variabileindirizzo = document.getElementsByClassName("tt-search-box-input").value;
        // console.log(variabileindirizzo)
        // let selected = event.data.result.value
        // console.log(selected)
        // delete axios.defaults.headers.common['X-Requested-With'];
        // axios.get(`https://api.tomtom.com/search/2/geocode/${selected}.json?storeResult=false&view=Unified&key=h7cAdo65F2uuetiST0o1pnUygRaWDuuX`).then((res) => {
        //     console.log(res.data.results)

        //     return res.data
        // })



    })
}
