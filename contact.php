<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <?php require('inc/links.php');  ?>


    <title>Tj Website-Contact</title>

</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-2">
        <h2 class="fw-bold h-font text-center">Contact Us</h2>

        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. In mollitia eaque quo iusto <br>
            aliquid laborum quibusdam blanditiis qui optio minus!
        </p>
    </div>

   


    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white shadow rounded p-4">
                    <iframe class="w-100 rounded mb-4"
                        src="<?php echo $contact_r['iframe'] ?>"
                        height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <h5>Address</h5>
                    <a href="<?php echo $contact_r['gmap'] ?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
                        <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['address'] ?>
                    </a>
                    <h5 class="mt-4">Call Us</h5>
                    <a href="+<?php echo $contact_r['pn1'] ?>" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>
                    </a>
                    <br>
                    <?php
                       if ($contact_r['pn2'] != '') {
                        $pn2 = $contact_r['pn2']; // Store value in variable
                        echo <<<DATA
                            <a href="tel:+$pn2" class="d-inline-block text-decoration-none text-dark">
                                <i class="bi bi-telephone-fill"></i> +$pn2
                            </a>
                        DATA;
                    }
                    
                    ?>
                   
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: <?php echo $contact_r['email'] ?>" class="d-inline-block text-decoration-none text-dark ">
                        <i class="bi bi-envelope-at-fill"></i> <?php echo $contact_r['email'] ?>
                    </a>
                    <h5 class="mt-4">Follow Us</h5>
                    <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block mb-3 text-dark fs-5 me-2">

                        <i class="bi bi-twitter me-1"></i>

                    </a>

                    <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block mb-3 text-dark fs-5 me-2">

                        <i class="bi bi-facebook me-1"></i>

                    </a>
                    
                    <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block mb-3 text-dark fs-5 me-2">

                        <i class="bi bi-instagram me-1"></i>

                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6  px-4">
                <div class="bg-white shadow rounded p-4">
                   <form action="" method="POST">
                    <h5>Send A Message</h5>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Name</label>
                        <input type="text" name="name" required class="form-control shadow-none">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Email</label>
                        <input type="Email" name="email" required class="form-control shadow-none">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Subject</label>
                        <input type="text" name="subject" required class="form-control shadow-none">
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Message</label>
                        <textarea class="form-control" name="message" required id="exampleFormControlTextarea1" rows="5" style="resize: none;"></textarea>
                    </div>
                    <button class="btn text-white custom-bg mt-3 align-items-center" type="submit" name="send">SEND</button>
                   </form>
                </div>
            </div>

        </div>
    </div>

    <?php
     if(isset($_POST['send'])) 
     {
        $frm_data = filteration($_POST);
        $q = "INSERT INTO `user_query`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
        $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];
        $res = insert($q, $values, "ssss"); 
        if($res==1) {
            alert('success', 'Mail Send');
        } else {
            alert('error', 'Mail Not Send Server Down');
        }

     }
    ?>


    <?php require('inc/footer.php'); ?>


</body>

</html>