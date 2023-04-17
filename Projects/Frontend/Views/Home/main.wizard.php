<div class="row row-cards">
  <div class="col-4">
    <div class="card card-sm">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col-auto">
            <span class="bg-success text-white avatar">
             <i class="fa fa-wheelchair"></i>
           </div>
           <div class="col">
            <div class="font-weight-medium">
             
            </div>
            <div class="text-muted">Engelli Üye Sayısı</div>
            {{engelliUyeSayisi()}}
          </div>
        </div>
      </div>
    </div>
  </div>

 <div class="col-4">
  <div class="card card-sm">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-auto">
          <span class="bg-primary text-white avatar"><i class="fas fa-user-plus"></i></span>
        </div>
        <div class="col">
          <div class="font-weight-medium">
           
         </div>
         <div class="text-muted">Sağlam Üye Sayısı</div>
          {{saglamUyeSayisi()}}
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-4">
  <div class="card card-sm">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-auto">
          <span class="bg-facebook text-white avatar"><i class="fas fa-users"></i></span>
       </div>
       <div class="col">
        <div class="font-weight-medium">
          
        </div>
        <div class="text-muted">Toplam üye sayısı</div>
        {{engelliUyeSayisi()+saglamUyeSayisi()}}
      </div>
    </div>
  </div>
</div>
</div>
</div>

<div class="mt-3">
  <a href="/uye/engellikayit"><button type="button" class="btn btn-light text-dark btn-lg">Engelli Üye Kayıt Formu</button></a>
  <a href="/uye/saglamkayit"><button type="button" class="btn btn-light text-dark btn-lg">Sağlam Üye Kayıt Formu</button></a>
  <a href="/uye"><button type="button" class="btn btn-light text-dark btn-lg">Üye Arama</button></a>
  <a href="/Rehber"><button type="button" class="btn btn-danger btn-lg">Rehber</button></a>
</div>
