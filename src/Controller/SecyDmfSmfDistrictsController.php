<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * SecyDmfSmfDistricts Controller
 *
 * @property \App\Model\Table\SecyDmfSmfDistrictsTable $SecyDmfSmfDistricts
 *
 * @method \App\Model\Entity\SecyDmfSmfDistrict[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SecyDmfSmfDistrictsController extends AppController
{
    public function addDmfPhhPvtg()
    {
        $connection                 = ConnectionManager::get('default');
        $session_data               = $this->getRequest()->getSession()->read();
        $user_id                    = $session_data['Auth']['User']['id'];
        $groupId                    = $session_data['Auth']['User']['group_id'];
        $dist                       = $session_data['Auth']['User']['rgi_district_code'];
        $blok                       = $session_data['Auth']['User']['rgi_block_code'];
        $groups                     = [12,20];

        if(!in_array($groupId, $groups)){
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller'=>'Users','action' => 'logout']);
        }

        if(!empty($session_data['FormData']) && isset($session_data['FormData'])){
            $formData   = $session_data['FormData'];
            $form_id    = base64_decode($formData['formId']);
            $form_name  = base64_decode($formData['formNamee']);
            $month      = base64_decode($formData['monthId']);
            $year       = base64_decode($formData['yearId']);
            $formNameHn       = base64_decode($formData['formNameHn']);
        }else{
            $form_id = '';
            $month = '';
            $year = '';
            $form_name = '';
            $formNameHn = '';
        }

        // todo: for fornName
        $formName    = TableRegistry::get('secy_dept_form_masters');
        $query             = $formName->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $formName = $query->toArray();

        // todo: for years
        $years    = TableRegistry::get('years');
        $query              = $years->find('list', [
            'keyField'      => 'name',
            'valueField'    => 'id'
        ]);
        $years = $query->toArray();

        // todo: for monthName
        $mnths    = TableRegistry::get('months');
        $query              = $mnths->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $mnths = $query->toArray();

        // todo: for districts
        $distrcts    = TableRegistry::get('secc_districts');
        $query              = $distrcts->find('list', [
            'keyField'      => 'rgi_district_code',
            'valueField'    => 'name'
        ]);
        $distrcts = $query->toArray();

        // todo: for blocks
        $blocks    = TableRegistry::get('secc_blocks');
        $query              = $blocks->find('list', [
            'keyField'      => 'rgi_block_code',
            'valueField'    => 'name',
            'conditions'=>['secc_blocks.rgi_district_code='."'".$dist."'"]
        ]);
        $blocks = $query->toArray();
        //echo "<pre>"; print_r($blocks); "<pre>"; die;

        // todo: for Items
        if($form_id == 21){      // if phh
            $item = 1;
        }

        $items    = TableRegistry::get('Items');
        $query              = $items->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'=>['Items.id='."'".$item."'"]
        ]);
        $items = $query->toArray();

        // todo: for cardType
        if($form_id == 21){      // if phh
            $cardTypeId = 6;
        }else{
            $cardTypeId = '';
        }

        $cards    = TableRegistry::get('Cardtypes');
        $query              = $cards->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name',
            'conditions'=>['Cardtypes.id='."'".$cardTypeId."'"]
        ]);
        $cards = $query->toArray();

        $districtName = $distrcts[$dist];
        $year_id = $years[$year];
        $dmfSmfData = [];
        $dmfSmfDistData = [];
        $id = '';
        $data = [];
        if($this->getRequest()->is('post')){
            $request_data       = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            if(array_key_exists('id', $request_data)){
                $id = $request_data['id'];
            }else{
                $id = '';
            }

            if(isset($id) && !empty($id)){
                // update part
                $getData = $connection->prepare("select rgi_district_code, districtName, rgi_block_code, blockName, month_id, year_id, card_type_id, item_id, form_code_id, formCodeName, total_allocation, previous_month_lifting, previous_month_allocation, previous_month_distribution, current_month_lifting, current_month_allocation, current_month_distribution, total_expense, balance, created, created_by, modified, modified_by, freeze from secy_smfs_pvtg_districts where id=?");
                $getData->bindValue(1, $id);
                $getData->execute();
                $rsData = $getData->fetchAll('assoc');
//                echo "<pre>"; print_r($rsData); "<pre>"; die;
                if(!empty($rsData)){
                    $data = $rsData[0];
                }
            }
            else {

                $block                  = $request_data['blocks'];
                $item                   = $request_data['items'];
                $card                   = $request_data['card'];
                $lstYramt               = $request_data['lstYramt'];
                $quantity1              = $request_data['quantity1'];
                $forPay1                = $request_data['forPay1'];
                $toPay1                 = $request_data['toPay1'];
                $quantity2              = $request_data['quantity2'];
                $forPay2                = $request_data['forPay2'];
                $toPay2                 = $request_data['toPay2'];
                $total_expenses         = $request_data['totalPayable'];
                $allocated_amount_balance = $request_data['balAllocated'];
                $mapped_form_id         = 1;
                $yojna = 3;
                $entry_level = 3;
                $created = date('Y-m-d H:i:s');
                $freeze = 0;
                $modified = date('Y-m-d H:i:s');
                $verified_by = 0;
                $blockName = $blocks[$block];

                /*if($block == ''){
                    echo "Block is Mandatory";
                }
                if($item == ''){
                    echo "Item is Mandatory";
                }
                if($card == ''){
                    echo "Card Type is Mandatory";
                }
                if($quantity1 == ''){
                    echo "";
                }
                if($forPay1 == ''){
                    echo "";
                }
                if($toPay1 == ''){
                    echo "";
                }
                if($quantity2 == ''){
                    echo "";
                }
                if($forPay2 == ''){
                    echo "";
                }
                if($toPay2 == ''){
                    echo "";
                }*/


//            echo "insert into secy_smfs_pvtg_districts (rgi_district_code, districtName, rgi_block_code, blockName, month_id, year_id, card_type_id, item_id, form_code_id, formCodeName, total_allocation, previous_month_lifting, previous_month_allocation, previous_month_distribution, current_month_lifting, current_month_allocation, current_month_distribution, total_expense, balance, created, created_by, modified, modified_by, freeze) VALUE  ($dist,$districtName, $block, $blockName, $month, $year_id, $card,$item,$form_id,$form_name,$lstYramt,$quantity1,$forPay1,$toPay1,$quantity2,$forPay2,$toPay2,$total_expenses,$allocated_amount_balance,$created,$user_id,$modified,$user_id,$freeze)";die();




                $insertData =$connection->prepare("insert into secy_smfs_pvtg_districts (rgi_district_code, districtName, rgi_block_code, blockName, month_id, year_id, card_type_id, item_id, form_code_id, formCodeName, total_allocation, previous_month_lifting, previous_month_allocation, previous_month_distribution, current_month_lifting, current_month_allocation, current_month_distribution, total_expense, balance, created, created_by, modified, modified_by, freeze) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

                //$insertData->bindValue(1,);
                $insertData->bindValue(1,$dist);
                $insertData->bindValue(2,$districtName);
                $insertData->bindValue(3,$block);
                $insertData->bindValue(4,$blockName);
                $insertData->bindValue(5,$month);
                $insertData->bindValue(6,$year_id);
                $insertData->bindValue(7,$card);
                $insertData->bindValue(8,$item);
                $insertData->bindValue(9,$form_id);
                $insertData->bindValue(10,$form_name);
                $insertData->bindValue(11,$lstYramt);
                $insertData->bindValue(12,$quantity1);
                $insertData->bindValue(13,$forPay1);
                $insertData->bindValue(14,$toPay1);
                $insertData->bindValue(15,$quantity2);
                $insertData->bindValue(16,$forPay2);
                $insertData->bindValue(17,$toPay2);
                $insertData->bindValue(18,$total_expenses);
                $insertData->bindValue(19,$allocated_amount_balance);
                $insertData->bindValue(20,$created);
                $insertData->bindValue(21,$user_id);
                $insertData->bindValue(22,$modified);
                $insertData->bindValue(23,$user_id);
                $insertData->bindValue(24,$freeze);

                $insert = $insertData->execute();

                if($insert){
                    $this->Flash->success(__('The secy dmf smf block has been saved.'));
                    return $this->redirect(['controller'=>'SecyDmfSmfDistricts', 'action'=>'addDmfPhhPvtg']);
                }else{
                    $this->Flash->error(__('Sorry !... The secy dmf smf block has not been saved.'));
                    return $this->redirect(['controller'=>'SecyDmfSmfDistricts', 'action'=>'addDmfPhhPvtg']);
                }
            }
        }else{

            $dmfSmfBlkDataQry = $connection->prepare("select id, item_id,rgi_district_code,districtName,rgi_block_code,total_allocation, previous_month_lifting, previous_month_allocation, previous_month_distribution, current_month_lifting, current_month_allocation, current_month_distribution, total_expense, balance from secy_smfs_pvtg_districts where form_code_id=? and month_id=? and year_id=? and rgi_district_code=?");
            $dmfSmfBlkDataQry->bindValue(1, $form_id);
            $dmfSmfBlkDataQry->bindValue(2, $month);
            $dmfSmfBlkDataQry->bindValue(3, $year_id);
            $dmfSmfBlkDataQry->bindValue(4, $dist);
            $dmfSmfBlkDataQry->execute();
            $dmfSmfDistData = $dmfSmfBlkDataQry->fetchAll('assoc');
//            echo "<pre>"; print_r($dmfSmfDistData); "<pre>"; die;

        }

        $this->set(compact('form_id','month','year','formName','mnths','form_name','distrcts','dist','blocks','items','cards','dmfSmfData','dmfSmfDistData','formNameHn','data','id'));
    }

    public function updateSmfDmfDist(){
//        echo "aghori"; die;
        $connection                 = ConnectionManager::get('default');
        $session_data               = $this->getRequest()->getSession()->read();
        $user_id                    = $session_data['Auth']['User']['id'];
        $groupId                    = $session_data['Auth']['User']['group_id'];
        $dist                       = $session_data['Auth']['User']['rgi_district_code'];
        $blok                       = $session_data['Auth']['User']['rgi_block_code'];
        $groups                     = [12,20];

        if(!in_array($groupId, $groups)){
            $this->Flash->error(__('Oops!, Invalid User Login Request.'));
            $this->redirect(['controller'=>'Users','action' => 'logout']);
        }

        if(!empty($session_data['FormData']) && isset($session_data['FormData'])){
            $formData   = $session_data['FormData'];
            $form_id    = base64_decode($formData['formId']);
            $form_name  = base64_decode($formData['formNamee']);
            $month      = base64_decode($formData['monthId']);
            $year       = base64_decode($formData['yearId']);
            $formNameHn = base64_decode($formData['formNameHn']);
        }else{
            $form_id = '';
            $month = '';
            $year = '';
            $form_name = '';
            $formNameHn = '';
        }

        // todo: for fornName
        $formName    = TableRegistry::get('secy_dept_form_masters');
        $query             = $formName->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $formName = $query->toArray();

        // todo: for years
        $years    = TableRegistry::get('years');
        $query              = $years->find('list', [
            'keyField'      => 'name',
            'valueField'    => 'id'
        ]);
        $years = $query->toArray();

        // todo: for monthName
        $mnths    = TableRegistry::get('months');
        $query              = $mnths->find('list', [
            'keyField'      => 'id',
            'valueField'    => 'name'
        ]);
        $mnths = $query->toArray();
        // todo: for districts
        $distrcts    = TableRegistry::get('secc_districts');
        $query              = $distrcts->find('list', [
            'keyField'      => 'rgi_district_code',
            'valueField'    => 'name'
        ]);
        $distrcts = $query->toArray();

        // todo: for blocks
        $blocks    = TableRegistry::get('secc_blocks');
        $query              = $blocks->find('list', [
            'keyField'      => 'rgi_block_code',
            'valueField'    => 'name',
            'conditions'=>['secc_blocks.rgi_district_code='."'".$dist."'"]
        ]);
        $blocks = $query->toArray();

        // todo: for cardType
        if($form_id == 3){      // if phh
            $cardTypeId = 5;
        }else if($form_id == 7){    //if aay
            $cardTypeId = 6;
        }else{
            $cardTypeId = '';
        }


        $districtName = $distrcts[$dist];
        $year_id = $years[$year];

        if($this->getRequest()->is('post')){
            $request_data       = $this->getRequest()->getData();
//            echo "<pre>"; print_r($request_data); "<pre>"; die;
            $block                  = $request_data['blocks'];
            $item                   = $request_data['items'];
            $card                   = $request_data['card'];
            $lstYramt               = $request_data['lstYramt'];
            $quantity1              = $request_data['quantity1'];
            $forPay1                = $request_data['forPay1'];
            $toPay1                 = $request_data['toPay1'];
            $quantity2              = $request_data['quantity2'];
            $forPay2                = $request_data['forPay2'];
            $toPay2                 = $request_data['toPay2'];
            $total_expenses         = $request_data['totalPayable'];
            $allocated_amount_balance = $request_data['balAllocated'];
            $mapped_form_id         = 1;
            $yojna = 3;
            $entry_level = 3;
            $created = date('Y-m-d H:i:s');
            $freeze = 0;
            $modified = date('Y-m-d H:i:s');
            $verified_by = 0;
            $blockName = $blocks[$block];
            $id = $request_data['id'];

            $UpdateData =$connection->prepare("update secy_smfs_pvtg_districts set rgi_district_code =?, districtName =?, rgi_block_code =?, blockName =?, month_id =?, year_id =?, card_type_id =?, item_id =?, form_code_id =?, formCodeName =?, total_allocation =?, previous_month_lifting =?, previous_month_allocation =?, previous_month_distribution =?, current_month_lifting =?, current_month_allocation =?, current_month_distribution =?, total_expense =?, balance =?, created =?, created_by =?, modified =?, modified_by =?, freeze =? where id =?");


                $UpdateData->bindValue(1,$dist);
                $UpdateData->bindValue(2,$districtName);
                $UpdateData->bindValue(3,$block);
                $UpdateData->bindValue(4,$blockName);
                $UpdateData->bindValue(5,$month);
                $UpdateData->bindValue(6,$year_id);
                $UpdateData->bindValue(7,$card);
                $UpdateData->bindValue(8,$item);
                $UpdateData->bindValue(9,$form_id);
                $UpdateData->bindValue(10,$form_name);
                $UpdateData->bindValue(11,$lstYramt);
                $UpdateData->bindValue(12,$quantity1);
                $UpdateData->bindValue(13,$forPay1);
                $UpdateData->bindValue(14,$toPay1);
                $UpdateData->bindValue(15,$quantity2);
                $UpdateData->bindValue(16,$forPay2);
                $UpdateData->bindValue(17,$toPay2);
                $UpdateData->bindValue(18,$total_expenses);
                $UpdateData->bindValue(19,$allocated_amount_balance);
                $UpdateData->bindValue(20,$created);
                $UpdateData->bindValue(21,$user_id);
                $UpdateData->bindValue(22,$modified);
                $UpdateData->bindValue(23,$user_id);
                $UpdateData->bindValue(24,$freeze);
                $UpdateData->bindValue(25,$id);

                $insert = $UpdateData->execute();

                if($insert){
                    $this->Flash->success(__('The secy dmf smf District has been saved.'));
                    return $this->redirect(['controller'=>'SecyDmfSmfDistricts', 'action'=>'addDmfPhhPvtg']);
                }else{
                    $this->Flash->error(__('Sorry !... The secy dmf smf block has not been saved.'));
                    return $this->redirect(['controller'=>'SecyDmfSmfDistricts', 'action'=>'addDmfPhhPvtg']);
                }
        }
    }
}


