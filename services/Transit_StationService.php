<?php

namespace Craft;

class Transit_StationService extends BaseApplicationComponent
{

	protected $record;

	public function __construct()
	{
		$record = null;
		$this->record = $record;
		if(is_null($this->record))
		{
			$this->record = Transit_StationRecord::model();
		}
	}

	public function create($attributes = array())
    {
    	$model = new Transit_StationModel();
    	$model->setAttributes($attributes);

    	return $model;
    }

	public function save(Transit_StationModel &$model)
    {

        if ($id = $model->getAttribute('id')) {
            if (null === ($record = $this->record->findByPk($id))) {
                throw new Exception(Craft::t('Can\'t find a station with ID "{id}"', array('id' => $id)));
            } 
        } else {
            $record = new Transit_StationRecord();
        }
        $record->setAttributes($model->getAttributes());

        if ($record->save()) {
            // update id on model (for new records)
            $model->setAttribute('id', $record->getAttribute('id'));
            return true;
        } else {
            $model->addErrors($record->getErrors());
            return false;
        }
    }

	public function stations()
	{
		$result = craft()->db->createCommand()
			->select('*')
			->from('transit_station')
			->queryAll();

		return $result;
	}

	public function getStation($station_id)
    {
        if ($record = $this->record->findByPk($station_id)) {
            return Transit_StationModel::populateModel($record);
        }
    }

    public function getStationInfo($station_code)
    {
        $service = 'Rail';
        $method = 'jStationInfo';
        $params = array('StationCode' => $station_code);
        $info = craft()->transit_api->call($service, $method, $params);
        return $info;

    }

    public function getRailIncidents()
    {
        $service = 'Incidents';
        $method = 'Incidents';
        $incidents = craft()->transit_api->call($service, $method);
        return $incidents;
    }
	

    public function delete($id)
    {
    	$record = Transit_StationRecord::model()->findByPk($id);
        if ($record)
        {
            $record->delete();
        }
    }

}