let feature_s_form = document.getElementById('feature-s-form');
let facility_s_form = document.getElementById('facility-s-form');

feature_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    add_feature();
});

function add_feature() {
    let data = new FormData(feature_s_form); // Collect form data
    data.append('add_feature', '');
    data.append('name', feature_s_form.elements['name'].value) // Add hidden input manually if needed

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/features_facilities.php', true);

    xhr.onload = function() {
        var myModal = document.getElementById('feature-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide(); // Hide the modal

        if (this.responseText == 1) {
            alert('success', 'New Feature added');
            get_features();
            feature_s_form.reset(); // Clear form fields
        } else {
            alert('danger', 'Server Down.');
        }
    };

    xhr.send(data); // Send data
}

function get_features() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/features_facilities.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('features-data').innerHTML = this.responseText;
    }
    xhr.send('get_features');

}

function rem_feature(val) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/features_facilities.php', true); // Fix the typo in file name
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        console.log("Response from server:", this.responseText); // Debugging

        if (this.responseText.trim() == "1") { // Ensure a valid response
            alert('success', 'Feature Removed!!'); // Fix alert
            get_features(); // Refresh feature list
        } else if (this.responseText == 'room_added') {
            alert('danger', "feature is added in room")
        } else {
            alert('success', 'Feature Removed');
            get_features();
            // Show actual error message
        }
    };

    xhr.send('rem_feature=' + val);
}


facility_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    add_facility();
});


function add_facility() {
    let data = new FormData(facility_s_form); // Collect form data

    data.append('name', facility_s_form.elements['facility_name'].value)
    data.append('icon', facility_s_form.elements['facility_icon'].files[0])
    data.append('desc', facility_s_form.elements['facility_desc'].value)
    data.append('add_facility', '');
    // Add hidden input manually if needed
    // Add hidden input manually if needed
    // Add hidden input manually if needed

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/features_facilities.php', true);

    xhr.onload = function() {
        var myModal = document.getElementById('facility-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide(); // Hide the modal

        if (this.responseText == 'inv_img') {
            alert('error', 'Only svg images are allowed!!');
        } else if (this.responseText == 'inv_size') {
            alert('error', 'Image size should be less than 2MB!!');
        } else if (this.responseText == 'upd_failed') {
            alert('error', 'Image upload Failed. Server Down!!');
        } else {
            alert('success', 'Facility Added!!');
            get_facility();
            facility_s_form.reset();
            
        }
    };

    xhr.send(data); // Send data
}

function get_facility() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/features_facilities.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('facilities-data').innerHTML = this.responseText;
    }
    xhr.send('get_facility');

}

function rem_facility(val) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/features_facilities.php', true); // Fix the typo in file name
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        console.log("Response from server:", this.responseText); // Debugging

        if (this.responseText.trim() == "1") { // Ensure a valid response
            alert('success', 'Feature Removed!!'); // Fix alert
            get_facility(); // Refresh feature list
        } else if (this.responseText == 'room_added') {
            alert('danger', "feature is added in room")
        } else {
            alert('success', 'Feature Removed');
            get_facility();
            // Show actual error message
        }
    };

    xhr.send('rem_facility=' + val);
}


window.onload = function() {
    get_features();
    get_facility();
}