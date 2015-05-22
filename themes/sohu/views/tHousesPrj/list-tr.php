<table class="table table-condensed table-hover">
		      <thead>
		        <tr>
		          <th>项目名称</th>
		          <th>项目所属城市</th>
		          <th>创建者</th>
		          <th>创建时间</th>
		          <th>修改者</th>
		          <th>修改时间</th>
		        </tr>
		      </thead>
		      <tbody>
		      	<?php foreach ($dataProvider as $key => $value) { ?>
			      	<tr id="<?php echo $value['group_id']?>">
			          <th scope="row"><?php echo $value['group_name']?></th>
			          <td><?php echo $value['group_name']?></td>
			          <td>小明</td>
			          <td>2015/1/1</td>
			          <td>小明</td>
			          <td>2015/1/1</td>
			        </tr>
		      	<?php } ?>
		        <?php if(empty($dataProvider)){ ?>
		        	<tr><td colspan="20"><div class="empty">无信息</div></td></tr>
		      	<?php } ?>
		      </tbody>
		    </table>