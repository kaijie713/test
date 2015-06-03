<div class="row-fluid">
  <table id="splitdetail-body" class="table table-striped table-hover table-form">
  <thead>
    <tr>
      <td style="text-align:center" colspan="8">开发商/合作媒体分成明细
      <div class="pull-right mrm">
          <a data-role="add-splitdetail" class="btn btn-default btn-sm">添加</a>
      </div>
      </td>
    </tr>
    <tr>
        <td width="16%">开发商/合作媒体</td>
        <td width="23%">开发商/合作媒体名称</td>
        <td width="15%">分成比例</td>
        <td width="16%">分成金额</td>
        <td width="20%">备注</td>
        <td width="10%">操作</td>
    </tr>
  </thead>
  <tbody data-role="splitdetails" id="splitdetail-tbody">
  </tbody>
<script type="text/x-handlebars-template" data-role="splitdetail-template">
<tr data-charge="false" data-role="splitdetail" data-id ="{{id}}" id="tr{{id}}">
  <td>
    <div class="form-group control-group">
      <label for="partner_type{{id}}" class="hide">开发商/合作媒体</label>
      <div class="input-group controls mlz">
        <select id="partner_type{{id}}" name="Splitdetail[partner_type][]" class="wt-at">
          <option value="">请选择</option>
          <?php foreach (Dict::gets('partnerType') as $value) { ?>
              <option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
        <?php } ?>
        </select>
      </div>
  </td>
  <td>
    <div class="form-group control-group">
      <label for="partner_name{{id}}" class="hide">开发商/合作媒体名称</label>
      <div class="input-group controls mlz">
        <input type="text" id="partner_name{{id}}" {{#if partner_name }}value="{{partner_name}}"{{/if}} name="Splitdetail[partner_name][]" class="span12" >
      </div>
  </td>
  <td>
    <div class="form-group control-group">
      <label for="divide{{id}}" class="hide">分成比例</label>
      <div class="input-group controls mlz">
        <div class="input-group">
          <input type="text" id="divide{{id}}" {{#if divide }}value="{{divide}}"{{/if}} name="Splitdetail[divide][]" class="span8" >
          <span class="input-group-addon">%</span>
        </div>
      </div>
  </td>
  <td>
    <div class="form-group control-group">
      <label for="divide_amount{{id}}" class="hide">分成金额</label>
      <div class="input-group controls mlz">
        <div class="input-group">
          <input type="text" id="divide_amount{{id}}" {{#if divide_amount }}value="{{divide_amount}}"{{/if}} name="Splitdetail[divide_amount][]" class="span10" >
          <span class="input-group-addon">元</span>
        </div>
      </div>
  </td>
  <td>
    <div class="form-group control-group">
      <label for="partner_memo{{id}}" class="hide">备注</label>
      <div class="input-group controls mlz">
      <input type="text" id="partner_memo{{id}}" {{#if partner_memo }}value="{{partner_memo}}"{{/if}} name="Splitdetail[partner_memo][]" class="span12" >
      </div>
  </td>
  <td>
      
    {{#if sp_id }}<input type="hidden" value="{{sp_id}}" id="sp_id{{id}}" name="Splitdetail[sp_id][]" class="span8" >{{/if}}
    <button class="btn span12" data-role="delete-splitdetail" type="button">删除</button>
  </td>
</tr>
</script>
</table>


</div>