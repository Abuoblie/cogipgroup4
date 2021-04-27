# cogip
### content
   ### Database
   ### using the Mvc model
      #the model class
      
      #the controller Class
      
      #view
### include folder
### assets

### Database 
          #The database named cogip contain three tables invoice, company, people and type of companies
 ### Outlook of database:
 
          #TABLE Type (id_Type int not null AUTO_INCREMENT PRIMARY KEY, label varchar (50) NOT null);
          
          #TABLE Company (name varchar (50) not null, country varchar (50) not null, vat varchar (50) not null, id_Type int not null, FOREIGN KEY( id_Type) REFERENCES Type(    id_Type, id_Company int not null AUTO_INCREMENT PRIMARY key);

          #TABLE People ( first_name varchar(50), last_name varchar(50), email varchar(128),Telephone varchar(25) NOT NULL, pswd varchar(128), id_Company int not null, FOREIGN KEY( id_Company) REFERENCES Company( id_Company) , id_People int not null AUTO_INCREMENT PRIMARY KEY);
          
         #TABLE invoice (number varchar(128) NOT NULL, invoice_date date DEFAULT NULL, id_People int(11) NOT NULL, id_Company int not null, FOREIGN KEY( id_Company) REFERENCES Company( id_Company), id_invoice int(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY (id_invoice), KEY `id_People (id_People)
          
### using the Mvc model

         #We tried to use the mvc model by creating an abstract class called Process handler that handles all the interactions with the database, a controller class that we called validation that commute between the view and the process handler and finally the views that shows the contents to users.
         
 ### the include folder
 
            #the include folder contains all the included files such as headers and footers
            
 ### assets           
           #the assets folder contains style sheets and logo
 
