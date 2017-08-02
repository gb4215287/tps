<?php 
namespace app\index\model;
use think\Model;
class Index extends Model
{
      // 设置数据表（不含前缀）
      protected $name = 'test';
      public function getIndexInfo() {
        return '99900000';
      }
}
?>
