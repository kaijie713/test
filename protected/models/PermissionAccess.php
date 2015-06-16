<?php
Yii::import("application.service.Approval.Impl.ApprovalServiceImpl"); 
class PermissionAccess extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_permission_access';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prmid, seq', 'required'),
			array('seq', 'numerical', 'integerOnly'=>true),
			array('group_id, eva_id, prmid, u_id, createby', 'length', 'max'=>36),
			array('isactive', 'length', 'max'=>1),
			array('createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('group_id, eva_id, prmid, u_id, seq, isactive, createby, createdate, updatedate', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'group_id' => 'Group',
			'eva_id' => 'Eva',
			'prmid' => 'Prmid',
			'u_id' => 'U',
			'seq' => 'Seq',
			'isactive' => 'Isactive',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updatedate' => 'Updatedate',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('group_id',$this->group_id,true);
		$criteria->compare('eva_id',$this->eva_id,true);
		$criteria->compare('prmid',$this->prmid,true);
		$criteria->compare('u_id',$this->u_id,true);
		$criteria->compare('seq',$this->seq);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updatedate',$this->updatedate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PermissionAccess the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findPermissionAccessByEvaId($evaId)
	{
		$sql = "select * from t_permission_access where eva_id = '$evaId' and isactive = 0 order by seq asc";
		return $this->QueryAll($sql);
	}

	public function getPermissionAccessByEvaIdAndUid($evaId, $uid)
	{
		$sql = "select * from t_permission_access where eva_id = '$evaId' and u_id = '$uid' and and isactive = 0 order by seq asc";
		return $this->QueryRow($sql);
	}

	public function getPermissionAccessCurrentByEvaId($evaId)
	{
		$sql = "select * from t_permission_access where eva_id = '$evaId' and isactive = 0 order by seq asc";
		return $this->QueryRow($sql);
	}

	public function findPermissionAccessEvaIdsByUid($uid)
	{
		$sql = "select * from t_permission_access where u_id = '$uid' and isactive = 0 order by seq asc";
		$result = $this->QueryAll($sql);
		return ArrayToolkit::column($result, 'eva_id');
	}

	public function checkApproval($evaId){
		$result = $this->getPermissionAccessCurrentByEvaId($evaId);
		if($result['u_id'] == Yii::app()->user->__get('u_id')){
			return $result;
		} else {
			return false;
		}
	}

	public function approval($id, $flag)
	{
		$isApproval = PermissionAccess::model()->checkApproval($id);

		if (empty($isApproval))
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');

		if($flag== 1){
			$PermissionAccess = PermissionAccess::model()->findByPk($isApproval['prmid']);
			$PermissionAccess->isNewRecord =  false;
			$PermissionAccess->isApproval  =  1;
			$PermissionAccess->save(false);
		}else{

			$this->setPermissionAccessApprovalByEvaId($id);
		}

		$isNext  = PermissionAccess::model()->getPermissionAccessCurrentByEvaId($id);

		$flag = empty($isNext)? 'zstg':$flag;

		Evaluation::model()->setEvaluationStatusById($id, $flag);


		
	}

	public function getPermissionAccessNextSeqByEvaId($id)
	{
		$sql = "select * from t_permission_access where eva_id = '$id' and isactive = 0 order by seq desc limit 1";
		$result = $this->QueryRow($sql);
		return empty($result) ? 1 : $result['seq']+1;
	}

	public function setPermissionAccessApprovalByEvaId($id)
	{
		$params['isApproval'] = 0;
		$condition['eva_id'] = $id;
		return $this->ModelEdit($this->tableName(),$condition,$params);
	}

	public function sortPermissionAccess($ids)
	{
		$seq = 1;
		foreach ($ids as $key => $id) {
			$params['seq'] = $seq;
			$params['updatedate'] = date("Y-m-d H:i");
			$condition['prmid'] = $id;
			$seq ++;
			$this->ModelEdit($this->tableName(),$condition,$params);
		}
	}

	public function createPermissionAccessByEvaId($id)
	{
		$model = Evaluation::model()->findByPk($id);
		if($model===null){
			return false;
		}
		$ids = array();

		if(!empty($model->ec_incharge_id))
			array_push($ids, $model->ec_incharge_id);
		if(!empty($model->sales_id))
			array_push($ids, $model->sales_id);
		if(!empty($model->createby))
			array_push($ids, $model->createby);

		$ids = array_unique($ids);

		$seq = 1;
		foreach ($ids as $value) {
			$PermissionAccess = new PermissionAccess();
			$PermissionAccess->prmid=$this->getUUID();
			$PermissionAccess->eva_id=$id;
			$PermissionAccess->u_id=$value;
			$PermissionAccess->seq=$seq;
			$PermissionAccess->isShow="0";
			$PermissionAccess->content="电商负责人,销售或申请人。";
			$PermissionAccess->createby = Yii::app()->user->__get('u_id');
	    	$PermissionAccess->createdate = date("Y-m-d H:i");
	    	$PermissionAccess->isactive = 0;
	    	$PermissionAccess->save(false);
	    	$seq++;
		}

		return true;
		
	}

	public function createPermissionAccessByTransaction($fields)
	{
		if(empty($fields['code']) || empty($fields['bill_type'])|| empty($fields['bill_id']) ){
            throw new CHttpException(500,'参数丢失');
        }

        $result = Transaction::model()->findTransactionUsersByBillAndCode($fields['bill_id'], $fields['bill_type'], $fields['code']);

		$permissions = PermissionAccess::model()->findPermissionAccessByEvaId($fields['bill_id']);
		$paUserIds = ArrayToolkit::column($permissions, 'u_id');

		$userIds = array_unique(ArrayToolkit::column($result, 'approver_id'));
		$userIds = array_diff($userIds, $paUserIds);

		$seq = PermissionAccess::model()->getPermissionAccessNextSeqByEvaId($fields['bill_id']);
        foreach ($userIds as  $id)
        {
        	if(!($model = user::model()->findByPk($id)))
        		throw new CHttpException(500,'该审批用户不存在');

        	$PermissionAccess = new PermissionAccess();
			$PermissionAccess->prmid=$this->getUUID();
			$PermissionAccess->eva_id=$fields['bill_id'];
			$PermissionAccess->u_id=$id;
			$PermissionAccess->seq=$seq;
			$PermissionAccess->isShow="0";
			$PermissionAccess->content="审批人。";
			$PermissionAccess->createby = Yii::app()->user->__get('u_id');
	    	$PermissionAccess->createdate = date("Y-m-d H:i");
	    	$PermissionAccess->isactive = 0;
	    	$PermissionAccess->save(false);
	    	$seq++;
        }

		return true;
		
	}
}
