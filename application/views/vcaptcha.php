<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
</head>
<body>
    <form action="<?php echo base_url();?>Ccaptcha/validaCaptcha" method="post">
    <?php echo $captcha['image'];?>
    <input type="text" name="captcha" id=""/>
    <input type="submit" value="Enviar" />
    <input type="hidden" name="string_captcha" value=  <?php echo $captcha['word'];?>>
    </form>
</body>
</html>