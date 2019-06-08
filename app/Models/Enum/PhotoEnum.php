<?php
namespace App\Models\Enum;
/**
 * Created by PhpStorm.
 * User: yinchuanjiang
 * Date: 2019/4/25
 * Time: 下午7:31
 */
class PhotoEnum{
    // 状态类别
    const CHECKING = 0; //等待审核
    const CHECKED_PASS = 1; //审核通过
    const CHECKED_REFUSE = -1; //审核不通过

    const ANONYMOUS_TRUE = 1;//匿名
    const ANONYMOUS_FALSE = -1;//不匿名


    public static function getStatusName($status){
        switch ($status){
            case self::CHECKING:
                return '等待审核';
            case self::CHECKED_PASS:
                return '审核通过';
            case self::CHECKED_REFUSE:
                return '审核不通过';
            default:
                return '等待审核';
        }
    }
}