<?= $this->extend("layouts/master") ?>
<?= $this->section("body-content"); ?>

<section aria-label="section" class="jarallax">
    <img src="<?= base_url() ?>public/assets/images/background/4.jpg" class="jarallax-img" alt="">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 offset-md-7 wow fadeInRight" data-wow-delay=".5s">
                <div class="spacer-double"></div>
                <div class="spacer-double"></div>
                <h3 class="id-color wow fadeInUp" data-wow-delay=".4s">Need Any Help?</h3>
                <h1 class="wow fadeInUp" data-wow-delay=".6s">We Fight for Right</h1>
                <p class="lead wow fadeInUp" data-wow-delay=".8s">Our attorneys are committed to providing unparalleled legal representation and personalized service to our clients.</p>
                <div class="spacer-20"></div>
                <a class="btn-custom wow fadeInUp" data-wow-delay="1s" href="contact.html">Contact Us</a>
                <div class="spacer-double"></div>
            </div>
        </div>
    </div>
</section>
<section class="pt40 pb40 bg-color text-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 mb-sm-30 text-lg-start text-sm-center">
                <h3 class="no-bottom">Contact Us Now! Get a Free Consultation for Your Case.</h3>
            </div>
            <div class="col-md-4 text-lg-end rtl-lg-start text-sm-center">
                <a href="#" class="btn-custom btn-black light">Make Appointment</a>
            </div>
        </div>
    </div>
</section>

<?= view('layouts/about') ?>
<?= view('layouts/experience') ?>
<?= view('layouts/practice-area') ?>
<?= view('layouts/what-we-do') ?>
<?= view('layouts/team-member') ?>
<?= view('layouts/testimonial') ?>
<?= view('layouts/blogs') ?>

<?= $this->endSection() ?>