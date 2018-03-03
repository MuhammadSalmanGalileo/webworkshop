<!--========== PARALLAX ==========-->
<div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('customer_assets/img/1920x1080/innovation.jpg') }}">
    <div class="parallax-content container">
        <h1 class="carousel-title">{{ $title }}</h1>
        @if($title == "Rent")
        <p>WS HME menyediakan penyewaan barang-barang elektronik untuk keperluan penyelenggaraan acara.<br>
            Pesan sekarang juga melalui website ini.</p>
        @elseif ($title == "Projects")
        <p>Make it real! <br/>Wujudkan idemu dan temukan solusi dalam proyek hardware bersama kami</p>
        @else
        <p> WS HME ialah suatu divisi dalam HME ITB<br/>Divisi ini bergerak dalam bidang keprofesian elektronika praktis</p>
        @endif                            
    </div>
</div>
<!--========== PARALLAX ==========-->