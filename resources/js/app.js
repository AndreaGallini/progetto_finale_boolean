import "regenerator-runtime/runtime";
import "./bootstrap";

import "core-js/stable";
import "babel-polyfill";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import axios from "axios";
import { forEach } from "lodash";
import.meta.glob(["../img/**"]);

const options = {
    idleTimePress: 100,
    minNumberOfCharacters: 0,
    searchOptions: {
        key: "h7cAdo65F2uuetiST0o1pnUygRaWDuuX",
        language: "it-IT",
        limit: 5,
    },
    autocompleteOptions: {
        key: "h7cAdo65F2uuetiST0o1pnUygRaWDuuX",
        language: "it-IT",
    },
    noResultsMessage: "No results found.",
};

//delete modal
const deleteSubmitButtons = document.querySelectorAll(".delete-button");
deleteSubmitButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();

        const dataTitle = button.getAttribute("data-item-title");

        const modal = document.getElementById("deleteModal");

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalItemTitle = modal.querySelector("#modal-item-title");
        modalItemTitle.textContent = dataTitle;

        const buttonDelete = modal.querySelector("button.btn-primary");

        buttonDelete.addEventListener("click", () => {
            button.parentElement.submit();
        });
    });
});

//Image preview
const previewImage = document.getElementById("create_cover_img");
if (previewImage != null) {
    previewImage.addEventListener("change", (event) => {
        var oFReader = new FileReader();
        // var image  =  previewImage.files[0];
        // console.log(image);
        oFReader.readAsDataURL(previewImage.files[0]);

        oFReader.onload = function (oFREvent) {
            //console.log(oFREvent);
            document.getElementById("uploadPreview").src =
                oFREvent.target.result;
        };
    });
}

if (document.getElementById("searchBox")) {
    let ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
    let key = "h7cAdo65F2uuetiST0o1pnUygRaWDuuX";

    let searchBoxHTML = ttSearchBox.getSearchBoxHTML();
    const searchBox = document.getElementById("searchBox");
    searchBox.appendChild(searchBoxHTML);

    // ttSearchBox.on('tomtom.searchbox.resultsfound', function(event) {
    //     console.log(event);
    // })

    ttSearchBox.on("tomtom.searchbox.resultselected", function (data) {
        console.log(data.data.result.position.lat);
        console.log(data.data.result.position.lng);
        console.log(data.data.result.address.freeformAddress);
        let address = document.getElementById("address");

        let latitude = document.getElementById("lat");
        let longitude = document.getElementById("long");
        address.value = data.data.result.address.freeformAddress;

        latitude.value = data.data.result.position.lat;

        longitude.value = data.data.result.position.lng;
        console.log(address);

        // let variabileindirizzo = document.getElementsByClassName("tt-search-box-input").value;
        // console.log(variabileindirizzo)
        // let selected = event.data.result.value
        // console.log(selected)
        // delete axios.defaults.headers.common['X-Requested-With'];
        // axios.get(`https://api.tomtom.com/search/2/geocode/${selected}.json?storeResult=false&view=Unified&key=h7cAdo65F2uuetiST0o1pnUygRaWDuuX`).then((res) => {
        //     console.log(res.data.results)

        //     return res.data
        // })
    });
}

if (document.getElementById("navFixed")) {
    const navTogglerHTML = document.getElementById("navToggler");
    const navItemsHTML = document.getElementById("navItems");
    navTogglerHTML.addEventListener("click", () => {
        navItemsHTML.classList.toggle("d-none");
        if (navItemsHTML.classList.contains("d-none")) {
            navTogglerHTML.innerHTML = `<i class="fa-solid fa-bars"></i>`;
        } else if (!navItemsHTML.classList.contains("d-none")) {
            navTogglerHTML.innerHTML = `<i class="fa-solid fa-xmark"></i>`;
        }
    });
}

