(function (factory) {
  typeof define === 'function' && define.amd ? define(factory) :
  factory();
})((function(){

	$(".buyuk").keyup(function(){this.value = this.value.toLocaleUpperCase('tr');});
	$('.char').keyup(function(){if (this.value.match(/[^a-zA-ZğüşöçİĞÜŞÖÇ ]/g)){this.value = this.value.replace(/[^a-zA-ZğüşöçİĞÜŞÖÇ ]/g,'');}});

	$('#uyeid').change(function(){
		var uyeid = $('#uyeid').val();

		if(uyeid == 0){
			$('#uye').hide();
			$('#uyedegil').show();
		}
	});

	$('#il').change(function(){
		var il_adi = $('#il').val();
		$.post("/ajax/ilsorgu",{il:il_adi}, function(data){
			$('#ilce').html(data);			
		});	
	});




	

	
}));