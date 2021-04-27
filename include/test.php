<?php
require_once "Model/ProcessHandler.php";

class Validation extends Handle
{


        public function login($email, $password)
        {
                $logged = $this->getLogin($email, $password);

                if (empty($logged)) {


                        echo "<h4 style='text-align: center;'>invalid email or password</h4>";
                        //header("location: login.php");
                } else {

                        $_SESSION['email'] = $logged['email'];
                        $_SESSION['first_name'] = $logged['first_name'];
                        $_SESSION['last_name']  = $logged['last_name'];

                        echo "<h4 style='text-align: center;'>welcome {$_SESSION['first_name']} {$_SESSION['last_name']}</h4>";
                }
        }



        public function validatePeople()
        {


                if ($this->getPeople('email', $_POST['email'])) {
                        echo "contact exist in database";
                } else {

                        $firstName = null;
                        $lastName = null;
                        $pswd = null;
                        $email = null;
                        $id_Company = null;
                        $Telephone =  null;
                        $regex = "/^[a-zA-Z\s.]+$/";

                        if (preg_match($regex, $_POST['firstName'])) {
                                $firstName = htmlentities(trim(filter_var($_POST['firstName'], FILTER_SANITIZE_STRING)));
                        } else {
                                echo "invalid data";
                                echo " contact was not created please correct the mistakes and resubmit";
                        }

                        if (preg_match($regex, $_POST['lastName'])) {
                                $lastName = htmlentities(trim(filter_var($_POST['lastName'], FILTER_SANITIZE_STRING)));
                        } else {
                                echo "invalid data";
                        }


                        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
                        } else {
                                echo "invalid data";
                        }


                        if (preg_match('/^[\d\s]+$/', $_POST['id_company'])) {
                                $id_company = intval(htmlentities(trim(filter_var($_POST['id_company'], FILTER_SANITIZE_STRING))));
                        } else {
                                echo "invalid data";
                                echo " contact was not created please correct the mistakes and resubmit";
                        }

                        if (preg_match("/^[\w\s.]+$/", $_POST['telephone'])) {
                                $Telephone = htmlentities(trim(filter_var($_POST['telephone'], FILTER_SANITIZE_STRING)));
                        } else {
                                echo "invalid data";
                                echo " contact was not created please correct the mistakes and resubmit";
                        }

                        // ce lui si est la dernier version


                        if (empty($id_company) || empty($firstName) || empty($lastName) || empty($email) || empty($Telephone)) {
                                echo "<br> contact was not created please correct the mistakes and resubmit";
                        } else {

                                $this->insertPeople($firstName, $lastName, $email, null, $id_company,  $Telephone);

                                echo "<br> contact successfully created";
                        }
                }
        }


        public function validateCompany()
        {


                if ($this->getCompanies('vat', $_POST['vat'])) {

                        echo "<h4 style='text-align: center;'>Company exist in database</h4>";
                } else {
                        $name = null;
                        $country = null;
                        $vat = null;
                        $id_Type = null;
                        $phone = null;


                        if (preg_match("/^[\w\s\.]+$/", $_POST['name'])) {

                                $name = htmlentities(trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING)));

                                if (preg_match("/^[\w\s\.-]+$/", $_POST['country'])) {
                                        $country = htmlentities(trim(filter_var($_POST['country'], FILTER_SANITIZE_STRING)));

                                        if (preg_match("/^[\w\s\.]+$/", $_POST['vat'])) {
                                                $vat = htmlentities(trim(filter_var($_POST['vat'], FILTER_SANITIZE_STRING)));

                                                if (preg_match('/^\d+$/', $_POST['id_Type'])) {
                                                        $id_Type = htmlentities(trim(filter_var(intval($_POST['id_Type']), FILTER_SANITIZE_NUMBER_INT)));

                                                        if (preg_match("/^[0-9\s\-]+$/", $_POST['phone'])) {

                                                                if (empty($name) || empty($country) || empty($vat) || empty($id_Type)) {

                                                                        echo "<h4 style='text-align: center;'> company was not created  a required field is empty please correct the mistakes and resubmit</h4>";
                                                                } else {
                                                                        $this->insertCompany($name, $country, $vat, $id_Type);

                                                                        echo "<h4 style='text-align: center;'>company successfully created</h4> ";
                                                                }
                                                        } else {
                                                                echo "<h4 style='text-align: center;'>invalid phone number</h4>";
                                                                echo "<h4 style='text-align: center;'>contact was not created please correct the mistakes and resubmit</h4>";
                                                        }
                                                } else {
                                                        echo "<h4 style='text-align: center;'>invalid type please select type</h4>";

                                                        echo "<h4 style='text-align: center;'>contact was not created please correct the mistakes and resubmit</h4>";
                                                }
                                        } else {
                                                echo "<h4 style='text-align: center;'>invalid vat number</h4>";
                                                echo "<h4 style='text-align: center;'>contact was not created please correct the mistakes and resubmit</h4>";
                                        }
                                } else {
                                        echo "<h4 style='text-align: center;'>invalid country</h4>";
                                        echo "<h4 style='text-align: center;'>contact was not created please correct the mistakes and resubmit</h4>";
                                }
                        } else {

                                echo "<h4 style='text-align: center;'>invalid name</h4>";
                                echo "<h4 style='text-align: center;'>contact was not created please correct the mistakes and resubmit</h4>";
                        }
                }
        }



        public function validateInvoice()
        {


                if ($this->getInvoice('number', $_POST['number'])) {
                        echo "invoice number exist in database";
                } else {


                        $number = null;
                        $invoice_date = null;
                        $id_People = intval($_POST['id_people']);
                        $id_Company = intval($_POST['id_company']);



                        if (preg_match("/^[\w.-]+$/", $_POST['number'])) {
                                $number = htmlentities(trim(filter_var($_POST['number'], FILTER_SANITIZE_STRING)));

                                if (preg_match("/^[\s\d\-]+$/", $_POST['invoice_date'])) {
                                        $invoice_date = htmlentities(trim($_POST['invoice_date']));

                                        if (empty($number) || empty($invoice_date) || empty($id_People) || empty($id_Company)) {

                                                echo "<h4 style='text-align: center;'> invoice was not created please correct the mistakes and resubmit</h4>";
                                        } else {
                                                $this->insertInvoice($number, $invoice_date, $id_People, $id_Company);

                                                echo "<h4 style='text-align: center;'>invoice successfully created</h4> ";
                                        }
                                } else {
                                        echo "<h4 style='text-align: center;'>invalid invoice date </h4>";
                                        echo "<h4 style='text-align: center;'> invoice was not created please correct the mistakes and resubmit</h4>";
                                }
                        } else {
                                echo "<h4 style='text-align: center;'> invalid invoice number</h4>";
                                echo "<h4 style='text-align: center;'> invoice was not created please correct the mistakes and resubmit</h4>";
                        }
                }
        }
}
