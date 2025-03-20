let general_data, contacts_data;
let general_s_form = document.getElementById('general-s-form');

let site_title_inp = document.getElementById('site_title_inp')
let site_about_inp = document.getElementById('site_about_inp')

let contact_s_form = document.getElementById('contact-s-form');

let team_s_form = document.getElementById('team-s-form');
let member_name_inp = document.getElementById('member_name_inp')
let member_picture_inp = document.getElementById('member_picture_inp')


general_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    upd_general(site_title_inp.value, site_about_inp.value);
})

function get_general() {
    let site_title = document.getElementById('site_title')
    let site_about = document.getElementById('site_about')


    let shutdown_toggle = document.getElementById('shutdown-toggle')

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/settings_crud.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        general_data = JSON.parse(this.responseText);
        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        site_title_inp.value = general_data.site_title
        site_about_inp.value = general_data.site_about

        if (general_data.shutdown == 0) {
            shutdown_toggle.checked = false
            shutdown_toggle.value = 0
        } else {
            shutdown_toggle.checked = true
            shutdown_toggle.value = 1
        }
    }
    xhr.send('get_general');
}

function upd_general(site_title_val, site_about_val) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/settings_crud.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        var myModal = document.getElementById('general-s')
        var modal = bootstrap.Modal.getInstance(myModal)
        modal.hide(); // Returns a Bootstrap modal instance

        if (this.responseText == 1) {
            alert('success', 'Changes Saved!!');
            get_general();
        } else {
            alert('danger', 'Changes Not Made');
        }
    }
    xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&upd_general');
}

function upd_shutdown(val) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/settings_crud.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {

        if (this.responseText == "1" && general_data.shutdown == 0) { // Ensure proper comparison
            alert('success', 'Site has been shut down!');
        } else {
            alert('success', 'Shutdown Mode Off!');
        }
        get_general();
    }

    xhr.send('upd_shutdown=' + val);
}

function get_contacts() {
    let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'tw', 'fb', 'insta'];
    let iframe = document.getElementById('iframe')

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/settings_crud.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        contacts_data = JSON.parse(this.responseText);
        contacts_data = Object.values(contacts_data);

        for (i = 0; i < contacts_p_id.length; i++) {
            document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
        }
        iframe.src = contacts_data[9];
        contacts_inp(contacts_data);
    }

    xhr.send('get_contacts');


}

function contacts_inp(data) {
    let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'tw_inp', 'fb_inp', 'insta_inp'];
    for (i = 0; i < contacts_inp_id.length; i++) {
        document.getElementById(contacts_inp_id[i]).value = data[i + 1];
    }
    let iframeInput = document.getElementById('iframe_inp');
    if (iframeInput) {
        iframeInput.value = data[9]; // Assuming iFrame is the last value in contacts_data
    }
}
contact_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    upd_contact();
})

function upd_contact() {
    let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'tw', 'fb', 'insta', 'iframe'];
    let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'tw_inp', 'fb_inp', 'insta_inp', 'iframe_inp'];
    let data_str = "";
    for (i = 0; i < index.length; i++) {
        data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + '&';
    }
    data_str += 'upd_contact';
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/settings_crud.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        var myModal = document.getElementById('contact-s')
        var modal = bootstrap.Modal.getInstance(myModal)
        modal.hide();
        if (this.responseText == "1") { // Ensure proper comparison
            alert('success', 'Changes has been made!!');
            get_contacts();
        } else {
            alert('error', 'No Changes made');
        }

    }

    xhr.send(data_str);
}

team_s_form.addEventListener('submit', function(e) {
    e.preventDefault();
    add_member();
})

function add_member() {
    let data = new FormData();
    data.append('name', member_name_inp.value);
    data.append('picture', member_picture_inp.files[0]);
    data.append('add_member', '');

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/settings_crud.php', true);

    xhr.onload = function() {
        var myModal = document.getElementById('team-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide(); // Hide the modal

        if (this.responseText == 'inv_img') {
            alert('error', 'Only jpg and png images are allowed!!');
        } else if (this.responseText == 'inv_size') {
            alert('error', 'Image size should be less than 2MB!!');
        } else if (this.responseText == 'upd_failed') {
            alert('error', 'Image upload Failed. Server Down!!');
        } else {
            alert('success', 'Member Added!!');
            member_name_inp.value = '';
            member_picture_inp.value = '';
            get_member();
        }
    };

    // Send the data (Move this outside of xhr.onload)
    xhr.send(data);
}

function get_member() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/settings_crud.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById('team-data').innerHTML = this.responseText;
    }
    xhr.send('get_member');
}

function rem_member(val) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/settings_crud.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        xhr.onload = function() {
            console.log("Response from server:", this.responseText); // Debugging

            if (this.responseText == 1) {
                alert('success', 'Member Removed!!');
                 get_member();
            } else {
                alert('error', this.responseText); // Show actual error message
            }
        };
    }
    xhr.send('rem_member=' + val);
}


window.onload = function() {
    get_general();
    get_contacts();
    get_member();
}