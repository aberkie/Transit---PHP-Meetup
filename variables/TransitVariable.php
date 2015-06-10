<?php
namespace Craft;

class TransitVariable
{

	public function stations()
	{
		return craft()->transit_station->stations();
	}

	public function getStation($station_id)
	{
		return craft()->transit_station->getStation($station_id);
	}

	public function getStationInfo($code)
	{
		return craft()->transit_station->getStationInfo($code);
	}

	public function getRailIncidents(){
		return craft()->transit_station->getRailIncidents();
	}

}


