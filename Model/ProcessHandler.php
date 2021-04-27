<?php
require_once "DbConnection.php";


abstract class Handle extends dbh
{



        public function getLogin($email, $password)
        {
                $sql = "SELECT * FROM people where email= ? and pswd = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$email, $password]);
                $login =  $stmt->fetch();

                return $login;



                $this->pdo = null;
        }

        public function getType()
        {

                $stmt = $this->connect()->query("SELECT * FROM type");
                $result = $stmt->fetchAll();
                return $result;
                $this->pdo = null;
        }

        //This page will display a list of all the invoices from the most recent to the oldest. Each invoice number will be a link to a new page detailing the invoice, the content will be generated with the ID of the chosen invoice.
        public function getInvoice($condition, $check)
        {
                $sql = "SELECT * FROM company as c join people p on c.id_Company = p.id_Company join invoice i on i.id_People = p.id_People where $condition =?   ORDER by invoice_date DESC";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$check]);
                $result = $stmt->fetchAll();
                return $result;
                $this->pdo = null;
        }

        public function getContact($condition, $check)
        {
                $sql = "SELECT * FROM company as c join people p on c.id_Company = p.id_Company where $condition =?   ORDER by c.id_Company DESC";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$check]);
                $result = $stmt->fetchAll();
                return $result;
                $this->pdo = null;
        }

        //Contacts page
        //This page will display a list of all the contacts in alphabetical order.
        // Each contact name will be a link to a new page detailing the contact, the content will be generated with the ID of the chosen contact.

        public function getPeople($condition, $check) //order by id desc limit 5
        {
                $sql = "SELECT * FROM people where $condition =? ORDER by first_name, last_name";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$check]);
                $result = $stmt->fetchAll();
                return $result;
                $this->pdo = null;
        }

        // 2This page will display a list of all companies in alphabetical order. The name of the company will be a link to a new page detailing the company, the content will be generated with the ID of the chosen company.


        // 3Providers page
        //This page will display a list of all providers in alphabetical order. The name of the provider will be a link to a new page detailing the provider, the content will be generated with the ID of the chosen provider. (same detailing page as for companies)

        public function getCompanies($condition, $check)
        {
                $sql = "SELECT * FROM company as c join type t on c.id_Type = t.id_Type where $condition =?  ORDER by name";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$check]);
                $result = $stmt->fetchAll();
                return $result;
                $this->pdo = null;
        }


        public function delete($TABLE, $condition, $check) //order by id desc limit 5
        {
                $sql = "DELETE FROM $TABLE where $condition = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$check]);
                $this->pdo = null;
        }




        public function updateCompany($name, $country, $vat, $condition, $check)
        {
                $sql = "UPDATE company SET name =?, country =?,vat=? where $condition = ?";
                $stmt = $this->connect()->prepare($sql); // prepare a connection with the query created above
                $stmt->execute([$name, $country, $vat, $check]);
                $this->pdo = null;
        }


        public function insertInvoice($number, $invoice_date,  $id_People, $id_Company) //order by id desc limit 5
        {
                $sql = "INSERT INTO invoice(number, invoice_date, id_People, id_Company)
                               values(?,?,?,?)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$number, $invoice_date, $id_People, $id_Company]);
                $this->pdo = null;
        }

        public function insertCompany($name, $country, $vat, $id_Type) //order by id desc limit 5
        {
                $sql = "INSERT INTO company(name, country, vat, id_Type)
                               values(?,?,?,?)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$name, $country, $vat, $id_Type]);
                $this->pdo = null;
        }

        public function insertPeople($first_name, $last_name, $email, $pswd, $id_Company, $phone) //order by id desc limit 5
        {
                $sql = "INSERT INTO people(first_name, last_name, email, pswd, id_Company, Telephone)
                               values(?,?,?,?,?,?)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$first_name, $last_name, $email, $pswd, $id_Company,  $phone]);
                $this->pdo = null;
        }
}
