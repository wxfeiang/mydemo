<?php
	include "public.php";
	$id = $_GET["id"];
	$conn = new mysqli("localhost","root","root","myitem");
	if($conn->connect_error){
		die("链接失败");
	}
	
	$sql = "SELECT * FROM article WHERE ar_id=$id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
?>
            <div class="col-md-9" style="border-left:1px solid #eaeaea;">
            <form method="post" action="update_article.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
            	<div class="form-group">
                    <label for="exampleInputEmail1">文章标题</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="文章标题" value="<?php echo $row["ar_title"]; ?>">
                  </div>
                <div class="form-group">
                    <label for="column">栏目名称</label>
                    <select class="form-control" name="column">
                      <option <?php if($row["ar_column"]=="Web前端开发"){ echo "selected"; } ?>>Web前端开发</option>
                      <option <?php if($row["ar_column"]=="UI设计"){ echo "selected"; } ?>>UI设计</option>
                      <option <?php if($row["ar_column"]=="PHP开发"){ echo "selected"; } ?>>PHP开发</option>
                      <option <?php if($row["ar_column"]=="JAVA开发"){ echo "selected"; } ?>>JAVA开发</option>
                      <option <?php if($row["ar_column"]=="网络营销"){ echo "selected"; } ?>>网络营销</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="describe">文章描述</label>
                    <textarea class="form-control" rows="3" id="describe" name="describe"><?php echo $row["ar_describe"]; ?></textarea>
                  </div>
                <div class="form-group">
                    <label for="keyworld">关键词</label>
                    <input type="text" class="form-control" id="keyworld" name="keyworld" placeholder="关键词" value="<?php echo $row["ar_keyword"]; ?>">
                  </div>
                  <h5>文章内容</h5>
                 <script type="text/plain" id="myEditor" style="width:100%;height:240px;">
					<?php echo $row["ar_contents"]; ?>
				</script>
                <hr>
                <div class="form-group">
                    <label for="exampleInputFile">上传缩略图</label>
                    <input type="file" id="exampleInputFile" name="upfile" value="<?php echo $row["ar_thum"]; ?>">
                 </div>
                <input type="submit" class="btn btn-success" value="发布文章"> <input type="reset" class="btn btn-danger" value="重置内容">
                </form>
            </div>
        </div>
        <div class="panel-footer" style="margin-top:50px;">
    		Copyright1999-2016 北京中公教育科技股份有限公司 .All Rights Reserved 京ICP证161188号
    	</div>
    </div>
    <script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('myEditor');
    
</script>
</body>
</html>