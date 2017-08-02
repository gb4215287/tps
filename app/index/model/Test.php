<?php 
namespace app\index\model;
use think\Model;
class Test extends Model
{
      // 设置数据表（不含前缀）
      public $name = 'test';
      public function getIndexInfo() {
        return '99900000';
      }
}
?>
