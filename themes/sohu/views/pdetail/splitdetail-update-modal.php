<?php if(!empty($splitdetails) ) {?>
<div class="row-fluid">
  <table id="splitdetail-body" class="table table-striped table-hover table-form">
  <thead>
    <tr>
      <td style="text-align:center" colspan="8">开发商/合作媒体分成明细</td>
    </tr>
    <tr>
        <td width="16%">开发商/合作媒体</td>
        <td width="23%">开发商/合作媒体名称</td>
        <td width="15%">分成比例</td>
        <td width="16%">分成金额</td>
        <td width="20%">备注</td>
    </tr>
  </thead>
  <tbody data-role="splitdetails" id="splitdetail-tbody">
  </tbody>
  <?php foreach ($splitdetails as $key => $value) { ?>

    <tr data-charge="false" data-role="splitdetail" data-id ="<?php echo $value['sp_id'];?>" id="tr<?php echo $value['sp_id'];?>">
      <td>
        <div class="form-group control-group">
          <label for="partner_type<?php echo $value['sp_id'];?>" class="hide">开发商/合作媒体</label>
          <div class="input-group controls mlz">
            <input readonly type="text" id="partner_type<?php echo $value['sp_id'];?>" value="<?php echo Dict::getValue($value['partner_type']);?>" name="Splitdetail[partner_type][]" class="span12" >
          </div>
      </td>
      <td>
        <div class="form-group control-group">
          <label for="partner_name<?php echo $value['sp_id'];?>" class="hide">开发商/合作媒体名称</label>
          <div class="input-group controls mlz">
            <input readonly type="text" id="partner_name<?php echo $value['sp_id'];?>" value="<?php echo $value['partner_name'];?>" name="Splitdetail[partner_name][]" class="span12" >
          </div>
      </td>
      <td>
        <div class="form-group control-group">
          <label for="divide<?php echo $value['sp_id'];?>" class="hide">分成比例</label>
          <div class="input-group controls mlz">
            <div class="input-group">
              <input readonly type="text" id="divide<?php echo $value['sp_id'];?>" value="<?php echo $value['divide'];?>" name="Splitdetail[divide][]" class="span8" >
              <span class="input-group-addon">%</span>
            </div>
          </div>
      </td>
      <td>
        <div class="form-group control-group">
          <label for="divide_amount<?php echo $value['sp_id'];?>" class="hide">分成金额</label>
          <div class="input-group controls mlz">
            <div class="input-group">
              <input readonly type="text" id="divide_amount<?php echo $value['sp_id'];?>" value="<?php echo $value['divide_amount'];?>" name="Splitdetail[divide_amount][]" class="span10" >
              <span class="input-group-addon">元</span>
            </div>
          </div>
      </td>
      <td>
        <div class="form-group control-group">
          <label for="partner_memo<?php echo $value['sp_id'];?>" class="hide">备注</label>
          <div class="input-group controls mlz">
          <input readonly type="text" id="partner_memo<?php echo $value['sp_id'];?>" value="<?php echo $value['partner_memo'];?>" name="Splitdetail[partner_memo][]" class="span12" >
          </div>
      </td>
    </tr>
  <?php }?>

</table>


</div>
<?php }?>
