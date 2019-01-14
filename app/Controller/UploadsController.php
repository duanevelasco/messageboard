<?php
class UploadsController extends AppController{

public $components = array('ImageUploader');

public function picture(){
 if ($this->request->is('post')) 
 {
   $this->User>create();
   if(!empty($this->data))
   {
     //Check if image has been uploaded
     if(!empty($this->data['User']['image']['name']))
     {
        $file = $this->data['User']['image']; //put the  data into a var for easy use
        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
        $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
        if(in_array($ext, $arr_ext))
        {
            //do the actual uploading of the file. First arg is the tmp name, second arg is
            //where we are putting it
            if(move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/upload_folder' . DS . $file['name']))
            {
                //prepare the filename for database entry
                $this->request->data['User']['image'] = $file['name'];
                pr($this->data);
                if ($this->User>save($this->request->data)) 
                {
                    $this->Session->setFlash(__('The data has been saved'), 'default',array('class'=>'success'));
                    $this->redirect(array('controller'=>'users', 'action'=>'index'));
                }
                else
                {
                    $this->Session->setFlash(__('The data could not be saved. Please, try again.'), 'default',array('class'=>'errors'));
                }
            }
        }
    }
    else
    {
        $this->Session->setFlash(__('The data could not be saved. Please, Choose your image.'), 'default',array('class'=>'errors'));
    }

}
}

}

}
