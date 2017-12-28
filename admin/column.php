
    		<?php
            	include "public.php";
            
				$conn = new mysqli("localhost","root","root","myitem");
				if($conn->connect_error){
					die("链接失败");
				}
				$sql ="SELECT * FROM article";
				$result = $conn->query($sql);
			?>
            <div class="col-md-9" style="border-left:1px solid #eaeaea;">
            
            	<table class="table">
                    <tr>
                        <th>id</th>
                        <th>文章标题</th>
                        <th>发布日期</th>
                        <th>操作</th>
                    </tr>
                   	<?php
                    	while($row = $result->fetch_assoc()){
						
					?>
                    <tr>
                        <td><?php echo $row["ar_id"]; ?></td>
                        <td><?php echo $row["ar_title"]; ?></td>
                        <td><?php echo date("Y-m-d H:i:s",$row["ar_date"]); ?></td>
                        <td><a href="delete.php?id=<?php echo $row["ar_id"]; ?>">删除</a> <a href="update.php?id=<?php echo $row["ar_id"]; ?>">修改</a></td>
                    </tr>
                     <?php
                     	
						}
					 ?>          
                
                </table>

            </div>
        </div>
        <div class="panel-footer" style="margin-top:50px;">
    		Copyright1999-2016 北京中公教育科技股份有限公司 .All Rights Reserved 京ICP证161188号
    	</div>
    </div>
</body>
</html>