<?php
namespace Craft;

class Transit_StationController extends BaseController
{

    protected $allowAnonymous = false;

    public function actionSave()
    {
        // Is this a new or existing station?
        if ($id = craft()->request->getPost('stationId')) {
            $model = craft()->transit_station->getStation($id);
        } else {
            $model = craft()->transit_station->create();
        }

        // Get the submitted data
        $data = craft()->request->getPost();
        $model->name = $data['name'];
        $model->code = $data['code'];

        // Did we pass validation?
        if($model->validate()) {
            if( craft()->transit_station->save($model) )
            {
                craft()->userSession->setNotice(Craft::t('Station saved.'));
                return $this->redirectToPostedUrl();
            }            
        } else {
            craft()->userSession->setNotice(Craft::t('There was a problem with your submission, please check the form and try again!'));
            craft()->urlManager->setRouteVariables(array('station' => $model));
        }
    }

    public function actionDelete()
    {
        $this->requirePostRequest();
        $id = craft()->request->getRequiredPost('id');
        craft()->transit_station->delete($id);
        craft()->end();
    }
}