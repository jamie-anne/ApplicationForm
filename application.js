const cities = {
    "Nueva Ecija": ["Cabanatuan", "Gapan", "Palayan", "Science City of Muñoz", "San Jose"]
};

const barangays = {
    "Cabanatuan": ["Barangay A", "Barangay B", "Barangay C"],
    "Gapan": ["Barangay 1", "Barangay 2"],
    "Palayan": ["Barangay X", "Barangay Y"],
    "Science City of Muñoz": ["Brgy Alpha", "Brgy Beta"],
    "San Jose": ["Brgy Uno", "Brgy Dos"]
};

document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("province").addEventListener("change", function() {
        const cityDropdown = document.getElementById("city");
        const selectedProvince = this.value;

        cityDropdown.innerHTML = "<option value='' disabled selected>Please select</option>";

        if (cities[selectedProvince]) {
            cities[selectedProvince].forEach(city => {
                cityDropdown.innerHTML += `<option value="${city}">${city}</option>`;
            });
        }
    });

    document.getElementById("city").addEventListener("change", function() {
        const brgyDropdown = document.getElementById("barangay");
        const selectedCity = this.value;

        brgyDropdown.innerHTML = "<option value='' disabled selected>Please select</option>";

        if (barangays[selectedCity]) {
            barangays[selectedCity].forEach(brgy => {
                brgyDropdown.innerHTML += `<option value="${brgy}">${brgy}</option>`;
            });
        }
    });

});
