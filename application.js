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

/*

document.getElementById("button").addEventListener("click", () => {

    const firstname = document.getElementById("firstname").value;
    const middlename = document.getElementById("middlename").value;
    const lastname = document.getElementById("lastname").value;
    const address = document.getElementById("address").value;

  
    const areaVolunteer = document.querySelector('select[name="area_volunteer_db"]').value;
    const activityVolunteer = document.querySelector('select[name="activities_volunteer_db"]').value;

   
    const days = Array.from(document.querySelectorAll('input[name="days_db"]:checked'))
                      .map(cb => cb.value);


    const fromTime = document.getElementById("from-hour").value + " " + document.getElementById("from-ampm").value;
    const toTime = document.getElementById("to-hour").value + " " + document.getElementById("to-ampm").value;
    const timeRange = fromTime + " to " + toTime;


    localStorage.setItem("volunteerFirstName", firstname);
    localStorage.setItem("volunteerMiddleName", middlename);
    localStorage.setItem("volunteerLastName", lastname);
    localStorage.setItem("volunteerAddress", address);
    localStorage.setItem("volunteerArea", areaVolunteer);
    localStorage.setItem("volunteerActivity", activityVolunteer);
    localStorage.setItem("volunteerDays", JSON.stringify(days));
    localStorage.setItem("volunteerTime", timeRange);

    window.location.href = "application2.html";
});

*/