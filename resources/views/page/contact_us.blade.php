@extends('main')

@section('content')

 <!-- ========================= 
            Google Map
    =========================  -->
    <section class="google-map py-0">
        <iframe frameborder="0" height="500" width="100%"
          src="https://maps.google.com/maps?q=Suite%20100%20San%20Francisco%2C%20LA%2094107%20United%20States&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"></iframe>
      </section><!-- /.GoogleMap -->
  
      <!-- ==========================
          contact layout 1
      =========================== -->
      <section class="contact-layout1 pt-0 mt--100">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="contact-panel d-flex flex-wrap">
                <form class="contact-panel__form" action="{{ url('contact-us/store') }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="col-sm-12">
                      <h4 class="contact-panel__title">Bagaimana Kami Dapat Membantu Kamu ?</h4>
                      <p class="contact-panel__desc mb-30">Jangan ragu untuk menghubungi staf resepsionis kami yang ramah untuk memberikan keluhan dan pertanyaan umum atau medis. 
                        Kami selaku Dinas Kesehatan Sumatera Utara akan menerima masukan serta keluhan masyarakat.
                      </p>
                      @if (\Session::has('success'))
                        <div class="alert alert-success">
                          {!! \Session::get('success') !!}</li>
                        </div>
                      @endif
                      @if (\Session::has('error'))
                        <div class="alert alert-danger">
                          {!! \Session::get('error') !!}</li>
                        </div>
                      @endif
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <i class="icon-user form-group-icon"></i>
                        <input type="text" class="form-control" placeholder="Name" id="contact-name" name="contact_name"
                          required>
                      </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <i class="icon-email form-group-icon"></i>
                        <input type="email" class="form-control" placeholder="Email" id="contact-email"
                          name="contact_email" required>
                      </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <i class="icon-phone form-group-icon"></i>
                        <input type="number" class="form-control" placeholder="Phone" id="contact-Phone"
                          name="contact_phone" required>
                      </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-6 col-md-6 col-lg-6">
                      <div class="form-group">
                        <i class="icon-news form-group-icon"></i>
                        <select class="form-control" name="permasalahan" required>
                          <option value="permasalahan">Jenis Permasalahan</option>
                          <option value="keluhan">Keluhan</option>
                          <option value="pertanyaan">Pertanyaan</option>
                        </select>
                      </div>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-12">
                      <div class="form-group">
                        <i class="icon-alert form-group-icon"></i>
                        <textarea class="form-control" placeholder="Message" id="contact-message"
                          name="contact_message" required></textarea>
                      </div>
                      <button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                        <span>Submit Request</span> <i class="icon-arrow-right"></i>
                      </button>
                      <div class="contact-result"></div>
                    </div><!-- /.col-lg-12 -->
                  </div><!-- /.row -->
                </form>
                <div
                  class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient">
                  <div class="bg-img"><img src="assets/images/banners/1.jpg" alt="banner"></div>
                  <div>
                    <h4 class="contact-panel__title color-white">Kontak Cepat</h4>
                    <p class="contact-panel__desc font-weight-bold color-white mb-30">Jangan ragu untuk menghubungi staf kami yang ramah untuk keluahn serta pertanyaan medis apa pun
                    </p>
                  </div>
                  <div>
                    <ul class="contact__list list-unstyled mb-30">
                      <li>
                        <i class="icon-phone"></i><a >089621407776</a>
                      </li>
                      <li>
                        <i class="icon-location"></i><a >Lokasi: Jl. Prof. H. M. Yamin No.41AA, Perintis, Kec. Medan Tim., Kota Medan, Sumatera Utara</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.contact layout 1 -->
  
      
  
    
@endsection