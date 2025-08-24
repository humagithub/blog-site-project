@extends('Front.master')
@section('content')
<main class="main">

<!-- Page Title -->
<div class="page-title">
  <div class="breadcrumbs">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Category</a></li>
        <li class="breadcrumb-item active current">Contact</li>
      </ol>
    </nav>
  </div>

  <div class="title-wrapper">
    <h1>Contact</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
  </div>
</div><!-- End Page Title -->

<!-- Contact Section -->
<section id="contact" class="contact section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4 mb-5">
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="info-card">
          <div class="icon-box">
            <i class="bi bi-geo-alt"></i>
          </div>
          <h3>Our Address</h3>
          <p>2847 Rainbow Road, Springfield, IL 62701, USA</p>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="info-card">
          <div class="icon-box">
            <i class="bi bi-telephone"></i>
          </div>
          <h3>Contact Number</h3>
          <p>Mobile: +1 (555) 123-4567<br>
            Email: info@example.com</p>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="info-card">
          <div class="icon-box">
            <i class="bi bi-clock"></i>
          </div>
          <h3>Opening Hour</h3>
          <p>Monday - Saturday: 9:00 - 18:00<br>
            Sunday: Closed</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="form-wrapper" data-aos="fade-up" data-aos-delay="400">
        <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
        @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-person"></i></span>
                  <input type="text" name="name" class="form-control" placeholder="Your name*" required="">
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                  <input type="email" class="form-control" name="email" placeholder="Email address*" required="">
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-6 form-group">
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-phone"></i></span>
                  <input type="text" class="form-control" name="phone" placeholder="Phone number*" required="">
                </div>
              </div>
              <div class="col-md-6 form-group">
               
              </div>
              <div class="form-group mt-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-chat-dots"></i></span>
                  <textarea class="form-control" name="message" rows="6" placeholder="Write a message*" required=""></textarea>
                </div>
              </div>
              <div class="my-3">
                
                <div class="error-message"></div>
                
              </div>
              <div class="text-center">
                <button type="submit">Submit Message</button>
              </div>

            </div>
          </form>
        </div>
      </div>

    </div>

  </div>
</section><!-- /Contact Section -->

</main>

        @endsection