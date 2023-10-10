@extends('frontend.basic.layout.frontend')
@section('content')

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bx bx-group"></i></div>
                <h4 class="title"><a href="">Community Maintenance</a></h4>
                <p class="description">We take pride in maintaining our neighborhood's appearance and functionality. From landscaping to common area upkeep, our dedicated team ensures that our community always looks its best.</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4 class="title"><a href="">Security and Safety</a></h4>
                <p class="description">Your safety is our top priority. We work closely with local law enforcement and implement security measures to keep our neighborhood secure.</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4 class="title"><a href="">Events and Activities</a></h4>
                <p class="description">We organize various events and activities throughout the year to foster a sense of belonging and fun. From community picnics to holiday celebrations, there's always something happening in our neighborhood.</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="">Communication Hub</a></h4>
                <p class="description">Stay informed and connected through our website, newsletters, and social media channels. Our website serves as a valuable resource for important updates, news, and community announcements.</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Featured Services Section -->
  
      <!-- ======= About Section ======= -->
      <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>About</h2>
            <h3>Find Out More <span>About Us</span></h3>
            <p>At {{settings('website_name')}}, we're more than just an organization; we're a community of neighbors, working together to create a thriving and welcoming place to call home.</p>
          </div>
  
          <div class="row">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <img src="{{asset('frontend/img/about.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
              <h3>Our Mission</h3>
              <p class="fst-italic">
                Our mission is simple yet profound: to foster a sense of unity, security, and well-being within our community. We strive to provide a safe, vibrant, and harmonious neighborhood where every individual feels valued, heard, and connected. 
              </p>
              <ul>
                <li>
                  <i class="bx bx-store-alt"></i>
                  <div>
                    <h5>Inclusivity</h5>
                    <p>We embrace diversity and inclusivity, striving to create a welcoming environment where every resident feels valued and heard.</p>
                  </div>
                </li>
                <li>
                  <i class="bx bx-images"></i>
                  <div>
                    <h5>Progress</h5>
                    <p>We are dedicated to progress and improvement, constantly seeking innovative ways to enhance our community's quality of life.</p>
                  </div>
                </li>
              </ul>
              <p>
                Join us in our mission to create a vibrant and inclusive community. There are numerous ways to get involved, whether by joining a committee, volunteering your time and skills, or simply sharing your thoughts and ideas. Together, we can make a real difference in {{settings('website_name')}}.
              </p>
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
  
  
      <!-- ======= Counts Section ======= -->
      <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
  
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-emoji-smile"></i>
                <span data-purecounter-start="0" data-purecounter-end="{{settings('aboutus_sec1_number')}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>{{settings('aboutus_sec1_text')}}</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
              <div class="count-box">
                <i class="bi bi-journal-richtext"></i>
                <span data-purecounter-start="0" data-purecounter-end="{{settings('aboutus_sec2_number')}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>{{settings('aboutus_sec2_text')}}</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="bi bi-headset"></i>
                <span data-purecounter-start="0" data-purecounter-end="{{settings('aboutus_sec3_number')}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>{{settings('aboutus_sec3_text')}}</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                <i class="bi bi-people"></i>
                <span data-purecounter-start="0" data-purecounter-end="{{settings('aboutus_sec4_number')}}" data-purecounter-duration="1" class="purecounter"></span>
                <p>{{settings('aboutus_sec4_text')}}</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Counts Section -->
  
      <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients section-bg">
        <div class="container" data-aos="zoom-in">
  
          <div class="row">
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
            </div>
  
            <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
              <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
            </div>
  
          </div>
  
        </div>
      </section><!-- End Clients Section -->
  
      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Services</h2>
            <h3>Check our <span>Services</span></h3>
            <p>At {{settings('website_name')}}, we offer a range of services designed to enhance your living experience and make our neighborhood a better place.</p>
          </div>
  
          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                <h4><a href="">Landscape and Greenery Care</a></h4>
                <p>Our dedicated team ensures the lush greenery and aesthetics of our neighborhood, maintaining beautiful landscapes and well-kept green spaces.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Neighborhood Watch and Security</a></h4>
                <p>Your safety is our top priority. We collaborate closely with local law enforcement and employ security measures to provide a secure living environment for all residents.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4><a href="">Community Gatherings and Activities</a></h4>
                <p>Join the fun! We host a variety of engaging community events and activities throughout the year, fostering a strong sense of togetherness and creating lasting memories for our residents.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-world"></i></div>
                <h4><a href="">Information Hub and Updates</a></h4>
                <p>Stay connected with our website, newsletters, and community announcements. We keep you informed about important updates and neighborhood news.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-slideshow"></i></div>
                <h4><a href="">Environmental Stewardship</a></h4>
                <p>We are committed to sustainable practices and environmental responsibility. Our initiatives focus on preserving the natural beauty of our surroundings, promoting eco-friendly living, and reducing our carbon footprint.</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-arch"></i></div>
                <h4><a href="">Educational Workshops and Resources</a></h4>
                <p>We believe in the power of knowledge. Join our educational workshops and access valuable resources on various topics, from home improvement to financial planning, empowering you with information to enhance your quality of life.</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Services Section -->
  
      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">
  
          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
  
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->
  
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->
  
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->
  
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->
  
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->
  
            </div>
            <div class="swiper-pagination"></div>
          </div>
  
        </div>
      </section><!-- End Testimonials Section -->
  
      <!-- ======= Portfolio Section ======= -->
      <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Gallery</h2>
            <h3>Check our <span>Pictures</span></h3>
            <p>Explore Our Vibrant Community Through Captivating Visuals</p>
          </div>
  
          <div class="row" data-aos="fade-up" data-aos-delay="100" style="display: none">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-card">Card</li>
                <li data-filter=".filter-web">Web</li>
              </ul>
            </div>
          </div>
  
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($gallery as $item)
                
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <img src="{{asset('frontend/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>App 1</h4>
                  <a href="{{asset('frontend/img/portfolio/portfolio-1.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            @endforeach
  
  
          </div>
  
        </div>
      </section><!-- End Portfolio Section -->
  
      <!-- ======= Team Section ======= -->
      <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Partners</h2>
            <h3>Our Valued <span>Partners</span></h3>
            <p>We're proud to partner with these esteemed organizations and individuals who share our vision for a vibrant and thriving neighborhood.</p>
          </div>
  
          <div class="row">
            @foreach ($vendor as $item)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <div class="member-info">
                    
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <h4>{{$item->name}}</h4>
                  <span>{{$item->type()->name}}</span>
                </div>
              </div>
            </div>
                
            @endforeach
  
          </div>
  
        </div>
      </section><!-- End Team Section -->
  
      {{-- <!-- ======= Pricing Section ======= -->
      <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Pricing</h2>
            <h3>Check our <span>Pricing</span></h3>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="box">
                <h3>Free</h3>
                <h4><sup>$</sup>0<span> / month</span></h4>
                <ul>
                  <li>Aida dere</li>
                  <li>Nec feugiat nisl</li>
                  <li>Nulla at volutpat dola</li>
                  <li class="na">Pharetra massa</li>
                  <li class="na">Massa ultricies mi</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
              <div class="box featured">
                <h3>Business</h3>
                <h4><sup>$</sup>19<span> / month</span></h4>
                <ul>
                  <li>Aida dere</li>
                  <li>Nec feugiat nisl</li>
                  <li>Nulla at volutpat dola</li>
                  <li>Pharetra massa</li>
                  <li class="na">Massa ultricies mi</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
              <div class="box">
                <h3>Developer</h3>
                <h4><sup>$</sup>29<span> / month</span></h4>
                <ul>
                  <li>Aida dere</li>
                  <li>Nec feugiat nisl</li>
                  <li>Nulla at volutpat dola</li>
                  <li>Pharetra massa</li>
                  <li>Massa ultricies mi</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
              <div class="box">
                <span class="advanced">Advanced</span>
                <h3>Ultimate</h3>
                <h4><sup>$</sup>49<span> / month</span></h4>
                <ul>
                  <li>Aida dere</li>
                  <li>Nec feugiat nisl</li>
                  <li>Nulla at volutpat dola</li>
                  <li>Pharetra massa</li>
                  <li>Massa ultricies mi</li>
                </ul>
                <div class="btn-wrap">
                  <a href="#" class="btn-buy">Buy Now</a>
                </div>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Pricing Section --> --}}
  
      {{-- <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>F.A.Q</h2>
            <h3>Frequently Asked <span>Questions</span></h3>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
          </div>
  
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <ul class="faq-list">
  
                <li>
                  <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                  <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                    </p>
                  </div>
                </li>
  
                <li>
                  <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                  <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>
  
                <li>
                  <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                  <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div>
                </li>
  
                <li>
                  <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                  <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>
  
                <li>
                  <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                  <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                    </p>
                  </div>
                </li>
  
                <li>
                  <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                  <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                    </p>
                  </div>
                </li>
  
              </ul>
            </div>
          </div>
  
        </div>
      </section><!-- End Frequently Asked Questions Section --> --}}
  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Contact</h2>
            <h3><span>Contact Us</span></h3>
            <p>We're Here to Listen and Assist You</p>
          </div>
  
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
              <div class="info-box mb-4">
                <i class="bx bx-map"></i>
                <h3>Our Address</h3>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6">
              <div class="info-box  mb-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Us</h3>
                <p>contact@example.com</p>
              </div>
            </div>
  
            <div class="col-lg-3 col-md-6">
              <div class="info-box  mb-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Us</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div>
  
          </div>
  
          <div class="row" data-aos="fade-up" data-aos-delay="100">
  
            <div class="col-lg-6 ">
              <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
            </div>
  
            <div class="col-lg-6">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
@endsection