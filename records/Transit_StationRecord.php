<?php 

/* 
Transit Plugin
Station Record
Author: Aaron Berkowitz, @asberk
*/

namespace Craft;


class Transit_StationRecord extends BaseRecord
{
	public function getTableName()
	{
		return 'transit_station';
	}

	protected function defineAttributes()
	{
		return array(
			'name' => array(
				AttributeType::String,
				'required' => true
			),
			'code' => array(
				AttributeType::String,
				'required' => true
			)
		);
	}
}