<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script>
    function alert(type, msg) {
        let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';

        // Create the alert element
        let element = document.createElement('div');
        element.id = 'custom-alert'; // Assign an ID
        element.innerHTML = `
        <div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert">
            <strong class="me-3">${msg}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;

        document.body.appendChild(element);

        // Remove alert after 1 second
        setTimeout(() => {
            if (element) {
                element.remove(); // Properly remove the element
            }
        }, 1000);
    }

    function remAlert() {
        document.getElementById('alert')[0].remove();
    }

    function setActive() {
        let navbar = document.getElementById('dashboard-menu')
        let a_tags = document.getElementsByTagName('a')

        for (let i = 0; i < a_tags.length; i++) {
            let file = a_tags[i].href.split('/').pop()
            let file_name = file.split('.')[0];

            if (document.location.href.indexOf(file_name) >= 0) {
                a_tags[i].classList.add('active')
            }
        }
    }
    setActive()
</script>