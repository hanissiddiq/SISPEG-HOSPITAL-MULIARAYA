@extends('template/frame')
@section('content-wrapper')

@php
// $datarole=Auth::user()->role;   
$datarole=0;   
$hidden_class="";
$hidden_style="";
$text="";
  if ($datarole==0) {
    $text="SISPEGA : sistem informasi yang dirancang untuk mengelola data kepegawaian secara digital dan terintegrasi, mulai dari perencanaan, pengadaan, hingga pemberhentian pegawai. 
    SISPEGA memberikan manfaat yang signifikan bagi organisasi, termasuk peningkatan efisiensi, kemudahan pengelolaan data, dan pengambilan keputusan yang lebih tepat. SISPEGA membantu organisasi mengelola berbagai aspek kepegawaian, seperti data diri, riwayat kerja, kinerja, gaji, dan informasi penting lainnya";
    // $text="Cek Orderan Semua Toko Disini";
  }else{
    $text="Ayo cek orderan di tokomu sekarang";
    $hidden_class="hidden";
    $hidden_style="d-none";
  }
@endphp

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row gy-4">
    <!-- Gamification Card -->
    <div class="col-md-12 col-lg-12">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class=" order-2 order-md-1">
            <div class="card-body">
              {{-- <h4 class="card-title pb-xl-2">Selamat Datang <strong> {{Auth::user()->nama}}!</strong></h4> --}}
              <h4 class="card-title pb-xl-2">Selamat Datang <strong> Hanis !</strong></h4>
              <p class="mb-2" style="text-align: justify;
  text-justify: inter-word;">{{$text}}</p>
              <a href="{{url('/transaksi_baru')}}" class="btn btn-primary">Baca Selengkapnya ...</a>
            </div>
          </div>
          <div class="col-md-6 text-center text-md-end order-1 order-md-2">
            <div class="card-body pb-0 px-0 px-md-4 ps-0">
           </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Gamification Card -->

    <!-- Statistics Total Order -->
    <div class="col-lg-3 col-sm-6">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded">
                <i class="mdi mdi-account-group-outline mdi-24px"></i>
              </div>
            </div>
          </div>
          <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
            {{-- <h5 class="mb-2">{{$total}}</h5> --}}
            <h5 class="mb-2">56</h5>
            <p class="text-muted mb-lg-2 mb-xl-3">Total Pegawai</p>
          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Total Order -->

     <!-- Statistics Total Order -->
     <div class="col-lg-3 col-sm-6">
      <div class="card h-100">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
            <div class="avatar">
              <div class="avatar-initial bg-label-primary rounded">
                <i class="mdi mdi-doctor mdi-24px"></i>
              </div>
            </div>
          </div>
          <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
            {{-- <h5 class="mb-2">{{$baru}}</h5> --}}
            <h5 class="mb-2">23</h5>
            <p class="text-muted mb-lg-2 mb-xl-3">Dokter</p>
          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Total Order -->

      <!-- Statistics Total Order -->
      <div class="col-lg-3 col-sm-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
              <div class="avatar">
                <div class="avatar-initial bg-label-primary rounded">
                  <i class="mdi mdi-account-tie mdi-24px"></i>
                </div>
              </div>
            </div>
            <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
              {{-- <h5 class="mb-2">{{$proses}}</h5> --}}
              <h5 class="mb-2">12</h5>
              <p class="text-muted mb-lg-2 mb-xl-3">HR</p>
            </div>
          </div>
        </div>
      </div>
      <!--/ Statistics Total Order -->

       <!-- Statistics Total Order -->
       <div class="col-lg-3 col-sm-6">
        <div class="card h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
              <div class="avatar">
                <div class="avatar-initial bg-label-primary rounded">
                  <i class="mdi mdi-skull-scan-outline mdi-24px"></i>
                </div>
              </div>
            </div>
            <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
              {{-- <h5 class="mb-2">{{$selesai}}</h5> --}}
              <h5 class="mb-2">5</h5>
              <p class="text-muted mb-lg-2 mb-xl-3">Radiologi</p>
            </div>
          </div>
        </div>
      </div>
      <!--/ Statistics Total Order -->
      
      <!-- Statistics Total Order -->
      <div class="col-lg-3 col-sm-6">
       <div class="card h-100">
         <div class="card-body">
           <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
             <div class="avatar">
               <div class="avatar-initial bg-label-primary rounded">
                 <i class="mdi mdi-iv-bag mdi-24px"></i>
               </div>
             </div>
           </div>
           <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
             {{-- <h5 class="mb-2">{{$selesai}}</h5> --}}
             <h5 class="mb-2">5</h5>
             <p class="text-muted mb-lg-2 mb-xl-3">Laboratorium</p>
           </div>
         </div>
       </div>
     </div>
     <!--/ Statistics Total Order -->

    <!-- Statistics Total Order -->
      <div class="col-lg-3 col-sm-6 {{$hidden_style}}">
        <div class="card h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
              <div class="avatar">
                <div class="avatar-initial bg-label-primary rounded">
                  <i class="mdi mdi-monitor-dashboard mdi-24px"></i>
                </div>
              </div>
            </div>
            <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
              {{-- <h5 class="mb-2">{{$jmluser}}</h5> --}}
              <h5 class="mb-2">8</h5>
              <p class="text-muted mb-lg-2 mb-xl-3">Information Tech</p>
            </div>
          </div>
        </div>
      </div>
      <!--/ Statistics Total Order -->

    <!-- Statistics Total Order -->
      <div class="col-lg-3 col-sm-6 {{$hidden_style}}">
        <div class="card h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
              <div class="avatar">
                <div class="avatar-initial bg-label-primary rounded">
                  <i class="mdi mdi-account-cash mdi-24px"></i>
                </div>
              </div>
            </div>
            <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
              {{-- <h5 class="mb-2">{{$jmluser}}</h5> --}}
              <h5 class="mb-2">8</h5>
              <p class="text-muted mb-lg-2 mb-xl-3">Finance</p>
            </div>
          </div>
        </div>
      </div>
      <!--/ Statistics Total Order -->
      
      <!-- Statistics Total Order -->
        <div class="col-lg-3 col-sm-6 {{$hidden_style}}">
          <div class="card h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                <div class="avatar">
                  <div class="avatar-initial bg-label-primary rounded">
                    <i class="mdi mdi-clipboard-pulse-outline mdi-24px"></i>
                  </div>
                </div>
              </div>
              <div class="card-info mt-4 pt-1 mt-lg-1 mt-xl-4">
                {{-- <h5 class="mb-2">{{$jmluser}}</h5> --}}
                <h5 class="mb-2">8</h5>
                <p class="text-muted mb-lg-2 mb-xl-3">Administrasi</p>
              </div>
            </div>
          </div>
        </div>
        <!--/ Statistics Total Order -->
      

  </div>

@endsection