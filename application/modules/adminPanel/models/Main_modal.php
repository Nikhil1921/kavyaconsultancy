<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Main_modal extends MY_Model
{
	public function roles()
    {
        switch ($this->session->branch_id) {
            case 0:
                switch ($this->session->role) {
                    case 'Accountant':
                        $return = ['Partner'];
                        break;
                    
                    default:
                        $return = [
                            'Admin'
                            // , 'Branch manager', 'Partner', 'Sales person', 'Operation', 'Accountant', 'Digital marketing'
                        ];
                    break;
                }
                
                break;
            
            default:
                $return = ['Partner', 'Sales person'];
                break;
        }
        return $return;
    }
    
	public function navs($role)
    {
        $navs = [
            [
                'name' => 'banners',
                'title' => 'Banner',
                'permissions' => ['view', 'add', 'delete'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'banners']))
            ],
            [
                'name' => 'news',
                'title' => 'News',
                'permissions' => ['view', 'add', 'update', 'delete'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'news']))
            ],
            [
                'name' => 'insurance_plans',
                'title' => 'Insurance Plans',
                'permissions' => ['view', 'add', 'update', 'delete'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'insurance_plans']))
            ],
            [
                'name' => 'companies',
                'title' => 'Insurance Companies',
                'permissions' => ['view', 'add', 'update', 'delete'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'companies']))
            ],
            [
                'name' => 'become_partners',
                'title' => 'Become Partner',
                'permissions' => ['view'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'become_partners']))
            ],
            [
                'name' => 'branches',
                'title' => 'Branches',
                'permissions' => ['view', 'add', 'update', 'delete'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'branches']))
            ],
            [
                'name' => 'users',
                'title' => 'Users',
                'permissions' => ['view', 'add', 'update', 'delete', 'commission'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'users']))
            ],
            [
                'name' => 'leads',
                'title' => 'Leads',
                'permissions' => ['view', 'add', 'update', 'assign', 'followup', 'purchase plan', 'vehicle documents', 'user documents'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'leads']))
            ],
            [
                'name' => 'followups',
                'title' => 'Followups',
                'permissions' => ['view'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'followups']))
            ],
            [
                'name' => 'purchased_plans',
                'title' => 'Purchased plans',
                'permissions' => ['view'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'purchased_plans']))
            ],
            [
                'name' => 'claims',
                'title' => 'Claims',
                'permissions' => ['view', 'followup'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'claims']))
            ],
            [
                'name' => 'digital_business',
                'title' => 'Digital business',
                'permissions' => ['view'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'digital_business']))
            ],
            [
                'name' => 'business_category',
                'title' => 'Digital category',
                'permissions' => ['view', 'add', 'update', 'delete'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'business_category']))
            ],
            [
                'name' => 'business_frames',
                'title' => 'Digital business frames',
                'permissions' => ['view', 'add', 'update', 'delete'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'business_frames']))
            ],
            [    
                'name' => 'downloads',
                'title' => 'Downloads',
                'permissions' => ['view', 'add', 'update', 'delete'],
                'added' => array_map(function($arr){
                    return $arr['operation'];
                }, $this->getall('permissions', 'operation', ['role' => $role, 'nav' => 'downloads']))
            ],
        ];
        
        return $navs;
    }

    public function add_permissions()
    {
        $this->db->trans_start();
        $this->db->delete('permissions', ['role' => $this->input->post('role')]);
        if ($this->input->post('permissions')) {
            $data = [];
            foreach ($this->input->post('permissions') as $k => $v){
                if (!in_array('view', $v)) array_push($v, 'view');
                foreach ($v as $p) 
                    $data[] = ['nav' => $k, 'operation' => $p, 'role' => $this->input->post('role')];
            }
            $this->db->insert_batch('permissions', $data);
        }
        $this->db->trans_complete();
        
		return $this->db->trans_status();
    }

    public function followup($u_id, $table)
    {
        $this->db->trans_start();
        
        $data = [
            'u_id'       => $u_id,
            'staff_id'   => $this->session->auth,
            'status'     => $this->input->post('status'),
            'remarks'    => $this->input->post('remarks'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $this->db->insert($table, $data);
        
        if ($data['status'] == 'Not interested')
            $this->db->where(['id' => $u_id])->update('logins', ['is_deleted' => 1, 'update_at' => $data['created_at']]);
        if ($data['status'] == 'Plan purchased')
            $this->db->where(['id' => $u_id])->update('logins', ['is_varified' => 1, 'is_activated' => 1, 'update_at' => $data['created_at']]);

        $this->db->trans_complete();
        
		return $this->db->trans_status();
    }

    public function purchase_followup($claim_id, $table, $follow_table)
    {
        $this->db->trans_start();
        
        $data = [
            'claim_id'   => $claim_id,
            'staff_id'   => $this->session->auth,
            'status'     => $this->input->post('status'),
            'remarks'    => $this->input->post('remarks'),
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        $this->db->insert($follow_table, $data);
        
        $this->db->where(['id' => $claim_id])->update($table, ['claim_status' => $data['status']]);

        $this->db->trans_complete();
        
		return $this->db->trans_status();
    }

    public function commission_details($id)
    {
        return $this->db->select('CONCAT(c.commission, "%") commission, CONCAT(i.ins_type, " Insurance") ins_type')
                        ->from("commissions c")
                        ->where(['user_id' => $id])
                        ->join('insurance i', 'c.ins_id = i.id')
                        ->get()
                        ->result();
    }
}