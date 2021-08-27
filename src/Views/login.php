<?php

use App\Helpers\TokenHelper;

?>


<main >
	<h1>Welcome to COGIP</h1>
    <div class="container">
	    <div class="container1">
	        <form action="" method="post">
		        <div class="username">
			        <label for="username">Your Username:</label>
			        <br>
			        <input class="input" type="text" name="username" value="" placeholder="Username..." autocomplete="off" required autofocus>
		        </div>	

		        <div class="pwd">
			        <label for="password">Your Password :</label>
			        <br>
			        <input class="input" type="password" name="password" value="" placeholder="Password..." autocomplete="off" required>
		        </div>
                <br>
						
				<div>
					<label for="remember">
					<input type="checkbox" name="remember">Remember me
					</label>
				</div>

				<div class="button">
					<input type="hidden" name="token" value="<?php echo TokenHelper::generate(); ?>">
		            <button class="submit" type="submit" name="submit">Sign in</button>
		        </div>
	        </form>
        </div>
	</div>	
</main>