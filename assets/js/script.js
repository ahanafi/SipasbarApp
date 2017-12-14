var pathArray = window.location.pathname.split('/')[1];
var host = window.location.host;
var base_url = "http://"+host+"/"+pathArray+"/";

$(document).ready(function(){
	$("#data-report").DataTable({'pageLength':5});

	$("#data-report").on('click', '.btn-show', function(){
		$("#load-data > tr").remove();
		var pid = $(this).attr('data-ppb-id');
		$("#ListBarang").modal('show');

		$.ajax({
			method	: 'GET',
			url 	: base_url+'barang/getBarangPPB/'+pid,
			success : function(cb){
				var data = JSON.parse(cb);
				$.each(data, function(i,n){
				var newList = $("<tr>");
					newList.html("<td>"+n.nama_barang+"</td><td class='ctr'>"+n.jumlah+"</td><td class='ctr'>"+n.satuan+"</td><td class='ctr'>"+n.status+"</td><td>"+n.keterangan+"<td>");
					$("#load-data").append(newList);
				});
			}
		});
	});

	$("a.logout").on("click", function(){
		$("#confirmLogout").modal('show');
	});

	$("button[name=back]").on('click', function(){
		window.history.back();
	});

	function showImages(data){
		if (data == 1) {
			callback = "approved.png";
		} else {
			callback = "rejected.png";
		}

		return base_url+"images/"+callback;
	}

	$("#data").DataTable({
		'pageLength':5
	});
	$("#data-approval").DataTable({
		'pageLength' : 5
	});
	$("#data-open").DataTable({
		'pageLength' : 5
	});

	$("#data-open").on("click", '.modalShow', function(){
		$("#detailBarang").modal('show');
		var id = $(this).attr('data-app-no');
		$.ajax({
			method	: 'GET',
			url		: base_url+'dashboard/barang/get/'+id,
			success	: function(msg){
				var data = JSON.parse(msg);
				$(".nama_barang").text(data.nama_barang);
				$(".jumlah").text(data.jumlah);
				$(".satuan").text(data.satuan);
				$(".status").text(data.status);
				$(".keterangan").text(data.keterangan);
			}

		});
	});

	$("#data-open").on("click", '.detail-approved', function(){
		$("#detailApproved").modal('show');
		var pid = $(this).attr('data-app-no');
		$.ajax({
			method 	: 'GET',
			url 	: base_url+'dashboard/ppb/get/'+pid,
			success : function(msg){
				var res = JSON.parse(msg);
				//alert(res);
				$(".approvedKasie").attr({'src': showImages(res.is_approve_kasie)});
				$(".approvedKadept").attr({'src': showImages(res.is_approve_kadept)});
				$(".approvedKadiv").attr({'src': showImages(res.is_approve_kadiv)});
				$(".approvedSecurity").attr({'src': showImages(res.is_approve_security)});
			}
		});
	});

	$("#data-open").on("click", '.btn-delete', function(){
		$("#confirmDelete").modal('show');
		var type = $(this).attr('data-type');
		var id 	 = $(this).attr('data-id');
		$("a.url").attr({'href' : base_url+"dashboard/"+type+"/delete/"+id});
	});

	$("#data").on("click", '.btn-delete', function(){
		$("#confirmDelete").modal('show');
		var type = $(this).attr('data-type');
		var id 	 = $(this).attr('data-id');
		$("a.url").attr({'href' : base_url+"dashboard/"+type+"/delete/"+id});
	});

	$("input:checkbox").on('change', function(){
		var name = $(this).attr('name');
		if($("input[name="+name+"]:checked")){
			$("img."+name).attr({ 'src' : base_url+"/images/approved.png" });
		} else {
			$("img."+name).attr({ 'src' : base_url+"/images/rejected.png" });
		}
	});
});

function konfirmasi()
{
	var ask = confirm("Apakah Anda yakin akan menghapus data ini ?");
	if (ask == true) {
		return true;
	} else {
		return false;
	}
}