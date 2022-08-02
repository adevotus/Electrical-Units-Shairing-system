<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<center>
    <div style="margin-top:100px;">
        <form action="<?php echo base_url();?>welcome/auth/form_validation" method="post">

            <input type="number" placeholder="Enter Amount" name="bet" class="form-control" id="box" required>


            <!-- change id's name to betAmount -->
            <p>CURRENT WALLET: <a style="color:blue;"><?php echo $_SESSION['currentPoints']?></a></p>

            <p class="remaining">REMAINING BALANCEE:

                <a class="p-1" id="betAmountResult"></a>
            </p>

            <input type="submit" name="insert" id="insert" value="Insert">



        </form>
    </div>
    <script>
        $(function () {
            $("#box").on("input", function () {

                const betAmount = $("#box").val(),
                    walletAmount = < ? php echo $_SESSION['currentPoints'] ? >
                    , // your session data goes here 
                    remainingAmount = walletAmount - betAmount,
                    enough = remainingAmount >= 0;

                $("#betAmountResult").text(enough ? remainingAmount : 'Error, not enough balance');
                $("#insert").prop("disabled", !enough); // disable

                // $("#insert").toggle(enough); // remove
            })
        });
    </script>