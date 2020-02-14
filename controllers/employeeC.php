<?php
class EmployeeController {
    public function construct(){}


    //appel de la fonction list()
    public function index() {
      $this->list();
    }

      //appeler le modèle, instancier la classe, appeler la méthode du modèle
    public function list(){
      require_once MODELS.DS.'employeeM.php';
      $m=New EmployeeModel();
      $employees=$m->listAll();
      // Affichage au sein de la vue des données récupérées via le model
      require_once CLASSES.DS.'view.php';
      $v=new View();
      $v->setVar('employeelist',$employees);
      $v->render('employee','list');
    }

    public function view($id=null){
      require_once MODELS.DS.'employeeM.php';
      $m=New EmployeeModel();
      require_once CLASSES.DS.'view.php';
      $v=new View();
      if ($employee=$m->listOne($id)) $v->setVar('e',$employee);
      // Affichage au sein de la vue des données récupérées via le model
      $v->render('employee','view');
    }

    public function edit($id=null){
      die('modification d\'un employé'); //die is an alias of exit function
    }

    public function delete($id=null){
      die('suppression d\'un employé');
    }

}
?>