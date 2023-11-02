<html>
    <head>
        <title>Display records</title>
        <style>
            .result,.result td,.result th{
                border:1px solid black;
                border-collapse: collapse;
                padding: 7px;
                margin: auto;
            }
            </style>
    </head> 
    <body>

    <?php
       if(isset($data)) {
        
        ?>
        <form action="<?=base_url('Register/update')?>" method="post">
            <table cellspacing='20'>
               <tr>
                 <td>Id</td>
                 <td><input name="stid" value="<?=$data[0]->id?>"></td>
               </tr>
               <tr>
                 <td>Name</td>
                 <td><input name="stname" value="<?=$data[0]->Name?>"></td>
               </tr>
               <tr>
                 <td>Email</td>
                 <td><input name="stEmail" value="<?=$data[0]->Email?>"></td>
               </tr>
               <tr>
                 <td>Mobile</td>
                 <td><input name="stMobile" value="<?=$data[0]->Mobile?>"></td>
               </tr>
               <tr>
                 <td><button>Update</button></td>
                 <td></td>
               </tr>
       </table>
       </form>


        <?php
       }else {
        ?>
        <table class="result">
            <tr>
                <th>Action</th>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
            </tr>
        <?php
           if(isset($table)) {
            foreach($table as $row) {
                ?>
                <tr>
                    <td><a href="<?=base_url('Register/Edit/'.$row->id)?>">Edit</a></td>
                  <td><?=$row->id?></td>
                  <td><?=$row->Name?></td>
                  <td><?=$row->Email?></td>
                  <td><?=$row->Mobile?></td>

            </tr>
            <?php
         
            }
           }


        ?>
        </table>
        <?php
       }
       ?>
       <button> <a href="<?=base_url('Register/student')?>">go to Register</a></button>        
    </body>
</html>