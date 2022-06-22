<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Main_modal extends MY_Model
{
	public function addMotor($post, $uplod_rc, $ext_policy)
    {
        $this->db->trans_start();
        
        $login = [
            'mobile' => $post['mobile'],
            'role'   => 'User'
        ];
        
        $check = $this->db->select('id')->from('logins')->where($login)->get()->row();
        if(!$check)
        {
            $login['email'] = $post['email'];
            $login['name'] = $post['name'];

            $this->db->insert('logins', $login);
            $check = $this->db->insert_id();
        }else
            $check = $check->id;

        $post['lead_id'] = $check;
        $this->db->insert('motor_insurance', $post);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            if(is_file($uplod_rc)) unlink($uplod_rc);
            if(is_file($ext_policy)) unlink($ext_policy);
        }

        return $this->db->trans_status();
    }

    public function addHealth($post, $table)
    {
        $this->db->trans_start();
        
        $login = [
            'mobile' => $post['mobile'],
            'role'   => 'User'
        ];
        
        $check = $this->db->select('id')->from('logins')->where($login)->get()->row();
        if(!$check)
        {
            $login['email'] = $post['email'];
            $login['name'] = $post['name'];

            $this->db->insert('logins', $login);
            $check = $this->db->insert_id();
        }else
            $check = $check->id;

        $post['lead_id'] = $check;
        $this->db->insert($table, $post);
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function getExpiryDocs()
    {
        return $this->db->select('auth_token, document_name, expiry_date')
                        ->from('vehicle_documents d')
                        ->where(['d.expiry_date <=' => date('Y-m-d', strtotime('+1 month'))])
                        ->join('vehicles v', 'v.id = d.veh_id')
                        ->join('logins l', 'l.id = v.user_id')
                        ->get()->result();
    }
}