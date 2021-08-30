<?php
?>

<main>
     <h1>Welcome to COGIP</h1>

     <div class="container">

          <table class="container1">
               <tr>
                    <th class="title1" colspan="4">Last Invoices</th>
               </tr>

               <tr>
                    <th>Invoice Number</th>
                    <th>Dates</th>
                    <th>company</th>
                    <th></th>
               </tr>

               <?php $i = 0; foreach ($invoices as $invoice) { ?>
               <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><?= $invoice->nbrinvoice?></td>
                    <td><?= $invoice->dateinvoice ?></td>
                    <td><?= $invoice->name ?></td>
                    <td><a href="/admin/invoice/delete<?php echo $invoice->invoice_id; ?>">🗑️</td>
               </tr>
               <?php $i++; } ?>
          </table>


          <table class="container2">
      
               <tr>
                    <th class="title2" colspan="5">Last Companies</th>
               </tr>

               <tr>
                    <th>Names</th>
                    <th>TVA</th>
                    <th>country</th>
                    <th>Type</th>
                    <th></th>
               </tr>

               <?php $i = 0; foreach ($companies as $company) { ?>
               <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><?= $company->name?></td>
                    <td><?= $company->vatnumber ?></td>
                    <td><?= $company->country ?></td>
                    <td><?= $company->type ?></td>
                    <td><a href="/admin/company/delete<?php echo $company->id; ?>">🗑️</td>
               </tr>
               <?php $i++; } ?>
               
          </table>

          <table class="container3">
               <tr>
                    <th class="title3" colspan="5" >Last Contacts</th>
               </tr>

               <tr>
                    <th>Names</th>
                    <th>phone</th>
                    <th>E-mail</th>
                    <th>company</th>
                    <th></th>
               </tr>

               
               <?php $i = 0; foreach ($contacts as $contact) { ?>
               <tr class="<?= $i % 2 === 0 ? 'row1' : 'row2' ?>">
                    <td><?= $contact->firstname . ' ' . $contact->lastname ?></td>
                    <td><?= $contact->telephone ?></td>
                    <td><?= $contact->email ?></td>
                    <td><?= $contact->name ?></td>
                    <td><a href="/admin/contact/delete<?php echo $contact->contact_person_id; ?>">🗑️</td>
               </tr>
               <?php $i++; } ?>
                
          </table>
     </div>  
</main>