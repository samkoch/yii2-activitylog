<?php

namespace samkoch\yii2activitylog\migrations;

use yii\db\Migration;
use samkoch\yii2activitylog\ActivityLog;

class m160126_115704_create_activity_log extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable(ActivityLog::tableName(), [
          'id' => $this->primaryKey(),
          'category' => $this->string()->null(),
          'tstamp' => $this->integer()->null(),
          'ip' => $this->string(15)->null(),
          'session_id' => $this->string()->null(),
          'user_id' => $this->integer()->null(),
          'message' => $this->string()->null(),
          'model' => $this->string()->null(),
          'params' => 'LONGTEXT NULL',
          'record_id' => $this->integer()->null(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable(ActivityLog::tableName());
    }

}
