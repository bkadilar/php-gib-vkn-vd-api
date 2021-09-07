<div class="container">
  <div class="row">
    <div class="form-group col-md-4">
      <label for="inputAddress">Vergi No</label>
      <input type="text" class="form-control" id="vkn" placeholder="Vergi No">
    </div>
    <div class="form-group col-md-4">
      <label for="sehir">Şehir Seçin</label>
      <select id="sehir" class="form-control">
        <option selected>Seçin</option>
        <?php foreach(getSehirler() as $sehir => $value) {?>
          <option value="<?=$sehir ?>"><?=$value ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="sehir">Vergi Dairesi Seçin</label>
      <div id="vd"> 
        <select disabled class="form-control">
          <option selected>Önce Şehir Seçin</option>
        </select>
      </div>
    </div>
  </div>
  <button type="button" id="sorgula" class="btn btn-primary">Sorgula</button>
  <div id="response" class="row">
  </div>
</div>

<script>
  const baseUrl = '<?=base_url();?>';
  $('body').on('change','#sehir',function() {
    var sehir = $(this).val();
    $.ajax({
      url: baseUrl+'index/getVD',
      type: "post",
      dataType:'json',
      data: {sehir:sehir} ,
      success: function (response) {
        if(response.status==200) {
          $('#vd').html(response.data)
        } else {
          alert('Veri Bulunamadı !')
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
      }
    });
  });
  $('body').on('click','#sorgula',function() {
    var sehir = $('#sehir').val();
    var vd = $('#vds').val();
    var vkn = $('#vkn').val();
    $.ajax({
      url: baseUrl+'index/sorgu',
      type: "post",
      dataType:'json',
      data: {
        sehir:sehir,
        vd:vd,
        vkn:vkn
      },
      success: function (response) {
        if(response.status==200) {
          $('#response').html(response.data)
        } else {
          alert('Veri Bulunamadı !')
        }
        console.log(response)
      },
      error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
      }
    });
  })
</script>