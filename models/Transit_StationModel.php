<?php

namespace Craft;

class Transit_StationModel extends BaseModel
{
	protected function defineAttributes()
	{
		return array(
			'id' => AttributeType::Number,
			'name' => AttributeType::String,
			'code' => AttributeType::String
		);
	}
}

