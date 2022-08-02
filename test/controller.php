<?php
class Auth extends MX_Controller
{

public function form_validation()
{
$this->form_validation->set_rules('bet','bet', 'required|numeric');
if($this->form_validation->run())
{
$data = array(

'bet' =>$this->input->post('bet'),
);
$this->db->insert('bettaya',$data);
$this->load->view('bet');
}
}
public function inserted()
{
$this->index();
$this->session->set_flashdata("success","Your account has been registered. You can log in now");

}



function updateData($id) {
$data = array (
'bet' => $this->input->post('bet'),
);
$this->db->where('id', $id);
$this->db->update('users', $data);
}

}

public function updateData($id=49) {
    
    // load Model
    $this->load->model("Auth_model);


    // get currentPoints from the database ...
    $query          = $this->Auth_model->get_current_points($id); // user id
    $current_points = $query->row(0, 'currentPoints'); 

    $data = array (
        'bet' => $this->input->post('bet'),
    );

    $data['remainingBalance'] = $current_points - $data['bet'];

    $this->db->where('user_id', $id);
    $this->db->update('users', $data);
}

// Something like this should be added to your Model file to get currentPoints

public function get_current_points($id)
{
    $id    = $this->db->escape($id);
    $query = $this->db->query("SELECT * FROM users WHERE user_id = $id LIMIT 1");
    return $query;
}
?>