<?php
namespace Home\Model;
use Think\Model;

class MomentModel extends Model
{
	public function getMoments() {
		$sql    = "CALL proc_MomentByFieldsSelect()";
        $result = M()->query($sql);
        return $result;
	}
}