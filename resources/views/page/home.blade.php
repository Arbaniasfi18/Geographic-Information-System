@extends('main')

@section('content')

 <!-- ============================
        Slider
    ============================== -->
    <section class="slider">
        <div class="slick-carousel m-slides-0"
          data-slick='{"slidesToShow": 1, "arrows": true, "dots": false, "speed": 700,"fade": true,"cssEase": "linear"}'>
          <div class="slide-item align-v-h">
            <div class="bg-img"><img src="assets/images/sliders/10.png" alt="slide img"></div>
            <div class="container">
              <div class="row align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-7">
                  <div class="slide__content">
                    <h2 class="slide__title">TUBERKULOSIS SUMATERA UTARA</h2>
                    <p class="slide__desc">Tuberkulosis (TBC) adalah penyakit infeksi menular yang masih menjadi masalah kesehatan global. Kami hadir untuk menyebarkan
                      informasi, edukasi, dan mengajak masyarakat bersama-sama memerangi TBC hingga tuntas.</p>
                    <div class="d-flex flex-wrap align-items-center">
                      <a href="{{ url('peta-sebaran') }}" class="btn btn__primary btn__rounded mr-30">
                        <span>Peta Sebaran TBC</span>
                        <i class="icon-arrow-right"></i>
                      </a>
                      <div class="d-flex flex-wrap align-items-center">
                        <a href="{{ url('contact-us') }}" class="btn btn__primary btn__rounded mr-30">
                          <span>Beri Keluhan</span>
                          <i class="icon-arrow-right"></i>
                        </a>
                      </div>
                    </div>
                  </div><!-- /.slide-content -->
                </div><!-- /.col-xl-7 -->
              </div><!-- /.row -->
            </div><!-- /.container -->
          </div><!-- /.slide-item -->
        </div><!-- /.carousel -->
      </section><!-- /.slider -->
  
      <!-- ========================
        About Layout 1
      =========================== -->
      <section class="about-layout1 pb-0">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="heading-layout2">
                <h3 class="heading__title mb-40">Apa Itu TBC</h3>
              </div><!-- /heading -->
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="about__Text">
                <p class="mb-30">Tuberkulosis (TBC) adalah penyakit menular yang disebabkan oleh bakteri Mycobacterium tuberculosis. 
                  TBC dapat menyerang paru-paru, namun juga bisa menyerang bagian tubuh lainnya, seperti tulang, ginjal, dan otak. TBC ditularkan melalui udara, misalnya saat seseorang yang terinfeksi batuk atau bersin. 
                  Meskipun serius, penyakit ini dapat disembuhkan dengan perawatan yang tepat.
                </p>
                <p class="mb-30">Hasil laporan WHO pada tahun 2020 mengatakan bahwa Indonesia menempati peringkat ketiga dalam jumlah kasus Tuberkulosis (TB) tertinggi di dunia, 
                  setelah China dan India (World Health Organitation, 2020). Sumatera Utara menjadi fokus perhatian terkait penyakit tuberculosis. Data Kementerian Kesehatan tahun 2021 mengatakan Sumatera Utara berada di 
                  peringkat keenam di antara provinsi-provinsi di Indonesia dalam hal kasus TB paru </p>
              </div>
            </div><!-- /.col-lg-6 -->
            <div class="col-sm-12 col-md-12 col-lg-6">
              <div class="video-banner">
                <h6 class="heading__title text-center">Kasus TBC SUMUT Per Tahun</h6>
                <canvas id="tbCasesChart"></canvas>
                <script>
                    var ctx = document.getElementById('tbCasesChart').getContext('2d');
                    var tbCasesChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['2020', '2021', '2022', '2023'],
                            datasets: [{
                                label: 'Jumlah Kasus',
                                data: [22234, 22354, 35508, 40135],
                                backgroundColor: 'royalblue',
                                borderColor: 'black',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Jumlah Kasus'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Tahun'
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return 'Jumlah Kasus: ' + context.raw;
                                        }
                                    }
                                }
                            }
                        }
                    });
                </script>
              </div><!-- /.video-banner -->
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.About Layout 1 -->
  
  
      <!-- ========================
        About Layout 3
      =========================== -->
      <section class="about-layout3 pb-0" >
        <div class="container mb-10">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-1">
              <div class="heading-layout2">
                <h3 class="heading__title mb-60">Kenali Penularan dan Penanggulangan Tuberkulosis </h3>
              </div><!-- /heading -->
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-2">
              <div class="experience">
                <h2 class="experience__years">5</h2>
                <h1 class="experience__text">Gejala TBC</h1>
                <p>1. Batuk yang berlangsung lebih dari 3 minggu <br>
                  2. Batuk berdarah <br>
                  3. Demam berkepanjangan <br>
                  4. Bereringat di malam hari <br>
                  5. Berat badan menurun drastis</p>
                  <p></p>
              </div><!-- /.experience -->
            </div><!-- /.col-lg-2 -->
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="video-banner-layout2 bg-overlay">
                <img src="assets/images/about/3.png" alt="about" class="w-100">
                <a class="video__btn video__btn-white popup-video" href="https://youtu.be/o0-Cbqv_8MU?si=ACo_vAlHC05xhpqL">
                  <div class="video__player">
                    <i class="fa fa-play"></i>
                  </div>
                  <span class="video__btn-title color-white">Watch Our Video!</span>
                </a>
              </div><!-- /.video-banner -->
            </div><!-- /.col-lg-5 -->
            <div class="col-sm-12 col-md-12 col-lg-5">
              <div class="about__text">
                <div class="text__icon">
                  <i class="icon-doctor"></i>
                </div>
                <p class="heading__desc font-weight-bold color-secondary mb-30">Pencegahan TBC sangat penting untuk menghentikan penyebaran penyakit ini. Berikut langkah-langkah yang bisa diambil:
                  1) Vaksinasi BCG sejak dini
                  2) Menjaga kebersihan dan ventilasi rumah
                  3) Gunakan masker saat berinteraksi dengan penderita TBC
                  4) Periksakan diri secara berkala, terutama jika berada di lingkungan berisiko tinggi
                </p>
                <p class="heading__desc">Meski berisiko fatal, namun TBC adalah penyakit yang masih bisa disembuhkan asalkan melalui penanganan secara tepat. 
                  Biasanya, dokter akan menganjurkan pengidap TB paru untuk mengonsumsi obat selama 6-12 bulan.Obat TB paru umumnya mengandung jenis antituberkulosis, yaitu antibiotik yang khusus digunakan untuk mematikan infeksi bakteri TB. Pengobatannya sendiri terdiri dari 2 tahap yaitu intensif dan lanjutan.</p>
                
              </div><!-- /.about__text -->
            </div><!-- /.col-lg-5 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.About Layout 3 -->
  
      <!-- ======================
        Team
      ========================= -->
      <section class="team-layout1 pb-80">
        <div class="bg-img"><img src="assets/images/backgrounds/1.jpg" alt="background"></div>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
              <div class="heading text-center mb-40">
                <h3 class="heading__title">Rumah Sakit di Sumatera Utara Memberikan Layanan Pengobatan TBC</h3>
              </div><!-- /.heading -->
            </div><!-- /.col-lg-6 -->
          </div><!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="slick-carousel"
                data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
                <!-- Member #1 -->
                <div class="member">
                  <div class="member__img">
                    <img src="assets/images/team/30.png" alt="member img">
                    <ul class="social-icons list-unstyled mb-0">
                      <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div><!-- /.member-img -->
                  <div class="member__info">
                    <h5 class="member__name"><a href="doctors-single-doctor1.html">Mike Dooley</a></h5>
                    <p class="member__job">Cardiology Specialist</p>
                    <p class="member__desc">Muldoone obtained his undergraduate degree in Biomedical Engineering at Tulane
                      University prior to attending St George's University School of Medicine</p>
                    <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                      <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                        <span>Read More</span>
                        <i class="icon-arrow-right"></i>
                      </a>
                    </div>
                  </div><!-- /.member-info -->
                </div><!-- /.member -->
                <!-- Member #2 -->
                <div class="member">
                  <div class="member__img">
                    <img src="assets/images/team/31.png" alt="member img">
                    <ul class="social-icons list-unstyled mb-0">
                      <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div><!-- /.member-img -->
                  <div class="member__info">
                    <h5 class="member__name"><a href="doctors-single-doctor1.html">Dermatologists</a></h5>
                    <p class="member__job">Cardiology Specialist</p>
                    <p class="member__desc">Brian specializes in treating skin, hair, nail, and mucous membrane. He also
                      address cosmetic issues, helping to revitalize the appearance of the skin</p>
                    <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                      <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                        <span>Read More</span>
                        <i class="icon-arrow-right"></i>
                      </a>
                    </div>
                  </div><!-- /.member-info -->
                </div><!-- /.member -->
                <!-- Member #3 -->
                <div class="member">
                  <div class="member__img">
                    <img src="assets/images/team/12.jpg" alt="member img">
                    <ul class="social-icons list-unstyled mb-0">
                      <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                      <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                      <li><a href="#" class="phone"><i class="fas fa-phone-alt"></i></a></li>
                    </ul><!-- /.social-icons -->
                  </div><!-- /.member-img -->
                  <div class="member__info">
                    <h5 class="member__name"><a href="doctors-single-doctor1.html">Maria Andaloro</a></h5>
                    <p class="member__job">Pediatrician</p>
                    <p class="member__desc">Andaloro graduated from medical school and completed 3 years residency program
                      in pediatrics. She passed rigorous exams by the American Board of Pediatrics.</p>
                    <div class="mt-20 d-flex flex-wrap justify-content-between align-items-center">
                      <a href="doctors-single-doctor1.html" class="btn btn__secondary btn__link btn__rounded">
                        <span>Read More</span>
                        <i class="icon-arrow-right"></i>
                      </a>
                    </div>
                  </div><!-- /.member-info -->
                </div><!-- /.member -->
              </div><!-- /.carousel -->
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><


@endsection