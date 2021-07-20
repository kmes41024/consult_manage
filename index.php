<!DOCTYPE html>
<?php
	require_once("encoding.php");
	require_once("db/conn.php");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Consult Table</title>
  <link href="assets/css/root.css" rel="stylesheet">
</head>
<body>
	<div class="panel panel-default">
		<div class="panel-title">
			DAtaTables
		</div>
		<div class="panel-body table-responsive">
			<table id="example0" class="table display">
				<thead>
					<tr>
						<th>编号</th>
						<th>产品类别</th>
						<th>公司名称</th>
						<th>姓名</th>
						<th>手机</th>
						<th>信箱</th>
						<th>QQ</th>
						<th>微信</th>
						<th>需求</th>
						<th>登入时间</th>
						<th>备注信习</th>
						<th>处理</th>
					</tr>
				</thead>
				<tbody>
					<?php
						
						$sql = "SELECT * FROM `t_consult` ORDER BY `t_consult`.`f_status`  DESC";
						$rs = $conn->execute($sql);
						$len = count($rs);
						if(count($rs)>0)
						{	
							for($i = 1; $i <= $len; $i++)
							{
								echo "<tr><td>";
								echo $i;
								echo "</td><td>";
								echo $rs[$i-1]['f_type'];
								echo "</td><td>";
								echo $rs[$i-1]['f_company_name'];
								echo "</td><td>";
								echo $rs[$i-1]['f_fullname'];
								echo "</td><td>";
								echo $rs[$i-1]['f_mobile'];
								echo "</td><td>";
								echo $rs[$i-1]['f_email'];
								echo "</td><td>";
								echo $rs[$i-1]['f_qq'];
								echo "</td><td>";
								echo $rs[$i-1]['f_wechat'];
								echo "</td><td>";
								echo $rs[$i-1]['f_request'];
								echo "</td><td>";
								echo $rs[$i-1]['f_addtime'];
								echo "</td><td>";
								echo $rs[$i-1]['f_note'];
								echo "</td><td id = handle" . $rs[$i-1]['id'].">";
								if($rs[$i-1]['f_status'] == '未处理')
								{
									echo "<button type = 'button' onclick = javascrtpt:msgPs(".$rs[$i-1]['id'].") id = btn" . $rs[$i-1]['id'] . ">处理</button>";
								}
								else if($rs[$i-1]['f_status'] == '处理')
								{
									echo "<p>已处理</p>";
								}
								echo "</td></tr>";
							}
						}
				    ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="modal" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content" style="height:15cm;width:22cm;">
				<div class="modal-header" align="center" style="height:1.5cm;">
					<font style="font-family:'思源黑体 CN NORMAL';font-size:20px;color:#000" class="m-modal-title"><label id="previewModel_title">备注：</label></font>
				</div>
				<div class="modal-body" align="center" style = "height:12cm;padding:1cm;">
					<!-- EIDT TAG -->
						<table>
							<tr>
								<td>
									<textarea id='f_note' name = "f_note" class="form-control" placeholder="由此输入备注事项(按回车键可换行)" style = "height:10cm; width:20cm;"></textarea>
								</td>
							</tr>
						</table>
					</div>
				<div class="modal-footer" style = "margin:0px; height:2.5cm;padding:0cm;padding-top:10px; padding-right:50px;">
					<button type="button" class="btn btn-white" data-dismiss="modal" onclick="handle()">提交</button>
					<button type="button" class="btn btn-white" data-dismiss="modal" onclick="exitEdit()">离开</button>
				</div>
			</div>
		</div>
	</div>		
 
</body> 
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins.js"></script>
	<script type="text/javascript" src="assets/js/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="layui/layui.all.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</html>