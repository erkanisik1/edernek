
<div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="fa fa-align-justify"></i> </span>
    <h5>Creator</h5>
  </div>
  <div class="widget-content nopadding">
    <form action="#" method="post" class="form-horizontal">
    	<div class="control-group">
    		<label class="control-label">
    			Oluşturulacak Bölüm : 
    		</label>
    		<div class="controls">
    			<select name="section" id="" class="span11">
    				<option value="Frontend">Frontend</option>
    				<option value="Members">Members</option>
    				<option value="Panel">Panel</option>
    			</select>
    		</div>
    		
    	</div>
    	  <div class="control-group">
        <label class="control-label">Controller Adı :</label>
        <div class="controls">
          <input type="text" name="name" class="span11" required>
        </div>
      </div>
       <div class="control-group">
              <label class="control-label">Oluştur :</label>
              <div class="controls">
                <label>
                  <input type="checkbox" name="controller" value="1" checked />
                  Controller</label>
                <label>
                  <input type="checkbox" name="models" value="1" />
                  Models</label>
                <label>
                  <input type="checkbox" name="views" value="1" />
                  Views</label>
              </div>
            </div>
       <div class="form-actions">
        <button type="submit" class="btn btn-success">Kaydet</button>
      </div>
    </form>
</div></div>
