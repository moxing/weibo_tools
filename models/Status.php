<?php
class Status extends ActiveRecord\Model {
	static $table_name = "wb_status";

	static $belongs_to = array(array('ori_status', 'class_name' => 'Status','foreign_key' => 'ori_id'));
}