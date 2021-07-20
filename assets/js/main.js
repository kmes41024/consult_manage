$(document).ready(function() {
	$('#example0').DataTable();
} );

$(document).ready(function() {
	var table = $('#example').DataTable({
		"columnDefs": [
			{ "visible": false, "targets": 2 }
		],
		"order": [[ 2, 'asc' ]],
		"displayLength": 25,
		"drawCallback": function ( settings ) {
			var api = this.api();
			var rows = api.rows( {page:'current'} ).nodes();
			var last=null;
 
			api.column(2, {page:'current'} ).data().each( function ( group, i ) {
				if ( last !== group ) {
					$(rows).eq( i ).before(
						'<tr class="group"><td colspan="5">'+group+'</td></tr>'
					);
 
					last = group;
				}
			} );
		}
	} );
 
	// Order by the grouping
	$('#example tbody').on( 'click', 'tr.group', function () {
		var currentOrder = table.order()[0];
		if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
			table.order( [ 2, 'desc' ] ).draw();
		}
		else {
			table.order( [ 2, 'asc' ] ).draw();
		}
	} );
} );

var num = 0;

function msgPs(clickNum)
{
	$("#editModal").modal({backdrop:'static',show:true,keyboard:false});
	
	num = clickNum;
}

function exitEdit()
{
	$("#editModal").modal('hide');
}

function handle()
{
	var note = document.getElementById('f_note').value;
	
	var btn = "handle" + num;
	var btnReplace = document.getElementById(btn);
	btnReplace.innerHTML = "<p style = 'color:#C3BCBC'>已处理</p>";
	
	$.ajax({  
		type: "POST",   //提交的方法
		datatype:"json",
		url:"table_change.php", //提交的地址  
		data:
		{
			id:num,
			note:note
		},
		
		success: function(data) {  //成功
			console.log(data.state);  //就将返回的数据显示出来
			if (data.state == 'success')
			{
				layui.layer.msg('成功修改',{time:5000});
			}
			else
			{
				layui.layer.alert('修改失败');
			}
		}
	});
}