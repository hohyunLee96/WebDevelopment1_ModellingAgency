<?php
require __DIR__ . '/../repositories/modelrepository.php';

class ModelService {

    private $modelRepository;

    public function __construct()
    {
        $this->modelRepository = new ModelRepository();
    }

    public function getModelByType($type) {
        $repository = new ModelRepository();
        return $repository->getModelByType(htmlspecialchars($type));
    }
    public function getModelById($modelId) {
        $repository = new ModelRepository();
        return $repository->getModelByID($modelId);
    }
    public function deleteModel($selected_id){
        $repository = new ModelRepository();
        $repository->deleteModel($selected_id);
    }
    public function deleteBooking($selected_id){
        $repository = new ModelRepository();
        $repository->deleteBooking($selected_id);
    }

    public function createModel($model){
        $repository = new ModelRepository();
        $repository->createModel($model);
    }

    public function editModel($selected_id,$editName,$editPhoto){
        $repository = new ModelRepository();
        $repository->editModel($selected_id,$editName,$editPhoto);
    }
    public function bookModels($client_id,$selected_id,$bookingDate){
        $repository = new ModelRepository();
        $repository->bookModels($client_id,$selected_id,$bookingDate);
    }
    public function getBooking(){
        $repository = new ModelRepository();
        return $repository->getBooking();
    }
    public function confirmBooking($selected_id){
        $repository = new ModelRepository();
        $repository->confirmBooking($selected_id);
    }
    public function deleteModelById($id){
        return $this->modelRepository->deleteModelById($id);
    }
}
