<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	 $model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	/*array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->id)),*/
	array('label'=>'Listado', 'url'=>array('admin')),
);

  $id=Yii::app()->user->id;
                if ($id!='') {
   $sql='select * from usuario where id='.$id.';';
    $connection=Yii::app()->db;
    $command=$connection->createCommand($sql);
    $row=$command->queryRow();
    $id_perfil=$row["id_perfil"];
    
    if ($id_perfil==2){
      //  echo "usuario basico";
        if ($id!=$_GET['id']){  
           // return false;
               $this->redirect(array('usuario/update/'.$id));
        }
    }else{
        
    }
                }

?>
<h1><center>cambiar contraseña Usuario <?php echo $model->id; ?></center></h1>


<?php echo $this->renderPartial('_form_1', array('model'=>$model)); ?>