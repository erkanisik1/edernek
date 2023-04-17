<a href="/ayar/malzemeEkle"><button class="btn btn-success mb-2">Yeni Malzeme Ekle</button></a></span>


@cardStart('Malzeme Listesi')

 <table class="table table-bordered table-striped table-vcenter">
        <thead>
          <tr class="text-center">
            <th>MALZEME ADI </th>
            <th>DURUMU</th>
            <th width="150">İŞLEMLER</th>           
          </tr>
        </thead>
        <tbody>
          @foreach (malzemeList() as $key)
          <tr>
            <td>{{$key->adi}}</td>
            <td>{{$key->durum}}</td>
            
            <td class="text-center">
              <a href="/ayar/malzemeEdit/{{$key->id}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
              <a href="/ayar/malzemeDelete/{{$key->id}}" class="btn btn-danger" onclick="return confirm('Bu Kaydı Silmek istediğinize eminmisiniz?')"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

@cardEnd()
