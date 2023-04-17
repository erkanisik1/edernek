<a href="/ayar/kurullarYeni"><button class="btn btn-success mb-2">KURUL ÜYESİ EKLE</button></a></span>


@cardStart('Kurul Listesi')

 <table class="table table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th>ADI SOYADI</th>
            <th>GÖREVI</th>
            <th>BAŞLAMA TARİHİ</th>
            <th>BİTİŞ TARİHİ</th>
            <th>İMZA YATKİSİ</th>
            <th>İŞLEMLER</th>           
          </tr>
        </thead>
        <tbody>
          @foreach (yonetim() as $key)
          <tr>
            <td>{{$key->adi}}</td>
            <td>{{$key->kurul_adi.' / '.$key->gorevi}}</td>
            <td class="text-center">{{tcevir($key->ilk_tarih)}}</td>
            <td class="text-center">{{tcevir($key->son_tarih)}}</td>
            <td class="text-center">{{check($key->imzaYetki)}}</td>
            <td>
              <a href="/ayar/kurullarEdit/{{$key->id}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
              <a href="/ayar/kurullarDelete/{{$key->id}}" class="btn btn-danger" onclick="return confirm('Bu Kaydı Silmek istediğinize eminmisiniz?')"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

@cardEnd()
