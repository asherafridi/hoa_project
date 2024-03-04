
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">{{settings('email')}}</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{settings('phone_number')}}</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
          @foreach (social_icon() as $item)
              @php
              $desc = json_decode($item->description);

              @endphp
                
              <a href="{{$desc->url}}" class="twitter">{!! $desc->social_icon !!}</a>
              @endforeach
        <!--<a href="#" class="twitter"><i class="bi bi-twitter"></i></a>-->
        <!--<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>-->
        <!--<a href="#" class="instagram"><i class="bi bi-instagram"></i></a>-->
        <!--<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>-->
      </div>
    </div>
  </section>