if(document.getElementById('selApartments')){
    const selectAppHTML = document.getElementById('selApartments');

    const previewAppHTML = document.getElementById('previewApp');


    const hidWeekHTML =  document.getElementById('hidWeek');
    const hidMonthHTML =  document.getElementById('hidMonth');
    const hidYearHTML =  document.getElementById('hidYear');

    const selPicHTML = document.getElementById('selPic');
    const selTitleHTML = document.getElementById('selTitle');
    const selAddressHTML = document.getElementById('selAddress');
    const selIconHTML = document.getElementById('selIcon');
    const selCategoryHTML = document.getElementById('selCategory');
    const selSponsorHTML = document.getElementById('selSponsor');


    const subBtnWeekHTML = document.getElementById('subBtnWeek');
    const subBtnMonthHTML = document.getElementById('subBtnMonth');
    const subBtnYearHTML = document.getElementById('subBtnYear');

    const apiSingleBaseUrl = 'http://localhost:8000/api/apartments/';
    const imgBaseUrl = 'http://localhost:8000/storage/'

    let activeApartment = null;


    selectAppHTML.addEventListener('change', ()=>{
        if(selectAppHTML.value == ''){
            previewAppHTML.classList.add('d-none');
            subBtnWeekHTML.classList.add('d-none');
            subBtnMonthHTML.classList.add('d-none');
            subBtnYearHTML.classList.add('d-none');
            return console.log('reset');
        }

        axios.get(`${apiSingleBaseUrl}${selectAppHTML.value}`).then((response)=>{
            activeApartment = response.data.results;

            selPicHTML.src = `${imgBaseUrl}${activeApartment.cover_img}`;
            selTitleHTML.innerHTML = `${activeApartment.title}`;
            selAddressHTML.innerHTML = `${activeApartment.address}`;
            selIconHTML.innerHTML = `${activeApartment.category.img}`;
            selCategoryHTML.innerHTML = `${activeApartment.category.name}`;

            console.log(activeApartment);

            if(activeApartment.sponsors.length > 0){
                selSponsorHTML.innerHTML = '';
                activeApartment.sponsors.forEach((sponsor)=>{
                    selSponsorHTML.innerHTML += `<div class="col-6 mb-2"><span class="${sponsor.name}"></span><span>${sponsor.name}</span></div>`
                })
            }else{
                selSponsorHTML.innerHTML = `<i>L'appartamento non ha sponsorizzazioni attive.</i>`
            }

            if(subBtnWeekHTML.classList.contains('d-none')){
                subBtnWeekHTML.classList.toggle('d-none');
                subBtnMonthHTML.classList.toggle('d-none');
                subBtnYearHTML.classList.toggle('d-none');
            }

            if(previewAppHTML.classList.contains('d-none')){
                previewAppHTML.classList.toggle('d-none');
            }

            hidWeekHTML.value = activeApartment.id;
            hidMonthHTML.value = activeApartment.id;
            hidYearHTML.value = activeApartment.id;
        })
    })
}

// if(document.getElementById('payBtn')){
//     const payBtnHTML = document.getElementById('payBtn');

//     payBtnHTML.addEventListener('click', ()=>{
//         payBtnHTML.value = 'attendi'
//     })
// }

if(document.getElementById('saveSponsorForm')){
    const formSponsorHTML = document.getElementById('saveSponsorForm');
    const spinnerHTML = document.getElementById('spinner');
    const successHTML = document.getElementById('success');
    const approvedHTML = document.getElementById('toBeApproved');
    const boxHTML = document.getElementById('boxLoad');


    setTimeout(()=>{
        spinnerHTML.classList.toggle('d-none');
        successHTML.classList.toggle('d-none');
        approvedHTML.innerHTML = `<h4>Transazione avvenuta con successo!</h4>
                                    <p>attendi mentre vieni reindirizzato...</p>`
        boxHTML.style.border = '5px solid green';
        boxHTML.style.color = 'green';
    }, 3500)

    setTimeout(()=>{
        formSponsorHTML.click();
    }, 5000)
}
