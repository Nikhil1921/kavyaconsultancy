<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Main_modal extends MY_Model
{
	public function commission_details($id)
    {
        return $this->db->select('CONCAT(c.commission, "%") commission, CONCAT(i.ins_type, " Insurance") ins_type')
                        ->from("commissions c")
                        ->where(['user_id' => $id])
                        ->join('insurance i', 'c.ins_id = i.id')
                        ->get()
                        ->result();
    }

    public function commission($api, $status=null)
	{
		$this->db->select('SUM(case when (i.comm_type = "NET") 
								THEN
									p.commission * p.premium / 100
								ELSE
									p.commission * p.od_premium / 100
								END)
								as rewards')
		         ->from('purchase_plan p')
                 ->where('p.partner_id', $api)
				 ->join('insurance_plans ip', 'ip.id = p.plan_id', 'left')
				 ->join('insurance i', 'i.id = ip.ins_id', 'left')
				 ->join('logins c', 'c.id = p.user_id', 'left');
			
		if ($status) $this->db->where('p.commission_status', $status);

		$commission = $this->db->get()->row_array();
		
		return $commission ? floor($commission['rewards']) : 0;
	}
}