<?php import::view('header'); ?>
<div class="span12" >
<ul class="quick-actions" style="margin:0 auto;" >
      	<li class="bg_ls">
      		<a href="<?php P::link('makbuz/amg'); ?>"> 
      			<i class="icon-inbox"></i><span class="label label-success"></span>Ayniyat makbuzu giriş
      		</a>
      	</li>

      	<li class="bg_ls">
      		<a href="<?php P::link('makbuz/amc'); ?>"> 
      			<i class="icon-inbox"></i><span class="label label-success"></span>Ayniyat makbuzu Çıkış
      		</a>
      	</li>
            
            <li class="bg_ls">
                  <a href="<?php P::link('makbuz/alindi'); ?>"> 
                        <i class="icon-inbox"></i><span class="label label-success"></span>Alındı belgesi
                  </a>
            </li>
            		

      </ul>
      </div>
<?php import::view('footer'); ?> 