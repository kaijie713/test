<tr id ="tr-<?php echo $pdetail['pd_id'];?>">
  <td class="code"></td>
  <td><p class="help-block"><?php F::ymd($pdetail['bdate']);?></td>
  <td><p class="help-block"><?php F::ymd($pdetail['bdate']);?></td>
  <td><p class="help-block"><?php echo $pdetail['sell_house_num'];?>套</td>
  
  <td><p class="help-block"><?php echo Dict::getValue($pdetail['source_type']);?></td>
  <td><p class="help-block"><?php F::d2($pdetail['pre_incoming']);?>元</p></td>
  <td><p class="help-block"><?php echo Dict::getValue($pdetail['charge_type']);?></td>
  <td>
      <?php if(!empty($show) && $type =="show") {?>
  	  	<a target="_blank" class="btn btn-default btn-sm" href="/index.php?r=Pdetail/view&id=<?php echo $pdetail['pd_id'];?>">查看详情</a>
  	  <?php } else {?>
  	    <a class="btn btn-default btn-sm" data-role="adjust-pdetail" data-target="#modal" data-toggle="modal" data-url="/index.php?r=Pdetail/Adjust&id=<?php echo $pdetail['pd_id'];?>" >调整</a>
      <?php }?>
      <?php if(!empty($adjust_detail_id)) {?>
        <input type="hidden" name="Pdetail[adjust_detail_id][]" value="<?php echo $adjust_detail_id;?>">
  	  <?php }?>
  </td>
</tr>