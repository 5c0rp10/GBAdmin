<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
* Class : VIp (VipController)
* Sponser Class to control all Inmate related operations.
* @author : Tinu Thomson
* @version : 1
* @since : 22 Feb 2018
*/
class Vip extends BaseController
{
   /**
    * This is default constructor of the class
    */
   public function __construct()
   {
       parent::__construct();
       $this->load->model('Vip_model');
       $this->load->helper(array('form', 'url'));
       $this->isLoggedIn();
   }

   /**
    * This function used to load the first screen of the user
    */
   public function index()
   {
       $this->global['pageTitle'] = 'GandhiBhavan : Dashboard';

       $this->loadViews("vip", $this->global, NULL , NULL);
   }


    public function do_upload_photo()
    {
            $query = $this->db->query('SELECT vip_id FROM vip ORDER BY vip_id DESC LIMIT 1;');

            $id = NULL;

            foreach ($query->result() as $row)
            {
              $id = $row->vip_id;

            }
            $config['upload_path']          = './uploads/photo/vip';
            $config['file_name']            = 'photo_'.$id.'.jpg';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 20000;
            $config['max_width']            = 413;
            $config['max_height']           = 531;

            $this->load->library('upload', $config);

            $this->upload->do_upload('photo');
            $this->loadViews("vipSuccess", $this->global, NULL , NULL);
    }


   /**
    * This function is used to load the add new form
    */
   function addNew()
   {

           $this->load->model('vip_model');

           $this->global['pageTitle'] = 'GandhiBhavan : Add New VIP';

           $this->loadViews("addNewVip", $this->global, NULL, NULL);

   }



   /**
    * This function is used to add new user to the system
    */
   function addNewVip()
   {

           $this->load->library('form_validation');

           $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[30]');
           $this->form_validation->set_rules('award','award','trim|required|max_length[50]');
           $this->form_validation->set_rules('mobileno','Mobile Number','min_length[10]|max_length[10]');
           $this->form_validation->set_rules('email','Email','trim|valid_email|max_length[128]');

           if($this->form_validation->run() == FALSE)
           {
               $this->addNew();
           }
           else
           {
               $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
               $award = $this->security->xss_clean($this->input->post('award'));
               $mobileno = $this->security->xss_clean($this->input->post('mobileno'));
               $email = $this->security->xss_clean($this->input->post('email'));

               $vipInfo = array('vip_award'=>$award,'vip_name'=> $name,
                                   'vip_mob'=>$mobileno,'vip_email'=>$email);

               $this->load->model('vip_model');
               $result = $this->vip_model->addNewVip($vipInfo);

               $this->loadViews("vipPhotoUpload", $this->global, NULL, NULL);

       }
   }


   /**
    * This function is used load user edit information
    * @param number $userId : Optional : This is user id
    */
   function editOld($userId = NULL)
   {
       if($this->isAdmin() == TRUE || $userId == 1)
       {
           $this->loadThis();
       }
       else
       {
           if($userId == null)
           {
               redirect('userListing');
           }

           $data['roles'] = $this->user_model->getUserRoles();
           $data['userInfo'] = $this->user_model->getUserInfo($userId);

           $this->global['pageTitle'] = 'GandiBhavan : Edit User';

           $this->loadViews("editOld", $this->global, $data, NULL);
       }
   }


   /**
    * This function is used to edit the user information
    */
   function editUser()
   {
       if($this->isAdmin() == TRUE)
       {
           $this->loadThis();
       }
       else
       {
           $this->load->library('form_validation');

           $userId = $this->input->post('userId');

           $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
           $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
           $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
           $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
           $this->form_validation->set_rules('role','Role','trim|required|numeric');
           $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');

           if($this->form_validation->run() == FALSE)
           {
               $this->editOld($userId);
           }
           else
           {
               $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
               $email = $this->security->xss_clean($this->input->post('email'));
               $password = $this->input->post('password');
               $roleId = $this->input->post('role');
               $mobile = $this->security->xss_clean($this->input->post('mobile'));

               $userInfo = array();

               if(empty($password))
               {
                   $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                   'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
               }
               else
               {
                   $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                       'name'=>ucwords($name), 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId,
                       'updatedDtm'=>date('Y-m-d H:i:s'));
               }

               $result = $this->user_model->editUser($userInfo, $userId);

               if($result == true)
               {
                   $this->session->set_flashdata('success', 'User updated successfully');
               }
               else
               {
                   $this->session->set_flashdata('error', 'User updation failed');
               }

               redirect('userListing');
           }
       }
   }


   /**
    * This function is used to delete the user using userId
    * @return boolean $result : TRUE / FALSE
    */
   function deleteUser()
   {
       if($this->isAdmin() == TRUE)
       {
           echo(json_encode(array('status'=>'access')));
       }
       else
       {
           $userId = $this->input->post('userId');
           $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));

           $result = $this->user_model->deleteUser($userId, $userInfo);

           if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
           else { echo(json_encode(array('status'=>FALSE))); }
       }
   }


   /**
    * Page not found : error 404
    */
   function pageNotFound()
   {
       $this->global['pageTitle'] = 'GandhiBhavan : 404 - Page Not Found';

       $this->loadViews("404", $this->global, NULL, NULL);
   }

}

?>
