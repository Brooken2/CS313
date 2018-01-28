<?php
session_start();

		
	$total = $_SESSION["total"];

//	include 'sessionHandle.php';
	include 'shopping-heading.php';
?>


<h2>Your Total: $<?php echo $total; ?></h2><br><br>

<form method="post" action="Confirmation.php" role="form">

    <div class="messages"></div>
    <div class="controls">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_name">Firstname *</label>
                    <input type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                   <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_lastname">Lastname *</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                   <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_email">Email *</label>
                    <input type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_phone">Phone *</label>
                    <input type="tel" name="phone" class="form-control" placeholder="Please enter your phone" requied="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
		<div class="row">
			 <div class="col-md-12">
            	    <div class="form-group">
                    <label for="form_address">Address *</label>
                    <input type="text" name="address" class="form-control" placeholder="Please enter your address" requied="required" data-error="Address is required">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="form_message">Notes</label>
                    <textarea name="message" class="form-control" placeholder="Special Notes" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted"><strong>*</strong> These fields are required.</p>
            </div>
        </div>
    </div>

	 <div class="center">
	 	<a href="shopping.php" class="btn btn-info btn-lg">Continue Shopping</a>
 		<input type="submit" class="btn btn-info btn-lg" value="Confirm">
	</div>

</form>

</body>
</html>
