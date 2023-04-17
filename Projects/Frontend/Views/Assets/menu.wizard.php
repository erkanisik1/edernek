<style>
  .nav-item:hover{
    background: #E1E1E1FF;
    border-radius: 50px;
  }
</style>
<ul class="navbar-nav">
  <li class="nav-item"><a class="nav-link" href="{{URL::base()}} ">Anasayfa</a> </li>
  
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" ><span class="nav-link-title">Üyeler</span></a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/uye">Üye arama</a>
     <a class="dropdown-item" href="/uye/kayit">Üye kayıt</a> 
     <!-- 
      <a class="dropdown-item" href="/uye/yeni">Üye kayıt</a>
      -->
    </div>
  </li> 
  <li class="nav-item"><a class="nav-link" href="/aidat">Aidat</a></li>
  <li class="nav-item"><a class="nav-link" href="/talep">Talepler</a></li>

   
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
      <span class="nav-link-title">Makbuzlar</span>
    </a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/makbuz/abab"> Ayni Bağış Alındı Belgesi</a>
      <a class="dropdown-item" href="/makbuz/aytb">Ayni Yardım Teslim Belgesi</a>
      <a class="dropdown-item" href="/makbuz/nab">Nakdi Alındı Belgesi</a>
      
    </div>
  </li>  

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
      <span class="nav-link-title">Telefon Defteri</span> 
    </a>
    <div class="dropdown-menu">
      <a href="/rehber" class="dropdown-item">Rehberde Ara</a>
      <a href="/rehber/yeni" class="dropdown-item">Ekle</a>
      <a href="/rehber/kategoriEkle" class="dropdown-item">Kategori Ekle</a>

    </div>
  
  </li> 

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
      <span class="nav-link-title">Ayarlar</span>
    </a>
    <div class="dropdown-menu">     
        <a class="dropdown-item" href="/ayar/talep">Talepler</a>
        <a class="dropdown-item" href="/ayar/kullaniciekle">Yeni Kullanıcı Ekle</a>
        <a class="dropdown-item" href="/ayar/kurullar">Kurullar</a>
     
    </div>

  </li> 
  <li class="nav-item"><a href="/home/logout"><button class="btn btn-danger">Çıkış</button></a></li>

</ul>

