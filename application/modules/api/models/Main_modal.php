<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Main_modal extends MY_Model
{
	public function plan_list($path, $plan_type)
    {
        $this->db->select('ip.id, ip.title, ip.description, CONCAT("'.base_url($path).'", ip.image) pdf')
                 ->from('insurance_plans ip')
                 ->where(['ip.is_deleted' => 0, 'ip.plan_type' => $plan_type])
                 ->where(['ip.ins_id' => $this->input->get('ins_id')]);

        return $this->db->get()->result();
    }
}