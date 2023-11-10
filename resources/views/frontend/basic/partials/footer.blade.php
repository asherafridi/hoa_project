  <!-- ======= Footer ======= -->
  <footer id="footer">

    {{-- <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Stay Informed with Our Newsletter</p>
            <form action="{{route('news_form')}}" method="post">
              @csrf
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>{{settings('website_name')}}<span>.</span></h3>
            <p>
              {{settings('address')}}
              <strong>Phone:</strong> {{settings('phone_number')}}<br>
              <strong>Email:</strong> {{settings('email')}}<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('event')}}">Events</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('document')}}">Documents</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('gallery')}}">Gallery</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('dashboard')}}">Member Panel</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Recent Events</h4>
            <ul>
              @foreach (events() as $item)
                  
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('event.page',$item->id)}}">{{$item->eventName}}</a></li>
              @endforeach
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Follow Us on Social Media</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>{{settings('website_name')}}</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->