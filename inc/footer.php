 <!-- footer -->
 <div class="container-fluid bg-white mt-5">
     <div class="row">
         <div class="col-lg-4 p-4">
             <h3 class="fw-bold fs-3 h-font">TJ HOTEL</h3>
             <p>
                 Lorem ipsum dolor sit amet consectetur adipisicing elit.
                 Commodi a ullam repellendus, magnam impedit rem, animi distinctio molestiae
                 non, debitis velit in sed vero labore neque? Sint veniam nobis dolores!
             </p>
         </div>
         <div class="col-lg-4 p-4">
             <h5 class="mb-3">Links</h5>
             <a href="../index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
             <a href="../facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
             <a href="../rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
             <a href="../about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About Us</a><br>
             <a href="../contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact Us</a>




         </div>
         <div class="col-lg-4 p-4">
             <h5 class="mb-3">Follow Us</h5>
             <a href="<?php echo $contact_r['tw']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark ">

                 <i class="bi bi-twitter me-1"></i> Twitter

             </a><br>
             <a href="<?php echo $contact_r['fb']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark ">

                 <i class="bi bi-facebook me-1"></i> Facebook

             </a><br>
             <a href="<?php echo $contact_r['insta']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark ">

                 <i class="bi bi-instagram me-1"></i> Instagram

             </a>
         </div>
     </div>
 </div>
 <br><br><br>

 <div class="bg-dark text-center text-white p-3 m-0">Designed and Developed By Qudsiya Siddique</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
     crossorigin="anonymous"></script>

 <?php



    ?>
 <script>
     function setActive() {
         let navbar = document.getElementById('nav-bar')
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


     function alert(type, msg, position = 'body') {
         let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
         let element = document.createElement('div')
         element.innerHTML = `
            <div class="alert ${bs_class} alert-dismissible fade show custom-alert" role="alert" >
            <strong class="me-3">${msg}</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        `;

         if (position == 'body') {
             document.body.append(element)
             element.classList.add('custome-alert')

         } else {
             document.getElementById(position).appendChild(element)
         }
         setTimeout(remAlert, 3000)
     }

     function remAlert() {
         document.getElementById('alert')[0].remove();
     }





     let register_form = document.getElementById('register-form')
     register_form.addEventListener('submit', (e) => {
         e.preventDefault()
         let data = new FormData

         data.append('name', register_form.elements['name'].value)
         data.append('email', register_form.elements['email'].value)
         data.append('phonenum', register_form.elements['phonenum'].value)
         data.append('address', register_form.elements['address'].value)
         data.append('pincode', register_form.elements['pincode'].value)
         data.append('dob', register_form.elements['dob'].value)
         data.append('pass', register_form.elements['pass'].value)
         data.append('cpass', register_form.elements['cpass'].value)
         data.append('profile', register_form.elements['profile'].files[0])

         data.append('register', '')
         var myModal = document.getElementById('registerModal');
         var modal = bootstrap.Modal.getInstance(myModal);
         modal.hide();

         let xhr = new XMLHttpRequest();
         xhr.open('POST', 'ajax/login_register.php', true);

         xhr.onload = function() {
             if (this.responseText === 'pass_mismatched') {
                 alert('error', "Password mismatch")
             } else if (this.responseText === 'email_already') {
                 alert('error', "Email already exists")
             } else if (this.responseText === 'phone_already') {
                 alert('error', "Phone number already exists")
             } else if (this.responseText === 'inv_image') {
                 alert('error', "Only jpeg, jpg, webp images allowed")
             } else if (this.responseText === 'upd_failed') {
                 alert('error', "Failed to upload image")
             } else if (this.responseText === 'mail_failed') {
                 alert('error', "Failed to send mail")
             } else if (this.responseText === 'ins_failed') {
                 alert('error', "Failed to insert data")
             } else {
                 alert('success', "Registration successful!!")
                 register_form.reset();
             }
         }
         xhr.send(data);

     })


     let login_form = document.getElementById('login-form');

     login_form.addEventListener('submit', (e) => {
         e.preventDefault();

         let data = new FormData();

         data.append('email_mob', login_form.elements['email_mob'].value);
         data.append('pass', login_form.elements['pass'].value);
         data.append('login', '');

         var myModal = document.getElementById('loginModal');
         var modal = bootstrap.Modal.getInstance(myModal);
         modal.hide();

         let xhr = new XMLHttpRequest();
         xhr.open('POST', 'ajax/login_register.php', true);

         xhr.onload = function() {
             if (this.responseText === 'inv_email_mob') {
                 alert('error', "Invalid Email or Phone Number");
             } else if (this.responseText === 'inactive') {
                 alert('error', "Account has been suspended by admin");
             } else if (this.responseText === 'invalid password') {
                 alert('error', "Incorrect Password");
             } else {
                
                 window.location = window.location.pathname;
             }
         };

         xhr.send(data);
     });
 </script>