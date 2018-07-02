$(document).ready(function(){

	$(document).on('click', '.report', function(){
		var id=$(this).val();
		var $this = $(this);
		$this.toggleClass('report');
		if($this.hasClass('report')){
			$this.html('<i class="fa fa-flag"></i>'); 
		} else {
			$this.html('<i class="fa fa-check"></i>');
			$this.addClass("unreport"); 
		}
		$.ajax({
			type: "POST",
			url: "postingController.php",
			data: {
				act:'report',
				id: id,
				report: 1,
			},
			success: function(){
				alert('Reported');
			}
		});
	});

	$(document).on('click', '.unreport', function(){
		var id=$(this).val();
		var $this = $(this);
		$this.toggleClass('unreport');
		if($this.hasClass('unreport')){
			$this.html('<i class="fa fa-flag"></i>'); 
		} else {
			$this.html('<i class="fa fa-flag"></i>');
			$this.addClass("report"); 
		}
		$.ajax({
			type: "POST",
			url: "postingController.php",
			data: {
				act:'report',
				id: id,
				report: 1,
			},
			success: function(){
				alert('Batal melakukan report')
			}
		});
	});

});