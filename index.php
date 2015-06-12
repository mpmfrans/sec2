<html>
<head>
   <script src="check_form.js"></script> 
</head>
<body>
	
    <h1>Encrypt-R-Us</h1>
    
	<form method="POST">
        <table>
            <tr><td><input  id="name" name="name" placeholder="name"/></td></tr>
            <tr><td><input  id="password" name="password" placeholder="password"/></td></tr>
            <td><textarea id="text" name="text"  placeholder="text"></textarea></td>
            <tr><td><button type="submit">Send</button></td></tr>
        </table>
	</form>
    
    <?php

        include 'cipher.php';

if(isset($_POST["password"])){
        $encrypt = new Cipher($_POST["password"]);
}
         
        
        if(!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['text'])){
            
           
            
			$encryptedtext = $encrypt->encrypt($_POST["text"]);
			$decryptedtext = $encrypt->decrypt($encryptedtext);
			$file = $_POST['name'];
			file_put_contents($file, $encryptedtext);
		} elseif(!empty($_POST['name']) && !empty($_POST['password'])){
			if(file_exists($_POST['name'])){
				$file = file_get_contents($_POST['name']);
				$file = str_replace('"', '', $file);
                
                echo $encrypt->decrypt(str_replace('"', '', $file));
				 
			}
		}
    ?>
</body>
</html>