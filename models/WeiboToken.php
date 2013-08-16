<?php
class WeiboToken extends ActiveRecord\Model {
	static $table_name = "wb_token";

	static $primary_key = 'uid';
}