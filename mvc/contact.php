<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style type="text/css">
.overlay {
    background-image: linear-gradient(to right, rgba(90, 100, 232, 0.9), rgba(84, 96, 234, 0.9));
    width: 100%;
    height: 100%;
    z-index: 1;
    position: relative;
    padding: 110px 0;
}
.section-bg {
    background-size: cover;
    position: relative;
    background-position: left;
    z-index: 0;
    padding: 0;
    min-height: auto;
    overflow: hidden;
}
.contact-form {
    position: relative;
    padding: 45px 0 45px 60px;
}

.contact-form:before {
    position: absolute;
    content: '';
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    border-radius: 6px;
    background: #ffffff;
    box-shadow: 10px 40px 40px rgba(0,0,0,.2);
    pointer-events: none;
    right: auto;
    width: 100vw;
}
.particles-js-canvas-el {
    position: absolute;
    left: 0;
    top: 0;
    z-index: 1;
}
.contact-form input {
    border: 0;
    background: transparent;

    display: block;
    width: 100%;
    min-height: 50px;
    padding: 11px 0;
    font-size: 16px;
    font-weight: 600;
    line-height: 27px;

    background-color: transparent;
    background-image: none;
    border-radius: 0;
    -webkit-appearance: none;
    transition: .3s ease-in-out;
    border: 2px solid transparent;
    border-bottom-color: rgba(0,0,0,.1);
}

.contact-form textarea {
    border: 0;
    background: transparent;
    display: block;
    width: 100%;
    min-height: 50px;
    padding: 11px 0;
    font-size: 16px;
    font-weight: 600;
    line-height: 27px;

    background-color: transparent;
    background-image: none;
    border-radius: 0;
    -webkit-appearance: none;
    transition: .3s ease-in-out;
    border: 2px solid transparent;
    border-bottom-color: rgba(0,0,0,.1);
}
.contact-form input::placeholder {
  color:#222;
}
.contact-form textarea::placeholder {
  color:#222;

}
.contact-form input {
    margin-bottom: 30px;
    font-size: 16px;
    font-weight: 600;
    height: 55px;
}
.contact-form input:hover, .contact-form input:focus{
    outline: none;
    box-shadow: none;
    background: transparent;
    border: 2px solid transparent;
    border-bottom-color: rgb(254, 132, 111);

}
.contact-form textarea:hover, .contact-form textarea:focus{
  background: transparent; 
    outline: none;
  box-shadow: none;
     border: 2px solid transparent;
    border-bottom-color: rgb(254, 132, 111);

}


.taso-btn {
    background-color: #fff;
    margin: 25px 0;
    color: #214dcb;
    -webkit-box-shadow: 0px 10px 30px 0px rgba(255, 255, 255, 0.32);
    box-shadow: 0px 10px 30px 0px rgba(255, 255, 255, 0.17);
}
.contact-info {
    padding: 0 30px 0px 0;
}

h2.contact-title {
    font-size: 35px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 30px;
}

.contact-info p {
    color: #ececec;
}

ul.contact-info {
    margin-top: 30px;
}

ul.contact-info li {
    margin-bottom: 22px;
}



ul.contact-info span {
    font-size: 20px;
    line-height: 26px;
}
ul.contact-info li {
    display: flex;
    width: 100%;
}

.info-left {
    width: 10%;
}

.info-left i {
    width: 30px;
    height: 30px;
    line-height: 30px;
    font-size: 30px;
    color: #ffffff;
}

.info-right h4 {
    color: #fff;
    font-size: 18px;
}
.contact-page .info-left i{
color: #FE846F;
}
.btn {
display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    font-family: 'Poppins', sans-serif;
    padding: 10px 30px 10px;
    font-size: 17px;
    line-height: 28px;
    border: 0px;
    border-radius: 10px;
    -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    -o-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}
.btn-big {
    color: #ffffff;
    -webkit-box-shadow: 0px 5px 20px 0px rgba(45, 45, 45, 0.47843137254901963);
    box-shadow: 2px 5px 10px 0px rgba(45, 45, 45, 0.19);
    color: #fff !important;
    margin-right: 20px;
    background: #FE846F;
    transition: .2s;
    border: 2px solid #FE846F;
    margin-top: 50px;
}

}
</style>

<?php
    $q = mysqli_query($con, "SELECT * FROM doctor_user WHERE status = 1");
    $r = mysqli_fetch_assoc($q);
    $user_id            = $r["user_id"];
    $user_photo         = $r["user_photo"];
    $user_mobile        = $r["user_mobile"];
    $user_mail          = $r["user_mail"];
    $user_hospital      = $r["user_hospital"];
?>

<section class="section-bg" style="background-image: url(https://i.ibb.co/9p3Cnk9/slider-2.jpg);"  data-scroll-index="7">
  <div class="overlay pt-100 pb-100 ">
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex align-items-center">
          <div class="contact-info">
            <h2 class="contact-title">Have Any Questions?</h2>
            <p style="text-align: justify;">
                As a hematologist specializing in blood medicine, thalassemia, and blood cancer, I am deeply committed to providing comprehensive care to my patients. My name is <b>Dr. Maruf Al Hasan</b>, and I have dedicated my career to advancing the field of hematology and improving the lives of those affected by blood disorders.
            </p>
            <ul class="contact-info">
              <li>
                <div class="info-left">
                  <i class="fas fa-mobile-alt"></i>
                </div>
                <div class="info-right">
                  <h4>+88 <?php echo $user_mobile; ?></h4>
                </div>
              </li>
              <li>
                <div class="info-left">
                  <i class="fas fa-at"></i>
                </div>
                <div class="info-right">
                  <h4><?php echo $user_mail; ?></h4>
                </div>
              </li>
              <li>
                <div class="info-left">
                  <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="info-right">
                  <h4>Rajshahi Medical College Hospital</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>