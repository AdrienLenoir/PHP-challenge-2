<?php


namespace App\Models;

use Exception;


class InvoiceModel extends Model
{
    public $_data;

    public function find($params=null)
    {
        if (isset($params)){
            $field= (is_numeric($params)) ? 'invoice_id' : 'nbrinvoice';
            $data = $this->getDB()->action(
                "SELECT invoices.*, contact_person.contact_person_id, contact_person.firstname, contact_person.lastname, contact_person.email, contact_person.telephone, company.*, company_type.*",
                'invoices',
                array($field, '=', $params),
                "LEFT JOIN contact_person ON contact_person.contact_person_id=invoices.contact_person_id LEFT JOIN company ON company.id=invoices.company_id LEFT JOIN company_type ON company.company_type_id=company_type.company_type_id"
            );

            $this->_data = $data;
        } else {
            $data = $this->getDB()->action(
                "SELECT invoices.*, contact_person.contact_person_id, contact_person.firstname, contact_person.lastname, contact_person.email, contact_person.telephone, company.*, company_type.*",
                'invoices',
                null,
                "LEFT JOIN contact_person ON contact_person.contact_person_id=invoices.contact_person_id LEFT JOIN company ON company.id=invoices.company_id LEFT JOIN company_type ON company.company_type_id=company_type.company_type_id"
            );

            $this->_data = $data;
        }
    }

    public function findByContact($contactId)
    {
        $data = $this->getDB()->getWithJointure('invoices', "LEFT JOIN contact_person ON contact_person.contact_person_id=invoices.contact_person_id LEFT JOIN company ON company.id=invoices.company_id LEFT JOIN company_type ON company.company_type_id=company_type.company_type_id",array('invoices.contact_person_id', '=', $contactId));

        $this->_data = $data;
    }

    public function findLimit(int $limit)
    {
        $this->_data = $this->getDB()->action(
            'SELECT *',
            'invoices',
            null,
            "LEFT JOIN contact_person ON contact_person.contact_person_id=invoices.contact_person_id LEFT JOIN company ON company.id=invoices.company_id LEFT JOIN company_type ON company.company_type_id=company_type.company_type_id",
            $limit,
            "ORDER BY invoice_id DESC"
        );
    }

    public function findOne($params=null)
    {
        if($params){
            $field= (is_numeric($params)) ? 'invoice_id' : 'nbrinvoice';
            $data = $this->getDB()->action(
                "SELECT invoices.*, contact_person.contact_person_id, contact_person.firstname, contact_person.lastname, contact_person.email, contact_person.telephone, company.*, company_type.*",
                'invoices',
                array($field, '=', $params),
                "LEFT JOIN contact_person ON contact_person.contact_person_id=invoices.contact_person_id LEFT JOIN company ON company.id=invoices.company_id LEFT JOIN company_type ON company.company_type_id=company_type.company_type_id"
            );

            $this->_data = $data[0];
            return true;
        }
        return false;
    }

    public function update($fields = array(),$id=array())
    {
        if(!$this->getDB()->update('invoices',$id,$fields)){
            throw new Exception('There was a problem updating.');
        }
    }

    public function create($fields = array())
    {
        if(!$this->getDB()->insert('invoices',$fields)){
            throw new Exception('There was a problem creating an invoice.');
        }
    }

    public function delete($id)
    {
        $this->getDB()->delete('invoices', ['invoice_id', '=',$id]);
    }
    
    public function data(){
        return $this->_data;
    }
}