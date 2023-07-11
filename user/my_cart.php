<?php     include_once '../admin/config/database.php';
    include('header.php');
    $db = new Database();
        if(isset($_POST['remove_item']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['item_name']==$_POST['item_name'])
                {
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                    echo "<script> 
                    alert('Item removed!');
                    window.location.href= 'my_cart.php';
                    </script>";
                }
            }
        }
        if(isset($_POST['mod']))
        {
            foreach($_SESSION['cart'] as $key => $value)
            {
                if($value['item_name']==$_POST['item_name'])
                {
                  $_SESSION['cart'][$key]['Quantity']=$_POST['mod'];
                  
            

                }
            }
        }

if(isset($_POST['make_purchase']))
{        if($_SERVER['REQUEST_METHOD']=='POST'){
          $name = $_POST['user_name'];
          $email = $_POST['user_email'];
          $number = $_POST['user_number'];
          $ex_number = $_POST['user_ex_number'];
          $rigion = $_POST['user_region'];
          $address = $_POST['user_address'];
          $mssge = $_POST['user_message'];
    
          if(empty($name) || empty($email) || empty($number) || empty($rigion)|| empty($address)){
        
            echo "<script> alert('Field must be fulfilled! ');</script>";
        
          }
          else{
            $sql = "insert into purchase (name, email, number, exnumber, rigion, address, mssge) values ('$name','$email','$number', '$ex_number','$rigion','$address','$mssge')";
            $result = $db->insert($sql);
          
            if($result)
            {
              echo "<script> alert('Order placed successfully! ');</script>";
            }
            else
            {
              echo "<script> alert('please try again');</script>";
            }
          }
        
        
        }
        }
  ?>
  


    <div class="container">
      <div class="row my-2">
        <div class="col-md-12 text-center text-white my-5 rounded" style="background-color: #88786f;">
          <h1>CART ITEMS</h1>
        </div>
        <div class="col-md-9">
          <div class="table-responsive">
            <table class="table table-light" >
              <thead class="text-center">
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Item Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php 
                if(isset($_SESSION['cart'])){
                  foreach($_SESSION['cart'] as $key => $value){
                    $sr=$key+=1;
                    echo "
                      <tr>
                        <td>$sr</td>
                        <td>$value[item_name]</td>
                        <td>$$value[item_price]<input type='hidden' class='iprice' value='$value[item_price]'></td>
                       
                        <td>
                        <form action='my_cart.php' method='post'>
                          <input type='number' class='text-center iquantity' name='mod' onchange='this.form.submit()' value='$value[Quantity]' min='1' max='10'>
                          <input type='hidden' name='item_name' value='$value[item_name]'>
                        </form>  
                        </td>
                        <td class='itotal'></td>
                        <td> 
                        <form action='my_cart.php' method='post'>
                        <button name='remove_item' class='btn btn-sm btn-outline-danger'>Delete</button>
                        <input type='hidden' name='item_name' value='$value[item_name]'>
                        </form>
                        </td>
                      </tr>
                    ";
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-md-3 mb-5">
          <div class="bg-light p-4">
            <h3>Total:</h3>
            <h5 class="text-end gtotal"></h5>
            <form action="purchase.php" method="post">
              <div class="form-check mt-2">
                <input class="form-check-input" type="radio" name="" id="" checked>
                <label class="form-check-label" for="">
                  Cash On Delivery
                </label>
              </div>
              <button type="button" class="btn btn-outline form-control mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><a>Make Purchase</a>
              </button>
            </form>
          </div>
        </div>

      </div>
    </div>  

    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header bgheadersr">
        <h1 class="modal-title fs-5 " id="staticBackdropLabel">Your Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


      <div class="container my-5">
    <div class="row my-4">
        <div class="col-md-3"></div>
        <div class="col-md-6">
       
        <div class="purchase_product">
        <form method="post">
            
            <label for="user_name" class="form-label">Reciver Name*</label>
            <input type="text" class="mb-3" name="user_name" id="user_name" required>

            <label for="user_email" class="form-label">Email address*</label>
            <input type="email" class="mb-3" name="user_email" id="user_email" required>

            <label for="user_number" class="form-label">Phone Number*</label>
            <input type="text" class="mb-3" name="user_number" id="user_number" required>

            <label for="user_ex_number" class="form-label">Alternative Number</label>
            <input type="text" class="mb-3" name="user_ex_number" id="user_ex_number">

            <label for="user_region" class="form-label">Select Rigion*</label>
            <select name="user_region" id="user_region" class='mb-3' required>
                <option value="dhaka">Dhaka</option>
                <option value="chattogram">Chattogram</option>
                <option value="sylhet">Sylhet</option>
                <option value="rajshahi">Rajshahi</option>
                <option value="rangpur">Rangpur</option>
                <option value="khulna">Khulna</option>
                <option value="barishal">Barishal</option>
                <option value="mymensingh">Mymensingh</option>
            </select>

            <label for="user_address" class="form-label">Address*</label>
            <textarea name="user_address" id="user_address" rows="1"  class="mb-3" required></textarea>          

            <label for="user_message" class="form-label">Message In Persell</label>
            <textarea name="user_message" id="user_message" rows="1" class="mb-3"></textarea>          
            <h5>Your Total Amount: <h5 class="gtotal mb-4"></h5></h5>

            <button class="btn btn-outline" type="submit" name="make_purchase">Place Order</button>

        </form>
    </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    
</div>

      </div>
    </div>
  </div>
</div>
  
  


      <script>
        var gt=0;
        var iprice=document.getElementsByClassName('iprice');
        var iquantity=document.getElementsByClassName('iquantity');
        var itotal=document.getElementsByClassName('itotal');
        var gtotal=document.getElementsByClassName('gtotal')[0];
        var gptotal=document.getElementsByClassName('gtotal')[1];

        function subTotal()
        { gt=0;
          for(i=0; i<iprice.length; i++)
          {
            itotal[i].innerText='$'+(iprice[i].value)*(iquantity[i].value);
            gt=(gt+(iprice[i].value)*(iquantity[i].value));
          }
          gtotal.innerText='$'+gt;
          gptotal.innerText='$'+gt;
        }
        subTotal();
      </script>
      
<?php include('footer.php');?>