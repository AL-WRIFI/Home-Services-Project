
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container py-5">
    <div class="row mb-4">
      <div class="col-lg-5">
        <h2 class="display-4 font-weight-light">خدماتنا</h2>
        <p class="font-italic text-muted">جميع الخدمات التي يقدمها موقعنا.</p>
      </div>
    </div>
    <div class="row text-center">
    @foreach ($categories as $category)
    
        <!-- Team item-->
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('storage/'.$category->image)}}" alt="" width="130" class="img-fluid  img-thumbnail shadow-sm">
            <h5 class="mb-0">{{$category->name}}</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
            <ul class="social mb-0 list-inline mt-3">
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
        <!-- End-->
        
    @endforeach

    </div>
    
  </div>