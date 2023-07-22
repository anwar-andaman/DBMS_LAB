<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
       if($_SERVER['REQUEST_METHOD'] == 'POST')
        { 
            $server="localhost";
            $username = "root";
            $password = "Anwar@357";
            $con = mysqli_connect($server, $username, $password);

            if (! $con)
            {
                die ("Could not connect to database");
            }
             $sql = "select *from invoice.invoice_item";
             $records=$con->query($sql);
             $inv_id=$_POST['INV_ID'];
             $pid=$_POST['PID'];
             $quantity=$_POST['QUANTITY'];
        } 
        ?>
        <div>
            <form method="post" action="index.php">
            <fieldset>
            <label for="cust_id">Customer ID:</label>
            <input type="text" name="cust_id" id="cust_id" placeholder="Enter the Customer ID"/>
            <label for="name">Customer Name:</label>
            <input type="text"  name="name" id="name" readonly/>
            </fieldset>
            <br>
            <fieldset>
                <table>
                    <tr>
                        <td><label for="product">Product:</label></td>
                        <td><label for="qty">Quantity:</label>
                        </td><td><label for="price">Price:</label></td>
                        <td><label for="amount">Amount</label></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> <select id="product" name="prod"> </select></td>
                        <td><input type="text" name="qty" id="qty" placeholder="Enter the Quantity"/></td>
                        <td><input type="text" name="price" id="price" readonly/></td>
                        <td><input type="text"  name="amount" id="amount" readonly/></td>
                        <td><button>Add Item</button></td>
                    </tr>
                    <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST')
                    
                     foreach( $records as $record ): ?>
                        <tr>
                        <td><?php echo $record['INV_ID']; ?></td>
                        <td><?php echo $record['PID']; ?> </td>
                        <td><?php echo $record['QUANTITY']; ?> </td>
                        <td><?php //echo $record['amount']; ?> </td>
                     </tr>
                     <?php endforeach; ?>
                    
                </table>
                
            
               
            
            
            
            
            </fieldset>
            </form>
        </div>
    </body>
</html>
